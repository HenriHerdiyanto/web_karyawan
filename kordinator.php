<?php
include "controller/koneksi.php";
require_once 'header-kordinator.php';


$link = "getKaryawanKor&id_user=" . urlencode($id_user);
$datas = getRegistran($link);
$nama_divisi = $datas->data[0]->nama_divisi;
$id_karyawan = $datas->data[0]->id_karyawan;
$id_divisi = $datas->data[0]->id_divisi;


$link = "getProfilePendidikan&id_karyawan=" . urlencode($id_karyawan);
$profile = getRegistran($link);
// var_dump($profile);

$link2 = "getSOPid&id_divisi=" . urlencode($id_divisi);
$data_sop = getRegistran($link2);
// var_dump($data_sop);


if (isset($_POST['update'])) {
    $id_karyawan = $_POST['id_karyawan'];
    $jenjang_pendidikan = $_POST['jenjang_pendidikan'];
    $instansi_pendidikan = $_POST['instansi_pendidikan'];
    $jurusan = $_POST['jurusan'];
    $tahun_masuk = $_POST['tahun_masuk'];
    $tahun_lulus = $_POST['tahun_lulus'];
    $index_nilai = $_POST['index_nilai'];

    $link = "setProfile&id_karyawan=" . urlencode($id_karyawan) . "&jenjang_pendidikan=" . urlencode($jenjang_pendidikan) . "&instansi_pendidikan=" . urlencode($instansi_pendidikan) . "&jurusan=" . urlencode($jurusan) . "&tahun_masuk=" . urlencode($tahun_masuk) . "&tahun_lulus=" . urlencode($tahun_lulus) . "&index_nilai=" . urlencode($index_nilai);
    $hasil = getRegistran($link);
    echo "<script>alert('Login Berhasil')</script>";
    echo ("<script>location.href = 'kordinator.php';</script>");
    var_dump($hasil);
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="card p-3">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">DIVISI <?= $nama_divisi ?></h1>
                    </div><!-- /.col -->
                    <div align="end" class="col-sm-6">
                        <!-- Button trigger modal -->
                        <?php
                        if ($profile == null) { ?>
                            <a type="button" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#updateProfileModal">
                                <i class="nav-icon fas fa-user"></i> Update Profile
                            </a>

                            <!-- Modal -->
                            <div class="modal fade" id="updateProfileModal" tabindex="-1" aria-labelledby="updateProfileModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="updateProfileModalLabel">Update Profile</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form method="POST" action="">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label style="margin-left: 0; display:flex;" for="fullName">Full Name</label>
                                                    <input type="text" class="form-control" name="id_karyawan" value="<?= $datas->data[0]->id_karyawan ?>">
                                                    <input type="text" class="form-control" value="<?= $nama ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label style="margin-left: 0; display:flex;">Pendidikan Terakhir</label>
                                                    <select class="form-control" name="jenjang_pendidikan">
                                                        <option value="">--- PILIH ---</option>
                                                        <option value="doktor">DOKTOR</option>
                                                        <option value="magister">MAGISTER</option>
                                                        <option value="sarjana">SARJANA</option>
                                                        <option value="sma">SMA</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label style="margin-left: 0; display:flex;">Instansi Penddikan</label>
                                                    <input type="text" name="instansi_pendidikan" class="form-control" placeholder="Nama Instansi">
                                                </div>
                                                <div class="form-group">
                                                    <label style="margin-left: 0; display:flex;">Jurusan / Spesialis</label>
                                                    <input type="text" name="jurusan" class="form-control" placeholder="Nama Jurusan / Spesialis">
                                                </div>
                                                <div class="form-group">
                                                    <label style="margin-left: 0; display:flex;">Tahun Masuk</label>
                                                    <input type="date" name="tahun_masuk" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label style="margin-left: 0; display:flex;">Tahun Lulus</label>
                                                    <input type="date" name="tahun_lulus" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label style="margin-left: 0; display:flex;">INDEX NILAI</label>
                                                    <input type="text" name="index_nilai" class="form-control" placeholder="IPK">
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" name="update" class="btn btn-primary">UPDATE</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php } else { ?>
                            <a href="profile-kor.php?id=<?php echo $id_karyawan ?>" class="btn btn-lg btn-info">
                                <i class="nav-icon fas fa-user"></i> Lihat Profile
                            </a>
                        <?php }
                        ?>

                    </div><!-- /.col -->
                </div>
            </div>
        </div>
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <?php
                            $query = mysqli_query($connect, "SELECT status, COUNT(*) as jumlah_data FROM perjalanan_dinas WHERE id_user= $id_user");
                            $row = mysqli_fetch_assoc($query);
                            $jumlah_data = $row['jumlah_data'];
                            ?>
                            <h3><?php echo $jumlah_data; ?> Notifikasi</h3>
                            <p>Perjalanan Dinas</p>
                        </div>
                        <div class="icon">
                            <i class="nav-icon fas fa-plane"></i>
                        </div>
                        <a href="perjalanan-dinas-kor.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <?php
                            $id_user = $data->data[0]->id_user;
                            $query = mysqli_query($connect, "SELECT nama_lengkap, COUNT(*) as jumlah_data FROM karyawan WHERE id_user= $id_user AND level_user = 'staff'");
                            $row = mysqli_fetch_assoc($query);
                            $jumlah_data = $row['jumlah_data'];
                            ?>
                            <h3><?php echo $jumlah_data; ?> Karyawan</h3>
                            <p>Jumlah Karyawan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-stalker"></i>
                        </div>
                        <a href="karyawan-kor.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <?php
                            $query = mysqli_query($connect, "SELECT id_pinjam, COUNT(*) as jumlah_data FROM history_pinjam WHERE id_karyawan= $id_karyawan");
                            $row = mysqli_fetch_assoc($query);
                            $jumlah_data = $row['jumlah_data'];
                            ?>
                            <h3><?php echo $jumlah_data; ?> Transaksi</h3>
                            <p>Peminjaman Karyawan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-copy"></i>
                        </div>
                        <a href="peminjaman-karyawan-kor.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <?php

                            $query = mysqli_query($connect, "SELECT COUNT(*) AS jumlah_data
                            FROM lembur
                            WHERE nama_divisi = '$nama_divisi';
                            ");
                            $row = mysqli_fetch_assoc($query);
                            $jumlah_data = $row['jumlah_data'];
                            ?>
                            <h3><?php echo $jumlah_data; ?> DATA LEMBUR</h3>
                            <p>Jumlah Data Lembur</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-stalker"></i>
                        </div>
                        <a href="lembur-karyawan-kor.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-7 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-header">
                            <h2>
                                To Do List
                            </h2>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <!-- Morris chart - Sales -->
                                <div class="card-body table-responsive" id="revenue-chart" style="position: relative;">
                                    <?php
                                    $link = "getTodoList&id_karyawan=" . urlencode($id_karyawan);
                                    $output4 = getRegistran($link);
                                    if ($output4 == NULL) { ?>
                                        <div class="card text-center">
                                            <div class="card-body">
                                                <h5 class="card-text">Belum ada To Do List, silahkan tambahkan To do List</h5>

                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                    Tambah To Do List
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah To Do List</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <?php
                                                            if (isset($_POST['todo'])) {
                                                                $id_karyawan = $_POST['id_karyawan'];
                                                                $nama_project = $_POST['nama_project'];
                                                                $todolist = $_POST['todolist'];

                                                                $link = "setTodolist&id_karyawan=" . urlencode($id_karyawan) . "&nama_project=" . urlencode($nama_project) . "&todolist=" . urlencode($todolist);
                                                                $todo = getRegistran($link);
                                                                echo "<script>alert('To Do List Ditambahkan')</script>";
                                                                echo ("<script>location.href = 'kordinator.php';</script>");
                                                            }
                                                            ?>
                                                            <form action="" method="post">
                                                                <div class="modal-body">
                                                                    <label for="">Nama Project</label><br>
                                                                    <input type="text" class="form-control" name="id_karyawan" value="<?= $id_karyawan ?>"><br>
                                                                    <input type="text" class="form-control" name="nama_project"><br>
                                                                    <textarea name="todolist" class="form-control" cols="30" rows="10"></textarea>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" name="todo" class="btn btn-primary">Understood</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } else { ?>
                                        <?php
                                        if (isset($_POST['updatetodo'])) {
                                            $id_karyawan = $_POST['id_karyawan'];
                                            $nama_project = $_POST['nama_project'];
                                            $todolist = $_POST['todolist'];

                                            $link = "setUpdateTodo&id_karyawan=" . urlencode($id_karyawan) . "&nama_project=" . urlencode($nama_project) . "&todolist=" . urlencode($todolist);
                                            $datas = getRegistran($link);
                                            var_dump($datas);
                                            // echo ("<script>location.href = 'kordinator.php';</script>");
                                        }
                                        ?>
                                        <form action="" method="post">
                                            <div class="card">
                                                <div class="card-body">

                                                    <input type="hidden" name="id_karyawan" class="form-control" value="<?= $output4->data[0]->id_karyawan ?>"><br>
                                                    <input type="text" name="nama_project" class="form-control" value="<?= $output4->data[0]->nama_project ?>"><br>
                                                    <textarea name="todolist" class="form-control" cols="30" rows="10"><?= $output4->data[0]->todolist ?></textarea>
                                                </div>
                                                <div class="card-footer">
                                                    <center><button type="submit" name="updatetodo" class="btn btn-outline-primary d-flex justify-content-center">UPDATE To Do List</button></center>
                                                </div>
                                            </div>
                                        </form>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <section class="col-lg-5 connectedSortable">

                    <!-- Map card -->

                    <!-- /.card -->

                    <!-- Calendar -->
                    <div class="card bg-gradient-success">
                        <div class="card-header border-0">
                            <h3 class="card-title">
                                <i class="far fa-calendar-alt"></i>
                                Calendar
                            </h3>
                        </div>
                        <div class="card-body pt-0">
                            <div id="calendar" style="width: 100%"></div>
                        </div>
                    </div>
                    <?php
                    if ($data_sop == null) { ?>
                        <div class="card bg-gradient-success">
                            <div class="card-header border-0">
                                <h3 class="card-title">
                                    <i class="far fa-file"></i>
                                    Belum ada SOP
                                </h3>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="card bg-gradient-success">
                            <div class="card-header border-0">
                                <h3 class="card-title">
                                    <i class="far fa-file"></i>
                                    <?= $data_sop->data[0]->nama_divisi ?>
                                </h3>
                            </div>
                            <div class="card-body pt-0">
                                <div class="sop" style="width: 100%">
                                    <textarea class="form-control" cols="30" rows="10" readonly><?= $data_sop->data[0]->aturan ?></textarea>
                                </div>
                            </div>
                        </div>
                    <?php }
                    ?>
                </section>
            </div>
        </div>
    </section>
</div>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="dist/js/demo.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<script>
    // The Calender
    $('#calendar').datetimepicker({
        format: 'L',
        inline: true
    })
</script>
</body>

</html>