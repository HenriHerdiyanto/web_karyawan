<?php
include "controller/koneksi.php";
require_once 'header-kordinator.php';

if (isset($_POST['delete'])) {
    $id_karyawan = $_POST['id_karyawan'];
    $link = "getDeleteKaryawanId&id_karyawan=" . urlencode($id_karyawan);
    // $link = "getDeleteKaryawanId";
    $delete = getRegistran($link);
    // var_dump($delete);
    if (!$delete) {
        echo "<script>alert('Data berhasil dihapus');window.location='karyawan-kor.php'</script>";
    } else {
        echo "<script>alert('Data gagal dihapus');window.location='karyawan-kor.php'</script>";
    }
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="row">
                    <div class="col">
                        <h1 class="m-3">key performance indicator ( KPI )</h1>
                    </div>
                    <div align="end" class="col mt-3 mr-3">
                        <a href="karyawan-kor-tambah.php" class="btn btn-success" type="button">
                            <i class="fas fa-plus"></i> Add Staff Kamu
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <!-- /.card-header -->
                        <?php
                        $link = "getKaryawanKor&id_user=" . urlencode($id_user);
                        $output = getRegistran($link);
                        ?>

                        <div class="card-body table-responsive">
                            <?php if ($output == NULL) { ?>
                                <h1 class="text-center">Data Kosong</h1>
                            <?php  } else { ?>
                                <table id="example" class="table table-striped table-bordered table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Lengkap</th>
                                            <th>Gender</th>
                                            <th>Status Karyawan</th>
                                            <th>Email</th>
                                            <th>Gaji</th>
                                            <th>Mulai Kerja</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $link = "getKaryawan&id_user=" . urlencode($id_user);
                                        $data_user = getRegistran($link);
                                        // var_dump($data_user);
                                        ?>
                                        <?php $no = 1; ?>
                                        <?php foreach ($data_user->data as $value) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $value->nama_lengkap ?></td>
                                                <td><?= $value->jenis_kelamin ?></td>
                                                <td><?= $value->status_karyawan ?></td>
                                                <td><?= $value->email ?></td>
                                                <td><?= $value->gaji ?></td>
                                                <td><?= $value->mulai_kerja ?></td>
                                                <td align="center">
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="editModal<?= $value->id_karyawan ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-xl">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title text-center fs-5" id="staticBackdropLabel">KEY PERFORMANCE INDICATOR</h1>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="POST">
                                                                        <div class="row">
                                                                            <div class="col-6">
                                                                                <div class="mb-2">
                                                                                    <label>Nama Lengkap</label>
                                                                                    <input type="text" class="form-control text-center" name="id_karyawan" value="<?= $value->nama_lengkap ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <div class="mb-2">
                                                                                    <label>Tanggal Masuk Kerja</label>
                                                                                    <input type="text" class="form-control text-center" name="id_karyawan" value="<?= $value->mulai_kerja ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <table class="table table-hover table-striped table-bordered">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>No</th>
                                                                                    <th>Indikator Penelitian</th>
                                                                                    <th>Nilai</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>1</td>
                                                                                    <td>KEHADIRAN & TEPAT WAKTU</td>
                                                                                    <td><input type="number" name="" class="form-control"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>2</td>
                                                                                    <td>BEKERJA BERDASARKAN SOP</td>
                                                                                    <td><input type="number" name="" class="form-control"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>3</td>
                                                                                    <td>MENJELASKAN DENGAN BAIK DAN MUDAH DIMENGERTI</td>
                                                                                    <td><input type="number" name="" class="form-control"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>4</td>
                                                                                    <td>MAMPU MENERIMA & MENJALANKAN INSTRUKSI DENGAN BAIK</td>
                                                                                    <td><input type="number" name="" class="form-control"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>5</td>
                                                                                    <td>TEAM WORK / BEKERJA SECARA MANDIRI</td>
                                                                                    <td><input type="number" name="" class="form-control"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>6</td>
                                                                                    <td>MEMPERHATIKAN HAL - HAL SECARA DETAIL</td>
                                                                                    <td><input type="number" name="" class="form-control"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>7</td>
                                                                                    <td>PENYELESAIAN MASALAH DALAM HAL IT DI MAHARIS GROUP</td>
                                                                                    <td><input type="number" name="" class="form-control"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>8</td>
                                                                                    <td>LAPORAN HASIL PEKERJAAN IT PER HARINYA</td>
                                                                                    <td><input type="number" name="" class="form-control"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>9</td>
                                                                                    <td>PENCATATAN HARDWARE & SOFTWARE DI SERVER MAHARIS GROUP</td>
                                                                                    <td><input type="number" name="" class="form-control"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>10</td>
                                                                                    <td>MEMASTIKAN HARDWARE, SOFTWARE, & INTERNET BERJALAN DENGAN EFEKTIF DAN STABIL</td>
                                                                                    <td><input type="number" name="" class="form-control"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>11</td>
                                                                                    <td>KECEPATAN MENINDAKLANJUTI PEKERJAAN IT YANG BELUM TERSELESAIKAN</td>
                                                                                    <td><input type="number" name="" class="form-control"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>12</td>
                                                                                    <td>PRODUKTIVITAS DALAM BEKERJA</td>
                                                                                    <td><input type="number" name="" class="form-control"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>13</td>
                                                                                    <td><b>TOTAL NILAI</b></td>
                                                                                    <td><input type="number" name="" class="form-control"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                            <button type="button" class="btn btn-primary">Understood</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <form method="post">
                                                        <!-- <button type="button" class="btn btn-info btn-sm mt-2" data-bs-toggle="modal" data-bs-target="#editModal<?= $value->id_karyawan ?>">
                                                            <i class="fas fa-edit"></i>
                                                        </button> -->
                                                        <input type="hidden" name="id_karyawan" value="<?= $value->id_karyawan ?>">
                                                        <button class="btn btn-danger btn-sm mt-2" onclick="return confirm('Apakah anda yakin ingin menghapus data?')" type="submit" data-bs-toggle="tooltip" title="Hapus data" name="delete">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>

                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                <?php } ?>
                                </table>
                        </div>
                        <!-- /.card-body -->
                    </div>


                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
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