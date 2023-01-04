<?php
include("../connect.php");
$req = json_decode(file_get_contents("php://input"));

if (isset($req)) {
    switch ($req->action) {
        case 'editArea':

            $statement = $conn->query("SELECT * FROM tb_area WHERE area_name = '" . $req->area_name . "' AND market_id = '" . intval($req->market_id) . "' AND area_id != '" . $req->area_id . "'  AND del_status = 0");
            if ($statement->num_rows > 0) {
                echo json_encode(['status' => false, 'meg' => 'ชื่อแผงลอยซ้ำกัน!']);
            } else {
                $statement  = $conn->query("UPDATE `tb_area` SET `area_name`='" . $req->area_name . "',`area_description`='" . $req->area_description . "',`area_width`='" . $req->area_width . "',`area_length`='" . $req->area_length . "',`area_DayPrice`='" . $req->area_DayPrice . "',`area_MonthPrice`='" . $req->area_MonthPrice . "',`area_status` = '" . $req->area_status . "',`area_date`= NOW() WHERE area_id = '" . $req->area_id . "' ");

                if ($statement) {
                    echo json_encode(['status' => true, 'meg' => 'แก้ไขแผงลอยสำเร็จ!']);
                } else {
                    echo json_encode(['status' => false, 'meg' => 'เกิดข้อผิดพลาดโปรดลองอีกครั้ง!']);
                }
            }
            break;
    }
}
