<?php
    /**
     * Created by PhpStorm.
     * User: evolutionarycoder
     * Date: 3/26/16
     * Time: 11:06 AM
     */

    namespace Backend\ServerResponse;


    class Response {
        const STATUS_OK   = "200";
        const STATUS_FAIL = "100";
        const FAIL_TEXT   = "An error occurred";
        const OK_TEXT     = "Success";

        public $status;
        public $text;

        /**
         * Response constructor.
         *
         * @param $status
         * @param $text
         */
        public function __construct($status, $text) {
            $this->status = $status;
            $this->text   = $text;
        }

        public function allGood() {
            $this->setStatus(self::STATUS_OK);
            $this->setText(self::OK_TEXT);
        }

        /**
         * @return mixed
         */
        public function getStatus() {
            return $this->status;
        }

        /**
         * @param mixed $status
         */
        public function setStatus($status) {
            $this->status = $status;
        }

        /**
         * @return mixed
         */
        public function getText() {
            return $this->text;
        }

        /**
         * @param mixed $text
         */
        public function setText($text) {
            $this->text = $text;
        }

        public function makeMeJson() {
            return json_encode($this);
        }
    }