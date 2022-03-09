<?php
session_start();
//check if user has logged in?

if (!isset($_SESSION["loggedin"]) or $_SESSION["loggedin"] !== true) {
    header("location:index.php");
    exit();
}
include "header.php";
include "connect.php";
if (isset($_POST["update"])){


    $staffId = $_POST["staffId"];
    $up_pfNo = $_POST["pfNo"];
    $up_firstName = $_POST["firstName"];
    $up_lastName = $_POST["lastName"];
    $up_emailAddress=$_POST["emailAddress"];
    $up_phoneNumber=$_POST["phoneNumber"];
    $up_role=$_POST["role"];
    $up_status=$_POST["status"];

    $up_sql = "UPDATE `staff` SET `pfNo`='$up_pfNo',`firstName`='$up_firstName',`lastName`='$up_lastName',`emailAddress`='$up_emailAddress',`phoneNumber`='$up_phoneNumber',`role`='$up_role',`status`='$up_status' WHERE staffId=$staffId";


    $up_result = mysqli_query($link, $up_sql);

    if ($up_result){
        echo "Record successfully updated";
    }else{
        echo "error executing query $up_sql".mysqli_error($link);
    }


}else{

    if (isset($_GET["staffId"]) and !empty($_GET["staffId"])){

        $staffId = $_GET["staffId"];

        $sql = "SELECT * FROM `staff` WHERE staffId=$staffId";

        $result = mysqli_query($link, $sql);

        if ($result){

            $data = mysqli_num_rows($result);

            if ($data==1){

                $row = mysqli_fetch_array($result);

                $pfNo = $row['pfNo'];
                $firstName = $row['firstName'];
                $lastName = $row['lastName'];
                $emailAddress = $row['emailAddress'];
                $phoneNumber = $row['phoneNumber'];
                $role = $row['role'];
                $status = $row['status'];

?>
<div class="row m-2">
    <div class="text-success h3">Update the Record</div>
</div>
<div class="row m-2">
    <div class="card">
        <div class="card-body">
            <form action="handle_staff.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <label class="form-label grey">Staff Id</label>
                        <input class="form-control" type="text" name="pfNo" value="<?php echo $pfNo; ?>" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label grey">First Name</label>
                        <input class="form-control" type="text" name="firstName" value="<?php echo $firstName; ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label grey">Last Name</label>
                        <input class="form-control" type="text" name="lastName" value="<?php echo $lastName; ?>" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label class="form-label grey">Email Address</label>
                        <input class="form-control" type="email" name="emailAddress" value="<?php echo $emailAddress; ?>" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label class="form-label grey">Phone Number</label>
                        <input class="form-control" type="tel" name="phoneNumber" value="<?php echo $phoneNumber; ?>" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label class="form-label grey">Role</label>
                        <select class="form-control" name="role" required>
                            <option value="null">select role</option>
                            <option value="Lecturer">Lecturer</option>
                            <option value="Atl">Atl</option>
                            <option value="Coordinator">Coordinator</option>
                            <option value="Director">Director</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label class="form-label grey">status</label>
                        <select class="form-control" name="status" required>
                            <option value="null">select status</option>
                            <option value="Active">Active</option>
                            <option value="Terminated">Terminated</option>
                            <option value="Retired">Retired</option>
                        </select>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-md-12">
                        <input type="submit" name="update" class="col-md-3 btn btn-success" value="UPDATE">
                        <a class="btn btn-warning col-md-3" href="staff.php">BACK</a>
                    </div>
                </div>
            </form>

        </div>

    </div>

</div>


<?php

            }else{
                echo "No record was found";
            }


        }else{
            echo "Error executing query $sql".mysqli_error($link);
        }


    }else{
        echo "id value not picked";
    }

}

?>
