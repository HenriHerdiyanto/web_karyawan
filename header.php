<?php
session_start();
if (!isset($_SESSION['user'])) {
  echo ("<script>location.href = 'login.php';</script>");
}
$user = $_SESSION["login"];
$level = $_SESSION["user"];

require_once 'controller/utility.php';

$link = "getStafId&id_user=" . urlencode($user) . "&level=" . urlencode($level);
$data = getRegistran($link);
$nama = $data->data[0]->nama_user;
$level_user = $data->data[0]->level_user;
$id_user = $data->data[0]->id_user;
var_dump($level_user);
if ($level_user > 0) {
  echo ("<script>location.href = 'logout.php';</script>");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Monitoring Project</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light sticky-top" style="background-color: #FFCF09;">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
      </ul>
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="btn btn-danger" href="logout.php">
            <i class="far fa-times-circle"></i> Log Out
          </a>
        </li>
      </ul>

    </nav>
    <!-- /.navbar -->

    <!-- Modal Edit-->
    <div class="modal fade" id="projectedit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Profil</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post">
              <input type="hidden" class="form-control" name="id_karyawan2" value="<?php echo $output1->data[0]->id_karyawan ?>">
              <div class="form-group">
                <label for="exampleInputEmail1">Nama Project</label>
                <input type="text" class="form-control" name="nama_lengkap2" value="<?php echo $output1->data[0]->nama_lengkap ?>">
              </div>
              <div class="form-group">
                <label for="">Jenis Kelamin</label>
                <select class="form-control" name="jenis_kelamin2">
                  <option value="0" <?php if ($output1->data[0]->jenis_kelamin == "0") {
                                      echo "selected";
                                    } ?>>Laki-laki
                  </option>
                  <option value="1" <?php if ($output1->data[0]->jenis_kelamin == "1") {
                                      echo "selected";
                                    } ?>>Perempuan
                  </option>
                </select>
              </div>
              <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" name="email2" value="<?php echo $output1->data[0]->email ?>">
              </div>
              <div class="form-group">
                <label for="">Password</label>
                <input type="Password" class="form-control" name="password2">
                <p class="text-muted">Kosongkan Jika Password Tidak Diubah</p>
              </div>
              <div class="form-group">
                <input type="hidden" class="form-control" name="level2" value="<?php echo $output1->data[0]->level ?>">
              </div>
              <button type="submit" name="save_profil" class="btn btn-primary w-100">Simpan</button>
            </form>
            <?php
            // Edit Profil
            if (isset($_POST['save_profil'])) {
              $id_karyawan2 = $_POST['id_karyawan2'];
              $nama_lengkap2 = $_POST['nama_lengkap2'];
              $jenis_kelamin2 = $_POST['jenis_kelamin2'];
              $email2 = $_POST['email2'];
              $password3 = $_POST['password2'];
              $password4 = sha1($password3);
              $level2 = $_POST['level2'];

              if ($password3 == NULL) {
                $link = "setUpdateStafIdNoPasswd&id_karyawan=" . urlencode($id_karyawan2) . '&nama_lengkap=' . urlencode($nama_lengkap2) . '&jenis_kelamin=' . urlencode($jenis_kelamin2) . '&email=' . urlencode($email2) . '&level=' . urlencode($level2);
                $data = getRegistran($link);
              } else {
                $link = "setUpdateStafId&id_karyawan=" . urlencode($id_karyawan2) . '&nama_lengkap=' . urlencode($nama_lengkap2) . '&jenis_kelamin=' . urlencode($jenis_kelamin2) . '&email=' . urlencode($email2) . '&password=' . urlencode($password4) . '&level=' . urlencode($level2);
                $data = getRegistran($link);
              }
              echo '<script>alert("data berhasil diupdate")</script>';
              echo "<script>location = 'staf.php'</script>";
            }
            ?>
          </div>
        </div>
      </div>
    </div>
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link bg-secondary">
        <img src="assets/img/logomt.png" alt="AdminLTE Logo" class="brand-image">
        <span class="brand-text font-weight-light">HRMS</span>
      </a>
      <!-- Sidebar -->
      <div class="sidebar" style="background-color: #322F8A;">
        <!-- Sidebar user panel (optional) -->
        <a class="d-block" type="button" data-toggle="modal" data-target="#projectedit<?php echo $nama; ?>">
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info" style="color: #FFCF09;">
              <b><?php echo $nama; ?></b>
            </div>
          </div>
        </a>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="index.php" class="nav-link" style="color: #FFCF09;">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="karyawan.php" class="nav-link" style="color: #FFCF09;">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Kordinator
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="divisi.php" class="nav-link" style="color: #FFCF09;">
                <i class="nav-icon fas fa-tasks"></i>
                <p>
                  Divisi
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="perjalanan_dinas.php" class="nav-link" style="color: #FFCF09;">
                <i class="nav-icon fas fa-tasks"></i>
                <p>
                  Perjalanan Dinas
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="peminjaman_karyawan.php" class="nav-link" style="color: #FFCF09;">
                <i class="nav-icon fas fa-tasks"></i>
                <p>
                  Peminjaman Karyawan
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="inventaris.php" class="nav-link" style="color: #FFCF09;">
                <i class="fa fa-suitcase mx-1">
                  <p class="mx-1"> List Inventaris
                  </p>
                </i>
              </a>
            </li>
            <li class="nav-item">
              <a href="service.php" class="nav-link" style="color: #FFCF09;">
                <i class="fa fa-wrench mx-1">
                  <p class="mx-1"> Service Infrastruktur
                  </p>
                </i>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>