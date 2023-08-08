<?php
include "controller/koneksi.php";
require_once 'header.php';


$link = "getAbsen";
$data_absen = getRegistran($link);

var_dump($data_absen);

if (isset($_POST['reset'])) {
    $link = "getDeleteDivisiId";
    $reset = getRegistran($link);
    if (!$reset) {
        echo "<script>alert('Data berhasil direset')</script>";
        echo "<script>location='absen-admin.php'</script>";
    } else {
        echo "<script>alert('Data gagal direset')</script>";
        echo "<script>location='absen-admin.php'</script>";
    }
}
?>
<style>
    /* buatkan css agar posisi label berada rata dikiri */
    label {
        display: inline-block;
        width: 200px;
        margin-right: 100%;
        text-align: justify;
        font-size: medium;
    }
</style>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="row">
                    <div class="col">
                        <h1 class="m-3">Absen Karyawan</h1>
                    </div>
                    <div align="end" class="col mt-2 mr-3">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <section class="col-lg-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    <h3 class="card-title"><i class="fas fa-chart-pie mr"></i> Data Absen</h3>
                                </div>
                                <div class="col d-flex justify-content-end">
                                    <a href="controller/testing222.xls" target="_blank" class="btn btn-success">
                                        <i class="fas fa-eye"></i> Template Absen
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-8">
                                    <?php include("aksi.php") ?>
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="file">Pilih file Excel:</label>
                                            <input type="file" class="form-control" name="file_absen" id="file_absen" required>
                                        </div>
                                        <input type="submit" name="upload" class="btn btn-outline-primary w-100" value="upload">
                                    </form>
                                </div>
                                <div class="col-lg-4">
                                    <span class="text-red">*Catatan</span>
                                    <ul>
                                        <li>Upload File dilakukan sebulan sekali</li>
                                        <li>File yang diupload harus berformat .xls atau .xlsx</li>
                                        <li>File yang diupload harus sesuai dengan template</li>
                                        <li>File yang diupload tidak boleh kosong</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="col-lg-12 col-sm-12 connectedSortable">
                    <div class="card">

                        <?php
                        if ($data_absen == null) { ?>
                            <div class="card-header">
                                <div class="row">
                                    <div class="col">
                                        <h2>Data Absen Karyawan</h2>
                                    </div>
                                    <div class="col d-flex justify-content-end">
                                        <form action="" method="post">
                                            <button type="submit" name="reset" class="btn btn-danger">Reset Data</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="tab-content p-0 table-responsive">
                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nomor Karyawan</th>
                                                <th>Nama Karyawan</th>
                                                <th>Tanggal</th>
                                                <th>Jam Masuk</th>
                                                <th>Jam Keluar</th>
                                                <th>Terlambat</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="9" align="center">Data Kosong</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="card-header">
                                <div class="row">
                                    <div class="col">
                                        <h2>Data Absen Karyawan</h2>
                                    </div>
                                    <div class="col d-flex justify-content-end">
                                        <form action="" method="post">
                                            <button type="submit" name="reset" class="btn btn-danger">Reset Data</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="tab-content p-0 table-responsive">
                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nomor Karyawan</th>
                                                <th>Nama Karyawan</th>
                                                <th>Tanggal</th>
                                                <th>Jam Masuk</th>
                                                <th>Jam Keluar</th>
                                                <th>Terlambat</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (isset($_POST['delete'])) {
                                                $id_absen = $_POST['id_absen'];
                                                $link = "getDeleteDivisiId&id_absen=" . urlencode($id_absen);
                                                $delete = getRegistran($link);
                                                if (!$delete) {
                                                    echo "<script>alert('Data berhasil dihapus')</script>";
                                                    echo "<script>location='absen-admin.php'</script>";
                                                } else {
                                                    echo "<script>alert('Data gagal dihapus')</script>";
                                                    echo "<script>location='absen-admin.php'</script>";
                                                }
                                            }
                                            $no = 1;
                                            foreach ($data_absen->data as $array_item) :
                                            ?>

                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $array_item->nomor_induk; ?></td>
                                                    <td><?php echo $array_item->nama_karyawan; ?></td>
                                                    <td class="text-center"><?php echo $array_item->date; ?></td>
                                                    <td><?php echo $array_item->jam_masuk; ?></td>
                                                    <td><?php echo $array_item->jam_keluar; ?></td>
                                                    <td><?php echo $array_item->terlambat; ?></td>
                                                    <td class="text-center">
                                                        <form method="post">
                                                            <input type="hidden" name="id_absen" value="<?php echo $array_item->id_absen; ?>">
                                                            <button class="btn btn-danger btn-sm m-1" onclick="return confirm('Apakah anda yakin ingin menghapus data?')" type="submit" data-bs-toggle="tooltip" title="Hapus" name="delete">
                                                                Hapus
                                                            </button>
                                                        </form>
                                                        <a href="payroll.php?nomor_induk=<?php echo $array_item->nomor_induk; ?>" class="btn btn-sm btn-info">Payroll</a>
                                                    </td>
                                                </tr>

                                            <?php endforeach; ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php }
                        ?>
                </section>
            </div>
        </div>
    </section>
</div>
<aside class="control-sidebar control-sidebar-dark">
</aside>
</div>
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
    $('#calendar').datetimepicker({
        format: 'L',
        inline: true
    })
</script>
</body>

</html>