<?php session_start();
if(!isset($_SESSION['adminlogged'])){
    header("Location:login.php");
}
$id = $_SESSION['adminlogged'];
?>

<?php include "../includes/head.php";?>
<?php include "../includes/count.php";?>
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
                                <li class="topnav--link"><i class="fa fa-user-circle mr-2 text-comp"></i><span class="text-comp"><?php echo $_SESSION['username'];?></span></li>
                            </ul>
                        </div>
                    </header>

    
                     
                    <!-- dashboard area -->
                    
                    <div class="row mt-3">
                        <!-- top kpis -->
                        <div class="col-md-4 mb-2">
                            <div class="card  kpi">
                                <div class="card-body">
                                  <h5 class="card-title text-comp">Members</h5>
                                  <span><?php countMembers();?></span>
                                  <i class="fa fa-users kpi--icons"></i>
                                </div>
                              </div>
                        </div>

                        <div class="col-md-4 mb-2">
                            <div class="card  kpi">
                                <div class="card-body">
                                    <h5 class="card-title text-comp">Vacancies</h5>
                                    <span class="card-text"><?php countVacancy();?></span>
                                    <i class="fa fa-wrench kpi--icons"></i>
                                </div>
                              </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="card  kpi">
                                <div class="card-body">
                                    <h5 class="card-title text-comp">Message</h5>
                                    <span class="card-text"><?php countMessages();?></span>
                                    <i class="fa fa-envelope kpi--icons"></i>
                                </div>
                              </div>
                        </div>
                    </div>

                    <!-- second level kpis -->
                    <div class="row mt-2">
                        <!-- table -->
                        <div class="col-md-12 mb-2 ">
                            <div class="card">
                                <div class="card-header bg-dark">
                                    <h4 class="text-white">Vacancy  <i class="fa fa-wrench kpi--icons"></i></h4>
                                   
                                  </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-stripped">
                                            <thead>
                                                <th>S/n</th>
                                                <th>Job Title</th>
                                                <th>Job Description</th>
                                                <th>Deadline</th>
        
                                            </thead>
                                            <tbody>
                                            
             <?php
                
                $sql= " SELECT * FROM jobs ";
                if($result = mysqli_query($conn,$sql)){ 
                        if (mysqli_num_rows($result)>0){
                            $n=1;
                            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                $job_id= $row['job_id'];
                                $job_title = $row['job_title'];
                                $job_dsc = $row['job_dsc'];
                                $deadline = $row['deadline'];
                                ?>
                                
                                <tr>
                                    <td><?php echo $n;?></td>
                                    <td><?php echo  $job_title;?></td>
                                    <td><?php echo  $job_dsc;?></td>
                                    <td><?php echo  $deadline;?></td>         
                                </tr>
                                
                            <?php  
                            $n++;    
                        }
                        }   
                    }else { 
                        echo "ERROR: Could not able to execute $sql. ".mysqli_error($conn); 
                    } 

            
                  ?>
                             
                                                </tr>
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