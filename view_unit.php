<?php

session_start();
//check if user has logged in?

if (!isset($_SESSION["loggedin"]) or $_SESSION["loggedin"]!==true){
    header("location:index.php");
    exit();
}
include "header.php";
include "connect.php";


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

                <div class="grey text-center h3">VIEW RECORDS</div>

            </div>

            <div class="row m-2">
                <div class="col-md-3">

                </div>

                <div class="card col-md-6 m-2 bg-success">
                    <div class="card-body">
                        <div>
                            <label class="form-label h6 text-white">UNIT CODE</label>
                            <p class="text-dark"><?php echo $unitCode; ?></p>
                        </div>
                        <hr>
                        <div>
                            <label class="form-label h6 text-white">UNIT NAME</label>
                            <p class="text-dark"><?php echo $unitName; ?></p>
                        </div>
                        <hr>
                        <div>
                            <label class="form-label h6 text-white">YEAR OF STUDY</label>
                            <p class="text-dark"><?php echo $year; ?></p>
                        </div>
                        <hr>
                        <div>
                            <label class="form-label h6 text-white">TERM</label>
                            <p class="text-dark"><?php echo $term; ?></p>
                        </div>
                        <hr>


                    </div>
                    <div>
                        <a class="btn btn-warning col-md-4" href="unit.php">BACK</a>
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
?>
