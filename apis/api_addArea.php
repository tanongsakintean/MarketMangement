<?php
include("../connect.php");
$req = json_decode(file_get_contents("php://input"));

if (isset($req)) {
    switch ($req->action) {
        case 'addArea':

            $statement = $conn->query("SELECT * FROM tb_area WHERE area_name = '" . $req->area_name . "' AND market_id = '" . $req->market_id . "'");

            if ($statement->num_rows > 0) {
                echo json_encode(['status' => false, 'meg' => 'ชื่อแผงลอยซ้ำกัน!']);
            } else {
                $statement = $conn->query("INSERT INTO `tb_area`( `market_id`,`area_name`, `area_description`, `area_row`, `area_col`, `area_width`, `area_length`, `area_DayPrice`,`area_MonthPrice`, `area_status`, `area_date`, `del_status`)
                VALUES ('" . $req->market_id . "','" . $req->area_name . "','" . $req->area_description . "','" . $req->area_row . "','" . $req->area_col . "','" . $req->area_width . "','" . $req->area_length . "','" . $req->area_DayPrice . "','" . $req->area_MonthPrice . "','" . $req->area_status . "',NOW(),0)");

                if ($statement) {
                    echo json_encode(['status' => true, 'meg' => 'เพิ่มแผงลอยสำเร็จ!']);
                } else {
                    echo json_encode(['status' => false, 'meg' => 'เกิดข้อผิดพลาดโปรดลองอีกครั้ง!']);
                }
            }

            break;
    }
}
