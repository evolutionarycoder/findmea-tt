<?php
    /**
     * Created by PhpStorm.
     * User: prince
     * Date: 4/13/16
     * Time: 12:32 PM
     */

    namespace Backend\Authorization;

    use Backend\Database\Tables\Users;

    class Auth {
        // session variables
        const USER_ID       = 'user_id';
        const ACCOUNT_TYPE  = 'account_type';
        const FNAME         = 'fname';
        const LNAME         = 'lname';
        const EMAIl         = 'email';
        const FOLDER_PREFIX = 'folder_prefix';
        const PHOTO         = 'photo';

        /**
         * Auth constructor.
         */
        public function __construct() {

        }

        /**
         * @param  string      $email           Users Email
         * @param  string      $password        Users Password
         * @param \mysqli|bool $mysqlConnection Connection to mysql db if applicable
         *
         * @return bool
         */
        public function logIn($email, $password, $mysqlConnection = false) {
            $table  = new Users($mysqlConnection);
            $result = $table->getUser($email, $password);
            if (is_object($result)) {
                $root = $_SERVER['DOCUMENT_ROOT'];
                self::USER_ID($result->getId());
                self::ACCOUNT_TYPE($result->getAccountTypeId());
                self::FNAME($result->getFname());
                self::LNAME($result->getLname());
                self::EMAIL($result->getEmail());
                self::FOLDER_PREFIX($result->getFolderPrefix());
                self::PHOTO($root . $result->getPhoto());

                return true;
            }

            return false;
        }

        /**
         * @param string $value
         *
         * @return bool|int True if value is set, or value
         */
        public static function USER_ID($value = null) {
            if (!is_null($value)) {
                self::setSession(self::USER_ID, $value);

                return true;
            }

            return self::getSession(self::USER_ID);
        }

        /**
         * @param string $value
         *
         * @return bool|int True if value is set, or value
         */
        public static function ACCOUNT_TYPE($value = null) {
            if (!is_null($value)) {
                self::setSession(self::ACCOUNT_TYPE, $value);

                return true;
            }

            return self::getSession(self::ACCOUNT_TYPE);
        }

        /**
         * @param string $value
         *
         * @return bool|string True if value is set, or value
         */
        public static function FNAME($value = null) {
            if (!is_null($value)) {
                self::setSession(self::FNAME, $value);

                return true;
            }

            return self::getSession(self::FNAME);
        }

        /**
         * @param string $value
         *
         * @return bool|string True if value is set, or value
         */
        public static function LNAME($value = null) {
            if (!is_null($value)) {
                self::setSession(self::LNAME, $value);

                return true;
            }

            return self::getSession(self::LNAME);
        }


        /**
         * @param string $value
         *
         * @return bool|string True if value is set, or value
         */
        public static function EMAIL($value = null) {
            if (!is_null($value)) {
                self::setSession(self::EMAIl, $value);

                return true;
            }

            return self::getSession(self::EMAIl);
        }


        /**
         * @param string $value
         *
         * @return bool|string True if value is set, or value
         */
        public static function FOLDER_PREFIX($value = null) {
            if (!is_null($value)) {
                self::setSession(self::FOLDER_PREFIX, $value);

                return true;
            }

            return self::getSession(self::FOLDER_PREFIX);
        }


        /**
         * @param string $value
         *
         * @return bool|string True if value is set, or value
         */
        public static function PHOTO($value = null) {
            if (!is_null($value)) {
                self::setSession(self::PHOTO, $value);

                return true;
            }

            return self::getSession(self::PHOTO);
        }


        private function setSession($key, $value) {
            $_SESSION[$key] = $value;
        }

        private function getSession($key) {
            return $_SESSION[$key];
        }

    }