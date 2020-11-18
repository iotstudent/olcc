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


                
                    <!-- table -->
                    <div class="row mt-3">
                        <div class="col-md-12 mb-2 ">
                            <div class="card">
                                <div class="card-header bg-brand">
                                    <h4 class="text-white"> <?php echo $title;?> <i class="fa fa-wrench kpi--icons"></i></h4>
                                   
                                  </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-stripped  table-bordered">
                                            <thead>
                                                <th></th>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>CV</th>
                                                <th></th>
                                            </thead>
                                            <tbody>
                                            <?php
                                                                          
                                                    if(isset($_GET['applied'])){
                                                        $jobid= $_GET['jobid'];
                                                        $sql= " SELECT applicants.applicant_id,applicants.applicant_name,applicants.applicant_email,applicants.applicant_phone,applicants.applicant_cv,jobs.job_title FROM applicants JOIN jobs ON  jobs.job_id = applicants.job_id   WHERE jobs.job_id='$jobid' "; ;
                                                        if($result = mysqli_query($conn,$sql)){ 
                                                            if (mysqli_num_rows($result)>0){
                                                                $n=1;
                                                               while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                                                    $app_id=$row['applicant_id'];
                                                                    $name= $row['applicant_name'];
                                                                    $email = $row['applicant_email'];
                                                                    $phone = $row['applicant_phone'];
                                                                    $cv = $row['applicant_cv'];
                                                                    $title = $row['job_title']; 
                                                                    ?>
                                                                    <tr>
                                                                        <td><?php echo $n;?></td>
                                                                        <td><?php echo $name;?></td>
                                                                        <td><?php echo $phone;?></td>
                                                                        <td><?php echo $email;?></td>
                                                                        <td><a href="<?php echo "../".$cv;?>" target="_blank">CV</a></td>
                                                                        <td>
                                                                            <form action="../process/processvacancy.php" method='get' style="display: inline;">
                                                                                <input type='hidden'  name='jobid' value="<?php echo $jobid; ?>" />
                                                                                <input type='hidden'  name='appid' value="<?php echo $app_id; ?>" />
                                                                                <input type='submit' name='deleteapp' class="btn  btn-danger " value="Delete" />
                                                                            </form>
                                                                        </td>
                                                                    </tr>
                                                                <?php
                                                                $n++; 
                                                                } 
                                                                 
                                                            }
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
    <?php include "../includes/footer.php";?>