<?php
session_start();
//check if user has logged in?

if (!isset($_SESSION["loggedin"]) or $_SESSION["loggedin"] !== true) {
    header("location:index.php");
    exit();
}
include "header_2.php";
include "connect.php";
$sql = "SELECT * FROM `unit`";
$result = mysqli_query($link, $sql);

if ($result){
    $data = mysqli_num_rows($result);
    if ($data>0){

        echo "<table class='table table-striped table-hover'>";
        echo "<tr>";
        echo "<th>Unit Code</th>";
        echo "<th>Unit Name</th>";
        echo "<th>Year</th>";
        echo "<th>Term</th>";
        echo "</tr>";

            while ($row=mysqli_fetch_array($result)){

                echo "<tr>";
                echo "<td>".$row['unitCode']."</td>";
                echo "<td>".$row['unitName']."</td>";
                echo "<td>".$row['year']."</td>";
                echo "<td>".$row['term']."</td>";


                echo "</tr>";

            }

            echo "</table>";



    }else{
        echo "<p class='alert alert-warning'>No records found</p>";
        }

}else{
    echo "Error executing query $sql".mysqli_error($link);
    }




