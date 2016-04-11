<?php
    /**
     * Created by PhpStorm.
     * User: prince
     * Date: 4/10/16
     * Time: 10:45 PM
     */

    namespace Backend\Database\Tables;


    use Backend\Database\Database;
    use Backend\Database\Schemas\AccountType;
    use Backend\Database\Schemas\User;

    class Users extends Database {

        const TABLE_NAME = "users";

        private $accId, $password, $fname, $lname, $email, $photo;

        public function __construct($mysqli = false) {
            parent::__construct($mysqli);
            $table = self::TABLE_NAME;

            $this->createPreparedStatement($table, [
                "account_type_id",
                "password",
                "fname",
                "lname",
                "email",
                "photo"
            ]);

            $this->readPreparedStatement($table);
            $this->updatePreparedStatement($table, [
                "account_type_id",
                "password",
                "fname",
                "lname",
                "email",
                "photo"
            ]);
            $this->deletePreparedStatement($table);

            $this->c->bind_param("isssss", $this->accId, $this->password, $this->fname, $this->lname, $this->email, $this->photo);

            $this->r->bind_param("i", $this->id);
            $this->u->bind_param("isssssi", $this->accId, $this->password, $this->fname, $this->lname, $this->email, $this->photo, $this->id);
            $this->d->bind_param("i", $this->id);
        }


        /**
         * @param User $obj
         *
         * @return bool|int Inserted ID or false on failure
         */
        public function create($obj) {
            if (is_object($obj) && $obj instanceof User) {
                $this->clean($obj);
                $this->accId    = $obj->getId();
                $this->password = $obj->getPassword();
                $this->fname    = $obj->getFname();
                $this->lname    = $obj->getLname();
                $this->email    = $obj->getEmail();
                $this->photo    = $obj->getPhoto();

                if ($this->c->execute()) {
                    return $this->c->insert_id;
                }
            }

            return false;
        }

        /**
         * @param $id
         *
         * @return bool|User
         */
        public function read($id) {
            return parent::read($id);
        }


        protected function createObjFromRow($row) {
            $user = new User($row->id, $row->account_type_id, null, null, $row->fname, $row->lname, $row->email, $row->password, $row->photo);

            $accountTable = new AccountTypes($this->getConnection());
            $account      = $accountTable->read($user->getId());

            $user->setAccountTypeName($account->getName());
            $user->setAccountTypeSlug($account->getSlug());

            return $user;
        }

        /**
         * @return User[]
         */
        public function readAll() {
            return parent::readAllRows(self::TABLE_NAME);
        }


        /**
         * @param        $start
         * @param string $where
         *
         * @return \Backend\Database\Schemas\User[]
         */
        public function readByLimitAsc($start, $where = "") {
            return parent::readByAmountAsc(self::TABLE_NAME, $start, $where);
        }


        /**
         * @param        $last
         * @param string $where
         *
         * @return \Backend\Database\Schemas\User[]
         */
        public function readByLimitDesc($last, $where = "") {
            return parent::readByAmountDesc(self::TABLE_NAME, $last, $where);
        }

        /**
         * @param User $obj
         *
         * @return bool
         */
        public function update($obj) {
            if (is_object($obj) && is_numeric($obj->getId())) {
                $this->clean($obj);

                $old = $this->read($obj->getId());

                if (!is_bool($old)) {

                    $this->accId    = $this->isNull($obj->getId(), $old->getId());
                    $this->password = $this->isNull($obj->getPassword(), $old->getPassword());
                    $this->fname    = $this->isNull($obj->getFname(), $old->getFname());
                    $this->lname    = $this->isNull($obj->getLname(), $old->getLname());
                    $this->email    = $this->isNull($obj->getEmail(), $old->getEmail());
                    $this->photo    = $this->isNull($obj->getPhoto(), $old->getPhoto());

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