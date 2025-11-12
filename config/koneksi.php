<?php
$servername ="localhost";
$username ="root";
$password ="";
$database ="pwd_2441919037";


$conn = mysqli_connect($servername, $username, $password, $database);

if(!$conn){
    die("Koneksi Gagal:". mysqli_connect_error());
}

echo "Koneksi Berhasil";
mysqli_close($conn);
?>