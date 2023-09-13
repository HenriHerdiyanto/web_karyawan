<?php
include "controller/koneksi.php";
require_once 'header.php';

$link = "getDivisiUser";
$output = getRegistran($link);
function getRandomColor()
{
    static $colors = array('bg-primary', 'bg-secondary', 'bg-success', 'bg-danger', 'bg-warning', 'bg-info');
    $randomIndex = array_rand($colors);
    $randomColor = $colors[$randomIndex];
    unset($colors[$randomIndex]);
    return $randomColor;
}

$link = "getKPIadmin";
$dataAdmin = getRegistran($link);
// $id_karyawan = $dataAdmin->data[0]->id_karyawan;

?>
<style>
    .bg-primary {
        background-color: #007bff !important;
    }

    .bg-secondary {
        background-color: #6c757d !important;
    }

    .bg-success {
        background-color: #28a745 !important;
    }

    .bg-danger {
        background-color: #dc3545 !important;
    }

    .bg-warning {
        background-color: #ffc107 !important;
    }

    .bg-info {
        background-color: #17a2b8 !important;
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="row">
                    <div class="col">
                        <h1 class="m-3">key performance indicator (KPI)</h1>
                    </div>
                    <div align="end" class="col mt-3 mr-3">
                        <!-- <a href="karyawan-kor-tambah.php" class="btn btn-success" type="button">
                            <i class="fas fa-plus"></i> Add Staff Kamu
                        </a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <?php
                if ($output !== null && isset($output->data) && is_array($output->data)) {
                    foreach ($output->data as $key => $array_item) {
                ?>
                        <div class="col-lg-3 col-sm-12">
                            <div class="small-box <?php echo getRandomColor(); ?>">
                                <div class="inner">
                                    <h3><?php echo $array_item->nama_divisi ?></h3>
                                    <p>Divisi</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-ios-albums"></i>
                                </div>
                                <a href="anggota.php?id=<?php echo $array_item->id_divisi ?>" class="small-box-footer"><?php echo $array_item->id_divisi ?> <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    // Handle the case where $output is null or doesn't contain valid data.
                    // You can set default values or show an error message.
                }
                ?>
            </div>
            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
            <div class="card">
                <?php if ($dataAdmin == null) { ?>
                    <div class="card-body">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No. </th>
                                    <th>Nama Divisi</th>
                                    <th>Nama Lengkap</th>
                                    <th>Mulai Kerja</th>
                                    <th>Total Nilai</th>
                                    <th>Keterangan</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="7" class="text-center">DATA BELUM ADA</td>
                                </tr>
                            </tbody>
                        </table>
                    <?php } else { ?>
                        <div class="card-body">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No. </th>
                                        <th>Nama Divisi</th>
                                        <th>Nama Lengkap</th>
                                        <th>Mulai Kerja</th>
                                        <th>Total Nilai</th>
                                        <th>Keterangan</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($dataAdmin->data as $key => $array_item) : ?>
                                        <tr>
                                            <td><?php echo $key + 1 ?></td>
                                            <td><?php echo $array_item->nama_divisi; ?></td>
                                            <td><?php echo $array_item->nama_lengkap; ?></td>
                                            <td><?php echo $array_item->mulai_kerja; ?></td>
                                            <td><?php echo $array_item->total; ?></td>
                                            <td><?php echo $array_item->komentar; ?></td>
                                            <td class="text-center">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <?php
                                                    if (isset($_POST['hapuskpi'])) {
                                                        $id_kpi_it = $_POST['id_kpi_it'];
                                                        $link = "getDeleteKPIadmin&id_kpi_it=" . urlencode($id_kpi_it);
                                                        $delete = getRegistran($link);
                                                        if (!$delete) {
                                                            echo "<script>alert('Data berhasil dihapus');window.location='kpi_admin.php'</script>";
                                                        } else {
                                                            echo "<script>alert('Data gagal dihapus');window.location='karyawan.php'</script>";
                                                        }
                                                    }
                                                    ?>
                                                    <form action="" method="post">
                                                        <!-- <a href="perjalanan_dinas_edit.php?id=<?php echo $array_item->id_karyawan ?>" class="btn-sm btn btn-primary" data-bs-toggle="tooltip" title="Ubah">
                                                                    <i class="fas fa-edit"></i>
                                                                </a> -->

                                                        <button type="button" class="btn-sm btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $array_item->id_karyawan ?>">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <input type="hidden" name="id_kpi_it" value="<?php echo $array_item->id_kpi_it; ?>">
                                                        <button class="btn btn-danger btn-sm m-1" onclick="return confirm('Apakah anda yakin ingin menghapus data?')" type="submit" data-bs-toggle="tooltip" title="Hapus" name="hapuskpi">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                            <!-- Modal -->
                            <div class="modal fade" id="editModal<?php echo $array_item->id_karyawan ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="card m-2">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="container">
                                                <form action="perjalanan_dinas_edit.php" method="GET">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="mb-2">
                                                                <label>Nama Lengkap</label>
                                                                <input type="hidden" class="form-control" name="id_karyawan" value="<?= $array_item->id_karyawan ?>">
                                                                <input type="text" class="form-control" name="nama_lengkap" value="<?= $array_item->nama_lengkap ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="mb-2">
                                                                <label>Tanggal Masuk Kerja</label>
                                                                <input type="text" class="form-control" name="mulai_kerja" value="<?= $array_item->mulai_kerja ?>">
                                                                <input type="hidden" class="form-control" name="id_divisi" value="<?= $array_item->id_divisi ?>">
                                                                <input type="hidden" class="form-control" name="id_user" value="<?= $array_item->id_user ?>">
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
                                                                <td><input type="text" name="indikator1" value="<?= $array_item->indikator1 ?>" class="form-control nilai-input"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>BEKERJA BERDASARKAN SOP</td>
                                                                <td><input type="text" name="indikator2" value="<?= $array_item->indikator2 ?>" class="form-control nilai-input"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>3</td>
                                                                <td>MENJELASKAN DENGAN BAIK DAN MUDAH DIMENGERTI</td>
                                                                <td><input type="text" name="indikator3" value="<?= $array_item->indikator3 ?>" class="form-control nilai-input"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>4</td>
                                                                <td>MAMPU MENERIMA & MENJALANKAN INSTRUKSI DENGAN BAIK</td>
                                                                <td><input type="text" name="indikator4" value="<?= $array_item->indikator4 ?>" class="form-control nilai-input"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>5</td>
                                                                <td>TEAM WORK / BEKERJA SECARA MANDIRI</td>
                                                                <td><input type="text" name="indikator5" value="<?= $array_item->indikator5 ?>" class="form-control nilai-input"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>6</td>
                                                                <td>MEMPERHATIKAN HAL - HAL SECARA DETAIL</td>
                                                                <td><input type="text" name="indikator6" value="<?= $array_item->indikator6 ?>" class="form-control nilai-input"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>7</td>
                                                                <td>PENYELESAIAN MASALAH DALAM HAL IT DI MAHARIS GROUP</td>
                                                                <td><input type="text" name="indikator7" value="<?= $array_item->indikator7 ?>" class="form-control nilai-input"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>8</td>
                                                                <td>LAPORAN HASIL PEKERJAAN IT PER HARINYA</td>
                                                                <td><input type="text" name="indikator8" value="<?= $array_item->indikator8 ?>" class="form-control nilai-input"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>9</td>
                                                                <td>PENCATATAN HARDWARE & SOFTWARE DI SERVER MAHARIS GROUP</td>
                                                                <td><input type="text" name="indikator9" value="<?= $array_item->indikator9 ?>" class="form-control nilai-input"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>10</td>
                                                                <td>MEMASTIKAN HARDWARE, SOFTWARE, & INTERNET BERJALAN DENGAN EFEKTIF DAN STABIL</td>
                                                                <td><input type="text" name="indikator10" value="<?= $array_item->indikator10 ?>" class="form-control nilai-input"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>11</td>
                                                                <td>KECEPATAN MENINDAKLANJUTI PEKERJAAN IT YANG BELUM TERSELESAIKAN</td>
                                                                <td><input type="text" name="indikator11" value="<?= $array_item->indikator11 ?>" class="form-control nilai-input"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>12</td>
                                                                <td>PRODUKTIVITAS DALAM BEKERJA</td>
                                                                <td><input type="text" name="indikator12" value="<?= $array_item->indikator1 ?>" class="form-control nilai-input"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>13</td>
                                                                <td><b>TOTAL NILAI</b></td>
                                                                <td><input type="text" name="total" value="<?= $array_item->total ?>" class="form-control total-nilai"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table class="table table-hover table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Komentar Kepala Departemen/Penilai :</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><textarea name="komentar" class="form-control" cols="30" rows="5"><?= $array_item->komentar ?></textarea></td>
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
                            </div>
                        </div>
                    <?php }

                    ?>
                    </div>
            </div>
    </section>
    <!-- ./wrapper -->
    <!-- bootstrap js -->
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