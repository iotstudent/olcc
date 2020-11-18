<?php session_start();?>
<?php
include"../includes/dbconnection.php";
include"../includes/formfunctions.php";
include"../includes/sendmail.php";
?>
<?php



    //create member from member page
    if(isset($_POST['create'])){

        $fname =  test_input($_POST["fname"]);
        $lname =  test_input($_POST["lname"]);
        $email =  test_input($_POST["email"]);
        $password = test_input($_POST["password"]);
        $pass=$password;
        

        //check db if email already exist
        $sql= " SELECT * FROM users WHERE user_email = '$email' " ;
        if($result = mysqli_query($conn,$sql)){
            if (mysqli_num_rows($result)>0){
                $_SESSION['error'] = " This Email has been used before ";
                header("Location:../admin/createmember.php");
                die();
            }       
        }
        
        //password encryption
        $password = password_hash($password,PASSWORD_DEFAULT);

        $sql= "INSERT INTO users(user_firstname,user_lastname,user_email,user_password)VALUES('$fname','$lname','$email','$password')";
        $insert = mysqli_query($conn,$sql);
        if($insert){
        //send details to  email of the member created
        emailMembershipCreation($email,$pass);
        $_SESSION['message']=" Member created ";
        header('Location:../admin/createmembersuc.php');
        die();
        }else{
        echo  'failed'. mysqli_error($conn);
        die();
        }

    }   


    //edit member from upgrade page
    if(isset($_GET['edit'])){
        $membertype =  test_input($_GET["membertype"]);
        $status =  test_input($_GET["status"]);
        $chesslevel =  test_input($_GET["chesslevel"]);
        $fidetitle =  test_input($_GET["fidetitle"]);
        $fideno =  test_input($_GET["fideno"]);
        $fname =  test_input($_GET["fname"]);
        $lane =  test_input($_GET["lname"]);
        $userid =  test_input($_GET["userid"]);

        $sql= "UPDATE users SET user_type = '$membertype',user_status='$status',user_chesslevel='$chesslevel',fide_title='$fidetitle',fide_number='$fideno',user_lastname='$lname',user_firstname='$fname' WHERE user_id = '$userid'";
        $update = mysqli_query($conn,$sql);
        if($update){
        $_SESSION['message']="Changes successfully made";
        header('Location:../admin/membersuc.php');
        die();
        }else{
        echo  'failed'. mysqli_error($conn);
        die();
        }
    }   


    //disable member from upgrade page
    if(isset($_GET['disable'])){
        $userid =  test_input($_GET["userid"]);
        $sql= "UPDATE users SET user_disabled = 'yes' WHERE user_id = '$userid'";
        $update = mysqli_query($conn,$sql);
        if($update){
        $_SESSION['message']=" User successfully disabled ";
        header('Location:../admin/membersuc.php');
        die();
        }else{
        echo  'failed'. mysqli_error($conn);
        die();
        }
    }   


     //disable member from upgrade page
     if(isset($_GET['enable'])){
        $userid =  test_input($_GET["userid"]);
        $sql= "UPDATE users SET user_disabled = NULL  WHERE user_id = '$userid'";
        $update = mysqli_query($conn,$sql);
        if($update){
        $_SESSION['message']=" User successfully enabled ";
        header('Location:../admin/membersuc.php');
        die();
        }else{
        echo  'failed'. mysqli_error($conn);
        die();
        }
    } 

//change member password

if(isset($_POST['memberpass'])){
    
     $userid =  test_input($_POST["userid"]);
    
     if(empty($_POST["password"])) {
        $_SESSION['error'] = " Password is required ";
        header("Location:../admin/upgrade.php?userid=".$userid."&formedit=Edit");
        die();
      } else {
        $password = test_input($_POST["password"]);
      }
    
     if(empty($_POST["cpassword"])) {
        $_SESSION['error'] = " Password needs to be confirmed ";
        header("Location:../admin/upgrade.php?userid=".$userid."&formedit=Edit");
        die();
      } else {
        $cpassword = test_input($_POST["cpassword"]);
      }
    //compare new password and reentered passowrd for matching
    if($_POST["password"] == $_POST["cpassword"]){
        $password = $cpassword;
    } else {
        $_SESSION['error'] = " New Password doesn't match ";
        header("Location:../admin/upgrade.php?userid=".$userid."&formedit=Edit");
        die();
    }   

    //hash new password
  $password = password_hash($password,PASSWORD_DEFAULT);

    $sql= "UPDATE users SET user_password = '$password' WHERE user_id = '$userid'";
    $update = mysqli_query($conn,$sql);
    if($update){
    $_SESSION['message']="Password Successfully Changed";
    header('Location:../admin/membersuc.php');
    die();
    }else{
    echo  'failed'. mysqli_error($conn);
    die();
    }
}   