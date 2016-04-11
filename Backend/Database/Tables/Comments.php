<?php
    /**
     * Created by PhpStorm.
     * User: prince
     * Date: 4/10/16
     * Time: 8:45 PM
     */

    namespace Backend\Database\Tables;


    use Backend\Database\Database;
    use Backend\Database\Schemas\Comment;

    class Comments extends Database {

        const TABLE_NAME = "comments";

        // prepared statement variables

        private $locationId, $userId, $comment;

        public function __construct($mysqli = false) {
            parent::__construct($mysqli);
            $table = self::TABLE_NAME;

            // prepared statements

            $this->createPreparedStatement($table, [
                "locations_id",
                "users_id",
                "comment"
            ]);
            $this->readPreparedStatement($table);
            $this->updatePreparedStatement($table, [
                "comment"
            ]);
            $this->deletePreparedStatement($table);

            // bind params

            $this->c->bind_param("iis", $this->locationId, $this->userId, $this->comment);
            $this->r->bind_param("i", $this->id);
            $this->u->bind_param("si", $this->comment, $this->id);
            $this->d->bind_param("i", $this->id);

        }


        /**
         * @param Comment $obj
         *
         * @return bool|int Inserted ID on success, false on failure
         */
        public function create($obj) {
            if (is_object($obj) && $obj instanceof Comment) {
                $this->clean($obj);
                $this->locationId = $obj->getLocationId();
                $this->userId     = $obj->getUserId();
                $this->comment    = $obj->getComment();

                if ($this->c->execute()) {
                    return $this->c->insert_id;
                }
            }

            return false;
        }

        /**
         * @param int $id
         *
         * @return bool|Comment
         */
        public function read($id) {
            return parent::read($id);
        }


        protected function createObjFromRow($row) {
            return new Comment($row->id, $row->locations_id, $row->users_id, $row->comment);
        }

        public function readAll() {
            return parent::readAllRows(self::TABLE_NAME);
        }

        /**
         * @param        $start
         * @param string $where
         *
         * @return Comment[]
         */
        public function readByLimitAsc($start, $where = "") {
            return parent::readByAmountAsc(self::TABLE_NAME, $start, $where);
        }

        /**
         * @param        $last
         * @param string $where
         *
         * @return Comment[]
         */
        public function readByLimitDesc($last, $where = "") {
            return parent::readByAmountDesc(self::TABLE_NAME, $last, $where);
        }

        /**
         * @param Comment $obj
         *
         * @return bool True on success, false on failure
         */
        public function update($obj) {
            if (is_object($obj) && is_numeric($obj->getId())) {
                $this->clean($obj);
                $old = $this->read($obj->getId());

                if (!is_bool($obj)) {
                    $this->comment = $this->isNull($obj->getComment(), $old->getComment());
                    if($this->u->execute()){
                       return true;
                    }
                }

            }
           return false;
        }

        public function totalRows($where = "") {
            return parent::totalRowsInTable(self::TABLE_NAME, $where);
        }
    }