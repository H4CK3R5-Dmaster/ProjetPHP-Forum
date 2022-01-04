<?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "dataforum";
    $connect = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
    if (!$connect) {
        die("connection failed: ".mysqli_connect_error());
    } else {
        echo "<script>console.log('ok')</script>";
    }
?>