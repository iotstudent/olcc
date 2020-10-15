<?php session_start();?>
<?php
include"../includes/dbconnection.php";
include"../includes/formfunctions.php";
?>
<?php


    //create vacancy from vacancy page
    if(isset($_POST['create'])){

        $jobtitle =  test_input($_POST["jobtitle"]);
        $deadline =  test_input($_POST["deadline"]);
        $jobdsc=  test_input($_POST["jobdsc"]);
        
        $sql= "INSERT INTO jobs(job_title,deadline,job_dsc)VALUES('$jobtitle','$deadline','$jobdsc')";
        $insert = mysqli_query($conn,$sql);
        if($insert){
        $_SESSION['message']=" Vacancy created successfully";
        header('Location:../admin/vacancysuc.php');
        die();
        }else{
        echo  'failed'. mysqli_error($conn);
        die();
        }
    }   

     //delete vacancy from vacancy page
     if(isset($_POST['deletejob'])){
        if(isset($_POST['jobid']) && !empty($_POST['jobid'])){
            $jobid = $_POST['jobid'];
            $sql= "DELETE  jobs,applicants FROM applicants  INNER JOIN jobs ON jobs.job_id=applicants.job_id  WHERE jobs.job_id ='$jobid'";
            $delete = mysqli_query($conn,$sql);
            if($delete){
                $_SESSION['message']=" Vancancy and all applicants  successfully deleted ";
                header('Location:../admin/vacancysuc.php');
                die();
            }else{
                echo  mysqli_error($conn);
                die();
            }
        }
    }

    //delete applicant from applied page
    if(isset($_GET['deleteapp'])){
        if(isset($_GET['appid']) && !empty($_GET['appid'])){
            $appid = $_GET['appid'];
            echo $appid;
            $sql= "DELETE FROM applicants WHERE applicant_id ='$appid'";
            $delete = mysqli_query($conn,$sql);
            if($delete){
                $_SESSION['message']=" Applicant  successfully deleted ";
                header('Location:../admin/vacancysuc.php');
                die();
            }else{
                echo  mysqli_error($conn);
                die();
            }
        }
    }