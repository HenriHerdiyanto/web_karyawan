<?php
session_start();
if (!isset($_SESSION['user'])) {
    echo ("<script>location.href = 'login.php';</script>");
}
$user = $_SESSION["login"];
$level = $_SESSION["user"];

require_once 'controller/utility.php';


$link = "getStafId&id_user=" . urlencode($user);
$data = getRegistran($link);
$id_user = $data->data[0]->id_user;
$nama = $data->data[0]->nama_user;
$level_user = $data->data[0]->level_user;

var_dump($level_user);
if ($level_user < 1) {
    echo ("<script>location.href = 'index.php';</script>");
}

$link = "getKaryawan&id_user=" . urlencode($id_user);
$data_kar = getRegistran($link);
$id_kar1 = $data_kar->data[0]->id_karyawan;
var_dump($id_kar1);
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
                <span class="brand-text font-weight-light">HRMS</span>
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
                <a href="profile-kor.php?id=<?= $id_kar1 ?>">
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
                        <li class="nav-item">
                            <a href="kordinator.php" class="nav-link" style="color: #FFCF09;">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="karyawan-kor.php" class="nav-link" style="color: #FFCF09;">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Anggota Anda
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="evaluasi-karyawan-kor.php" class="nav-link" style="color: #FFCF09;">
                                <i class="nav-icon fas fa-chart-bar"></i>
                                <p>
                                    Evaluasi Anggota
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="perjalanan-dinas-kor.php" class="nav-link" style="color: #FFCF09;">
                                <i class="nav-icon fas fa-plane"></i>
                                <p>
                                    Perjalanan Dinas
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="peminjaman-karyawan-kor.php" class="nav-link" style="color: #FFCF09;">
                                <i class="nav-icon fas fa-clipboard"></i>
                                <p>
                                    Peminjaman Karyawan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="lembur-karyawan-kor.php" class="nav-link" style="color: #FFCF09;">
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