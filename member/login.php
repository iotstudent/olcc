<?php session_start();?>
<?php include "../includes/alerts.php";?>
<?php include "../includes/head.php";?>
<title> Chessclub | Login </title>
</head>
<body class="bg-brand">
<div class="container-fluid">
   

    <div class="row mt-5">
        <div class="col-md-4 offset-md-4">
            <div class="card card-body access">
                <form action="../process/memberlogin.php" class="access-form" method="post">
                <div class="row mb-5">
                    <div class="col-md-12">
                        <h2 class="text-center text-brand">Login</h2>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-md-4 offset-md-4 mb-4">
                            <img src="../img/logo.png" alt="" class="img-fluid center">
                        </div>
                        <div class="col-md-10 offset-md-1 mb-1">
                            <div class="flash"><?php error_alert();success_alert();?></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="text" name="data"  class="form-control" Placeholder=" Email or Membership code">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password"  class="form-control" Placeholder="Password">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Login"  class="btn btn-brand" style="float:right;">
                    </div>
                    <br><br>
                    <div class="form-group mt-2">
                        <span class="text-center" ><a href="forgot.php" style="text-decoration:none;">Forgot password</a></span>
                        <span style="float:right;"><a href="signup.php" style="text-decoration:none;">Signup</a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>    
</body>
</html>