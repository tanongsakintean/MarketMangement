<?php
include("../connect.php");
session_start();

if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case 'EditDm':
            $status = 0;
            $target_dir = "../images/dm/";
            if (isset($_FILES['dm_img'])) {
                foreach ($_FILES['dm_img']['name'] as $key => $val) {
                    $imageFileType = pathinfo($val, PATHINFO_EXTENSION);
                    if ($imageFileType != "JPG" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                        $status += 1;
                    }
                }

                if ($status == 0) {

                    if (file_exists($target_dir)) {
                    } else {
                        mkdir($target_dir);
                    }

                    if (isset($_FILES['dm_img']['name'])) {
                        $img = $_REQUEST['dm_id'] . '.' . pathinfo($_FILES['dm_img']['name'])['extension'];
                        move_uploaded_file($_FILES['dm_img']['tmp_name'], $target_dir  . $_REQUEST['dm_id']  . "." . pathinfo($_FILES['dm_img']['name'])['extension']);
                    }

                    $statement = $conn->query("UPDATE tb_DetailMarket SET dm_name = '" . $_REQUEST['dm_name'] . "', dm_description = '" . $_REQUEST['dm_description'] . "' , dm_img = '" . $img . "' WHERE dm_id = '" . $_REQUEST['dm_id'] . "'");
                    if ($statement) {
                        echo json_encode(['status' => true, 'meg' => 'แก้ไขข้อมูลสำเร็จ!']);
                    } else {
                        echo json_encode(['status' => false, 'meg' => 'เกิดข้อผิดพลาดโปรดลองอีกครั้ง!']);
                    }
                } else {
                    echo json_encode(['status' => false, 'meg' => "type image not correct!"]);
                }
            } else {

                $statement = $conn->query("UPDATE tb_DetailMarket SET dm_name = '" . $_REQUEST['dm_name'] . "', dm_description = '" . $_REQUEST['dm_description'] . "'  WHERE dm_id = '" . $_REQUEST['dm_id'] . "'");
                if ($statement) {
                    echo json_encode(['status' => true, 'meg' => 'แก้ไขข้อมูลสำเร็จ!']);
                } else {
                    echo json_encode(['status' => false, 'meg' => 'เกิดข้อผิดพลาดโปรดลองอีกครั้ง!']);
                }
            }

            break;
    }
}
