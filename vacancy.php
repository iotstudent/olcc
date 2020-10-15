<?php session_start();?>
<?php include"includes/dbconnection.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chess Club</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="contact.css">
    <script src="https://kit.fontawesome.com/427654d872.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
</head>

<body>
    <hr style="border-bottom: 10px solid #901;
        width: 100%;
        margin-left: auto;
        margin-right: auto; margin-top: -5px;">
    <div class="navbar-nav ml-auto">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1">

                </div>

                <div class="col-md-3">
                    <img src="./images/logo.png" alt="">
                </div>
                <div class="col-md-5">

                </div>
                <div class="col-md-2">
                    <center>
                        <a href="login.html" class="nav-item nav-link"
                            style="color: #fff; background-color: #901; border-radius: 17px 17px; text-transform: uppercase; width: 180px; text-align: center; margin-top: 20px;">Sign
                            in/Sign up</a>
                    </center>
                </div>
            </div>
        </div>
        <br>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-3">
            <div class="container-fluid">
                <a href="#" class="navbar-brand mr-3"><img src="logo.jpg" alt=""></a>

                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse mx-auto" id="navbarCollapse">
                    <div class="navbar-nav" style="text-transform: uppercase; position: relative; left: 150px;">
                        <a href="index.html" class="nav-item nav-link" style="padding-left: 2em;">Home</a>
                        <a href="about.html" class="nav-item nav-link" style="padding-left: 2em;">About</a>
                        <a href="store.html" class="nav-item nav-link" style="padding-left: 2em;">Store</a>
                        <a href="team.html" class="nav-item nav-link" style="padding-left: 2em;">Team</a>
                        <a href="gallery.html" class="nav-item nav-link" style="padding-left: 2em;">Gallery</a>
                        <a href="hotel.html" class="nav-item nav-link" style="padding-left: 2em;">Orchid Hotels</a>
                        <a href="membership.html" class="nav-item nav-link" style="padding-left: 2em;">Membership
                            Subscription</a>
                        <a href="vacancy.html" class="nav-item nav-link" style="padding-left: 2em;">Vacancy</a>
                        <a href="contact.html" class="nav-item nav-link active" style="padding-left: 2em;">Contact</a>
                    </div>

                </div>
            </div>
        </nav>

        <div class="jumbotron"
            style="background: url(./images/red-black-geometric-3d-background_30227-42.jpg); background-size: cover; margin-top: -20px;">
            <center>
                <h1 style="color: #fff; padding: 10px; font-size: 50px; font-weight: bolder;">GALLERY</h1>
            </center>
        </div>
<div class="container-fluid job-body2">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="recent-cont">
                    <h3>Recently Added</h3>
                </div>
            </div>
        </div>
        <div class="row">
        <?php
                
                $sql= " SELECT * FROM jobs ";
                if($result = mysqli_query($conn,$sql)){ 
                        if (mysqli_num_rows($result)>0){
                        
                            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){  
                                $jobid = $row['job_id'];    
                                $job_title = $row['job_title'];
                                $job_dsc = $row['job_dsc'];
                                $deadline = $row['deadline'];
                                ?>
                                
                                <div class="col-md-8 offset-md-2">
                                    <a class="job-link" href="apply.php?job=<?php echo $jobid;?>">
                                        <div class="jobs">
                                            <h2 style="text-transform:capitalize;"><?php echo $job_title?></h2>
                                            <p> <?php echo $job_dsc?></p>  
                                            <i class="fas fa-clock pr-2"></i><?php echo $deadline?>
                                        </div>
                                    </a>
                                </div>
                                
                            <?php  
                         
                        }
                        }   
                    }else { 
                        echo "ERROR: Could not able to execute $sql. ".mysqli_error($conn); 
                    } 

            
                  ?>
                          
        </div>
    </div>
</div>


        <div class="container-fluid footer bg-dark">
            <div style="border-bottom: 1px solid white; padding: 50px 10px;" class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="contact-us-cont">
                            <h5>CONTACT US</h5>
                            <p>Orchid Hotels, Plot 3 Dreamworld Africana Way, Ikota-Lekki</p>
                            <p>08113936417, 08033106208, 08096602599</p>
                            <p>info@olchessclub.com</p>
                            <ul>
                                <li><a href="#"><i class="social-icons fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="social-icons fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="social-icons fab fa-linkedin-in"></i></a></li>
                                <li><a href="#"><i class="social-icons fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="information-cont">
                            <h5>INFORMATION</h5>
                            <ul>
                                <li><a href="#">Our Leadership Team</a></li>
                                <li><a href="#">Experienced Coaches</a></li>
                                <li><a href="#">Volunteering & Sponsorship</a></li>
                                <li><a href="#">Testimonials</a></li>
                                <li><a href="#">Pricacy Policy</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="quick-link-cont">
                            <h5>QUICK LINKS</h5>
                            <ul>
                                <li><a href="#">About OLCC</a></li>
                                <li><a href="#">OLCC Membership</a></li>
                                <li><a href="#">OLCC Hotel</a></li>
                                <li><a href="#">Our Services</a></li>
                                <li><a href="#">Gallery</a></li>
                                <li><a href="#">Our Value</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="subscribe-cont">
                            <form action="">
                                <input type="text" placeholder="Enter Your email here" id="placehold">
                                <button class="subscribe" style="margin-left: 50px; width: 100%;">Subscribe Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid copyright-cont bg-dark">
            <div class="container">
                <div class="copy-text">
                    © 2020 ORCHID LEKKI CHESS CLUB (OLCC). ALL RIGHT RESERVED.
                </div>
            </div>
        </div>

        <script src="app.js"></script>
</body>

</html>