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

    $programCode=$_POST["programCode"];
    $course=$_POST["course"];
    $PId=$_POST["PId"];

    $sql="INSERT INTO `cohort`(`programCode`, `course`, `PId`)
            VALUES ('$programCode','$course','$PId')";

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
    <a class="btn btn-warning col-md-3" href="cohort.php">BACK</a>
</div>
</body>
</html>