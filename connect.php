<?php
$ServerName = "localhost";
$Username = "root";
$Password = "root";
$Db = "Market";

// Create connection
$conn = new mysqli($ServerName, $Username, $Password, $Db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
