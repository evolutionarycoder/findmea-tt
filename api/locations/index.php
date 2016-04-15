<?php
    /**
     * Created by PhpStorm.
     * User: prince
     * Date: 4/12/16
     * Time: 8:24 PM
     */
    require '../../Backend/vendor/autoload.php';

    use Backend\Authorization\Auth;
    use Backend\Database\Database;
    use Backend\Database\Schemas\Location;
    use Backend\Database\Tables\Locations;
    use Backend\ServerResponse\LocationResponse;
    use Backend\ServerResponse\Response;

    $global = require '../global.php';
    include $global["root_dir"] . '/Backend/session.php';

    $table = new Locations();
    if (isset($_GET['type'])) {
        $type = trim($_GET[Database::ACTION_TYPE]);
        if ($type === "fetch") {
            $data = $table->readAll();
            echo json_encode($data, JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
        }
    }

    if (isset($_POST['type'])) {
        $response = new LocationResponse(Response::STATUS_FAIL, Response::FAIL_TEXT);
        $type     = trim($_POST[Database::ACTION_TYPE]);
        if ($type === "create") {
            $userId       = Auth::USER_ID();
            $area         = $_POST[Locations::AREA];
            $businessType = $_POST[Locations::BUSINESS_TYPE];
            $name         = $_POST[Locations::NAME];
            $phone        = $_POST[Locations::PHONE];
            $website      = $_POST[Locations::WEBSITE];
            $desc         = $_POST[Locations::DESC];
            $lat          = $_POST[Locations::LAT];
            $lng          = $_POST[Locations::LNG];
            $location     = new Location(
                null,
                $userId,
                $businessType,
                null, null,
                $lat, $lng,
                $area,
                $name,
                $desc,
                $phone,
                $website);
            if ($table->create($location)) {
                $response->allGood();
            }
        }

        if ($type === 'delete') {
            $locationID = $_POST['id'];
            if (is_numeric($locationID)) {
                $location = $table->read($locationID);
                if (!is_bool($location)) {
                    // means location is there
                    // check is location belongs to user
                    $userId = (int)$location->getUserId();
                    if (Auth::USER_ID() === $userId) {
                        // correct user issued delete
                        if ($table->delete($locationID)) {
                            $response->allGood();
                        }
                    }
                }
            }
        }

        if ($type === 'update') {
            $locationID = $_POST['id'];
            if (is_numeric($locationID)) {
                $location = $table->read($locationID);
                $area     = $_POST[Locations::AREA];
                $name     = $_POST[Locations::NAME];
                $phone    = $_POST[Locations::PHONE];
                $website  = $_POST[Locations::WEBSITE];
                $desc     = $_POST[Locations::DESC];
                if (!is_bool($location)) {
                    // means location is there
                    // check is location belongs to user
                    $userId = (int)$location->getUserId();
                    if (Auth::USER_ID() === $userId) {
                        $obj = new Location($locationID, null, null, null, null, null, null, $area, $name, $desc, $phone, $website);
                        // correct user issued delete
                        if ($table->update($obj)) {
                            $response->allGood();
                        }
                    }
                }
            }
        }

        echo $response->makeMeJson();
    }