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
        <p class="h3 m-1 grey text-center">ALLOCATED UNITS</p>

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
        echo "</tr>";

        while ($row=mysqli_fetch_array($result)){

            echo "<tr>";
            echo "<td>".$row['cohort']."</td>";
            echo "<td>".$row['year']."</td>";
            echo "<td>".$row['term']."</td>";
            echo "<td>".$row['unit']."</td>";
            echo "<td>".$row['lecturer']."</td>";


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
