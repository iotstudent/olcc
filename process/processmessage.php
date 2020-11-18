<?php session_start();?>
<?php
include"../includes/dbconnection.php";
include"../includes/formfunctions.php";
include"../includes/sendmail.php";
?>
<?php

function emailAlert(){
    global $conn;
    $receipients = array();
    $select = " SELECT user_email from users ";
    $result = mysqli_query($conn,$select);
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $user_email = $row['user_email'];
            $receipients[] = $user_email;
        }
    sendNotificationEmail($receipients); 
}

//message table corresponds to notification related pages it was a very late change

    //create notification on notification page
    if(isset($_POST['create'])){

            $messagetitle =  test_input($_POST["messagetitle"]);
            $messagebody =  test_input($_POST["messagebody"]);
            $messagstatus =  test_input($_POST["messagestatus"]);
            date_default_timezone_set('Africa/Lagos');
            $date = date('Y/m/d', time());
            $messagedate = $date;
           
        $sql= "INSERT INTO message( message_title,message_body,message_status,message_date)VALUES('$messagetitle','$messagebody','$messagstatus','$messagedate')";
        $insert = mysqli_query($conn,$sql);

        if($insert){
            if ( $messagstatus == "Published") {
            
               emailAlert();
               $_SESSION['message'] = " Notification was sent  ";
               header('Location:../admin/createnotificationsuc.php');
               die();
                
            } else {
                    $_SESSION['message'] = " Notification was created and drafted successfully ";
                    header('Location:../admin/createnotificationsuc.php');
                    die();
                }
           
        }else {
            echo  mysqli_error($conn);
            die();
        }
    }   
    
    //delete notice from notification page
    if(isset($_POST['deletemsg'])){
        if(isset($_POST['msgid']) && !empty($_POST['msgid'])){
            
            $msgid = $_POST['msgid'];
            
            $sql= "DELETE FROM message  WHERE message_id = '$msgid'";
            $delete = mysqli_query($conn,$sql);
            if($delete){
                $_SESSION['message']= " Notification successfully deleted ";
                header('Location:../admin/notificationsuc.php');
                die();
            }else{
                echo  $mysqli_error($conn);
                die();
            }
        }
    }


    //publish notice from notification draft page
    if(isset($_POST['pubmsg'])){
        if(isset($_POST['msgid']) && !empty($_POST['msgid'])){
            
            $msgid = $_POST['msgid'];
            
            $sql= "UPDATE  message SET message_status='published',message_date=CURDATE()  WHERE message_id = '$msgid'";
            $update = mysqli_query($conn,$sql);
            
            if($update){
                emailAlert();   
                $_SESSION['message']= " Notification successfully published ";
                header('Location:../admin/notificationsuc.php');
                die();
            }else{
                echo  $mysqli_error($conn);
                die();
            }
        }
    }

      //draft notice from notification published page
    if(isset($_POST['draftmsg'])){
        if(isset($_POST['msgid']) && !empty($_POST['msgid'])){
            
            $msgid = $_POST['msgid'];
           
            $sql= "UPDATE  message SET message_status='draft' WHERE message_id = '$msgid'";
            $update = mysqli_query($conn,$sql);
            
            if($update){
                $_SESSION['message']="Notification successfully drafted ";
                header('Location:../admin/notificationsuc.php');
                die();
            }else{
                echo  $mysqli_error($conn);
                die();
            }
        }
    }
             
       
?>