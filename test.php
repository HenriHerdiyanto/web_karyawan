<?php
// Alamat IP yang diizinkan
$allowedIP = '103.152.238.148';

// Mendapatkan alamat IP pengunjung
$clientIP = $_SERVER['REMOTE_ADDR'];

// Variabel status pengecekan
$connectionStatus = ($clientIP === $allowedIP) ? "Terhubung" : "Tidak Terhubung";

// Cek apakah form telah disubmit
if (isset($_POST['cek_koneksi'])) {
  $cekKoneksiStatus = ($clientIP === $allowedIP) ? "Anda sudah terhubung dengan alamat IP yang diizinkan." : "Anda belum terhubung dengan alamat IP yang diizinkan.";
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Sistem Absensi</title>
</head>

<body>
  <h1>Selamat datang di sistem absensi</h1>
  <p>Status Koneksi: <?php echo $connectionStatus; ?></p>

  <?php if ($clientIP === $allowedIP) : ?>
    <p>Silakan lakukan absensi.</p>
  <?php else : ?>
    <p>Anda tidak diizinkan untuk mengakses halaman ini.</p>
  <?php endif; ?>

  <form action="" method="post">
    <input type="submit" name="cek_koneksi" value="Cek Koneksi">
  </form>

  <?php if (isset($cekKoneksiStatus)) : ?>
    <h2>Hasil Pengecekan Koneksi</h2>
    <p><?php echo $cekKoneksiStatus; ?></p>
  <?php endif; ?>
</body>

</html>