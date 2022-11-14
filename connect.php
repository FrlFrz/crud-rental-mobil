<?php
    $host       = "localhost";
    $user       = "root";
    $pass       = "";
    $db         = "rental_mobil";
    
    $koneksi    = mysqli_connect($host,$user,$pass,$db);
    if(!$koneksi) {
        die("Tidak bisa terhubung ke database");
    }
    
?>