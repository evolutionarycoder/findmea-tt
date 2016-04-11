<?php
    /**
     * Created by PhpStorm.
     * User: prince
     * Date: 4/10/16
     * Time: 7:54 PM
     */

    namespace Backend\Database\Schemas;


    class Like {
        /**
         * @var int
         */
        public $id, $locationId, $userId;

        /**
         * Like constructor.
         *
         * @param int $id         ID of row in table
         * @param int $locationId Location that was liked
         * @param int $userId     User that Liked the location
         */
        public function __construct($id = null, $locationId = null, $userId = null) {
            $this->id         = $id;
            $this->locationId = $locationId;
            $this->userId     = $userId;
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
        public function getLocationId() {
            return $this->locationId;
        }

        /**
         * @param int $locationId
         */
        public function setLocationId($locationId) {
            $this->locationId = $locationId;
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

    }