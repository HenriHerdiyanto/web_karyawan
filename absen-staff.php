<?php
include "controller/koneksi.php";
require_once 'header-staff.php';

$link = "getKaryawanById&id_karyawan=" . urlencode($id_karyawan);
$profile = getRegistran($link);
$nama_lengkap = $profile->data[0]->nama_lengkap;
// var_dump($profile);
$link2 = "getSOPid&id_divisi=" . urlencode($id_divisi);
$data_sop = getRegistran($link2);
// var_dump($data_sop);
$link = "getAbsenBaru&id_karyawan=" . urlencode($id_karyawan);
$data = getRegistran($link);
// var_dump($data);

$link = "getAbsenBarukeluar&id_karyawan=" . urlencode($id_karyawan);
$data_absen_keluar = getRegistran($link);
// var_dump($data);

if (isset($_POST['update'])) {
    $id_absen = $_POST['id_absen'];
    $waktu_keluar = $_POST['waktu_keluar'];
    $link = "insertAbsen&id_absen=" . urlencode($id_absen) .  "&waktu_keluar=" . urlencode($waktu_keluar);
    $insert = getRegistran($link);
    var_dump($insert);
    // echo "<script>alert('Absen Keluar Berhasil')</script>";
    // echo "<script>window.location.href='absen-staff.php'</script>";
}

