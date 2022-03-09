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
        <p class="h3 m-1 grey">Programs</p>

    </div>
    <div class="col-8">
        <!-- Button trigger modal -->
        <button type="button" class=" m-1 btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add Course
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Course</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="handle_program.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="form-label grey">Program Name</label>
                                    <select class="form-control" name="programName">

                                        <option value="null">Select Programs</option>
                                        <option value="BACHELOR OF TECHNOLOGY IN COMMUNICATION AND COMPUTER NETWORKS">BACHELOR OF TECHNOLOGY IN COMMUNICATION AND COMPUTER NETWORKS</option>
                                        <option value="BACHELOR OF TECHNOLOGY IN COMPUTER TECHNOLOGY">BACHELOR OF TECHNOLOGY IN COMPUTER TECHNOLOGY</option>
                                        <option value="BACHELOR OF TECHNOLOGY IN INFORMATION TECHNOLOGY">BACHELOR OF TECHNOLOGY IN INFORMATION TECHNOLOGY</option>
                                        <option value="DIPLOMA IN TECHNOLOGY IN COMPUTER TECHNOLOGY">DIPLOMA IN TECHNOLOGY IN COMPUTER TECHNOLOGY</option>
                                        <option value="DIPLOMA IN TECHNOLOGY IN INFORMATION TECHNOLOGY">DIPLOMA IN TECHNOLOGY IN INFORMATION TECHNOLOGY</option>
                                        <option value="DIPLOMA IN TECHNOLOGY IN COMMUNICATION AND COMPUTER NETWORKS">DIPLOMA IN TECHNOLOGY IN COMMUNICATION AND COMPUTER NETWORKS</option>

                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="form-label grey">Level</label>
                                    <select class="form-control" name="id">
                                        <option value="null">Select Program Level</option>
                                        <?php

                                        $sql = "SELECT `id`, `level` FROM `qualification`";
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
    $sql = "SELECT * FROM `program`";
    $result = mysqli_query($link, $sql);

    if ($result){

        $data = mysqli_num_rows($result);
        if ($data>0){

            echo "<table class='table table-striped table-hover'>";
            echo "<tr>";
            echo "<th>Program Id</th>";
            echo "<th>Program Name</th>";
            echo "<th>Action</th>";
            echo "</tr>";

            while ($row=mysqli_fetch_array($result)){

                echo "<tr>";
                echo "<td>".$row['PId']."</td>";
                echo "<td>".$row['programName']."</td>";
                echo "<td>
                        <a class='m-2' href='delete_program.php?PId=".$row['PId']."'><span class='fa fa-trash'></span></a>
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
