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
                                                                          
if(isset($_GET['formedit'])){
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
            $user_phone = $row['user_phone'];
            $user_email = $row['user_email'];
            $user_gender = $row['user_gender'];
            $user_status = $row['user_status'];
            $fideno = $row["fide_number"];
            $fidetitle = $row["fide_title"];
            $bday = $row["user_day"];
            $age = $row["user_age"];
            $chesslevel = $row["user_chesslevel"];
            $state = $row["user_state"];
            $street = $row["user_street"];
            $lga = $row["user_lga"];
            $able=$row["user_disabled"];   
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
                                            <div class="col-md-4">
                                                <i class="fa fa-users kpi--icons kpi--icons-light"><?php echo $user_code;?></i>
                                            </div>
                                            <div class="col-md-2">
                                            <?php  
                                            if ($able=="yes"){
                                                ?>
                                                    <form action="../process/processmembers.php" action="get">
                                                    <input type="hidden" name="userid"  value="<?php echo $user_id;?>">
                                                    <input type="submit" name="enable" value="Enable" class="btn btn-success">
                                                    </form>

                                             <?php   
                                            }else{

                                                ?>
                                                    <form action="../process/processmembers.php" action="get">
                                                    <input type="hidden" name="userid"  value="<?php echo $user_id;?>">
                                                    <input type="submit" name="disable" value="Disable" class="btn btn-brand">
                                                    </form>
                                            <?php
                                            }
                                        
                                            ?>
                                                    
                                            </div>
                                    </div>    
                                </div>
                                <div class="card-body">
                                
                                    <form action="../process/processmembers.php" action="get">
                                            <input type="hidden" name="userid"  value="<?php echo $user_id;?>">
                                        <div class="row">
                                                <div class="col">
                                                    <input type="text" name="fname" class="form-control" value="<?php echo $user_firstname;?>">
                                                </div>
                                                <div class="col">
                                                    <input type="text" name="lname" class="form-control" value="<?php echo $user_lastname;?>">
                                                </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col">
                                            <label for="">FIDE Number</label>
                                                <input type="text" name="fideno" class="form-control" value="<?php echo $fideno;?>">
                                            </div>
                                            <div class="col">
                                                    <label for="">FIDE Title</label>
                                                    <select name="fidetitle" class="form-control"> 
                                                        <option value="<?php echo $fidetitle;?>"><?php echo $fidetitle;?></option>
                                                        <option value="candidate master">Candidate Master</option>
                                                        <option value="national master">National Master</option>
                                                        <option value="fide master" >FIDE Master</option>
                                                        <option value="international master" >International Master</option>
                                                        <option value="grand master">Grand Master</option>
                                                    </select>
                                            </div>
                                            <div class="col">
                                            <label for="">Chesslevel</label>
                                            <select name="chesslevel"  class="form-control" >
                                                <option value="<?php echo $chesslevel;?>"><?php echo $chesslevel;?></option>
                                                <option value="novice">Novice</option>
                                                <option value="beginner">Beginner</option>
                                                <option value="intermediate">Intermediate</option>
                                                <option value="master">Master</option>
                                                <option value="expert">Expert</option>
                                            </select>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                        
                                        <div class="col">   
                                            <label for="">Membership Type</label>
                                            <select name="membertype"  class="form-control" >
                                                <option value="<?php echo $user_type;?>"><?php echo $user_type;?></option>
                                                <option value="junior">Junior</option>
                                                <option value="senior">Senior</option>
                                                <option value="titled">Titled</option>
                                            </select>
                                        </div>
                                        <div class="col"> 
                                            <label for="">Membership status</label>  
                                            <select name="status"  class="form-control" >
                                                <option value="<?php echo $user_status;?>"><?php echo $user_status;?></option>
                                                <option value="active">Active</option>
                                                <option value="inactive">Inactive</option>
                                            </select>
                                        </div>
                                        </div>
                                        <br>
                                        <input type="submit" name="edit" value="Edit" class="btn btn-primary">
                                    </form>
                                </div>
                            </div>
                        </div>
                    
                    <!-- Password change area -->
                            <div class="col-md-12 mb-2">
                                <div class="card">
                                    <div class="card-header bg-dark">
                                        <h4 class="text-white">Change user password<i class="fa fa-lock kpi--icons kpi--icons-light"></i></h4>
                                    </div>
                                    <div class="card-body">
                                            <form action="../process/processmembers.php" method="post">
                                                <div>
                                                    <?php success_alert();error_alert();?>
                                                </div>
                                                <input type="hidden" name="userid"  value="<?php echo $user_id;?>">
                                                <div class="form-group">
                                                    <input type="password" name="password" class="form-control" placeholder=" Password">
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" name="cpassword" class="form-control" placeholder=" Confirm Password">
                                                </div>
                                                <input type="submit" name="memberpass" value="Change" class="btn btn-primary">
                                               
                                            </form>
                                    </div>
                                </div>
                            </div>
                

                </div>
            </div>
        </div>
    </section>

   

    <?php include "../includes/footer.php";?>