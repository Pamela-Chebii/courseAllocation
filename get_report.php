<?php
session_start();
//check if user has logged in?

if (!isset($_SESSION["loggedin"]) or $_SESSION["loggedin"] !== true) {
    header("location:index.php");
    exit();
}
include "connect.php";
include "fpdf184/fpdf.php";
$pdf = new FPDF();
$pdf->AddPage();

//pick data from db

$sql = "SELECT `cohort`, `year`, `term`, `unit`, `lecturer` FROM `transaction`";
$result = mysqli_query($link,$sql);

if ($result){

    $data = mysqli_num_rows($result);

    if ($data>0){
        while ($row=mysqli_fetch_array($result)){

            foreach ($result as $row){
                $pdf->SetFont("Arial", "", "12");
                $pdf->Ln();
                foreach ($row as $column){
                    $pdf->Cell( 30, 12, $column, 1);
                }

            }
            $pdf->Output();
        }

    }else{
        echo "No data in the database";
    }


}else{
    echo "Error executing query";
}
