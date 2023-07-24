<?php
include "controller/koneksi.php";
require_once 'header.php';
$link = "getPayrollAdmin";
$data_payroll = getRegistran($link);
// var_dump($data_absen);

?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="row">
                    <div class="col">
                        <h1 class="m-3">Gaji Karyawan</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <section class="col-lg-12 col-sm-12 connectedSortable">
                    <div class="card">
                        <?php
                        if ($data_payroll == null) { ?>
                            <div class="card-body">
                                <div class="tab-content p-0 table-responsive">
                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Lengkap</th>
                                                <th>Jabatan</th>
                                                <th>Pendidikan</th>
                                                <th>Cabang</th>
                                                <th>Total Gaji Bersih</th>
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
                                <h2>Data Payroll</h2>
                            </div>
                            <div class="card-body">
                                <div class="tab-content p-0">
                                    <div class="tabel_responsive">
                                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Lengkap</th>
                                                    <th class="text-center">Jabatan</th>
                                                    <th class="text-center">Pendidikan</th>
                                                    <th class="text-center">Cabang</th>
                                                    <th class="text-center">Total Gaji Bersih</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($data_payroll->data as $array_item) :
                                                    $gaji = $array_item->total_gaji_bersih;
                                                    $formatted_gaji = number_format($gaji, 0, ",", ".");
                                                ?>
                                                    <tr>
                                                        <td><?php echo $no++; ?></td>
                                                        <td><?php echo $array_item->nama_lengkap; ?></td>
                                                        <td class="text-center"><?php echo $array_item->level_user; ?></td>
                                                        <td class="text-center"><?php echo $array_item->pendidikan; ?></td>
                                                        <td class="text-center"><?php echo $array_item->cabang; ?></td>
                                                        <td class="text-center">Rp.<?php echo $formatted_gaji; ?></td>
                                                        <td class="text-center">
                                                            <form method="post">
                                                                <a href="karyawan_detail.php?id=<?php echo $array_item->id_karyawan ?>" class="btn-sm btn btn-warning" data-bs-toggle="tooltip" title="Detail">
                                                                    <i class="fas fa-eye"></i>
                                                                </a>
                                                                <input type="hidden" name="id_karyawan" value="<?php echo $array_item->id_karyawan; ?>">
                                                                <button class="btn btn-danger btn-sm m-1" onclick="return confirm('Apakah anda yakin ingin menghapus data?')" type="submit" data-bs-toggle="tooltip" title="Hapus" name="delete">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
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