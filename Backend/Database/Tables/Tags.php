<?php
    /**
     * Created by PhpStorm.
     * User: prince
     * Date: 4/10/16
     * Time: 10:14 PM
     */

    namespace Backend\Database\Tables;


    use Backend\Database\Database;
    use Backend\Database\Schemas\Tag;

    class Tags extends Database {

        const TABLE_NAME = "tags";

        // prepared statement variables

        private $locationId, $tag;

        public function __construct($mysqli = false) {
            parent::__construct($mysqli);
            $table = self::TABLE_NAME;
            $this->createPreparedStatement($table, [
                "locations_id",
                "tag"
            ]);
            $this->readPreparedStatement($table);
            $this->updatePreparedStatement($table, [
                "tag"
            ]);
            $this->deletePreparedStatement($table);

            // bind params
            $this->c->bind_param("is", $this->locationId, $this->tag);
            $this->r->bind_param("i", $this->id);
            $this->u->bind_param("si", $this->tag, $this->id);
            $this->d->bind_param("i", $this->id);
        }


        /**
         * @param Tag $obj
         *
         * @return bool|int Inserted ID or false on failure
         */
        public function create($obj) {
            if (is_object($obj) && $obj instanceof Tag) {
                $this->locationId = $obj->getLocationId();
                $this->tag        = $obj->getTag();

                if ($this->c->execute()) {
                    return $this->c->insert_id;
                }
            }

            return false;
        }

        /**
         * @param $id
         *
         * @return bool|Tag
         */
        public function read($id) {
            return parent::read($id);
        }


        protected function createObjFromRow($row) {
            return new Tag($row->id, $row->locations_id, $row->tag);
        }

        /**
         * @return array|Tag[]
         */
        public function readAll() {
            return parent::readAllRows(self::TABLE_NAME);
        }


        /**
         * @param        $start
         * @param string $where
         *
         * @return \Backend\Database\Schemas\Tag[]
         */
        public function readByLimitAsc($start, $where = "") {
            return parent::readByAmountAsc(self::TABLE_NAME, $start, $where);
        }


        /**
         * @param        $last
         * @param string $where
         *
         * @return \Backend\Database\Schemas\Tag[]
         */
        public function readByLimitDesc($last, $where = "") {
            return parent::readByAmountDesc(self::TABLE_NAME, $last, $where);
        }

        /**
         * @param  Tag $obj
         */
        public function update($obj) {
            if (is_object($obj) && is_numeric($obj->getId())) {
                $this->clean($obj);
                $old = $this->read($obj->getId());

                if (!is_bool($old)) {
                    $this->tag = $this->isNull($obj->getTag(), $old->getTag());
                }
            }
        }

        public function totalRows($where = "") {
            return parent::totalRowsInTable(self::TABLE_NAME, $where);
        }
    }