if (isset($_POST['submit'])) {
    $id_karyawan = $_POST['id_karyawan'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $tanggal = $_POST['tanggal'];
    $waktu_masuk = $_POST['waktu_masuk'];
    $terlambat = $_POST['terlambat'];
    $barcode = $_POST['barcode'];
    // jika waktu masuk lebih dari jam 08:15:00
    if ($waktu_masuk > '08:15:00') {
        $terlambat = '1';
    } else {
        $terlambat = '0';
    }
    $link = "insertAbsen&id_karyawan=" . urlencode($id_karyawan) . "&nama_lengkap=" . urlencode($nama_lengkap) . "&tanggal=" . urlencode($tanggal) . "&waktu_masuk=" . urlencode($waktu_masuk) . "&barcode=" . urlencode($barcode) . "&terlambat=" . urlencode($terlambat);
    $insert = getRegistran($link);
    // var_dump($insert);
    echo "<script>alert('Absen Masuk Berhasil')</script>";
    echo "<script>window.location.href='absen-staff.php'</script>";
}

if (isset($_POST['izin'])) {
    $id_karyawan = $_POST['id_karyawan'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $tanggal = $_POST['tanggal'];
    $izin = $_POST['izin'];
    $keterangan = $_POST['keterangan'];
    $link = "setIzinSakit&id_karyawan=" . urlencode($id_karyawan) . "&nama_lengkap=" . urlencode($nama_lengkap) . "&tanggal=" . urlencode($tanggal) . "&izin=1" . "&keterangan=" . urlencode($keterangan);
    $insert = getRegistran($link);
    echo "<script>alert('Izin Berhasil')</script>";
    echo "<script>window.location.href='absen-staff.php'</script>";
}

if (isset($_POST['sakit'])) {
    $id_karyawan = $_POST['id_karyawan'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $tanggal = $_POST['tanggal'];
    $sakit = $_POST['sakit'];
    $keterangan = $_POST['keterangan'];
    $link = "setIzinSakit&id_karyawan=" . urlencode($id_karyawan) . "&nama_lengkap=" . urlencode($nama_lengkap) . "&tanggal=" . urlencode($tanggal) . "&sakit=1" . "&keterangan=" . urlencode($keterangan);
    $insert = getRegistran($link);
    echo "<script>alert('Sakit Berhasil diajukan')</script>";
    echo "<script>window.location.href='absen-staff.php'</script>";
}
?>
<style>
    /* buatkan css agar posisi label berada rata dikiri */
    label {
        display: inline-block;
        width: 200px;
        margin-right: 100%;
        text-align: justify;

    }
</style>
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>Absen Masuk</h3>
                            <p>Absen saya</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-albums"></i>
                        </div>
                        <!-- Button trigger modal -->
                        <a type="button" class="small-box-footer" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Check In
                        </a>
                        <!-- <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                    </div>
                </div>
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="text-center">Absensi Masuk Karyawan</h1>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">X</button>
                            </div>
                            <div class="modal-body">
                                <form method="POST">
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-12">
                                            <div class="mb-2">
                                                <label for="namaInput">Nama:</label>
                                                <input class="form-control" type="hidden" name="id_karyawan" value="<?= $id_karyawan ?>">
                                                <input class="form-control" type="text" value="<?= $nama_lengkap ?>" name="nama_lengkap" id="namaInput" required readonly>
                                            </div>
                                            <div class="mb-2">
                                                <label for="tanggalInput">Tanggal:</label>
                                                <input class="form-control" type="date" id="tanggalInput" name="tanggal" required readonly>
                                            </div>
                                            <div class="mb-2">
                                                <label for="waktuInput">Waktu:</label>
                                                <input class="form-control" type="time" id="waktuInput" name="waktu_masuk" required readonly>
                                            </div>
                                            <div class="mb-2">
                                                <input type="hidden" name="terlambat">
                                            </div>
                                            <div class="mb-2">
                                                <input type="button" id="generateBtn" class="btn btn-success w-100" value="Generate Barcode" onclick="generateBarcode()">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <div class="mb-2">
                                                <label for="barcodeInput">Code Barcode:</label>
                                                <input class="form-control" type="hidden" id="barcodeInput" name="barcode" readonly>
                                            </div>
                                            <canvas id="barcodeCanvas" style="display: none;"></canvas>
                                            <img class="img-fluid" id="barcodeImage" src="">
                                            <div class="mb-2">
                                                <input type="submit" id="submitBtn" name="submit" value="Submit" class="btn btn-primary w-100">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>Absen Keluar</h3>
                            <p>Absen saya</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-copy"></i>
                        </div>
                        <!-- Button trigger modal -->
                        <a type="button" class="small-box-footer" data-bs-toggle="modal" data-bs-target="#absenkeluar">
                            Check Out
                        </a>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="absenkeluar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Absen Keluar</h1>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">X</button>
                            </div>
                            <div class="modal-body">
                                <form method="POST">
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-12">
                                            <div class="mb-2">
                                                <label for="namaInput">Nama:</label>
                                                <input class="form-control" type="hidden" name="id_absen" value="<?= $data_absen_keluar->data[0]->id_absen ?>">
                                                <input class="form-control" type="text" value="<?= $nama_lengkap ?>" name="nama_lengkap" id="namaInput" required readonly>
                                            </div>
                                            <div class="mb-2">
                                                <label for="tanggalInput1">Tanggal:</label>
                                                <input class="form-control" type="date" id="tanggalInput1" name="tanggal" required readonly>
                                            </div>
                                            <div class="mb-2">
                                                <label for="waktuInput1">Waktu Keluar:</label>
                                                <input class="form-control" type="time" id="waktuInput1" name="waktu_keluar" required readonly>
                                            </div>
                                            <div class="mb-2">
                                                <input type="button" id="generateBtn1" class="btn btn-success w-100" value="Generate Barcode" onclick="generateBarcode1()">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <div class="mb-2">
                                                <label for="barcodeInput1">Barcode:</label>
                                                <input class="form-control" type="hidden" id="barcodeInput1" name="barcode" readonly>
                                                <canvas id="barcodeCanvas1" style="display: none;"></canvas>
                                                <img class="img-fluid" id="barcodeImage1" src="">
                                                <input type="submit" id="submitBtn1" name="update" value="Submit" class="btn btn-primary w-100">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>IZIN</h3>
                            <p>Jumlah Karyawan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-locked"></i>
                        </div>
                        <!-- Button trigger modal -->
                        <a type="button" class="small-box-footer" data-bs-toggle="modal" data-bs-target="#izin">
                            Check Now
                        </a>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="izin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Form IZIN</h1>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">X</button>
                            </div>
                            <form method="POST">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-12">
                                            <div class="mb-2">
                                                <label for="namaInput">Nama:</label>
                                                <input class="form-control" type="hidden" name="id_karyawan" value="<?= $id_karyawan ?>">
                                                <input class="form-control" type="text" value="<?= $nama_lengkap ?>" name="nama_lengkap" id="namaInput" required readonly>
                                            </div>
                                            <div class="mb-2">
                                                <label for="tanggalInput1">Tanggal:</label>
                                                <input class="form-control" type="date" name="tanggal" required>
                                            </div>
                                            <div class="mb-2">
                                                <input type="hidden" value="1" name="izin">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <div class="mb-2">
                                                <label for="keterangan">Alasan IZIN:</label>
                                                <textarea class="form-control" name="keterangan" placeholder="apa alasan izin anda" id="keterangan" cols="30" rows="10" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="izin" class="btn btn-primary">SUBMIT</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>Sakit</h3>
                            <p>Jumlah Divisi</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-stalker"></i>
                        </div>
                        <a type="button" class="small-box-footer" data-bs-toggle="modal" data-bs-target="#sakit">
                            Check Now
                        </a>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="sakit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Sakit</h1>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">X</button>
                            </div>
                            <div class="modal-body">
                                <form method="POST">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-12">
                                                <div class="mb-2">
                                                    <label for="namaInput">Nama:</label>
                                                    <input class="form-control" type="hidden" name="id_karyawan" value="<?= $id_karyawan ?>">
                                                    <input class="form-control" type="text" value="<?= $nama_lengkap ?>" name="nama_lengkap" id="namaInput" required readonly>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="tanggalInput1">Tanggal:</label>
                                                    <input class="form-control" type="date" name="tanggal" required>
                                                </div>
                                                <div class="mb-2">
                                                    <input type="hidden" value="1" name="sakit">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-sm-12">
                                                <div class="mb-2">
                                                    <label for="keterangan">Keterangan sakit:</label>
                                                    <textarea class="form-control" name="keterangan" placeholder="sakit apa anda" id="keterangan" cols="30" rows="10" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="sakit" class="btn btn-primary">SUBMIT</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content-wraper">
                <div class="container-fluid">
                    <div class="row">
                        <section class="col-lg-12 col-sm-12 connectedSortable">
                            <!-- Custom tabs (Charts with tabs)-->
                            <div class="card">
                                <div class="card-header">
                                    <h1>Daftar Absen Saya</h1>
                                </div><!-- /.card-header -->
                                <div class="card-body text-center">
                                    <div class="tab-content p-0">
                                        <?php
                                        if (empty($data->data)) { ?>
                                            <div class="card-body">
                                                <div class="tab-content p-0 table-responsive">
                                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Nama Karyawan</th>
                                                                <th>Tanggal</th>
                                                                <th>Jam Masuk</th>
                                                                <th>Jam Keluar</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="9" align="center">Data Kosong</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        <?php } else { ?>
                                            <div class="table-responsive">
                                                <table id="example" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 3%;">No</th>
                                                            <th style="width: 15%;">Nama</th>
                                                            <th style="width: 15%;">Tanggal</th>
                                                            <th style="width: 10%;">Waktu Masuk</th>
                                                            <th style="width: 10%;">Waktu Keluar</th>
                                                            <th style="width: 10%;">Terlambat</th>
                                                            <th style="width: 10%;">Sakit</th>
                                                            <th style="width: 10%;">Izin</th>
                                                            <th style="width: 10%;">Barcode</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        foreach ($data->data as $row) {
                                                        ?>
                                                            <tr>
                                                                <td><?= $no++ ?></td>
                                                                <td><?= $row->nama_lengkap ?></td>
                                                                <td><?= $row->tanggal ?></td>
                                                                <td><?= $row->waktu_masuk ?></td>
                                                                <td><?= $row->waktu_keluar ?></td>
                                                                <td><?= $row->terlambat ?></td>
                                                                <td><?= $row->sakit ?></td>
                                                                <td><?= $row->izin ?></td>
                                                                <td><?= $row->barcode ?></td>
                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        <?php }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </section>
        </div>
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
</div>

<!-- script absen masuk -->
<script>
    function getCurrentDateTime() {
        const currentDate = new Date();
        const year = currentDate.getFullYear();
        const month = String(currentDate.getMonth() + 1).padStart(2, '0');
        const day = String(currentDate.getDate()).padStart(2, '0');
        const hours = String(currentDate.getHours()).padStart(2, '0');
        const minutes = String(currentDate.getMinutes()).padStart(2, '0');

        return {
            date: `${year}-${month}-${day}`,
            time: `${hours}:${minutes}`
        };
    }

    function updateRealTimeDateTime() {
        const currentDateTime = getCurrentDateTime();
        document.getElementById('tanggalInput').value = currentDateTime.date;
        document.getElementById('waktuInput').value = currentDateTime.time;
    }

    // Panggil fungsi updateRealTimeDateTime() setiap detik
    setInterval(updateRealTimeDateTime, 1000);

    function generateBarcode() {
        const apiBaseUrl = 'https://barcode.tec-it.com/barcode.ashx?data=';
        const nama = document.getElementById('namaInput').value;
        const tanggal = document.getElementById('tanggalInput').value;
        const waktu = document.getElementById('waktuInput').value;
        const barcodeValue = `${nama}_${tanggal}_${waktu}`;
        const barcodeType = 'CODE128';
        const barcodeSize = '50x50';
        const barcodeImageURL = `${apiBaseUrl}${barcodeValue}&code=${barcodeType}&dpi=96&unit=Fit&format=png&rotation=0&align=Center&color=000000&bgcolor=FFFFFF&code=${barcodeType}&modulewidth=0.3&paddingleft=10&paddingright=10&paddingtop=10&paddingbottom=10&size=${barcodeSize}`;

        document.getElementById('barcodeInput').value = barcodeValue;

        const barcodeCanvas = document.getElementById('barcodeCanvas');
        JsBarcode(barcodeCanvas, barcodeValue, {
            format: "CODE128",
            displayValue: true,
            fontSize: 20,
            height: 50,
        });

        const barcodeImage = document.getElementById('barcodeImage');
        const canvas = document.createElement('canvas');
        canvas.width = barcodeCanvas.width;
        canvas.height = barcodeCanvas.height;
        const ctx = canvas.getContext('2d');
        ctx.drawImage(barcodeCanvas, 0, 0, canvas.width, canvas.height);
        barcodeImage.src = canvas.toDataURL('image/png');
        barcodeImage.style.display = 'inline';
        document.getElementById('submitBtn').style.display = 'inline-block';
    }
    document.getElementById('submitBtn').style.display = 'none';
</script>

<!-- script absen keluar -->
<script>
    function getCurrentDateTime() {
        const currentDate = new Date();
        const year = currentDate.getFullYear();
        const month = String(currentDate.getMonth() + 1).padStart(2, '0');
        const day = String(currentDate.getDate()).padStart(2, '0');
        const hours = String(currentDate.getHours()).padStart(2, '0');
        const minutes = String(currentDate.getMinutes()).padStart(2, '0');

        return {
            date: `${year}-${month}-${day}`,
            time: `${hours}:${minutes}`
        };
    }

    function updateRealTimeDateTime() {
        const currentDateTime = getCurrentDateTime();
        document.getElementById('tanggalInput1').value = currentDateTime.date;
        document.getElementById('waktuInput1').value = currentDateTime.time;
    }

    // Panggil fungsi updateRealTimeDateTime() setiap detik
    setInterval(updateRealTimeDateTime, 1000);

    function generateBarcode1() {
        const apiBaseUrl = 'https://barcode.tec-it.com/barcode.ashx?data=';
        const nama = document.getElementById('namaInput').value;
        const tanggal = document.getElementById('tanggalInput1').value;
        const waktu = document.getElementById('waktuInput1').value;
        const barcodeValue = `${nama}_${tanggal}_${waktu}`;
        const barcodeType = 'CODE128';
        const barcodeSize = '50x50';
        const barcodeImageURL = `${apiBaseUrl}${barcodeValue}&code=${barcodeType}&dpi=96&unit=Fit&format=png&rotation=0&align=Center&color=000000&bgcolor=FFFFFF&code=${barcodeType}&modulewidth=0.3&paddingleft=10&paddingright=10&paddingtop=10&paddingbottom=10&size=${barcodeSize}`;

        document.getElementById('barcodeInput1').value = barcodeValue;

        const barcodeCanvas = document.getElementById('barcodeCanvas1');
        JsBarcode(barcodeCanvas, barcodeValue, {
            format: "CODE128",
            displayValue: true,
            fontSize: 20,
            height: 50,
        });

        const barcodeImage = document.getElementById('barcodeImage1');
        const canvas = document.createElement('canvas');
        canvas.width = barcodeCanvas.width;
        canvas.height = barcodeCanvas.height;
        const ctx = canvas.getContext('2d');
        ctx.drawImage(barcodeCanvas, 0, 0, canvas.width, canvas.height);
        barcodeImage.src = canvas.toDataURL('image/png');
        barcodeImage.style.display = 'inline';
        document.getElementById('submitBtn1').style.display = 'inline-block';
    }
    document.getElementById('submitBtn1').style.display = 'none';

    // document.querySelector('form').addEventListener('submit', function(event) {
    //     event.preventDefault();
    //     const barcodeValue = document.getElementById('barcodeInput').value;
    //     alert('Karyawan dengan barcode ' + barcodeValue + ' telah melakukan absensi.');
    // });
</script>
<!-- script barcode -->
<script src="https://cdn.jsdelivr.net/npm/instascan@1.0.0/instascan.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uuid@8.3.2/dist/umd/uuidv4.min.js"></script>
<!-- Tambahkan library JsBarcode melalui CDN -->
<!-- tutup script barcode -->

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
    $(document).ready(function() {
        $('#example2').DataTable();
    });
</script>
</body>

</html>