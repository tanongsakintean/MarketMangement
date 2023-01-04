<?php
session_start();
if ($_SESSION['ses_id'] != session_id()) {
    echo "<script>window.location.replace('./pages/login.php');</script>";
} else {
    if ($_SESSION['ses_level'] == 0) {
        require "./layouts/header.php";
        require "./layouts/body.php";
        require "./layouts/js.php";
    } else if ($_SESSION['ses_level'] == 1) {
        require "./layouts/header.php";
        require "./layouts/body.php";
        require "./layouts/js.php";
    } else {
        require "./layouts/header.php";
        require "./layouts/body.php";
        require "./layouts/js.php";
    }
}
