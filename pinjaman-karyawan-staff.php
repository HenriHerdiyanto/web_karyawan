<?php
include "header-staff.php";

$link = "getKaryawanstaff&id_karyawan=" . urlencode($id_karyawan);
$output = getRegistran($link);

$link = "gePinjamKaryawan&id_karyawan=" . urlencode($id_karyawan);
$output = getRegistran($link);
var_dump($output);

if ($output !== null && isset($output->data[0]->nik)) {
    $no_ktp = $output->data[0]->nik;
} else {
    $no_ktp = ""; // Atau nilai default lainnya
}

// var_dump($output);

if (isset($_POST['submit'])) {
    $id_karyawan = $_POST['id_karyawan'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $mulai_kerja = $_POST['mulai_kerja'];
    $jumlah_pinjam = $_POST['jumlah_pinjam'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $pelunasan_terakhir = $_POST['pelunasan_terakhir'];
    $nik = $_POST['nik'];
    $level_user = $_POST['level_user'];
    $gaji = $_POST['gaji'];
    $jumlah_cicilan = $_POST['jumlah_cicilan'];
    $keperluan = $_POST['keperluan'];
    $pelunasan = $_POST['pelunasan'];
    $pemohon = $_POST['pemohon'];
    $status = $_POST['status'];

    $link = "setPinjaman&id_karyawan=" . urlencode($id_karyawan) . "&nama_lengkap=" . urlencode($nama_lengkap) . "&mulai_kerja=" . urlencode($mulai_kerja) . "&jumlah_pinjam=" . urlencode($jumlah_pinjam) . "&tanggal_pinjam=" . urlencode($tanggal_pinjam) . "&pelunasan_terakhir=" . urlencode($pelunasan_terakhir) . "&nik=" . urlencode($nik) . "&jabatan=" . urlencode($level_user) . "&gaji=" . urlencode($gaji) . "&jumlah_cicilan=" . urlencode($jumlah_cicilan) . "&keperluan=" . urlencode($keperluan) . "&pelunasan=" . urlencode($pelunasan) . "&pemohon=" . urlencode($pemohon) . "&status=" . urlencode($status);
    $add = getRegistran($link);
    var_dump($add);
    // if (!$add) {
    //     echo "<script>alert('Data berhasil ditambahkan');window.location='karyawan.php'</script>";
    // } else {
    //     echo "<script>alert('Data gagal ditambahkan');window.location='karyawan.php'</script>";
    // }
}

?>

<style>
    /* buatkan css agar posisi label berada rata dikiri */
    label {
        display: inline-block;
        width: 200px;
        margin-right: 100%;
        text-align: justify;
        font-size: medium;
    }

    /* buatkan css agar tinggi layar sesuai content */
    html,
    body {
        height: 100%;
        margin: 0;
        padding: 0;
    }
    
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="row">
                    <div class="col">
                        <h1 class="m-3">PERMOHONAN PEMINJAMAN KARYAWAN</h1>
                    </div>
                    <div align="end" class="col mt-2 mr-3">
                        <!-- <a href="peminjaman-karyawan-kor-tambah.php" class="btn btn-success " type="button">
                            <i class="fas fa-plus"></i> Add Permohonan
                        </a> -->
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            <i class="fas fa-plus"></i> Add Permohonan
                        </button>
                        <!-- Modal -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Permohonan Pijaman Karyawan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                </div>
                <form action="" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-2">
                                    <label for="nama_lengkap">Nama Karyawan</label>
                                    <input type="hidden" class="form-control" name="id_karyawan" value="<?= $id_karyawan ?>" placeholder="Nama Karyawan">
                                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= $nama_user ?>" placeholder="Nama Karyawan">
                                </div>
                                <div class="mb-2">
                                    <label for="mulai_kerja">Mulai Kerja</label>
                                    <input type="date" class="form-control" id="mulai_kerja" name="mulai_kerja" value="<?= $data_lengkap->data[0]->mulai_kerja ?>" placeholder="mulai_kerja">
                                </div>
                                <div class="mb-2">
                                    <label for="jumlah_pinjam">Jumlah Pinjam</label>
                                    <input type="text" class="form-control" id="jumlah_pinjam" name="jumlah_pinjam" placeholder="jangan gunakan titik Contoh: 1000000">
                                </div>
                                <div class="mb-2">
                                    <label for="pelunasan">Jangka Pelunasan ( / Bulan)</label>
                                    <input type="number" class="form-control" id="pelunasan" name="pelunasan" placeholder="berapa bulan">
                                </div>
                                <div class="mb-2">
                                    <label for="jumlah_cicilan">Jumlah Cicilan ( / Bulan )</label>
                                    <input type="text" class="form-control" id="jumlah_cicilan" name="jumlah_cicilan" readonly>
                                </div>
                                <div class="mb-2">
                                    <label for="tanggal_pinjam">Tanggal Pinjam</label>
                                    <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-2">
                                    <label for="pelunasan_terakhir">Tanggal Pelunasan Terakhir</label>
                                    <input type="date" class="form-control" id="pelunasan_terakhir" name="pelunasan_terakhir">
                                </div>
                                <div class="mb-2">
                                    <label for="nik">NIK</label>
                                    <input type="text" class="form-control" id="nik" name="nik" value="<?= $data_lengkap->data[0]->no_ktp ?>" placeholder="NIK">
                                </div>
                                <div class="mb-2">
                                    <label for="level_user">Jabatan</label>
                                    <input type="text" class="form-control" id="level_user" name="level_user" value="<?= $data_lengkap->data[0]->level_user ?>">
                                </div>
                                <div class="mb-2">
                                    <label for="gaji">Gaji Terakhir</label>
                                    <input type="text" class="form-control" id="gaji" name="gaji" value="<?= $data_lengkap->data[0]->gaji ?>">
                                </div>
                                <div class="mb-2">
                                    <label for="keperluan">Keperluan</label>
                                    <input type="text" class="form-control" id="keperluan" name="keperluan" placeholder="Keperluan">
                                </div>
                                <div class="mb-2">
                                    <label for="pemohon">Pemohon</label>
                                    <input type="text" class="form-control" id="pemohon" name="pemohon" value="<?= $data_lengkap->data[0]->nama_lengkap ?>" placeholder="Pemohon">
                                </div>
                                <div class="mb-2">
                                    <!-- <label for="status">Status</label> -->
                                    <input type="hidden" class="form-control" id="status" name="status" value="diproses" placeholder="Status">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary">SUBMIT</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-sm-12">

                    <div class="card">
                        <div class="card-header bg-primary">
                            <h3 class="card-title"><b>History Pembayaran</h3>
                        </div>

                        <div class="card-body">
                            <?php if ($output == NULL) { ?>
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No. </th>
                                                <th>Nama Karyawan</th>
                                                <th>NIK</th>
                                                <th>Jabatan</th>
                                                <th>Keperluan</th>
                                                <th>Tanggal Bayar</th>
                                                <th>Jumlah Bayar</th>
                                                <th>Bukti Bayar</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <td colspan="10" align="center">Tidak ada data</td>
                                        </tbody>
                                    </table>
                                </div>
                            <?php  } else { ?>
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th style="width: 5%; text-align: left;">No.</th>
                                                <th style="width: 15%; text-align: left;">Nama Karyawan</th>
                                                <th style="width: 10%; text-align: left;">Jabatan</th>
                                                <th style="width: 15%; text-align: left;">Keperluan</th>
                                                <th style="width: 10%; text-align: left;">Tanggal Bayar</th>
                                                <th style="width: 10%; text-align: right;">Jumlah Pinjaman</th>
                                                <th style="width: 10%; text-align: right;">Jumlah cicilan</th>
                                                <th style="width: 10%; text-align: left;">Bukti Bayar</th>
                                                <th style="width: 5%; text-align: left;">Status</th>
                                                <th style="width: 10%; text-align: left;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($output->data as $key => $array_item) : ?>
                                                <tr>
                                                    <td style="text-align: left;"><?php echo $key + 1 ?></td>
                                                    <td style="text-align: left;"><?php echo $array_item->nama_lengkap; ?></td>
                                                    <td style="text-align: left;"><?php echo $array_item->jabatan; ?></td>
                                                    <td style="text-align: left;"><?php echo $array_item->keperluan; ?></td>
                                                    <td style="text-align: left;"><?php echo $array_item->tanggal_bayar; ?></td>
                                                    <td style="text-align: right;"><?php echo number_format($array_item->jumlah_pinjam) ?></td>
                                                    <td style="text-align: right;"><?php echo number_format($array_item->jumlah_bayar) ?></td>
                                                    <td style="text-align: left;"><img class="img-fluid" src="foto_cicilan/<?php echo $array_item->foto_cicilan; ?>" alt=""></td>
                                                    <td style="text-align: left;">
                                                        <?php
                                                        $status = $array_item->status;
                                                        if ($status == "diproses") {
                                                            echo '<a class="btn bg-warning text-white">' . $status . '</a>';
                                                        } elseif ($status == "diterima") {
                                                            echo '<a class="btn bg-success text-white">' . $status . '</a>';
                                                        } else {
                                                            echo '<a class="btn bg-danger text-white">' . $status . '</a>';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td style="text-align: left;">
                                                        <?php
                                                        if (isset($_POST['delete'])) {
                                                            $id_pinjam = $_POST['id_pinjam'];
                                                            $link = "getDeletePinjamKaryawan&id_pinjam=" . urlencode($id_pinjam);
                                                            $delete = getRegistran($link);
                                                            if (!$delete) {
                                                                echo "<script>alert('Data berhasil dihapus');window.location='karyawan.php'</script>";
                                                            } else {
                                                                echo "<script>alert('Data gagal dihapus');window.location='karyawan.php'</script>";
                                                            }
                                                        }
                                                        ?>

                                                        <form method="post">
                                                            <a href="peminjaman-karyawan-kor-edit.php?id=<?php echo $array_item->id_pinjam ?>" class="btn-sm btn btn-primary" data-bs-toggle="tooltip" title="bayar">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <input type="hidden" name="id_pinjam" value="<?php echo $array_item->id_pinjam; ?>">
                                                            <button class="btn btn-danger btn-sm m-1" onclick="return confirm('Apakah anda yakin ingin menghapus data?')" type="submit" data-bs-toggle="tooltip" title="Hapus" name="delete">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- script mendapatkan hasil jumlah cicilan id jumlah_pinjam : id pelunasan dan ditampilkan pada id jumlah_cicilan -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const jumlahPinjamInput = document.getElementById('jumlah_pinjam');
        const pelunasanInput = document.getElementById('pelunasan');
        const jumlahCicilanInput = document.getElementById('jumlah_cicilan');

        jumlahPinjamInput.addEventListener('input', calculateCicilan);
        pelunasanInput.addEventListener('input', calculateCicilan);

        function calculateCicilan() {
            const jumlahPinjam = parseFloat(jumlahPinjamInput.value) || 0;
            const pelunasan = parseFloat(pelunasanInput.value) || 0;

            const jumlahCicilan = pelunasan === 0 ? 0 : jumlahPinjam / pelunasan;

            jumlahCicilanInput.value = jumlahCicilan.toFixed();
        }
    });
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
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="dist/js/demo.js"></script> -->
<!-- Page specific script -->
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>