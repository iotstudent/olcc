<?php session_start();
if(!isset($_SESSION['adminlogged'])){
    header("Location:login.php");
}
?>
<?php include "../includes/head.php";?>
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
                        <div class="col-md-12">
                            <h4 class="text-center">Filter Area</h4>
                            <form action="../process/processreport.php" method="post">

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
                                        <option value="">Any</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                                <br>
                                <div class="formgroup">
                                <label for="">Type</label>
                                    <select name="type" id="" class="form-control">
                                        <option value="">Any</option>
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
                                        <option value="">Any</option>
                                        <option value="beginner">Beginner</option>
                                        <option value="novice">Novice</option>
                                        <option value="intermediate">Intermediate</option>
                                        <option value="master">Master</option>
                                        <option value="expert">Expert</option>
                                    </select>
                                </div>
                                <br>
                                <label for="">Registered from this date upwards</label>
                                <div class="row">
                                    <div class="col">
                                    <input type="date" name="date" id="">
                                    </div>
                                </div>
                                <br>
                                <div class="formgroup">
                                <label for="">State</label>
                                    <select name="state" id="" class="form-control">
                                        <option value="">Any</option>
                                        <option value="abia">Abia</option>
                                        <option value="adamawa">Adamawa</option>
                                        <option value="akwa ibom">Akwa Ibom</option>
                                        <option value="bauchi">Bauchi</option>
                                        <option value="bayelsa">Bayelsa</option>
                                        <option value="benue">Benue</option>
                                        <option value="crossriver">Cross River</option>
                                        <option value="delta">Delta</option>
                                        <option value="ebonyi">Ebonyi</option>
                                        <option value="edo">Edo</option>
                                        <option value="ekiti">Ekiti</option>
                                        <option value="enugu">Enugu</option>
                                        <option value="fct">FCT</option>
                                        <option value="gombe">Gombe</option>
                                        <option value="imo">Imo</option>
                                        <option value="jigawa">Jigawa</option>
                                        <option value="kaduna">Kaduna</option>
                                        <option value="kano">Kano</option>
                                        <option value="katsina">Katsina</option>
                                        <option value="kebbi">Kebbi</option>
                                        <option value="kano">Kano</option>
                                        <option value="kogi">Kogi</option>
                                        <option value="kwara">Kwara</option>
                                        <option value="lagos">Lagos</option>
                                        <option value="nassawara">Nassawara</option>
                                        <option value="niger">Niger</option>
                                        <option value="ogun">Ogun</option>
                                        <option value="ondo">ondo</option>
                                        <option value="osun">osun</option>
                                        <option value="oyo">oyo</option>
                                        <option value="plateau">plateau</option> 
                                        <option value="rivers">rivers</option>
                                        <option value="sokoto">sokoto</option>
                                        <option value="taraba">Taraba</option>
                                        <option value="yobe">Yobe</option>
                                        <option value="kano">Zamfara</option>
                                    </select>
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