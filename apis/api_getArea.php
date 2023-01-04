<?php
include("../connect.php");
$req = json_decode(file_get_contents("php://input"));

if (isset($req)) {
    switch ($req->action) {
        case 'getArea':
            $statement = $conn->query("SELECT * FROM tb_area WHERE market_id = '" . $req->market_id . "' AND del_status = 0");
            $area = [];
            while ($val = $statement->fetch_object()) {
                array_push($area, $val);
            }
            echo json_encode(['status' => true, 'area' => $area]);
            break;
    }
}
