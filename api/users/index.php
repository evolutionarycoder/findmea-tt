<?php
    /**
     * Created by PhpStorm.
     * User: prince
     * Date: 4/12/16
     * Time: 8:24 PM
     */

    require '../../Backend/vendor/autoload.php';

    use Backend\Database\Database;
    use Backend\Database\Schemas\User;
    use Backend\Database\Tables\Users;
    use Backend\FileSystem\FileSystem;
    use Backend\ServerResponse\Response;
    use Backend\ServerResponse\UserResponse;

    $global    = require '../global.php';
    $directory = new FileSystem();
    $table     = new Users();
    $response  = new UserResponse(Response::STATUS_FAIL, Response::FAIL_TEXT);

    if (isset($_POST['type'])) {
        $type     = trim($_POST[Database::ACTION_TYPE]);
        $fname    = trim($_POST[Users::FNAME]);
        $lname    = trim($_POST[Users::LNAME]);
        $email    = trim($_POST[Users::EMAIL]);
        $password = trim($_POST[Users::PASSWORD]);
        $account  = (int)trim($_POST[Users::ACCOUNT_TYPE]);

        if ($table->emailExists($email)) {
            $response->setText('Email Already Exists');
            $type = '';
        }

        if ($type === "create") {
            $prefix = $fname . $lname . $email;
            $dir    = "system/users/{$prefix}";
            $user   = new User(null, $account, null, null, $fname, $lname, $email, $password, $prefix);
            // if user directory is created
            if ($directory->mkdir($dir)) {
                $id = $table->create($user);
                if (is_numeric($id)) {
                    $response->setStatus(Response::STATUS_OK);
                    $response->setText(Response::OK_TEXT);
                } else {
                    $directory->rmdir($dir);
                }
            }
        }
        echo $response->makeMeJson();
    }
