<?php session_start();
if(!isset($_SESSION['adminlogged'])){
    header("Location:login.php");
}
?>
<?php include "../includes/dbconnection.php";?>
<?php include "../includes/head.php";?>
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

    
                     <!-- table -->
                    <div class="row mt-3">
                        <div class="col-md-12 mb-2 ">
                            <div class="card">
                                <div class="card-header bg-dark">
                                    <h4 class="text-white">Dues <i class="fa fa-credit-card kpi--icons kpi--icons-light"></i></h4>
                                  </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-stripped">
                                            <thead>
                                                <th>S/n</th>
                                                <th>First name</th>
                                                <th>Last name</th>
                                                <th>Pay date</th>
                                                <th>End date</th>
                                                <th>Ref</th>
                                            </thead>
                                            <tbody>
                                            <tbody>
        <?php

                date_default_timezone_set('Africa/Lagos');
                $date=date('Y-m-d');

                $sql= " SELECT membership_renewal.renewal_date,membership_renewal.renewal_end,membership_renewal.renewal_ref,users.user_lastname,users.user_firstname FROM membership_renewal JOIN users ON  users.user_id = membership_renewal.user_id WHERE DATEDIFF(renewal_end,'$date')>=1 ";
                if($result = mysqli_query($conn,$sql)){ 
                        if (mysqli_num_rows($result)>0){
                            $n=1;
                            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                $fname=$row['user_firstname'];
                                $lname=$row['user_firstname'];
                                $pay_date = $row['renewal_date'];
                                $end_date = $row['renewal_end'];
                                $ref = $row['renewal_ref'];
                            
                                ?>
                                
                                <tr>
                                    <td><?php echo $n;?></td>
                                    <td><?php echo $fname;?></td>
                                    <td><?php echo $lname;?></td>
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

    <?php include "../includes/footer.php";?>