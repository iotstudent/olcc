<div class="col-md-2 bg-brand sidenav ">
<div class="row">
    <div class="col-md-6 offset-md-3">
        <h6 class="text-white">Orchid Lekki Chess Club</h6>
    </div>
</div>
<div class="row">
    <ul>
        <li class="sidenav--link"><a href="index.php" class="text-white"><i class="fa fa-dashboard mr-2"></i>Dashboard</a></li>
        <li class="sidenav--link"><a href="profile.php" class="text-white"><i class="fa fa-user mr-2"></i>Profile</a></li>
        <li class="sidenav--link"><a href="change.php" class="text-white"><i class="fa fa-lock mr-2"></i>Password</a></li>
        <?php 
                            if($_SESSION['type'] == "management"){
                                echo '
                <li class="sidenav--link"><a href="members.php" class="text-white"><i class="fa fa-users mr-2"></i>Members</a></li>';
            }
        ?>
        <li class="sidenav--link"><a href="message.php" class="text-white"><i class="fa fa-envelope mr-2"></i>Message</a></li>
        <?php 
                            if($_SESSION['type'] != "management"){
                                echo '
                                <li class="sidenav--link"><a href="dues.php" class="text-white"><i class="fa fa-credit-card mr-2"></i>Dues</a></li>'
                                ;
            }
        ?>
      
        <li class="sidenav--link"><a href="logout.php" class="text-white"><i class="fa fa-power-off mr-2"></i>Log out</a></li>
    </ul>
</div>
</div>