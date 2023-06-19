<?php
require_once 'header-kordinator.php';

$id_pinjam = $_GET['id'];

$link = "getDivisi";
$data_divisi = getRegistran($link);

$link = "getPinjamKaryawanEdit&id_pinjam=" . urlencode($id_pinjam);
$data_dinas = getRegistran($link);
var_dump($data_dinas);

// input Karyawan
if (isset($_POST['submit'])) {
    $id_user = $_POST['id_user'];
    $nama = $_POST['nama'];
    $mulai_kerja = $_POST['mulai_kerja'];
    $pinjaman_terakhir = $_POST['pinjaman_terakhir'];
    $pelunasan_terakhir = $_POST['pelunasan_terakhir'];
    $nik = $_POST['nik'];
    $jabatan = $_POST['jabatan'];
    $gaji_terakhir = $_POST['gaji_terakhir'];
    $nilai_loan = $_POST['nilai_loan'];
    $keperluan = $_POST['keperluan'];
    $pelunasan = $_POST['pelunasan'];
    $pemohon = $_POST['pemohon'];
    $status = $_POST['status'];

    $link = "setUpdatePinjam&id_user=" . urlencode($id_user) . "&nama=" . urlencode($nama) . "&mulai_kerja=" . urlencode($mulai_kerja) . '&pinjaman_terakhir=' . urlencode($pinjaman_terakhir) . '&pelunasan_terakhir=' . urlencode($pelunasan_terakhir) . '&nik=' . urlencode($nik) . '&jabatan=' . urlencode($jabatan) . '&gaji_terakhir=' . urlencode($gaji_terakhir) . '&nilai_loan=' . urlencode($nilai_loan) . '&keperluan=' . urlencode($keperluan) . '&pelunasan=' . urlencode($pelunasan) . '&pemohon=' . urlencode($pemohon) . "&status=" . urlencode($status) . '&type=insert';
    $data = getRegistran($link);
    var_dump($data);
    if ($data) {
        echo "<script>alert('Data berhasil diUPDATE')</script>";
        echo ("<script>location.href = 'peminjaman-karyawan-kor.php';</script>");
    } else {
        echo "<script>alert('Data gagal diUPDATE')</script>";
        echo ("<script>location.href = 'peminjaman-karyawan-kor-edit.php';</script>");
    }
}

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ubah Peminjaman Karyawan</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Ubah Peminjaman</h3>
                </div>
                <!-- /.card-header -->
                <form method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Karyawan</label>
                                    <input type="text" name="id_user" value="<?= $id_user ?>">
                                    <input type="text" class="form-control" name="nama" value="<?php echo $data_dinas->data[0]->nama; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Mulai Kerja</label>
                                    <input type="date" class="form-control" name="mulai_kerja" value="<?php echo $data_dinas->data[0]->mulai_kerja; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Pinjaman Terakhir</label>
                                    <input type="date" class="form-control" name="pinjaman_terakhir" value="<?php echo $data_dinas->data[0]->pinjaman_terakhir; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Pelunasan terakhir</label>
                                    <input type="date" class="form-control" name="pelunasan_terakhir" value="<?php echo $data_dinas->data[0]->pelunasan_terakhir; ?>">
                                </div>
                                <div class="form-group">
                                    <label>NIK</label>
                                    <input type="text" class="form-control" name="nik" value="<?php echo $data_dinas->data[0]->nik; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Jabatan</label>
                                    <input class="form-control" name="jabatan" value="<?php echo $data_dinas->data[0]->jabatan; ?>"></input>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Gaji Terakhir</label>
                                    <input type="text" class="form-control" name="gaji_terakhir" value="<?php echo $data_dinas->data[0]->gaji_terakhir ?>">
                                </div>
                                <div class="form-group">
                                    <label>Nilai Loan</label>
                                    <input type="text" class="form-control" name="nilai_loan" value="<?php echo $data_dinas->data[0]->nilai_loan ?>">
                                </div>
                                <div class="form-group">
                                    <label>Keperluan</label>
                                    <input type="text" class="form-control" name="keperluan" value="<?php echo $data_dinas->data[0]->keperluan ?>">
                                </div>
                                <div class="form-group">
                                    <label>Pelunasan</label>
                                    <input type="text" class="form-control" name="pelunasan" value="<?php echo $data_dinas->data[0]->pelunasan ?>">
                                </div>
                                <div class="form-group">
                                    <label>Pemohon</label>
                                    <input type="text" class="form-control" name="pemohon" value="<?php echo $nama ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="status" value="diproses">
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