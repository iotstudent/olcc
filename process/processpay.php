<?php session_start();?>
<?php include "../includes/dbconnection.php";?>
<?php
$id=$_SESSION['logged'];
date_default_timezone_set('Africa/Lagos');
$renewal_date=date('Y-m-d');
$renewal_ref=$_GET['pref'];
$amount=$_GET['amount'];
$type=$_GET['type'];

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
header("Location:../member/dues.php");
}else{
    echo mysqli_error($conn);
}
?>