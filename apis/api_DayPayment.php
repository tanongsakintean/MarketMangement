<?php
include("../connect.php");
$req = json_decode(file_get_contents("php://input"));

if (isset($req)) {
    switch ($req->action) {
        case 'DayPay':

            $statement = $conn->query("INSERT INTO tb_rental (user_id,rental_type,area_id,market_id,rental_slip,rental_money,rental_DateStart,rental_DateEnd,rental_RemainDay,rental_date,del_status)
            VALUES ('" . $req->user_id . "','" . $req->rental_type . "','" . $req->area_id . "','" . $req->market_id . "','0','" . $req->money . "','" . $req->date_start . "','" . date("Y-m-d", strtotime('+1 day', strtotime($req->date_start))) . "','1','" . date("Y-m-d") . "',0)");

            if ($statement) {
                $statement = $conn->query("UPDATE tb_area SET area_status = 3 WHERE area_id = '" . $req->area_id . "'");

                if ($statement) {
                    $statement = $conn->query("SELECT MAX(rental_id) AS max_id FROM tb_rental");
                    echo json_encode(['status' => true, 'meg' => 'ชำระเงินสำเร็จ!', 'data' => $statement->fetch_object()]);
                } else {
                    echo json_encode(['status' => false, 'meg' => 'เกิดข้อผิดพลาดโปรดลองอีกครั้ง!']);
                }
            }
            break;
    }
}
