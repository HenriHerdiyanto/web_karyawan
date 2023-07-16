<?php
include "controller/koneksi.php";
require_once 'header.php';


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
                        <a type="button" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#updateProfileModal">
                            <i class="fa fa-user-plus"></i> Upload Data
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
                                    <div class="card">
                                        <div class="card-header">
                                        </div>
                                        <?php
                                        if (isset($_POST['uploadBtn'])) {
                                            // Menangani upload file
                                            $file = $_FILES['fileUpload'];

                                            // Periksa apakah file yang diunggah adalah file Excel
                                            $allowedExtensions = array('xlsx', 'xls');
                                            $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
                                            if (in_array($fileExtension, $allowedExtensions)) {
                                                // Proses file Excel dan tampilkan tabel absensi
                                                // Anda dapat menambahkan kode untuk membaca file Excel dan menghasilkan data absensi di sini

                                                // Contoh kode untuk menampilkan tabel hasil
                                        ?>
                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <th>Nama Karyawan</th>
                                                            <th>Tanggal Absensi</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>John Doe</td>
                                                            <td>2023-07-14</td>
                                                            <td>Hadir</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Jane Smith</td>
                                                            <td>2023-07-14</td>
                                                            <td>Izin</td>
                                                        </tr>
                                                        <!-- Tambahkan baris data absensi sesuai hasil pemrosesan file Excel -->
                                                    </tbody>
                                                </table>
                                        <?php
                                            } else {
                                                echo 'Hanya file Excel (.xlsx, .xls) yang diizinkan.';
                                            }
                                        }
                                        ?>
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <div class="card-body">
                                                <label>Pilih file Excel:</label>
                                                <input type="file" class="form-control" name="fileUpload" id="fileUpload" accept=".xlsx, .xls">
                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-success" name="uploadBtn">Upload</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <section class="col-lg-12 col-sm-12 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-header">
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content p-0">
                            </div>
                        </div><!-- /.card-body -->
                    </div>
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