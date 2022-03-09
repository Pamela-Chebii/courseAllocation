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

$level=$_POST["level"];

$sql="INSERT INTO `qualification`( `level`) 
        VALUES ('$level')";

$result = mysqli_query($link, $sql);

if ($result){
    echo "<p class='alert alert-info'>Record Added Successfully</p>";
}else{

    echo "<p class='alert alert-danger'>Error executing query</p>";

}

}else{
    echo "Select Level of the Program";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<div class="col-md-12">
    <a class="btn btn-warning col-md-3" href="academicPrograms.php">BACK</a>
</div>
</body>
</html>
