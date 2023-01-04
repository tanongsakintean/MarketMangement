<?php
include("../connect.php");
$req = json_decode(file_get_contents("php://input"));

if (isset($req)) {
    switch ($req->action) {
        case 'delRow':
            $statement = $conn->query("UPDATE tb_market SET market_row = market_row  - 1 WHERE market_id = '" . $req->market_id . "'");

            if ($statement) {
                echo json_encode(true);
            } else {
                echo json_encode(false);
            }
            break;
    }
}
