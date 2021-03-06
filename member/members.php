<?php session_start();
if(!isset($_SESSION['logged'])){
    header("Location:../member/login.php");
}
?>
<?php include "../includes/head.php";?>
<?php include "../includes/dbconnection.php";?>
<title>  Dashboard </title>
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
                        <div class="col-md-6"></div>
                    </header>

                    <!-- search form -->
                    <div class="row mt-4 mb-1">
                      <div class="col-md-12">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
                          <div class="row">
                            <div class="col-10">
                              <input type="text" name="query" class="form-control" placeholder=" Search for member with username or first name or lastname">
                            </div>
                            <div class="col-2">
                              <input type="submit" name="search" value="Search" class="btn btn-primary">
                            </div>
                          </div>
                        </form>
                      </div>
                  </div>

                    <!-- table -->
                    <div class="row mt-2">
                        <div class="col-md-12 mb-2 ">
                            <div class="card">
                                <div class="card-header bg-dark">
                                    <h4 class="text-white">Members  <i class="fa fa-users kpi--icons kpi--icons-light"></i></h4>
                                   
                                  </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-stripped">
                                            <thead>
                                                <th></th>
                                                <th>Name</th>
                                                <th>code</th>
                                                <th>Type</th>
                                                <th>Gender</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                            </thead>
                                            <tbody>
                                            <?php
                                            
                                            
                                            if(isset($_GET['search'])){
                                                $query= $_GET['query'];
                                                $sql= " SELECT * FROM users WHERE user_firstname LIKE '%$query%' OR user_lastname LIKE '%$query%' OR username LIKE '%$query%'";
                                                if($result = mysqli_query($conn,$sql)){ 
                                                        if (mysqli_num_rows($result)>0){
                                                            $n=1;
                                                            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                                                $user_id= $row['user_id'];
                                                                $user_firstname = $row['user_firstname'];
                                                                $user_lastname = $row['user_lastname'];
                                                                $user_code = $row['user_code'];
                                                                $user_type = $row['user_type'];
                                                                $user_email = $row['user_email'];
                                                                $user_gender = $row['user_gender'];
                                                                $user_phone = $row['user_phone'];
                                                            
                                                                ?>
                                                                
                                                                <tr>
                                                                    <td><?php echo $n;?></td>
                                                                    <td><?php echo  $user_firstname." ".$user_lastname;?></td>
                                                                    <td><?php echo  $user_code;?></td>
                                                                    <td><?php echo  $user_type;?></td>
                                                                    <td><?php echo  $user_gender;?></td>
                                                                    <td><?php echo  $user_phone;?></td>
                                                                    <td><?php echo  $user_email;?></td>
                                                                  
                                                                </tr>
                                                                
                                                                <?php  
                                                                $n++;    
                                                            }
                                                        }else{echo "<tr><td> No data found</td></tr>";} 
                                                }else 
                                                    { 
                                                    
                                                        echo "ERROR: Could not able to execute $sql. ".mysqli_error($conn); 
                                                } 
                                
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