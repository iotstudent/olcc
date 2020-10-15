<?php
    $servername="localhost";
    $username="root";
    $password="Nwanozie!97";
    $database="chess";

    $conn = mysqli_connect($servername,$username,$password,$database);

    if(!$conn){
        die(" connection failed:" . mysqli_connect_error());
    }
?>