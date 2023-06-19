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

function setEvaluasi()
{
    global $connect;
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
    if (!empty($_GET['catatan_hrd']))
        $catatan_hrd = $_GET['catatan_hrd'];
    if (!empty($_GET['dievaluasi_oleh']))
        $dievaluasi_oleh = $_GET['dievaluasi_oleh'];
    if (!empty($_GET['disetujui_oleh']))
        $disetujui_oleh = $_GET['disetujui_oleh'];


    $query = "INSERT INTO evaluasi SET id_karyawan = '$id_karyawan', lama_percobaan = '$lama_percobaan', nama_lengkap = '$nama_lengkap',  level_user = '$level_user', tanggal_kerja = '$tanggal_kerja', status = '$status', faktor_penilaian = '$faktor_penilaian', catatan_atasan = '$catatan_atasan', catatan_hrd = '$catatan_hrd', dievaluasi_oleh = '$dievaluasi_oleh', disetujui_oleh = '$disetujui_oleh'";
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

function getDivisibyIdDiv()
{

    global $connect;
    if (!empty($_GET['id_divisi']))
        $id_divisi = $_GET['id_divisi'];

    $query = "SELECT * FROM divisi WHERE id_divisi = '$id_divisi'";
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
    if (!empty($_GET['kode_divisi']))
        $kode_divisi = $_GET['kode_divisi'];
    if (!empty($_GET['nama_divisi']))
        $nama_divisi = $_GET['nama_divisi'];


    $query = "UPDATE divisi SET kode_divisi = '$kode_divisi', nama_divisi = '$nama_divisi' WHERE id_divisi = '$id_divisi'";
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
    $id_divisi = $_GET["id_divisi"];

    $query = "DELETE FROM divisi WHERE id_divisi = $id_divisi";
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
    if (!empty($_GET['password']))
        $password = $_GET['password'];
    if (!empty($_GET['level_user']))
        $level_user = $_GET['level_user'];
    if (!empty($_GET['foto_karyawan']))
        $foto_karyawan = $_GET['foto_karyawan'];


    $query = "INSERT INTO karyawan SET id_user = '$id_user',id_divisi = '$id_divisi', nama_lengkap = '$nama_lengkap', jenis_kelamin = '$jenis_kelamin', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', alamat_ktp = '$alamat_ktp', alamat_domisili = '$alamat_domisili', no_hp = '$no_hp', no_ktp = '$no_ktp', no_npwp = '$no_npwp', agama = '$agama', gol_darah = '$gol_darah', status_pernikahan = '$status_pernikahan', status_karyawan = '$status_karyawan', email = '$email', password = '$password', level_user = '$level_user', foto_karyawan = '$foto_karyawan'";
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
    if (!empty($_GET['cash_advance']))
        $cash_advance = $_GET['cash_advance'];
    if (!empty($_GET['keterangan']))
        $keterangan = $_GET['keterangan'];
    if (!empty($_GET['diminta_oleh']))
        $diminta_oleh = $_GET['diminta_oleh'];
    if (!empty($_GET['diketahui_oleh']))
        $diketahui_oleh = $_GET['diketahui_oleh'];
    if (!empty($_GET['status']))
        $status = $_GET['status'];


    $query = "UPDATE perjalanan_dinas SET id_user = '$id_user', id_divisi = '$id_divisi', nama_pengajuan = '$nama_pengajuan', jabatan = '$jabatan', project = '$project', tujuan = '$tujuan', jumlah_personel = '$jumlah_personel', nama_personel = '$nama_personel', kota_tujuan = '$kota_tujuan', tanggal_berangkat = '$tanggal_berangkat',waktu_berangkat = '$waktu_berangkat',kota_pulang = '$kota_pulang' ,tanggal_pulang = '$tanggal_pulang', transportasi = '$transportasi', hotel = '$hotel', bagasi = '$bagasi', cash_advance = '$cash_advance', keterangan = '$keterangan', diminta_oleh = '$diminta_oleh', diketahui_oleh = '$diketahui_oleh', status = '$status'";
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
    if (!empty($_GET['diminta_oleh']))
        $diminta_oleh = $_GET['diminta_oleh'];
    if (!empty($_GET['diketahui_oleh']))
        $diketahui_oleh = $_GET['diketahui_oleh'];
    if (!empty($_GET['disetujui_oleh']))
        $disetujui_oleh = $_GET['disetujui_oleh'];
    if (!empty($_GET['status']))
        $status = $_GET['status'];


    $query = "INSERT INTO perjalanan_dinas SET id_user = '$id_user', id_divisi = '$id_divisi', nama_pengajuan = '$nama_pengajuan', jabatan = '$jabatan', project = '$project', tujuan = '$tujuan', jumlah_personel = '$jumlah_personel', nama_personel = '$nama_personel', kota_tujuan = '$kota_tujuan', tanggal_berangkat = '$tanggal_berangkat',waktu_berangkat = '$waktu_berangkat',kota_pulang = '$kota_pulang' ,tanggal_pulang = '$tanggal_pulang', transportasi = '$transportasi', hotel = '$hotel', bagasi = '$bagasi', cash_advance = '$cash_advance', keterangan = '$keterangan', diminta_oleh = '$diminta_oleh', diketahui_oleh = '$diketahui_oleh', disetujui_oleh = '$disetujui_oleh', status = '$status'";
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

function getKaryawanKor()
{

    global $connect;
    if (!empty($_GET['id_user']))
        $id_user = $_GET['id_user'];
    $query = "SELECT * FROM karyawan LEFT JOIN divisi ON karyawan.id_divisi = divisi.id_divisi WHERE id_user = $id_user";
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
    $query = "SELECT * FROM karyawan 
    LEFT JOIN user ON user.id_user = karyawan.id_user 
    WHERE karyawan.id_user = 2";
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
    $query = "SELECT * FROM perjalanan_dinas LEFT JOIN divisi ON perjalanan_dinas.id_divisi = divisi.id_divisi WHERE id_user = $id_user";
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


function getDeleteKaryawanId()
{
    global $connect;
    $id_karyawan = $_GET["id_karyawan"];

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

function getDeleteDinasId()
{
    global $connect;
    $id_dinas = $_GET["id_dinas"];

    $query = "DELETE FROM perjalanan_dinas WHERE id_dinas = $id_dinas";
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
    $id_inventaris = $_GET["id_inventaris"];

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
}

function getDeleteService()
{
    global $connect;
    $id_service = $_GET["id_service"];

    $query = "DELETE FROM service WHERE id_service = $id_service";
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


function setUpdateKaryawan()
{
    global $connect;
    if (!empty($_GET['id_karyawan']))
        $id_karyawan = $_GET['id_karyawan'];
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
    if (!empty($_GET['password']))
        $password = $_GET['password'];
    if (!empty($_GET['level_user']))
        $level_user = $_GET['level_user'];
    if (!empty($_GET['foto_karyawan']))
        $foto_karyawan = $_GET['foto_karyawan'];


    $query = "UPDATE karyawan SET id_divisi = '$id_divisi', nama_lengkap = '$nama_lengkap', jenis_kelamin = '$jenis_kelamin', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', alamat_ktp = '$alamat_ktp', alamat_domisili = '$alamat_domisili', no_hp = '$no_hp', no_ktp = '$no_ktp', no_npwp = '$no_npwp', agama = '$agama', gol_darah = '$gol_darah', status_pernikahan = '$status_pernikahan', status_karyawan = '$status_karyawan', email = '$email', password = '$password', level_user = '$level_user', foto_karyawan = '$foto_karyawan' WHERE id_karyawan = '$id_karyawan'";
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


    $query = "UPDATE karyawan SET id_divisi = '$id_divisi', nama_lengkap = '$nama_lengkap', jenis_kelamin = '$jenis_kelamin', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', alamat_ktp = '$alamat_ktp', alamat_domisili = '$alamat_domisili', no_hp = '$no_hp', no_ktp = '$no_ktp', no_npwp = '$no_npwp', agama = '$agama', gol_darah = '$gol_darah', status_pernikahan = '$status_pernikahan', status_karyawan = '$status_karyawan', email = '$email', level_user = '$level_user' WHERE id_karyawan = '$id_karyawan'";
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


    $query = "UPDATE karyawan SET id_divisi = '$id_divisi', nama_lengkap = '$nama_lengkap', jenis_kelamin = '$jenis_kelamin', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', alamat_ktp = '$alamat_ktp', alamat_domisili = '$alamat_domisili', no_hp = '$no_hp', no_ktp = '$no_ktp', no_npwp = '$no_npwp', agama = '$agama', gol_darah = '$gol_darah', status_pernikahan = '$status_pernikahan', status_karyawan = '$status_karyawan', email = '$email', password = '$password', level_user = '$level_user' WHERE id_karyawan = '$id_karyawan'";
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


    $query = "UPDATE karyawan SET id_divisi = '$id_divisi', nama_lengkap = '$nama_lengkap', jenis_kelamin = '$jenis_kelamin', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', alamat_ktp = '$alamat_ktp', alamat_domisili = '$alamat_domisili', no_hp = '$no_hp', no_ktp = '$no_ktp', no_npwp = '$no_npwp', agama = '$agama', gol_darah = '$gol_darah', status_pernikahan = '$status_pernikahan', status_karyawan = '$status_karyawan', email = '$email', level_user = '$level_user', foto_karyawan = '$foto_karyawan' WHERE id_karyawan = '$id_karyawan'";
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
