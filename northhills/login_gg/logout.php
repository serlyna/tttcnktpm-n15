<?php
    session_start();
    unset($_SESSION['current_user']);
    unset($_SESSION['access_token']);
    session_destroy();
    header('Location: ../index.php');
?>