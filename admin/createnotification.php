<?php session_start();
if(!isset($_SESSION['adminlogged'])){
    header("Location:login.php");
}
$id = $_SESSION['adminlogged'];
?>
<?php 
include"../includes/head.php";
include"../includes/alerts.php";
include"../includes/count.php";
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
                   
                
                    <div class="row mt-2">
                        <!-- table -->
                        <div class="col-md-12 mb-2 ">
                            <div class="card">
                                <div class="card-header bg-dark">
                                    <h4 class="text-white">Create Notification<i class="fa fa-bell kpi--icons kpi--icons-light"></i></h4>
                                  </div>
                                <div class="card-body">
                                    <form action="../process/processmessage.php" method='post'>
                                                <div class="form-group">
                                                    <input type="text" name="messagetitle" class="form-control" placeholder="Subject">
                                                </div>
                                                <div class="form-group">
                                                        <textarea name="messagebody" cols="30" rows="10" class="form-control"></textarea>
                                                </div>
                                                <div class="form-group">
                                                        <select name="messagestatus" class="form-control">
                                                            <option value="draft">Draft</option>
                                                            <option value="Published">Publish</option>
                                                        </select>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <input type="submit" name="create" value="Create" class="btn btn-brand" style="float:right">
                                                </div>
                                    
                                    </form>
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
          
      </div>
    </div>
  </div>
  <?php include "../includes/footer.php";?>