<?php
    /**
     * Created by PhpStorm.
     * User: evolutionarycoder
     * Date: 3/26/16
     * Time: 9:09 PM
     */

    namespace Backend\ServerResponse;


    class UserResponse extends Response{
        public function __construct($status, $text) {
            parent::__construct($status, $text);
        }
    }