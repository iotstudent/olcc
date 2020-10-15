<?php session_start();
if(!isset($_SESSION['logged'])){
    header("Location:login.php");
}
?>
<?php include "../includes/head.php";?>
<?php include "../includes/alerts.php";?>
<title> Admin| Dashboard </title>
</head>
<body class="bg-brand">
<div class="container-fluid">
    <div class="row mb-5">
        <div class="col-md-12 bg-brand">
            <h2 class="text-center text-white">Change Password</h2>
        </div>
    </div>

    <div class="row mt-6">
        <div class="col-md-4 offset-md-4">
            <div class="card card-body access">
                <form action="../process/processchange.php" class="access-form" method="post">

                    <div class="row">
                        <div class="col-md-4 offset-md-4 mb-4">
                            <img src="../img/logo.png" alt="" class="img-fluid center">
                        </div>
                        <div class="col-md-8 offset-md-2 mb-1">
                            <div class="flash"><?php error_alert();?></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="password" name="password"  class="form-control" Placeholder="Current Passowrd">
                    </div>
                    <div class="form-group">
                        <input type="password" name="npassword"  class="form-control" Placeholder="Enter New password">
                    </div>
                    <div class="form-group">
                        <input type="password" name="rnpassword"  class="form-control" Placeholder="Re-enter New password">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Change"  class="btn btn-success" style="float:right;">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>


</div>    
</body>
</html>