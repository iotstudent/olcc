<?php session_start();
if(!isset($_SESSION['adminlogged'])){
    header("Location:login.php");
}
?>
<?php include "../includes/head.php";?>
<?php include "../includes/alerts.php";?>
<title> Admin| Dashboard </title>
</head>
<body>
    <section>
        <div class="container-fluid">
               <!-- mobile nav -->
               <?php include "../includes/adminmobile.php";?>
           
            <div class="row area">
                <!-- side nav -->
                <?php include "../includes/adminside.php";?>

                <!-- top navigation/header -->
                <div class="col-md-10">
                    <div class="row">
                        <?php error_alert();?>
                    </div>
                <div class="row">
                        <div class="col-md-12">
                            <h4 class="text-center">Filter Area</h4>
                            <form action="processreport.php" method="post">

                                <div class="formgroup">
                                <label for="">Gender</label>
                                    <select name="gender" id="" class="form-control">
                                        <option value="">All</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                <div class="formgroup">
                                <label for="">Status</label>
                                    <select name="status" id="" class="form-control">
                                        <option value="">All</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                                <br>
                                <div class="formgroup">
                                <label for="">Type</label>
                                    <select name="type" id="" class="form-control">
                                        <option value="">All</option>
                                        <option value="junior">Junior</option>
                                        <option value="senior">Senior</option>
                                        <option value="titled">Titled</option>
                                        <option value="management">Management</option>
                                    </select>
                                </div>
                                <br>
                                <div class="formgroup">
                                <label for="">Chesslevel</label>
                                    <select name="level" id="" class="form-control">
                                        <option value="">All</option>
                                        <option value="beginner">Beginner</option>
                                        <option value="novice">Novice</option>
                                        <option value="intermediate">Intermediate</option>
                                        <option value="master">Master</option>
                                        <option value="expert">Expert</option>
                                    </select>
                                </div>
                                <br>
                                
                                <div class="row">
                                    <div class="col">
                                        <label for="">Registered from this date</label>
                                        <input type="date" name="date">
                                    </div>
                                    <div class="col">
                                        <label for=""> To this date</label>
                                        <input type="date" name="udate">
                                    </div>
                                </div>
                                <br>
                                <input type="submit" name="report" value="Process" class="btn btn-primary btn-block">
                            </form>
                        </div>
                    </div>
                    <hr class="bg-brand">     
                </div>
            </div>
        </div>
    </section>

    <?php include "../includes/footer.php";?>