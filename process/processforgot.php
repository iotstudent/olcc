<?php session_start();?>
<?php include "../includes/dbconnection.php";?>
<?php include "../includes/formfunctions.php";?>
<?php include "../includes/sendmail.php";?>
<?php

//check for errors in the eemail from form on forgot.php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST["email"])) {
      $_SESSION['error'] = "Email is required";
      header("Location:../member/forgot.php");
      die();
    } else {
      $email =  test_input($_POST["email"]);
    }
    
  }


// check if user exist
$sql= " SELECT * FROM users WHERE user_email = '$email' ";
    if($result = mysqli_query($conn,$sql)){
        if (mysqli_num_rows($result)<1){
            $_SESSION['error'] = " This email is not registered with us ";
            header("Location:../member/forgot.php");
            die();
          }       
      }



// encrypt email to be used as token in url sent to mail
if(mysqli_num_rows($result)==1){
      
        $encryption= rtrim(strtr(base64_encode($email), '+/', '-_'), '=');
        sendResetEmail($email,$encryption);
        $_SESSION['message'] = " A link was sent to your mail  ";
        header("Location:../member/forgot.php");
        die();

    }