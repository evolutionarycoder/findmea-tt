<?php
    /**
     * Created by PhpStorm.
     * User: prince
     * Date: 4/10/16
     * Time: 7:56 PM
     */

    namespace Backend\Database\Schemas;


    class Role {
        /**
         * @var int
         */
        public $id, $userId;

        /**
         * @var string
         */
        public $role, $slug;

        /**
         * Role constructor.
         *
         * @param int    $id ID of row in table
         * @param int    $userId User with a Role
         * @param string $role Name of the role
         * @param string $slug Slug of the role
         */
        public function __construct($id = null, $userId = null, $role = null, $slug = null) {
            $this->id     = $id;
            $this->userId = $userId;
            $this->role   = $role;
            $this->slug   = $slug;
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
        public function getUserId() {
            return $this->userId;
        }

        /**
         * @param int $userId
         */
        public function setUserId($userId) {
            $this->userId = $userId;
        }

        /**
         * @return string
         */
        public function getRole() {
            return $this->role;
        }

        /**
         * @param string $role
         */
        public function setRole($role) {
            $this->role = $role;
        }

        /**
         * @return string
         */
        public function getSlug() {
            return $this->slug;
        }

        /**
         * @param string $slug
         */
        public function setSlug($slug) {
            $this->slug = $slug;
        }


    }