<?php
require_once 'header.php';

$id_evaluasi = $_GET['id'];

$link = "getDivisi";
$data_divisi = getRegistran($link);
// var_dump($data_divisi);

$link = "getEvaluasiEdit&id_evaluasi=" . urlencode($id_evaluasi);
$data_evaluasi = getRegistran($link);
// var_dump($data_evaluasi);

// input Karyawan
if (isset($_POST['submit'])) {
    $id_evaluasi = $_POST['id_evaluasi'];
    $id_karyawan = $_POST['id_karyawan'];
    $id_divisi = $_POST['id_divisi'];
    $lama_percobaan = $_POST['lama_percobaan'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $level_user = $_POST['level_user'];
    $tanggal_kerja = $_POST['tanggal_kerja'];
    $status = $_POST['status'];
    $faktor_penilaian = $_POST['faktor_penilaian'];
    $catatan_atasan = $_POST['catatan_atasan'];
    $catatan_hrd = $_POST['catatan_hrd'];
    $dievaluasi_oleh = $_POST['dievaluasi_oleh'];
    $disetujui_oleh = $_POST['disetujui_oleh'];
    $status_evaluasi = $_POST['status_evaluasi'];

    $link = "setUpdateEvaluasi&id_evaluasi=" . urlencode($id_evaluasi) . "&id_karyawan=" . urlencode($id_karyawan) . "&id_divisi=" . urlencode($id_divisi) . "&lama_percobaan=" . urlencode($lama_percobaan) . "&nama_lengkap=" . urlencode($nama_lengkap) . "&level_user=" . urlencode($level_user) . "&tanggal_kerja=" . urlencode($tanggal_kerja) . "&status=" . urlencode($status) . "&faktor_penilaian=" . urlencode($faktor_penilaian) . "&catatan_atasan=" . urlencode($catatan_atasan) . "&catatan_hrd=" . urlencode($catatan_hrd) . "&dievaluasi_oleh=" . urlencode($dievaluasi_oleh) . "&disetujui_oleh=" . urlencode($disetujui_oleh) . "&status_evaluasi=" . urlencode($status_evaluasi);
    $data = getRegistran($link);
    var_dump($data);
    // echo '<script>alert("data berhasil diupdate")</script>';
    // echo ("<script>location.href = 'karyawan.php';</script>");
}

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ubah Data Karyawan</h1>
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
                <form method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="id_evaluasi" value="<?php echo $data_evaluasi->data[0]->id_evaluasi; ?>">
                                    <input type="text" name="id_karyawan" value="<?php echo $data_evaluasi->data[0]->id_karyawan; ?>">
                                    <label for="">Divisi</label>
                                    <select class="form-control" name="id_divisi">
                                        <?php foreach ($data_divisi->data as $key => $value) : ?>
                                            <option value="<?php echo $value->id_divisi; ?>" <?php if ($value->id_divisi == $data_evaluasi->data[0]->id_divisi) {
                                                                                                    echo 'selected';
                                                                                                } ?>><?php echo $value->nama_divisi; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Lama Percobaan</label>
                                    <input type="text" class="form-control" name="lama_percobaan" value="<?php echo $data_evaluasi->data[0]->lama_percobaan; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" class="form-control" name="nama_lengkap" value="<?php echo $data_evaluasi->data[0]->nama_lengkap; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Jabatan</label>
                                    <input type="text" class="form-control" name="level_user" value="<?php echo $data_evaluasi->data[0]->level_user ?>">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Kerja</label>
                                    <input type="date" class="form-control" name="tanggal_kerja" value="<?php echo $data_evaluasi->data[0]->tanggal_kerja ?>">
                                </div>
                                <div class="form-group">
                                    <label>Status Karyawan</label>
                                    <input type="text" class="form-control" name="status" value="<?php echo $data_evaluasi->data[0]->status ?>">
                                </div>
                                <div class="form-group">
                                    <label>Faktor Penilaian</label>
                                    <textarea class="form-control" name="faktor_penilaian" id="" cols="30" rows="10"><?php echo $data_evaluasi->data[0]->faktor_penilaian ?></textarea>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Catatan Atasan</label>
                                    <textarea class="form-control" name="catatan_atasan" id="" cols="30" rows="10"><?php echo $data_evaluasi->data[0]->catatan_atasan ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Catatan HRD</label>
                                    <textarea class="form-control" name="catatan_hrd" id="" cols="30" rows="8"><?php echo $data_evaluasi->data[0]->catatan_hrd ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label>Di Evaluasi Oleh</label>
                                    <input type="text" class="form-control" name="dievaluasi_oleh" value="<?php echo $data_evaluasi->data[0]->dievaluasi_oleh ?>">
                                </div>
                                <div class="form-group">
                                    <label>Di Setujui Oleh</label>
                                    <input type="text" class="form-control" name="disetujui_oleh" value="<?php echo $data_evaluasi->data[0]->disetujui_oleh ?>">
                                </div>
                                <div class="form-group">
                                    <label>Status Evaluasi</label>
                                    <select class="form-control" name="status_evaluasi" id="">
                                        <option value="<?php echo $data_evaluasi->data[0]->status_evaluasi ?>" selected>
                                            <?php echo $data_evaluasi->data[0]->status_evaluasi ?>
                                        </option>
                                        <option value="diproses">diproses</option>
                                        <option value="diterima">diterima</option>
                                        <option value="ditolak">ditolak</option>
                                        <option value="perlu perbaikan">perlu perbaikan</option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
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