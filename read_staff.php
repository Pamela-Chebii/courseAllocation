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
        <p class="h3 m-1 grey text-center">SCIT LECTURERS</p>

    </div>
</div>
<?php
$sql = "SELECT * FROM `staff` ORDER BY firstName";
$result = mysqli_query($link, $sql);

if ($result){

    $data = mysqli_num_rows($result);
    if ($data>0){

        echo "<table class='table table-striped table-hover'>";
        echo "<tr>";
        echo "<th>Staff No</th>";
        echo "<th>Name</th>";
        echo "<th>Email Address</th>";
        echo "<th>Phone Number</th>";
        echo "</tr>";

        while ($row=mysqli_fetch_array($result)){

            echo "<tr>";
            echo "<td>".$row['pfNo']."</td>";
            echo "<td>" .$row['firstName']. " ".$row['lastName']."</td>";
            echo "<td>".$row['emailAddress']."</td>";
            echo "<td>".$row['phoneNumber']."</td>";


            echo "</tr>";

        }

        echo "</table>";



    }else{
        echo "<p class='alert alert-warning'>No records found</p>";
    }

}else{
    echo "Error executing query $sql".mysqli_error($link);
}


