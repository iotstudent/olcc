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
                            <ul class="inline topnav--content">
                                <li class="topnav--link"><i class="fa fa-user-circle mr-2 text-comp"></i><span class="text-comp">Admin</span></li>
                            </ul>
                        </div>
                    </header>

    
                     
                    <!-- dashboard area -->
                    
                    <div class="row mt-3">
                        <div class="col-md-4 mb-1">
                            <div class="card  kpi">
                                <div class="card-body">
                                  <h5 class="card-title text-comp">Total Products</h5>
                                  <span>50</span>
                                  <i class="fa fa-gift kpi--icons"></i>
                                </div>
                              </div>
                        </div>

                        <div class="col-md-4 mb-1">
                            <div class="card  kpi">
                                <div class="card-body">
                                    <h5 class="card-title text-comp">Categories</h5>
                                    <span class="card-text">5</span>
                                    <i class="fa fa-list kpi--icons"></i>
                                </div>
                              </div>
                        </div>

                        <div class="col-md-4 mb-1">
                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModal">Add product</button>
                        </div>
                        
                    </div>

                    <!-- second level kpis -->
                    <div class="row mt-3">
                        <!-- table -->
                        <div class="col-md-12 mb-2 ">
                            <div class="card">
                                <div class="card-header bg-dark">
                                    <h4 class="text-white"> Products  <i class="fa fa-gift kpi--icons kpi--icons-light"></i></h4>
                                   
                                  </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-stripped">
                                            <thead>
                                                <th>S/n</th>
                                                <th>Job Title</th>
                                                <th>Deadline</th>
                                                <th></th>
                                                
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Backedn Engineer</td>
                                                    <td>2020-10-1</td>
                                                    <td>
                                                      <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModal2">Edit</button>
                                                      <button class="btn btn-danger">Delete</button>
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

    <!-- popup modal for add product -->
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="">
              <div class="form-group">
                  <input type="file" name="productimage" class="form-control" placeholder="Product image">
              </div>
              <div class="form-group">
                <input type="text" name="productname" class="form-control" placeholder="Product name">
              </div>
              <div class="form-group">
                <select name="category" id="" class="form-control">
                    <option value="survenoir">Chess survenoir</option>
                    <option value="books">Books</option>
                    <option value="clocks">Chess Clocks</option>
                    <option value="chessboard">Chess Board</option>
                    
                </select>
              </div>
              <div class="form-group">
                <input type="number" name="productprice" class="form-control" placeholder="Product price">
              </div>
          
        </div>
        <div class="modal-footer">
            <div class="form-group">
                <input type="submit" value="Create" class="btn btn-primary">
            </div>
        </div>
    </form>
      </div>
    </div>
  </div>



   <!-- popup modal for Edit product -->
    <!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <input type="file" name="productimage" class="form-control" placeholder="Product image">
        </div>
        <div class="form-group">
          <input type="text" name="productname" class="form-control" placeholder="Product name">
        </div>
        <div class="form-group">
          <select name="category" id="" class="form-control">
              <option value="survenoir">Chess survenoir</option>
              <option value="books">Books</option>
              <option value="clocks">Chess Clocks</option>
              <option value="chessboard">Chess Board</option>
          </select>
        </div>
        <div class="form-group">
          <input type="number" name="productprice" class="form-control" placeholder="Product price">
        </div>
        
      </div>
      <div class="modal-footer">
          <div class="form-group">
              <input type="submit" value="Upgrade" class="btn btn-primary">
          </div>
      </div>
  </form>
    </div>
  </div>
</div>

    
</body>
</html>