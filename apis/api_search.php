<?php
include("../connect.php");
$req = json_decode(file_get_contents("php://input"));

if (isset($req)) {
    switch ($req->action) {
        case 'search':
            $statement = $conn->query("SELECT * FROM tb_rental LEFT JOIN tb_area ON 
            tb_rental.area_id = tb_area.area_id LEFT JOIN tb_user ON 
            tb_rental.user_id = tb_user.user_id LEFT JOIN tb_market ON 
            tb_area.market_id = tb_market.market_id
            WHERE tb_rental.rental_date BETWEEN '" . $req->start . "' AND '" . $req->end . "' ORDER BY tb_rental.rental_id  DESC ");

            $order = [];
            while ($val = $statement->fetch_object()) {
                array_push($order, $val);
            }
            echo json_encode(['status' => true, 'data' => $order]);


            break;
    }
}
