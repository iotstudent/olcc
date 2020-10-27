<?php session_start();
if(!isset($_SESSION['logged'])){
    header("Location:../member/login.php");
}
$id=$_SESSION['logged'];
?>
<?php include "../includes/count.php";?>
<?php include "../includes/alerts.php";?>
<?php include "../includes/head.php";?>
<title> Members| Dashboard </title>
</head>
<body>
    <section>
        <div class="container-fluid">
               <!-- mobile nav -->
               <?php include "../includes/mobile.php";?>
           
            <div class="row area">
                <!-- side nav -->
                <?php include "../includes/side.php";?>
                <!-- top navigation/header -->
                <div class="col-md-10">
                    <header class="row topnav">
                        <div class="col-md-6">
                            <span style="text-transform:capitalize"><?php echo $_SESSION['username'];?></span>
                            <span style="margin-left:15px;font-weight:bolder;"> <?php echo $_SESSION['code'];?></span>
                        </div>
                        <div class="col-md-6">
                        <?php success_alert();?>
                            
                        </div>
                    </header>
    
                     
                    <!-- dashboard area -->
                    
                    <div class="row mt-5">
                        <!-- top kpis -->
                        <div class="col-md-4 mb-2">
                        <?php 
                            if($_SESSION['type'] == "management"){
                                echo '
                                
                            <div class="card  kpi">
                                <div class="card-body">
                                  <h5 class="card-title">Members</h5>
                                  <span><?php countMembers();?></span>
                                  <i class="fa fa-users kpi--icons"></i>
                                </div>
                              </div>
                             
                                ';
                            }
                        ?>
                        </div>

                        <div class="col-md-4 mb-2">
                            <div class="card  kpi">
                                <div class="card-body">
                                    <h5 class="card-title">Message</h5>
                                    <span class="card-text"><?php countMessages();?></span>
                                    <i class="fa fa-envelope kpi--icons"></i>
                                </div>
                              </div>
                        </div>

                        <div class="col-md-4 mb-2">
                            <div class="card  kpi">
                                <div class="card-body">
                                    <h5 class="card-title">Membership status</h5>
                                    <?php
                                        if($_SESSION['status']=="active"){
                                            echo " <i class='fa fa-wifi kpi--icons kpi--icons-green'></i>";
                                        }else{
                                            echo "<i class='fa fa-wifi kpi--icons'></i>";
                                        }
                                    ?>
                                </div>
                              </div>
                        </div>

                        
                    </div>

                    <!-- second level kpis -->
                    <div class="row mt-5">
                        <!-- table -->
                        <div class="col-md-12 mb-2 ">
                            <div class="card">
                                <div class="card-header bg-dark">
                                    <h4 class="text-white">Dues<i class="fa fa-credit-card kpi--icons kpi--icons-light"></i></h4>
                                   
                                  </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-stripped">
                                            <thead>
                                                <th></th>
                                                <th>Type</th>
                                                <th>Pay date</th>
                                                <th>End date</th>
                                                <th>Transaction ref</th>
                                            </thead>
                                            <tbody>
                                            <?php
                
                $sql= " SELECT * FROM membership_renewal WHERE user_id ='$id' ";
                if($result = mysqli_query($conn,$sql)){ 
                        if (mysqli_num_rows($result)>0){
                            $n=1;
                            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                $pay_date = $row['renewal_date'];
                                $end_date = $row['renewal_end'];
                                $type = $row['renewal_type'];
                                $ref = $row['renewal_ref'];
                            
                                ?>
                                
                                <tr>
                                    <td><?php echo $n;?></td>
                                    <td><?php echo $type;?></td>
                                    <td><?php echo $pay_date;?></td>
                                    <td><?php echo $end_date;?></td>
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
        </div>
    </section>
</body>
</html>
<?php

//checks if user has any active dues and if he does updates status to active
    date_default_timezone_set('Africa/Lagos');
    $date=date('Y-m-d');
    $sql= " SELECT * FROM membership_renewal WHERE user_id ='$id' AND DATEDIFF(renewal_end,'$date')>=1";
    if($result = mysqli_query($conn,$sql)){ 
            if (mysqli_num_rows($result)>0){
                $sql = " UPDATE users SET user_status = 'active' WHERE user_id = '$id' ";
                $update = mysqli_query($conn,$sql);
                $_SESSION['status'] = 'active';
            }else{
                $sql = " UPDATE users SET user_status = 'inactive' WHERE user_id = '$id' ";
                $update = mysqli_query($conn,$sql);
                $_SESSION['status'] = 'inactive';
            }   
        }else { 
            echo "ERROR: Could not able to execute $sql. ".mysqli_error($conn); 
        } 

?>