<?php
session_start();
//check if user has logged in?

if (!isset($_SESSION["loggedin"]) or $_SESSION["loggedin"] !== true) {
    header("location:index.php");
    exit();
}
include "header.php";
include "connect.php";

if (isset($_POST["submit"])) {

    $unitCode = $_POST["unitCode"];
    $unitName=$_POST["unitName"];
    $year=$_POST["year"];
    $term=$_POST["term"];
    $PId = $_POST["PId"];

    $sql = "INSERT INTO `unit`(`unitCode`, `unitName`, `year`, `term`, `PId`)
                VALUES ('$unitCode','$unitName','$year','$term','$PId')";

    $result = mysqli_query($link, $sql);

    if ($result) {
        echo "<p class='alert alert-info'>Record Added Successfully</p>";
    } else {

        echo "<p class='alert alert-danger'>Error executing query</p>";

    }

} else {
    echo "Fill the Form";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>units</title>
</head>
<body>
<div class="col-md-12">
    <a class="btn btn-warning col-md-3" href="unit.php">BACK</a>
</div>
</body>
</html>