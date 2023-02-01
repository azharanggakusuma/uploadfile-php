<?php
$hostname = "localhost";
$database = "db_teman";
$username = "root";
$password = "";
$con = mysqli_connect($hostname, $username, $password, $database);

if(!$con){
    die("Koneksi tidak berhasil: " . mysqli_connect_error());
}
?>