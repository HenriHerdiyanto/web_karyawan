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
// function getKPIit()
// {
//     global $connect;

//     $query = "SELECT * FROM kpi_it";
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

function getStaffLogin()
{

    global $connect;
    if (!empty($_GET['id_karyawan']))
        $id_karyawan = $_GET['id_karyawan'];

    $query = "SELECT * FROM karyawan WHERE id_karyawan = '$id_karyawan'";
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
    if (!empty($_GET['nama_project']))
        $nama_project = $_GET['nama_project'];
    if (!empty($_GET['todolist']))
        $todolist = $_GET['todolist'];


    $query = "INSERT INTO project SET id_karyawan = '$id_karyawan', nama_project = '$nama_project', todolist = '$todolist'";
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


    $query = "INSERT INTO lembur SET id_karyawan = '$id_karyawan', nama_divisi = '$nama_divisi', nama_lengkap = '$nama_lengkap', level_user = '$level_user', project = '$project', tanggal = '$tanggal', mulai_lembur = '$mulai_lembur', akhir_lembur = '$akhir_lembur', total_lembur = '$total_lembur', keterangan = '$keterangan', mengetahui = '$mengetahui'";
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
function getLemburByNama()
{

    global $connect;
    if (!empty($_GET['nama_divisi']))
        $nama_divisi = $_GET['nama_divisi'];
    $query = "SELECT * FROM lembur WHERE nama_divisi = '$nama_divisi'";
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
    if (!empty($_GET['mulai_kerja']))
        $mulai_kerja = $_GET['mulai_kerja'];


    $query = "INSERT INTO karyawan SET id_user = '$id_user',id_divisi = '$id_divisi', nama_lengkap = '$nama_lengkap', jenis_kelamin = '$jenis_kelamin', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', alamat_ktp = '$alamat_ktp', alamat_domisili = '$alamat_domisili', no_hp = '$no_hp', no_ktp = '$no_ktp', no_npwp = '$no_npwp', agama = '$agama', gol_darah = '$gol_darah', status_pernikahan = '$status_pernikahan', status_karyawan = '$status_karyawan', email = '$email', username = '$email', password = '$password', level_user = '$level_user', foto_karyawan = '$foto_karyawan', gaji = '$gaji', mulai_kerja = '$mulai_kerja'";
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
    if (!empty($_GET['id_user']))
        $id_user = $_GET['id_user'];
    if (!empty($_GET['nama']))
        $nama = $_GET['nama'];
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
    if (!empty($_GET['gaji_terakhir']))
        $gaji_terakhir = $_GET['gaji_terakhir'];
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


    $query = "UPDATE pinjam_karyawan SET id_user = '$id_user', nama = '$nama', mulai_kerja = '$mulai_kerja', pinjaman_terakhir = '$pinjaman_terakhir', pelunasan_terakhir = '$pelunasan_terakhir', nik = '$nik', jabatan = '$jabatan', gaji_terakhir = '$gaji_terakhir', nilai_loan = '$nilai_loan', keperluan = '$keperluan',pelunasan = '$pelunasan',pemohon = '$pemohon' , status = '$status'";
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


function setUpdatePinjamAdmin()
{
    global $connect;
    if (!empty($_GET['id_user']))
        $id_user = $_GET['id_user'];
    if (!empty($_GET['nama']))
        $nama = $_GET['nama'];
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
    if (!empty($_GET['gaji_terakhir']))
        $gaji_terakhir = $_GET['gaji_terakhir'];
    if (!empty($_GET['nilai_loan']))
        $nilai_loan = $_GET['nilai_loan'];
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


    $query = "UPDATE pinjam_karyawan SET id_user = '$id_user', nama = '$nama', mulai_kerja = '$mulai_kerja', pinjaman_terakhir = '$pinjaman_terakhir', pelunasan_terakhir = '$pelunasan_terakhir', nik = '$nik', jabatan = '$jabatan', gaji_terakhir = '$gaji_terakhir', nilai_loan = '$nilai_loan', keperluan = '$keperluan',pelunasan = '$pelunasan',pemohon = '$pemohon' ,disetujui_oleh = '$disetujui_oleh' , status = '$status'";
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
    if (!empty($_GET['disetujui_oleh']))
        $disetujui_oleh = $_GET['disetujui_oleh'];
    if (!empty($_GET['status']))
        $status = $_GET['status'];


    $query = "UPDATE perjalanan_dinas SET id_user = '$id_user', id_divisi = '$id_divisi', nama_pengajuan = '$nama_pengajuan', jabatan = '$jabatan', project = '$project', tujuan = '$tujuan', jumlah_personel = '$jumlah_personel', nama_personel = '$nama_personel', kota_tujuan = '$kota_tujuan', tanggal_berangkat = '$tanggal_berangkat',waktu_berangkat = '$waktu_berangkat',kota_pulang = '$kota_pulang' ,tanggal_pulang = '$tanggal_pulang', transportasi = '$transportasi', hotel = '$hotel', bagasi = '$bagasi', cash_advance = '$cash_advance', keterangan = '$keterangan', diminta_oleh = '$diminta_oleh', diketahui_oleh = '$diketahui_oleh',disetujui_oleh = '$disetujui_oleh', status = '$status'";
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


    $query = "INSERT INTO perjalanan_dinas SET id_user = '$id_user', id_divisi = '$id_divisi', nama_pengajuan = '$nama_pengajuan', jabatan = '$jabatan', project = '$project', tujuan = '$tujuan', jumlah_personel = '$jumlah_personel', nama_personel = '$nama_personel', jenis_perjalanan = '$jenis_perjalanan', kota_tujuan = '$kota_tujuan', tanggal_berangkat = '$tanggal_berangkat',waktu_berangkat = '$waktu_berangkat',kota_pulang = '$kota_pulang' ,tanggal_pulang = '$tanggal_pulang', transportasi = '$transportasi', hotel = '$hotel', bagasi = '$bagasi', cash_advance = '$cash_advance', keterangan = '$keterangan', diminta_oleh = '$diminta_oleh', diketahui_oleh = '$diketahui_oleh', disetujui_oleh = '$disetujui_oleh', status = '$status'";
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
    if (!empty($_GET['id_user']))
        $id_user = $_GET['id_user'];
    if (!empty($_GET['nama']))
        $nama = $_GET['nama'];
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
    if (!empty($_GET['gaji_terakhir']))
        $gaji_terakhir = $_GET['gaji_terakhir'];
    if (!empty($_GET['nilai_loan']))
        $nilai_loan = $_GET['nilai_loan'];
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


    $query = "INSERT INTO pinjam_karyawan SET id_user = '$id_user', nama = '$nama', mulai_kerja = '$mulai_kerja', pinjaman_terakhir = '$pinjaman_terakhir', pelunasan_terakhir = '$pelunasan_terakhir', nik = '$nik', jabatan = '$jabatan', gaji_terakhir = '$gaji_terakhir', nilai_loan = '$nilai_loan', keperluan = '$keperluan',pelunasan = '$pelunasan',pemohon = '$pemohon' , disetujui_oleh = '$disetujui_oleh', status = '$status'";
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
    if (!empty($_GET['id_user']))
        $id_user = $_GET['id_user'];
    $query = "SELECT * FROM pinjam_karyawan 
    LEFT JOIN user ON pinjam_karyawan.id_user = user.id_user 
    WHERE user.id_user = $id_user;
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


function getPinjamKaryawanEdit()
{

    global $connect;
    if (!empty($_GET['id_pinjam']))
        $id_pinjam = $_GET['id_pinjam'];
    $query = "SELECT * FROM pinjam_karyawan WHERE id_pinjam = $id_pinjam;
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
    if (!empty($_GET['gaji']))
        $gaji = $_GET['gaji'];
    if (!empty($_GET['mulai_kerja']))
        $mulai_kerja = $_GET['mulai_kerja'];


    $query = "UPDATE karyawan SET id_divisi = '$id_divisi', nama_lengkap = '$nama_lengkap', jenis_kelamin = '$jenis_kelamin', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', alamat_ktp = '$alamat_ktp', alamat_domisili = '$alamat_domisili', no_hp = '$no_hp', no_ktp = '$no_ktp', no_npwp = '$no_npwp', agama = '$agama', gol_darah = '$gol_darah', status_pernikahan = '$status_pernikahan', status_karyawan = '$status_karyawan', email = '$email', password = '$password', level_user = '$level_user', foto_karyawan = '$foto_karyawan', gaji = '$gaji', mulai_kerja = '$mulai_kerja' WHERE id_karyawan = '$id_karyawan'";
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
    if (!empty($_GET['gaji']))
        $gaji = $_GET['gaji'];
    if (!empty($_GET['mulai_kerja']))
        $mulai_kerja = $_GET['mulai_kerja'];


    $query = "UPDATE karyawan SET id_divisi = '$id_divisi', nama_lengkap = '$nama_lengkap', jenis_kelamin = '$jenis_kelamin', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', alamat_ktp = '$alamat_ktp', alamat_domisili = '$alamat_domisili', no_hp = '$no_hp', no_ktp = '$no_ktp', no_npwp = '$no_npwp', agama = '$agama', gol_darah = '$gol_darah', status_pernikahan = '$status_pernikahan', status_karyawan = '$status_karyawan', email = '$email', level_user = '$level_user', gaji = '$gaji', mulai_kerja = '$mulai_kerja' WHERE id_karyawan = '$id_karyawan'";
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
    if (!empty($_GET['gaji']))
        $gaji = $_GET['gaji'];
    if (!empty($_GET['mulai_kerja']))
        $mulai_kerja = $_GET['mulai_kerja'];


    $query = "UPDATE karyawan SET id_divisi = '$id_divisi', nama_lengkap = '$nama_lengkap', jenis_kelamin = '$jenis_kelamin', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', alamat_ktp = '$alamat_ktp', alamat_domisili = '$alamat_domisili', no_hp = '$no_hp', no_ktp = '$no_ktp', no_npwp = '$no_npwp', agama = '$agama', gol_darah = '$gol_darah', status_pernikahan = '$status_pernikahan', status_karyawan = '$status_karyawan', email = '$email', password = '$password', level_user = '$level_user', gaji = '$gaji', mulai_kerja = '$mulai_kerja' WHERE id_karyawan = '$id_karyawan'";
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
    if (!empty($_GET['gaji']))
        $gaji = $_GET['gaji'];
    if (!empty($_GET['mulai_kerja']))
        $mulai_kerja = $_GET['mulai_kerja'];


    $query = "UPDATE karyawan SET id_divisi = '$id_divisi', nama_lengkap = '$nama_lengkap', jenis_kelamin = '$jenis_kelamin', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', alamat_ktp = '$alamat_ktp', alamat_domisili = '$alamat_domisili', no_hp = '$no_hp', no_ktp = '$no_ktp', no_npwp = '$no_npwp', agama = '$agama', gol_darah = '$gol_darah', status_pernikahan = '$status_pernikahan', status_karyawan = '$status_karyawan', email = '$email', level_user = '$level_user', foto_karyawan = '$foto_karyawan', gaji = '$gaji', mulai_kerja = '$mulai_kerja' WHERE id_karyawan = '$id_karyawan'";
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
