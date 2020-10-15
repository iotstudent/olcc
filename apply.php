<?php session_start();?>
<?php include "includes/alerts.php";?>
<?php include "includes/formfunctions.php"?>
<?php
$jobid=$_GET['job'];
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet" />
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.bundle.js"></script>
    <script src="../js/timeout.js"></script>
    <link rel="icon" href="../img/logo.png" type="image/png" sizes="16x16"> 
<title> Chessclub | apply </title>
</head>
<body class="bg-brand">
<div class="container-fluid">
    <div class="row mb-5">
        <div class="col-md-12 bg-brand">
            <h2 class="text-center text-light">apply</h2>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-4 offset-md-4">
            <div class="card card-body access">
                <form action="processapply.php" class="access-form" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4 offset-md-4 mb-4">
                            <img src="img/logo.png" alt="" class="img-fluid center">
                        </div>
                        <div class="col-md-10 offset-md-1 mb-1">
                            <div class="flash"><?php error_alert();success_alert();?></div>
                        </div>
                    </div>
                    <input type="hidden" name="jobid"  value="<?php echo $jobid;?>">
                    <div class="form-group">
                        <input type="text" name="name"  class="form-control" Placeholder=" Name">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email"  class="form-control" Placeholder=" Email">
                    </div>
                    <div class="form-group">
                        <input type="text" name="phone"  class="form-control" Placeholder=" Phone">
                    </div>
                    <div class="form-group">
                    <label>CV</label>
                        <input type="file" name="attachment"  class="form-control" Placeholder=" CV">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Apply" name="apply" class="btn btn-success" style="float:right;">
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>    
</body>
</html>