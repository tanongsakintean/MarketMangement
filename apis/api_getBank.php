<?php

include("../connect.php");

$statement = $conn->query("SELECT * FROM tb_bank WHERE del_status = 0 ");

$bank = [];

while ($val = $statement->fetch_object()) {
    array_push($bank, $val);
}

echo json_encode(['status' => true, 'bank' => $bank]);
