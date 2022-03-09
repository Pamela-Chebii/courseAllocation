<?php
include "connect.php";
session_start();

if (isset($_POST['login'])){
    $userEmail = $_POST["emailAddress"];
    $userPassword = $_POST["password"];

    //compare

    $sql = "SELECT * FROM `staff` WHERE emailAddress='$userEmail'";
    $result = mysqli_query($link, $sql);

    if ($result){
        $data = mysqli_num_rows($result);

        if ($data==1){

            while ($row=mysqli_fetch_array($result)){
                $staffId = $row['staffId'];
                $emailAddress = $row["emailAddress"];
                $password =$row["password"];
                $firstName =$row["firstName"];
                $lastName =$row["lastName"];
                $user_type=$row["role"];

                //verify password
                if (password_verify($userPassword,$password)){

                    if ($row["role"]=='Lecturer'){

                        session_start();
                        $_SESSION["loggedin"]=true;
                        $_SESSION["staffId"]=$staffId;
                        $_SESSION["username"]=$firstName." ".$lastName;
                        $_SESSION["usertype"]=$user_type;

                        header("location:lecturer_dashboard.php");



                    }elseif ($row["role"]=="admin"){
                        $_SESSION["loggedin"]=true;
                        $_SESSION["staffId"]=$staffId;
                        $_SESSION["username"]=$firstName. " ".$lastName;
                        $_SESSION["usertype"]=$user_type;

                        header("location:Dashboard.php");

                    }elseif ($row["role"]=="Atl"){
                        $_SESSION["loggedin"]=true;
                        $_SESSION["staffId"]=$staffId;
                        $_SESSION["username"]=$firstName. " ".$lastName;
                        $_SESSION["usertype"]=$user_type;

                        header("location:Dashboard.php");

                    }
                    elseif ($row["role"]=="Coordinator"){
                        $_SESSION["loggedin"]=true;
                        $_SESSION["staffId"]=$staffId;
                        $_SESSION["username"]=$firstName. " ".$lastName;
                        $_SESSION["usertype"]=$user_type;

                        header("location:Dashboard.php");

                    }
                    else{
                        echo "Please ask the admin to assign you a usertype";
                    }


                }else{
                    echo "Passwords are not matching";
                }
            }

        }else{
            echo "The email address does not exist";
        }
    }

}
