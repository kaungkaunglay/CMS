<?php
require "../layouts/header.php";
    session_start();
    session_unset();
    session_destroy();
    header("Location: ".ADMINROOT."/admins/login-admins.php");

?>