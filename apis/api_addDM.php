<?php
include("../connect.php");
session_start();

if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case 'addDm':
            $status = 0;
            $target_dir = "../images/dm/";
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
                $statement = $conn->query("SELECT * FROM tb_DetailMarket WHERE dm_name = '" . $_REQUEST['dm_name'] . "'");
                if ($statement->num_rows > 0) {
                    echo json_encode(['status' => false, 'meg' => 'ชื่อตลาดซ้ำ!']);
                } else {
                    $statement = $conn->query("SELECT * FROM tb_DetailMarket");

                    if ($statement->num_rows > 0) {
                        $max_id = $conn->query("SELECT MAX(dm_id) FROM tb_DetailMarket")->fetch_object()->dm_id;

                        if (isset($_FILES['dm_img']['name'])) {
                            $img =  ($max_id + 1) . '.' . pathinfo($_FILES['dm_img']['name'])['extension'];
                            move_uploaded_file($_FILES['dm_img']['tmp_name'], $target_dir  . ($max_id + 1) . "." . pathinfo($_FILES['dm_img']['name'])['extension']);
                            $statement = $conn->query("INSERT INTO tb_DetailMarket (`dm_name`, `dm_img`, `dm_description`, `del_status`)
                             VALUES ('" . $_REQUEST['dm_name'] . "','" . $img . "','" . $_REQUEST['dm_description'] . "',0)");
                        }
                    } else {
                        if (isset($_FILES['dm_img']['name'])) {
                            $img =  "1." . pathinfo($_FILES['dm_img']['name'])['extension'];
                            move_uploaded_file($_FILES['dm_img']['tmp_name'], $target_dir  . "1." . pathinfo($_FILES['dm_img']['name'])['extension']);
                            $statement = $conn->query("INSERT INTO tb_DetailMarket (`dm_name`, `dm_img`, `dm_description`, `del_status`)
                             VALUES ('" . $_REQUEST['dm_name'] . "','" . $img . "','" . $_REQUEST['dm_description'] . "',0)");
                        } else {
                            echo json_encode(['status' => false, 'meg' => 'เกิดข้อผิดพลาดโปรดลองอีกครั้ง!']);
                        }
                    }

                    if ($statement) {
                        echo json_encode(['status' => true, 'meg' => 'เพิ่มข้อมูลสำเร็จ!']);
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
