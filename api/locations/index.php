<?php
    /**
     * Created by PhpStorm.
     * User: prince
     * Date: 4/12/16
     * Time: 8:24 PM
     */
    session_start();
    require '../../Backend/vendor/autoload.php';

    use Backend\Database\Database;
    use Backend\Database\Tables\Locations;

    $global = require '../global.php';
    $table  = new Locations();
    if (isset($_GET['type'])) {
        $type = trim($_GET[Database::ACTION_TYPE]);
        if ($type === "fetch") {
            $data = $table->readAll();
            echo json_encode($data, JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
        }
    }
