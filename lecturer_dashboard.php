<?php
session_start();
//check if user has logged in?

if (!isset($_SESSION["loggedin"]) or $_SESSION["loggedin"] !== true) {
    header("location:index.php");
    exit();
}
include "header_2.php";
?>
<div class="row m-2">
    <div class="col-12">
        <p class="h3 m-1 grey text-center">The Technical University of Kenya</p>
    </div>
</div>
<div class="row m-2">
    <div class="col-md-12">

        <img src="Images/bulding.png" alt="loading" width="1000" height="600">

    </div>

</div>