<?php
session_start();
//check if user has logged in?

if (!isset($_SESSION["loggedin"]) or $_SESSION["loggedin"] !== true) {
    header("location:index.php");
    exit();
}
include "header.php";
include "connect.php";
if (isset($_POST["submit"])){

    $programName=$_POST["programName"];
    $id=$_POST["id"];

    $sql="INSERT INTO `program`( `programName`, `id`)
            VALUES ('$programName','$id')";

    $result = mysqli_query($link, $sql);

    if ($result){
        echo "<p class='alert alert-info'>Record Added Successfully</p>";
    }else{

        echo "<p class='alert alert-danger'>Error executing query</p>";

    }

}else{
    echo "Select Specific Program";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>course</title>
</head>
<body>
<div class="col-md-12">
    <a class="btn btn-warning col-md-3" href="program.php">BACK</a>
</div>
</body>
</html>