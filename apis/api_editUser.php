<?php
include("../connect.php");
$req = json_decode(file_get_contents("php://input"));

if (isset($req)) {
    switch ($req->action) {
        case 'editUser':
            $statement = $conn->query("UPDATE tb_user SET user_fname = '" . $req->user_fname . "',user_lname = '" . $req->user_lname . "',user_username = '" . $req->user_username . "',user_address = '" . $req->user_address . "',user_zipcode = '" . $req->user_zipcode . "',user_prefix = '" . $req->user_prefix . "',user_tel = '" . $req->user_tel . "' WHERE user_id = '" . $req->user_id . "'");

            if ($statement) {
                echo json_encode(['status' => true, 'meg' => "แก้ไขผู้ใช้งานสำเร็จ!"]);
            } else {
                echo json_encode(['status' => false, 'meg' => "เกิดข้อผิดพลาดโปรดลองอีกครั้ง!"]);
            }
            break;
    }
}
