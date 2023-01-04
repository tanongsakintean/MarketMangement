<?php
include("../connect.php");
$req = json_decode(file_get_contents("php://input"));

if (isset($req)) {
    switch ($req->action) {
        case 'delMarket':
            $statement = $conn->query("UPDATE tb_market SET del_status = 1 WHERE market_id = '" . $req->market_id . "'");
            if ($statement) {
                echo json_encode(['status' => true, 'meg' => "ลบตลาดสำเร็จ!"]);
            } else {
                echo json_encode(['status' => false, 'meg' => "เกิดข้อผิดพลาดโปรดลองอีกครั้ง!"]);
            }
            break;
    }
}
