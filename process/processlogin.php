<?php session_start();?>

<?php
include "../includes/dbconnection.php";
include "../includes/formfunctions.php";
?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST["username"])) {
      $_SESSION['error']="Username is required";
      header("Location:../admin/login.php");
      die();
    } else {
      $username =  test_input($_POST["username"]);
    }
    
    if(empty($_POST["password"])) {
      $_SESSION['error']="Password is required";
      header("Location:../admin/login.php");
      die();
    } else {
      $password = test_input($_POST["password"]);
    }
    
  }

// check if user exist
$sql= " SELECT * FROM admin WHERE username = '$username' ";
    if($result = mysqli_query($conn,$sql)){
        if (mysqli_num_rows($result)<1){
            $_SESSION['error'] = " Wrong details";
            header("Location:../admin/login.php");
            die();
          }       
      }




if(mysqli_num_rows($result)==1){
    //extract data from db row and store in an array
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $db_password = $row["password"];
        $_SESSION['logged'] = $row["admin_id"];
        $_SESSION['username'] = $row["username"];
        
        
    // check for password matching
    if(password_verify($password, $db_password)){
        header("Location:../admin/index.php");
        die();
      }else{
          $_SESSION['error'] = " Wrong login details";
          header("Location:../admin/login.php");
          die();
      }
    
}