<?php session_start();
if(!isset($_SESSION['logged'])){
    header("Location:login.php");
}
?>
<?php 
include"../includes/head.php";
include"../includes/alerts.php";
include"../includes/dbconnection.php";
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
                        <div class="flash"><?php error_alert();success_alert();?></div>
                            <ul class="inline topnav--content">
                                <li class="topnav--link"><i class="fa fa-user mr-2 text-comp"></i><span class="text-comp">Admin</span></li>
                            </ul>
                        </div>
                    </header>


            
                    
                    <div class="row mt-3">
                        <div class="col-md-2 mb-1">
                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModal">Create member</button>
                        </div>
                        
                         <!-- search form -->
                        <div class="col-md-10 mb-1">
                          <form action="search.php" method="post">
                            <div class="row">
                              <div class="col-9">
                                <input type="text" name="query" class="form-control" placeholder=" Search for member ">
                              </div>
                              <div class="col-3">
                                <input type="submit" value="Search" name="search" class="btn btn-primary">
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
                                                <th>First name</th>
                                                <th>Last name</th>
                                                <th>Type</th>
                                                <th>Code</th>
                                                <th>Membership status</th>
                                                <th>Phone no</th>
                                                <th>Email</th>
                                                <th>Gender</th>
                                                <th></th>
                                            </thead>
                                            <tbody>

                                            <?php
                
                $sql= " SELECT * FROM users ";
                if($result = mysqli_query($conn,$sql)){ 
                        if (mysqli_num_rows($result)>0){
                            $n=1;
                            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                $user_id= $row['user_id'];
                                $user_firstname = $row['user_firstname'];
                                $user_lastname = $row['user_lastname'];
                                $user_type = $row['user_type'];
                                $user_code = $row['user_code'];
                                $user_phone = $row['user_phone'];
                                $user_email = $row['user_email'];
                                $user_gender = $row['user_gender'];
                                $user_status = $row['user_status'];
                            
                                ?>
                                
                                <tr>
                                    <td><?php echo $n;?></td>
                                    <td><?php echo  $user_firstname;?></td>
                                    <td><?php echo  $user_lastname;?></td>
                                    <td><?php echo  $user_type;?></td>
                                    <td><?php echo  $user_code;?></td>
                                    <td><?php echo  $user_status;?></td>
                                    <td><?php echo  $user_phone;?></td>
                                    <td><?php echo  $user_email;?></td>
                                    <td><?php echo  $user_gender;?></td>
                                    <td>
                                      <form action="upgrade.php" method='post' style="display: inline;">
                                            <input type='hidden'  name='userid' value="<?php echo $user_id; ?>" />
                                            <input type='submit' name='formupgrade' class="btn btn-primary" value="Upgrade"/>
                                      </form>
                                    </td>              
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

    <!-- popup modal for create member -->
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Member</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="../process/processmembers.php" method="post">
              <div class="form-group">
                  <input type="text" name="fname" class="form-control" placeholder="First name">
              </div>
              <div class="form-group">
                <input type="text" name="lname" class="form-control" placeholder="Last name">
              </div>
              <div class="form-group">
                <input type="email" name="email"  class="form-control" placeholder="Email">
              </div>
              <div class="form-group">
                <input type="password" name="password"  class="form-control" placeholder="User Password">
              </div>
          
        </div>
        <div class="modal-footer">
            <div class="form-group">
                <input type="submit" name="create" value="Create" class="btn btn-primary">
            </div>
        </div>
    </form>
      </div>
    </div>
  </div>

    
</body>
</html>