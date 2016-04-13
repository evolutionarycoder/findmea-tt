<?php
    /**
     * Created by PhpStorm.
     * User: evolutionarycoder
     * Date: 3/26/16
     * Time: 11:09 AM
     */

    namespace Backend\ServerResponse;


    class FollowResponse extends Response {
        public $action;
        public function __construct($status, $text) {
            parent::__construct($status, $text);
        }

        /**
         * @return mixed
         */
        public function getAction() {
            return $this->action;
        }

        /**
         * @param mixed $action
         */
        public function setAction($action) {
            $this->action = $action;
        }
        
        
    }