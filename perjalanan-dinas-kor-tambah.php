<?php
require_once 'header-kordinator.php';

$link = "getDivisi";
$data_divisi = getRegistran($link);

// input Karyawan
if (isset($_POST['submit'])) {
    $id_user = $_POST['id_user'];
    $id_divisi = $_POST['id_divisi'];
    $nama_pengajuan = $_POST['nama_pengajuan'];
    $jabatan = $_POST['jabatan'];
    $project = $_POST['project'];
    $tujuan = $_POST['tujuan'];
    $jumlah_personel = $_POST['jumlah_personel'];
    $nama_personel = $_POST['nama_personel'];
    $kota_tujuan = $_POST['kota_tujuan'];
    $tanggal_berangkat = $_POST['tanggal_berangkat'];
    $waktu_berangkat = $_POST['waktu_berangkat'];
    $kota_pulang = $_POST['kota_pulang'];
    $tanggal_pulang = $_POST['tanggal_pulang'];
    $transportasi = $_POST['transportasi'];
    $hotel = $_POST['hotel'];
    $bagasi = $_POST['bagasi'];
    $cash_advance = $_POST['cash_advance'];
    $keterangan = $_POST['keterangan'];
    $diminta_oleh = $_POST['diminta_oleh'];
    $diketahui_oleh = $_POST['diketahui_oleh'];
    $disetujui_oleh = $_POST['disetujui_oleh'];
    $status = $_POST['status'];


    $link = "setPerjalanan&id_user=" . urlencode($id_user) . "&id_divisi=" . urlencode($id_divisi) . "&nama_pengajuan=" . urlencode($nama_pengajuan) . '&jabatan=' . urlencode($jabatan) . '&project=' . urlencode($project) . '&tujuan=' . urlencode($tujuan) . '&jumlah_personel=' . urlencode($jumlah_personel) . '&nama_personel=' . urlencode($nama_personel) . '&kota_tujuan=' . urlencode($kota_tujuan) . '&tanggal_berangkat=' . urlencode($tanggal_berangkat) . '&waktu_berangkat=' . urlencode($waktu_berangkat) . '&kota_pulang=' . urlencode($kota_pulang) . '&tanggal_pulang=' . urlencode($tanggal_pulang) . '&transportasi=' . urlencode($transportasi) . '&hotel=' . urlencode($hotel) . '&bagasi=' . urlencode($bagasi) . '&cash_advance=' . urlencode($cash_advance) . '&keterangan=' . urlencode($keterangan) . '&diminta_oleh=' . urlencode($diminta_oleh) . '&diketahui_oleh=' . urlencode($diketahui_oleh) . '&disetujui_oleh=' . urlencode($disetujui_oleh) . "&status=" . urlencode($status) . '&type=insert';
    $data = getRegistran($link);
    var_dump($data);
    echo "<script>alert('PENGAJUAN PERJALANAN DINAS BERHASIL')</script>";
    echo ("<script>location.href = 'perjalanan-dinas-kor.php';</script>");
}

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>PERJALANAN DINAS</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Pengajuan Surat perjalanan dinas</h3>
                </div>
                <!-- /.card-header -->
                <form method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Divisi</label>
                                    <input type="text" name="id_user" value="<?= $id_user ?>">
                                    <select class="form-control" name="id_divisi">
                                        <option selected>--Pilih Divisi--</option>
                                        <?php foreach ($data_divisi->data as $key => $value) { ?>
                                            <option value="<?php echo $value->id_divisi ?>"><?php echo $value->nama_divisi ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama Yang Mengajukan Surat</label>
                                    <input type="text" class="form-control" name="nama_pengajuan" value="<?= $nama ?>">
                                </div>
                                <div class="form-group">
                                    <label>Jabatan</label>
                                    <?php
                                    if ($level_user == 1) {
                                        $level_user = "Manager";
                                    }
                                    ?>
                                    <input type="text" class="form-control" name="jabatan" value="<?php echo $level_user ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Project yang dilakukan</label>
                                    <input type="text" class="form-control" name="project">
                                </div>
                                <div class="form-group">
                                    <label>Maksud dan tujuan</label>
                                    <input type="text" class="form-control" name="tujuan">
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Personel</label>
                                    <input type="number" class="form-control" name="jumlah_personel">
                                </div>
                                <div class="form-group">
                                    <label>Nama Personel</label>
                                    <textarea name="nama_personel" class="form-control" id="" cols="30" rows="5"></textarea>
                                    <!-- <input type="text" class="form-control" name="jumlah"> -->
                                </div>
                                <div class="form-group">
                                    <label>Kota Tujuan</label>
                                    <input type="text" class="form-control" name="kota_tujuan">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Berangkat</label>
                                    <input type="date" class="form-control" name="tanggal_berangkat">
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Waktu Berangkat</label>
                                    <input type="text" class="form-control" name="waktu_berangkat">
                                </div>
                                <div class="form-group">
                                    <label>Kota Pulang</label>
                                    <input type="text" class="form-control" name="kota_pulang">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal pulang</label>
                                    <input type="date" class="form-control" name="tanggal_pulang">
                                </div>
                                <div class="form-group">
                                    <label for="">Transportasi</label>
                                    <select class="form-control" name="transportasi">
                                        <option selected>--Pilih--</option>
                                        <option value="Disiapkan user">Disiapkan user</option>
                                        <option value="Disiapkan perusahaan">Disiapkan perusahaan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Hotel / tempat tinggal</label>
                                    <select class="form-control" name="hotel">
                                        <option selected>--Pilih--</option>
                                        <option value="Disiapkan user">Disiapkan user</option>
                                        <option value="Disiapkan perusahaan">Disiapkan perusahaan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Bagasi</label>
                                    <input type="text" class="form-control" name="bagasi">
                                </div>
                                <div class="form-group">
                                    <label>cash advance</label>
                                    <input type="text" class="form-control" name="cash_advance">
                                </div>
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <textarea name="keterangan" class="form-control" id="" cols="30" rows="5"></textarea>
                                </div>
                                <div class="form-group">
                                    <!-- <label>Di Minta Oleh</label> -->
                                    <input type="hidden" class="form-control" name="diminta_oleh">
                                </div>
                                <div class="form-group">
                                    <!-- <label>Di Ketahui Oleh</label> -->
                                    <input type="hidden" class="form-control" name="diketahui_oleh">
                                </div>
                                <div class="form-group">
                                    <!-- <label>Di Setujui Oleh</label> -->
                                    <input type="hidden" class="form-control" name="disetujui_oleh">
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