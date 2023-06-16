<?php
include "controller/koneksi.php";
session_start();
session_destroy();

echo "<script>alert('Anda berhasil logout')</script>";
echo "<script>location = 'login.php'</script>";
