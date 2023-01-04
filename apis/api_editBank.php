<?php
include("../connect.php");
session_start();

if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case 'editBank':
            $status = 0;
            $target_dir = "../images/bank/";
            if (isset($_FILES['bank_img'])) {
                foreach ($_FILES['bank_img']['name'] as $key => $val) {
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

                    if (isset($_FILES['bank_img']['name'])) {
                        $img = $_REQUEST['bank_id'] . '.' . pathinfo($_FILES['bank_img']['name'])['extension'];
                        move_uploaded_file($_FILES['bank_img']['tmp_name'], $target_dir  . $_REQUEST['bank_id']  . "." . pathinfo($_FILES['bank_img']['name'])['extension']);
                    }

                    $statement = $conn->query("UPDATE tb_bank SET bank_name = '" . $_REQUEST['bank_name'] . "' , bank_img = '" . $img . "' WHERE bank_id = '" . $_REQUEST['bank_id'] . "'");
                    if ($statement) {
                        echo json_encode(['status' => true, 'meg' => 'แก้ไขข้อมูลธนาคารสำเร็จ!']);
                    } else {
                        echo json_encode(['status' => false, 'meg' => 'เกิดข้อผิดพลาดโปรดลองอีกครั้ง!']);
                    }
                } else {
                    echo json_encode(['status' => false, 'meg' => "type image not correct!"]);
                }
            } else {

                $statement = $conn->query("UPDATE tb_bank SET bank_name = '" . $_REQUEST['bank_name'] . "' WHERE bank_id = '" . $_REQUEST['bank_id'] . "'");
                if ($statement) {
                    echo json_encode(['status' => true, 'meg' => 'แก้ไขข้อมูลธนาคารสำเร็จ!']);
                } else {
                    echo json_encode(['status' => false, 'meg' => 'เกิดข้อผิดพลาดโปรดลองอีกครั้ง!']);
                }
            }

            break;
    }
}
