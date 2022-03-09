<?php
session_start();
//check if user has logged in?

if (!isset($_SESSION["loggedin"]) or $_SESSION["loggedin"] !== true) {
    header("location:index.php");
    exit();
}
include "header_2.php";
include "connect.php";
?>
<div class="row m-2">
    <div class="col-10">
        <p class="h3 m-1 grey text-center">SCIT PROGRAMS</p>

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
            echo "</tr>";

            while ($row=mysqli_fetch_array($result)){

                echo "<tr>";
                echo "<td>".$row['PId']."</td>";
                echo "<td>".$row['programName']."</td>";


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
