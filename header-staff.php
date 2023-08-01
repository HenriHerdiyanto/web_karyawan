<?php
session_start();
$user = $_SESSION["login"]; //berisi id_karyawan
var_dump($user);
$level = $_SESSION["user"];

require_once 'controller/utility.php';

// $link = "getStaffLogin&id_karyawan=" . urlencode($user);
// $data_karyawan = getRegistran($link);
// $id_karyawan = $data_karyawan->data[0]->id_karyawan;
// $nama_user = $data_karyawan->data[0]->nama_lengkap;
// $level_user = $data_karyawan->data[0]->level_user;
// $id_divisi = $data_karyawan->data[0]->id_divisi;
// var_dump($data_karyawan);

$link = "getKaryawanById&id_karyawan=" . urlencode($user);
$data_lengkap = getRegistran($link);
$id_karyawan = $data_lengkap->data[0]->id_karyawan;
$nama_user = $data_lengkap->data[0]->nama_lengkap;
$level_user = $data_lengkap->data[0]->level_user;
$id_divisi = $data_lengkap->data[0]->id_divisi;
$nama_divisi = $data_lengkap->data[0]->nama_divisi;
// var_dump($level_user);
if ($level_user != 'staff') {
    echo ("<script>location.href = 'logout.php';</script>");
}

// $link = "getKaryawan&id_user=" . urlencode($id_user);
// $data_kar = getRegistran($link);
// $id_kar1 = $data_kar->data[0]->id_karyawan;
// var_dump($id_kar1);
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

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link bg-secondary">
                <img src="assets/img/logomt.png" alt="AdminLTE Logo" class="brand-image">
                <span class="brand-text font-weight-light">HRMS ( <?php echo $level_user; ?> )</span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar" style="background-color: #322F8A;">
                <!-- <a class="d-block" type="button" data-toggle="modal" data-target="profile-kor.php?id=<?= $id_kar1 ?>">
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info" style="color: #FFCF09;">
                            <b><?php echo $nama; ?></b>
                        </div>
                    </div>
                </a> -->
                <a href="profile-staff.php?id=<?= $data_lengkap->data[0]->id_karyawan ?>">
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img style="width: 50px;" src="foto_karyawan/<?= $data_lengkap->data[0]->foto_karyawan ?>" class="img-circle elevation-2">
                        </div>
                        <div class="info text-center" style="color: #FFCF09;">
                            <b><?php echo $nama_user; ?> </b>
                        </div>
                    </div>
                </a>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="dashboard-staff.php" class="nav-link" style="color: #FFCF09;">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="absen-staff.php" class="nav-link" style="color: #FFCF09;">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Absen saya
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="cuti_staff.php" class="nav-link" style="color: #FFCF09;">
                                <i class="nav-icon fas fa-chart-bar"></i>
                                <p>
                                    Pengajuan Cuti
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="reques_budget.php" class="nav-link" style="color: #FFCF09;">
                                <i class="nav-icon fas fa-money-bill-alt"></i>
                                <p>
                                    Reques Budget
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="peminjaman-karyawan-kor.php" class="nav-link" style="color: #FFCF09;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-arrow-left-right ml-1" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1 11.5a.5.5 0 0 0 .5.5h11.793l-3.147 3.146a.5.5 0 0 0 .708.708l4-4a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 11H1.5a.5.5 0 0 0-.5.5zm14-7a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H14.5a.5.5 0 0 1 .5.5z" />
                                </svg>
                                <p class="ml-2">
                                    Pinjam Karyawan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="lembur_staff.php" class="nav-link" style="color: #FFCF09;">
                                <i class="nav-icon fas fa-clipboard"></i>
                                <p>
                                    Lembur Karyawan
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>

                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>