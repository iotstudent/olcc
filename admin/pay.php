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
                                                                          
if(isset($_GET['pay'])){
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
                                
                                    <form action="../process/processadminpay.php" action="get">
                                            <div>
                                                <?php error_alert();?>
                                            </div>
                                            <input type="hidden" name="userid"  value=<?php echo $user_id;?>>
                                        <div class="row">
                                                <div class="col">
                                                    <input type="text"  class="form-control" value="<?php echo $user_firstname;?>">
                                                </div>
                                                <div class="col">
                                                    <input type="text" class="form-control" value="<?php echo $user_lastname;?>">
                                                </div>
                                        </div>
                                        <br>
                                        <div class="form-group">   
                                            <label for="">Duration</label>
                                            <select name="type"  class="form-control" >
                                                <option value="quater">Quater</option>
                                                <option value="Half">Half</option>
                                                <option value="annual">Year</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Amount</label>
                                            <input type="number" name="amount" class="form-control" placeholder="Amount">
                                        </div>
                                        <br>
                                        <input type="submit" name="pay" value="Pay" class="btn btn-primary">
                                    </form>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </section>

    <?php include "../includes/footer.php";?>