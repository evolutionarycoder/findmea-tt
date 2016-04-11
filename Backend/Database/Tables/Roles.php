<?php
    /**
     * Created by PhpStorm.
     * User: prince
     * Date: 4/10/16
     * Time: 10:35 PM
     */

    namespace Backend\Database\Tables;


    use Backend\Database\Database;
    use Backend\Database\Schemas\Role;

    class Roles extends Database {
        const TABLE_NAME = "roles";

        private $userId, $role, $slug;

        public function __construct($mysqli = false) {
            parent::__construct($mysqli);
            $table = self::TABLE_NAME;
            $this->createPreparedStatement($table, [
                "users_id",
                "role",
                "slug"
            ]);
            $this->readPreparedStatement($table);
            $this->updatePreparedStatement($table, [
                "role",
                "slug"
            ]);
            $this->deletePreparedStatement($table);


            $this->c->bind_param("iss", $this->userId, $this->role, $this->slug);
            $this->r->bind_param("i", $this->id);
            $this->u->bind_param("ssi", $this->role, $this->slug, $this->id);
            $this->d->bind_param("i", $this->id);
        }


        /**
         * @param Role $obj
         *
         * @return bool|int Inserted ID or false on failure
         */
        public function create($obj) {
            if (is_object($obj) && $obj instanceof Role) {
                $this->clean($obj);
                $this->userId = $obj->getUserId();
                $this->role   = $obj->getRole();
                $this->slug   = $obj->getSlug();

                if ($this->c->execute()) {
                    return $this->c->insert_id;
                }
            }

            return false;
        }

        /**
         * @param $id
         *
         * @return bool|Role
         */
        public function read($id) {
            return parent::read($id);
        }


        protected function createObjFromRow($row) {
            return new Role($row->id, $row->users_id, $row->role, $row->slug);
        }

        /**
         * @return array|Role[]
         */
        public function readAll() {
            return parent::readAllRows(self::TABLE_NAME);
        }

        /**
         * @param        $start
         * @param string $where
         *
         * @return array|\Backend\Database\Schemas\Role[]
         */
        public function readByLimitAsc($start, $where = "") {
            return parent::readByAmountAsc(self::TABLE_NAME, $start, $where);
        }

        /**
         * @param        $last
         * @param string $where
         *
         * @return array|\Backend\Database\Schemas\Role[]
         */
        public function readByLimitDesc($last, $where = "") {
            return parent::readByAmountDesc(self::TABLE_NAME, $last, $where);
        }


        /**
         * @param Role $obj
         *
         * @return bool True on success, false on failure
         */
        public function update($obj) {
            if (is_object($obj) && is_numeric($obj->getId())) {
                $this->clean($obj);
                $old = $this->read($obj->getId());

                if (!is_bool($old)) {

                    $this->role = $this->isNull($obj->getRole(), $old->getRole());
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