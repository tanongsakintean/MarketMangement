<?php
include("../connect.php");
$req = json_decode(file_get_contents("php://input"));

if (isset($req)) {
    switch ($req->action) {
        case 'delArea':

            $statement  = $conn->query("UPDATE `tb_area` SET del_status = 1 WHERE area_id = '" . $req->area_id . "' ");

            if ($statement) {
                echo json_encode(['status' => true, 'meg' => 'ลบแผงลอยสำเร็จ!']);
            } else {
                echo json_encode(['status' => false, 'meg' => 'เกิดข้อผิดพลาดโปรดลองอีกครั้ง!']);
            }
            break;
    }
}
