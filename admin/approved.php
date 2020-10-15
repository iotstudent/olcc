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

    
                     

                    <!-- second level kpis -->
                    <div class="row mt-3">
                        <!-- table -->
                        <div class="col-md-12 mb-2 ">
                            <div class="card">
                                <div class="card-header bg-dark">
                                    <h4 class="text-white"> Approved Orders<small> (These are orders that have been confirmed but not yet delivered)</small><i class="fa fa-check kpi--icons  kpi--icons-light"></i></h4>
                                   
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
                                                        <button class="btn btn-success">Delivered</button>
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