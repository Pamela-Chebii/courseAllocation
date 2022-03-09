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
        <p class="h3 m-1 grey">Cohorts</p>

    </div>
    <div class="col-8">
        <!-- Button trigger modal -->
        <button type="button" class=" m-1 btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add Program Code
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Program Code</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="handle_cohort.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="form-label grey">Program Code</label>
                                    <input class="form-control" type="text" name="programCode" placeholder="SCCJ/2015" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="form-label grey">COURSE</label>
                                    <select class="form-control" name="course">
                                        <option value="null">Select Programs</option>
                                        <?php

                                        $sql = "SELECT `programName` FROM `program`";
                                        $result=mysqli_query($link,$sql);
                                        while ($row=mysqli_fetch_array($result))
                                        {
                                            echo "<option>",$row[0],"</option>\n  ";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="form-label grey">Program Id</label>
                                    <select class="form-control" name="PId" id="PId">
                                        <option value="null">Select Program Id</option>
                                        <?php

                                            $sql = "SELECT `PId`, `programName` FROM `program`";
                                            $result=mysqli_query($link,$sql);
                                        while ($row=mysqli_fetch_array($result))
                                            {
                                                echo "<option value=",$row[0],">",$row[1],"</option>\n  ";
                                            }
                                        ?>
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
    $sql = "SELECT * FROM `cohort` ORDER BY programCode";
    $result = mysqli_query($link, $sql);

    if ($result){

        $data = mysqli_num_rows($result);
        if ($data>0){

            echo "<table class='table table-striped table-hover'>";
            echo "<tr>";
            echo "<th>Program Code</th>";
            echo "<th>Program</th>";
            echo "<th>Action</th>";
            echo "</tr>";

            while ($row=mysqli_fetch_array($result)){

                echo "<tr>";
                echo "<td>".$row['programCode']."</td>";
                echo "<td>".$row['course']."</td>";
                echo "<td>
                        <a class='m-2' href='delete_cohort.php?cohortId=".$row['cohortId']."'><span class='fa fa-trash'></span></a>
                        <a class='m-2' href='update_cohort.php?cohortId=".$row['cohortId']. "'><span class='fa fa-pencil'></span></a>
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
