<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "register_user";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // เริ่ม Session
    session_start();
?>
