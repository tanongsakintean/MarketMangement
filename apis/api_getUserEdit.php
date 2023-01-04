<?php
session_start();
include("../connect.php");

$statement = $conn->query("SELECT * FROM tb_user WHERE user_id = '" . $_SESSION['ses_userId'] . "'");

echo json_encode(['status' => true, 'user' => $statement->fetch_object()]);
 