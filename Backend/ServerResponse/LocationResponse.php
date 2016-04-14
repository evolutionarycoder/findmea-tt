<?php
    /**
     * Created by PhpStorm.
     * User: prince
     * Date: 4/14/16
     * Time: 5:23 PM
     */

    namespace Backend\ServerResponse;


    class LocationResponse extends Response {
        public function __construct($status, $text) {
            parent::__construct($status, $text);
        }
    }