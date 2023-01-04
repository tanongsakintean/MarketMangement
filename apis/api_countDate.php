<?php
include("../connect.php");


$statement  = $conn->query("UPDATE tb_rental SET rental_RemainDay = rental_RemainDay - 1 WHERE del_status = 0 AND  rental_DateStart  >= '" . date("Y-m-d") . "'");
if ($statement) {

    $oldId = $conn->query("SELECT area_id FROM tb_rental
     WHERE rental_id = (SELECT rental_id WHERE rental_RemainDay = 0)");

    $statement = $conn->query("UPDATE tb_rental SET del_status = 1 
    WHERE rental_id = (SELECT rental_id WHERE rental_RemainDay = 0)");

    if ($statement) {
        while ($val = $oldId->fetch_object()) {
            $statement = $conn->query("UPDATE tb_area SET area_status = 1 WHERE area_id = '" . $val->area_id . "'");
        }
    }
}
