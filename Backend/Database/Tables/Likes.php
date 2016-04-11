<?php
    /**
     * Created by PhpStorm.
     * User: prince
     * Date: 4/10/16
     * Time: 9:14 PM
     */

    namespace Backend\Database\Tables;


    use Backend\Database\Database;
    use Backend\Database\Schemas\Like;

    class Likes extends Database {
        const TABLE_NAME = "likes";

        private $locationId, $userId;

        public function __construct($mysqli = false) {
            parent::__construct($mysqli);

            $table = self::TABLE_NAME;

            // create prepared statements

            $this->createPreparedStatement($table, [
                "locations_id",
                "users_id"
            ]);
            $this->readPreparedStatement($table);

            // update not necessary
            //$this->updatePreparedStatement($table, []);

            $this->deletePreparedStatement($table);

            // bind params

            $this->c->bind_param("ii", $this->locationId, $this->userId);
            $this->r->bind_param("i", $this->id);
            $this->d->bind_param("i", $this->id);
        }


        /**
         * @param Like $obj
         *
         * @return bool|int Inserted ID or false on failure
         */
        public function create($obj) {
            if (is_object($obj) && $obj instanceof Like) {
                $this->clean($obj);
                $this->locationId = $obj->getLocationId();
                $this->userId     = $obj->getUserId();

                if ($this->c->execute()) {
                    return $this->c->insert_id;
                }
            }

            return false;
        }

        protected function createObjFromRow($row) {
            return new Like($row->id, $row->locations_id, $row->users_id);
        }

        public function readAll() {
            return parent::readAllRows(self::TABLE_NAME);
        }

        public function readByLimitAsc($start, $where = "") {
            return parent::readByAmountAsc(self::TABLE_NAME, $start, $where);
        }

        public function readByLimitDesc($last, $where = "") {
            return parent::readByAmountDesc(self::TABLE_NAME, $last, $where);
        }

        public function update($obj) {
            // Not Needed
        }

        public function totalRows($where = "") {
            return parent::totalRowsInTable(self::TABLE_NAME, $where);
        }
    }