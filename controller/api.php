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

function getStafId()
{
    global $connect;
    if (!empty($_GET['id_user']))
        $id_user = $_GET['id_user'];

    $query = "SELECT * FROM user WHERE id_user = $id_user";
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


    $query = "INSERT INTO karyawan SET id_divisi = '$id_divisi', nama_lengkap = '$nama_lengkap', jenis_kelamin = '$jenis_kelamin', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', alamat_ktp = '$alamat_ktp', alamat_domisili = '$alamat_domisili', no_hp = '$no_hp', no_ktp = '$no_ktp', no_npwp = '$no_npwp', agama = '$agama', gol_darah = '$gol_darah', status_pernikahan = '$status_pernikahan', status_karyawan = '$status_karyawan', email = '$email', password = '$password', level_user = '$level_user', foto_karyawan = '$foto_karyawan'";
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

function getKaryawan()
{

    global $connect;
    $query = "SELECT * FROM karyawan LEFT JOIN divisi ON karyawan.id_divisi = divisi.id_divisi";
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
