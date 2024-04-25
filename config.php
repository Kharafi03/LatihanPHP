<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "latihanphp";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }
?>