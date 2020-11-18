<?php session_start();
$id = $_SESSION['logged'];
?>
<?php include "../includes/dbconnection.php";?>
<?php include "../includes/formfunctions.php";?>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  
    if(empty($_POST["password"])) {
      $_SESSION['error'] = " Password is required ";
      header("Location:../member/change.php");
      die();
    } else {
      $current_password = test_input($_POST["password"]);
    }
  
    if(empty($_POST["npassword"])) {
      $_SESSION['error'] = " Type in a new password ";
      header("Location:../member/change.php");
      die();
    } else {
      $new_password = test_input($_POST["npassword"]);
    }
  
    if(empty($_POST["rnpassword"])) {
      $_SESSION['error'] = " New Password needs to be rentered";
      header("Location:../member/change.php");
      die();
    } else {
      $rn_password = test_input($_POST["rnpassword"]);
    }   
  }
  
  //compare new password and reentered passowrd for matching
  if($_POST["npassword"] == $_POST["rnpassword"]){
      $new_password = $rn_password;
    } else {
      $_SESSION['error'] = " New Password doesnt match ";
      header("Location:../member/change.php");
      die();
  }
  

//hash new password
  $new_password = password_hash($new_password,PASSWORD_DEFAULT);

  //select 
  $sql= " SELECT user_password FROM users WHERE user_id = '$id' ";
      if($result = mysqli_query($conn,$sql)){       
              if(mysqli_num_rows($result)==1){
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    $db_password = $row["user_password"];
                     // check for password matching between current password and passowrd from db
                    if(password_verify($current_password, $db_password)){
                        $sql = "UPDATE users SET user_password = '$new_password' WHERE user_id = '$id' ";
                        $update = mysqli_query($conn,$sql);
                        $_SESSION['message'] = " Password successfully changed";
                        header("Location:../member/logout.php");
                        die();
                    }else{
                        $_SESSION['error'] = " Password does not match";
                        header("Location:../member/change.php");
                        die();
                    }
        
              }   
        }else{
            echo mysql_error($conn);
        }