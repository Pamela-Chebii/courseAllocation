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
        <p class="h3 m-1 grey">Units</p>

    </div>
<div class="col-8">
                    <!-- Button trigger modal -->
    <button type="button" class=" m-1 btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                         Add Unit
    </button>


                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Unit</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="handle_unit.php" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="form-label grey">Unit Code</label>
                                                <input class="form-control" type="text" name="unitCode" placeholder="ECCI 1202" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="form-label grey">Unit Name</label>
                                                <input class="form-control" type="text" name="unitName" placeholder="e.g System Analysis" required>
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
                                                <label class="form-label grey">Program Id</label>
                                                <select class="form-control" name="PId" required>
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
        $sql = "SELECT * FROM `unit` ORDER BY year";
        $result = mysqli_query($link, $sql);

        if ($result){

            $data = mysqli_num_rows($result);
            if ($data>0){

                echo "<table class='table table-striped table-hover'>";
                echo "<tr>";
                echo "<th>Unit Code</th>";
                echo "<th>Unit Name</th>";
                echo "<th>Year</th>";
                echo "<th>Term</th>";
                echo "<th>Action</th>";
                echo "</tr>";

                while ($row=mysqli_fetch_array($result)){

                    echo "<tr>";
                    echo "<td>".$row['unitCode']."</td>";
                    echo "<td>".$row['unitName']."</td>";
                    echo "<td>".$row['year']."</td>";
                    echo "<td>".$row['term']."</td>";
                    echo "<td>
                        <a class='m-2' href='delete_unit.php?UId=".$row['UId']."'><span class='fa fa-trash'></span></a>
                        <a class='m-2' href='update_unit.php?UId=".$row['UId']."'><span class='fa fa-pencil'></span></a>
                        <a class='m-2' href='view_unit.php?UId=".$row['UId']."'><span class='fa fa-eye'></span></a>
                     

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