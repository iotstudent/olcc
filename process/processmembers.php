<?php session_start();?>
<?php
include"../includes/dbconnection.php";
include"../includes/formfunctions.php";
?>
<?php


    //create member from member page
    if(isset($_POST['create'])){

        $fname =  test_input($_POST["fname"]);
        $lname =  test_input($_POST["lname"]);
        $email =  test_input($_POST["email"]);
        $password = test_input($_POST["password"]);
        //password encryption
        $password = password_hash($password,PASSWORD_DEFAULT);
        $sql= "INSERT INTO users(user_firstname,user_lastname,user_email,user_password)VALUES('$fname','$lname','$email','$password')";
        $insert = mysqli_query($conn,$sql);
        if($insert){
        $_SESSION['message']=" Member created ";
        header('Location:../admin/membersuc.php');
        die();
        }else{
        echo  'failed'. mysqli_error($conn);
        die();
        }
    }   


    //upgrade member from upgrade page
    if(isset($_GET['upgrade'])){
        $membertype =  test_input($_GET["membertype"]);
        $userid =  test_input($_GET["userid"]);

        $sql= "UPDATE users SET user_type = '$membertype' WHERE user_id = '$userid'";
        $update = mysqli_query($conn,$sql);
        if($update){
        $_SESSION['message']="Membership type successfully upgraded";
        header('Location:../admin/membersuc.php');
        die();
        }else{
        echo  'failed'. mysqli_error($conn);
        die();
        }
    }   