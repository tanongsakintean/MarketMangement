<?php

include("../connect.php");

$statement = $conn->query("SELECT * FROM tb_banner WHERE banner_id = 1");

echo json_encode(['status' => true, 'user' => $statement->fetch_object()]);
