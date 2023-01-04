<?php
include("../connect.php");
$req = json_decode(file_get_contents("php://input"));

if (isset($req)) {
    switch ($req->action) {
        case 'AddDetailMarket':

            $statement = $conn->query("SELECT * FROM tb_banner ");


            if ($statement->num_rows > 0) {
                $statement = $conn->query("UPDATE tb_banner SET banner_title = '" . $req->market_name . "' , banner_detail = '" . $req->market_detail . "' , banner_TelCon = '" . $req->market_tel . "' , banner_email = '" . $req->market_email . "' WHERE banner_id = 1");

                if ($statement) {
                    echo json_encode(['status' => true, 'meg' => 'แก้ไขข้อมูลตลาดสำเร็จ!']);
                } else {
                    echo json_encode(['status' => false, 'meg' => 'เกิดข้อผิดพลาดโปรดลองอีกครั้ง!']);
                }
            } else {
                $statement = $conn->query("INSERT INTO `tb_banner`( `banner_profile`, `banner_prefix`, `banner_fname`, `banner_lname`, `banner_tel`, `banner_zipcode`, `banner_address`, `banner_descrption`, `banner_img`, `banner_title`, `banner_detail`, `banner_TelCon`, `banner_email`)
                 VALUES ('','','','','','','','','','" . $req->market_name . "','" . $req->market_detail . "','" . $req->market_tel . "','" . $req->market_email . "')");

                if ($statement) {
                    echo json_encode(['status' => true, 'meg' => 'เพิ่มข้อมูลตลาดสำเร็จ!']);
                } else {
                    echo json_encode(['status' => false, 'meg' => 'เกิดข้อผิดพลาดโปรดลองอีกครั้ง!']);
                }
            }

            break;
    }
}
