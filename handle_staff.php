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
    $pfNo=$_POST["pfNo"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $emailAddress = $_POST["emailAddress"];
    $phoneNumber=$_POST["phoneNumber"];
    $role=$_POST["role"];
    $password = $_POST['password'];
    $confirmPassword = $_POST["confirmPassword"];
    $status=$_POST["status"];
    echo $firstName;


    if (strlen($password)<6){
        $passError = "password must be more than 6 characters";
        echo $passError;
    } else {
        $storePass = password_hash($password, PASSWORD_DEFAULT);
    }

    if ($confirmPassword!=$password){
        $conPassErr = "password do not match";
        echo $conPassErr;
    }
    if (empty($passError) and empty($conPassErr)){

        $sql= "INSERT INTO `staff`( `pfNo`, `firstName`, `lastName`, `emailAddress`, `phoneNumber`, `role`, `password`, `status`) 
                                VALUES ('$pfNo','$firstName','$lastName','$emailAddress','$phoneNumber','$role','$storePass','$status')";

        $result = mysqli_query($link, $sql);
        if ($result){
            echo "<p class='alert alert-info'>You've been registered successfully</p>";
        }else{
            echo "Error executing query".mysqli_error($link);
        }

    }

    mysqli_close($link);
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
    <a class="btn btn-warning col-md-3" href="staff.php">BACK</a>
</div>
</body>
</html>
