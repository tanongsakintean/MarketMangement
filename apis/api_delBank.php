<?php
include("../connect.php");
$req = json_decode(file_get_contents("php://input"));

if (isset($req)) {
    switch ($req->action) {
        case 'delBank':
            $statement  = $conn->query("UPDATE `tb_bank` SET del_status = 1 WHERE bank_id = '" . $req->bank_id . "' ");

            if ($statement) {
                echo json_encode(['status' => true, 'meg' => 'ลบข้อมูลสำเร็จ!']);
            } else {
                echo json_encode(['status' => false, 'meg' => 'เกิดข้อผิดพลาดโปรดลองอีกครั้ง!']);
            }
            break;
    }
}
