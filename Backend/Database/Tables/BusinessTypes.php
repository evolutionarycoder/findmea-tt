<?php
    /**
     * Created by PhpStorm.
     * User: prince
     * Date: 4/13/16
     * Time: 4:47 PM
     */

    namespace Backend\Database\Tables;


    use Backend\Database\Database;
    use Backend\Database\Schemas\BusinessType;

    class BusinessTypes extends Database {
        const TABLE_NAME = 'business_types';
        private $name, $icon;

        public function __construct($mysqli = false) {
            parent::__construct($mysqli);
            $table = self::TABLE_NAME;
            $this->createPreparedStatement($table, [
                "name",
                "icon"
            ]);

            $this->readPreparedStatement($table);

            $this->updatePreparedStatement($table, [
                "name",
                "icon"
            ]);

            $this->deletePreparedStatement($table);

            // bind params
            $this->c->bind_param('ss', $this->name, $this->icon);
            $this->r->bind_param('i', $this->id);
            $this->u->bind_param('ssi', $this->name, $this->icon, $this->id);
            $this->d->bind_param('i', $this->id);
        }


        /**
         * @param BusinessType $obj
         *
         * @return bool True on success false on failure
         */
        public function create($obj) {
            if (is_object($obj) && $obj instanceof BusinessType) {
                $this->clean($obj);
                $this->name = $obj->getName();
                $this->icon = $obj->getIcon();

                if ($this->c->execute()) {
                    return true;
                }
            }

            return false;
        }

        /**
         * @return BusinessType[]|bool
         */
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
         * @param BusinessType $obj
         *
         * @return bool True on success false on failure
         */
        public function update($obj) {
            if (is_object($obj) && is_numeric($obj->getId())) {
                $old = $this->read($obj->getId());
                if (!is_bool($old)) {
                    $this->name = $this->isNull($obj->getName(), $old->getName());
                    $this->icon = $this->isNull($obj->getIcon(), $old->getIcon());
                    if ($this->c->execute()) {
                        return true;
                    }
                }
            }

            return false;
        }

        /**
         * @param $id
         *
         * @return bool|BusinessType
         */
        public function read($id) {
            return parent::read($id);
        }

        public function totalRows($where = "") {
            return parent::totalRowsInTable(self::TABLE_NAME, $where);
        }

        protected function createObjFromRow($row) {
            return new BusinessType($row->id, $row->name, $row->icon);
        }
    }