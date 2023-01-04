<?php
session_start();
///เขื่อมกับ ฐานข้อมูล
include("../connect.php");
$req = json_decode(file_get_contents("php://input"));

///เช็คค่าในตัวแปร req มีค่าไหม
if (isset($req)) {
    switch ($req->action) {
        case 'login':
            $statement = $conn->query("SELECT * FROM tb_user WHERE user_username = '" . $req->user_username . "' AND user_password = '" . $req->user_password . "' AND user_status = 0 ");
            if ($statement->num_rows > 0) {
                $user = $statement->fetch_object();
                $_SESSION['ses_id'] = session_id();
                $_SESSION['ses_username'] = $user->user_username;
                $_SESSION['ses_fname'] = $user->user_fname;
                $_SESSION['ses_lname'] = $user->user_lname;
                $_SESSION['ses_level'] = $user->user_level;
                $_SESSION['ses_userId'] = $user->user_id;
                if ($user->user_prefix == 1) {
                    $_SESSION['ses_prefix'] = "นาย";
                } elseif ($user->user_prefix == 2) {
                    $_SESSION['ses_prefix'] = "นาง";
                } else {
                    $_SESSION['ses_prefix'] = "นางสาว";
                }
                $_SESSION['ses_tel'] = $user->user_tel;
                $statement = $conn->query("UPDATE tb_user SET user_date = NOW() WHERE user_id = '" . $user->user_id . "'");
                include("./api_countDate.php");
                echo json_encode(['status' => true, 'meg' => "ยินดีต้อนรับเข้าสู่ระบบ!"]);
            } else {
                echo json_encode(['status' => false, 'meg' => "ชื่อผู้ใช้งาน หรือ รหัสผ่าน ไม่ถูกต้องลองใหม่อีกครั้ง!"]);
            }
            break;
    }
}
