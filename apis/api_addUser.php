<?php
include("../connect.php");
$req = json_decode(file_get_contents("php://input"));

if (isset($req)) {
    switch ($req->action) {
        case 'addUser':
            $target_dir = "../images/";
            $statement = $conn->query("SELECT * FROM tb_user WHERE user_username = '" . $req->username . "' AND user_status = 0  ");
            if ($statement->num_rows > 0) {
                echo json_encode(['status' => false, 'meg' => "มี username นี้ในระบบแล้ว!"]);
            } else {
                $statement = $conn->query("INSERT INTO `tb_user`(`user_img`, `user_username`, `user_password`, `user_prefix`, `user_fname`, `user_lname`, `user_tel`, `user_address`, `user_zipcode`, `user_date`, `user_level`, `user_status`)
                 VALUES ('','" . $req->username . "','" . $req->password . "','" . $req->prefix . "','" . $req->fname . "','" . $req->lname . "','" . $req->tel . "','" . $req->address . "','" . $req->zipcode . "',NOW(),'" . $req->user_level . "',0)");
                if ($statement) {
                    $statement = $conn->query("SELECT user_id,user_fname,user_lname,user_prefix  FROM `tb_user`  WHERE user_id = (SELECT MAX(user_id) FROM tb_user )");
                    $data = $statement->fetch_object();
                    mkdir($target_dir . $data->user_id);
                    mkdir($target_dir . $data->user_id . "/profile/");
                    mkdir($target_dir . $data->user_id . "/slips/");

                    echo json_encode(['status' => true, 'meg' => "เพิ่มผู้ใช้งานเข้าระบบสำเร็จ!", 'data' => $data]);
                } else {
                    echo json_encode(['status' => false, 'meg' => "เกิดข้อผิดพลาดโปรดลองอีกครั้ง!"]);
                }
            }
            break;
    }
}
