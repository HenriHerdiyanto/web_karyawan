<?php
session_start();
require_once "koneksi.php";
if (function_exists($_GET['function'])) {
    $_GET['function']();
}

function getUser()
{
    global $connect;
    if (!empty($_GET['username']))
        $username = $_GET['username'];
    if (!empty($_GET['password']))
        $password = $_GET['password'];

    $query = "SELECT * FROM user WHERE username = '$username'AND password = '$password'";
    $result = $connect->query($query);
    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
function getCuti()
{
    global $connect;

    if (isset($_GET['id_karyawan'])) {
        $id_karyawan = $_GET['id_karyawan'];
        $query = "SELECT * FROM cuti WHERE id_karyawan = ?";
        $stmt = $connect->prepare($query);
        $stmt->bind_param("i", $id_karyawan);
    } else {
        $query = "SELECT * FROM cuti";
        $stmt = $connect->prepare($query);
    }

    $data = array();
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        while ($row = mysqli_fetch_object($result)) {
            $data[] = $row;
        }
        $stmt->close();
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}


function getSisaCuti()
{
    global $connect;
    if (!empty($_GET['id_karyawan']))
        $id_karyawan = $_GET['id_karyawan'];

    $query = "SELECT * FROM cuti WHERE id_karyawan = $id_karyawan ORDER BY id_cuti DESC LIMIT 1";
    $result = $connect->query($query);
    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
function getReqAdmin()
{
    global $connect;

    $query = "SELECT * FROM form_request";
    $result = $connect->query($query);
    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
function getEvaluasiAdmin()
{
    global $connect;

    $query = "SELECT * FROM evaluasi";
    $result = $connect->query($query);
    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function getUserStaff()
{
    global $connect;
    if (!empty($_GET['username']))
        $username = $_GET['username'];
    if (!empty($_GET['password']))
        $password = $_GET['password'];

    $query = "SELECT * FROM karyawan WHERE username = '$username'AND password = '$password'";
    $result = $connect->query($query);
    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}



function getId_user()
{
    global $connect;

    $query = "SELECT id_user FROM user ORDER BY id_user DESC LIMIT 1;";
    $result = $connect->query($query);
    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function getKordinator()
{
    global $connect;
    $query = "SELECT * FROM user WHERE level_user = 1";
    $result = $connect->query($query);
    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function getEvaluasi()
{
    global $connect;

    if (!empty($_GET['id_divisi']))
        $id_divisi = $_GET['id_divisi'];

    $query = "SELECT * FROM evaluasi WHERE id_divisi = $id_divisi";
    $result = $connect->query($query);
    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
function getSOP()
{
    global $connect;

    $query = "SELECT * FROM sop_admin 
    LEFT JOIN divisi ON sop_admin.id_divisi = divisi.id_divisi ";
    $result = $connect->query($query);
    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function getEvaluasiEdit()
{
    global $connect;

    if (!empty($_GET['id_evaluasi']))
        $id_evaluasi = $_GET['id_evaluasi'];

    $query = "SELECT * FROM evaluasi WHERE id_evaluasi = $id_evaluasi";

    $result = $connect->query($query);
    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function getAbsenBaru()
{
    global $connect;

    if (!empty($_GET['id_karyawan']))
        $id_karyawan = $_GET['id_karyawan'];

    $query = "SELECT * FROM absen WHERE id_karyawan = $id_karyawan";

    $result = $connect->query($query);
    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function getAbsenBarukeluar()
{
    global $connect;

    if (!empty($_GET['id_karyawan']))
        $id_karyawan = $_GET['id_karyawan'];

    $query = "SELECT * FROM absen WHERE id_karyawan = $id_karyawan ORDER BY id_absen DESC LIMIT 1;
    ";

    $result = $connect->query($query);
    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function getEvaluasiView()
{
    global $connect;

    if (!empty($_GET['id_evaluasi']))
        $id_evaluasi = $_GET['id_evaluasi'];

    $query = "SELECT * FROM evaluasi LEFT JOIN karyawan ON evaluasi.id_karyawan = karyawan.id_karyawan WHERE id_evaluasi = $id_evaluasi";

    $result = $connect->query($query);
    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

// function getKaryawanStaf()
// {
//     global $connect;

//     $query = "SELECT * FROM karyawan ORDER BY level_user desc";
//     $result = $connect->query($query);
//     while ($row = mysqli_fetch_object($result)) {
//         $data[] = $row;
//     }

//     if ($result) {
//         $response = array(
//             'status' => 1,
//             'data' => $data
//         );
//     } else {
//         $response = array(
//             'status' => 0,
//             'data' => 'Gagal'
//         );
//     }

//     header('Content-Type: application/json');
//     echo json_encode($response);
// }

function getStafId()
{
    global $connect;
    $response = array();

    if (!empty($_GET['id_user'])) {
        $id_user = $_GET['id_user'];

        $query = "SELECT * FROM user WHERE id_user = $id_user";
        $result = $connect->query($query);

        if ($result && mysqli_num_rows($result) > 0) {
            $data = array();
            while ($row = mysqli_fetch_object($result)) {
                $data[] = $row;
            }
            $response['status'] = 1;
            $response['data'] = $data;
        } else {
            $response['status'] = 0;
            $response['data'] = 'Gagal';
        }
    } else {
        $response['status'] = 0;
        $response['data'] = 'ID User tidak valid';
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}


function setInventaris()
{
    global $connect;
    if (!empty($_GET['nama']))
        $nama = $_GET['nama'];
    if (!empty($_GET['tipe']))
        $tipe = $_GET['tipe'];
    if (!empty($_GET['jumlah']))
        $jumlah = $_GET['jumlah'];
    if (!empty($_GET['tanggal']))
        $tanggal = $_GET['tanggal'];
    if (!empty($_GET['harga']))
        $harga = $_GET['harga'];
    if (!empty($_GET['gambar']))
        $gambar = $_GET['gambar'];


    $query = "INSERT INTO inventaris SET nama = '$nama', tipe = '$tipe', jumlah = '$jumlah', tanggal = '$tanggal', harga = '$harga', gambar = '$gambar'";
    $result = $connect->query($query);

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => 'Sukses'
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function insertAbsen()
{
    global $connect;
    if (!empty($_GET['id_karyawan']))
        $id_karyawan = $_GET['id_karyawan'];
    if (!empty($_GET['id_absen']))
        $id_absen = $_GET['id_absen'];
    if (!empty($_GET['nama_lengkap']))
        $nama_lengkap = $_GET['nama_lengkap'];
    if (!empty($_GET['tanggal']))
        $tanggal = $_GET['tanggal'];
    if (!empty($_GET['waktu_masuk']))
        $waktu_masuk = $_GET['waktu_masuk'];
    if (!empty($_GET['terlambat']))
        $terlambat = $_GET['terlambat'];
    if (!empty($_GET['waktu_keluar']))
        $waktu_keluar = $_GET['waktu_keluar'];
    if (!empty($_GET['barcode']))
        $barcode = $_GET['barcode'];

    if ($id_absen == null) {
        $query = "INSERT INTO absen SET id_karyawan = '$id_karyawan', nama_lengkap = '$nama_lengkap', tanggal = '$tanggal', waktu_masuk = '$waktu_masuk', terlambat = '$terlambat', barcode = '$barcode'";
        $result = $connect->query($query);
    } else {
        $query = "UPDATE absen SET waktu_keluar = '$waktu_keluar' WHERE id_absen = '$id_absen'";
        $result = $connect->query($query);
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => 'Sukses'
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function setIzinSakit()
{
    global $connect;
    if (!empty($_GET['id_karyawan']))
        $id_karyawan = $_GET['id_karyawan'];
    if (!empty($_GET['nama_lengkap']))
        $nama_lengkap = $_GET['nama_lengkap'];
    if (!empty($_GET['tanggal']))
        $tanggal = $_GET['tanggal'];
    if (!empty($_GET['izin']))
        $izin = $_GET['izin'];
    if (!empty($_GET['sakit']))
        $sakit = $_GET['sakit'];
    if (!empty($_GET['keterangan']))
        $keterangan = $_GET['keterangan'];

    if ($sakit == null) {
        $query = "INSERT INTO absen SET id_karyawan = '$id_karyawan', nama_lengkap = '$nama_lengkap', tanggal = '$tanggal', izin = '$izin', keterangan = '$keterangan'";
        $result = $connect->query($query);
    } else {
        $query = "INSERT INTO absen SET id_karyawan = '$id_karyawan', nama_lengkap = '$nama_lengkap', tanggal = '$tanggal', sakit = '$sakit', keterangan = '$keterangan'";
        $result = $connect->query($query);
    }


    if ($result) {
        $response = array(
            'status' => 1,
            'data' => 'Sukses'
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function getAddCuti()
{
    global $connect;
    if (!empty($_GET['id_cuti']))
        $id_cuti = $_GET['id_cuti'];
    if (!empty($_GET['id_karyawan']))
        $id_karyawan = $_GET['id_karyawan'];
    if (!empty($_GET['nama_lengkap']))
        $nama_lengkap = $_GET['nama_lengkap'];
    if (!empty($_GET['nama_divisi']))
        $nama_divisi = $_GET['nama_divisi'];
    if (!empty($_GET['level_user']))
        $level_user = $_GET['level_user'];
    if (!empty($_GET['hak_cuti']))
        $hak_cuti = $_GET['hak_cuti'];
    if (!empty($_GET['ambil_cuti']))
        $ambil_cuti = $_GET['ambil_cuti'];
    if (!empty($_GET['sisa_cuti']))
        $sisa_cuti = $_GET['sisa_cuti'];
    if (!empty($_GET['tanggal_mulai']))
        $tanggal_mulai = $_GET['tanggal_mulai'];
    if (!empty($_GET['tanggal_selesai']))
        $tanggal_selesai = $_GET['tanggal_selesai'];
    if (!empty($_GET['alasan_cuti']))
        $alasan_cuti = $_GET['alasan_cuti'];
    if (!empty($_GET['status']))
        $status = $_GET['status'];

    if ($id_cuti) {
        $query = "UPDATE cuti SET alasan_cuti = '$alasan_cuti', status = '$status' WHERE id_cuti = '$id_cuti'";
        $result = $connect->query($query);
    } else {
        $query = "INSERT INTO cuti SET id_karyawan = '$id_karyawan', nama_lengkap = '$nama_lengkap', nama_divisi = '$nama_divisi', level_user = '$level_user', hak_cuti = '$hak_cuti', ambil_cuti = '$ambil_cuti', sisa_cuti = '$sisa_cuti', tanggal_mulai = '$tanggal_mulai', tanggal_selesai = '$tanggal_selesai', alasan_cuti = '$alasan_cuti', status = '$status'";
        $result = $connect->query($query);
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => 'Sukses'
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function setPayroll()
{
    global $connect;
    if (!empty($_GET['id_karyawan']))
        $id_karyawan = $_GET['id_karyawan'];
    if (!empty($_GET['id_divisi']))
        $id_divisi = $_GET['id_divisi'];
    if (!empty($_GET['nama_lengkap']))
        $nama_lengkap = $_GET['nama_lengkap'];
    if (!empty($_GET['level_user']))
        $level_user = $_GET['level_user'];
    if (!empty($_GET['pendidikan']))
        $pendidikan = $_GET['pendidikan'];
    if (!empty($_GET['status_ptkp']))
        $status_ptkp = $_GET['status_ptkp'];
    if (!empty($_GET['cabang']))
        $cabang = $_GET['cabang'];
    if (!empty($_GET['group_payroll']))
        $group_payroll = $_GET['group_payroll'];
    if (!empty($_GET['gaji_pokok']))
        $gaji_pokok = $_GET['gaji_pokok'];
    if (!empty($_GET['tempat_kerja']))
        $tempat_kerja = $_GET['tempat_kerja'];
    if (!empty($_GET['besar_tunjangan']))
        $besar_tunjangan = $_GET['besar_tunjangan'];
    if (!empty($_GET['tunjangan_pulsa']))
        $tunjangan_pulsa = $_GET['tunjangan_pulsa'];
    if (!empty($_GET['lain_lain']))
        $lain_lain = $_GET['lain_lain'];
    if (!empty($_GET['tunjangan_pendidikan']))
        $tunjangan_pendidikan = $_GET['tunjangan_pendidikan'];
    if (!empty($_GET['uang_makan']))
        $uang_makan = $_GET['uang_makan'];
    if (!empty($_GET['uang_transport']))
        $uang_transport = $_GET['uang_transport'];
    if (!empty($_GET['total_gaji']))
        $total_gaji = $_GET['total_gaji'];
    if (!empty($_GET['lembur']))
        $lembur = $_GET['lembur'];
    if (!empty($_GET['dinas']))
        $dinas = $_GET['dinas'];
    if (!empty($_GET['cuti_tahunan']))
        $cuti_tahunan = $_GET['cuti_tahunan'];
    if (!empty($_GET['thr']))
        $thr = $_GET['thr'];
    if (!empty($_GET['total_tunjangan']))
        $total_tunjangan = $_GET['total_tunjangan'];
    if (!empty($_GET['total_gaji_tunjangan']))
        $total_gaji_tunjangan = $_GET['total_gaji_tunjangan'];
    if (!empty($_GET['referal_client']))
        $referal_client = $_GET['referal_client'];
    if (!empty($_GET['insentif_kk']))
        $insentif_kk = $_GET['insentif_kk'];
    if (!empty($_GET['insentif_spv']))
        $insentif_spv = $_GET['insentif_spv'];
    if (!empty($_GET['insentif_staff']))
        $insentif_staff = $_GET['insentif_staff'];
    if (!empty($_GET['insentif_spt_op']))
        $insentif_spt_op = $_GET['insentif_spt_op'];
    if (!empty($_GET['insentif_spt_badan']))
        $insentif_spt_badan = $_GET['insentif_spt_badan'];
    if (!empty($_GET['insentif_spt']))
        $insentif_spt = $_GET['insentif_spt'];
    if (!empty($_GET['komisi_marketing']))
        $komisi_marketing = $_GET['komisi_marketing'];
    if (!empty($_GET['total_insentif']))
        $total_insentif = $_GET['total_insentif'];
    if (!empty($_GET['total_pendapatan']))
        $total_pendapatan = $_GET['total_pendapatan'];
    if (!empty($_GET['terlambat']))
        $terlambat = $_GET['terlambat'];
    if (!empty($_GET['cuti_bersama']))
        $cuti_bersama = $_GET['cuti_bersama'];
    if (!empty($_GET['cuti']))
        $cuti = $_GET['cuti'];
    if (!empty($_GET['sakit']))
        $sakit = $_GET['sakit'];
    if (!empty($_GET['izin']))
        $izin = $_GET['izin'];
    if (!empty($_GET['alpha']))
        $alpha = $_GET['alpha'];
    if (!empty($_GET['pinjaman']))
        $pinjaman = $_GET['pinjaman'];
    if (!empty($_GET['bpjs_perusahaan']))
        $bpjs_perusahaan = $_GET['bpjs_perusahaan'];
    if (!empty($_GET['bpjs_karyawan']))
        $bpjs_karyawan = $_GET['bpjs_karyawan'];
    if (!empty($_GET['jkk']))
        $jkk = $_GET['jkk'];
    if (!empty($_GET['jkm']))
        $jkm = $_GET['jkm'];
    if (!empty($_GET['jht_37']))
        $jht_37 = $_GET['jht_37'];
    if (!empty($_GET['ditanggung_perusahaan']))
        $ditanggung_perusahaan = $_GET['ditanggung_perusahaan'];
    if (!empty($_GET['ditanggung_karyawan']))
        $ditanggung_karyawan = $_GET['ditanggung_karyawan'];
    if (!empty($_GET['total_pengurangan']))
        $total_pengurangan = $_GET['total_pengurangan'];
    if (!empty($_GET['total_gaji_bersih']))
        $total_gaji_bersih = $_GET['total_gaji_bersih'];


    $query = "INSERT INTO payroll SET id_karyawan = '$id_karyawan', id_divisi = '$id_divisi', nama_lengkap = '$nama_lengkap', level_user = '$level_user', pendidikan = '$pendidikan', status_ptkp = '$status_ptkp', cabang = '$cabang', group_payroll = '$group_payroll', gaji_pokok = '$gaji_pokok', tempat_kerja = '$tempat_kerja', besar_tunjangan = '$besar_tunjangan', tunjangan_pulsa = '$tunjangan_pulsa', lain_lain = '$lain_lain', tunjangan_pendidikan = '$tunjangan_pendidikan', uang_makan = '$uang_makan', uang_transport = '$uang_transport', total_gaji = '$total_gaji', lembur = '$lembur', dinas = '$dinas', cuti_tahunan = '$cuti_tahunan', thr = '$thr',total_tunjangan = '$total_tunjangan', total_gaji_tunjangan = '$total_gaji_tunjangan', referal_client = '$referal_client', insentif_kk = '$insentif_kk', insentif_spv = '$insentif_spv', insentif_staff = '$insentif_staff', insentif_spt_op = '$insentif_spt_op', insentif_spt_badan = '$insentif_spt_badan', insentif_spt = '$insentif_spt', komisi_marketing = '$komisi_marketing', total_insentif = '$total_insentif',total_pendapatan = '$total_pendapatan', terlambat = '$terlambat', cuti_bersama = '$cuti_bersama', cuti = '$cuti', sakit = '$sakit', izin = '$izin',alpha = '$alpha', pinjaman = '$pinjaman', bpjs_perusahaan = '$bpjs_perusahaan',bpjs_karyawan = '$bpjs_karyawan', jkk = '$jkk', jkm = '$jkm',jht_37 = '$jht_37', ditanggung_perusahaan = '$ditanggung_perusahaan',ditanggung_karyawan = '$ditanggung_karyawan',total_pengurangan = '$total_pengurangan',total_gaji_bersih = '$total_gaji_bersih'";
    $result = $connect->query($query);

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => 'Sukses'
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function setRequestBudget()
{
    global $connect;
    if (!empty($_GET['id_karyawan']))
        $id_karyawan = $_GET['id_karyawan'];
    if (!empty($_GET['nama_lengkap']))
        $nama_lengkap = $_GET['nama_lengkap'];
    if (!empty($_GET['jenis_item']))
        $jenis_item = $_GET['jenis_item'];
    if (!empty($_GET['nama_divisi']))
        $nama_divisi = $_GET['nama_divisi'];
    if (!empty($_GET['tanggal']))
        $tanggal = $_GET['tanggal'];
    if (!empty($_GET['keperluan1']))
        $keperluan1 = $_GET['keperluan1'];
    if (!empty($_GET['harga1']))
        $harga1 = $_GET['harga1'];
    if (!empty($_GET['keperluan2']))
        $keperluan2 = $_GET['keperluan2'];
    if (!empty($_GET['harga2']))
        $harga2 = $_GET['harga2'];
    if (!empty($_GET['keperluan3']))
        $keperluan3 = $_GET['keperluan3'];
    if (!empty($_GET['harga3']))
        $harga3 = $_GET['harga3'];
    if (!empty($_GET['keperluan4']))
        $keperluan4 = $_GET['keperluan4'];
    if (!empty($_GET['harga4']))
        $harga4 = $_GET['harga4'];
    if (!empty($_GET['total_harga']))
        $total_harga = $_GET['total_harga'];
    if (!empty($_GET['status']))
        $status = $_GET['status'];




    $query = "INSERT INTO form_request SET id_karyawan = '$id_karyawan', nama_lengkap = '$nama_lengkap', jenis_item = '$jenis_item', nama_divisi = '$nama_divisi', tanggal = '$tanggal', keperluan1 = '$keperluan1', harga1 = '$harga1', keperluan2 = '$keperluan2', harga2 = '$harga2', keperluan3 = '$keperluan3', harga3 = '$harga3', keperluan4 = '$keperluan4', harga4 = '$harga4', total_harga = '$total_harga', status = '$status'";
    $result = $connect->query($query);

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => 'Sukses'
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
function setKPI_it()
{
    global $connect;
    if (!empty($_GET['id_karyawan']))
        $id_karyawan = $_GET['id_karyawan'];
    if (!empty($_GET['id_user']))
        $id_user = $_GET['id_user'];
    if (!empty($_GET['id_divisi']))
        $id_divisi = $_GET['id_divisi'];
    if (!empty($_GET['nama_lengkap']))
        $nama_lengkap = $_GET['nama_lengkap'];
    if (!empty($_GET['mulai_kerja']))
        $mulai_kerja = $_GET['mulai_kerja'];
    if (!empty($_GET['indikator1']))
        $indikator1 = $_GET['indikator1'];
    if (!empty($_GET['indikator2']))
        $indikator2 = $_GET['indikator2'];
    if (!empty($_GET['indikator3']))
        $indikator3 = $_GET['indikator3'];
    if (!empty($_GET['indikator4']))
        $indikator4 = $_GET['indikator4'];
    if (!empty($_GET['indikator5']))
        $indikator5 = $_GET['indikator5'];
    if (!empty($_GET['indikator6']))
        $indikator6 = $_GET['indikator6'];
    if (!empty($_GET['indikator7']))
        $indikator7 = $_GET['indikator7'];
    if (!empty($_GET['indikator8']))
        $indikator8 = $_GET['indikator8'];
    if (!empty($_GET['indikator9']))
        $indikator9 = $_GET['indikator9'];
    if (!empty($_GET['indikator10']))
        $indikator10 = $_GET['indikator10'];
    if (!empty($_GET['indikator11']))
        $indikator11 = $_GET['indikator11'];
    if (!empty($_GET['indikator12']))
        $indikator12 = $_GET['indikator12'];
    if (!empty($_GET['total']))
        $total = $_GET['total'];
    if (!empty($_GET['komentar']))
        $komentar = $_GET['komentar'];


    $query = "INSERT INTO kpitekno SET id_karyawan = '$id_karyawan',id_user = '$id_user',id_divisi = '$id_divisi', nama_lengkap = '$nama_lengkap', mulai_kerja = '$mulai_kerja', indikator1 = '$indikator1', indikator2 = '$indikator2', indikator3 = '$indikator3', indikator4 = '$indikator4', indikator5 = '$indikator5', indikator6 = '$indikator6', indikator7 = '$indikator7', indikator8 = '$indikator8', indikator9 = '$indikator9', indikator10 = '$indikator10', indikator11 = '$indikator11', indikator12 = '$indikator12', total = '$total', komentar = '$komentar'";
    $result = $connect->query($query);

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => 'Sukses'
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function setTodolist()
{
    global $connect;
    if (!empty($_GET['id_karyawan']))
        $id_karyawan = $_GET['id_karyawan'];
    if (!empty($_GET['id_user']))
        $id_user = $_GET['id_user'];
    if (!empty($_GET['nama_project']))
        $nama_project = $_GET['nama_project'];
    if (!empty($_GET['todolist']))
        $todolist = $_GET['todolist'];

    if ($id_user == null) {
        $query = "INSERT INTO project SET id_karyawan = '$id_karyawan', nama_project = '$nama_project', todolist = '$todolist'";
        $result = $connect->query($query);
    } else {
        $query = "INSERT INTO project SET id_user = '$id_user', nama_project = '$nama_project', todolist = '$todolist'";
        $result = $connect->query($query);
    }
    if ($result) {
        $response = array(
            'status' => 1,
            'data' => 'Sukses'
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);

    header('Content-Type: application/json');
    echo json_encode($response);
}

function setAbsen()
{
    global $connect;
    if (!empty($_GET['nomor_induk']))
        $nomor_induk = $_GET['nomor_induk'];
    if (!empty($_GET['nama_karyawan']))
        $nama_karyawan = $_GET['nama_karyawan'];
    if (!empty($_GET['date']))
        $date = $_GET['date'];
    if (!empty($_GET['jam_masuk']))
        $jam_masuk = $_GET['jam_masuk'];
    if (!empty($_GET['jam_keluar']))
        $jam_keluar = $_GET['jam_keluar'];
    if (!empty($_GET['terlambat']))
        $terlambat = $_GET['terlambat'];
    if ($jam_masuk > '8:00:00') {
        $query = "INSERT INTO absen_karyawan SET nama_karyawan = '$nama_karyawan', date = '$date', jam_masuk = '$jam_masuk', jam_keluar = '$jam_keluar',nomor_induk = '$nomor_induk',terlambat = '1'";
        echo $query;
        $result = $connect->query($query);
        // hapus data null
        $query1 = "DELETE FROM absen_karyawan WHERE jam_masuk = '00:00:00' && nomor_induk = '0'";
        $result = $connect->query($query1);
    } else {
        $query = "INSERT INTO absen_karyawan SET nama_karyawan = '$nama_karyawan', date = '$date', jam_masuk = '$jam_masuk', jam_keluar = '$jam_keluar',nomor_induk = '$nomor_induk',terlambat = '0'";
        echo $query;
        $result = $connect->query($query);
        $query2 = "DELETE FROM absen_karyawan WHERE jam_masuk = '00:00:00' && nomor_induk = '0'";
        $result = $connect->query($query2);
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => 'Sukses'
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}


function setKeluarga()
{
    global $connect;

    if (!empty($_GET['id_karyawan']))
        $id_karyawan = $_GET['id_karyawan'];
    if (!empty($_GET['nama_ayah']))
        $nama_ayah = $_GET['nama_ayah'];
    if (!empty($_GET['tanggal_lahir_ayah']))
        $tanggal_lahir_ayah = $_GET['tanggal_lahir_ayah'];
    if (!empty($_GET['pendidikan_terakhir_ayah']))
        $pendidikan_terakhir_ayah = $_GET['pendidikan_terakhir_ayah'];
    if (!empty($_GET['pekerjaan_ayah']))
        $pekerjaan_ayah = $_GET['pekerjaan_ayah'];
    if (!empty($_GET['jabatan_ayah']))
        $jabatan_ayah = $_GET['jabatan_ayah'];
    if (!empty($_GET['nama_perusahaan_ayah']))
        $nama_perusahaan_ayah = $_GET['nama_perusahaan_ayah'];
    if (!empty($_GET['nama_ibu']))
        $nama_ibu = $_GET['nama_ibu'];
    if (!empty($_GET['tanggal_lahir_ibu']))
        $tanggal_lahir_ibu = $_GET['tanggal_lahir_ibu'];
    if (!empty($_GET['pendidikan_terakhir_ibu']))
        $pendidikan_terakhir_ibu = $_GET['pendidikan_terakhir_ibu'];
    if (!empty($_GET['pekerjaan_ibu']))
        $pekerjaan_ibu = $_GET['pekerjaan_ibu'];
    if (!empty($_GET['jabatan_ibu']))
        $jabatan_ibu = $_GET['jabatan_ibu'];
    if (!empty($_GET['nama_perusahaan_ibu']))
        $nama_perusahaan_ibu = $_GET['nama_perusahaan_ibu'];

    $query = "INSERT INTO keluarga SET id_karyawan = '$id_karyawan', nama_ayah = '$nama_ayah', tanggal_lahir_ayah = '$tanggal_lahir_ayah', pendidikan_terakhir_ayah = '$pendidikan_terakhir_ayah', pekerjaan_ayah = '$pekerjaan_ayah', jabatan_ayah = '$jabatan_ayah', nama_perusahaan_ayah = '$nama_perusahaan_ayah', nama_ibu = '$nama_ibu', tanggal_lahir_ibu = '$tanggal_lahir_ibu', pendidikan_terakhir_ibu = '$pendidikan_terakhir_ibu', pekerjaan_ibu = '$pekerjaan_ibu', jabatan_ibu = '$jabatan_ibu', nama_perusahaan_ibu = '$nama_perusahaan_ibu'";

    if ($connect->query($query)) {
        if ($connect->affected_rows > 0) {
            $response = array(
                'status' => 1,
                'data' => 'Sukses'
            );
        } else {
            $response = array(
                'status' => 0,
                'data' => 'Gagal menyimpan data'
            );
        }
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal menjalankan query'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function setUpdateKeluarga()
{
    global $connect;

    if (!empty($_GET['id_karyawan']))
        $id_karyawan = $_GET['id_karyawan'];
    if (!empty($_GET['nama_ayah']))
        $nama_ayah = $_GET['nama_ayah'];
    if (!empty($_GET['tanggal_lahir_ayah']))
        $tanggal_lahir_ayah = $_GET['tanggal_lahir_ayah'];
    if (!empty($_GET['pendidikan_terakhir_ayah']))
        $pendidikan_terakhir_ayah = $_GET['pendidikan_terakhir_ayah'];
    if (!empty($_GET['pekerjaan_ayah']))
        $pekerjaan_ayah = $_GET['pekerjaan_ayah'];
    if (!empty($_GET['jabatan_ayah']))
        $jabatan_ayah = $_GET['jabatan_ayah'];
    if (!empty($_GET['nama_perusahaan_ayah']))
        $nama_perusahaan_ayah = $_GET['nama_perusahaan_ayah'];
    if (!empty($_GET['nama_ibu']))
        $nama_ibu = $_GET['nama_ibu'];
    if (!empty($_GET['tanggal_lahir_ibu']))
        $tanggal_lahir_ibu = $_GET['tanggal_lahir_ibu'];
    if (!empty($_GET['pendidikan_terakhir_ibu']))
        $pendidikan_terakhir_ibu = $_GET['pendidikan_terakhir_ibu'];
    if (!empty($_GET['pekerjaan_ibu']))
        $pekerjaan_ibu = $_GET['pekerjaan_ibu'];
    if (!empty($_GET['jabatan_ibu']))
        $jabatan_ibu = $_GET['jabatan_ibu'];
    if (!empty($_GET['nama_perusahaan_ibu']))
        $nama_perusahaan_ibu = $_GET['nama_perusahaan_ibu'];

    $query = "UPDATE keluarga SET nama_ayah = '$nama_ayah', tanggal_lahir_ayah = '$tanggal_lahir_ayah', pendidikan_terakhir_ayah = '$pendidikan_terakhir_ayah', pekerjaan_ayah = '$pekerjaan_ayah', jabatan_ayah = '$jabatan_ayah', nama_perusahaan_ayah = '$nama_perusahaan_ayah', nama_ibu = '$nama_ibu', tanggal_lahir_ibu = '$tanggal_lahir_ibu', pendidikan_terakhir_ibu = '$pendidikan_terakhir_ibu', pekerjaan_ibu = '$pekerjaan_ibu', jabatan_ibu = '$jabatan_ibu', nama_perusahaan_ibu = '$nama_perusahaan_ibu' WHERE id_karyawan = '$id_karyawan'";

    if ($connect->query($query)) {
        if ($connect->affected_rows > 0) {
            $response = array(
                'status' => 1,
                'data' => 'Sukses'
            );
        } else {
            $response = array(
                'status' => 0,
                'data' => 'Gagal menyimpan data'
            );
        }
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal menjalankan query'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
function setUpdateReqAdmin()
{
    global $connect;

    if (!empty($_GET['id_karyawan']))
        $id_karyawan = $_GET['id_karyawan'];
    if (!empty($_GET['nama_lengkap']))
        $nama_lengkap = $_GET['nama_lengkap'];
    if (!empty($_GET['jenis_item']))
        $jenis_item = $_GET['jenis_item'];
    if (!empty($_GET['nama_divisi']))
        $nama_divisi = $_GET['nama_divisi'];
    if (!empty($_GET['tanggal']))
        $tanggal = $_GET['tanggal'];
    if (!empty($_GET['keperluan1']))
        $keperluan1 = $_GET['keperluan1'];
    if (!empty($_GET['harga1']))
        $harga1 = $_GET['harga1'];
    if (!empty($_GET['keperluan2']))
        $keperluan2 = $_GET['keperluan2'];
    if (!empty($_GET['harga2']))
        $harga2 = $_GET['harga2'];
    if (!empty($_GET['keperluan3']))
        $keperluan3 = $_GET['keperluan3'];
    if (!empty($_GET['harga3']))
        $harga3 = $_GET['harga3'];
    if (!empty($_GET['keperluan4']))
        $keperluan4 = $_GET['keperluan4'];
    if (!empty($_GET['harga4']))
        $harga4 = $_GET['harga4'];
    if (!empty($_GET['total_harga']))
        $total_harga = $_GET['total_harga'];
    if (!empty($_GET['diketahui']))
        $diketahui = $_GET['diketahui'];
    if (!empty($_GET['disetujui']))
        $disetujui = $_GET['disetujui'];
    if (!empty($_GET['status']))
        $status = $_GET['status'];

    $query = "UPDATE form_request SET nama_lengkap = '$nama_lengkap', jenis_item = '$jenis_item', nama_divisi = '$nama_divisi', tanggal = '$tanggal', keperluan1 = '$keperluan1', harga1 = '$harga1', keperluan2 = '$keperluan2', harga2 = '$harga2', keperluan3 = '$keperluan3', harga3 = '$harga3', keperluan4 = '$keperluan4', harga4 = '$harga4', total_harga = '$total_harga', diketahui = '$diketahui', disetujui = '$disetujui', status = '$status' WHERE id_karyawan = '$id_karyawan'";

    if ($connect->query($query)) {
        if ($connect->affected_rows > 0) {
            $response = array(
                'status' => 1,
                'data' => 'Sukses'
            );
        } else {
            $response = array(
                'status' => 0,
                'data' => 'Gagal menyimpan data'
            );
        }
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal menjalankan query'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}


function setProfile()
{
    global $connect;
    if (!empty($_GET['id_karyawan']))
        $id_karyawan = $_GET['id_karyawan'];
    if (!empty($_GET['jenjang_pendidikan']))
        $jenjang_pendidikan = $_GET['jenjang_pendidikan'];
    if (!empty($_GET['instansi_pendidikan']))
        $instansi_pendidikan = $_GET['instansi_pendidikan'];
    if (!empty($_GET['jurusan']))
        $jurusan = $_GET['jurusan'];
    if (!empty($_GET['tahun_masuk']))
        $tahun_masuk = $_GET['tahun_masuk'];
    if (!empty($_GET['tahun_lulus']))
        $tahun_lulus = $_GET['tahun_lulus'];
    if (!empty($_GET['index_nilai']))
        $index_nilai = $_GET['index_nilai'];


    $query = "INSERT INTO pendidikan SET id_karyawan = '$id_karyawan', jenjang_pendidikan = '$jenjang_pendidikan', instansi_pendidikan = '$instansi_pendidikan', jurusan = '$jurusan', tahun_masuk = '$tahun_masuk', tahun_lulus = '$tahun_lulus', index_nilai = '$index_nilai'";
    $result = $connect->query($query);

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => 'Sukses'
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}


function setUserByAdmin()
{
    global $connect;
    if (!empty($_GET['nama_user']))
        $nama_user = $_GET['nama_user'];
    if (!empty($_GET['username']))
        $username = $_GET['username'];
    if (!empty($_GET['password']))
        $password = $_GET['password'];
    if (!empty($_GET['level_user']))
        $level_user = $_GET['level_user'];


    $query = "INSERT INTO user SET nama_user = '$nama_user', username = '$username', password = '$password', level_user = '$level_user'";
    $result = $connect->query($query);

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => 'Sukses'
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}


function setLembur2()
{
    global $connect;
    if (!empty($_GET['id_karyawan']))
        $id_karyawan = $_GET['id_karyawan'];
    if (!empty($_GET['nama_divisi']))
        $nama_divisi = $_GET['nama_divisi'];
    if (!empty($_GET['nama_lengkap']))
        $nama_lengkap = $_GET['nama_lengkap'];
    if (!empty($_GET['level_user']))
        $level_user = $_GET['level_user'];
    if (!empty($_GET['project']))
        $project = $_GET['project'];
    if (!empty($_GET['tanggal']))
        $tanggal = $_GET['tanggal'];
    if (!empty($_GET['mulai_lembur']))
        $mulai_lembur = $_GET['mulai_lembur'];
    if (!empty($_GET['akhir_lembur']))
        $akhir_lembur = $_GET['akhir_lembur'];
    if (!empty($_GET['total_lembur']))
        $total_lembur = $_GET['total_lembur'];
    if (!empty($_GET['keterangan']))
        $keterangan = $_GET['keterangan'];
    if (!empty($_GET['mengetahui']))
        $mengetahui = $_GET['mengetahui'];
    if (!empty($_GET['status']))
        $status = $_GET['status'];
    //jika $keterangan dan $mengetahui kosong, insert into lembur jika tidak update lembur
    if ($keterangan == null && $mengetahui == null) {
        //insert ke database
        $query = "INSERT INTO lembur SET id_karyawan = '$id_karyawan', nama_divisi = '$nama_divisi', nama_lengkap = '$nama_lengkap', level_user = '$level_user', project = '$project', tanggal = '$tanggal', mulai_lembur = '$mulai_lembur', akhir_lembur = '$akhir_lembur', total_lembur = '$total_lembur', status = '$status'";
        $result = $connect->query($query);
        if ($result) {
            $response = array(
                'status' => 1,
                'data' => 'Sukses'
            );
        } else {
            $response = array(
                'status' => 0,
                'data' => 'Gagal'
            );
        }
    } else {
        #update data di tabel lembur dengan parameter yang sudah tersedia dari form input
        $query = "UPDATE lembur SET keterangan = '$keterangan', mengetahui = '$mengetahui', status = '$status' WHERE id_karyawan = '$id_karyawan'";
        $result = $connect->query($query);
        if ($result) {
            $response = array(
                'status' => 1,
                'data' => 'Sukses'
            );
        } else {
            $response = array(
                'status' => 0,
                'data' => 'Gagal'
            );
        }
    }


    header('Content-Type: application/json');
    echo json_encode($response);
}


function setUpdateIdKaryawan()
{
    global $connect;
    if (!empty($_GET['id_divisi']))
        $id_divisi = $_GET['id_divisi'];
    if (!empty($_GET['id_user']))
        $id_user = $_GET['id_user'];

    $query = "UPDATE karyawan SET id_user = '$id_user' WHERE id_divisi = '$id_divisi'";
    $result = $connect->query($query);

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => 'Sukses'
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
function updateAbsen()
{
    global $connect;
    if (!empty($_GET['id_absen']))
        $id_absen = $_GET['id_absen'];
    $waktu_keluar = '5:00:00';

    $query = "UPDATE absen SET waktu_keluar = '$waktu_keluar' WHERE id_absen = '$id_absen'";
    $result = $connect->query($query);

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => 'Sukses'
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
function getUpdateLembur()
{
    global $connect;
    if (!empty($_GET['id_lembur']))
        $id_lembur = $_GET['id_lembur'];
    if (!empty($_GET['nama_divisi']))
        $nama_divisi = $_GET['nama_divisi'];
    if (!empty($_GET['nama_lengkap']))
        $nama_lengkap = $_GET['nama_lengkap'];
    if (!empty($_GET['level_user']))
        $level_user = $_GET['level_user'];
    if (!empty($_GET['project']))
        $project = $_GET['project'];
    if (!empty($_GET['tanggal']))
        $tanggal = $_GET['tanggal'];
    if (!empty($_GET['mulai_lembur']))
        $mulai_lembur = $_GET['mulai_lembur'];
    if (!empty($_GET['akhir_lembur']))
        $akhir_lembur = $_GET['akhir_lembur'];
    if (!empty($_GET['total_lembur']))
        $total_lembur = $_GET['total_lembur'];
    if (!empty($_GET['keterangan']))
        $keterangan = $_GET['keterangan'];
    if (!empty($_GET['mengetahui']))
        $mengetahui = $_GET['mengetahui'];
    if (!empty($_GET['status']))
        $status = $_GET['status'];

    $query = "UPDATE lembur SET nama_divisi = '$nama_divisi',nama_lengkap = '$nama_lengkap',level_user = '$level_user',project = '$project',tanggal = '$tanggal',mulai_lembur = '$mulai_lembur',akhir_lembur = '$akhir_lembur',total_lembur = '$total_lembur',keterangan = '$keterangan',mengetahui = '$mengetahui', status = '$status' WHERE id_lembur = '$id_lembur'";
    $result = $connect->query($query);

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => 'Sukses'
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function setUpdateFoto()
{
    global $connect;
    if (!empty($_GET['id_karyawan']))
        $id_karyawan = $_GET['id_karyawan'];
    if (!empty($_GET['foto_karyawan']))
        $foto_karyawan = $_GET['foto_karyawan'];

    $query = "UPDATE karyawan SET foto_karyawan = '$foto_karyawan' WHERE id_karyawan = '$id_karyawan'";
    $result = $connect->query($query);

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => 'Sukses'
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function setUpdateSOP()
{
    global $connect;
    if (!empty($_GET['id_sop']))
        $id_sop = $_GET['id_sop'];
    if (!empty($_GET['aturan']))
        $aturan = $_GET['aturan'];

    $query = "UPDATE sop_admin SET aturan = '$aturan' WHERE id_sop = '$id_sop'";
    $result = $connect->query($query);

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => 'Sukses'
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function setUpdateTodo()
{
    global $connect;
    if (!empty($_GET['id_karyawan']))
        $id_karyawan = $_GET['id_karyawan'];
    if (!empty($_GET['nama_project']))
        $nama_project = $_GET['nama_project'];
    if (!empty($_GET['todolist']))
        $todolist = $_GET['todolist'];

    $query = "UPDATE project
    SET nama_project = '$nama_project', todolist = '$todolist'
    WHERE id_karyawan = '$id_karyawan'";
    $result = $connect->query($query);


    if ($result) {
        $response = array(
            'status' => 1,
            'data' => 'Sukses'
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function setEvaluasi()
{
    global $connect;
    if (!empty($_GET['id_divisi']))
        $id_divisi = $_GET['id_divisi'];
    if (!empty($_GET['id_karyawan']))
        $id_karyawan = $_GET['id_karyawan'];
    if (!empty($_GET['lama_percobaan']))
        $lama_percobaan = $_GET['lama_percobaan'];
    if (!empty($_GET['nama_lengkap']))
        $nama_lengkap = $_GET['nama_lengkap'];
    if (!empty($_GET['level_user']))
        $level_user = $_GET['level_user'];
    if (!empty($_GET['tanggal_kerja']))
        $tanggal_kerja = $_GET['tanggal_kerja'];
    if (!empty($_GET['status']))
        $status = $_GET['status'];
    if (!empty($_GET['faktor_penilaian']))
        $faktor_penilaian = $_GET['faktor_penilaian'];
    if (!empty($_GET['catatan_atasan']))
        $catatan_atasan = $_GET['catatan_atasan'];
    if (!empty($_GET['status_evaluasi']))
        $status_evaluasi = $_GET['status_evaluasi'];
    // if (!empty($_GET['catatan_hrd']))
    //     $catatan_hrd = $_GET['catatan_hrd'];
    // if (!empty($_GET['dievaluasi_oleh']))
    //     $dievaluasi_oleh = $_GET['dievaluasi_oleh'];
    // if (!empty($_GET['disetujui_oleh']))
    //     $disetujui_oleh = $_GET['disetujui_oleh'];


    $query = "INSERT INTO evaluasi SET id_karyawan = '$id_karyawan',id_divisi = '$id_divisi', lama_percobaan = '$lama_percobaan', nama_lengkap = '$nama_lengkap',  level_user = '$level_user', tanggal_kerja = '$tanggal_kerja', status = '$status', faktor_penilaian = '$faktor_penilaian', catatan_atasan = '$catatan_atasan', status_evaluasi = '$status_evaluasi'";
    $result = $connect->query($query);

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => 'Sukses'
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function setService()
{
    global $connect;
    if (!empty($_GET['nomor']))
        $nomor = $_GET['nomor'];
    if (!empty($_GET['tanggal']))
        $tanggal = $_GET['tanggal'];
    if (!empty($_GET['infrastruktur']))
        $infrastruktur = $_GET['infrastruktur'];
    if (!empty($_GET['ruangan']))
        $ruangan = $_GET['ruangan'];
    if (!empty($_GET['jenis_perbaikan']))
        $jenis_perbaikan = $_GET['jenis_perbaikan'];
    if (!empty($_GET['keterangan']))
        $keterangan = $_GET['keterangan'];
    if (!empty($_GET['prepared']))
        $prepared = $_GET['prepared'];


    $query = "INSERT INTO service SET nomor = '$nomor', tanggal = '$tanggal', infrastruktur = '$infrastruktur', ruangan = '$ruangan', jenis_perbaikan = '$jenis_perbaikan', keterangan = '$keterangan', prepared = '$prepared'";
    $result = $connect->query($query);

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => 'Sukses'
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function setInventarisUpdateNoGambar()
{
    global $connect;
    if (!empty($_GET['id_inventaris']))
        $id_inventaris = $_GET['id_inventaris'];
    if (!empty($_GET['nama']))
        $nama = $_GET['nama'];
    if (!empty($_GET['tipe']))
        $tipe = $_GET['tipe'];
    if (!empty($_GET['jumlah']))
        $jumlah = $_GET['jumlah'];
    if (!empty($_GET['tanggal']))
        $tanggal = $_GET['tanggal'];
    if (!empty($_GET['harga']))
        $harga = $_GET['harga'];


    $query = "UPDATE inventaris SET nama = '$nama', tipe = '$tipe', jumlah = '$jumlah', tanggal = '$tanggal', harga = '$harga' WHERE id_inventaris = $id_inventaris";
    $result = $connect->query($query);

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => 'Sukses'
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}


function setUpdateEvaluasi()
{
    global $connect;
    if (!empty($_GET['id_evaluasi']))
        $id_evaluasi = $_GET['id_evaluasi'];
    if (!empty($_GET['id_karyawan']))
        $id_karyawan = $_GET['id_karyawan'];
    if (!empty($_GET['id_divisi']))
        $id_divisi = $_GET['id_divisi'];
    if (!empty($_GET['lama_percobaan']))
        $lama_percobaan = $_GET['lama_percobaan'];
    if (!empty($_GET['nama_lengkap']))
        $nama_lengkap = $_GET['nama_lengkap'];
    if (!empty($_GET['level_user']))
        $level_user = $_GET['level_user'];
    if (!empty($_GET['tanggal_kerja']))
        $tanggal_kerja = $_GET['tanggal_kerja'];
    if (!empty($_GET['status']))
        $status = $_GET['status'];
    if (!empty($_GET['faktor_penilaian']))
        $faktor_penilaian = $_GET['faktor_penilaian'];
    if (!empty($_GET['catatan_atasan']))
        $catatan_atasan = $_GET['catatan_atasan'];
    if (!empty($_GET['catatan_hrd']))
        $catatan_hrd = $_GET['catatan_hrd'];
    if (!empty($_GET['dievaluasi_oleh']))
        $dievaluasi_oleh = $_GET['dievaluasi_oleh'];
    if (!empty($_GET['disetujui_oleh']))
        $disetujui_oleh = $_GET['disetujui_oleh'];
    if (!empty($_GET['status_evaluasi']))
        $status_evaluasi = $_GET['status_evaluasi'];


    $query = "UPDATE evaluasi SET id_karyawan = '$id_karyawan', id_divisi = '$id_divisi', lama_percobaan = '$lama_percobaan', nama_lengkap = '$nama_lengkap', level_user = '$level_user', tanggal_kerja = '$tanggal_kerja', status = '$status', faktor_penilaian = '$faktor_penilaian', catatan_atasan = '$catatan_atasan', catatan_hrd = '$catatan_hrd', dievaluasi_oleh = '$dievaluasi_oleh', disetujui_oleh = '$disetujui_oleh', status_evaluasi = '$status_evaluasi' WHERE id_evaluasi = $id_evaluasi";
    $result = $connect->query($query);

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => 'Sukses'
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function setInventarisUpdateGambar()
{
    global $connect;
    if (!empty($_GET['id_inventaris']))
        $id_inventaris = $_GET['id_inventaris'];
    if (!empty($_GET['nama']))
        $nama = $_GET['nama'];
    if (!empty($_GET['tipe']))
        $tipe = $_GET['tipe'];
    if (!empty($_GET['jumlah']))
        $jumlah = $_GET['jumlah'];
    if (!empty($_GET['tanggal']))
        $tanggal = $_GET['tanggal'];
    if (!empty($_GET['harga']))
        $harga = $_GET['harga'];
    if (!empty($_GET['gambar']))
        $gambar = $_GET['gambar'];


    $query = "UPDATE inventaris SET nama = '$nama', tipe = '$tipe', jumlah = '$jumlah', tanggal = '$tanggal', harga = '$harga', gambar = '$gambar' WHERE id_inventaris = $id_inventaris";
    $result = $connect->query($query);

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => 'Sukses'
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function setServiceUpdate()
{
    global $connect;
    if (!empty($_GET['id_service']))
        $id_service = $_GET['id_service'];
    if (!empty($_GET['nomor']))
        $nomor = $_GET['nomor'];
    if (!empty($_GET['tanggal']))
        $tanggal = $_GET['tanggal'];
    if (!empty($_GET['infrastruktur']))
        $infrastruktur = $_GET['infrastruktur'];
    if (!empty($_GET['ruangan']))
        $ruangan = $_GET['ruangan'];
    if (!empty($_GET['jenis_perbaikan']))
        $jenis_perbaikan = $_GET['jenis_perbaikan'];
    if (!empty($_GET['keterangan']))
        $keterangan = $_GET['keterangan'];
    if (!empty($_GET['prepared']))
        $prepared = $_GET['prepared'];


    $query = "UPDATE service SET nomor = '$nomor', tanggal = '$tanggal', infrastruktur = '$infrastruktur', ruangan = '$ruangan',  jenis_perbaikan = '$jenis_perbaikan', keterangan = '$keterangan' , prepared = '$prepared' WHERE id_service = $id_service";
    $result = $connect->query($query);

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => 'Sukses'
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function getInventaris()
{

    global $connect;
    $query = "SELECT * FROM inventaris";
    $result = $connect->query($query);

    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function getAbsen()
{

    global $connect;
    $query = "SELECT * FROM absen_karyawan WHERE nomor_induk <> 0";
    $result = $connect->query($query);

    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
function getAbsenb()
{
    global $connect;

    $response = array(); // Initialize the response array

    if (isset($_GET['bulan']) && isset($_GET['tahun'])) {
        $bulan = $_GET['bulan'];
        $tahun = $_GET['tahun'];

        // Construct the query with proper conditions
        $query = "SELECT DISTINCT karyawan.id_karyawan, karyawan.nama_lengkap, divisi.nama_divisi, karyawan.nomor_induk, karyawan.level_user, absen.id_absen, absen.sakit, absen.tanggal, absen.terlambat, absen.izin, absen.keterangan, absen.barcode, karyawan.status_karyawan 
        FROM absen 
        LEFT JOIN karyawan ON absen.id_karyawan = karyawan.id_karyawan 
        LEFT JOIN divisi ON karyawan.id_divisi = divisi.id_divisi 
        WHERE MONTH(absen.tanggal) = '$bulan' AND YEAR(absen.tanggal) = '$tahun'
        ORDER BY karyawan.nama_lengkap ASC, absen.tanggal desc";
    }
    // else {
    //     $query = "SELECT DISTINCT karyawan.id_karyawan, karyawan.nama_lengkap, divisi.nama_divisi, karyawan.nomor_induk, karyawan.level_user, absen.sakit, absen.tanggal, absen.terlambat, absen.izin, absen.keterangan, absen.barcode, karyawan.status_karyawan 
    //     FROM absen 
    //     LEFT JOIN karyawan ON absen.id_karyawan = karyawan.id_karyawan 
    //     LEFT JOIN divisi ON karyawan.id_divisi = divisi.id_divisi 
    //     ORDER BY absen.tanggal ASC";
    // }

    $result = $connect->query($query);

    if ($result) {
        $data = array(); // Initialize the data array

        while ($row = mysqli_fetch_object($result)) {
            $data[] = $row;
        }

        $response['status'] = 1;
        $response['data'] = $data;
    } else {
        $response['status'] = 0;
        $response['data'] = 'Gagal';
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}


function getPayrollAdmin()
{

    global $connect;
    $query = "SELECT * FROM payroll";
    $result = $connect->query($query);

    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
function getKeluarga()
{

    global $connect;
    if (!empty($_GET['id_karyawan']))
        $id_karyawan = $_GET['id_karyawan'];
    $query = "SELECT * FROM keluarga where id_karyawan = '$id_karyawan'";
    $result = $connect->query($query);

    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
function getDetailPayroll()
{

    global $connect;
    if (!empty($_GET['id_karyawan']))
        $id_karyawan = $_GET['id_karyawan'];
    $query = "SELECT * FROM payroll where id_karyawan = '$id_karyawan'";
    $result = $connect->query($query);

    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
function getRequest()
{

    global $connect;
    if (!empty($_GET['id_karyawan']))
        $id_karyawan = $_GET['id_karyawan'];
    $query = "SELECT * FROM form_request where id_karyawan = '$id_karyawan'";
    $result = $connect->query($query);

    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function getTodoList()
{

    global $connect;
    if (!empty($_GET['id_karyawan']))
        $id_karyawan = $_GET['id_karyawan'];
    $query = "SELECT * FROM project where id_karyawan = '$id_karyawan'";
    $result = $connect->query($query);

    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function getTodoListAdm()
{

    global $connect;
    if (!empty($_GET['id_user']))
        $id_user = $_GET['id_user'];
    $query = "SELECT * FROM project where id_user = '$id_user'";
    $result = $connect->query($query);

    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
function getJumlahLembur()
{

    global $connect;
    if (!empty($_GET['id_karyawan']))
        $id_karyawan = $_GET['id_karyawan'];
    $query = "SELECT id_karyawan, SUM(total_lembur) AS jumlah_lembur FROM lembur WHERE id_karyawan = $id_karyawan GROUP BY id_karyawan;";
    $result = $connect->query($query);

    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
function getLemburByNama()
{

    global $connect;
    $nama_divisi = '';
    $id_karyawan = '';

    // Periksa dan ambil nilai dari $_GET
    if (isset($_GET['nama_divisi']) && !empty($_GET['nama_divisi'])) {
        $nama_divisi = $_GET['nama_divisi'];
    }

    if (isset($_GET['id_karyawan']) && !empty($_GET['id_karyawan'])) {
        $id_karyawan = $_GET['id_karyawan'];
    }
    if ($nama_divisi == null && $id_karyawan == null) {
        $query = "SELECT * FROM lembur";
        $result = $connect->query($query);
    } elseif ($id_karyawan == null) {
        $query = "SELECT * FROM lembur WHERE nama_divisi = '$nama_divisi'";
        $result = $connect->query($query);
    } else {
        $query = "SELECT * FROM lembur WHERE id_karyawan = '$id_karyawan'";
        $result = $connect->query($query);
    }

    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function getUserALL()
{

    global $connect;
    $query = "SELECT * from user";
    $result = $connect->query($query);

    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function getService()
{

    global $connect;
    $query = "SELECT * FROM service";
    $result = $connect->query($query);

    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function getInventarisid()
{

    global $connect;
    if (!empty($_GET['id_inventaris']))
        $id_inventaris = $_GET['id_inventaris'];

    $query = "SELECT * FROM inventaris WHERE id_inventaris = $id_inventaris";
    $result = $connect->query($query);

    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function getServiceid()
{

    global $connect;
    if (!empty($_GET['id_service']))
        $id_service = $_GET['id_service'];

    $query = "SELECT * FROM service WHERE id_service = $id_service";
    $result = $connect->query($query);

    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function setDivisi()
{
    global $connect;
    // if (!empty($_GET['id_user']))
    //     $id_user = $_GET['id_user'];
    if (!empty($_GET['kode_divisi']))
        $kode_divisi = $_GET['kode_divisi'];
    if (!empty($_GET['nama_divisi']))
        $nama_divisi = $_GET['nama_divisi'];


    $query = "INSERT INTO divisi SET kode_divisi = '$kode_divisi', nama_divisi = '$nama_divisi'";
    $result = $connect->query($query);

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => 'Sukses'
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
function setSOP()
{
    global $connect;
    if (!empty($_GET['id_user']))
        $id_user = $_GET['id_user'];
    if (!empty($_GET['id_divisi']))
        $id_divisi = $_GET['id_divisi'];
    if (!empty($_GET['aturan']))
        $aturan = $_GET['aturan'];


    $query = "INSERT INTO sop_admin SET id_user = '$id_user', id_divisi = '$id_divisi', aturan = '$aturan'";
    $result = $connect->query($query);

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => 'Sukses'
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function setHistoryPinjam()
{
    global $connect;
    if (!empty($_GET['id_pinjam']))
        $id_pinjam = $_GET['id_pinjam'];
    if (!empty($_GET['id_karyawan']))
        $id_karyawan = $_GET['id_karyawan'];
    if (!empty($_GET['tanggal_pinjam']))
        $tanggal_pinjam = $_GET['tanggal_pinjam'];
    if (!empty($_GET['tanggal_bayar']))
        $tanggal_bayar = $_GET['tanggal_bayar'];
    if (!empty($_GET['jumlah_bayar_history']))
        $jumlah_bayar_history = $_GET['jumlah_bayar_history'];
    if (!empty($_GET['foto_cicilan']))
        $foto_cicilan = $_GET['foto_cicilan'];

    //insert ke tabel history_pinjam
    $query = "INSERT INTO history_pinjam SET id_pinjam = '$id_pinjam', id_karyawan = '$id_karyawan', tanggal_pinjam = '$tanggal_pinjam', tanggal_bayar = '$tanggal_bayar', jumlah_bayar_history = '$jumlah_bayar_history', foto_cicilan = '$foto_cicilan'";
    $result = $connect->query($query);

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => 'Sukses'
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function UpdatePinjamKaryawan()
{
    global $connect;
    if (!empty($_GET['id_pinjam']))
        $id_pinjam = $_GET['id_pinjam'];
    if (!empty($_GET['jumlah_bayar']))
        $jumlah_bayar = $_GET['jumlah_bayar'];
    if (!empty($_GET['jumlah_bayar_sekarang']))
        $jumlah_bayar_sekarang = $_GET['jumlah_bayar_sekarang'];

    $query = "UPDATE pinjam_karyawan SET jumlah_bayar = '$jumlah_bayar', jumlah_bayar_sekarang = '$jumlah_bayar_sekarang' WHERE id_pinjam = '$id_pinjam'";
    $result = $connect->query($query);

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => 'Sukses'
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function getDivisi()
{

    global $connect;
    $query = "SELECT * FROM divisi";
    $result = $connect->query($query);

    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
function getSOPid()
{

    global $connect;
    if (!empty($_GET['id_divisi']))
        $id_divisi = $_GET['id_divisi'];
    $query = "SELECT * FROM sop_admin 
    LEFT JOIN divisi ON sop_admin.id_divisi = divisi.id_divisi 
    WHERE divisi.id_divisi =  $id_divisi 
    ORDER BY id_sop DESC 
    LIMIT 1
    ";
    $result = $connect->query($query);

    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function getStaffNol()
{

    global $connect;
    if (!empty($_GET['id_divisi']))
        $id_divisi = $_GET['id_divisi'];
    $query = "SELECT * FROM karyawan WHERE id_user = 0 and id_divisi = $id_divisi";
    $result = $connect->query($query);

    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}


function getDivisibyIdDiv()
{

    global $connect;
    if (!empty($_GET['id_divisi']))
        $id_divisi = $_GET['id_divisi'];

    $query = "SELECT * FROM divisi LEFT JOIN user ON divisi.id_user = user.id_user WHERE id_divisi = $id_divisi";
    $result = $connect->query($query);

    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function getDivisiSemua()
{

    global $connect;
    $query = "SELECT id_user, nama_user FROM user";
    $result = $connect->query($query);

    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
function getDivisiUser()
{

    global $connect;
    $query = "SELECT * FROM divisi LEFT JOIN user ON divisi.id_user = user.id_user";
    $result = $connect->query($query);

    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}


function setUpdateDivisiId()
{
    global $connect;
    if (!empty($_GET['id_divisi']))
        $id_divisi = $_GET['id_divisi'];
    if (!empty($_GET['id_user']))
        $id_user = $_GET['id_user'];
    if (!empty($_GET['kode_divisi']))
        $kode_divisi = $_GET['kode_divisi'];
    if (!empty($_GET['nama_divisi']))
        $nama_divisi = $_GET['nama_divisi'];


    $query = "UPDATE divisi SET id_user = '$id_user', kode_divisi = '$kode_divisi', nama_divisi = '$nama_divisi' WHERE id_divisi = '$id_divisi'";
    $result = $connect->query($query);

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => 'Sukses'
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}


function setUpdateKonfirmasi()
{
    global $connect;
    if (!empty($_GET['id_karyawan']))
        $id_karyawan = $_GET['id_karyawan'];
    if (!empty($_GET['id_user']))
        $id_user = $_GET['id_user'];


    $query = "UPDATE karyawan SET id_user = '$id_user' WHERE id_karyawan = '$id_karyawan'";
    $result = $connect->query($query);

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => 'Sukses'
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
function getDeleteDivisiId()
{
    global $connect;
    $data = array(); // Initialize the $data array

    // Check if the 'id_divisi' and 'id_absen' keys exist in the $_GET array
    if (isset($_GET["id_divisi"])) {
        $id_divisi = $_GET["id_divisi"];
    } else {
        $id_divisi = null;
    }

    if (isset($_GET["id_absen"])) {
        $id_absen = $_GET["id_absen"];
    } else {
        $id_absen = null;
    }

    if ($id_absen == null && $id_divisi == null) {
        $query = "DELETE FROM absen";
        $result = $connect->query($query);
    } elseif ($id_absen == null) {
        $query = "DELETE FROM divisi WHERE id_divisi = $id_divisi";
        $result = $connect->query($query);
    } else {
        $query = "DELETE FROM absen WHERE id_absen = $id_absen";
        $result = $connect->query($query);
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data // This is an empty array in this case
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function getDeleteSOP()
{
    global $connect;
    $id_sop = $_GET["id_sop"];

    $query = "DELETE FROM sop_admin WHERE id_sop = $id_sop";
    $result = $connect->query($query);
    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function getDeleteUserId()
{
    global $connect;
    $id_user = $_GET["id_user"];

    $query = "DELETE FROM user WHERE id_user = $id_user";
    $result = $connect->query($query);
    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

// KARYAWAN==================================================================================

function setKaryawan()
{
    global $connect;
    if (!empty($_GET['id_user']))
        $id_user = $_GET['id_user'];
    if (!empty($_GET['id_divisi']))
        $id_divisi = $_GET['id_divisi'];
    if (!empty($_GET['nama_lengkap']))
        $nama_lengkap = $_GET['nama_lengkap'];
    if (!empty($_GET['jenis_kelamin']))
        $jenis_kelamin = $_GET['jenis_kelamin'];
    if (!empty($_GET['tempat_lahir']))
        $tempat_lahir = $_GET['tempat_lahir'];
    if (!empty($_GET['tanggal_lahir']))
        $tanggal_lahir = $_GET['tanggal_lahir'];
    if (!empty($_GET['alamat_ktp']))
        $alamat_ktp = $_GET['alamat_ktp'];
    if (!empty($_GET['alamat_domisili']))
        $alamat_domisili = $_GET['alamat_domisili'];
    if (!empty($_GET['no_hp']))
        $no_hp = $_GET['no_hp'];
    if (!empty($_GET['no_ktp']))
        $no_ktp = $_GET['no_ktp'];
    if (!empty($_GET['no_npwp']))
        $no_npwp = $_GET['no_npwp'];
    if (!empty($_GET['agama']))
        $agama = $_GET['agama'];
    if (!empty($_GET['gol_darah']))
        $gol_darah = $_GET['gol_darah'];
    if (!empty($_GET['status_pernikahan']))
        $status_pernikahan = $_GET['status_pernikahan'];
    if (!empty($_GET['status_karyawan']))
        $status_karyawan = $_GET['status_karyawan'];
    if (!empty($_GET['email']))
        $email = $_GET['email'];
    if (!empty($_GET['username']))
        $username = $_GET['username'];
    if (!empty($_GET['password']))
        $password = $_GET['password'];
    if (!empty($_GET['level_user']))
        $level_user = $_GET['level_user'];
    if (!empty($_GET['foto_karyawan']))
        $foto_karyawan = $_GET['foto_karyawan'];


    $query = "INSERT INTO karyawan SET id_user = '$id_user',id_divisi = '$id_divisi', nama_lengkap = '$nama_lengkap', jenis_kelamin = '$jenis_kelamin', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', alamat_ktp = '$alamat_ktp', alamat_domisili = '$alamat_domisili', no_hp = '$no_hp', no_ktp = '$no_ktp', no_npwp = '$no_npwp', agama = '$agama', gol_darah = '$gol_darah', status_pernikahan = '$status_pernikahan', status_karyawan = '$status_karyawan', email = '$email',username = '$email', password = '$password', level_user = '$level_user', foto_karyawan = '$foto_karyawan'";
    $result = $connect->query($query);

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => 'Sukses'
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}


function setKaryawanByAdmin()
{
    global $connect;
    if (!empty($_GET['id_user']))
        $id_user = $_GET['id_user'];
    if (!empty($_GET['id_divisi']))
        $id_divisi = $_GET['id_divisi'];
    if (!empty($_GET['nomor_induk']))
        $nomor_induk = $_GET['nomor_induk'];
    if (!empty($_GET['nama_lengkap']))
        $nama_lengkap = $_GET['nama_lengkap'];
    if (!empty($_GET['jenis_kelamin']))
        $jenis_kelamin = $_GET['jenis_kelamin'];
    if (!empty($_GET['tempat_lahir']))
        $tempat_lahir = $_GET['tempat_lahir'];
    if (!empty($_GET['tanggal_lahir']))
        $tanggal_lahir = $_GET['tanggal_lahir'];
    if (!empty($_GET['alamat_ktp']))
        $alamat_ktp = $_GET['alamat_ktp'];
    if (!empty($_GET['alamat_domisili']))
        $alamat_domisili = $_GET['alamat_domisili'];
    if (!empty($_GET['no_hp']))
        $no_hp = $_GET['no_hp'];
    if (!empty($_GET['no_ktp']))
        $no_ktp = $_GET['no_ktp'];
    if (!empty($_GET['no_npwp']))
        $no_npwp = $_GET['no_npwp'];
    if (!empty($_GET['agama']))
        $agama = $_GET['agama'];
    if (!empty($_GET['gol_darah']))
        $gol_darah = $_GET['gol_darah'];
    if (!empty($_GET['status_pernikahan']))
        $status_pernikahan = $_GET['status_pernikahan'];
    if (!empty($_GET['status_karyawan']))
        $status_karyawan = $_GET['status_karyawan'];
    if (!empty($_GET['email']))
        $email = $_GET['email'];
    // if (!empty($_GET['username']))
    //     $username = $_GET['username'];
    if (!empty($_GET['password']))
        $password = $_GET['password'];
    if (!empty($_GET['level_user']))
        $level_user = $_GET['level_user'];
    if (!empty($_GET['foto_karyawan']))
        $foto_karyawan = $_GET['foto_karyawan'];
    if (!empty($_GET['gaji']))
        $gaji = $_GET['gaji'];
    if (!empty($_GET['uang_makan']))
        $uang_makan = $_GET['uang_makan'];
    if (!empty($_GET['uang_transport']))
        $uang_transport = $_GET['uang_transport'];
    if (!empty($_GET['mulai_kerja']))
        $mulai_kerja = $_GET['mulai_kerja'];
    if (!empty($_GET['akhir_kerja']))
        $akhir_kerja = $_GET['akhir_kerja'];
    if (!empty($_GET['kontrak_kerja']))
        $kontrak_kerja = $_GET['kontrak_kerja'];


    $query = "INSERT INTO karyawan SET id_user = '$id_user',id_divisi = '$id_divisi',nomor_induk = '$nomor_induk', nama_lengkap = '$nama_lengkap', jenis_kelamin = '$jenis_kelamin', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', alamat_ktp = '$alamat_ktp', alamat_domisili = '$alamat_domisili', no_hp = '$no_hp', no_ktp = '$no_ktp', no_npwp = '$no_npwp', agama = '$agama', gol_darah = '$gol_darah', status_pernikahan = '$status_pernikahan', status_karyawan = '$status_karyawan', email = '$email', username = '$email', password = '$password', level_user = '$level_user', foto_karyawan = '$foto_karyawan', gaji = '$gaji', uang_makan = '$uang_makan', uang_transport = '$uang_transport', mulai_kerja = '$mulai_kerja', akhir_kerja = '$akhir_kerja', kontrak_kerja = '$kontrak_kerja'";
    $result = $connect->query($query);

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => 'Sukses'
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function setUpdateDinas()
{
    global $connect;
    if (!empty($_GET['id_user']))
        $id_user = $_GET['id_user'];
    if (!empty($_GET['id_divisi']))
        $id_divisi = $_GET['id_divisi'];
    if (!empty($_GET['nama_pengajuan']))
        $nama_pengajuan = $_GET['nama_pengajuan'];
    if (!empty($_GET['jabatan']))
        $jabatan = $_GET['jabatan'];
    if (!empty($_GET['project']))
        $project = $_GET['project'];
    if (!empty($_GET['tujuan']))
        $tujuan = $_GET['tujuan'];
    if (!empty($_GET['jumlah_personel']))
        $jumlah_personel = $_GET['jumlah_personel'];
    if (!empty($_GET['nama_personel']))
        $nama_personel = $_GET['nama_personel'];
    if (!empty($_GET['kota_tujuan']))
        $kota_tujuan = $_GET['kota_tujuan'];
    if (!empty($_GET['tanggal_berangkat']))
        $tanggal_berangkat = $_GET['tanggal_berangkat'];
    if (!empty($_GET['waktu_berangkat']))
        $waktu_berangkat = $_GET['waktu_berangkat'];
    if (!empty($_GET['kota_pulang']))
        $kota_pulang = $_GET['kota_pulang'];
    if (!empty($_GET['tanggal_pulang']))
        $tanggal_pulang = $_GET['tanggal_pulang'];
    if (!empty($_GET['transportasi']))
        $transportasi = $_GET['transportasi'];
    if (!empty($_GET['hotel']))
        $hotel = $_GET['hotel'];
    if (!empty($_GET['bagasi']))
        $bagasi = $_GET['bagasi'];
    if (!empty($_GET['cash_advance']))
        $cash_advance = $_GET['cash_advance'];
    if (!empty($_GET['keterangan']))
        $keterangan = $_GET['keterangan'];
    if (!empty($_GET['status']))
        $status = $_GET['status'];


    $query = "UPDATE perjalanan_dinas SET id_user = '$id_user', id_divisi = '$id_divisi', nama_pengajuan = '$nama_pengajuan', jabatan = '$jabatan', project = '$project', tujuan = '$tujuan', jumlah_personel = '$jumlah_personel', nama_personel = '$nama_personel', kota_tujuan = '$kota_tujuan', tanggal_berangkat = '$tanggal_berangkat',waktu_berangkat = '$waktu_berangkat',kota_pulang = '$kota_pulang' ,tanggal_pulang = '$tanggal_pulang', transportasi = '$transportasi', hotel = '$hotel', bagasi = '$bagasi', cash_advance = '$cash_advance', keterangan = '$keterangan', status = '$status'";
    $result = $connect->query($query);

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => 'Sukses'
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function setUpdatePinjam()
{
    global $connect;
    if (!empty($_GET['id_pinjam']))
        $id_pinjam = $_GET['id_pinjam'];
    if (!empty($_GET['jumlah_bayar']))
        $jumlah_bayar = $_GET['jumlah_bayar'];
    if (!empty($_GET['id_karyawan']))
        $id_karyawan = $_GET['id_karyawan'];
    if (!empty($_GET['nama_lengkap']))
        $nama_lengkap = $_GET['nama_lengkap'];
    if (!empty($_GET['mulai_kerja']))
        $mulai_kerja = $_GET['mulai_kerja'];
    if (!empty($_GET['pinjaman_terakhir']))
        $pinjaman_terakhir = $_GET['pinjaman_terakhir'];
    if (!empty($_GET['pelunasan_terakhir']))
        $pelunasan_terakhir = $_GET['pelunasan_terakhir'];
    if (!empty($_GET['nik']))
        $nik = $_GET['nik'];
    if (!empty($_GET['jabatan']))
        $jabatan = $_GET['jabatan'];
    if (!empty($_GET['gaji']))
        $gaji = $_GET['gaji'];
    if (!empty($_GET['nilai_loan']))
        $nilai_loan = $_GET['nilai_loan'];
    if (!empty($_GET['keperluan']))
        $keperluan = $_GET['keperluan'];
    if (!empty($_GET['pelunasan']))
        $pelunasan = $_GET['pelunasan'];
    if (!empty($_GET['pemohon']))
        $pemohon = $_GET['pemohon'];
    if (!empty($_GET['status']))
        $status = $_GET['status'];

    if ($id_pinjam == null) {
        $query = "UPDATE pinjam_karyawan SET id_karyawan = '$id_karyawan', nama_lengkap = '$nama_lengkap', mulai_kerja = '$mulai_kerja', pinjaman_terakhir = '$pinjaman_terakhir', pelunasan_terakhir = '$pelunasan_terakhir', nik = '$nik', jabatan = '$jabatan', gaji = '$gaji', nilai_loan = '$nilai_loan', keperluan = '$keperluan',pelunasan = '$pelunasan',pemohon = '$pemohon' , status = '$status'";
        $result = $connect->query($query);

        if ($result) {
            $response = array(
                'status' => 1,
                'data' => 'Sukses'
            );
        } else {
            $response = array(
                'status' => 0,
                'data' => 'Gagal'
            );
        }
    } else {
        $query = "UPDATE pinjam_karyawan SET jumlah_bayar = '$jumlah_bayar' WHERE id_pinjam = '$id_pinjam'";
        $result = $connect->query($query);

        if ($result) {
            $response = array(
                'status' => 1,
                'data' => 'Sukses Update'
            );
        } else {
            $response = array(
                'status' => 0,
                'data' => 'Gagal Update'
            );
        }
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}


function setUpdatePinjamAdmin()
{
    global $connect;
    if (!empty($_GET['id_pinjam']))
        $id_pinjam = $_GET['id_pinjam'];
    if (!empty($_GET['id_karyawan']))
        $id_karyawan = $_GET['id_karyawan'];
    if (!empty($_GET['nama_lengkap']))
        $nama_lengkap = $_GET['nama_lengkap'];
    if (!empty($_GET['mulai_kerja']))
        $mulai_kerja = $_GET['mulai_kerja'];
    if (!empty($_GET['jumlah_pinjam']))
        $jumlah_pinjam = $_GET['jumlah_pinjam'];
    if (!empty($_GET['tanggal_pinjam']))
        $tanggal_pinjam = $_GET['tanggal_pinjam'];
    if (!empty($_GET['pelunasan_terakhir']))
        $pelunasan_terakhir = $_GET['pelunasan_terakhir'];
    if (!empty($_GET['nik']))
        $nik = $_GET['nik'];
    if (!empty($_GET['jabatan']))
        $jabatan = $_GET['jabatan'];
    if (!empty($_GET['gaji']))
        $gaji = $_GET['gaji'];
    if (!empty($_GET['jumlah_bayar']))
        $jumlah_bayar = $_GET['jumlah_bayar'];
    if (!empty($_GET['keperluan']))
        $keperluan = $_GET['keperluan'];
    if (!empty($_GET['pelunasan']))
        $pelunasan = $_GET['pelunasan'];
    if (!empty($_GET['pemohon']))
        $pemohon = $_GET['pemohon'];
    if (!empty($_GET['disetujui_oleh']))
        $disetujui_oleh = $_GET['disetujui_oleh'];
    if (!empty($_GET['status']))
        $status = $_GET['status'];


    $query = "UPDATE pinjam_karyawan SET id_karyawan = '$id_karyawan', nama_lengkap = '$nama_lengkap', mulai_kerja = '$mulai_kerja', jumlah_pinjam = '$jumlah_pinjam',tanggal_pinjam = '$tanggal_pinjam', pelunasan_terakhir = '$pelunasan_terakhir', nik = '$nik', jabatan = '$jabatan', gaji = '$gaji', jumlah_bayar = '$jumlah_bayar', keperluan = '$keperluan',pelunasan = '$pelunasan',pemohon = '$pemohon' ,disetujui_oleh = '$disetujui_oleh' , status = '$status' WHERE id_pinjam = '$id_pinjam'";
    $result = $connect->query($query);

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => 'Sukses'
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}


function setUpdateDinasAdmin()
{
    global $connect;
    if (!empty($_GET['id_user']))
        $id_user = $_GET['id_user'];
    if (!empty($_GET['id_divisi']))
        $id_divisi = $_GET['id_divisi'];
    if (!empty($_GET['nama_pengajuan']))
        $nama_pengajuan = $_GET['nama_pengajuan'];
    if (!empty($_GET['jabatan']))
        $jabatan = $_GET['jabatan'];
    if (!empty($_GET['project']))
        $project = $_GET['project'];
    if (!empty($_GET['tujuan']))
        $tujuan = $_GET['tujuan'];
    if (!empty($_GET['jumlah_personel']))
        $jumlah_personel = $_GET['jumlah_personel'];
    if (!empty($_GET['nama_personel']))
        $nama_personel = $_GET['nama_personel'];
    if (!empty($_GET['kota_tujuan']))
        $kota_tujuan = $_GET['kota_tujuan'];
    if (!empty($_GET['tanggal_berangkat']))
        $tanggal_berangkat = $_GET['tanggal_berangkat'];
    if (!empty($_GET['waktu_berangkat']))
        $waktu_berangkat = $_GET['waktu_berangkat'];
    if (!empty($_GET['kota_pulang']))
        $kota_pulang = $_GET['kota_pulang'];
    if (!empty($_GET['tanggal_pulang']))
        $tanggal_pulang = $_GET['tanggal_pulang'];
    if (!empty($_GET['transportasi']))
        $transportasi = $_GET['transportasi'];
    if (!empty($_GET['hotel']))
        $hotel = $_GET['hotel'];
    if (!empty($_GET['bagasi']))
        $bagasi = $_GET['bagasi'];
    if (!empty($_GET['cash']))
        $cash = $_GET['cash'];
    if (!empty($_GET['cash_advance']))
        $cash_advance = $_GET['cash_advance'];
    if (!empty($_GET['keterangan']))
        $keterangan = $_GET['keterangan'];
    if (!empty($_GET['diminta_oleh']))
        $diminta_oleh = $_GET['diminta_oleh'];
    if (!empty($_GET['diketahui_oleh']))
        $diketahui_oleh = $_GET['diketahui_oleh'];
    if (!empty($_GET['disetujui_oleh']))
        $disetujui_oleh = $_GET['disetujui_oleh'];
    if (!empty($_GET['status']))
        $status = $_GET['status'];


    $query = "UPDATE perjalanan_dinas SET id_user = '$id_user', id_divisi = '$id_divisi', nama_pengajuan = '$nama_pengajuan', jabatan = '$jabatan', project = '$project', tujuan = '$tujuan', jumlah_personel = '$jumlah_personel', nama_personel = '$nama_personel', kota_tujuan = '$kota_tujuan', tanggal_berangkat = '$tanggal_berangkat',waktu_berangkat = '$waktu_berangkat',kota_pulang = '$kota_pulang' ,tanggal_pulang = '$tanggal_pulang', transportasi = '$transportasi', hotel = '$hotel', bagasi = '$bagasi', cash = '$cash', cash_advance = '$cash_advance', keterangan = '$keterangan', diminta_oleh = '$diminta_oleh', diketahui_oleh = '$diketahui_oleh',disetujui_oleh = '$disetujui_oleh', status = '$status'";
    $result = $connect->query($query);

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => 'Sukses'
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function setPerjalanan()
{
    global $connect;
    if (!empty($_GET['id_user']))
        $id_user = $_GET['id_user'];
    if (!empty($_GET['id_divisi']))
        $id_divisi = $_GET['id_divisi'];
    if (!empty($_GET['nama_pengajuan']))
        $nama_pengajuan = $_GET['nama_pengajuan'];
    if (!empty($_GET['jabatan']))
        $jabatan = $_GET['jabatan'];
    if (!empty($_GET['project']))
        $project = $_GET['project'];
    if (!empty($_GET['tujuan']))
        $tujuan = $_GET['tujuan'];
    if (!empty($_GET['jumlah_personel']))
        $jumlah_personel = $_GET['jumlah_personel'];
    if (!empty($_GET['nama_personel']))
        $nama_personel = $_GET['nama_personel'];
    if (!empty($_GET['jenis_perjalanan']))
        $jenis_perjalanan = $_GET['jenis_perjalanan'];
    if (!empty($_GET['kota_tujuan']))
        $kota_tujuan = $_GET['kota_tujuan'];
    if (!empty($_GET['tanggal_berangkat']))
        $tanggal_berangkat = $_GET['tanggal_berangkat'];
    if (!empty($_GET['waktu_berangkat']))
        $waktu_berangkat = $_GET['waktu_berangkat'];
    if (!empty($_GET['kota_pulang']))
        $kota_pulang = $_GET['kota_pulang'];
    if (!empty($_GET['tanggal_pulang']))
        $tanggal_pulang = $_GET['tanggal_pulang'];
    if (!empty($_GET['transportasi']))
        $transportasi = $_GET['transportasi'];
    if (!empty($_GET['hotel']))
        $hotel = $_GET['hotel'];
    if (!empty($_GET['bagasi']))
        $bagasi = $_GET['bagasi'];
    if (!empty($_GET['cash']))
        $cash = $_GET['cash'];
    if (!empty($_GET['cash_advance']))
        $cash_advance = $_GET['cash_advance'];
    if (!empty($_GET['keterangan']))
        $keterangan = $_GET['keterangan'];
    if (!empty($_GET['status']))
        $status = $_GET['status'];


    $query = "INSERT INTO perjalanan_dinas SET id_user = '$id_user', id_divisi = '$id_divisi', nama_pengajuan = '$nama_pengajuan', jabatan = '$jabatan', project = '$project', tujuan = '$tujuan', jumlah_personel = '$jumlah_personel', nama_personel = '$nama_personel', jenis_perjalanan = '$jenis_perjalanan', kota_tujuan = '$kota_tujuan', tanggal_berangkat = '$tanggal_berangkat',waktu_berangkat = '$waktu_berangkat',kota_pulang = '$kota_pulang' ,tanggal_pulang = '$tanggal_pulang', transportasi = '$transportasi', hotel = '$hotel', bagasi = '$bagasi', cash = '$cash',cash_advance = '$cash_advance', keterangan = '$keterangan', status = '$status'";
    $result = $connect->query($query);

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => 'Sukses'
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function setPinjaman()
{
    global $connect;
    if (!empty($_GET['id_pinjam']))
        $id_pinjam = $_GET['id_pinjam'];
    if (!empty($_GET['id_karyawan']))
        $id_karyawan = $_GET['id_karyawan'];
    if (!empty($_GET['nama_lengkap']))
        $nama_lengkap = $_GET['nama_lengkap'];
    if (!empty($_GET['mulai_kerja']))
        $mulai_kerja = $_GET['mulai_kerja'];
    if (!empty($_GET['jumlah_pinjam']))
        $jumlah_pinjam = $_GET['jumlah_pinjam'];
    if (!empty($_GET['tanggal_pinjam']))
        $tanggal_pinjam = $_GET['tanggal_pinjam'];
    if (!empty($_GET['pelunasan_terakhir']))
        $pelunasan_terakhir = $_GET['pelunasan_terakhir'];
    if (!empty($_GET['nik']))
        $nik = $_GET['nik'];
    if (!empty($_GET['jabatan']))
        $jabatan = $_GET['jabatan'];
    if (!empty($_GET['gaji']))
        $gaji = $_GET['gaji'];
    if (!empty($_GET['jumlah_bayar']))
        $jumlah_bayar = $_GET['jumlah_bayar'];
    if (!empty($_GET['jumlah_cicilan']))
        $jumlah_cicilan = $_GET['jumlah_cicilan'];
    if (!empty($_GET['keperluan']))
        $keperluan = $_GET['keperluan'];
    if (!empty($_GET['pelunasan']))
        $pelunasan = $_GET['pelunasan'];
    if (!empty($_GET['pemohon']))
        $pemohon = $_GET['pemohon'];
    if (!empty($_GET['status']))
        $status = $_GET['status'];

    if ($id_pinjam == null) {
        $query = "INSERT INTO pinjam_karyawan SET id_karyawan = '$id_karyawan', nama_lengkap = '$nama_lengkap', mulai_kerja = '$mulai_kerja', jumlah_pinjam = '$jumlah_pinjam',tanggal_pinjam = '$tanggal_pinjam', pelunasan_terakhir = '$pelunasan_terakhir', nik = '$nik', jabatan = '$jabatan', gaji = '$gaji', jumlah_cicilan = '$jumlah_cicilan', keperluan = '$keperluan',pelunasan = '$pelunasan',pemohon = '$pemohon', status = '$status'";
        $result = $connect->query($query);

        if ($result) {
            $response = array(
                'status' => 1,
                'data' => 'Sukses'
            );
        } else {
            $response = array(
                'status' => 0,
                'data' => 'Gagal'
            );
        }
    } else {
        $query = "UPDATE pinjam_karyawan SET jumlah_bayar = '$jumlah_bayar' WHERE id_pinjam = '$id_pinjam'";
        $result = $connect->query($query);
        if ($result) {
            $response = array(
                'status' => 1,
                'data' => 'Sukses'
            );
        } else {
            $response = array(
                'status' => 0,
                'data' => 'Gagal'
            );
        }
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function getKaryawanKor()
{

    global $connect;
    if (!empty($_GET['id_user']))
        $id_user = $_GET['id_user'];

    $query = "SELECT * FROM karyawan LEFT JOIN divisi ON karyawan.id_divisi = divisi.id_divisi WHERE karyawan.id_user = $id_user ORDER BY level_user desc";
    $result = $connect->query($query);
    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
function getKaryawanstaff()
{

    global $connect;
    if (!empty($_GET['id_karyawan']))
        $id_karyawan = $_GET['id_karyawan'];

    $query = "SELECT * FROM karyawan LEFT JOIN divisi ON karyawan.id_divisi = divisi.id_divisi WHERE karyawan.id_karyawan = $id_karyawan";
    $result = $connect->query($query);
    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function getKPItekno()
{

    global $connect;
    if (!empty($_GET['id_user']))
        $id_user = $_GET['id_user'];
    $query = "SELECT * FROM kpitekno
    LEFT JOIN divisi ON kpitekno.id_divisi = divisi.id_divisi
    WHERE kpitekno.id_user =  $id_user";
    $result = $connect->query($query);

    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function getKPIadmin()
{

    global $connect;
    $query = "SELECT * FROM kpitekno
    LEFT JOIN divisi ON kpitekno.id_divisi = divisi.id_divisi";
    $result = $connect->query($query);

    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function getKaryawanPinjam()
{

    global $connect;
    $query = "SELECT * FROM karyawan LEFT JOIN divisi ON karyawan.id_divisi = divisi.id_divisi ORDER BY level_user desc";
    $result = $connect->query($query);

    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
function getKaryawanMuncul()
{

    global $connect;
    if (!empty($_GET['nama_lengkap']))
        $nama_lengkap = $_GET['nama_lengkap'];
    $query = "SELECT * FROM karyawan LEFT JOIN divisi ON karyawan.id_divisi = divisi.id_divisi WHERE nama_lengkap = '$nama_lengkap';
    ";
    $result = $connect->query($query);

    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function getPayroll()
{

    global $connect;
    if (!empty($_GET['nomor_induk']))
        $nomor_induk = $_GET['nomor_induk'];
    $query = "SELECT DISTINCT
    ak.*,
    k.*,
    d.*
    FROM 
        absen_karyawan AS ak
    INNER JOIN 
        karyawan AS k ON ak.nomor_induk = k.nomor_induk
    INNER JOIN 
        divisi AS d ON k.id_divisi = d.id_divisi
    WHERE 
        ak.nomor_induk = '$nomor_induk'
        ";
    $result = $connect->query($query);

    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
function getPayroll2()
{

    global $connect;
    if (!empty($_GET['id_karyawan']))
        $id_karyawan = $_GET['id_karyawan'];
    $query = "SELECT DISTINCT ak.*, k.*, d.* FROM absen AS ak INNER JOIN karyawan AS k ON ak.id_karyawan = k.id_karyawan INNER JOIN divisi AS d ON k.id_divisi = d.id_divisi WHERE ak.id_karyawan = '$id_karyawan'";
    $result = $connect->query($query);

    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function getKaryawan()
{

    global $connect;
    if (!empty($_GET['id_user']))
        $id_user = $_GET['id_user'];
    $query = "SELECT * FROM karyawan LEFT JOIN user ON user.id_user = karyawan.id_user WHERE karyawan.id_user = $id_user";
    $result = $connect->query($query);

    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function getDinas()
{

    global $connect;
    if (!empty($_GET['id_user']))
        $id_user = $_GET['id_user'];
    $query = "SELECT *
    FROM perjalanan_dinas
    LEFT JOIN divisi ON perjalanan_dinas.id_divisi = divisi.id_divisi
    WHERE perjalanan_dinas.id_user = $id_user";
    $result = $connect->query($query);

    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function gePinjamKaryawan()
{
    global $connect;

    // Initialize $id_karyawan to null
    $id_karyawan = null;

    if (!empty($_GET['id_karyawan'])) {
        $id_karyawan = $_GET['id_karyawan'];

        // Use prepared statements to prevent SQL injection
        $query = "SELECT * FROM history_pinjam 
            LEFT JOIN pinjam_karyawan ON history_pinjam.id_karyawan = pinjam_karyawan.id_karyawan 
            WHERE pinjam_karyawan.id_karyawan = ?";

        // Prepare the statement
        $stmt = $connect->prepare($query);

        // Bind the parameter
        $stmt->bind_param("s", $id_karyawan);

        // Execute the statement
        $stmt->execute();

        // Get the result
        $result = $stmt->get_result();
    } else {
        $query = "SELECT * FROM  pinjam_karyawan LEFT JOIN history_pinjam ON pinjam_karyawan.id_karyawan = history_pinjam.id_karyawan where jumlah_bayar_history > 0 ORDER BY nama_lengkap ASC";
        $result = $connect->query($query);
    }

    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}



function getPinjamKaryawanEdit()
{
    global $connect;

    // Ensure that either 'id_pinjam' or 'id_karyawan' is provided in the query parameters
    if (isset($_GET['id_pinjam'])) {
        $id_pinjam = mysqli_real_escape_string($connect, $_GET['id_pinjam']);
        $query = "SELECT * FROM pinjam_karyawan WHERE id_pinjam = '$id_pinjam'";
    } elseif (isset($_GET['id_karyawan'])) {
        $id_karyawan = mysqli_real_escape_string($connect, $_GET['id_karyawan']);
        $query = "SELECT * FROM pinjam_karyawan WHERE id_karyawan = '$id_karyawan'";
    } else {
        // Handle the case where neither 'id_pinjam' nor 'id_karyawan' is provided
        $response = array(
            'status' => 0,
            'data' => 'Missing parameters'
        );
        header('Content-Type: application/json');
        echo json_encode($response);
        return;
    }

    $result = $connect->query($query);

    if (!$result) {
        // Handle the case where the query fails
        $response = array(
            'status' => 0,
            'data' => 'Query error: ' . mysqli_error($connect)
        );
    } else {
        $data = array();

        while ($row = mysqli_fetch_object($result)) {
            $data[] = $row;
        }

        $response = array(
            'status' => 1,
            'data' => $data
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}


function getProfilePendidikan()
{

    global $connect;
    if (!empty($_GET['id_karyawan']))
        $id_karyawan = $_GET['id_karyawan'];
    $query = "SELECT * FROM pendidikan WHERE id_karyawan = $id_karyawan;
    ";
    $result = $connect->query($query);

    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function getDinasAll()
{

    global $connect;
    $query = "SELECT * FROM perjalanan_dinas LEFT JOIN divisi ON perjalanan_dinas.id_divisi = divisi.id_divisi";
    $result = $connect->query($query);

    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function getPinjsmKaryawanAll()
{

    global $connect;
    $query = "SELECT * FROM pinjam_karyawan";
    $result = $connect->query($query);

    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function getDinasId()
{

    global $connect;
    if (!empty($_GET['id_dinas']))
        $id_dinas = $_GET['id_dinas'];
    $query = "SELECT * FROM perjalanan_dinas LEFT JOIN divisi ON perjalanan_dinas.id_divisi = divisi.id_divisi WHERE id_dinas = $id_dinas";
    $result = $connect->query($query);

    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function getKaryawanById()
{

    global $connect;
    if (!empty($_GET['id_karyawan']))
        $id_karyawan = $_GET['id_karyawan'];

    $query = "SELECT * FROM karyawan LEFT JOIN divisi ON karyawan.id_divisi = divisi.id_divisi WHERE id_karyawan = '$id_karyawan'";
    $result = $connect->query($query);

    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
function getKaryawanByIddivisi()
{

    global $connect;
    if (!empty($_GET['id_divisi']))
        $id_divisi = $_GET['id_divisi'];

    $query = "SELECT karyawan.*, divisi.nama_divisi 
    FROM karyawan 
    LEFT JOIN divisi ON karyawan.id_divisi = divisi.id_divisi 
    WHERE karyawan.id_divisi = $id_divisi
    ";
    $result = $connect->query($query);

    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}


function getDeleteKaryawanId()
{
    global $connect;
    if (!empty($_GET['id_karyawan']))
        $id_karyawan = $_GET['id_karyawan'];
    // $id_karyawan = $_GET["id_karyawan"];

    // $query = "DELETE FROM karyawan WHERE id_karyawan = $id_karyawan";
    $query = "UPDATE karyawan SET id_user = 0 where id_karyawan = $id_karyawan";
    $result = $connect->query($query);
    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function getDeleteKaryawanAdmin()
{
    global $connect;
    if (!empty($_GET['id_karyawan']))
        $id_karyawan = $_GET['id_karyawan'];

    $query = "DELETE FROM karyawan WHERE id_karyawan = $id_karyawan";
    $result = $connect->query($query);
    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function getDeleteBudget()
{
    global $connect;
    if (!empty($_GET['id_form']))
        $id_form = $_GET['id_form'];

    $query = "DELETE FROM form_request WHERE id_form = $id_form";
    $result = $connect->query($query);
    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
function getDeleteKPIadmin()
{
    global $connect;
    if (!empty($_GET['id_kpi_it']))
        $id_kpi_it = $_GET['id_kpi_it'];

    $query = "DELETE FROM kpitekno WHERE id_kpi_it = $id_kpi_it";
    $result = $connect->query($query);
    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function getDeleteKpitekno()
{
    global $connect;
    if (!empty($_GET['id_karyawan']))
        $id_karyawan = $_GET['id_karyawan'];

    $query = "DELETE FROM kpitekno WHERE id_karyawan = $id_karyawan";
    $result = $connect->query($query);
    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
function getDeleteCutiKaryawan()
{
    global $connect;
    if (!empty($_GET['id_cuti']))
        $id_cuti = $_GET['id_cuti'];

    $query = "DELETE FROM cuti WHERE id_cuti = $id_cuti";
    $result = $connect->query($query);
    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function getDeleteLembur()
{
    global $connect;
    $id_lembur = $_GET["id_lembur"];

    $query = "DELETE FROM lembur WHERE id_lembur = $id_lembur";
    $result = $connect->query($query);
    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function getDeleteEvaluasiId()
{
    global $connect;
    $id_evaluasi = $_GET["id_evaluasi"];

    $query = "DELETE FROM evaluasi WHERE id_evaluasi = $id_evaluasi";
    $result = $connect->query($query);
    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function getDeleteDinasId()
{
    global $connect;
    $id_dinas = $_GET["id_dinas"];
    $id_pinjam = $_GET["id_pinjam"];

    if ($id_pinjam == null) {
        $query = "DELETE FROM perjalanan_dinas WHERE id_dinas = ?";
        $stmt = $connect->prepare($query);
        $stmt->bind_param("i", $id_dinas);
    } else {
        $query = "DELETE FROM pinjam_karyawan WHERE id_pinjam = ?";
        $query = "DELETE FROM history_pinjam WHERE id_pinjam = ?";
        $stmt = $connect->prepare($query);
        $stmt->bind_param("i", $id_pinjam);
    }

    if ($stmt->execute()) {
        $response = array(
            'status' => 1,
            'data' => 'Berhasil menghapus data'
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal menghapus data'
        );
    }

    $stmt->close();

    header('Content-Type: application/json');
    echo json_encode($response);
}

function getDeletePinjamKaryawan()
{
    global $connect;
    $id_pinjam = $_GET["id_pinjam"];

    $query = "DELETE FROM pinjam_karyawan WHERE id_pinjam = $id_pinjam";
    $result = $connect->query($query);
    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row;
    }

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function getDeleteInventaris()
{
    global $connect;
    if (!empty($_GET['id_inventaris']))
        $id_inventaris = $_GET['id_inventaris'];
    if (!empty($_GET['id_payroll']))
        $id_payroll = $_GET['id_payroll'];

    if ($id_payroll == null) {
        $query = "DELETE FROM inventaris WHERE id_inventaris = $id_inventaris";
        $result = $connect->query($query);
        while ($row = mysqli_fetch_object($result)) {
            $data[] = $row;
        }

        if ($result) {
            $response = array(
                'status' => 1,
                'data' => $data
            );
        } else {
            $response = array(
                'status' => 0,
                'data' => 'Gagal'
            );
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        $query = "DELETE FROM payroll WHERE id_payroll = $id_payroll";
        $result = $connect->query($query);
        while ($row = mysqli_fetch_object($result)) {
            $data[] = $row;
        }

        if ($result) {
            $response = array(
                'status' => 1,
                'data' => $data
            );
        } else {
            $response = array(
                'status' => 0,
                'data' => 'Gagal'
            );
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }
}

function getDeleteService()
{
    global $connect;
    $id_service = $_GET["id_service"];
    $id_evaluasi = $_GET["id_evaluasi"];

    if ($id_evaluasi == null) {
        $query = "DELETE FROM service WHERE id_service = $id_service";
        $result = $connect->query($query);
        while ($row = mysqli_fetch_object($result)) {
            $data[] = $row;
        }
    } else {
        $query = "DELETE FROM evaluasi WHERE id_evaluasi = $id_evaluasi";
        $result = $connect->query($query);
        while ($row = mysqli_fetch_object($result)) {
            $data[] = $row;
        }
    }
    if ($result) {
        $response = array(
            'status' => 1,
            'data' => $data
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}


function setUpdateKaryawan()
{
    global $connect;
    if (!empty($_GET['id_karyawan']))
        $id_karyawan = $_GET['id_karyawan'];
    if (!empty($_GET['id_divisi']))
        $id_divisi = $_GET['id_divisi'];
    if (!empty($_GET['nomor_induk']))
        $nomor_induk = $_GET['nomor_induk'];
    if (!empty($_GET['nama_lengkap']))
        $nama_lengkap = $_GET['nama_lengkap'];
    if (!empty($_GET['jenis_kelamin']))
        $jenis_kelamin = $_GET['jenis_kelamin'];
    if (!empty($_GET['tempat_lahir']))
        $tempat_lahir = $_GET['tempat_lahir'];
    if (!empty($_GET['tanggal_lahir']))
        $tanggal_lahir = $_GET['tanggal_lahir'];
    if (!empty($_GET['alamat_ktp']))
        $alamat_ktp = $_GET['alamat_ktp'];
    if (!empty($_GET['alamat_domisili']))
        $alamat_domisili = $_GET['alamat_domisili'];
    if (!empty($_GET['no_hp']))
        $no_hp = $_GET['no_hp'];
    if (!empty($_GET['no_ktp']))
        $no_ktp = $_GET['no_ktp'];
    if (!empty($_GET['no_npwp']))
        $no_npwp = $_GET['no_npwp'];
    if (!empty($_GET['agama']))
        $agama = $_GET['agama'];
    if (!empty($_GET['gol_darah']))
        $gol_darah = $_GET['gol_darah'];
    if (!empty($_GET['status_pernikahan']))
        $status_pernikahan = $_GET['status_pernikahan'];
    if (!empty($_GET['status_karyawan']))
        $status_karyawan = $_GET['status_karyawan'];
    if (!empty($_GET['email']))
        $email = $_GET['email'];
    if (!empty($_GET['password']))
        $password = $_GET['password'];
    if (!empty($_GET['level_user']))
        $level_user = $_GET['level_user'];
    if (!empty($_GET['foto_karyawan']))
        $foto_karyawan = $_GET['foto_karyawan'];
    if (!empty($_GET['gaji']))
        $gaji = $_GET['gaji'];
    if (!empty($_GET['uang_makan']))
        $uang_makan = $_GET['uang_makan'];
    if (!empty($_GET['mulai_kerja']))
        $mulai_kerja = $_GET['mulai_kerja'];
    if (!empty($_GET['akhir_kerja']))
        $akhir_kerja = $_GET['akhir_kerja'];
    if (!empty($_GET['kontrak_kerja']))
        $kontrak_kerja = $_GET['kontrak_kerja'];


    $query = "UPDATE karyawan SET id_divisi = '$id_divisi', nomor_induk = '$nomor_induk', nama_lengkap = '$nama_lengkap', jenis_kelamin = '$jenis_kelamin', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', alamat_ktp = '$alamat_ktp', alamat_domisili = '$alamat_domisili', no_hp = '$no_hp', no_ktp = '$no_ktp', no_npwp = '$no_npwp', agama = '$agama', gol_darah = '$gol_darah', status_pernikahan = '$status_pernikahan', status_karyawan = '$status_karyawan', email = '$email', password = '$password', level_user = '$level_user', foto_karyawan = '$foto_karyawan', gaji = '$gaji', uang_makan = '$uang_makan', mulai_kerja = '$mulai_kerja', akhir_kerja = '$akhir_kerja', kontrak_kerja = '$kontrak_kerja' WHERE id_karyawan = '$id_karyawan'";
    $result = $connect->query($query);

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => 'Sukses'
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function setUpdateKaryawanNoFtPw()
{
    global $connect;
    if (!empty($_GET['id_karyawan']))
        $id_karyawan = $_GET['id_karyawan'];
    if (!empty($_GET['id_divisi']))
        $id_divisi = $_GET['id_divisi'];
    if (!empty($_GET['nomor_induk']))
        $nomor_induk = $_GET['nomor_induk'];
    if (!empty($_GET['nama_lengkap']))
        $nama_lengkap = $_GET['nama_lengkap'];
    if (!empty($_GET['jenis_kelamin']))
        $jenis_kelamin = $_GET['jenis_kelamin'];
    if (!empty($_GET['tempat_lahir']))
        $tempat_lahir = $_GET['tempat_lahir'];
    if (!empty($_GET['tanggal_lahir']))
        $tanggal_lahir = $_GET['tanggal_lahir'];
    if (!empty($_GET['alamat_ktp']))
        $alamat_ktp = $_GET['alamat_ktp'];
    if (!empty($_GET['alamat_domisili']))
        $alamat_domisili = $_GET['alamat_domisili'];
    if (!empty($_GET['no_hp']))
        $no_hp = $_GET['no_hp'];
    if (!empty($_GET['no_ktp']))
        $no_ktp = $_GET['no_ktp'];
    if (!empty($_GET['no_npwp']))
        $no_npwp = $_GET['no_npwp'];
    if (!empty($_GET['agama']))
        $agama = $_GET['agama'];
    if (!empty($_GET['gol_darah']))
        $gol_darah = $_GET['gol_darah'];
    if (!empty($_GET['status_pernikahan']))
        $status_pernikahan = $_GET['status_pernikahan'];
    if (!empty($_GET['status_karyawan']))
        $status_karyawan = $_GET['status_karyawan'];
    if (!empty($_GET['email']))
        $email = $_GET['email'];
    if (!empty($_GET['password']))
        $password = $_GET['password'];
    if (!empty($_GET['level_user']))
        $level_user = $_GET['level_user'];
    if (!empty($_GET['foto_karyawan']))
        $foto_karyawan = $_GET['foto_karyawan'];
    if (!empty($_GET['gaji']))
        $gaji = $_GET['gaji'];
    if (!empty($_GET['uang_makan']))
        $uang_makan = $_GET['uang_makan'];
    if (!empty($_GET['mulai_kerja']))
        $mulai_kerja = $_GET['mulai_kerja'];
    if (!empty($_GET['akhir_kerja']))
        $akhir_kerja = $_GET['akhir_kerja'];


    $query = "UPDATE karyawan SET id_divisi = '$id_divisi', nomor_induk = '$nomor_induk', nama_lengkap = '$nama_lengkap', jenis_kelamin = '$jenis_kelamin', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', alamat_ktp = '$alamat_ktp', alamat_domisili = '$alamat_domisili', no_hp = '$no_hp', no_ktp = '$no_ktp', no_npwp = '$no_npwp', agama = '$agama', gol_darah = '$gol_darah', status_pernikahan = '$status_pernikahan', status_karyawan = '$status_karyawan', email = '$email', level_user = '$level_user', gaji = '$gaji', uang_makan = '$uang_makan', mulai_kerja = '$mulai_kerja', akhir_kerja = '$akhir_kerja' WHERE id_karyawan = '$id_karyawan'";
    $result = $connect->query($query);

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => 'Sukses'
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function setUpdateKaryawanNoFoto()
{
    global $connect;
    if (!empty($_GET['id_karyawan']))
        $id_karyawan = $_GET['id_karyawan'];
    if (!empty($_GET['id_divisi']))
        $id_divisi = $_GET['id_divisi'];
    if (!empty($_GET['nomor_induk']))
        $nomor_induk = $_GET['nomor_induk'];
    if (!empty($_GET['nama_lengkap']))
        $nama_lengkap = $_GET['nama_lengkap'];
    if (!empty($_GET['jenis_kelamin']))
        $jenis_kelamin = $_GET['jenis_kelamin'];
    if (!empty($_GET['tempat_lahir']))
        $tempat_lahir = $_GET['tempat_lahir'];
    if (!empty($_GET['tanggal_lahir']))
        $tanggal_lahir = $_GET['tanggal_lahir'];
    if (!empty($_GET['alamat_ktp']))
        $alamat_ktp = $_GET['alamat_ktp'];
    if (!empty($_GET['alamat_domisili']))
        $alamat_domisili = $_GET['alamat_domisili'];
    if (!empty($_GET['no_hp']))
        $no_hp = $_GET['no_hp'];
    if (!empty($_GET['no_ktp']))
        $no_ktp = $_GET['no_ktp'];
    if (!empty($_GET['no_npwp']))
        $no_npwp = $_GET['no_npwp'];
    if (!empty($_GET['agama']))
        $agama = $_GET['agama'];
    if (!empty($_GET['gol_darah']))
        $gol_darah = $_GET['gol_darah'];
    if (!empty($_GET['status_pernikahan']))
        $status_pernikahan = $_GET['status_pernikahan'];
    if (!empty($_GET['status_karyawan']))
        $status_karyawan = $_GET['status_karyawan'];
    if (!empty($_GET['email']))
        $email = $_GET['email'];
    if (!empty($_GET['password']))
        $password = $_GET['password'];
    if (!empty($_GET['level_user']))
        $level_user = $_GET['level_user'];
    if (!empty($_GET['foto_karyawan']))
        $foto_karyawan = $_GET['foto_karyawan'];
    if (!empty($_GET['gaji']))
        $gaji = $_GET['gaji'];
    if (!empty($_GET['uang_makan']))
        $uang_makan = $_GET['uang_makan'];
    if (!empty($_GET['mulai_kerja']))
        $mulai_kerja = $_GET['mulai_kerja'];
    if (!empty($_GET['akhir_kerja']))
        $akhir_kerja = $_GET['akhir_kerja'];


    $query = "UPDATE karyawan SET id_divisi = '$id_divisi', nomor_induk = '$nomor_induk', nama_lengkap = '$nama_lengkap', jenis_kelamin = '$jenis_kelamin', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', alamat_ktp = '$alamat_ktp', alamat_domisili = '$alamat_domisili', no_hp = '$no_hp', no_ktp = '$no_ktp', no_npwp = '$no_npwp', agama = '$agama', gol_darah = '$gol_darah', status_pernikahan = '$status_pernikahan', status_karyawan = '$status_karyawan', email = '$email', password = '$password', level_user = '$level_user', gaji = '$gaji', uang_makan = '$uang_makan', mulai_kerja = '$mulai_kerja', akhir_kerja = '$akhir_kerja' WHERE id_karyawan = '$id_karyawan'";
    $result = $connect->query($query);

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => 'Sukses'
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}

function setUpdateKaryawanNoPassword()
{
    global $connect;
    if (!empty($_GET['id_karyawan']))
        $id_karyawan = $_GET['id_karyawan'];
    if (!empty($_GET['id_divisi']))
        $id_divisi = $_GET['id_divisi'];
    if (!empty($_GET['nomor_induk']))
        $nomor_induk = $_GET['nomor_induk'];
    if (!empty($_GET['nama_lengkap']))
        $nama_lengkap = $_GET['nama_lengkap'];
    if (!empty($_GET['jenis_kelamin']))
        $jenis_kelamin = $_GET['jenis_kelamin'];
    if (!empty($_GET['tempat_lahir']))
        $tempat_lahir = $_GET['tempat_lahir'];
    if (!empty($_GET['tanggal_lahir']))
        $tanggal_lahir = $_GET['tanggal_lahir'];
    if (!empty($_GET['alamat_ktp']))
        $alamat_ktp = $_GET['alamat_ktp'];
    if (!empty($_GET['alamat_domisili']))
        $alamat_domisili = $_GET['alamat_domisili'];
    if (!empty($_GET['no_hp']))
        $no_hp = $_GET['no_hp'];
    if (!empty($_GET['no_ktp']))
        $no_ktp = $_GET['no_ktp'];
    if (!empty($_GET['no_npwp']))
        $no_npwp = $_GET['no_npwp'];
    if (!empty($_GET['agama']))
        $agama = $_GET['agama'];
    if (!empty($_GET['gol_darah']))
        $gol_darah = $_GET['gol_darah'];
    if (!empty($_GET['status_pernikahan']))
        $status_pernikahan = $_GET['status_pernikahan'];
    if (!empty($_GET['status_karyawan']))
        $status_karyawan = $_GET['status_karyawan'];
    if (!empty($_GET['email']))
        $email = $_GET['email'];
    if (!empty($_GET['password']))
        $password = $_GET['password'];
    if (!empty($_GET['level_user']))
        $level_user = $_GET['level_user'];
    if (!empty($_GET['foto_karyawan']))
        $foto_karyawan = $_GET['foto_karyawan'];
    if (!empty($_GET['gaji']))
        $gaji = $_GET['gaji'];
    if (!empty($_GET['uang_makan']))
        $uang_makan = $_GET['uang_makan'];
    if (!empty($_GET['mulai_kerja']))
        $mulai_kerja = $_GET['mulai_kerja'];
    if (!empty($_GET['akhir_kerja']))
        $akhir_kerja = $_GET['akhir_kerja'];
    if (!empty($_GET['kontrak_kerja']))
        $kontrak_kerja = $_GET['kontrak_kerja'];


    $query = "UPDATE karyawan SET id_divisi = '$id_divisi', nomor_induk = '$nomor_induk', nama_lengkap = '$nama_lengkap', jenis_kelamin = '$jenis_kelamin', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', alamat_ktp = '$alamat_ktp', alamat_domisili = '$alamat_domisili', no_hp = '$no_hp', no_ktp = '$no_ktp', no_npwp = '$no_npwp', agama = '$agama', gol_darah = '$gol_darah', status_pernikahan = '$status_pernikahan', status_karyawan = '$status_karyawan', email = '$email', level_user = '$level_user', foto_karyawan = '$foto_karyawan', gaji = '$gaji', uang_makan = '$uang_makan', mulai_kerja = '$mulai_kerja', akhir_kerja = '$akhir_kerja', kontrak_kerja = '$kontrak_kerja' WHERE id_karyawan = '$id_karyawan'";
    $result = $connect->query($query);

    if ($result) {
        $response = array(
            'status' => 1,
            'data' => 'Sukses'
        );
    } else {
        $response = array(
            'status' => 0,
            'data' => 'Gagal'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
