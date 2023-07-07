<?php
require_once 'header.php';

$id_krywn = $_GET['id'];

$link = "getDivisi";
$data_divisi = getRegistran($link);

$link = "getKaryawanById&id_karyawan=" . urlencode($id_krywn);
$data_karyawan = getRegistran($link);
$status = $data_karyawan->data[0]->status_karyawan;
var_dump($data_karyawan);

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>KEY PERFORMANCE INDEX ( KPI )</h1>
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
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <form method="post">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-2">
                                            <label>Nama Lengkap</label>
                                            <input type="text" class="form-control" name="id_karyawan" value="<?= $data_karyawan->data[0]->nama_lengkap ?>">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-2">
                                            <label>Tanggal Masuk Kerja</label>
                                            <input type="text" class="form-control" name="id_karyawan" value="<?= $data_karyawan->data[0]->mulai_kerja ?>">
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
                                            <td><input type="text" name="" class="form-control nilai-input"></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>BEKERJA BERDASARKAN SOP</td>
                                            <td><input type="text" name="" class="form-control nilai-input"></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>MENJELASKAN DENGAN BAIK DAN MUDAH DIMENGERTI</td>
                                            <td><input type="text" name="" class="form-control nilai-input"></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>MAMPU MENERIMA & MENJALANKAN INSTRUKSI DENGAN BAIK</td>
                                            <td><input type="text" name="" class="form-control nilai-input"></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>TEAM WORK / BEKERJA SECARA MANDIRI</td>
                                            <td><input type="text" name="" class="form-control nilai-input"></td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>MEMPERHATIKAN HAL - HAL SECARA DETAIL</td>
                                            <td><input type="text" name="" class="form-control nilai-input"></td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>PENYELESAIAN MASALAH DALAM HAL IT DI MAHARIS GROUP</td>
                                            <td><input type="text" name="" class="form-control nilai-input"></td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td>LAPORAN HASIL PEKERJAAN IT PER HARINYA</td>
                                            <td><input type="text" name="" class="form-control nilai-input"></td>
                                        </tr>
                                        <tr>
                                            <td>9</td>
                                            <td>PENCATATAN HARDWARE & SOFTWARE DI SERVER MAHARIS GROUP</td>
                                            <td><input type="text" name="" class="form-control nilai-input"></td>
                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <td>MEMASTIKAN HARDWARE, SOFTWARE, & INTERNET BERJALAN DENGAN EFEKTIF DAN STABIL</td>
                                            <td><input type="text" name="" class="form-control nilai-input"></td>
                                        </tr>
                                        <tr>
                                            <td>11</td>
                                            <td>KECEPATAN MENINDAKLANJUTI PEKERJAAN IT YANG BELUM TERSELESAIKAN</td>
                                            <td><input type="text" name="" class="form-control nilai-input"></td>
                                        </tr>
                                        <tr>
                                            <td>12</td>
                                            <td>PRODUKTIVITAS DALAM BEKERJA</td>
                                            <td><input type="text" name="" class="form-control nilai-input"></td>
                                        </tr>
                                        <tr>
                                            <td>13</td>
                                            <td><b>TOTAL NILAI</b></td>
                                            <td><input type="text" name="" class="form-control total-nilai"></td>
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
                                            <td><textarea name="" class="form-control" cols="30" rows="5"></textarea></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
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