<div class="row">
                <div class="col-md-12" style="padding:0px !important;">
                    <nav class="navbar  navbar-light bg-brand mobilenav">
                        <img src="../img/logo.png" alt="" class="rounded img-fluid" style="max-width:20%;">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>
                      
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                          <ul class="navbar-nav mr-auto">
                            <li class="nav-item sidenav--link">
                              <a class="text-white" href="index.php">Home </a>
                            </li>
                           
                            <li class="nav-item sidenav--link">
                              <a class="text-white" href="notification.php">Notifiactions</a>
                            </li>
                            
                               <li class="nav-item sidenav--link">
                                  <a class="text-white " href="members.php">Members</a>
                                </li>
                            <?php 
                            if($_SESSION['type'] != "management"){
                                echo '
                                <li class="nav-item sidenav--link">
                                    <a class="text-white" href="dues.php">Subscription</a>
                                  </li>';
                              }
                            ?>
                               <li class="nav-item sidenav--link">
                                <a class="text-white" href="profile.php">Profile</a>
                              </li>
                            <li class="nav-item sidenav--link">
                              <a class="text-white" href="change.php">Password</a>
                            </li>
                              <li class="nav-item sidenav--link">
                                <a class="text-white" href="logout.php">Log out</a>
                              </li>
                          </ul>
                        </div>
                    </nav>
                </div>
            </div>