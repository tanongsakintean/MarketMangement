<?php

include("../connect.php");

$statement = $conn->query("SELECT * FROM tb_DetailMarket WHERE del_status = 0 ");

$market = [];

while ($val = $statement->fetch_object()) {
    array_push($market, $val);
}

echo json_encode(['status' => true, 'market' => $market]);
