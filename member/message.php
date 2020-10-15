<?php session_start();
if(!isset($_SESSION['logged'])){
    header("Location:../member/login.php");
}
?>
<?php include "../includes/dbconnection.php";?>
<?php include "../includes/alerts.php";?>
<?php include "../includes/head.php";?>
<title> Member | Message </title>
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
                            <span><?php echo $_SESSION['username'];?></span>
                            <span style="margin-left:15px;"> <?php echo $_SESSION['code'];?></span>
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
                                    <h4 class="text-white">Messages<i class="fa fa-envelope kpi--icons kpi--icons-light"></i></h4>
                                   
                                  </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-stripped">
                                            <thead>
                                                <th></th>
                                                <th>Title</th>
                                                <th>Body</th>
                                                <th>Date</th>
                                            </thead>
                                            <tbody>
                                            <?php
                
                $sql= " SELECT * FROM message WHERE message_status ='published'";
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
          <h5 class="modal-title" id="exampleModalLabel">Create Message</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="">
              <div class="form-group">
                  <input type="text" name="msgtitle" class="form-control" placeholder="Subject">
              </div>
              <div class="form-group">
                    <textarea name="msgbody" cols="30" rows="10" class="form-control"></textarea>
              </div>
        </div>
        <div class="modal-footer">
            <div class="row">
                <div class="col">
                    <button type="submit" name="save" class="btn btn-primary">Save</buton>
                </div>
                <div class="col">
                    <button type="submit" name="publish" class="btn btn-success">publish</button>
                </div>
            </div>
        </div>
    </form>
      </div>
    </div>
  </div>


    
</body>
</html>