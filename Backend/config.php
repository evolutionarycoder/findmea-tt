<?php
    /**
     * Created by PhpStorm.
     * User: prince
     * Date: 4/10/16
     * Time: 6:39 PM
     */
    define("ENV", "local");
    if (ENV === "local") {
        return [
            "host"     => "localhost",
            "user"     => "root",
            "password" => "prince",
            "database" => "findmea"
        ];
    } else {
        return [
            "host"     => "",
            "user"     => "",
            "password" => "",
            "database" => ""
        ];
    }