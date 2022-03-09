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
        <p class="h3 m-1 grey">Program Type</p>
    </div>
    <div class="col-8">
        <!-- Button trigger modal -->
        <button type="button" class=" m-1 btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add Qualification
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Qualification</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="handle_academicPrograms.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="form-label grey">Academic Program Type</label>
                                    <select class="form-control" name="level">
                                        <option value="Degree">Degree</option>
                                        <option value="Diploma">Diploma</option>
                                        <option value="other">Other</option>
                                    </select>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <input type="submit" name="submit" class="col-6 btn btn-outline-warning text-success" value="SUBMIT">
                                    <!--                                    <button type="button" class="btn btn-primary">Save changes</button>-->
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
    $sql = "SELECT * FROM `qualification`";
    $result = mysqli_query($link, $sql);

    if ($result){

        $data = mysqli_num_rows($result);
        if ($data>0){

            echo "<table class='table table-striped table-hover'>";
            echo "<tr>";
            echo "<th>Id</th>";
            echo "<th>Level</th>";
            echo "<th>Action</th>";
            echo "</tr>";

            while ($row=mysqli_fetch_array($result)){

                echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['level']."</td>";
                echo "<td>
                        <a class='m-2' href='delete.php?id=".$row['id']."'><span class='fa fa-trash'></span></a>
                        <a class='m-2' href=''><span class='fa fa-pencil'></span></a>
                        <a class='m-2' href=''><span class='fa fa-eye'></span></a>
                     

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