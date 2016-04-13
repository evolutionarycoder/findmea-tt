<?php
    use Backend\Authorization\Auth;

    session_start();
    require $_SERVER['DOCUMENT_ROOT'] . '/Backend/vendor/autoload.php';
    if (!Auth::isLoggedIn()) {
        header('Location: ' . '/');
    }
?>