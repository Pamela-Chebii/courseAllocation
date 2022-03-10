<?php
session_start();
//check if user has logged in?

if (!isset($_SESSION["loggedin"]) or $_SESSION["loggedin"] !== true) {
    header("location:index.php");
    exit();
}
include "header.php";
include "connect.php";

if (isset($_POST["submit"]) and !empty($_POST["id"])){

    $id = $_POST["id"];
    $sql = "DELETE FROM `qualification` WHERE id=$id";
    $result = mysqli_query($link, $sql);

    if ($result){
        echo "<div class='row m-2 text-center'>";
        echo "<p class='alert alert-danger'>Record deleted Successfully</p>";
        echo "<a class='btn btn-success col-md-4' href='academicPrograms.php'>BACK</a>";
        echo "</div>";

    }else{
        echo "Error executing query $sql" .mysqli_error($link);
    }

}else{

?>

<div class="row m-2">
    <div class="alert alert-warning">

        <form action="delete.php" method="post">
            <div class="p-2 text-center">
                <label class="form-label">Are you sure you want to delete this record?</label> <br>
                <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">
            </div>
            <div class="p-2 text-center">
                <input type="submit" name="submit" value="YES" class="btn btn-warning col-md-3">
                <a href="academicPrograms.php" class="btn btn-success col-md-3">NO</a>
            </div>
        </form>

    </div>
</div>
<?php
}
?>