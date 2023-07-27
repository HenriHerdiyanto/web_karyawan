<?php
require_once 'header.php';

$id_dinas = $_GET['id'];

$link = "getDivisi";
$data_divisi = getRegistran($link);

$link = "getDinasId&id_dinas=" . urlencode($id_dinas);
$data_dinas = getRegistran($link);

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
    $cash = $_POST['cash'];
    $cash_advance = $_POST['cash_advance'];
    $keterangan = $_POST['keterangan'];
    $diminta_oleh = $_POST['diminta_oleh'];
    $diketahui_oleh = $_POST['diketahui_oleh'];
    $disetujui_oleh = $_POST['disetujui_oleh'];
    $status = $_POST['status'];

    $link = "setUpdateDinasAdmin&id_user=" . urlencode($id_user) . "&id_divisi=" . urlencode($id_divisi) . "&nama_pengajuan=" . urlencode($nama_pengajuan) . '&jabatan=' . urlencode($jabatan) . '&project=' . urlencode($project) . '&tujuan=' . urlencode($tujuan) . '&jumlah_personel=' . urlencode($jumlah_personel) . '&nama_personel=' . urlencode($nama_personel) . '&kota_tujuan=' . urlencode($kota_tujuan) . '&tanggal_berangkat=' . urlencode($tanggal_berangkat) . '&waktu_berangkat=' . urlencode($waktu_berangkat) . '&kota_pulang=' . urlencode($kota_pulang) . '&tanggal_pulang=' . urlencode($tanggal_pulang) . '&transportasi=' . urlencode($transportasi) . '&hotel=' . urlencode($hotel) . '&bagasi=' . urlencode($bagasi) . '&cash=' . urlencode($cash) . '&cash_advance=' . urlencode($cash_advance) . '&keterangan=' . urlencode($keterangan)  . '&diminta_oleh=' . urlencode($diminta_oleh)  . '&diketahui_oleh=' . urlencode($diketahui_oleh)  . '&disetujui_oleh=' . urlencode($disetujui_oleh)  . '&status=' . urlencode($status)  . '&type=insert';
    $data = getRegistran($link);
    var_dump($data);
    if ($data) {
        echo "<script>alert('Data berhasil diUPDATE')</script>";
        echo ("<script>location.href = 'perjalanan_dinas.php';</script>");
    } else {
        echo "<script>alert('Data gagal diUPDATE')</script>";
        echo ("<script>location.href = 'perjalanan_dinas-edit.php';</script>");
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
                                    <label for="">Divisi</label>
                                    <input type="hidden" name="id_user" value="<?php echo $data_dinas->data[0]->id_user; ?>">
                                    <select class="form-control" name="id_divisi" readonly>
                                        <?php foreach ($data_divisi->data as $key => $value) : ?>
                                            <option value="<?php echo $value->id_divisi; ?>" <?php if ($value->id_divisi == $data_dinas->data[0]->id_divisi) {
                                                                                                    echo 'selected';
                                                                                                } ?>><?php echo $value->nama_divisi; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama yang mengajukan</label>
                                    <input type="text" class="form-control" name="nama_pengajuan" value="<?php echo $data_dinas->data[0]->nama_pengajuan; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Jabatan</label>
                                    <input type="text" class="form-control" name="jabatan" value="<?php echo $data_dinas->data[0]->jabatan; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Project yang dilakukan</label>
                                    <input type="text" class="form-control" name="project" value="<?php echo $data_dinas->data[0]->project; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Maksud dan tujuan</label>
                                    <input type="text" class="form-control" name="tujuan" value="<?php echo $data_dinas->data[0]->tujuan; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Personel</label>
                                    <input type="number" class="form-control" name="jumlah_personel" value="<?php echo $data_dinas->data[0]->jumlah_personel; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Kota Tujuan</label>
                                    <input type="text" class="form-control" name="kota_tujuan" value="<?php echo $data_dinas->data[0]->kota_tujuan ?>">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Berangkat</label>
                                    <input type="date" class="form-control" name="tanggal_berangkat" value="<?php echo $data_dinas->data[0]->tanggal_berangkat ?>">
                                </div>
                                <div class="form-group">
                                    <label>Nama Personel</label>
                                    <textarea class="form-control" name="nama_personel" id="" cols="30" rows="5"><?php echo $data_dinas->data[0]->nama_personel; ?></textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Jenis Perjalanan</label>
                                    <select class="form-control" name="jenis_perjalanan">
                                        <option selected><?php echo $data_dinas->data[0]->jenis_perjalanan ?></option>
                                        <option value="Perjalanan Luar Kota">Perjalanan Luar Kota</option>
                                        <option value="Perjalanan Dalam Kota">Perjalanan Dalam Kota</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Total Lama Perjalanan ( Satuan Hari )</label>
                                    <input type="number" class="form-control" id="waktu_berangkat" name="waktu_berangkat" value="<?php echo $data_dinas->data[0]->waktu_berangkat ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Kota Pulang</label>
                                    <input type="text" class="form-control" name="kota_pulang" value="<?php echo $data_dinas->data[0]->kota_pulang ?>">
                                </div>
                                <div class="form-group">
                                    <label>tanggal Pulang</label>
                                    <input type="date" class="form-control" name="tanggal_pulang" value="<?php echo $data_dinas->data[0]->tanggal_pulang ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Transportasi</label>
                                    <select class="form-control" name="transportasi">
                                        <option selected><?php echo $data_dinas->data[0]->transportasi ?></option>
                                        <option value="Disiapkan user">Disiapkan user</option>
                                        <option value="Disiapkan perusahaan">Disiapkan perusahaan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Hotel / Tempat tinggal</label>
                                    <select class="form-control" name="hotel">
                                        <option selected><?php echo $data_dinas->data[0]->hotel ?></option>
                                        <option value="Disiapkan user">Disiapkan user</option>
                                        <option value="Disiapkan perusahaan">Disiapkan perusahaan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Bagasi</label>
                                    <input type="text" class="form-control" name="bagasi" value="<?php echo $data_dinas->data[0]->bagasi ?>">
                                </div>
                                <div class="form-group">
                                    <label>cash advance ( / Hari )</label>
                                    <input type="number" class="form-control" id="cash" name="cash" value="<?php echo $data_dinas->data[0]->cash ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Cash Advance</label>
                                    <input type="text" class="form-control" name="cash_advance" value="<?php echo $data_dinas->data[0]->cash_advance ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <textarea class="form-control" name="keterangan" id="" cols="30" rows="5"><?php echo $data_dinas->data[0]->keterangan; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="status" value="diproses">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Diminta Oleh</label>
                                    <input type="text" class="form-control" name="diminta_oleh" value="<?php echo $data_dinas->data[0]->nama_pengajuan; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Diketahui Oleh</label>
                                    <input type="text" class="form-control" name="diketahui_oleh" value="<?php echo $data_dinas->data[0]->diketahui_oleh ?>">
                                </div>
                                <div class="form-group">
                                    <label>Disetujui Oleh</label>
                                    <input type="text" class="form-control" name="disetujui_oleh" value="<?php echo $data_dinas->data[0]->disetujui_oleh ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <select class="form-control" name="status">
                                        <option selected><?php echo $data_dinas->data[0]->status ?></option>
                                        <option value="diterima">diterima</option>
                                        <option value="ditolak">ditolak</option>
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
<script>
    // Ambil referensi ke elemen input waktu_berangkat dan cash
    const waktuBerangkatInput = document.getElementById('waktu_berangkat');
    const cashInput = document.getElementById('cash');

    // Fungsi untuk mengupdate hasil perkalian
    function updateCashAdvance() {
        // Ambil nilai dari input waktu_berangkat dan cash
        const waktuBerangkat = waktuBerangkatInput.value;
        const cash = cashInput.value;

        // Lakukan perkalian
        const cashAdvance = waktuBerangkat * cash;

        // Masukkan hasil perkalian ke dalam input cash_advance
        const cashAdvanceInput = document.querySelector('input[name="cash_advance"]');
        cashAdvanceInput.value = cashAdvance;
    }

    // Panggil fungsi updateCashAdvance() ketika input waktu_berangkat atau cash berubah
    waktuBerangkatInput.addEventListener('input', updateCashAdvance);
    cashInput.addEventListener('input', updateCashAdvance);
</script>
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