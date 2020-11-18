<?php session_start();?>
<?php include "../includes/dbconnection.php";?>
<?php include "../includes/formfunctions.php";?>
<?php

$id = $_SESSION['logged'];

//collect data from form on profile.php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  
      $fname = test_input($_POST["fname"]);
      $lname = test_input($_POST["lname"]);
      $uname = test_input($_POST["uname"]);
      $email = test_input($_POST["email"]);
      $phone = test_input($_POST["phone"]);
      $state = test_input($_POST["state"]);
      $lga = test_input($_POST["lga"]);
      $street = test_input($_POST["street"]);
      $bday = test_input($_POST["bday"]);
      $gender = test_input($_POST["gender"]);
      $age = test_input($_POST["age"]);
      $chesslevel = test_input($_POST["chesslevel"]);
      $fidetitle = test_input($_POST["fidetitle"]);
      $fideno = test_input($_POST["fideno"]);
  
  }
  
  
  
  
  $sql = " UPDATE users SET user_firstname = '$fname', user_lastname = '$lname',username = '$uname',user_email = '$email',user_phone = '$phone',user_state = '$state',user_lga = '$lga',user_street = '$street',user_bday = '$bday',user_gender = '$gender',user_age = '$age',user_chesslevel = '$chesslevel',fide_title='$fidetitle',fide_number='$fideno' WHERE user_id = '$id' ";
      if($result = mysqli_query($conn,$sql)){
        // reset data  session        
            $_SESSION['username'] = $uname;
            $_SESSION['fname'] = $fname;
            $_SESSION['lname'] = $lname;
            $_SESSION['email'] = $email;
            $_SESSION['phone'] = $phone;
            $_SESSION['gender'] = $gender;
            $_SESSION['state'] = $state;
            $_SESSION['lga'] = $lga;
            $_SESSION['street'] = $street;
            $_SESSION['bday'] = $bday;
            $_SESSION['age'] = $age;
            $_SESSION['chesslevel'] = $chesslevel;
            $_SESSION['code'] = $code;
            $_SESSION['fideno'] = $fideno;
            $_SESSION['fidetitle'] = $fidetitle;
            $_SESSION['message'] = " Profile successfully updated";
            header("Location:../member/index.php");
            die();

        }else{
                
            echo "ERROR: Could not able to execute $sql. ".mysqli_error($conn); 
        
        }


       