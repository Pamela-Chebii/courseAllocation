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


    $cohortId = $_POST["cohortId"];
    $up_programCode = $_POST["programCode"];
    $up_course = $_POST["course"];
    $up_PId = $_POST["PId"];

    $up_sql = "UPDATE `cohort` SET `programCode`='$up_programCode',`course`='$up_course',`PId`='$up_PId' WHERE cohortId=$cohortId";


    $up_result = mysqli_query($link, $up_sql);

    if ($up_result){
        echo "Record successfully updated";
    }else{
        echo "error executing query $up_sql".mysqli_error($link);
    }


}else{

    if (isset($_GET["cohortId"]) and !empty($_GET["cohortId"])){

        $cohortId = $_GET["cohortId"];

        $sql = "SELECT * FROM `cohort` WHERE cohortId=$cohortId";

        $result = mysqli_query($link, $sql);

        if ($result){

            $data = mysqli_num_rows($result);

            if ($data==1){

                $row = mysqli_fetch_array($result);

                $programCode = $row['programCode'];
                $course = $row['course'];
                $PId = $row['PId'];

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
                        <label class="form-label grey">Program Code</label>
                        <input class="form-control" type="text" name="programCode" value="<?php echo $programCode; ?>" >
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
                <div>
                    <label>Cohort Id</label>
                    <input type="hidden" name="cohortId" value="<?php echo $_GET["cohortId"]; ?>" required>
                </div>
                    <div class="row p-2">
                        <div class="col-md-12">
                            <input type="submit" name="update" class="col-md-3 btn btn-success" value="UPDATE">
                            <a class="btn btn-warning col-md-3" href="cohort.php">BACK</a>
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<div class="col-md-12">
    <a class="btn btn-warning col-md-3" href="cohort.php">BACK</a>
</div>
</body>
</html>

