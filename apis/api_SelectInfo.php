<?php
include("../connect.php");
$req = json_decode(file_get_contents("php://input"));

if (isset($req)) {
    switch ($req->action) {
        case 'getUserInfo':

            $statement = $conn->query("SELECT * FROM tb_area LEFT JOIN tb_rental ON
                                        tb_area.area_id = tb_rental.area_id LEFT JOIN tb_user ON
                                        tb_rental.user_id = tb_user.user_id LEFT JOIN tb_market ON 
                                        tb_area.market_id = tb_market.market_id 
                                        WHERE tb_area.area_id = '" . $req->area_id . "'");

            $rental = $statement->fetch_object();

            if ($statement->num_rows > 0) {
                echo json_encode(['status' => true, 'order' => $rental]);
            } else {
                echo json_encode(['status' => false]);
            }
            break;
    }
}
