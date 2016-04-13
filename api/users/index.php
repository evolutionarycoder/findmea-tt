<?php
    /**
     * Created by PhpStorm.
     * User: prince
     * Date: 4/12/16
     * Time: 8:24 PM
     */

    require '../../Backend/vendor/autoload.php';

    use Backend\Database\Schemas\User;
    use Backend\Database\Tables\Users;
    use Backend\ServerResponse\Response;
    use Backend\ServerResponse\UserResponse;

    $global = require '../global.php';
    $table  = new Users();

    $response = new UserResponse(Response::STATUS_FAIL, Response::FAIL_TEXT);

    if (isset($_POST['type'])) {
        $type     = trim($_POST['type']);
        $lname    = trim($_POST['lname']);
        $fname    = trim($_POST['fname']);
        $email    = trim($_POST['email']);
        $password = trim($_POST['password']);
        $account  = (int)trim($_POST['account']);

        if ($table->emailExists($email)) {
            $response->setText('Email Already Exists');
            $type = '';
        }

        if ($type === "create") {
            $directory = $global['root_dir'] . "/system/users/{$fname}.{$lname}.{$email}";
            $user      = new User(null, $account, null, null, $fname, $lname, $email, $password, "{$fname}.{$lname}.{$email}");
            // if user directory is created
            if (mkdir($directory)) {
                $id = $table->create($user);
                if (is_numeric($id)) {
                    $response->setStatus(Response::STATUS_OK);
                    $response->setText(Response::OK_TEXT);
                } else {
                    rmdir($directory);
                }
            }
        }
        echo $response->makeMeJson();
    }
