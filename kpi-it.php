<?php
require_once 'header.php';

$id_krywn = $_GET['id'];
$link = "getKaryawanById&id_karyawan=" . urlencode($id_krywn);
$data_karyawan = getRegistran($link);
// $status = $data_karyawan->data[0]->status_karyawan;
var_dump($data_karyawan);

$link = "getDivisi";
$data_divisi = getRegistran($link);
$id_divisi = $data_divisi->data[0]->id_divisi;
$nama_divisi1 = isset($data_divisi->data[0]->nama_divisi) ? $data_divisi->data[0]->nama_divisi : '';
$nama_divisi2 = isset($data_divisi->data[1]->nama_divisi) ? $data_divisi->data[1]->nama_divisi : '';
$nama_divisi3 = isset($data_divisi->data[2]->nama_divisi) ? $data_divisi->data[2]->nama_divisi : '';
$nama_divisi4 = isset($data_divisi->data[3]->nama_divisi) ? $data_divisi->data[3]->nama_divisi : '';
$nama_divisi5 = isset($data_divisi->data[4]->nama_divisi) ? $data_divisi->data[4]->nama_divisi : '';
$nama_divisi6 = isset($data_divisi->data[5]->nama_divisi) ? $data_divisi->data[5]->nama_divisi : '';
$nama_divisi7 = isset($data_divisi->data[6]->nama_divisi) ? $data_divisi->data[6]->nama_divisi : '';
$nama_divisi8 = isset($data_divisi->data[7]->nama_divisi) ? $data_divisi->data[7]->nama_divisi : '';
$nama_divisi9 = isset($data_divisi->data[8]->nama_divisi) ? $data_divisi->data[8]->nama_divisi : '';

?>

