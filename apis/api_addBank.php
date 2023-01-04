<?php
include("../connect.php");
session_start();

if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case 'addBank':
            $status = 0;
            $target_dir = "../images/bank/";
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

                $statement = $conn->query("SELECT * FROM tb_bank WHERE bank_name = '" . $_REQUEST['bank_name'] . "'");
                if ($statement->num_rows > 0) {
                    echo json_encode(['status' => false, 'meg' => 'ชื่อธนาคารซ้ำ!']);
                } else {
                    $statement = $conn->query("SELECT * FROM tb_bank");

                    if ($statement->num_rows > 0) {
                        $max_id = $conn->query("SELECT MAX(bank_id) AS max_id FROM tb_bank")->fetch_object()->max_id;

                        if (isset($_FILES['bank_img']['name'])) {
                            $img =  ($max_id + 1) . '.' . pathinfo($_FILES['bank_img']['name'])['extension'];
                            move_uploaded_file($_FILES['bank_img']['tmp_name'], $target_dir  . ($max_id + 1) . "." . pathinfo($_FILES['bank_img']['name'])['extension']);
                            $statement = $conn->query("INSERT INTO tb_bank (`bank_name`, `bank_img`, `del_status`)
                             VALUES ('" . $_REQUEST['bank_name'] . "','" . $img . "',0)");
                        }
                    } else {
                        if (isset($_FILES['bank_img']['name'])) {
                            $img =  "1." . pathinfo($_FILES['bank_img']['name'])['extension'];
                            move_uploaded_file($_FILES['bank_img']['tmp_name'], $target_dir  . "1." . pathinfo($_FILES['bank_img']['name'])['extension']);
                            $statement = $conn->query("INSERT INTO tb_bank (`bank_name`, `bank_img`, `del_status`)
                             VALUES ('" . $_REQUEST['bank_name'] . "','" . $img . "',0)");
                        } else {
                            echo json_encode(['status' => false, 'meg' => 'เกิดข้อผิดพลาดโปรดลองอีกครั้ง!']);
                        }
                    }

                    if ($statement) {
                        echo json_encode(['status' => true, 'meg' => 'เพิ่มธนาคารสำเร็จ!']);
                    } else {
                        echo json_encode(['status' => false, 'meg' => 'เกิดข้อผิดพลาดโปรดลองอีกครั้ง!']);
                    }
                }
            } else {
                echo json_encode(['status' => false, 'meg' => "type image not correct!"]);
            }

            break;
    }
}
