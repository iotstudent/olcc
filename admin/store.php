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
               <?php include "../includes/storemobile.php";?>
           
            <div class="row area">
                <!-- side nav -->
                <?php include "../includes/storeside.php";?>
                <!-- top navigation/header -->
                <div class="col-md-10">
                    <header class="row topnav">
                        <div class="col-md-12">
                            <span style="font-size:25px;">Store management</span>
                            <ul class="inline topnav--content">
                                <li class="topnav--link"><i class="fa fa-user mr-2 text-comp"></i><span class="text-comp">Admin</span></li>
                            </ul>
                        </div>
                    </header>

    
                     
                    <!-- dashboard area -->
                    
                    <div class="row mt-5">
                        <!-- top kpis -->
                        <div class="col-md-4 mb-2">
                            <div class="card  kpi">
                                <div class="card-body">
                                  <h5 class="card-title text-comp">Total sales</h5>
                                  <span>15000</span>
                                  <i class="fa fa-dollar kpi--icons"></i>
                                </div>
                              </div>
                        </div>

                        <div class="col-md-4 mb-2">
                            <div class="card  kpi">
                                <div class="card-body">
                                    <h5 class="card-title text-comp">Pending</h5>
                                    <span class="card-text">10</span>
                                    <i class="fa fa-clock-o kpi--icons"></i>
                                </div>
                              </div>
                        </div>

                        <div class="col-md-4 mb-2">
                            <div class="card  kpi">
                                <div class="card-body">
                                    <h5 class="card-title text-comp">Delivered</h5>
                                    <span class="card-text">100</span>
                                    <i class="fa fa-send kpi--icons"></i>
                                </div>
                              </div>
                        </div>
                    </div>

                    <!-- second level kpis -->
                    <div class="row mt-5">
                        <!-- table -->
                        <div class="col-md-12 mb-2 ">
                            <div class="card">
                                <div class="card-header bg-dark">
                                    <h4 class="text-white"> Pending Orders <i class="fa fa-clock-o kpi--icons kpi--icons-light"></i></h4>
                                   
                                  </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-stripped">
                                            <thead>
                                                <th>S/n</th>
                                                <th>order ref</th>
                                                <th>payment ref</th>
                                                <th>Date</th>
                                                <th></th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>#456chs</td>
                                                    <td>#4534</td>
                                                    <td>2020-10-1 </td>
                                                    <td>
                                                        <button class="btn btn-success">Approve</button>
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