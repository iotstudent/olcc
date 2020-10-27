<?php session_start();
if(!isset($_SESSION['logged'])){
    header("Location:../member/login.php");
}
$id=$_SESSION['logged'];
?>
<?php include "../includes/alerts.php";?>
<?php include "../includes/head.php";?>
<title> Members| Dashboard </title>
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
                        <div class="col-md-6"> </div>
                    </header>
                    
                    <div class="row mt-6">
                        <div class="col-md-6 offset-md-3">
                            <div class="card card-body access">
                                <form action="../process/memberchange.php" class="access-form" method="post">
                                <div class="row mb-5">
                                    <div class="col-md-12 ">
                                        <h2 class="text-center text-brand">Change Password</h2>
                                    </div>
                                </div>
                                    <div class="row">
                                        <div class="col-md-4 offset-md-4 mb-4">
                                            <img src="../img/logo.png" alt="" class="img-fluid center">
                                        </div>
                                        <div class="col-md-10 offset-md-1 mb-1">
                                            <div class="flash"><?php error_alert();?></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password"  class="form-control" Placeholder="Passowrd">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="npassword"  class="form-control" Placeholder="Enter New password">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="rnpassword"  class="form-control" Placeholder="Re-enter New password">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Login"  class="btn btn-brand" style="float:right;">
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>

                    
                    
                </div>
            </div>
        </div>
    </section>
</body>
</html>


