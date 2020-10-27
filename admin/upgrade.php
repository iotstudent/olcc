<?php session_start();
if(!isset($_SESSION['adminlogged'])){
    header("Location:login.php");
}
?>
<?php 
include"../includes/head.php";
include"../includes/dbconnection.php";
?>
<?php
                                                                          
if(isset($_POST['formupgrade'])){
    $userid= $_POST['userid'];
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


            
                    
                    

                    <!-- table -->
                    <div class="row mt-2">
                        <div class="col-md-12 mb-2 ">
                            <div class="card">
                                <div class="card-header bg-dark">
                                    <h4 class="text-white"><?php echo $user_firstname . ' '.$user_lastname;?> <i class="fa fa-users kpi--icons kpi--icons-light"></i></h4>
                                   
                                  </div>
                                <div class="card-body">
                                
                                    <form action="../process/processmembers.php" action="get">
                                    <div class="form-group">
                                            <input type="hidden" name="userid"  value="<?php echo $user_id;?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="fname" class="form-control" value="<?php echo $user_firstname;?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="lname" class="form-control" value="<?php echo $user_lastname;?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="code" class="form-control" value="<?php echo $user_code;?>">
                                        </div>
                                        <div class="form-group">   
                                            <select name="membertype" id="" class="form-control" value="<?php echo $user_type;?>">
                                                <option value="junior">Junior</option>
                                                <option value="senior">Senior</option>
                                                <option value="titled">Titled</option>
                                                <option value="mgt">Management</option>
                                            </select>
                                        </div>
                                        <input type="submit" name="upgrade" value="Upgrade" class="btn btn-primary">
                                    
                                    </form>
                              </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>

   

    <?php include "../includes/footer.php";?>