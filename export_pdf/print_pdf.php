<?php
require('../connect.php');




require('code128.php');




if (isset($_REQUEST['start']) && isset($_REQUEST['end']) && isset($_REQUEST['market_id'])) {
    $statement = $conn->query("SELECT * FROM tb_rental LEFT JOIN tb_user ON
                            tb_rental.user_id = tb_user.user_id
                             LEFT JOIN  tb_area ON
                            tb_rental.area_id = tb_area.area_id
                             LEFT JOIN tb_market ON
                            tb_market.market_id = tb_area.market_id
                            WHERE tb_rental.market_id = '" . $_REQUEST['market_id'] . "' AND tb_rental.rental_date BETWEEN '" . $_REQUEST['start'] . "' AND '" . $_REQUEST['end'] . "' ORDER BY tb_rental.rental_id DESC");
} else if (isset($_REQUEST['start']) && isset($_REQUEST['end'])) {
    $statement = $conn->query("SELECT * FROM tb_rental LEFT JOIN tb_user ON
                            tb_rental.user_id = tb_user.user_id
                             LEFT JOIN  tb_area ON
                            tb_rental.area_id = tb_area.area_id
                             LEFT JOIN tb_market ON
                            tb_market.market_id = tb_area.market_id
                            WHERE  tb_rental.rental_date BETWEEN '" . $_REQUEST['start'] . "' AND '" . $_REQUEST['end'] . "' ORDER BY tb_rental.rental_id DESC");
} else if (isset($_REQUEST['market_id'])) {
    $statement = $conn->query("SELECT * FROM tb_rental LEFT JOIN tb_user ON
                            tb_rental.user_id = tb_user.user_id
                             LEFT JOIN  tb_area ON
                            tb_rental.area_id = tb_area.area_id
                             LEFT JOIN tb_market ON
                            tb_market.market_id = tb_area.market_id
                            WHERE tb_rental.market_id = '" . $_REQUEST['market_id'] . "' ORDER BY tb_rental.rental_id DESC");
} else {
    $statement = $conn->query("SELECT * FROM tb_rental LEFT JOIN tb_user ON
                            tb_rental.user_id = tb_user.user_id
                             LEFT JOIN  tb_area ON
                            tb_rental.area_id = tb_area.area_id 
                             LEFT JOIN tb_market ON
                            tb_market.market_id = tb_area.market_id
                              ORDER BY tb_rental.rental_id DESC");
}
$order = [];
while ($val = $statement->fetch_object()) {
    array_push($order, $val);
}

$sum_total = 0;

$pdf = new PDF_Code128('L', 'mm', 'A4');
$pdf->AddFont('THSarabunPSK', '', 'THSarabun.php');
$pdf->AddFont('THSarabunPSK', 'b', 'THSarabun Bold.php'); //หนา
$pdf->AddPage();
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('THSarabunPSK', 'B', 23);


if (isset($_REQUEST['start'])) {
    $pdf->SetXY(140, 5);
    $pdf->Cell(15, 7, iconv('UTF-8', 'cp874', 'ข้อมูลรายงานยอดขาย ' . $_REQUEST['start']  . ' - ' . $_REQUEST['end']), 0, 0, 'C');
    $pdf->SetFont('THSarabunPSK', '', 14);
    $pdf->Ln(12);
} else {
    $pdf->SetXY(140, 5);
    $pdf->Cell(15, 7, iconv('UTF-8', 'cp874', 'ข้อมูลรายงานยอดขายทั้งหมด ' . date("d/m/Y")), 0, 0, 'C');
    $pdf->SetFont('THSarabunPSK', '', 14);
    $pdf->Ln(12);
}
$pdf->SetFont('THSarabunPSK', 'B', 14);
$pdf->Cell(20, 7, iconv('UTF-8', 'cp874', 'ลำดับ'), 1, 0, 'C');
$pdf->Cell(70, 7, iconv('UTF-8', 'cp874', 'ชื่อผู้เช่า'), 1, 0, 'C');
$pdf->Cell(40, 7, iconv('UTF-8', 'cp874', 'ตลาด'), 1, 0, 'C');
$pdf->Cell(40, 7, iconv('UTF-8', 'cp874', 'วันที่เช่า'), 1, 0, 'C');
$pdf->Cell(50, 7, iconv('UTF-8', 'cp874', 'ประเภทการชำระเงิน'), 1, 0, 'C');
$pdf->Cell(50, 7, iconv('UTF-8', 'cp874', 'ราคารวมทั้งหมด'), 1, 0, 'C');
$pdf->Ln(7);


$pdf->SetFont('THSarabunPSK', '', 14);
for ($i = 0; $i < count($order); $i++) {
    $pdf->Cell(20, 7, iconv('UTF-8', 'cp874', ($i + 1)), 1, 0, 'C');

    if ($order[$i]->user_prefix == 1) {
        $pdf->Cell(70, 7, iconv('UTF-8', 'cp874', 'นาย ' . $order[$i]->user_fname . ' ' . $order[$i]->user_lname), 1, 0, 'C');
    } else if ($order[$i]->user_prefix == 2) {
        $pdf->Cell(70, 7, iconv('UTF-8', 'cp874', 'นาง ' . $order[$i]->user_fname . ' ' . $order[$i]->user_lname), 1, 0, 'C');
    } else if ($order[$i]->user_prefix == 3) {
        $pdf->Cell(70, 7, iconv('UTF-8', 'cp874', 'นางสาว ' . $order[$i]->user_fname . ' ' . $order[$i]->user_lname), 1, 0, 'C');
    }


    $pdf->Cell(40, 7, iconv('UTF-8', 'cp874', $order[$i]->market_name), 1, 0, 'C');
    $pdf->Cell(40, 7, iconv('UTF-8', 'cp874', $order[$i]->rental_date), 1, 0, 'C');

    if ($order[$i]->rental_type == 1) {
        $pdf->Cell(50, 7, iconv('UTF-8', 'cp874', 'รายวัน'), 1, 0, 'C');
        $pdf->Cell(50, 7, iconv('UTF-8', 'cp874', number_format($order[$i]->area_DayPrice) . ' บาท'), 1, 0, 'C');
        $sum_total += $order[$i]->area_DayPrice;
    } else {
        $pdf->Cell(50, 7, iconv('UTF-8', 'cp874', 'รายเดือน'), 1, 0, 'C');
        $pdf->Cell(50, 7, iconv('UTF-8', 'cp874', number_format($order[$i]->area_MonthPrice) . ' บาท'), 1, 0, 'C');
        $sum_total += $order[$i]->area_MonthPrice;
    }
    $pdf->Ln(7);
}

$pdf->SetFont('THSarabunPSK', 'B', 14);
$pdf->SetX(180);
$pdf->Cell(50, 7, iconv('UTF-8', 'cp874', 'รวม'), 1, 0, 'C');
$pdf->SetFont('THSarabunPSK', '', 14);
$pdf->Cell(50, 7, iconv('UTF-8', 'cp874', number_format($sum_total) . ' บาท'), 1, 0, 'C');
$pdf->Ln(7);


$pdf->Output();
