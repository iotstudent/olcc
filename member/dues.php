<?php session_start();
if(!isset($_SESSION['logged'])){
    header("Location:../member/login.php");
}
if($_SESSION['type'] == "management"){
    header("Location:../member/index.php");
}
                            
$id=$_SESSION['logged'];
?>
<?php include "../includes/alerts.php";?>
<?php include "../includes/dbconnection.php";?>
<?php include "../includes/head.php";?>
<title> Membership Dues | Dashboard </title>
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

                    <div class="row mt-2">
                        <div class="col-md-12">
                            <a class="btn btn-primary" href="pay.php">Renew membership</a>
                        </div>
                    </div>

    
                     <!-- table -->
                    <div class="row mt-3">
                        <div class="col-md-12 mb-2 ">
                            <div class="card">
                                <div class="card-header bg-dark">
                                    <h4 class="text-white">Transactions <i class="fa fa-credit-card kpi--icons kpi--icons-light"></i></h4>
                                   
                                  </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-stripped">
                                            <thead>
                                                <th></th>
                                                <th>Duration(yearly)</th>
                                                <th>Starts</th>
                                                <th>Ends</th>
                                                <th>Amount</th>
                                                <th>Ref</th>
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
                                $amount = $row['renewal_amount'];
                                $ref = $row['renewal_ref'];
                            
                                ?>
                                
                                <tr>
                                    <td><?php echo $n;?></td>
                                    <td><?php echo $type;?></td>
                                    <td><?php echo $pay_date;?></td>
                                    <td><?php echo $end_date;?></td>
                                    <td><?php echo $amount;?></td>
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