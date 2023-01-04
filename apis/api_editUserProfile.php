<?php
include("../connect.php");
session_start();

if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case 'editUser':
            $status = 0;
            $target_dir = "../images/";
            foreach ($_FILES['user_img']['name'] as $key => $val) {
                $imageFileType = pathinfo($val, PATHINFO_EXTENSION);
                if ($imageFileType != "JPG" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                    $status += 1;
                }
            }

            if ($status == 0) {


                if (isset($_FILES['user_img']['name'])) {
                    $img =  "profile." . pathinfo($_FILES['user_img']['name'])['extension'] . ",";
                    move_uploaded_file($_FILES['user_img']['tmp_name'], $target_dir . $_SESSION['ses_userId'] . "/profile/" . "profile." . pathinfo($_FILES['user_img']['name'])['extension']);
                    $statement = $conn->query("UPDATE `tb_user` SET `user_img`='" . substr($img, 0, -1) . "',`user_prefix`='" . $_REQUEST['user_prefix'] . "',`user_fname`='" . $_REQUEST['user_fname'] . "',`user_lname`='" . $_REQUEST['user_lname'] . "',`user_tel`='" . $_REQUEST['user_tel'] . "',`user_address`='" . $_REQUEST['user_address'] . "',`user_zipcode`='" . $_REQUEST['user_zipcode'] . "' WHERE user_id = '" . $_REQUEST['user_id'] . "'");
                } else {
                    $statement = $conn->query("UPDATE `tb_user` SET `user_prefix`='" . $_REQUEST['user_prefix'] . "',`user_fname`='" . $_REQUEST['user_fname'] . "',`user_lname`='" . $_REQUEST['user_lname'] . "',`user_tel`='" . $_REQUEST['user_tel'] . "',`user_address`='" . $_REQUEST['user_address'] . "',`user_zipcode`='" . $_REQUEST['user_zipcode'] . "' WHERE user_id = '" . $_REQUEST['user_id'] . "'");
                }





                if ($statement) {
                    echo json_encode(['status' => true, 'meg' => 'แก้ไขข้อมูลสำเร็จ!']);
                } else {
                    echo json_encode(['status' => false, 'meg' => 'เกิดข้อผิดพลาดโปรดลองอีกครั้ง!']);
                }
            } else {
                echo json_encode(['status' => false, 'meg' => "type image not correct!"]);
            }

            break;
    }
}
