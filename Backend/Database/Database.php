<?php
    /**
     * Created by PhpStorm.
     * User: prince
     * Date: 12/17/15
     * Time: 4:29 PM
     */

    namespace Backend\Database;


    use Exception;

    abstract class Database {
        const ENV = "local";
        /**
         * @var bool Flag to see if a connection has already been made
         */
        private static $isConnected = false;
        protected      $id;
        /**
         * @var string location to json folder
         */
        protected $jsonLocation;

        /**
         * @var bool|\mysqli
         */
        protected $connection = false;

        /**
         * @var \mysqli_stmt
         */
        protected $c, $r, $u, $d;

        /**
         * @var string MySQL Credentials
         */
        private $host, $user, $pass, $db;

        /**
         * @var array Tables in database
         */
        private $tables = [
            "account_type",
            "comments",
            "likes",
            "locations",
            "roles",
            "tags",
            "users"
        ];

        /**
         * Database constructor.
         *
         * @param bool         $mysqli
         *
         * @throws Exception
         *
         * @param bool|\mysqli $mysqli
         */
        public function __construct($mysqli = false) {
            $config             = include "../config.php";
            $this->host         = $config["host"];
            $this->user         = $config["user"];
            $this->pass         = $config["password"];
            $this->db           = $config["database"];
            
            $this->jsonLocation = $_SERVER["DOCUMENT_ROOT"];

            if ($mysqli !== false) {
                $this->connection = $mysqli;
            } else {
                if (self::$isConnected === true) {
                    throw new Exception("Database connection has already been created, use that connection by passing in the getConnection() method as a parameter");
                } else {
                    self::$isConnected = true;
                    $this->connection  =
                        mysqli_connect($this->host, $this->user, $this->pass, $this->db);
                }
            }
            if (!$this->connection) {
                die("Could not connect to database: " . mysqli_error($this->connection));
            }
        }

        /**
         * @return \mysqli
         */
        public function getConnection() {
            return $this->connection;
        }

        public abstract function create($obj);

        /**
         * Reads row from table
         *
         * @param $id
         *
         * @return object|bool Object on success false otherwise
         */
        public function read($id) {
            if (is_numeric($id)) {
                $this->id = (int)$id;
                if ($this->r->execute()) {
                    $result = $this->r->get_result();
                    if ($result->num_rows > 0) {
                        $obj = $this->createObjFromRow($result->fetch_object());
                        $this->stripAndDecode($obj);

                        return $obj;
                    }
                }
            }

            return false;
        }

        protected abstract function createObjFromRow($row);

        /**
         * Strips and Decodes and object from slashes and html_entities
         *
         * @param object $obj
         */
        public function stripAndDecode($obj) {
            $this->decode($obj);
            $this->strip($obj);
        }

        /**
         * Decodes a object which was encoded with html_entity_decode was called upon
         *
         * @param object $obj
         */
        public function decode($obj) {
            foreach ($obj as $key => $val) {
                if (!is_object($val)) {
                    $obj->$key = html_entity_decode($val, ENT_QUOTES);
                }
            }
        }

        /**
         * Strips slashes from an object's properties
         *
         * @param object $obj
         */
        public function strip($obj) {
            foreach ($obj as $key => $val) {
                if (!is_object($val)) {
                    $obj->$key = stripcslashes($val);
                }
            }
        }

        public function makeJSON($data) {
            $json = json_encode($data, JSON_UNESCAPED_SLASHES);

            return $json;
        }

        public abstract function readAll();

        public abstract function readByLimitAsc($start, $where = "");

        public abstract function readByLimitDesc($last, $where = "");

        public abstract function update($obj);

        public abstract function totalRows($where = "");

        /**
         * Deletes row from table
         *
         * @param $id
         *
         * @return bool
         */
        public function delete($id) {
            if (is_numeric($id)) {
                $this->id = (int)$id;
                if ($this->d->execute()) {
                    return true;
                }
            }

            return false;
        }

        protected function totalRowsInTable($table, $where) {
            $query  = "SELECT count(*) AS total FROM {$table} WHERE {$where};";
            $result = mysqli_query($this->connection, $query);
            $data   = "";
            while ($row = mysqli_fetch_assoc($result)) {
                $data = $row["total"];
            }

            return $data;
        }

        protected function createJsonFile($filename, $data) {
            if ($data !== false && is_array($data)) {
                $handle = fopen($this->jsonLocation . $filename, 'w');
                for ($i = 0; $i < count($data); $i++) {
                    $this->stripAndDecode($data[$i]);
                }
                $json = json_encode($data, JSON_UNESCAPED_SLASHES);
                fwrite($handle, $json);
                fclose($handle);

                return true;
            }

            return false;
        }

        protected function readAllRows($table) {
            $query  = "select * from {$table} ORDER BY id DESC;";
            $result = mysqli_query($this->connection, $query);

            if (mysqli_num_rows($result) > 0) {
                $data = [];
                while ($row = mysqli_fetch_object($result)) {
                    $this->stripAndDecode($row);
                    $obj    = $this->createObjFromRow($row);
                    $data[] = $obj;
                }

                return $data;
            }

            return false;
        }

        protected function readByAmountAsc($table, $start, $where = "") {
            $query  = "select * from {$table} WHERE id > {$start} {$where} LIMIT 20;";
            $result = mysqli_query($this->connection, $query);

            if (mysqli_num_rows($result) > 0) {
                $data = [];
                while ($row = mysqli_fetch_object($result)) {
                    $this->stripAndDecode($row);
                    $obj    = $this->createObjFromRow($row);
                    $data[] = $obj;
                }

                return $data;
            }

            return false;
        }

        protected function readByAmountDesc($table, $last, $where = "") {
            $query = "select * from {$table} WHERE id < {$last} {$where} ORDER BY id DESC LIMIT 20;";
            if (is_null($last)) {
                $query = "SELECT * FROM {$table} WHERE {$where} ORDER BY id DESC LIMIT 20";
            }
            $result = mysqli_query($this->connection, $query);

            if (mysqli_num_rows($result) > 0) {
                $data = [];
                while ($row = mysqli_fetch_object($result)) {
                    $this->stripAndDecode($row);
                    $obj    = $this->createObjFromRow($row);
                    $data[] = $obj;
                }

                return $data;
            }

            return false;
        }

        /**
         * Creates the 'create' prepared statement
         *
         * @param string   $table   Table to insert into
         * @param string[] $columns The columns that will have data inserted
         *
         * @throws \InvalidArgumentException
         */
        protected function createPreparedStatement($table, $columns) {
            if ($this->isValidTable($table)) {
                $query   = $this->createStatementQuery($table, $columns);
                $this->c = $this->connection->prepare($query);

            } else {
                throw new \InvalidArgumentException("Not a proper table");
            }
        }

        /**
         * Checks to see if a valid table prepared statement is being created
         *
         * @param $tableName
         *
         * @return bool If the table is a valid table name
         */
        private function isValidTable($tableName) {
            return in_array($tableName, $this->tables);
        }

        /**
         * @param $table
         * @param $columns
         *
         * @return string
         */
        private function createStatementQuery($table, $columns) {
            if ($this->isValidTable($table)) {
                $query = "INSERT INTO {$table} (";
                // hold the placeholder question marks
                $questionMarks = " VALUES (";
                // loop through columns
                for ($i = 0; $i < count($columns); $i++) {
                    if ($i > 0) {
                        // insert into {table} (column1, column2, column 3
                        $query .= ", " . $columns[$i];
                        // values (?, ?, ?
                        $questionMarks .= ", ?";
                    } else {
                        $query .= $columns[$i];
                        $questionMarks .= "?";
                    }
                }
                $query = rtrim($query);

                // insert into {table} (column1, column2, column 3)
                $query .= ")";

                // values (?, ?, ?)
                $questionMarks .= ")";

                // insert into {table} (column1, column2, column 3) values (?, ?, ?)
                $query .= $questionMarks;

                return $query;
            } else {
                throw new \InvalidArgumentException("Not a valid table name");
            }
        }

        /**
         * Creates a read prepared statement
         *
         * @param  string     $table Table to read from
         * @param string|null $where Custom where clause
         */
        protected function readPreparedStatement($table, $where = null) {
            if ($this->isValidTable($table)) {
                $query = null;
                if (!is_null($where)) {
                    $query = "select * from {$table} where {$where}";
                } else {
                    $query = "select * from {$table} where id = ?;";
                }
                $this->r = $this->connection->prepare($query);
            } else {
                throw new \InvalidArgumentException("Not a valid table name");
            }
        }

        /**
         * Creates Update prepared statement
         *
         * @param string      $table   Table tp update
         * @param string[]    $columns Columns to update
         * @param string|null $where   Custom where clause
         */
        protected function updatePreparedStatement($table, $columns, $where = null) {
            if ($this->isValidTable($table)) {
                $query   = $this->updateStatementQuery($table, $columns, $where);
                $this->u = $this->connection->prepare($query);
            } else {
                throw new \InvalidArgumentException("Not a valid table name");
            }
        }

        private function updateStatementQuery($table, $columns, $where = null) {
            if ($this->isValidTable($table)) {
                $query = "update {$table} set ";

                for ($i = 0; $i < count($columns); $i++) {
                    if ($i > 0) {
                        $query .= ", " . $columns[$i] . " = ?";
                    } else {
                        $query .= $columns[$i] . " = ?";
                    }
                }

                if (!is_null($where)) {
                    $query .= " where " . $where;
                } else {
                    $query .= " where id = ?";
                }

                return $query;
            } else {
                throw new \InvalidArgumentException("Not a valid table name");
            }
        }

        /**
         * Checks to see if the value parameter is null if it is it returns the
         * oldValue if not it returns the value
         *
         * @param string $value    String to check against
         * @param string $oldValue String to return if the value is null
         *
         * @return mixed
         */
        protected function isNull($value, $oldValue) {
            if ($value === null) {
                return $oldValue;
            } else {
                return $value;
            }
        }

        /**
         * Creates delete prepared statement
         *
         * @param  string     $table Table to delete from
         * @param string|null $where Custom where clause
         */
        protected function deletePreparedStatement($table, $where = null) {
            if ($this->isValidTable($table)) {
                $query = null;
                if (!is_null($where)) {
                    $query = "delete from {$table}  where {$where};";
                } else {
                    $query = "delete from {$table} where id = ?;";
                }
                $this->d = $this->connection->prepare($query);
            } else {
                throw new \InvalidArgumentException("Not a valid table name");
            }
        }

        /**
         * Cleans an object with data to be inserted into the database
         * using mysqli_real_escape_string and html_entity_encode
         *
         * @param object $obj
         */
        protected function clean($obj) {
            foreach ($obj as $key => $val) {
                $obj->$key = htmlentities(mysqli_real_escape_string($this->connection, $val), ENT_QUOTES);
            }
        }

    }
