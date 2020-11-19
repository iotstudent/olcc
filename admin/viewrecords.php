<?php session_start();
if(!isset($_SESSION['adminlogged'])){
    header("Location:login.php");
}
?>
<?php 
include"../includes/head.php";
include"../includes/dbconnection.php";
include"../includes/alerts.php";
?>
<?php
                                                                          
if(isset($_GET['view'])){
    $userid= $_GET['userid'];
    $sql= " SELECT * FROM users WHERE user_id = '$userid' ";
    if($result = mysqli_query($conn,$sql)){ 
        if (mysqli_num_rows($result)>0){
            
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $user_id= $row['user_id'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_type = $row['user_type'];
            $user_code = $row['user_code'];   
        }
    }else 
        { 
            echo "ERROR: Could not able to execute $sql. ".mysqli_error($conn); 
    } 
}
                   
?>
<title> Admin| Dashboard </title>
</head>
<body>
    <section>
        <div class="container-fluid">
               <!-- mobile nav -->
               <?php include "../includes/adminmobile.php";?>
           
            <div class="row area">
                <!-- side nav -->
                <?php include "../includes/adminside.php";?>

                <!-- top navigation/header -->
                <div class="col-md-10">
                    <header class="row topnav">
                        <div class="col-md-12">
                            <ul class="inline topnav--content">
                                <li class="topnav--link"><i class="fa fa-user mr-2 text-comp"></i><span class="text-comp">Admin</span></li>
                            </ul>
                        </div>
                    </header>       

                    <div class="row mt-2 mb-2">
                    </div>             

                    <!-- user info -->
                    <div class="row mt-2">
                        <div class="col-md-12 mb-2 ">
                            <div class="card">
                                 <div class="card-header bg-dark">
                                    <div class="row">
                                            <div class="col-md-6">
                                                <h4 class="text-white"><?php echo $user_firstname . ' '.$user_lastname;?></h4>
                                            </div>
                                            <div class="col-md-6">
                                                <i class="fa fa-users kpi--icons kpi--icons-light"><?php echo $user_code;?></i>
                                            </div>
                                    </div>    
                                </div>
                                <div class="card-body">
                                <div class="table-responsive">
                                        <table class="table table-hover table-bordered">
                                            <thead>
                                                <th></th>
                                                <th>First name</th>
                                                <th>OLCC ID</th>
                                                <th>Status</th>
                                                <th>Pay date</th>
                                                <th>End date</th>
                                                <th>Days left</th>
                                                <th>Ref</th>
                                            </thead>
                                            <tbody>
        <?php

                date_default_timezone_set('Africa/Lagos');
                $date=date('Y-m-d');

                $sql= " SELECT membership_renewal.renewal_date,membership_renewal.renewal_end,membership_renewal.renewal_ref,users.user_lastname,users.user_firstname,users.user_code,users.user_status FROM membership_renewal JOIN users ON  users.user_id = membership_renewal.user_id WHERE DATEDIFF(renewal_end,'$date')>=1 AND (membership_renewal.user_id='$userid')";
                if($result = mysqli_query($conn,$sql)){ 
                        if (mysqli_num_rows($result)>0){
                            $n=1;
                            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                $fname=$row['user_firstname'];
                                $lname=$row['user_lastname'];
                                $code=$row['user_code'];
                                $status=$row['user_status'];
                                $pay_date = $row['renewal_date'];
                                $end_date = $row['renewal_end'];
                                $ref = $row['renewal_ref'];
                               //converting pay date and end date to php date format from strings to be able to get diffeerence btw them
                                $origin = date_create($pay_date);
                                $end = date_create($end_date);
                                $diff=date_diff($origin,$end);
                        
                                ?>
                                
                                <tr>
                                    <td><?php echo $n;?></td>
                                    <td><?php echo $fname . " ". $lname;?></td>
                                    <td><?php echo $code;?></td>
                                    <td><?php echo $status;?></td>
                                    <td><?php echo $pay_date;?></td>
                                    <td><?php echo $end_date;?></td>
                                    <td><?php echo $diff->format("%R%a days");?></td>
                                    <td><?php echo $ref;?></td>             
                                </tr>
                                
                            <?php  
                            $n++;    
                        }
                        }   
                    }else { 
                        echo "ERROR: Could not able to execute $sql. ".mysqli_error($conn); 
                    } 

            
            ?>
                                            </tbody>
                                        </table>
                                    </div>    
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </section>

    <?php include "../includes/footer.php";?>