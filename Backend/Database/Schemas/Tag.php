<?php
    /**
     * Created by PhpStorm.
     * User: prince
     * Date: 4/10/16
     * Time: 7:56 PM
     */

    namespace Backend\Database\Schemas;


    class Tag {
        /**
         * @var int
         */
        public $id, $locationId;



        /**
         * @var string
         */
        public $tag;

        /**
         * Tag constructor.
         *
         * @param int    $id ID for which row in table
         * @param int    $locationId The location tagged
         * @param string $tag Name of the tag
         */
        public function __construct($id = null, $locationId = null, $tag = null) {
            $this->id         = $id;
            $this->locationId = $locationId;
            $this->tag        = $tag;
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
         * @return string
         */
        public function getTag() {
            return $this->tag;
        }

        /**
         * @param string $tag
         */
        public function setTag($tag) {
            $this->tag = $tag;
        }
    }