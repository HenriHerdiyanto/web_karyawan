<?php
include "controller/koneksi.php";
require_once 'header.php';
// $link = "getAbsenb";
// $data_absen1 = getRegistran($link);
// var_dump($data_absen1);


if (isset($_POST['delete'])) {
    $id_absen = $_POST['id_absen'];
    $link = "getDeleteDivisiId&id_absen=" . urlencode($id_absen);
    $delete = getRegistran($link); // Memanggil fungsi dengan parameter yang sesuai
    // var_dump($delete);
    echo "<script>alert('Data berhasil dihapus')</script>";
    echo "<script>location='absen-testing.php'</script>";
}
if (isset($_GET['filter'])) {
    $bulan = $_GET['bulan'];
    $tahun = $_GET['tahun'];
    $link = "getAbsenb&bulan=" . urlencode($bulan) . "&tahun=" . urlencode($tahun);
    $data_absen2 = getRegistran($link);
    // var_dump($data_absen2);
}
?>

<div class="content-wrapper">
    <div class="content-header">
        <form method="get">
            <div class="card p-3">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <label for="bulan" class="form-label">Pilih Bulan:</label>
                            <select class="form-control" name="bulan" id="bulan">
                                <option value="">--- Pilih Bulan ---</option>
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                        <div align="end" class="col-sm-6">
                            <label for="tahun" class="form-label">Pilih Tahun:</label>
                            <input type="number" name="tahun" class="form-control" id="tahun" min="2000" max="2099" step="1" value="<?php echo date('Y'); ?>">
                        </div><br>
                        <div class="col-12 mt-3">
                            <button type="submit" name="filter" class="btn btn-primary w-100">Cari</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <section class="col-lg-12 col-sm-12 connectedSortable">
                    <div class="card">
                        <?php
                        if (isset($_GET['bulan']) && isset($_GET['tahun'])) { ?>
                            <div class="card-header">
                                <h2>Data Absen Karyawan</h2>
                            </div>
                            <div class="card-body">
                                <div class="tab-content p-0 table-responsive">
                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Karyawan</th>
                                                <th>Nomor Induk Karyawan</th>
                                                <th>Nama Divisi</th>
                                                <th>Jabatan</th>
                                                <th>Tanggal</th>
                                                <th>Sakit</th>
                                                <th>Izin</th>
                                                <th>Terlmbat</th>
                                                <th>Keterangan</th>
                                                <th>Barcode</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($data_absen2->data as $array_item) : ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $array_item->nama_lengkap; ?></td>
                                                    <td class="text-center"><?php echo $array_item->nomor_induk; ?></td>
                                                    <td class="text-center"><?php echo $array_item->nama_divisi; ?></td>
                                                    <td class="text-center"><?php echo $array_item->level_user; ?></td>
                                                    <td class="text-center"><?php echo $array_item->tanggal; ?></td>
                                                    <td class="text-center"><?php echo $array_item->sakit; ?></td>
                                                    <td class="text-center"><?php echo $array_item->izin; ?></td>
                                                    <td class="text-center"><?php echo $array_item->terlambat; ?></td>
                                                    <td class="text-center"><?php echo $array_item->keterangan; ?></td>
                                                    <td class="text-center"><?php echo $array_item->barcode; ?></td>
                                                    <td class="text-center">
                                                        <form method="post">
                                                            <input type="text" name="id_absen" value="<?php echo $array_item->id_absen; ?>">
                                                            <button class="btn btn-danger btn-sm m-1" onclick="return confirm('Apakah anda yakin ingin menghapus data?')" type="submit" data-bs-toggle="tooltip" title="Hapus" name="delete">
                                                                Hapus
                                                            </button>
                                                            <a href="payroll-testing.php?id_karyawan=<?php echo $array_item->id_karyawan; ?>&bulan=<?php echo $bulan; ?>" class="btn btn-sm btn-info">Payroll</a>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="card-body">
                                <div class="tab-content p-0 table-responsive">
                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID Karyawan</th>
                                                <th>Nama Karyawan</th>
                                                <th>Tanggal</th>
                                                <th>Jam Masuk</th>
                                                <th>Jam Keluar</th>
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