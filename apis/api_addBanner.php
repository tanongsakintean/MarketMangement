<?php
include("../connect.php");
session_start();

if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case 'addImgBanner':
            $statement = $conn->query("SELECT * FROM tb_banner ");
            if ($statement->num_rows > 0) {
                $status = 0;
                $target_dir = "../images/banner/";
                foreach ($_FILES['banner_img']['name'] as $key => $val) {
                    $imageFileType = pathinfo($val, PATHINFO_EXTENSION);
                    if ($imageFileType != "JPG" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                        $status += 1;
                    }
                }

                if ($status == 0) {

                    $img = "";

                    if (file_exists($target_dir)) {
                    } else {
                        mkdir($target_dir);
                    }

                    foreach ($_FILES['banner_img']['name'] as $key => $val) {
                        $img .=  $key . "." . pathinfo($val, PATHINFO_EXTENSION) . ',';
                    }

                    foreach ($_FILES['banner_img']['tmp_name'] as $key => $val) {
                        move_uploaded_file($val, $target_dir . $key . "." . pathinfo($_FILES['banner_img']['name'][$key])['extension']);
                    }


                    $statement = $conn->query("UPDATE `tb_banner` SET banner_img = '" . substr($img, 0, -1) . "' WHERE banner_id = 1 ");

                    if ($statement) {
                        echo json_encode(['status' => true, 'meg' => 'แก้ไขข้อมูลสำเร็จ!']);
                    } else {
                        echo json_encode(['status' => false, 'meg' => 'เกิดข้อผิดพลาดโปรดลองอีกครั้ง!']);
                    }
                } else {
                    echo json_encode(['status' => false, 'meg' => "type image not correct!"]);
                }
            } else {
                $statement = $conn->query("INSERT INTO `tb_banner`( `banner_profile`, `banner_prefix`, `banner_fname`, `banner_lname`, `banner_tel`, `banner_zipcode`, `banner_address`, `banner_descrption`, `banner_img`, `banner_title`, `banner_detail`, `banner_TelCon`, `banner_email`)
                VALUES ('','','','','','','','','" . substr($img, 0, -1) . "','','','','')");

                if ($statement) {
                    echo json_encode(['status' => true, 'meg' => 'เพิ่มข้อมูลสำเร็จ!']);
                } else {
                    echo json_encode(['status' => false, 'meg' => 'เกิดข้อผิดพลาดโปรดลองอีกครั้ง!']);
                }
            }


            break;
    }
}
