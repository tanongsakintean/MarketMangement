<?php
include("../connect.php");
session_start();

if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case 'info':
            $statement = $conn->query("SELECT * FROM tb_banner ");
            if ($statement->num_rows > 0) {

                $status = 0;
                $target_dir = "../images/info/";
                foreach ($_FILES['user_profile']['name'] as $key => $val) {
                    $imageFileType = pathinfo($val, PATHINFO_EXTENSION);
                    if ($imageFileType != "JPG" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                        $status += 1;
                    }
                }
                if ($status == 0) {
                    if (isset($_FILES['user_profile']['name'])) {
                        $img =  "info." . pathinfo($_FILES['user_profile']['name'])['extension'] . ',';
                        move_uploaded_file($_FILES['user_profile']['tmp_name'], $target_dir . "info." . pathinfo($_FILES['user_profile']['name'])['extension']);
                        $statement = $conn->query("UPDATE `tb_banner` SET `banner_profile`='" . substr($img, 0, -1) . "',`banner_prefix`= '" . $_REQUEST['user_prefix'] . "',`banner_fname`='" . $_REQUEST['user_fname'] . "',`banner_lname`='" . $_REQUEST['user_lname'] . "',`banner_tel`='" . $_REQUEST['user_tel'] . "',`banner_zipcode`='" . $_REQUEST['user_zipcode'] . "',`banner_address`='" . $_REQUEST['user_address'] . "',`banner_descrption`='" . $_REQUEST['user_description'] . "' WHERE banner_id = 1 ");
                    } else {
                        $statement = $conn->query("UPDATE `tb_banner` SET `banner_prefix`= '" . $_REQUEST['user_prefix'] . "',`banner_fname`='" . $_REQUEST['user_fname'] . "',`banner_lname`='" . $_REQUEST['user_lname'] . "',`banner_tel`='" . $_REQUEST['user_tel'] . "',`banner_zipcode`='" . $_REQUEST['user_zipcode'] . "',`banner_address`='" . $_REQUEST['user_address'] . "',`banner_descrption`='" . $_REQUEST['user_description'] . "' WHERE banner_id = 1 ");
                    }

                    if ($statement) {
                        echo json_encode(['status' => true, 'meg' => 'แก้ไขข้อมูลสำเร็จ!', 'data' => $max_id]);
                    } else {
                        echo json_encode(['status' => false, 'meg' => 'เกิดข้อผิดพลาดโปรดลองอีกครั้ง!']);
                    }
                } else {
                    echo json_encode(['status' => false, 'meg' => "type image not correct!"]);
                }
            } else {

                $status = 0;
                $target_dir = "../images/info/";

                foreach ($_FILES['user_profile']['name'] as $key => $val) {
                    $imageFileType = pathinfo($val, PATHINFO_EXTENSION);
                    if ($imageFileType != "JPG" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                        $status += 1;
                    }
                }

                if ($status == 0) {

                    mkdir($target_dir);

                    $img =  "info." . pathinfo($_FILES['user_profile']['name'])['extension'] . ',';
                    move_uploaded_file($_FILES['user_profile']['tmp_name'], $target_dir . "info." . pathinfo($_FILES['user_profile']['name'])['extension']);

                    $statement = $conn->query("INSERT INTO `tb_banner`( `banner_profile`, `banner_prefix`, `banner_fname`, `banner_lname`, `banner_tel`, `banner_zipcode`, `banner_address`, `banner_descrption`, `banner_img`,`banner_title`,`banner_detail`,`banner_TelCon`,`banner_email`)
                 VALUES ('" . substr($img, 0, -1) . "','" . $_REQUEST['user_prefix'] . "','" . $_REQUEST['user_fname'] . "','" . $_REQUEST['user_lname'] . "','" . $_REQUEST['user_tel'] . "','" . $_REQUEST['user_zipcode'] . "','" . $_REQUEST['user_address'] . "','" . $_REQUEST['user_description'] . "','','','','','')");

                    if ($statement) {
                        echo json_encode(['status' => true, 'meg' => 'แก้ไขข้อมูลสำเร็จ!', 'data' => $max_id]);
                    } else {
                        echo json_encode(['status' => false, 'meg' => 'เกิดข้อผิดพลาดโปรดลองอีกครั้ง!']);
                    }
                } else {
                    echo json_encode(['status' => false, 'meg' => "type image not correct!"]);
                }
            }

            break;
    }
}
