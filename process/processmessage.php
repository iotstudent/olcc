<?php session_start();
$id = $_SESSION['logged'];
?>
<?php
include"../includes/dbconnection.php";
include"../includes/formfunctions.php";
?>
<?php


    //create post on message page
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
        $_SESSION['message']="Message sent ";
        header('Location:../admin/createmessagesuc.php');
        die();
        }else{
        echo  mysqli_error($conn);
        die();
        }
    }   
    
    //delete post from message page
    if(isset($_POST['deletemsg'])){
        if(isset($_POST['msgid']) && !empty($_POST['msgid'])){
            $msgid = $_POST['msgid'];
            $sql= "DELETE FROM message  WHERE message_id = '$msgid'";
            $delete = mysqli_query($conn,$sql);
            if($delete){
                $_SESSION['message']="Message successfully deleted ";
                header('Location:../admin/messagesuc.php');
                die();
            }else{
                echo  $mysqli_error($conn);
                die();
            }
        }
    }


    //publish post from message draft page
    if(isset($_POST['pubmsg'])){
        if(isset($_POST['msgid']) && !empty($_POST['msgid'])){
            $msgid = $_POST['msgid'];
            $sql= "UPDATE  message SET message_status='published',message_date=CURDATE()  WHERE message_id = '$msgid'";
            $update = mysqli_query($conn,$sql);
            if($update){
                $_SESSION['message']="Message successfully published ";
                header('Location:../admin/messagesuc.php');
                die();
            }else{
                echo  $mysqli_error($conn);
                die();
            }
        }
    }

             
             
       
    ?>