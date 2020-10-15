<?php session_start();?>
<?php include "../includes/alerts.php";?>
<?php include "../includes/head.php";?>
<title> Chessclub | Login </title>
</head>
<body class="bg-brand">
<div class="container-fluid">
    <div class="row mb-5">
        <div class="col-md-12 bg-brand">
            <h2 class="text-center text-light">Forgot Password</h2>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-4 offset-md-4">
            <div class="card card-body access">
                <form action="../process/processforgot.php" class="access-form" method="post">
                    <div class="row">
                        <div class="col-md-4 offset-md-4 mb-4">
                            <img src="../img/logo.png" alt="" class="img-fluid center">
                        </div>
                        <div class="col-md-10 offset-md-1 mb-1">
                            <div class="flash"><?php error_alert();success_alert();?></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="email" name="email"  class="form-control" Placeholder=" Email">
                    </div>
                    
                    <div class="form-group">
                        <input type="submit" value="Submit"  class="btn btn-success" style="float:right;">
                    </div>
                   
                </form>
            </div>
        </div>
    </div>


</div>    
</body>
</html>