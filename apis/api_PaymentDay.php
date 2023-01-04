<?php
include("../connect.php");
session_start();

if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case 'payment':
            $status = 0;
            $target_dir = "../images/";
            foreach ($_FILES['file']['name'] as $key => $val) {
                $imageFileType = pathinfo($val, PATHINFO_EXTENSION);
                if ($imageFileType != "JPG" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                    $status += 1;
                }
            }



            if ($status == 0) {
                $count = $conn->query("SELECT  MAX(rental_id) AS max_id FROM tb_rental ")->fetch_object()->max_id;
                if ($count == null) {
                    $count = 0;
                }

                $count += 1;


                $img = $count . "." . pathinfo($_FILES['file']['name'])['extension'] . ",";
                move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $_SESSION['ses_userId'] . "/slips/" . $count . "." . pathinfo($_FILES['file']['name'])['extension']);


                $statement = $conn->query("INSERT INTO tb_rental (user_id,rental_type,area_id,market_id,rental_slip,rental_money,rental_DateStart,rental_DateEnd,rental_RemainDay,rental_date,del_status)
                VALUES ('" . $_SESSION['ses_userId'] . "','" . $_REQUEST['rental_type'] . "','" . $_REQUEST['area_id'] . "','" . $_REQUEST['market_id'] . "','" . substr($img, 0, -1) . "','" . $_REQUEST['money'] . "','" . $_REQUEST['date_start'] . "','" . date("Y-m-d", strtotime('+1 day', strtotime($_REQUEST['date_start']))) . "','1','" . date("Y-m-d") . "',0)");

                if ($statement) {
                    $statement = $conn->query("UPDATE tb_area SET area_status = 2 WHERE area_id = '" . $_REQUEST['area_id'] . "'");

                    if ($statement) {
                        $statement = $conn->query("SELECT MAX(rental_id) AS max_id FROM tb_rental");
                        $max_id = $statement->fetch_object();

                        $statements = $conn->query("INSERT INTO `tb_notify`( `rental_id`,`type_status`, `noti_date`, `del_status`) VALUES ('" . $max_id->max_id . "',2,'" . date("Y/m/d") . "',0)");
                        if ($statements) {
                            echo json_encode(['status' => true, 'meg' => 'ชำระเงินสำเร็จ!', 'data' => $max_id]);
                        } else {
                            echo json_encode(['status' => false, 'meg' => 'เกิดข้อผิดพลาดโปรดลองอีกครั้ง!']);
                        }
                    }
                } else {
                    echo json_encode(['status' => false, 'meg' => "type image not correct!"]);
                }
            }

            break;
    }
}
