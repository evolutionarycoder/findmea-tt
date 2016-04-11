<?php
    /**
     * Created by PhpStorm.
     * User: Daniel M. Prince
     * Date: 4/10/16
     * Time: 7:15 PM
     */

    namespace Backend\Database\Schemas;


    class Comment {
        /**
         * @var int
         */
        public $id, $locationId, $userId;

        /**
         * @var string
         */
        public $comment;

        /**
         * Comment constructor.
         *
         * @param int    $id         ID of the row in which the comment belongs to
         * @param int    $locationId The location in which the user commented on
         * @param int    $userId     The user who commented
         * @param string $comment    The comment
         */
        public function __construct($id = null, $locationId = null, $userId = null, $comment = null) {
            $this->id         = $id;
            $this->locationId = $locationId;
            $this->userId     = $userId;
            $this->comment    = $comment;
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

        /**
         * @return string
         */
        public function getComment() {
            return $this->comment;
        }

        /**
         * @param string $comment
         */
        public function setComment($comment) {
            $this->comment = $comment;
        }


    }