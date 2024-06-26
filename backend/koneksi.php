<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database_perpustakaan";


$conn = mysqli_connect($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("connection failed: ".$koneksi->connect_error);
}


?>