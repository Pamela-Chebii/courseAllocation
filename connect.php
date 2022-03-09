<?php
$link = mysqli_connect( "localhost", "root", "", "courseAllocation" );
if ($link==false){
    die("Error connecting to Server".mysqli_connect_error($link));
}