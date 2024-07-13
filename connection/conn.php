<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = "db_biu";

    $conn = mysqli_connect($servername, $username, $password, "$dbname");
    if (!$conn) {
        die('Could not Connect MySql Server: ' . mysqli_connect_error());
    }
?>