<?php
include "controller/koneksi.php";
require_once 'header.php';
$link = "getAbsen";
$data_absen = getRegistran($link);
// var_dump($data_absen);

?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="row">
                    <div class="col">
                        <h1 class="m-3">Absen Karyawan</h1>
                    </div>
                    <div align="end" class="col mt-2 mr-3">
                        <!-- Button trigger modal -->
                        <!-- <a type="button" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#updateProfileModal">
                            <i class="fa fa-user-plus"></i> Upload Data
                        </a>
                        <div class="modal fade" id="updateProfileModal" tabindex="-1" aria-labelledby="updateProfileModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2>Upload data absen karyawan</h2>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <?php include("aksi.php") ?>
                                            <form action="" method="POST" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label for="">Keterangan</label>
                                                    <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" required>
                                                    <label for="file">Pilih file Excel:</label>
                                                    <input type="file" class="form-control" name="file_absen" id="file_absen" accept=".xls, .xlsx" required>
                                                    <label for="">Tanggal Upload</label>
                                                    <input type="date" class="form-control" name="tanggal_upload" id="tanggal_upload" placeholder="Tanggal Upload" required>
                                                </div>
                                                <button type="submit" name="upload" class="btn btn-primary">Upload</button>
                                            </form> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
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
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-chart-pie mr"></i> Data Absen
                        </div>
                        <div class="card-body">
                            <div class="tab-content p-0 table-responsive">

                                <?php include("aksi.php") ?>
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <!-- <label for="">Keterangan</label>
                                        <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" required> -->
                                        <label for="file">Pilih file Excel:</label>
                                        <input type="file" class="form-control" name="file_absen" id="file_absen">
                                        <!-- <label for="">Tanggal Upload</label>
                                        <input type="date" class="form-control" name="tanggal_upload" id="tanggal_upload" placeholder="Tanggal Upload" required> -->
                                    </div>
                                    <input type="submit" name="upload" class="btn btn-primary" value="upload">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3>input manual</h3>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="mb-2">
                                    <label for="id_karyawan" class="form-label">ID Karyawan</label>
                                    <input type="text" class="form-control" name="id_karyawan" id="id_karyawan" placeholder="ID Karyawan" required>
                                </div>
                                <div class="mb-2">
                                    <label for="nama_karyawan" class="form-label">Nama Karyawan</label>
                                    <input type="text" class="form-control" name="nama_karyawan" id="nama_karyawan" placeholder="Nama Karyawan" required>
                                </div>
                                <div class="mb-2">
                                    <label for="date" class="form-label">Tanggal</label>
                                    <input type="date" class="form-control" name="date" id="date" placeholder="Tanggal" required>
                                </div>
                                <!-- jam masuk -->
                                <div id='jamMasuk' style="">
                                    <label for="">Jam Masuk :</label>
                                    <div class="row">
                                        <div class="col">
                                            <select class="form-control" name="hourIn" required>
                                                <option value="">Hour</option>
                                                <?php
                                                for ($i = 0; $i <= 23; $i++) {
                                                    echo "<option value='$i'>$i</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select class="form-control" name="minuteIn" required>
                                                <option value="">Minute</option>
                                                <?php
                                                for ($i = 0; $i <= 59; $i++) {
                                                    echo "<option value='$i'>$i</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- jam keluar -->
                                <div id='jamKeluar' style="">
                                    <label for="">Jam Keluar :</label>
                                    <div class="row">
                                        <div class="col">
                                            <select class="form-control" name="hourOut" required>
                                                <option value="">Hour</option>
                                                <?php
                                                for ($i = 0; $i <= 23; $i++) {
                                                    echo "<option value='$i'>$i</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select class="form-control" name="minuteOut" required>
                                                <option value="">Minute</option>
                                                <?php
                                                for ($i = 0; $i <= 59; $i++) {
                                                    echo "<option value='$i'>$i</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </section>
                <section class="col-lg-12 col-sm-12 connectedSortable">
                    <div class="card">
                        <?php
                        if ($data_absen == null) { ?>
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
                        <?php } else { ?>
                            <div class="card-header">
                                <h2>Data Absen Karyawan</h2>
                            </div>
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
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($data_absen->data as $array_item) :
                                            ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $array_item->id_karyawan; ?></td>
                                                    <td><?php echo $array_item->nama_karyawan; ?></td>
                                                    <td class="text-center"><?php echo $array_item->date; ?></td>
                                                    <td><?php echo $array_item->jam_masuk; ?></td>
                                                    <td><?php echo $array_item->jam_keluar; ?></td>
                                                    <td class="text-center">
                                                        <a href="controller/absen.php?aksi=deleteAbsen&id=<?php echo $array_item->id_karyawan; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</a>
                                                        <a href="" class="btn btn-info">Payroll</a>
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