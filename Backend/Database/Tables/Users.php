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

        const TABLE_NAME   = "users";
        const LNAME        = 'lname';
        const FNAME        = 'fname';
        const EMAIL        = 'email';
        const PASSWORD     = 'password';
        const ACCOUNT_TYPE = 'account';

        private $accId, $password, $fname, $lname, $email, $folderPrefix, $photo;

        // prepared statement
        private $get_user;

        public function __construct($mysqli = false) {
            parent::__construct($mysqli);
            $table = self::TABLE_NAME;

            $this->createPreparedStatement($table, [
                "account_type_id",
                "password",
                "fname",
                "lname",
                "email",
                "folder_prefix",
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

            $this->c->bind_param("issssss", $this->accId, $this->password, $this->fname, $this->lname, $this->email, $this->folderPrefix, $this->photo);

            $this->r->bind_param("i", $this->id);
            $this->u->bind_param("isssssi", $this->accId, $this->password, $this->fname, $this->lname, $this->email, $this->photo, $this->id);
            $this->d->bind_param("i", $this->id);

            $this->get_user = $this->connection->prepare('SELECT * FROM users  WHERE email = ? AND password = ?;');
            $this->get_user->bind_param('ss', $this->email, $this->password);
        }


        /**
         * @param User $obj
         *
         * @return bool|int Inserted ID or false on failure
         */
        public function create($obj) {
            if (is_object($obj) && $obj instanceof User) {
                $this->clean($obj);
                $this->accId        = $obj->getAccountTypeId();
                $this->password     = $obj->getPassword();
                $this->fname        = $obj->getFname();
                $this->lname        = $obj->getLname();
                $this->email        = $obj->getEmail();
                $this->folderPrefix = $obj->getFolderPrefix();
                $this->photo        = $obj->getPhoto();

                if ($this->c->execute()) {
                    return $this->c->insert_id;
                } else {
                    echo $this->c->error;
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

        public function emailExists($email) {
            $email  = $this->cleanString($email);
            $query  = "select * from users  where email = '{$email}';";
            $result = mysqli_query($this->connection, $query);
            if (mysqli_num_rows($result) > 0) {
                return true;
            }

            return false;
        }

        /**
         * @param string $email    Email for user to look for
         * @param string $password Password for user to look for
         *
         * @return User|bool User object on success, false on failure
         */
        public function getUser($email, $password) {
            $this->cleanString($email);
            $this->cleanString($password);

            $this->email    = $email;
            $this->password = $password;

            if ($this->get_user->execute()) {
                $result = $this->get_user->get_result();
                // means a user was found
                if ($result->num_rows > 0) {
                    $obj = $result->fetch_object();
                    return $this->createObjFromRow($obj);
                }
            }

            return false;
        }

        protected function createObjFromRow($row) {
            $user = new User($row->id, $row->account_type_id, null, null, $row->fname, $row->lname, $row->email, $row->password, $row->folder_prefix, $row->photo);

            $accountTable = new AccountTypes($this->getConnection());
            $account      = $accountTable->read($user->getAccountTypeId());

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

                    if ($this->u->execute()) {
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