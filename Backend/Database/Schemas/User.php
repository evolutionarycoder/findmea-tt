<?php
    /**
     * Created by PhpStorm.
     * User: prince
     * Date: 4/10/16
     * Time: 7:56 PM
     */

    namespace Backend\Database\Schemas;


    class User {
        /**
         * @var int
         */
        public $id, $accountTypeId;

        /**
         * @var string
         */
        public $accountTypeName, $accountTypeSlug, $fname, $lname, $email, $password, $photo;

        /**
         * User constructor.
         *
         * @param int    $id              ID of the row in the table
         * @param int    $accountTypeId   The account ID of a user. (I.E 1 = Business or 2 = Personal)
         * @param string $accountTypeName Name of the account. (I.E Business or Personal)
         * @param string $accountTypeSlug Keyword for the account. (bses = Business or pnl = Personal
         * @param string $fname           Users first name
         * @param string $lname           Users last name
         * @param string $email           User email
         * @param string $password        Users Password
         * @param string $photo           User photo location
         */
        public function __construct($id = null, $accountTypeId = null, $accountTypeName = null, $accountTypeSlug = null, $fname = null, $lname = null, $email = null, $password = null, $photo = "/system/imgs/default_profile.png") {
            $this->id              = $id;
            $this->accountTypeId   = $accountTypeId;
            $this->accountTypeName = $accountTypeName;
            $this->accountTypeSlug = $accountTypeSlug;
            $this->fname           = $fname;
            $this->lname           = $lname;
            $this->email           = $email;
            $this->password        = $password;
            $this->photo           = $photo;
        }


        /**
         * @return int
         */
        public function getId() {
            return $this->id;
        }

        /**
         * @param int $id
         */
        public function setId($id) {
            $this->id = $id;
        }

        /**
         * @return int
         */
        public function getAccountTypeId() {
            return $this->accountTypeId;
        }

        /**
         * @param int $accountTypeId
         */
        public function setAccountTypeId($accountTypeId) {
            $this->accountTypeId = $accountTypeId;
        }

        /**
         * @return string
         */
        public function getAccountTypeName() {
            return $this->accountTypeName;
        }

        /**
         * @param string $accountTypeName
         */
        public function setAccountTypeName($accountTypeName) {
            $this->accountTypeName = $accountTypeName;
        }

        /**
         * @return string
         */
        public function getAccountTypeSlug() {
            return $this->accountTypeSlug;
        }

        /**
         * @param string $accountTypeSlug
         */
        public function setAccountTypeSlug($accountTypeSlug) {
            $this->accountTypeSlug = $accountTypeSlug;
        }

        /**
         * @return string
         */
        public function getFname() {
            return $this->fname;
        }

        /**
         * @param string $fname
         */
        public function setFname($fname) {
            $this->fname = $fname;
        }

        /**
         * @return string
         */
        public function getLname() {
            return $this->lname;
        }

        /**
         * @param string $lname
         */
        public function setLname($lname) {
            $this->lname = $lname;
        }

        /**
         * @return string
         */
        public function getEmail() {
            return $this->email;
        }

        /**
         * @param string $email
         */
        public function setEmail($email) {
            $this->email = $email;
        }

        /**
         * @return string
         */
        public function getPassword() {
            return $this->password;
        }

        /**
         * @param string $password
         */
        public function setPassword($password) {
            $this->password = $password;
        }

        /**
         * @return string
         */
        public function getPhoto() {
            return $this->photo;
        }

        /**
         * @param string $photo
         */
        public function setPhoto($photo) {
            $this->photo = $photo;
        }
    }