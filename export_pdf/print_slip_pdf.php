<?php
session_start();
require("../connect.php");

require('code128.php');


$statement = $conn->query("SELECT * FROM tb_rental LEFT JOIN tb_user ON
                            tb_rental.user_id = tb_user.user_id
                             LEFT JOIN  tb_area ON
                            tb_rental.area_id = tb_area.area_id 
                            WHERE rental_id = '" . $_REQUEST['id'] . "'");


$rental = $statement->fetch_object();

$pdf = new PDF_Code128("P", "mm", array(80, 260));
$pdf->AddFont('THSarabunPSK', '', 'THSarabun.php');
$pdf->AddFont('THSarabunPSK', 'b', 'THSarabun Bold.php'); //หนา
$pdf->AddPage();
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('THSarabunPSK', 'B', 20);

$line = 6;

$pdf->SetXY(5, 5);

$pdf->Cell(70, 10, iconv('UTF-8', 'cp874', 'ใบเสร็จรับเงิน'), 0, 0, 'C');
$pdf->SetFont('THSarabunPSK', 'B', 15);
$pdf->Ln();


$pdf->SetXY(5, $line * 3);
$pdf->Cell(40, 7, iconv('UTF-8', 'cp874', $rental->rental_date), 0, 0, 'L');
$pdf->Cell(40, 7, iconv('UTF-8', 'cp874', ''), 0, 0, 'L');
$pdf->Ln();


$pdf->SetXY(5, $line * 4);
$pdf->Cell(40, 7, iconv('UTF-8', 'cp874', '..........................................................................'), 0, 0, 'L');
$pdf->Cell(40, 7, iconv('UTF-8', 'cp874', ''), 0, 0, 'L');
$pdf->Ln();

$pdf->SetXY(5, $line * 5);
$pdf->Cell(40, 7, iconv('UTF-8', 'cp874', 'รายการ                                  จำนวนเงิน'), 0, 0, 'L');
$pdf->Cell(40, 7, iconv('UTF-8', 'cp874', ''), 0, 0, 'L');
$pdf->Ln();


$pdf->SetXY(5, $line * 5.8);
$pdf->Cell(40, 7, iconv('UTF-8', 'cp874', '..........................................................................'), 0, 0, 'L');
$pdf->Cell(40, 7, iconv('UTF-8', 'cp874', ''), 0, 0, 'L');
$pdf->Ln();

$pdf->SetXY(5, $line * 7);
$pdf->Cell(40, 7, iconv('UTF-8', 'cp874', $rental->area_name), 0, 0, 'L');
$pdf->Cell(23, 7, iconv('UTF-8', 'cp874', number_format($rental->area_DayPrice)), 0, 0, 'R');
$pdf->Ln();


$pdf->SetXY(5, $line * 8);
$pdf->Cell(40, 7, iconv('UTF-8', 'cp874',  'แถว ' . $rental->area_row . ' ล็อก ' . $rental->area_col . '                         '), 0, 0, 'L');
$pdf->Cell(40, 7, iconv('UTF-8', 'cp874', ''), 0, 0, 'L');
$pdf->Ln();


$pdf->SetXY(5, $line * 9);
$pdf->Cell(40, 7, iconv('UTF-8', 'cp874', '..........................................................................'), 0, 0, 'L');
$pdf->Cell(40, 7, iconv('UTF-8', 'cp874', ''), 0, 0, 'L');
$pdf->Ln();


$pdf->SetXY(5, $line * 10);
$pdf->Cell(40, 7, iconv('UTF-8', 'cp874', '                     รายละเอียด '), 0, 0, 'L');
$pdf->Cell(40, 7, iconv('UTF-8', 'cp874', ''), 0, 0, 'L');
$pdf->Ln();


$pdf->SetXY(5, $line * 10.8);
$pdf->Cell(40, 7, iconv('UTF-8', 'cp874', '..........................................................................'), 0, 0, 'L');
$pdf->Cell(40, 7, iconv('UTF-8', 'cp874', ''), 0, 0, 'L');
$pdf->Ln();


if ($rental->rental_type == 1) {
    $type = "รายวัน";
} else if ($rental->rental_type == 2) {
    $type = "รายเดือน";
}

$pdf->SetXY(5, $line * 12);
$pdf->Cell(40, 7, iconv('UTF-8', 'cp874', 'ประเภทการเช่า ' . $type), 0, 0, 'L');
$pdf->Cell(40, 7, iconv('UTF-8', 'cp874', ''), 0, 0, 'L');
$pdf->Ln();


$pdf->SetXY(5, $line * 13);
$pdf->Cell(40, 7, iconv('UTF-8', 'cp874', 'วันที่เริ่มเช่า '), 0, 0, 'L');
$pdf->Cell(28, 7, iconv('UTF-8', 'cp874', substr($rental->rental_DateStart, 8, 2) . '/' . substr($rental->rental_DateStart, 5, 2) . '/' . substr($rental->rental_DateStart, 0, 4)), 0, 0, 'R');
$pdf->Ln();


$pdf->SetXY(5, $line * 14);
$pdf->Cell(40, 7, iconv('UTF-8', 'cp874', 'วันสุดท้ายของการเช่า  '), 0, 0, 'L');
$pdf->Cell(28, 7, iconv('UTF-8', 'cp874', substr($rental->rental_DateEnd, 8, 2) . '/' . substr($rental->rental_DateEnd, 5, 2) . '/' . substr($rental->rental_DateEnd, 0, 4)), 0, 0, 'R');
$pdf->Ln();



if ($rental->user_prefix == 1) {
    $prefix = "นาย";
} else if ($rental->user_prefix == 2) {
    $prefix = "นาง";
} else {
    $prefix = "นางสาว";
}
$pdf->SetXY(5, $line * 15);
$pdf->Cell(40, 7, iconv('UTF-8', 'cp874', $prefix . ' ' . $rental->user_fname . ' ' . $rental->user_lname), 0, 0, 'L');
$pdf->Cell(40, 7, iconv('UTF-8', 'cp874', ''), 0, 0, 'L');
$pdf->Ln();


$pdf->SetXY(5, $line * 16);
$pdf->Cell(40, 7, iconv('UTF-8', 'cp874', '..........................................................................'), 0, 0, 'L');
$pdf->Cell(40, 7, iconv('UTF-8', 'cp874', ''), 0, 0, 'L');
$pdf->Ln();

$pdf->SetXY(5, $line * 17);
$pdf->Cell(40, 7, iconv('UTF-8', 'cp874', 'พนักงานขาย : ' . $_SESSION['ses_prefix'] . ' ' . $_SESSION['ses_fname'] . ' ' . $_SESSION['ses_lname']), 0, 0, 'L');
$pdf->Cell(40, 7, iconv('UTF-8', 'cp874', ''), 0, 0, 'L');
$pdf->Ln();

$pdf->SetXY(5, $line * 17.8);
$pdf->Cell(40, 7, iconv('UTF-8', 'cp874', '..........................................................................'), 0, 0, 'L');
$pdf->Cell(40, 7, iconv('UTF-8', 'cp874', ''), 0, 0, 'L');
$pdf->Ln();


$pdf->SetXY(5, $line * 19);
$pdf->Cell(70, 7, iconv('UTF-8', 'cp874', '***** ขอบคุณที่ใช้บริการ *****'), 0, 0, 'C');
$pdf->Ln();

$pdf->Output();
