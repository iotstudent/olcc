<?php session_start();?>
<?php
include "../includes/dbconnection.php";
include "../includes/formfunctions.php";
?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST["data"])) {
      $_SESSION['error']=" Email or Membership code is required";
      header("Location:../member/login.php");
      die();
    } else {
      $data =  test_input($_POST["data"]);
    }
    
    if(empty($_POST["password"])) {
      $_SESSION['error']="Password is required";
      header("Location:../member/login.php");
      die();
    } else {
      $password = test_input($_POST["password"]);
    }
    
  }

// check if user exist
$sql= " SELECT * FROM users WHERE user_email = '$data' OR  (user_code='$data') ";
    if($result = mysqli_query($conn,$sql)){
        if (mysqli_num_rows($result)<1){
            $_SESSION['error'] = " memebership code or email is not registered";
            header("Location:../member/login.php");
            die();
          }       
      }




if(mysqli_num_rows($result)==1){
    //extract data from db row and store in an array
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $db_password = $row["user_password"];
        $_SESSION['logged'] = $row["user_id"];
        $_SESSION['username'] = $row["username"];
        $_SESSION['fname'] = $row["user_firstname"];
        $_SESSION['lname'] = $row["user_lastname"];
        $_SESSION['code'] = $row["user_code"];
        $_SESSION['email'] = $row["user_email"];
        $_SESSION['phone'] = $row["user_phone"];
        $_SESSION['type'] = $row["user_type"];
        $_SESSION['gender'] = $row["user_gender"];
        $_SESSION['status'] = $row["user_status"];
        $_SESSION['chesslevel'] = $row["user_chesslevel"];
        $_SESSION['state'] = $row["user_state"];
        $_SESSION['lga'] = $row["user_lga"];
        $_SESSION['street'] = $row["user_street"];
        $_SESSION['age'] = $row["user_age"];
        $_SESSION['bday'] = $row["user_bday"];
        
    // check for password matching
    if(password_verify($password, $db_password)){
        header("Location:../member/index.php");
        die();
      }else{
          $_SESSION['error'] = " Wrong login details";
          header("Location:../member/login.php");
          die();
      }
    
}