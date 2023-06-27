<?php
require_once 'header-kordinator.php';

$id_krywn = $_GET['id'];

$link = "getDivisi";
$data_divisi = getRegistran($link);

$link = "getKaryawanById&id_karyawan=" . urlencode($id_krywn);
$data_karyawan = getRegistran($link);

// input Karyawan
if (isset($_POST['submit'])) {
    $id_karyawan = $_POST['id_karyawan'];
    $id_divisi = $_POST['id_divisi'];
    $lama_percobaan = $_POST['lama_percobaan'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $level_user = $_POST['level_user'];
    $tanggal_kerja = $_POST['tanggal_kerja'];
    $status = $_POST['status'];
    $faktor_penilaian = $_POST['faktor_penilaian'];
    $catatan_atasan = $_POST['catatan_atasan'];
    $status_evaluasi = $_POST['status_evaluasi'];
    // $catatan_hrd = $_POST['catatan_hrd'];
    // $dievaluasi_oleh = $_POST['dievaluasi_oleh'];
    // $disetujui_oleh = $_POST['disetujui_oleh'];

    $link = "setEvaluasi&id_divisi=" . urlencode($id_divisi) . "&id_karyawan=" . urlencode($id_karyawan) . "&lama_percobaan=" . urlencode($lama_percobaan) . "&nama_lengkap=" . urlencode($nama_lengkap) . "&level_user=" . urlencode($level_user) . "&tanggal_kerja=" . urlencode($tanggal_kerja) . "&status=" . urlencode($status) . "&faktor_penilaian=" . urlencode($faktor_penilaian) . "&catatan_atasan=" . urlencode($catatan_atasan) . "&status_evaluasi=" . urlencode($status_evaluasi);
    $data = getRegistran($link);
    var_dump($data);
    echo "<script>alert('Evaluasi Berhasil di Tambah')</script>";
    echo ("<script>location.href = 'evaluasi-karyawan-kor.php';</script>");
}

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>EVALUASI Karyawan</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Input Karyawan</h3>
                </div>
                <!-- /.card-header -->
                <form method="post">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="hidden" name="id_karyawan" value="<?php echo $id_krywn ?>">
                                            <img style="width: 300px;" class="profile-user-img img-fluid img-circle" src="foto_karyawan/<?php echo $data_karyawan->data[0]->foto_karyawan; ?>" alt="User profile picture">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-5 mr-5">
                                        <div class="form-group">
                                            <label for="">Divisi</label>
                                            <select class="form-control" name="id_divisi">
                                                <?php foreach ($data_divisi->data as $key => $value) : ?>
                                                    <option value="<?php echo $value->id_divisi; ?>" <?php if ($value->id_divisi == $data_karyawan->data[0]->id_divisi) {
                                                                                                            echo 'selected';
                                                                                                        } ?>><?php echo $value->nama_divisi; ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Lama Percobaan</label>
                                    <input type="text" class="form-control" name="lama_percobaan" required>
                                </div>
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" class="form-control" name="nama_lengkap" value="<?php echo $data_karyawan->data[0]->nama_lengkap; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Level User</label>
                                    <select class="form-control" name="level_user">
                                        <!-- <option value="manager" <?php if ($data_karyawan->data[0]->level_user == "manager") {
                                                                            echo "selected";
                                                                        } ?>>Manager</option>
                                        <option value="staff" <?php if ($data_karyawan->data[0]->level_user == "staff") {
                                                                    echo "selected";
                                                                } ?>>Staf</option> -->
                                        <option value="<?php echo $data_karyawan->data[0]->level_user; ?>"><?php echo $data_karyawan->data[0]->level_user; ?></option>
                                        <option value="manager">Manager</option>
                                        <option value="staf">Staff</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Mulai Kerja</label>
                                    <input type="date" class="form-control" name="tanggal_kerja" required>
                                </div>
                                <div class="form-group">
                                    <label>Status Karyawan</label>
                                    <select class="form-control" name="status" id="" required>
                                        <option value="">--- PILIH ---</option>
                                        <option value="kontrak">kontrak</option>
                                        <option value="permanen">permanen</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Faktor Penilaian Karyawan</label>
                                    <textarea name="faktor_penilaian" class="form-control" cols="20" rows="5" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Catatan Anda Sebagai Kordinator</label>
                                    <textarea name="catatan_atasan" class="form-control" cols="20" rows="5" required></textarea>
                                </div>
                                <!-- <div class="form-group">
                                    <label>Catatan HRD</label>
                                    <textarea name="catatan_hrd" class="form-control" id="" cols="20" rows="5" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Dievaluasi Oleh</label>
                                    <input type="text" class="form-control" name="dievaluasi_oleh" required>
                                </div>
                                <div class="form-group">
                                    <label>DiSetujui Oleh</label>
                                    <input type="text" class="form-control" name="disetujui_oleh" required>
                                </div> -->
                                <div class="form-group">
                                    <input type="hidden" value="diproses" class="form-control" name="status_evaluasi" required>
                                </div>
                            </div>
                            <!-- /.col -->

                            <!-- /.row -->
                            <!-- /.card-body -->
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-lg btn-primary float-sm-right" name="submit">Submit</button>
                        </div>
                </form>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
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
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="dist/js/demo.js"></script> -->
<!-- Page specific script -->
<script>
    function handleCheckboxChange(checkbox) {
        const alamatKTP = document.getElementById("alamat_ktp");
        const alamatDomisili = document.getElementById("alamat_domisili");

        if (checkbox.checked) {
            alamatDomisili.value = alamatKTP.value;
            alamatDomisili.readOnly = true;
        } else {
            alamatDomisili.value = "";
            alamatDomisili.readOnly = false;
        }
    }
</script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<script>
    $(document).ready(function() {
        $('#example2').DataTable();
    });
</script>
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>
<script>
    $(function() {
        bsCustomFileInput.init();
    });
</script>
</body>

</html>