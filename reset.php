<?php
session_start();
//check if user has logged in?

if (!isset($_SESSION["loggedin"]) or $_SESSION["loggedin"]!==true){
    header("location:index.php");
    exit();
}
include "header.php";
include "connect.php";

if(isset($_POST['reset'])) {

    $staffId = $_SESSION['staffId'];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];
}

?>

<div class="row m-2">
    <div class="card">
        <div class="card-header text-primary bg-white h4">Change Password</div>
        <div class="card-body">
            <form action="reset.php" method="post" enctype="multipart/form-data">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Old Password</span>
                    <input type="password" name="password" class="form-control" aria-describedby="basic-addon1" required>
                </div>
                <span class="eye">
                    <i class="fa fa-eye grey" id="oeye" style="position: absolute; transform: translate(0%,-250%); margin: auto auto auto 90%; width: 300px;cursor: pointer"></i>
                </span>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">New Password</span>
                    <input type="password" name="newPassword" class="form-control" aria-describedby="basic-addon1" required>
                </div>
                <span class="eye">
                    <i class="fa fa-eye grey" id="eye" style="position: absolute; transform: translate(0%,-250%); margin: auto auto auto 90%; width: 300px;cursor: pointer"></i>
                </span>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon2">Confirm Password</span>
                    <input type="password" name="confirmPassword" class="form-control" aria-describedby="basic-addon2" required>
                </div>
                <span class="eye">
                    <i class="fa fa-eye grey" id="ceye" style="position: absolute; transform: translate(0%,-270%); margin: auto auto auto 90%; width: 300px;cursor: pointer"></i>
                </span>
                <div class="input-group mb-3">
                    <input type="submit" name="reset" value="RESET PASSWORD" class="btn btn-success col-md-4 ">
                </div>
            </form>
        </div>
    </div>
</div>





