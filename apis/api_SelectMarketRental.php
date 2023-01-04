<?php
include("../connect.php");
$req = json_decode(file_get_contents("php://input"));

if (isset($req)) {
    switch ($req->action) {
        case 'SelectMarket':

            $statement = $conn->query("SELECT * FROM tb_rental 
                            LEFT JOIN tb_area ON
                            tb_rental.area_id = tb_area.area_id 
                            LEFT JOIN tb_market ON
                            tb_market.market_id = tb_rental.market_id 
                            LEFT JOIN tb_user ON
                            tb_rental.user_id = tb_user.user_id
                            WHERE tb_rental.market_id = '" . $req->market_id . "'
                            ORDER BY tb_rental.rental_id DESC");
            $rental = [];
            if ($statement->num_rows > 0) {
                while ($val = $statement->fetch_object()) {
                    array_push($rental, $val);
                }
                echo json_encode(['status' => true, 'order' => $rental]);
            } else {
                echo json_encode(['status' => false]);
            }
            break;
    }
}
