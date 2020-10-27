<?php
session_start();
include "../includes/dbconnection.php";
include "../includes/formfunctions.php";


if($_SERVER['REQUEST_METHOD'] == "POST"){
 
    if(empty($_POST['fname'])){
        $_SESSION['error'] = " First name is required ";
        header("Location:../signup.php");
        die();
    }else{
     $fname = test_input($_POST['fname']);
    }

    if(empty($_POST['lname'])){
        $_SESSION['error'] = " Last name is required ";
        header("Location:../member/signup.php");
        die();
    }else{
     $lname = test_input($_POST['lname']);
    }


    if(empty($_POST['email'])){
        $_SESSION['error'] = " Email is required ";
        header("Location:../member/signup.php");
        die();
    }else{
        $email = test_input($_POST['email']);
    }
 
    if(empty($_POST['password'])){
        $_SESSION['error'] = " Password is required ";
        header("Location:../member/signup.php");
        die();
     }
    if(empty($_POST['cpassword'])){
        $_SESSION['error'] = " Password needs to be confirmed ";
        header("Location:../member/signup.php");
        die();
    }
 
 if($_POST["cpassword"] == $_POST["password"]){
    $password = test_input($_POST['password']);
    } else {
    $_SESSION['error'] = " Password doesnt match ";
    header("Location:../member/signup.php");
    die();
    } 
    
}

input_length($fname);
check_for_number_in_string($fname);
check_for_number_in_string($lname);
validity_of_mail();


//check db if email already exist
$sql= " SELECT * FROM users WHERE user_email = '$email' " ;
if($result = mysqli_query($conn,$sql)){
if (mysqli_num_rows($result)>0){
    $_SESSION['error'] = " This Email has been used before ";
    header("Location:../signup.php");
    die();
  }       
}

//password hashing
$password = password_hash($password,PASSWORD_DEFAULT);

//membership code generation
$time=date("is");
$randomid = mt_rand(10000,99999);
$code = "OLCC".$randomid * $time;

//inserting user data to db
$sql = " INSERT INTO users (user_firstname,user_lastname,user_email,user_password,user_code) VALUES ('$fname','$lname','$email','$password','$code') ";
$insert = mysqli_query($conn,$sql);
if($insert){
    $_SESSION['message'] = " Registration Successful";
    header("Location:../member/login.php");
}else{
    echo "ERROR: Could not able to execute $sql. ".mysqli_error($conn); 
    }