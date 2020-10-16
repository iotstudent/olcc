<?php session_start();
if(!isset($_SESSION['adminlogged'])){
    header("Location:login.php");
}
$id = $_SESSION['adminlogged'];
?>
<?php 
include"../includes/head.php";
include"../includes/alerts.php";
include"../includes/dbconnection.php"
?>
<title> Admin| Dashboard </title>
</head>
<body>
    <section>
        <div class="container-fluid">
               <!-- mobile nav -->
               <?php include"../includes/adminmobile.php";?>
            <div class="row area">
                <!-- side nav -->
                <?php include"../includes/adminside.php";?>
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
                        <!-- table -->
                        <div class="col-md-12 mb-2 ">
                            <div class="card">
                                <div class="card-header bg-dark">
                                    <h4 class="text-white">Published<i class="fa fa-send kpi--icons kpi--icons-light"></i></h4>
                                   
                                  </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-stripped">
                                            <thead>
                                                <th>S/n</th>
                                                <th>Title</th>
                                                <th>Body</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                                <th></th>
                                            </thead>
                                            <tbody>

            <?php
                
                $sql= " SELECT * FROM message WHERE  message_status ='draft'";
                if($result = mysqli_query($conn,$sql)){ 
                        if (mysqli_num_rows($result)>0){
                            $n=1;
                            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                $msg_id = $row['message_id'];
                                $msg_title = $row['message_title'];
                                $msg_status = $row['message_status'];
                                $msg_date = $row['message_date'];
                                $msg_body = $row['message_body'];
                            
                                ?>
                                
                                <tr>
                                    <td><?php echo $n;?></td>
                                    <td><?php echo $msg_title;?></td>
                                    <td><?php echo $msg_body;?></td>
                                    <td><?php echo $msg_status;?></td>
                                    <td><?php echo $msg_date;?></td>
                                    <td>
                                        <form action="../process/processmessage.php" method='post' style="display: inline;">
                                            <input type='hidden'  name='msgid' value="<?php echo $msg_id; ?>" />
                                            <input type='submit' name='pubmsg' class="btn  btn-success " value="Publish" />
                                        </form>
                                    </td>
                                    <td>
                                        <form action="../process/processmessage.php" method='post' style="display: inline;">
                                            <input type='hidden'  name='msgid' value="<?php echo $msg_id; ?>" />
                                            <input type='submit' name='deletemsg' class="btn  btn-danger " value="Delete" />
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
</body>
</html>