<?php
if ($data_karyawan->data[0]->id_divisi == $id_divisi) { ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>KEY PERFORMANCE INDEX ( KPI ) <?php echo $data_karyawan->data[0]->nama_divisi ?></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">User Profile</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <?php
                                if (isset($_POST['submit'])) {
                                    $id_karyawan = $_POST['id_karyawan'];
                                    $id_user = $_POST['id_user'];
                                    $id_divisi = $_POST['id_divisi'];
                                    $nama_lengkap = $_POST['nama_lengkap'];
                                    $mulai_kerja = $_POST['mulai_kerja'];
                                    $indikator1 = $_POST['indikator1'];
                                    $indikator2 = $_POST['indikator2'];
                                    $indikator3 = $_POST['indikator3'];
                                    $indikator4 = $_POST['indikator4'];
                                    $indikator5 = $_POST['indikator5'];
                                    $indikator6 = $_POST['indikator6'];
                                    $indikator7 = $_POST['indikator7'];
                                    $indikator8 = $_POST['indikator8'];
                                    $indikator9 = $_POST['indikator9'];
                                    $indikator10 = $_POST['indikator10'];
                                    $indikator11 = $_POST['indikator11'];
                                    $indikator12 = $_POST['indikator12'];
                                    $total = $_POST['total'];
                                    $komentar = $_POST['komentar'];

                                    $link = "setKPI_it&id_karyawan=" . urlencode($id_karyawan) . "&id_user=" . urlencode($id_user) . "&id_divisi=" . urlencode($id_divisi) .  "&nama_lengkap=" . urlencode($nama_lengkap) . "&mulai_kerja=" . urlencode($mulai_kerja) . "&indikator1=" . urlencode($indikator1) . "&indikator2=" . urlencode($indikator2) . "&indikator3=" . urlencode($indikator3) . "&indikator4=" . urlencode($indikator4) . "&indikator5=" . urlencode($indikator5) . "&indikator6=" . urlencode($indikator6) . "&indikator7=" . urlencode($indikator7) . "&indikator8=" . urlencode($indikator8) . "&indikator9=" . urlencode($indikator9) . "&indikator10=" . urlencode($indikator10) . "&indikator11=" . urlencode($indikator11) . "&indikator12=" . urlencode($indikator12) . "&total=" . urlencode($total) . "&komentar=" . urlencode($komentar);
                                    $data_kpi = getRegistran($link);
                                    echo "<script>alert('Data Berhasil Disimpan')</script>";
                                    echo ("<script>location.href = 'kpi_admin.php';</script>");
                                }
                                ?>
                                <form method="post">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-2">
                                                <label>Nama Lengkap</label>
                                                <input type="hidden" class="form-control" name="id_karyawan" value="<?= $data_karyawan->data[0]->id_karyawan ?>">
                                                <input type="text" class="form-control" name="nama_lengkap" value="<?= $data_karyawan->data[0]->nama_lengkap ?>">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-2">
                                                <label>Tanggal Masuk Kerja</label>
                                                <input type="text" class="form-control" name="mulai_kerja" value="<?= $data_karyawan->data[0]->mulai_kerja ?>">
                                                <input type="hidden" class="form-control" name="id_divisi" value="<?= $data_karyawan->data[0]->id_divisi ?>">
                                                <input type="hidden" class="form-control" name="id_user" value="<?= $data_karyawan->data[0]->id_user ?>">
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
                                                <td><input type="text" name="indikator1" class="form-control nilai-input"></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>BEKERJA BERDASARKAN SOP</td>
                                                <td><input type="text" name="indikator2" class="form-control nilai-input"></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>MENJELASKAN DENGAN BAIK DAN MUDAH DIMENGERTI</td>
                                                <td><input type="text" name="indikator3" class="form-control nilai-input"></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>MAMPU MENERIMA & MENJALANKAN INSTRUKSI DENGAN BAIK</td>
                                                <td><input type="text" name="indikator4" class="form-control nilai-input"></td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>TEAM WORK / BEKERJA SECARA MANDIRI</td>
                                                <td><input type="text" name="indikator5" class="form-control nilai-input"></td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>MEMPERHATIKAN HAL - HAL SECARA DETAIL</td>
                                                <td><input type="text" name="indikator6" class="form-control nilai-input"></td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>PENYELESAIAN MASALAH DALAM HAL IT DI MAHARIS GROUP</td>
                                                <td><input type="text" name="indikator7" class="form-control nilai-input"></td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td>LAPORAN HASIL PEKERJAAN IT PER HARINYA</td>
                                                <td><input type="text" name="indikator8" class="form-control nilai-input"></td>
                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td>PENCATATAN HARDWARE & SOFTWARE DI SERVER MAHARIS GROUP</td>
                                                <td><input type="text" name="indikator9" class="form-control nilai-input"></td>
                                            </tr>
                                            <tr>
                                                <td>10</td>
                                                <td>MEMASTIKAN HARDWARE, SOFTWARE, & INTERNET BERJALAN DENGAN EFEKTIF DAN STABIL</td>
                                                <td><input type="text" name="indikator10" class="form-control nilai-input"></td>
                                            </tr>
                                            <tr>
                                                <td>11</td>
                                                <td>KECEPATAN MENINDAKLANJUTI PEKERJAAN IT YANG BELUM TERSELESAIKAN</td>
                                                <td><input type="text" name="indikator11" class="form-control nilai-input"></td>
                                            </tr>
                                            <tr>
                                                <td>12</td>
                                                <td>PRODUKTIVITAS DALAM BEKERJA</td>
                                                <td><input type="text" name="indikator12" class="form-control nilai-input"></td>
                                            </tr>
                                            <tr>
                                                <td>13</td>
                                                <td><b>TOTAL NILAI</b></td>
                                                <td><input type="text" name="total" class="form-control total-nilai"></td>
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
                                                <td><textarea name="komentar" class="form-control" cols="30" rows="5"></textarea></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="button">
                                        <div class="row ">
                                            <div class="col d-flex justify-content-end">
                                                <button type="submit" class="btn btn-lg btn-success" name="submit">SIMPAN</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php } elseif ($data_karyawan->data[0]->nama_divisi == $nama_divisi2) { ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h1>KEY PERFORMANCE INDEX ( KPI ) <?php echo $data_karyawan->data[0]->nama_divisi ?></h1>
                            </div>
                            <div class="card-body">
                                <form action="" method="post">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-2">
                                                <label>Nama Lengkap</label>
                                                <input type="hidden" class="form-control" name="id_karyawan" value="<?= $data_karyawan->data[0]->id_karyawan ?>">
                                                <input type="text" class="form-control" name="nama_lengkap" value="<?= $data_karyawan->data[0]->nama_lengkap ?>">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-2">
                                                <label>Tanggal Masuk Kerja</label>
                                                <input type="text" class="form-control" name="mulai_kerja" value="<?= $data_karyawan->data[0]->mulai_kerja ?>">
                                                <input type="hidden" class="form-control" name="id_divisi" value="<?= $data_karyawan->data[0]->id_divisi ?>">
                                                <input type="text" class="form-control" name="id_user" value="<?= $data_karyawan->data[0]->id_user ?>">
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
                                        <tbody></tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php } elseif ($data_karyawan->data[0]->nama_divisi == $nama_divisi3) { ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="alert alert-danger" role="alert">
                                <h1>KEY PERFORMANCE INDEX ( KPI ) <?php echo $data_karyawan->data[0]->nama_divisi ?></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php }
?>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
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
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>

</html>