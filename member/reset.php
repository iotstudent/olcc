<?php session_start();?>
<?php include "../includes/alerts.php";?>
<?php include "../includes/head.php";?>
<?php
//extract encrypted email from url 
if (isset($_GET['token'])) {
    $token = $_GET['token'];
}
?>

<body class="bg-brand">
  
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-main py-7 py-lg-8 pt-lg-9">
      <div class="container">
        <div class="header-body text-center mb-1">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <h1 class="text-white">Change Password</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary border-0 mb-0">
            <div class="card-body px-lg-5 py-lg-5">
              
              <form role="form" method="post" action="../process/processreset.php" >
              <div class="form-group">
                    <p class="text-center flash"> <?php error_alert(); success_alert();?> </p>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder=" Password" type="password" name="password">
                  </div>
                </div>
               
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Confirm Password" type="password" name="cpassword">
                    <input  type="hidden" name="token" value="<?php echo $token ;?>" >
                  </div>
                </div>
                
                <div class="text-center">
                  <button type="submit" class="btn btn-success my-4">Change</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 

</body>
</html>



