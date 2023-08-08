<?php
include "controller/koneksi.php";
require_once 'header.php';

// panggil data karyawan dari URL
if (isset($_GET['id_karyawan'])) {
    $id_karyawan = $_GET['id_karyawan'];
    $link = "getPayroll2&id_karyawan=" . $id_karyawan;
    $payroll = getRegistran($link);

    if (!empty($payroll->data)) {
        $id_karyawan = $payroll->data[0]->id_karyawan;
        // var_dump($payroll);
    } else {
        echo "Error: No data found for the specified 'id_karyawan'.";
    }
} else {
    echo "Error: 'id_karyawan' parameter is missing in the URL.";
}

if (isset($_POST['submit'])) {
    $id_karyawan = $_POST['id_karyawan'];
    $id_divisi = $_POST['id_divisi'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $level_user = $_POST['level_user'];
    $pendidikan = $_POST['pendidikan'];
    $status_ptkp = $_POST['status_ptkp'];
    $cabang = $_POST['cabang'];
    $group_payroll = $_POST['group_payroll'];
    $gaji_pokok = $_POST['gaji_pokok'];
    $tempat_kerja = $_POST['tempat_kerja'];
    $besar_tunjangan = $_POST['besar_tunjangan'];
    $tunjangan_pulsa = $_POST['tunjangan_pulsa'];
    $lain_lain = $_POST['lain_lain'];
    $tunjangan_pendidikan = $_POST['tunjangan_pendidikan'];
    $uang_makan = $_POST['uang_makan'];
    $uang_transport = $_POST['uang_transport'];
    $total_gaji = $_POST['total_gaji'];
    $lembur = $_POST['lembur'];
    $dinas = $_POST['dinas'];
    $cuti_tahunan = $_POST['cuti_tahunan'];
    $thr = $_POST['thr'];
    $total_tunjangan = $_POST['total_tunjangan'];
    $total_gaji_tunjangan = $_POST['total_gaji_tunjangan'];
    $referal_client = $_POST['referal_client'];
    $insentif_kk = $_POST['insentif_kk'];
    $insentif_spv = $_POST['insentif_spv'];
    $insentif_staff = $_POST['insentif_staff'];
    $insentif_spt_op = $_POST['insentif_spt_op'];
    $insentif_spt_badan = $_POST['insentif_spt_badan'];
    $insentif_spt = $_POST['insentif_spt'];
    $komisi_marketing = $_POST['komisi_marketing'];
    $total_insentif = $_POST['total_insentif'];
    $total_pendapatan = $_POST['total_pendapatan'];
    $terlambat = $_POST['terlambat'];
    $cuti_bersama = $_POST['cuti_bersama'];
    $cuti = $_POST['cuti'];
    $sakit = $_POST['sakit'];
    $izin = $_POST['izin'];
    $alpha = $_POST['alpha'];
    $pinjaman = $_POST['pinjaman'];
    $bpjs_perusahaan = $_POST['bpjs_perusahaan'];
    $bpjs_karyawan = $_POST['bpjs_karyawan'];
    $jkk = $_POST['jkk'];
    $jkm = $_POST['jkm'];
    $jht_37 = $_POST['jht_37'];
    $ditanggung_perusahaan = $_POST['ditanggung_perusahaan'];
    $ditanggung_karyawan = $_POST['ditanggung_karyawan'];
    $total_pengurangan = $_POST['total_pengurangan'];
    $total_gaji_bersih = $_POST['total_gaji_bersih'];

    $link = "setPayroll&id_karyawan=" . urlencode($id_karyawan) . "&id_divisi=" . urlencode($id_divisi) . "&nama_lengkap=" . urlencode($nama_lengkap) . "&level_user=" . urlencode($level_user) . "&pendidikan=" . urlencode($pendidikan) . "&status_ptkp=" . ($status_ptkp) . "&cabang=" . urlencode($cabang) . "&group_payroll=" . urlencode($group_payroll) . "&gaji_pokok=" . urlencode($gaji_pokok) . "&tempat_kerja=" . urlencode($tempat_kerja) . "&besar_tunjangan=" . urlencode($besar_tunjangan) . "&tunjangan_pulsa=" . urlencode($tunjangan_pulsa) . "&lain_lain=" . urlencode($lain_lain) . "&tunjangan_pendidikan=" . urlencode($tunjangan_pendidikan) . "&uang_makan=" . urlencode($uang_makan) . "&uang_transport=" . urlencode($uang_transport) . "&total_gaji=" . urlencode($total_gaji) . "&lembur=" . urlencode($lembur) . "&dinas=" . urlencode($dinas) . "&cuti_tahunan=" . urlencode($cuti_tahunan) . "&thr=" . urlencode($thr) . "&total_tunjangan=" . ($total_tunjangan) . "&total_gaji_tunjangan=" . urlencode($total_gaji_tunjangan) . "&referal_client=" . urlencode($referal_client) . "&insentif_kk=" . urlencode($insentif_kk) . "&insentif_spv=" . urlencode($insentif_spv) . "&insentif_staff=" . urlencode($insentif_staff) . "&insentif_spt_op=" . urlencode($insentif_spt_op) . "&insentif_spt_badan=" . urlencode($insentif_spt_badan) . "&insentif_spt=" . urlencode($insentif_spt) . "&komisi_marketing=" . urlencode($komisi_marketing) . "&total_insentif=" . urlencode($total_insentif) . "&total_pendapatan=" . urlencode($total_pendapatan) . "&terlambat=" . urlencode($terlambat) . "&cuti_bersama=" . urlencode($cuti_bersama) . "&cuti=" . urlencode($cuti) . "&sakit=" . urlencode($sakit) . "&izin=" . urlencode($izin) . "&alpha=" . urlencode($alpha) . "&pinjaman=" . urlencode($pinjaman) . "&bpjs_perusahaan=" . urlencode($bpjs_perusahaan) . "&bpjs_karyawan=" . urlencode($bpjs_karyawan) . "&jkk=" . urlencode($jkk) . "&jkm=" . urlencode($jkm) . "&jht_37=" . urlencode($jht_37) . "&ditanggung_perusahaan=" . urlencode($ditanggung_perusahaan) . "&ditanggung_karyawan=" . urlencode($ditanggung_karyawan) . "&total_pengurangan=" . urlencode($total_pengurangan) . "&total_gaji_bersih=" . urlencode($total_gaji_bersih);
    $hasil_payrol = getRegistran($link);
    var_dump($hasil_payrol);
    // if ($hasil_payrol->status == "success") {
    //     echo "<script>alert('Data Berhasil Disimpan');window.location='payroll.php';</script>";
    // } else {
    //     echo "<script>alert('Data Gagal Disimpan');window.location='payroll.php';</script>";
    // }
}



$id_karyawan = $payroll->data[0]->id_karyawan;
// mencari jumlah lembur pada tabel lembur
$query = mysqli_query($connect, "SELECT id_karyawan, SUM(total_lembur) AS jumlah_lembur FROM lembur WHERE id_karyawan = $id_karyawan GROUP BY id_karyawan");

if ($query) {
    $row = mysqli_fetch_assoc($query);

    if ($row) {
        $jumlah_data = $row['jumlah_lembur'];
        $final_value = $jumlah_data * 50000;
    } else {
        echo "Data not found.";
    }
} else {
    echo "Query error: " . mysqli_error($connect);
}


// mencari jumlah sakit pada absen
$query1 = mysqli_query($connect, "SELECT id_karyawan, SUM(sakit) AS jumlah_sakit FROM absen WHERE id_karyawan = $id_karyawan GROUP BY id_karyawan;");
$row1 = mysqli_fetch_assoc($query1);
$jumlah_sakit = $row1['jumlah_sakit'];
$final_sakit = $jumlah_sakit * 50000;

// mencari jumlah IZIN pada absen
$query2 = mysqli_query($connect, "SELECT id_karyawan, SUM(izin) AS jumlah_izin FROM absen WHERE id_karyawan = $id_karyawan GROUP BY id_karyawan;");
$row1 = mysqli_fetch_assoc($query2);
$jumlah_izin = $row1['jumlah_izin'];
$final_izin = $jumlah_izin * 50000;

// mencari jumlah terlambat pada absen
$query3 = mysqli_query($connect, "SELECT id_karyawan, SUM(terlambat) AS jumlah_terlambat FROM absen WHERE id_karyawan = $id_karyawan GROUP BY id_karyawan;");
$row1 = mysqli_fetch_assoc($query3);
$jumlah_terlambat = $row1['jumlah_terlambat'];
$final_terlambat = $jumlah_terlambat * 50000;

// panggil gaji pokok pada kolom gaji tabel karyawan
$query4 = mysqli_query($connect, "SELECT gaji FROM karyawan WHERE id_karyawan = $id_karyawan");
$row2 = mysqli_fetch_assoc($query4);
$gaji = $row2['gaji'];

// panggil pendidikan pada tabel pendidikan
$link = "getProfilePendidikan&id_karyawan=" . urlencode($id_karyawan);
$data_pendidikan = getRegistran($link);
// var_dump($data_pendidikan);

$link = "gePinjamKaryawan&id_karyawan=" . urlencode($id_karyawan);
$data_pinjaman = getRegistran($link);
$jumlah_pinjam = $data_pinjaman->data[0]->jumlah_pinjam;
$jumlah_bayar_sekarang = $data_pinjaman->data[0]->jumlah_bayar_sekarang;
$jumlah_cicilan = $data_pinjaman->data[0]->jumlah_cicilan;
var_dump($jumlah_cicilan);

?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="row">
                    <div class="col">
                        <h1 class="m-3">Data Payroll Karyawan</h1>
                    </div>
                    <div align="end" class="col mt-2 mr-3">
                        <a href="absen-admin.php" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <section class="col-lg-12 col-sm-12 connectedSortable">
                    <form action="" method="POST">
                        <div class="card col-lg-12">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-user mr"></i>Data Pribadi
                            </div>
                            <div class="card-body">
                                <div class="tab-content p-0">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-2">
                                                <input type="hidden" name="id_karyawan" value="<?= $payroll->data[0]->id_karyawan ?>">
                                                <input type="hidden" name="id_divisi" value="<?= $payroll->data[0]->id_divisi ?>">
                                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= $payroll->data[0]->nama_lengkap; ?>" readonly>
                                            </div>
                                            <div class="mb-2">
                                                <label for="level_user" class="form-label">Jabatan</label>
                                                <input type="text" class="form-control" id="level_user" name="level_user" value="<?= $payroll->data[0]->level_user; ?>" readonly>
                                            </div>
                                            <div class="mb-2">
                                                <label for="pendidikan" class="form-label">Pendidikan</label>
                                                <?php if ($data_pendidikan && !empty($data_pendidikan->data)) { ?>
                                                    <input type="text" class="form-control" id="pendidikan" name="pendidikan" value="<?= $data_pendidikan->data[0]->jenjang_pendidikan ?>" required readonly>
                                                <?php } else { ?>
                                                    <input type='text' class='form-control' id='pendidikan' name='pendidikan' required>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-2">
                                                <label for="status_ptkp" class="form-label">Status PTKP</label>
                                                <input type="text" class="form-control" id="status_ptkp" name="status_ptkp" required>
                                            </div>
                                            <div class="mb-2">
                                                <label for="cabang" class="form-label">Cabang</label>
                                                <input type="text" class="form-control" id="cabang" name="cabang" required>
                                            </div>
                                            <div class="mb-2">
                                                <label for="group" class="form-label">Group</label>
                                                <input type="text" class="form-control" id="group" name="group_payroll" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-chart-pie mr"></i>Tunjangan Jabatan
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-2">
                                            <label for="gaji_pokok" class="form-label">GAJI POKOK</label>
                                            <input type="text" class="form-control nilai-input" id="gaji_pokok" value="<?= $gaji ?>" name="gaji_pokok" required>
                                        </div>
                                        <div class="mb-2">
                                            <label for="tempat_kerja" class="form-label">Tempat Bekerja</label>
                                            <input type="text" class="form-control" id="tempat_kerja" name="tempat_kerja" placeholder="HO / CGK / PIK / BALI / YAO / CKR" required>
                                        </div>
                                        <div class="mb-2">
                                            <label for="besar_tunjangan" class="form-label">Besar Tunjangan Jabatan</label>
                                            <input type="number" class="form-control nilai-input" id="besar_tunjangan" name="besar_tunjangan" required>
                                        </div>
                                        <div class="mb-2">
                                            <label for="tunjangan_pulsa" class="form-label">Tunjangan Pulsa</label>
                                            <input type="number" class="form-control nilai-input" id="tunjangan_pulsa" name="tunjangan_pulsa" required>
                                        </div>
                                        <div class="mb-2">
                                            <label for="lain_lain" class="form-label">Tunjangan Lain-lain</label>
                                            <input type="number" class="form-control nilai-input" id="lain_lain" name="lain_lain" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-2">
                                            <label for="tunjangan_pendidikan" class="form-label">Tunjangan Pendidikan</label>
                                            <input type="number" class="form-control nilai-input" id="tunjangan_pendidikan" name="tunjangan_pendidikan" required>
                                        </div>
                                        <div class="mb-2">
                                            <label for="uang_makan" class="form-label">Uang Makan</label>
                                            <input type="number" class="form-control nilai-input" id="uang_makan" name="uang_makan" required>
                                        </div>
                                        <div class="mb-2">
                                            <label for="uang_transport" class="form-label">Uang Transport</label>
                                            <input type="number" class="form-control nilai-input" id="uang_transport" name="uang_transport" required>
                                        </div>
                                        <div class="mb-2">
                                            <label for="total_gaji" class="form-label">TOTAL GAJI BULANAN</label>
                                            <input type="number" class="form-control total-nilai" readonly required>
                                        </div>
                                        <div class="mb-2">
                                            <small class="text-red">*Masukan Kembali Total Gaji Bulanan Diatas</small>
                                            <input type="number" class="form-control total-nilai" id="total_gaji" name="total_gaji" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-chart-pie mr"></i>Pendapatan
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-2">
                                            <label for="lembur">Lembur</label>
                                            <input type="number" class="form-control nilai-input1" id="lembur" name="lembur" value="<?= $final_value ?>" required>
                                        </div>
                                        <div class="mb-2">
                                            <label for="dinas">Dinas</label>
                                            <input type="number" class="form-control nilai-input1" id="dinas" name="dinas" required>
                                        </div>
                                        <div class="mb-2">
                                            <label for="cuti_tahunan">Cuti Tahunan</label>
                                            <input type="number" class="form-control nilai-input1" id="cuti_tahunan" name="cuti_tahunan" required>
                                        </div>
                                        <div class="mb-2">
                                            <label for="thr">THR</label>
                                            <input type="number" class="form-control nilai-input1" id="thr" name="thr" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-2">
                                            <label for="total_tunjangan">Total Tunjangan Di Luar Gaji</label>
                                            <input type="number" class="form-control total-nilai1" readonly required>
                                        </div>
                                        <div class="mb-2">
                                            <small class="text-red">*Masukan Kembali Tunjangan Di Luar Gaji Diatas</small>
                                            <input type="number" class="form-control total-nilai1" id="total_tunjangan" name="total_tunjangan" required>
                                        </div>
                                        <div class="mb-2">
                                            <label for="total_gaji_tunjangan">Total Gaji + Tunjangan Di Luar Gaji</label>
                                            <input type="number" class="form-control total-nilai2" id="total_gaji_tunjangan" name="total_gaji_tunjangan" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-chart-pie mr"></i>Insentif ( setiap tanggal 15 )
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-2">
                                            <label for="">REFERAL CLIENT-5%</label>
                                            <input type="number" class="form-control nilai-input6" id="referal_client" name="referal_client" required>
                                        </div>
                                        <div class="mb-2">
                                            <label for="">INSENTIF KK-5%</label>
                                            <input type="number" class="form-control nilai-input6" id="insentif_kk" name="insentif_kk" required>
                                        </div>
                                        <div class="mb-2">
                                            <label for="">INSENTIF SPV-1%</label>
                                            <input type="number" class="form-control nilai-input6" id="insentif_spv" name="insentif_spv" required>
                                        </div>
                                        <div class="mb-2">
                                            <label for="">INSENTIF STAFF-2%</label>
                                            <input type="number" class="form-control nilai-input6" id="insentif_staff" name="insentif_staff" required>
                                        </div>
                                        <div class="mb-2">
                                            <label for="">INSENTIF SPT OP</label>
                                            <input type="number" class="form-control nilai-input6" id="insentif_spt_op" name="insentif_spt_op" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-2">
                                            <label for="">INSENTIF SPT BADAN</label>
                                            <input type="number" class="form-control nilai-input6" id="insentif_spt_badan" name="insentif_spt_badan" required>
                                        </div>
                                        <div class="mb-2">
                                            <label for="">INSENTIF SPT</label>
                                            <input type="number" class="form-control nilai-input6" id="insentif_spt" name="insentif_spt" required>
                                        </div>
                                        <div class="mb-2">
                                            <label for="">KOMISI MARKETING</label>
                                            <input type="number" class="form-control nilai-input6" id="komisi_marketing" name="komisi_marketing" required>
                                        </div>
                                        <div class="mb-2">
                                            <label for="total_insentif">TOTAL INSENTIF DAN KOMISI LAINNYA - PAYMENT PERTENGAHAN BULAN</label>
                                            <input type="number" class="form-control total-nilai6" readonly required>
                                        </div>
                                        <div class="mb-2">
                                            <small class="text-red">*Masukan Kembali TOTAL INSENTIF DAN KOMISI LAINNYA - PAYMENT PERTENGAHAN BULAN diatas</small>
                                            <input type="number" class="form-control" id="total_insentif" name="total_insentif" required>
                                        </div>
                                        <div class="mb-2">
                                            <label for="total_pendapatan">TOTAL PENDAPATAN BRUTO / BULAN</label>
                                            <input type="number" class="form-control total-nilai7" id="total_pendapatan" name="total_pendapatan" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-chart-pie mr"></i>Pengurangan
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-2">
                                            <label for="">Terlambat</label>
                                            <?php
                                            if ($final_terlambat == null) { ?>
                                                <input type="number" class="form-control nilai-input4" id="terlambat" name="terlambat" required>
                                            <?php } else { ?>
                                                <input type="number" class="form-control nilai-input4" id="terlambat" value="<?= $final_terlambat ?>" name="terlambat" required>
                                            <?php }
                                            ?>
                                        </div>
                                        <div class="mb-2">
                                            <label for="">Cuti Bersama</label>
                                            <input type="number" class="form-control nilai-input4" id="cuti_bersama" name="cuti_bersama" required>
                                        </div>
                                        <div class="mb-2">
                                            <label for="">CUTI</label>
                                            <input type="number" class="form-control nilai-input4" id="cuti" name="cuti" required>
                                        </div>
                                        <div class="mb-2">
                                            <label for="">Sakit</label>
                                            <?php
                                            if ($final_sakit == null) { ?>
                                                <input type="number" class="form-control nilai-input4" id="sakit" name="sakit" required>
                                            <?php } else { ?>
                                                <input type="number" class="form-control nilai-input4" id="sakit" value="<?= $final_sakit ?>" name="sakit" required>
                                            <?php }
                                            ?>
                                        </div>
                                        <div class="mb-2">
                                            <label for="">IZIN</label>
                                            <?php
                                            if ($final_izin == null) { ?>
                                                <input type="number" class="form-control nilai-input4" id="izin" name="izin" required>
                                            <?php } else { ?>
                                                <input type="number" class="form-control nilai-input4" id="izin" value="<?= $final_izin ?>" name="izin" required>
                                            <?php }
                                            ?>
                                        </div>
                                        <div class="mb-2">
                                            <label for="">Alpha</label>
                                            <input type="number" class="form-control nilai-input4" id="alpa" name="alpha" required>
                                        </div>
                                        <div class="mb-2">
                                            <label for="">Pinjaman</label>
                                            <?php
                                            if ($jumlah_bayar_sekarang < $jumlah_pinjam) { ?>
                                                <input type="number" class="form-control nilai-input4" id="pinjaman" value="<?= $jumlah_cicilan ?>" name="pinjaman" required>
                                            <?php } else { ?>
                                                <input type="number" class="form-control nilai-input4" id="pinjaman" value="0" name="pinjaman" required>
                                            <?php }
                                            ?>
                                        </div>
                                        <div class="mb-2">
                                            <label for="">BPJS KESEHATAN Ditanggung Karyawan 1%</label>
                                            <input type="number" class="form-control nilai-input4" id="bpjs_karyawan" name="bpjs_karyawan" required>
                                        </div>
                                        <div class="mb-2">
                                            <label for="">BPJS KETENAGAKERJAAN Ditanggung Karyawan 2.00%</label>
                                            <input type="number" class="form-control nilai-input4 nilai-input3" id="ditanggung_karyawan" name="ditanggung_karyawan" required>
                                        </div>
                                        <div class="mb-2">
                                            <label for="">TOTAL PENGURANGAN</label>
                                            <input type="number" class="form-control total-nilai4" readonly required>
                                        </div>
                                        <div class="mb-2">
                                            <small class="text-red">*Masukan TOTAL PENGURANGAN diatas</small>
                                            <input type="number" class="form-control total-nilai4" id="total_pengurangan" name="total_pengurangan" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-2">
                                            <label for="">JKK 0.24%</label>
                                            <input type="number" class="form-control nilai-input10" id="jkk" name="jkk" required>
                                        </div>
                                        <div class="mb-2">
                                            <label for="">JKM 0.30%</label>
                                            <input type="number" class="form-control nilai-input10" id="jkm" name="jkm" required>
                                        </div>
                                        <div class="mb-2">
                                            <label for="">JHT 3.7%</label>
                                            <input type="number" class="form-control nilai-input10" id="jht_37" name="jht_37" required>
                                        </div>
                                        <div class="mb-2">
                                            <label for="">JHT 2%</label>
                                            <input type="number" class="form-control total-nilai3" id="jht_37" name="jht_37" required>
                                        </div>
                                        <div class="mb-2">
                                            <label for="">BPJS KESEHATAN Ditanggung Perusahaan 4%</label>
                                            <input type="number" class="form-control nilai-input10" id="bpjs_perusahaan" name="bpjs_perusahaan" required>
                                        </div>
                                        <div class="mb-2">
                                            <label for="">BPJS KETENAGAKERJAAN Ditanggung Perusahaan 4.24%</label>
                                            <input type="number" class="form-control total-nilai10" id="ditanggung_perusahaan" name="ditanggung_perusahaan" required>
                                        </div>
                                        <div class="mb-2">
                                            <label for="">TOTAL GAJI BERSIH</label>
                                            <input type="number" class="form-control total-nilai9" id="total_gaji_bersih" name="total_gaji_bersih" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row d-flex justify-content-end">
                                    <div class="col-auto">
                                        <button type="submit" name="submit" class="btn btn-lg btn-primary" onclick="return confirmSave();">Simpan</button>
                                        <button type="reset" class="btn btn-lg btn-danger" onclick="return confirmReset();">Reset</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </section>
            </div>
        </div>
    </section>
    <aside class="control-sidebar control-sidebar-dark">
    </aside>
</div>
<!-- untuk mencari total gaji bersih -->
<script>
    // JavaScript code
    document.addEventListener("DOMContentLoaded", function() {
        // Function to update the value of total_gaji_bersih
        function updateTotalGajiBersih() {
            const totalPendapatan = parseFloat(document.getElementById("total_pendapatan").value) || 0;
            const totalPengurangan = parseFloat(document.getElementById("total_pengurangan").value) || 0;
            const totalGajiBersih = totalPendapatan - totalPengurangan;
            document.getElementById("total_gaji_bersih").value = totalGajiBersih.toFixed();
        }

        // Call the updateTotalGajiBersih function when the page loads
        updateTotalGajiBersih();

        // Call the updateTotalGajiBersih function whenever values in total_pendapatan and total_pengurangan change
        document.getElementById("total_pendapatan").addEventListener("input", updateTotalGajiBersih);
        document.getElementById("total_pengurangan").addEventListener("input", updateTotalGajiBersih);
    });
</script>

<!-- untuk menampilkan total bruno-->
<script>
    // JavaScript code
    document.addEventListener("DOMContentLoaded", function() {
        // Function to update the value of total_pendapatan
        function updateTotalPendapatan() {
            const nilai_gaji_tunjangan = parseFloat(document.getElementById("total_gaji_tunjangan").value) || 0;
            const nilai_insentif = parseFloat(document.getElementById("total_insentif").value) || 0;
            const totalPendapatan = nilai_gaji_tunjangan + nilai_insentif;
            document.getElementById("total_pendapatan").value = totalPendapatan.toFixed();
        }

        // Call the updateTotalPendapatan function when the page loads
        updateTotalPendapatan();

        // Call the updateTotalPendapatan function whenever values in total_gaji_tunjangan and total_insentif change
        document.getElementById("total_gaji_tunjangan").addEventListener("input", updateTotalPendapatan);
        document.getElementById("total_insentif").addEventListener("input", updateTotalPendapatan);
    });
</script>
<!-- untuk mendapatkan total gaji bulanan + tunjangan diluar gaji -->
<script>
    class TotalNilaiCalculator {
        constructor() {
            this.totalNilaiInput = document.getElementById("total_gaji");
            this.totalNilai1Input = document.getElementById("total_tunjangan");
            this.totalNilai2Input = document.getElementById("total_gaji_tunjangan");

            this.attachEventListeners();
        }

        attachEventListeners() {
            this.totalNilaiInput.addEventListener("input", this.calculateTotalNilai2.bind(this));
            this.totalNilai1Input.addEventListener("input", this.calculateTotalNilai2.bind(this));
        }

        calculateTotalNilai2() {
            const totalNilai = parseFloat(this.totalNilaiInput.value) || 0;
            const totalNilai1 = parseFloat(this.totalNilai1Input.value) || 0;
            const totalNilai2 = totalNilai + totalNilai1;

            this.totalNilai2Input.value = totalNilai2.toFixed();
        }
    }

    // Create an instance of the class when the document is ready
    document.addEventListener("DOMContentLoaded", function() {
        new TotalNilaiCalculator();
    });
</script>
<!-- TOTAL INSENTIF -->
<script>
    // JavaScript code
    document.addEventListener("DOMContentLoaded", function() {
        // Function to update the value of total-nilai6
        function updateTotalNilai6() {
            const nilaiInput6Elements = document.querySelectorAll(".nilai-input6");
            let totalNilai6 = 0;

            nilaiInput6Elements.forEach(function(inputElement) {
                const nilai = parseFloat(inputElement.value) || 0;
                totalNilai6 += nilai;
            });

            document.querySelectorAll(".total-nilai6").forEach(function(outputElement) {
                outputElement.value = totalNilai6.toFixed();
            });
        }

        // Call the updateTotalNilai6 function when the page loads
        updateTotalNilai6();

        // Call the updateTotalNilai6 function whenever values in nilai-input6 change
        document.querySelectorAll(".nilai-input6").forEach(function(inputElement) {
            inputElement.addEventListener("input", updateTotalNilai6);
        });
    });
</script>





<script>
    function confirmSave() {
        return confirm("Apakah Anda yakin semua data sudah benar?");
    }

    function confirmReset() {
        return confirm("Apakah Anda yakin ingin RESET SEMUA DATA?");
    }
</script>
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
<script>
    // Mendapatkan elemen input nilai
    const nilaiInputs10 = document.querySelectorAll('.nilai-input10');

    // Mendapatkan elemen input total nilai
    const totalNilaiInput10 = document.querySelector('.total-nilai10');

    // Menghitung total nilai
    function hitungTotalNilai() {
        let totalNilai = 0;

        // Meloopi setiap input nilai dan menjumlahkannya
        nilaiInputs10.forEach(input => {
            const nilai = parseFloat(input.value) || 0;
            totalNilai += nilai;
        });

        // Mengatur nilai total pada input total nilai
        totalNilaiInput10.value = totalNilai;
    }

    // Menjalankan fungsi hitungTotalNilai saat input nilai berubah
    nilaiInputs10.forEach(input => {
        input.addEventListener('input', hitungTotalNilai);
    });
</script>
<script>
    // Mendapatkan elemen input nilai
    const nilaiInputs1 = document.querySelectorAll('.nilai-input1');

    // Mendapatkan elemen input total nilai
    const totalNilaiInput1 = document.querySelector('.total-nilai1');

    // Menghitung total nilai
    function hitungTotalNilai() {
        let totalNilai = 0;

        // Meloopi setiap input nilai dan menjumlahkannya
        nilaiInputs1.forEach(input => {
            const nilai = parseFloat(input.value) || 0;
            totalNilai += nilai;
        });

        // Mengatur nilai total pada input total nilai
        totalNilaiInput1.value = totalNilai;
    }

    // Menjalankan fungsi hitungTotalNilai saat input nilai berubah
    nilaiInputs1.forEach(input => {
        input.addEventListener('input', hitungTotalNilai);
    });
</script>
<script>
    // Mendapatkan elemen input nilai
    const nilaiInputs4 = document.querySelectorAll('.nilai-input4');

    // Mendapatkan elemen input total nilai
    const totalNilaiInput4 = document.querySelector('.total-nilai4');

    // Menghitung total nilai
    function hitungTotalNilai() {
        let totalNilai = 0;

        // Meloopi setiap input nilai dan menjumlahkannya
        nilaiInputs4.forEach(input => {
            const nilai = parseFloat(input.value) || 0;
            totalNilai += nilai;
        });

        // Mengatur nilai total pada input total nilai
        totalNilaiInput4.value = totalNilai;
    }

    // Menjalankan fungsi hitungTotalNilai saat input nilai berubah
    nilaiInputs4.forEach(input => {
        input.addEventListener('input', hitungTotalNilai);
    });
</script>
<script>
    // Mendapatkan elemen input nilai
    const nilaiInputs3 = document.querySelectorAll('.nilai-input3');

    // Mendapatkan elemen input total nilai
    const totalNilaiInput3 = document.querySelector('.total-nilai3');

    // Menghitung total nilai
    function hitungTotalNilai() {
        let totalNilai = 0;

        // Meloopi setiap input nilai dan menjumlahkannya
        nilaiInputs3.forEach(input => {
            const nilai = parseFloat(input.value) || 0;
            totalNilai += nilai;
        });

        // Mengatur nilai total pada input total nilai
        totalNilaiInput3.value = totalNilai;
    }

    // Menjalankan fungsi hitungTotalNilai saat input nilai berubah
    nilaiInputs3.forEach(input => {
        input.addEventListener('input', hitungTotalNilai);
    });
</script>
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
    $('#calendar').datetimepicker({
        format: 'L',
        inline: true
    })
</script>
</body>

</html>