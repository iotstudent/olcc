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
<body>
    <section>
        <div class="container-fluid">
            <div class="row"> 
                    <!-- table -->
                        <div class="col-md-12 ">
                            
                                <div class="card card-header bg-brand">
                                    <h4 class="text-white">Report <i class="fa fa-folder kpi--icons kpi--icons-light"></i></h4>
                                  </div>
                                
                                    <div class="table-responsive">
                                        <table class="table table-hover table-stripped">
                                            <thead>
                                                <th></th>
                                                <th>First name</th>
                                                <th>Second name</th>
                                                <th>status</th>
                                                <th>Phone no</th>
                                                <th>Email</th>
                                                <th>Gender</th>
                                                <th>State</th>
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
                                            $type= $_POST['type'];
                                            $level= $_POST['level'];
                                            $state=$_POST['state'];
                                            

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
                                                if(!empty($state)){
                                                    $conditions[] = " user_state='$state'";
                                                }else{
                                                    $conditions[] = ' user_state <> " " ';
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

                                                $sql= " SELECT * FROM users WHERE ". implode(' AND ', $conditions)."AND (reg_date >='$date')";
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
                                                                $user_state = $row['user_state'];
                                                                $user_bday = $row['user_bday'];
                                                                $chesslevel = $row['user_chesslevel'];
                                                                $age = $row['user_age'];
                                                                echo'
                                                                <tr>
                                                                    <td>'.$n.'</td>
                                                                    <td>'.$fname.'</td>
                                                                    <td>'.$lname.'</td>
                                                                    <td>'.$user_status.'</td>
                                                                    <td>'.$user_phone.'</td>
                                                                    <td>'.$user_email.'</td>
                                                                    <td>'.$user_gender.'</td>
                                                                    <td>'.$user_state.'</td>
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
                                                if(!empty($state)){
                                                    $condition[] =" user_state='$state'";
                                                }else{
                                                    $condition[] = ' user_state <> " " ';
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
                                                                $user_state = $row['user_state'];
                                                                $user_bday = $row['user_bday'];
                                                                $chesslevel = $row['user_chesslevel'];
                                                                $age = $row['user_age'];
                                                            echo'
                                                                <tr>
                                                                    <td>'.$n.'</td>
                                                                    <td>'.$fname.'</td>
                                                                    <td>'.$lname.'</td>
                                                                    <td>'.$user_status.'</td>
                                                                    <td>'.$user_phone.'</td>
                                                                    <td>'.$user_email.'</td>
                                                                    <td>'.$user_gender.'</td>
                                                                    <td>'.$user_state.'</td>
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
    </section>    
</body>
</html>


