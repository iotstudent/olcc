<?php session_start();
if(!isset($_SESSION['logged'])){
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
               <div class="row">
                <div class="col-md-12" style="padding:0px !important;">
                    <nav class="navbar  navbar-light bg-brand mobilenav">
                        <img src="img/logo.png" alt="" class="rounded img-fluid" style="max-width:20%;">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>
                      
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                          <ul class="navbar-nav mr-auto">
                            <li class="nav-item sidenav--link">
                              <a class="text-white" href="index.html">Home </a>
                            </li>
                            <li class="nav-item sidenav--link">
                              <a class="text-white" href="change.html">Password</a>
                            </li>
                            <li class="nav-item sidenav--link">
                              <a class="text-white " href="#">Members</a>
                            </li>
                            <li class="nav-item sidenav--link">
                                <a class="text-white" href="#">Report</a>
                            </li>
                            <li class="nav-item sidenav--link">
                                <a class="text-white" href="subscription.html">Subscription</a>
                              </li>
                              <li class="nav-item sidenav--link">
                                <a class="text-white" href="#">Vacancy</a>
                              </li>
                              <li class="nav-item sidenav--link">
                                <a class="text-white" href="login.html">Log out</a>
                              </li>
                          </ul>
                        </div>
                    </nav>
                </div>
            </div>
           
            <div class="row area">
                <!-- side nav -->
                <div class="col-md-2 bg-brand sidenav ">
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <img src="img/logo.png" alt="" class="rounded img-fluid">
                        </div>
                    </div>
                    <div class="row">
                        <ul>
                            <li class="sidenav--link"><a href="index.html" class="text-white"><i class="fa fa-dashboard mr-2"></i>Dashboard</a></li>
                            <li class="sidenav--link"><a href="change.html" class="text-white"><i class="fa fa-lock mr-2"></i>Password</a></li>
                            <li class="sidenav--link"><a href="members.html" class="text-white"><i class="fa fa-users mr-2"></i>Members</a></li>
                            <li class="sidenav--link"><a href="" class="text-white"><i class="fa fa-folder mr-2"></i>Report</a></li>
                            <li class="sidenav--link"><a href="message.html" class="text-white"><i class="fa fa-envelope mr-2"></i>Message</a></li>
                            <li class="sidenav--link"><a href="subscription.html" class="text-white"><i class="fa fa-credit-card mr-2"></i>Subscription</a></li>
                            <li class="sidenav--link"><a href="vacancy.html" class="text-white"><i class="fa fa-wrench mr-2"></i>Vacancy</a></li>
                            <li class="sidenav--link"><a href="login.html" class="text-white"><i class="fa fa-power-off mr-2"></i>Log out</a></li>
                        </ul>
                    </div>
                </div>

                <!-- top navigation/header -->
                <div class="col-md-10">
                    <header class="row topnav">
                        <div class="col-md-12">
                            <ul class="inline topnav--content">
                                <li class="topnav--link"><i class="fa fa-user mr-2 text-comp"></i><span class="text-comp">Admin</span></li>
                            </ul>
                        </div>
                    </header>

    
                    <!-- second level kpis -->
                    <div class="row mt-3">
                        <!-- table -->
                        <div class="col-md-12 mb-2 ">
                            <div class="card">
                                <div class="card-header bg-dark">
                                    <h4 class="text-white">Report <i class="fa fa-folder kpi--icons kpi--icons-light"></i></h4>
                                   
                                  </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-stripped">
                                            <thead>
                                                <th>S/n</th>
                                                <th>Report Title</th>
                                                <th>Report date</th>
                                                <th></th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Backedn Engineer</td>
                                                    <td>2020-10-1</td>
                                                    <td>
                                                        <a type="submit" class="btn btn-primary" href="applied.html">View</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
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