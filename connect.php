<?php
    $servername = "localhost";
    $username = "root";
    $password = "mysql";
    $database = "123";
    //Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    //Check connect
    if(!$conn){
        die("Connection failed: " .mysqli_connect_error());
    }
?>