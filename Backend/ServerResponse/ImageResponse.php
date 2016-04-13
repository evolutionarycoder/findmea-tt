<?php
    /**
     * Created by PhpStorm.
     * User: evolutionarycoder
     * Date: 3/26/16
     * Time: 11:41 AM
     */

    namespace Backend\ServerResponse;



    class ImageResponse extends Response{
        public $id;
        public function __construct($status, $text, $id) {
            parent::__construct($status, $text);
            $this->id = $id;
        }

        /**
         * @return mixed
         */
        public function getId() {
            return $this->id;
        }

        /**
         * @param mixed $id
         */
        public function setId($id) {
            $this->id = $id;
        }
    }