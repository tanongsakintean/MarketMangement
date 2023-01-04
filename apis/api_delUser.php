<?php
include("../connect.php");
$req = json_decode(file_get_contents("php://input"));

if (isset($req)) {
    switch ($req->action) {
        case 'delUser':
            $statement = $conn->query("UPDATE tb_user SET user_status = 1 WHERE user_id = '" . $req->user_id . "'");
            if ($statement) {
                echo json_encode(['status' => true, 'meg' => "ลบผู้ใช้งานสำเร็จ!"]);
            } else {
                echo json_encode(['status' => false, 'meg' => "เกิดข้อผิดพลาดโปรดลองอีกครั้ง!"]);
            }
            break;
    }
}
