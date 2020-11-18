<?php session_start();
if(!isset($_SESSION['logged'])){
    header("Location:../member/login.php");
}
?>
<?php include "../includes/dbconnection.php";?>
<?php include "../includes/alerts.php";?>
<?php include "../includes/head.php";
include"../includes/count.php";
?>
<title> Member | Dashboard </title>
</head>
<body>
    <section>
        <div class="container-fluid">
               <!-- mobile nav -->
               <?php include"../includes/mobile.php";?>
            <div class="row area">
                <!-- side nav -->
                <?php include"../includes/side.php";?>
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


                    <div class="row mt-5">
                        <!-- table -->
                        <div class="col-md-12 mb-2 ">
                            <div class="card">
                                <div class="card-header bg-dark">
                                    <h4 class="text-white">Notification<i class="fa fa-bell kpi--icons kpi--icons-light"></i></h4>
                                  </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-stripped">
                                            <thead>
                                                <th></th>
                                                <th>Title</th>
                                                <th>Body</th>
                                                <th>Date</th>
                                                <th></th>
                                                <th></th>
                                            </thead>
                                            <tbody>

            <?php
                
                $sql= " SELECT * FROM message WHERE message_status = 'published'";
                if($result = mysqli_query($conn,$sql)){ 
                        if (mysqli_num_rows($result)>0){
                            $n=1;
                            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                $msg_id = $row['message_id'];
                                $msg_title = $row['message_title'];
                                $msg_date = $row['message_date'];
                                $msg_body = $row['message_body'];
                            
                                ?>
                                
                                <tr>
                                    <td><?php echo $n;?></td>
                                    <td><?php echo $msg_title;?></td>
                                    <td><?php echo $msg_body;?></td>
                                    <td><?php echo $msg_date;?></td>
                                    <td>
                                        <button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $msg_id; ?>"> view</button> 
                                        <!-- Modal -->
                                    <div class="modal fade" id="exampleModal<?php echo $msg_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel<?php echo $msg_id; ?>" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel<?php echo $msg_id; ?>"><?php echo $msg_title;?></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <?php echo $msg_body;?>
                                                </div>
                                                </div>
                                            </div>
                                            </div>    
                                    </td>   
                                    <td>
                                        
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

    

    
</body>
</html>