<?php session_start();
if(!isset($_SESSION['logged'])){
    header("Location:../member/login.php");
}
if($_SESSION['type'] == "management"){
    header("Location:../member/index.php");
}
$id = $_SESSION['logged'];
?>
<?php include "../includes/head.php";?>
<body class="bg-brand">
<div class="container-fluid">
        <h1 class="text-center text-white">Membership Dues</h1>
    </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3 bg-light" style="border-radius:5%;padding:5%;">
                <form id="paymentForm">
                        <div class="form-group">
                            <p>Full Name</p>
                            <input type="text" name="uname" id="uname" class="form-control"
                            value="<?php if(isset($_SESSION['username'])){ echo $_SESSION['username'];} ?>"
                            disabled readonly>
                        </div>
                        <div class="form-group">
                            <p>Email</p>
                            <input type="email" name="email" id="email" class="form-control"
                            value="<?php if(isset($_SESSION['email'])){ echo $_SESSION['email'];} ?>"
                            disabled readonly>
                        </div>
                      
                                <p>Duration</p> 
                                <div class="form-group">
                                    <select name="type" class="form-control" id="type" onChange="switch_form()">
                                        <option value="" selected>Duration</option>
                                        <option value="annual">Annual</option>
                                        <option value="half">Half-year</option>
                                        <option value="quater">Quater</option>
                                    </select>
                                </div>
                            <div class="form-group">
                            <input type="text" name="amount" id="amount" disabled>
                            </div>
                            
                        <div class="form-group">
                            <img src="../img/paystack.png" style="max-width:90%;">
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <button type="submit" onclick=" payWithPaystack() " class="btn btn-primary btn-block">
                                    Pay Now
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php

        if($_SESSION['type'] =="senior"){
            echo '<script src="../js/formswitch.js"></script>';
        }else{
            echo '<script src="../js/formswitch1.js"></script>';
        }
        
        ?>
    
    </body>
    <script src="https://js.paystack.co/v1/inline.js"></script> 
    <script src="../js/pay.js"></script> 
</html>