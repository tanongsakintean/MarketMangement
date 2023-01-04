<?php

include("../connect.php");

$statement = $conn->query("SELECT * FROM tb_user WHERE user_level = 0 AND user_status = 0");

$user = [];
while ($val = $statement->fetch_object()) {
    array_push($user, $val);
}

echo json_encode(['status' => true, 'user' => $user]);
