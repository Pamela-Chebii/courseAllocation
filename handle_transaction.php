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

    $program = $_POST["program"];
    $cohort=$_POST["cohort"];
    $year=$_POST["year"];
    $term=$_POST["term"];
    $unit = $_POST["unit"];
    $lecturer = $_POST["lecturer"];
    $courseStatus = $_POST["courseStatus"];

    $sql = "INSERT INTO `transaction`( `program`, `cohort`, `year`, `term`, `unit`, `lecturer`, `courseStatus`)
            VALUES ('$program','$cohort','$year','$term','$unit','$lecturer','$courseStatus')";

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
    <a class="btn btn-warning col-md-3" href="transaction.php">BACK</a>
</div>
</body>
</html>
