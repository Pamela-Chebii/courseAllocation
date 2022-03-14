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

    $UId=$_POST["UId"];
    $unitCode = $_POST["unitCode"];
    $unitName = $_POST["unitName"];
    $year = $_POST["year"];
    $term = $_POST["term"];
    $PId = $_POST["PId"];

    $up_sql = "UPDATE `unit` SET `unitCode`='$unitCode',`unitName`='$unitName',`year`='$year',`term`='$term',`PId`='$PId' WHERE UId=$UId";


    $up_result = mysqli_query($link, $up_sql);

    if ($up_result){
        echo "Record successfully updated";
    }else{
        echo "error executing query $up_sql".mysqli_error($link);
    }


}else{

    if (isset($_GET["UId"]) and !empty($_GET["UId"])){

        $UId = $_GET["UId"];

        $sql = "SELECT * FROM `unit` WHERE UId=$UId";

        $result = mysqli_query($link, $sql);

        if ($result){

            $data = mysqli_num_rows($result);

            if ($data==1){

                $row = mysqli_fetch_array($result);

                $unitCode = $row["unitCode"];
                $unitName = $row["unitName"];
                $year = $row["year"];
                $term = $row["term"];
                $PId = $row["PId"];

                ?>
                <div class="row m-2">
                    <div class="text-success h3">Update the Record</div>
                </div>
                <div class="row m-2">
                    <div class="card">
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="form-label grey">Unit Code</label>
                                        <input class="form-control" type="text" name="unitCode" value="<?php echo $unitCode; ?>"required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="form-label grey">Unit Name</label>
                                        <input class="form-control" type="text" name="unitName" value="<?php echo $unitName; ?>" required>
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
                                <div>
<!--                                    <label>Unit Id</label>-->
                                    <input type="hidden" name="UId" value="<?php echo $_GET["UId"]; ?>" required>
                                </div>
                                <div class="row p-2">
                                    <div class="col-md-12">
                                        <input type="submit" name="update" class="col-md-3 btn btn-success" value="UPDATE">
                                        <a class="btn btn-warning col-md-3" href="unit.php">BACK</a>
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



