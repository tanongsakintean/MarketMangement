<?php

include("../connect.php");

$statement = $conn->query("SELECT * FROM tb_row");
if ($statement->num_rows > 0) {
    $row = $statement->fetch_object();
    echo json_encode(['row_no' => $row->row_no, 'row_id' => $row->row_id]);
} else {
    echo json_encode(['row_no' => 0, 'row_id' => 0]);
}
