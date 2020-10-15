<?php session_start();
if(!isset($_SESSION['logged'])){
    header("Location:../member/login.php");
}
?>
<?php include "../includes/head.php";?>
<title> Profile | Dashboard </title>
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
                        <div class="col-md-12">
                            <ul class="inline topnav--content">
                                <li class="topnav--link"><i class="fa fa-user mr-2 text-comp"></i><span class="text-comp">Admin</span></li>
                            </ul>
                        </div>
                    </header>

    
                
                    <!-- profile -->
                    <div class="row mt-4">
                        <div class="col-md-12 mb-2 ">
                            <div class="card">
                                <div class="card-header bg-dark">
                                    <h4 class="text-white"> Profile <i class="fa fa-user kpi--icons kpi--icons-light"></i></h4>
                                </div>
                                <div class="card-body">
                                        <form action="../process/processprofile.php" method="post">
                                            <div class="row">
                                                <div class="col-md-4 offset-md-4">
                                                    <img src="../img/avatar.svg" class="img-fluid rounded" style="max-width:30%;margin:5px auto 10px 100px;">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <input type="text" name="fname" class="form-control" placeholder="First Name"
                                                    value="<?php if(isset($_SESSION['fname'])){ echo $_SESSION['fname'];} ?>">
                                                </div>
                                                <div class="col">
                                                    <input type="text" name="lname" class="form-control" placeholder="Last Name"
                                                    value="<?php if(isset($_SESSION['lname'])){ echo $_SESSION['lname'];} ?>">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <input type="text" name="uname" class="form-control" placeholder="User Name"
                                                value="<?php if(isset($_SESSION['username'])){ echo $_SESSION['username'];} ?>">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="code" class="form-control" placeholder="Membership code" disabled
                                                value="<?php if(isset($_SESSION['code'])){ echo $_SESSION['code'];} ?>">
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <input type="text" name="phone" class="form-control" placeholder="Phone Number"
                                                    value="<?php if(isset($_SESSION['phone'])){ echo $_SESSION['phone'];} ?>">
                                                </div>
                                                <div class="col">
                                                    <input type="email" name="email" class="form-control" placeholder="Email"
                                                    value="<?php if(isset($_SESSION['email'])){ echo $_SESSION['email'];} ?>">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col">
                                                  
                                                    <select name="state"  class="form-control"> 
                                                    <option value="<?php if(isset($_SESSION['state'])){ echo $_SESSION['state'];} ?>">
                                                    <?php echo $_SESSION['state']; ?></option>
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
                                                <div class="col">
                                                    <input type="text" name="lga" class="form-control" placeholder="LGA"
                                                    value="<?php if(isset($_SESSION['lga'])){ echo $_SESSION['lga'];} ?>">
                                                </div>
                                                <div class="col">
                                                    <input type="text" name="street" class="form-control" placeholder="Street address"
                                                    value="<?php if(isset($_SESSION['street'])){ echo $_SESSION['street'];} ?>">
                                                </div>
                                            </div>
                                            <br/>
                                            <br>
                                            <div class="row">
                                                <div class="col">
                                                    <input type="text" nameber="type" class="form-control" placeholder="Member type" disabled
                                                    value="<?php if(isset($_SESSION['type'])){ echo $_SESSION['type'];} ?>">
                                                </div>
                                                <div class="col">
                                                    <select name="gender" id="" class="form-control">
                                                    <option value="<?php if(isset($_SESSION['gender'])){ echo $_SESSION['gender'];} ?>">
                                                    <?php echo $_SESSION['gender']; ?></option>
                                                        <option value="male" >Male</option>
                                                        <option value="female">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col">
                                                <select name="age" id="" class="form-control">
                                                <option value="<?php if(isset($_SESSION['age'])){ echo $_SESSION['gender'];} ?>">
                                                    <?php echo $_SESSION['age']; ?></option>
                                                        <option value="3-10" >3-10</option>
                                                        <option value="10-21">10-21</option>
                                                        <option value="21-60" >21-60</option>
                                                    </select>
                                                </div>
                                                <div class="col">
                                                <input type="date" name="bday" id="" class="form-control"
                                                value="<?php if(isset($_SESSION['bday'])){ echo $_SESSION['bday'];} ?>">

                                                </div>
                                                <div class="col">
                                                    <select name="chesslevel" id="" class="form-control">
                                                    <option value="<?php if(isset($_SESSION['chesslevel'])){ echo $_SESSION['gender'];} ?>">
                                                    <?php echo $_SESSION['chesslevel']; ?></option>
                                                        <option value="novie" >Novice</option>
                                                        <option value="beginner">Beginner</option>
                                                        <option value="intermediate" >Intermediate</option>
                                                        <option value="master" >Master</option>
                                                        <option value="expert">Expert</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <br>
                                            <input type="submit" value="Save" class="btn btn-primary" style="float: right;">
                                        </form>
                                </div>
                              </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>

    
</body>
</html>