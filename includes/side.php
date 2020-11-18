<div class="col-md-2 bg-white sidenav ">
<div class="row mt-2 " style="margin-right:-10px !important;">
       <div class="col-md-10 offset-md-1">
            <img src="../img/logo.png">
       </div>
    </div>
<div class="row">
    <ul>
        <li class="sidenav--link"><a href="index.php" class="text-black"><i class="fa fa-dashboard mr-2"></i>Dashboard</a></li>
        <li class="sidenav--link"><a href="profile.php" class="text-black"><i class="fa fa-user mr-2"></i>Profile</a></li>
        <li class="sidenav--link"><a href="change.php" class="text-black"><i class="fa fa-lock mr-2"></i>Password</a></li>
        <li class="sidenav--link"><a href="members.php" class="text-black"><i class="fa fa-users mr-2"></i>Members</a></li>
        <li class="sidenav--link"><a href="notification.php" class="text-black"><i class="fa fa-bell mr-2"></i>Notifications</a></li>
        <?php 
                            if($_SESSION['type'] != "management"){
                                echo '
                                <li class="sidenav--link"><a href="dues.php" class="text-black"><i class="fa fa-credit-card mr-2"></i>Subscriptions</a></li>'
                                ;
            }
        ?>
      
        <li class="sidenav--link"><a href="logout.php" class="text-black"><i class="fa fa-power-off mr-2"></i>Log out</a></li>
    </ul>
</div>
</div>