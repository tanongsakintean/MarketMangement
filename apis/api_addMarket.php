<?php
include("../connect.php");
$req = json_decode(file_get_contents("php://input"));

if (isset($req)) {
    switch ($req->action) {
        case 'addMarket':
            $statement = $conn->query("SELECT * FROM tb_market WHERE market_name = '" . $req->market_name . "' AND del_status = 0  ");
            if ($statement->num_rows > 0) {
                echo json_encode(['status' => false, 'meg' => "มี ชื่อตลาดนี้ในระบบแล้ว!"]);
            } else {
                $statement = $conn->query("INSERT INTO `tb_market`(market_name,market_address,market_row,market_block,del_status)
                 VALUES ('" . $req->market_name . "','" . $req->market_address . "','" . (int)$req->market_row . "','" . (int)$req->market_block . "',0)");
                if ($statement) {
                    echo json_encode(['status' => true, 'meg' => "เพิ่มตลาดเข้าระบบสำเร็จ!"]);
                } else {
                    echo json_encode(['status' => false, 'meg' => "เกิดข้อผิดพลาดโปรดลองอีกครั้ง!"]);
                }
            }
            break;
    }
}
