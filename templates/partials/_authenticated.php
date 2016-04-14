<?php
    use Backend\Authorization\Auth;

    require $_SERVER['DOCUMENT_ROOT'] . '/Backend/vendor/autoload.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/Backend/session.php';
    if (!Auth::isLoggedIn()) {
        header('Location: ' . '/');
    }
?>