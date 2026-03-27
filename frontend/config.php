<?php 
    $conn = new mysqli("localhost","root","","casino");

    if($conn->connect_error){
        die("Connection faild: " . $conn->connect_error);
    }

    echo "Połączenie udane";

    session_start();
?>