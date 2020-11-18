<?php session_start();?>
<?php include "../includes/dbconnection.php";?>
<?php
if(isset($_GET['pay'])){
    $userid = $_GET["userid"];
    $type = $_GET["type"];
    $id =  $_GET["userid"];
    if(empty($_GET["amount"])) {
        $_SESSION['error'] = " Amount is required ";
        header("Location:../admin/pay.php?userid=".$userid."&pay=select");
        die();
      } else {
        $amount=$_GET['amount'];
      }
}
date_default_timezone_set('Africa/Lagos');
$renewal_date=date('Y-m-d');
//manual payment code generation
$time=date("is");
$randomid = mt_rand(100,999);
$renewal_ref= "OMP".$randomid * $time;


if($type == "quater"){   
    $renewal_end = date('Y-m-d', strtotime("+3 months", strtotime($renewal_date)));
}
if($type == "half"){
    $renewal_end = date('Y-m-d', strtotime("+6 months", strtotime($renewal_date)));
}
if($type == "annual"){
    $renewal_end = date('Y-m-d', strtotime("+12 months", strtotime($renewal_date)));
}

$insert = " INSERT INTO membership_renewal(user_id,renewal_type,renewal_date,renewal_end,renewal_amount,renewal_ref) VALUES ('$id','$type','$renewal_date','$renewal_end','$amount','$renewal_ref') ";
$result = mysqli_query($conn,$insert);
if($result){
$_SESSION['message'] = " Payment was successful ";
header("Location:../admin/duespayment.php");
}else{
    echo mysqli_error($conn);
}
?>