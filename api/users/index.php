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
    use Backend\Database\Schemas\User;
    use Backend\Database\Tables\Users;
    use Backend\FileSystem\FileSystem;
    use Backend\ServerResponse\Response;
    use Backend\ServerResponse\UserResponse;

    $global    = require '../global.php';
    include $global["root_dir"] . '/Backend/session.php';

    $auth      = new Auth();
    $directory = new FileSystem();
    $table     = new Users();
    $response  = new UserResponse(Response::STATUS_FAIL, Response::FAIL_TEXT);

    if (isset($_POST['type'])) {
        $type     = trim($_POST[Database::ACTION_TYPE]);
        $email    = trim($_POST[Users::EMAIL]);
        $password = trim($_POST[Users::PASSWORD]);


        if ($type === "create") {
            // check email if it exists
            if ($table->emailExists($email)) {
                $response->setText('Email Already Exists');
                $type = '';
            }

            $fname   = trim($_POST[Users::FNAME]);
            $lname   = trim($_POST[Users::LNAME]);
            $account = (int)trim($_POST[Users::ACCOUNT_TYPE]);

            $prefix = $fname . $lname . $email;
            $dir    = "system/users/{$prefix}";
            $user   = new User(null, $account, null, null, $fname, $lname, $email, $password, $prefix);
            // if user directory is created
            if ($directory->mkdir($dir)) {
                $id = $table->create($user);
                if (is_numeric($id)) {
                    $response->allGood();
                } else {
                    $directory->rmdir($dir);
                }
            }
        }


        if ($type === 'login') {
            $response->setText('Invalid Credentials');
            if ($auth->logIn($email, $password, $table->getConnection())){
                $response->allGood();
            }
        }

        echo $response->makeMeJson();
    }
