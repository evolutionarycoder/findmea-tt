<?php
    /**
     * Created by PhpStorm.
     * User: prince
     * Date: 4/10/16
     * Time: 8:19 PM
     */

    namespace Backend\Database\Tables;


    use Backend\Database\Database;
    use Backend\Database\Schemas\AccountType;

    class AccountTypes extends Database {
        const TABLE_NAME = "account_type";

        // prepared statement variables

        private $name, $slug;


        public function __construct($mysqli = false) {
            parent::__construct($mysqli);
            $table = self::TABLE_NAME;

            // prepared statements
            $this->createPreparedStatement($table, [
                "name",
                "slug"
            ]);
            $this->readPreparedStatement($table);
            $this->updatePreparedStatement($table, [
                "name",
                "slug"
            ]);
            $this->deletePreparedStatement($table);

            // bind parameters
            $this->c->bind_param("ss", $this->name, $this->slug);
            $this->r->bind_param("i", $this->id);
            $this->u->bind_param("ssi", $this->name, $this->slug, $this->id);
            $this->d->bind_param("i", $this->id);
        }


        /**
         * @param AccountType $obj
         *
         * @return int|bool Inserted ID on success and False on failure
         */
        public function create($obj) {
            if (is_object($obj) && $obj instanceof AccountType) {
                $this->clean($obj);
                $this->name = $obj->getName();
                $this->slug = $obj->getSlug();
                if ($this->c->execute()) {
                    $this->c->insert_id;
                }
            }

            return false;
        }

        /**
         * @param $id
         *
         * @return bool|AccountType Object on success, false on failure
         */
        public function read($id) {
            return parent::read($id);
        }


        protected function createObjFromRow($row) {
            return new AccountType($row->id, $row->name, $row->slug);
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

        /**
         * @param AccountType $obj
         *
         * @return bool True on success, False on failure
         */
        public function update($obj) {
            if (is_object($obj) && is_numeric($obj->getId())) {
                $this->clean($obj);
                $old = $this->read($obj->getId());
                if (!is_bool($old)) {
                    $this->name = $this->isNull($obj->getName(), $old->getName());
                    $this->slug = $this->isNull($obj->getSlug(), $old->getSlug());

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