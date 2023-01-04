<?php
include("../connect.php");
$req = json_decode(file_get_contents("php://input"));

if (isset($req)) {
    switch ($req->action) {
        case 'delDM':
            $statement  = $conn->query("UPDATE `tb_DetailMarket` SET del_status = 1 WHERE dm_id = '" . $req->dm_id . "' ");

            if ($statement) {
                echo json_encode(['status' => true, 'meg' => 'ลบข้อมูลสำเร็จ!']);
            } else {
                echo json_encode(['status' => false, 'meg' => 'เกิดข้อผิดพลาดโปรดลองอีกครั้ง!']);
            }
            break;
    }
}
