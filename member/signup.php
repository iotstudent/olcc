<?php session_start();?>
<?php include "../includes/alerts.php";?>
<?php include "../includes/head.php";?>
<title> Chessclub | Signup </title>
</head>
<body class="bg-brand">
<div class="container-fluid">
   

    <div class="row mt-5">
        <div class="col-md-4 offset-md-4">
            <div class="card card-body access">
                <form action="../process/membersignup.php" class="access-form" method="post">
                    <div class="row">
                        <div class="col-md-4 offset-md-4 mb-4">
                            <img src="../img/logo.png" alt="" class="img-fluid center">
                        </div>
                        <div class="col-md-10 offset-md-1 mb-1">
                            <div class="flash"><?php error_alert();success_alert();?></div>
                        </div>
                    </div>
                
                    <div class="form-group">
                        <input type="text" name="fname"  class="form-control" Placeholder="First Name">
                    </div>
                    <div class="form-group">
                        <input type="text" name="lname"  class="form-control" Placeholder="Last Name">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email"  class="form-control" Placeholder=" Email">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password"  class="form-control" Placeholder="Password">
                    </div>
                    <div class="form-group">
                        <input type="password" name="cpassword"  class="form-control" Placeholder="Confirm Password">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Signup"  class="btn btn-brand" style="float:right;">
                    </div>
                    <br><br>
                    <div class="form-group">
                        <p class="text-center"><a href="login.php">Have an account already</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>    
</body>
</html>