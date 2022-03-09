<?php
session_start();
//check if user has logged in?

if (!isset($_SESSION["loggedin"]) or $_SESSION["loggedin"] !== true) {
    header("location:index.php");
    exit();
}
include "header.php";
include "connect.php";
?>

<div class="row m-2">
    <div class="col-4">
        <p class="h3 m-1 grey">SCIT Lecturers</p>

    </div>
    <div class="col-8">
        <!-- Button trigger modal -->
        <button type="button" class=" m-1 btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add Lecturer
        </button>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Lecturer</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="handle_staff.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="form-label grey">Staff Id</label>
                                    <input class="form-control" type="text" name="pfNo" placeholder="AC 0106" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label grey">First Name</label>
                                    <input class="form-control" type="text" name="firstName" placeholder="John" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label grey">Last Name</label>
                                    <input class="form-control" type="text" name="lastName" placeholder="Doe" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="form-label grey">Email Address</label>
                                    <input class="form-control" type="email" name="emailAddress" placeholder="johndoe@example.com" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="form-label grey">Phone Number</label>
                                    <input class="form-control" type="tel" name="phoneNumber" placeholder="0722 233 233" required>
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
                                <div class="col-md-6">
                                    <label class="form-label grey">Password</label>
                                    <input class="form-control" type="password" name="password" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label grey">Confirm Password</label>
                                    <input class="form-control" type="password" name="confirmPassword" required>
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
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <input type="submit" name="submit" class="col-6 btn btn-outline-warning text-success" value="SUBMIT">
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="row m-2 p-2">

    <?php
    include "connect.php";
    $sql = "SELECT * FROM `staff` ORDER BY firstName";
    $result = mysqli_query($link, $sql);

    if ($result){

        $data = mysqli_num_rows($result);
        if ($data>0){

            echo "<table class='table table-striped table-hover'>";
            echo "<tr>";
            echo "<th>Name</th>";
            echo "<th>Email Address</th>";
            echo "<th>Phone Number</th>";
            echo "<th>Action</th>";
            echo "</tr>";

            while ($row=mysqli_fetch_array($result)){

                echo "<tr>";
                echo "<td>" .$row['firstName']. " ".$row['lastName']."</td>";
                echo "<td>".$row['emailAddress']."</td>";
                echo "<td>".$row['phoneNumber']."</td>";
                echo "<td>
                        <a class='m-2' href='delete_staff.php?staffId=".$row['staffId']."'><span class='fa fa-trash'></span></a>
                        <a class='m-2' href='update_staff.php?staffId=".$row['staffId']."'><span class='fa fa-pencil'></span></a>
                        </td>";


                echo "</tr>";

            }

            echo "</table>";



        }else{
            echo "<p class='alert alert-warning'>No records found</p>";
        }

    }else{
        echo "Error executing query $sql".mysqli_error($link);
    }

    ?>

</div>