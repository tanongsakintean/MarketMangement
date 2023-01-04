<?php
include("../connect.php");
$req = json_decode(file_get_contents("php://input"));

if (isset($req)) {
    switch ($req->action) {
        case 'confirmPay':
            $statement = $conn->query("UPDATE tb_area SET area_status = 3 WHERE area_id = '" . $req->area_id . "'");

            if ($statement) {
                $statement = $conn->query("UPDATE tb_notify SET type_status = 1 WHERE  rental_id = '" . $req->rental_id . "'");
                echo json_encode(['status' => true, 'meg' => 'ยืนยันการชำระเงินสำเร็จ!']);
            } else {
                echo json_encode(['status' => false, 'meg' => 'เกิดข้อผิดพลาดโปรดลองอีกครั้ง!']);
            }
            break;
    }
}
