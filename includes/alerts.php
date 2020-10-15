<?php
function error_alert()
{
    if (isset($_SESSION['error']) && !empty($_SESSION['error'])) {
        echo "<h6 class='text-danger alert alert-danger'>" . $_SESSION['error'] . "</h6>";
        unset($_SESSION['error']);
    
    }
}

function success_alert()
{
    if (isset($_SESSION['message']) && !empty($_SESSION['message'])) {
        echo "<h6 class='text-success alert alert-success'>" . $_SESSION['message'] . "</h6>";
        unset($_SESSION['message']);
        
    }
}
