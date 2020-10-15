<?php session_start();
if(!isset($_SESSION['logged'])){
    header("Location:login.php");
}
?>
<?php include "../includes/alerts.php";?>
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
                        <div class="flash"><?php error_alert();success_alert();?></div>
                            <ul class="inline topnav--content">
                                <li class="topnav--link"><i class="fa fa-user mr-2 text-comp"></i><span class="text-comp">Admin</span></li>
                            </ul>
                        </div>
                    </header>

    
                     
                    <!-- dashboard area -->
                    
                    <div class="row mt-3">
                        <div class="col-md-9 mb-1">
                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModal">Create Vacancy</button>
                        </div>
                    </div>

                    <!-- second level kpis -->
                    <div class="row mt-3">
                        <!-- table -->
                        <div class="col-md-12 mb-2 ">
                            <div class="card">
                                <div class="card-header bg-dark">
                                    <h4 class="text-white">Vacancy <i class="fa fa-wrench kpi--icons kpi--icons-light "></i></h4>
                                   
                                  </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-stripped">
                                            <thead>
                                                <th>S/n</th>
                                                <th>Job Title</th>
                                                <th>Deadline</th>
                                                <th></th>
                                                <th></th>
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
                                    <td>
                                        <form action="applied.php" method='post' style="display: inline;">
                                            <input type='hidden'  name='jobid' value="<?php echo $job_id; ?>" />
                                            <input type='submit' name='applied' class="btn  btn-primary " value="View" />
                                        </form>
                                        <form action="../process/processvacancy.php" method='post' style="display: inline;">
                                            <input type='hidden'  name='jobid' value="<?php echo $job_id; ?>" />
                                            <input type='submit' name='deletejob' class="btn  btn-danger " value="Delete" />
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
          <h5 class="modal-title" id="exampleModalLabel">Create Vacancy</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="../process/processvacancy.php" method="post">
              <div class="form-group">
                  <input type="text" name="jobtitle" class="form-control" placeholder="Job Title">
              </div>
              <div class="form-group">
              <label for="">Deadline</label>
                <input type="date" name="deadline" class="form-control" placeholder="Deadline">
            </div>
              <div class="form-group">
                 
                    <textarea name="jobdsc" cols="30" rows="10" class="form-control">job Description</textarea>
              </div>
        </div>
        <div class="modal-footer">
            <div class="row">
                <div class="col">
                    <input type="submit" name="create" value="Create" class="btn btn-success"/>
                </div>
            </div>
        </div>
    </form>
      </div>
    </div>
  </div>

    
</body>
</html>