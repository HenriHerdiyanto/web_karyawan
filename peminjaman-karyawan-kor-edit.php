<?php
require_once 'header-kordinator.php';

$id_pinjam = $_GET['id'];

$link = "getDivisi";
$data_divisi = getRegistran($link);

$link = "getPinjamKaryawanEdit&id_pinjam=" . urlencode($id_pinjam);
$data_dinas = getRegistran($link);
var_dump($data_dinas);

// input Karyawan
// if (isset($_POST['submit'])) {
//     $id_pinjam = $_POST['id_pinjam'];
//     $jumlah_bayar = $_POST['jumlah_bayar'];

//     $link = "setUpdatePinjam&id_pinjam=" . urlencode($id_pinjam) . "&jumlah_bayar=" . urlencode($jumlah_bayar);
//     $data = getRegistran($link);
//     var_dump($data);
//     if ($data) {
//         echo "<script>alert('Data berhasil diUPDATE')</script>";
//         echo ("<script>location.href = 'peminjaman-karyawan-kor.php';</script>");
//     } else {
//         echo "<script>alert('Data gagal diUPDATE')</script>";
//         echo ("<script>location.href = 'peminjaman-karyawan-kor-edit.php';</script>");
//     }
// }

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
            <?php
            if (isset($_POST['submit'])) {
                //proses update data karyawan
                $id_pinjam = $_POST['id_pinjam'];
                $id_karyawan = $_POST['id_karyawan'];
                $tanggal_pinjam = $_POST['tanggal_pinjam'];
                $tanggal_bayar = $_POST['tanggal_bayar'];
                $jumlah_bayar = $_POST['jumlah_bayar'];
                $jumlah_bayar_sekarang = $_POST['jumlah_bayar_sekarang'];

                $extensi_izin = array("jpg", "jpeg", "png", "pdf", "gif");
                $size_izin = (20971520000000 / 2);

                $allow_file = true;
                $sumber_file = $_FILES['foto_cicilan']['tmp_name'];
                $target_file = "foto_cicilan/";
                $nama_file = $_FILES['foto_cicilan']['name'];
                $size_file = $_FILES['foto_cicilan']['size'];

                if ($nama_file != "") {
                    if ($size_file > $size_izin) {
                        $error .= "- Ukuran File file tidak Boleh Melebihi 1 MB";
                        $allow_file = false;
                    } else {
                        $getExtensi = explode(".", $nama_file);
                        $extensi_file = strtolower(end($getExtensi));
                        $nama_file = $id_karyawan . "-" . $id_pinjam . "." . $extensi_file;
                        if (!in_array($extensi_file, $extensi_izin) == true) {
                            $error .= " File hanya diperbolehkan dalam bentuk (jpg, jpeg, png, gif)";
                            $allow_ktp = false;
                        }
                    }

                    if ($allow_file) {
                        if (!move_uploaded_file($sumber_file, $target_file . $nama_file)) {
                            $error .= " Gagal Uplaod File file ke server";
                            $error .= $sumber_file . " " . $target_file . $nama_file;
                            $allow_file = false;
                        }
                    }
                }

                //insert tabel history_pinjam
                $link = "setHistoryPinjam&id_pinjam=" . urlencode($id_pinjam) . "&id_karyawan=" . urlencode($id_karyawan) . "&tanggal_pinjam=" . urlencode($tanggal_pinjam) . "&tanggal_bayar=" . urlencode($tanggal_bayar) . "&jumlah_bayar=" . urlencode($jumlah_bayar) . "&foto_cicilan=" . urlencode($nama_file);
                $data = getRegistran($link);
                var_dump($data);
                //update tabel pinjam_karyawan
                $link = "UpdatePinjamKaryawan&id_pinjam=" . urlencode($id_pinjam) . "&jumlah_bayar=" . urlencode($jumlah_bayar) . "&jumlah_bayar_sekarang=" . urlencode($jumlah_bayar_sekarang);
                $data1 = getRegistran($link);
                var_dump($data1);
            }
            ?>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Ubah Peminjaman</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Karyawan</label>
                                    <input type="hidden" name="id_pinjam" value="<?= $id_pinjam ?>">
                                    <input type="text" name="id_karyawan" value="<?= $data_dinas->data[0]->id_karyawan ?>">
                                    <input type="text" class="form-control" name="nama_lengkap" value="<?php echo $data_dinas->data[0]->nama_lengkap; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Mulai Kerja</label>
                                    <input type="date" class="form-control" name="mulai_kerja" value="<?php echo $data_dinas->data[0]->mulai_kerja; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Pinjaman Terakhir</label>
                                    <input type="date" class="form-control" name="tanggal_pinjam" value="<?php echo $data_dinas->data[0]->tanggal_pinjam; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Pelunasan terakhir</label>
                                    <input type="date" class="form-control" name="pelunasan_terakhir" value="<?php echo $data_dinas->data[0]->pelunasan_terakhir; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>NIK</label>
                                    <input type="text" class="form-control" name="nik" value="<?php echo $data_dinas->data[0]->nik; ?>" readonly>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Jabatan</label>
                                    <input class="form-control" name="jabatan" value="<?php echo $data_dinas->data[0]->jabatan; ?>" readonly></input>
                                </div>
                                <div class="form-group">
                                    <label>Gaji Terakhir</label>
                                    <input type="text" class="form-control" name="gaji_terakhir" value="<?php echo number_format($data_dinas->data[0]->gaji) ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Cicilan / Bulan</label>
                                    <input type="text" class="form-control" name="jumlah_cicilan" value="<?php echo number_format($data_dinas->data[0]->jumlah_cicilan) ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Keperluan</label>
                                    <input type="text" class="form-control" name="keperluan" value="<?php echo $data_dinas->data[0]->keperluan ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Pelunasan</label>
                                    <input type="text" class="form-control" name="pelunasan" value="<?php echo $data_dinas->data[0]->pelunasan ?>" readonly>
                                </div>
                                <!-- <div class="form-group">
                                    <label>Pemohon</label>
                                    <input type="text" class="form-control" name="pemohon" value="<?php echo $nama ?>" readonly>
                                </div> -->
                                <!-- <div class="form-group">
                                    <input type="hidden" name="status" value="diproses">
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <h5 class="card-header">Pembayaran</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Jumlah Pinjaman</label>
                                        <!-- <input type="text" name="id_pinjam" value="<?= $data_dinas->data[0]->id_pinjam ?>"> -->
                                        <input type="text" class="form-control" name="jumlah_pinjam" value="<?php echo number_format($data_dinas->data[0]->jumlah_pinjam) ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah Pembayaran Terakhir</label>
                                        <input type="text" id=jumlah_bayar_terakhir class="form-control nilai-input" value="<?php echo $data_dinas->data[0]->jumlah_bayar_sekarang; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal_bayar">Tanggal Bayar</label>
                                        <input type="date" class="form-control" id="tanggal_bayar" name="tanggal_bayar" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Cicilan Sekarang</label>
                                        <input type="text" class="form-control nilai-input" id="cicilan" name="jumlah_bayar" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah Cicilan Sekarang + terakhir bayar</label>
                                        <input type="text" class="form-control total-nilai" id="jumlah_pembayaran" name="jumlah_bayar_sekarang" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Bukti Bayar</label>
                                        <input type="file" class="form-control" name="foto_cicilan" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
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
<!-- script penjumlahan -->
<script>
    // Mendapatkan elemen input nilai
    const nilaiInputs = document.querySelectorAll('.nilai-input');

    // Mendapatkan elemen input total nilai
    const totalNilaiInput = document.querySelector('.total-nilai');

    // Menghitung total nilai
    function hitungTotalNilai() {
        let totalNilai = 0;

        // Meloopi setiap input nilai dan menjumlahkannya
        nilaiInputs.forEach(input => {
            const nilai = parseFloat(input.value) || 0;
            totalNilai += nilai;
        });

        // Mengatur nilai total pada input total nilai
        totalNilaiInput.value = totalNilai;
    }

    // Menjalankan fungsi hitungTotalNilai saat input nilai berubah
    nilaiInputs.forEach(input => {
        input.addEventListener('input', hitungTotalNilai);
    });
</script>
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