<?php
$hostname = "localhost";
$database = "hris";
$username = "root";
$password = "";
$connect = mysqli_connect($hostname, $username, $password, $database);
if (!$connect) {
    die("Koneksi Tidak Berhasil: " . mysqli_connect_error());
}

// <?php
// $hostname = "localhost";
// $database = "n1572571_hris";
// $username = "n1572571_henri";
// $password = "Henriherdiyanto123";
// $connect = mysqli_connect($hostname, $username, $password, $database);
// if (!$connect) {
//     die("Koneksi Tidak Berhasil: " . mysqli_connect_error());
// }