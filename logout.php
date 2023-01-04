<?php

session_start();
session_destroy();

echo "<script>window.location.replace('./pages/login.php')</script>";
