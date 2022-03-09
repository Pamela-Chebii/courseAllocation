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
        <p class="h3 m-1 grey">Selected Units</p>

    </div>
    <div class="col-8">
        <!-- Button trigger modal -->
        <button type="button" class=" m-1 btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Allocate Unit
        </button>

        <a href="get_report.php" class=" m-1 btn btn-warning float-end">Get Report</a>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Allocate Unit</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="handle_transaction.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="form-label grey">Program</label>
                                    <select class="form-control" name="program" required>
                                        <option value="null">select program</option>
                                        <?php

                                        $sql = "SELECT `programName` FROM `program`";
                                        $result=mysqli_query($link,$sql);
                                        while ($row=mysqli_fetch_array($result))
                                        {
                                            echo "<option>",$row["programName"],"</option>\n  ";
                                        }
                                        ?>

                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="form-label grey">Cohort</label>
                                    <select class="form-control" name="cohort" required>
                                        <option value="null">select cohort</option>
                                        <?php

                                        $sql = "SELECT `programCode` FROM `cohort`";
                                        $result=mysqli_query($link,$sql);
                                        while ($row=mysqli_fetch_array($result))
                                        {
                                            echo "<option>",$row["programCode"],"</option>\n  ";
                                        }
                                        ?>

                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="form-label grey">Year of Study</label>
                                    <select class="form-control" name="year" required>
                                        <option value="null">select year of study</option>
                                        <option value="1">First Year</option>
                                        <option value="2">Second Year</option>
                                        <option value="3">Third Year</option>
                                        <option value="4">Fourth Year</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="form-label grey">Term</label>
                                    <select class="form-control" name="term" required>
                                        <option value="null">select term</option>
                                        <option value="1">Term One</option>
                                        <option value="2">Term Two</option>
                                        <option value="3">Term Three</option>
                                        <option value="4">Term Four</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="form-label grey">Course</label>
                                    <select class="form-control" name="unit" required>
                                        <option value="null">select unit</option>
                                        <?php

                                        $sql = "SELECT `unitCode`, `unitName` FROM `unit`";
                                        $result=mysqli_query($link,$sql);
                                        while ($row=mysqli_fetch_array($result))
                                        {
                                            echo "<option>" .$row["unitCode"].": ".$row["unitName"]."</option>\n  ";
                                        }
                                        ?>

                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="form-label grey">Lecturer</label>
                                    <select class="form-control" name="lecturer" required>
                                        <option value="null">select lecturer</option>
                                        <?php

                                        $sql = "SELECT `firstName`, `lastName` FROM `staff` ORDER BY firstName";
                                        $result=mysqli_query($link,$sql);
                                        while ($row=mysqli_fetch_array($result))
                                        {
                                            echo "<option>" .$row["firstName"]." ".$row["lastName"]."</option>\n  ";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="form-label grey">Course Status</label>
                                    <select class="form-control" name="courseStatus" required>
                                        <option value="null">select course status</option>
                                        <option value="0">Not Taught</option>
                                        <option value="1">Taught</option>
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
    $sql = "SELECT * FROM `transaction`";
    $result = mysqli_query($link, $sql);

    if ($result){

        $data = mysqli_num_rows($result);
        if ($data>0){

            echo "<table class='table table-striped table-hover'>";
            echo "<tr>";
            echo "<th>Program Code</th>";
            echo "<th>Year</th>";
            echo "<th>Term</th>";
            echo "<th>Course</th>";
            echo "<th>Lecturer</th>";
            echo "<th>Action</th>";
            echo "</tr>";

            while ($row=mysqli_fetch_array($result)){

                echo "<tr>";
                echo "<td>".$row['cohort']."</td>";
                echo "<td>".$row['year']."</td>";
                echo "<td>".$row['term']."</td>";
                echo "<td>".$row['unit']."</td>";
                echo "<td>".$row['lecturer']."</td>";
                echo "<td>
                         <a class='m-2' href='delete_transaction.php?transactionId=".$row['transactionId']."'><span class='fa fa-trash'></span></a>
                        <a class='m-2' href=''><span class='fa fa-pencil'></span></a>
                      
                     

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