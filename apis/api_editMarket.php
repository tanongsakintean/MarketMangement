<?php
include("../connect.php");
$req = json_decode(file_get_contents("php://input"));

if (isset($req)) {
    switch ($req->action) {
        case 'editMarket':
            $statement = $conn->query("UPDATE `tb_market` SET `market_name`='" . $req->market_name . "',`market_address`='" . $req->market_address . "',`market_row`='" . $req->market_row . "',`market_block`='" . $req->market_block . "' WHERE market_id = '" . $req->market_id . "' ");
            if ($statement) {
                echo json_encode(['status' => true, 'meg' => 'แก้ไขตลาดสำเร็จ!']);
            } else {
                echo json_encode(['status' => false, 'meg' => 'เกิดข้อผิดพลาดโปรดลองอีกครั้ง!']);
            }
            break;
    }
}
