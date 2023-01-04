<?php

include("../connect.php");

$statement = $conn->query("SELECT * FROM tb_user WHERE user_level = 0 OR user_level = 1 AND  user_status = 0 ORDER BY tb_user.user_id DESC");

$user = [];

while ($val = $statement->fetch_object()) {
    array_push($user, $val);
}

echo json_encode(['status' => true, 'user' => $user]);
