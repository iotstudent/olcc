<?php session_start();
if(!isset($_SESSION['adminlogged'])){
    header("Location:../admin/login.php");
}
?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php 
include"../includes/head.php";
include"../includes/dbconnection.php";
?>
<title> Admin| Dashboard </title>
</head>
<style>
*{
font-size:14px !important;
}
.col-md-12{
    padding-right:5px !important;
    padding-left:5px !important;
}

</style>
<body>
        <div class="container-fluid">
            <div class="row"> 
                    <!-- table -->
                        <div class="col-md-12" style="">
                                <div class="card card-header bg-brand">
                                    <h4 class="text-white">Report <i class="fa fa-folder kpi--icons kpi--icons-light"></i></h4>
                                  </div>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-stripped  table-bordered">
                                            <thead>
                                                <th></th>
                                                <th>Name</th>
                                                <th>Code</th>
                                                <th>Status</th>
                                                <th>Registration Date</th>
                                                <th>FIDE details</th>
                                                <th>Phone no</th>
                                                <th>Email</th>
                                                <th>Gender</th>
                                                <th>Address</th>
                                                <th>Birthday</th>
                                                <th>ChessLevel</th>
                                                <th>Age group</th>
                                            </thead>
                                            <tbody>

                                <?php
                                            
                                            
                                        if(isset($_POST['report'])){
                                        
                                            $gender= $_POST['gender'];
                                            $status= $_POST['status'];
                                            $date= $_POST['date'];
                                            $udate= $_POST['udate'];
                                            if($udate && empty($date)){
                                                $_SESSION['error'] = " 'To this date cannot be used alone' ";
                                                header("Location:reports.php");
                                                die();
                                            }
                                            $type= $_POST['type'];
                                            $level= $_POST['level'];
                                            
                                            // when all is empty
                                            if( empty($date) && empty($gender) && empty($status) && empty($type) && empty($level)) {


                                                $sql= " SELECT * FROM users";
                                                if($result = mysqli_query($conn,$sql)){ 
                                                        if (mysqli_num_rows($result)>0){
                                                            $n=1;
                                                            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                                                $fname = $row['user_firstname'];
                                                                $lname = $row['user_lastname'];
                                                                $user_phone = $row['user_phone'];
                                                                $user_email = $row['user_email'];
                                                                $user_gender = $row['user_gender'];
                                                                $user_status = $row['user_status'];
                                                                $user_code = $row['user_code'];
                                                                $user_state = $row['user_state'];
                                                                $user_lga = $row['user_lga'];
                                                                $user_street = $row['user_street'];
                                                                $user_bday = $row['user_bday'];
                                                                $chesslevel = $row['user_chesslevel'];
                                                                $age = $row['user_age'];
                                                                $fideno=$row['fide_number'];
                                                                $fidetitle=$row['fide_title'];
                                                                $regdate=$row['reg_date'];
                                                                echo'
                                                                <tr>
                                                                    <td>'.$n.'</td>
                                                                    <td>'.$fname.' '.$lname.'</td>
                                                                    <td>'.$user_code.'</td>
                                                                    <td>'.$user_status.'</td>
                                                                    <td>'.$fideno." \n ".$fidetitle.'</td>
                                                                    <td>'.$regdate.'</td>
                                                                    <td>'.$user_phone.'</td>
                                                                    <td>'.$user_email.'</td>
                                                                    <td>'.$user_gender.'</td>
                                                                    <td>'.$user_state."\n".$user_lga."\n".$user_street.'</td>
                                                                    <td>'.$user_bday.'</td>
                                                                    <td>'.$chesslevel.'</td>  
                                                                    <td>'.$age.'</td>               
                                                                </tr>';
                                                                $n++;    
                                                            }
                                                        }else{
                                                            echo "<tr><td> No data found</td></tr>";
                                                        } 
                                                }else 
                                                    { 
                                                    
                                                        echo "ERROR: Could not able to execute $sql. ".mysqli_error($conn); 
                                                } 
                                                    die();
                                            }


                                            // when date is set 
                                            if(!empty($date)) {
                                                $conditions = array();
                                                if(!empty($status)){
                                                    $conditions[] = " user_status='$status'";
                                                }else{
                                                    $conditions[] = ' user_status <> " " ';
                                                }
                                                if(!empty($gender)){
                                                    $conditions[] = " user_gender='$gender'";
                                                }else{
                                                    $conditions[] = ' user_gender <> " " ';
                                                }
                                                if(!empty($type)){
                                                    $conditions[] = " user_type='$type'";
                                                }else{
                                                    $conditions[] = ' user_type <> " " ';
                                                }
                                                if(!empty($level)){
                                                    $conditions[] = " user_chesslevel='$level'";
                                                }else{
                                                    $conditions[] = ' user_chesslevel <> " " ';
                                                }

                                            

                                                $sql= " SELECT * FROM users WHERE ". implode(' AND ', $conditions)."AND (reg_date BETWEEN '$date' AND '$udate')";
                                                if($result = mysqli_query($conn,$sql)){ 
                                                        if (mysqli_num_rows($result)>0){
                                                            $n=1;
                                                            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                                                $fname = $row['user_firstname'];
                                                                $lname = $row['user_lastname'];
                                                                $user_phone = $row['user_phone'];
                                                                $user_email = $row['user_email'];
                                                                $user_gender = $row['user_gender'];
                                                                $user_status = $row['user_status'];
                                                                $user_code = $row['user_code'];
                                                                $user_state = $row['user_state'];
                                                                $user_lga = $row['user_lga'];
                                                                $user_street = $row['user_street'];
                                                                $user_bday = $row['user_bday'];
                                                                $chesslevel = $row['user_chesslevel'];
                                                                $age = $row['user_age'];
                                                                $fideno=$row['fide_number'];
                                                                $fidetitle=$row['fide_title'];
                                                                $regdate=$row['reg_date'];
                                                                echo'
                                                                <tr>
                                                                    <td>'.$n.'</td>
                                                                    <td>'.$fname.' '.$lname.'</td>
                                                                    <td>'.$user_code.'</td>
                                                                    <td>'.$user_status.'</td>
                                                                    <td>'.$fideno." \n ".$fidetitle.'</td>
                                                                    <td>'.$regdate.'</td>
                                                                    <td>'.$user_phone.'</td>
                                                                    <td>'.$user_email.'</td>
                                                                    <td>'.$user_gender.'</td>
                                                                    <td>'.$user_state."\n".$user_lga."\n".$user_street.'</td>
                                                                    <td>'.$user_bday.'</td>
                                                                    <td>'.$chesslevel.'</td>  
                                                                    <td>'.$age.'</td>               
                                                                </tr>';
                                                                $n++;    
                                                            }
                                                        }else{
                                                            echo "<tr><td> No data found</td></tr>";
                                                        } 
                                                }else 
                                                    { 
                                                    
                                                        echo "ERROR: Could not able to execute $sql. ".mysqli_error($conn); 
                                                } 

                                            }else{

                                                $condition = array();
                                                if(!empty($status)){
                                                    $condition[] =" user_status='$status'";
                                                }else{
                                                    $condition[] = ' user_status <> " " ';
                                                }
                                                if(!empty($gender)){
                                                    $condition[] =" user_gender='$gender'";
                                                }else{
                                                    $condition[] = ' user_gender <> " " ';
                                                }
                                                if(!empty($type)){
                                                    $condition[] = " user_type='$type'";
                                                }else{
                                                    $condition[] = ' user_type <> " " ';
                                                }
                                                if(!empty($level)){
                                                    $condition[] = " user_chesslevel='$level'";
                                                }else{
                                                    $condition[] = ' user_chesslevel <> " " ';
                                                }

                                                $sql= " SELECT * FROM users WHERE  ".implode('AND',$condition)."  AND (user_id IS NOT NULL)";
                                                if($result = mysqli_query($conn,$sql)){ 
                                                        if (mysqli_num_rows($result)>0){
                                                            $n=1;
                                                            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                                                $fname = $row['user_firstname'];
                                                                $lname = $row['user_lastname'];
                                                                $user_phone = $row['user_phone'];
                                                                $user_email = $row['user_email'];
                                                                $user_gender = $row['user_gender'];
                                                                $user_status = $row['user_status'];
                                                                $user_code = $row['user_code'];
                                                                $user_state = $row['user_state'];
                                                                $user_lga = $row['user_lga'];
                                                                $user_street = $row['user_street'];
                                                                $user_bday = $row['user_bday'];
                                                                $chesslevel = $row['user_chesslevel'];
                                                                $age = $row['user_age'];
                                                                $fideno=$row['fide_number'];
                                                                $fidetitle=$row['fide_title'];
                                                                $regdate=$row['reg_date'];
                                                            echo'
                                                                <tr>
                                                                <td>'.$n.'</td>
                                                                <td>'.$fname.' '.$lname.'</td>
                                                                <td>'.$user_code.'</td>
                                                                <td>'.$user_status.'</td>
                                                                <td>'.$fideno."\n".$fidetitle.'</td>
                                                                <td>'.$regdate.'</td>
                                                                <td>'.$user_phone.'</td>
                                                                <td>'.$user_email.'</td>
                                                                <td>'.$user_gender.'</td>
                                                                <td>'.$user_state."\n".$user_lga."\n".$user_street.'</td>
                                                                <td>'.$user_bday.'</td>
                                                                <td>'.$chesslevel.'</td>  
                                                                <td>'.$age.'</td>            
                                                                </tr>';
                                                                $n++;    
                                                            }
                                                        }else{
                                                            echo "<tr><td> No data found</td></tr>";
                                                        } 
                                                }else 
                                                    { 
                                                    
                                                        echo "ERROR: Could not able to execute $sql. ".mysqli_error($conn); 
                                                } 
                                            }

                                        }
               
                                ?>                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>


