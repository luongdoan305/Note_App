<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "note";
    $con = mysqli_connect($server,$username,$password,$database);
    if(!$con){
        echo "Connection Failed";
    }
?>