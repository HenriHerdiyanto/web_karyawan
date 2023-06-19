<?php
session_start();
if (!isset($_SESSION['user'])) {
    echo ("<script>location.href = 'login.php';</script>");
}
$user = $_SESSION["login"];
$level = $_SESSION["user"];

require_once 'controller/utility.php';

$link = "getStafId&id_user=" . urlencode($user);
$data = getRegistran($link);
$id_user = $data->data[0]->id_user;
$nama = $data->data[0]->nama_user;
$level_user = $data->data[0]->level_user;
// var_dump($level_user);
if ($level_user < 1) {
    echo ("<script>location.href = 'index.php';</script>");
}

$id_dinas = $_GET['id'];

$link = "getDivisi";
$data_divisi = getRegistran($link);

$link = "getDinasId&id_dinas=" . urlencode($id_dinas);
$data_dinas = getRegistran($link);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Surat Permohonan Perjalanan Dinas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .header-logo {
            text-align: center;
        }

        .header-logo img {
            width: 150px;
        }

        .surat-title {
            text-align: center;
            margin: 20px 0;
            font-size: 24px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .surat-info {
            margin-bottom: 30px;
        }

        .surat-info label {
            font-weight: bold;
        }

        .surat-content {
            margin-bottom: 30px;
        }

        .surat-content label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .surat-content span {
            display: inline-block;
            width: 400px;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            margin-top: 50px;
        }

        .jarak {
            margin-top: -50px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="header-logo">
                    <img style="margin-right: 190px; " src="assets/img/logo-header.png" alt="Logo Perusahaan">
                </div>
            </div>
            <div class="col">
                <h2 style="margin-left: -160px;">MYTAX INDONESIA</h2>
            </div>
            <div class="col-lg-12">
                <center>
                    <p style="margin-top: -10px;">Jl Pantai Indah Kapuk, Ruko Crown Golf Blok. B No. 26, <br> Penjaringan, jakarta Utara, Jakarta, INDONESIA</p>
                </center>
            </div>
            <hr>
            <center>
                <h4 style="margin-top: -10px;" class="surat-title"><u>Surat Perjalanan Dinas</u></h4>
            </center>
        </div>
        <!-- <div class="surat-info">
            <label>Nama yang mengajukan:</label>
            <span><?php echo $data_dinas->data[0]->nama_pengajuan; ?></span>
            <br>
            <label>Jabatan:</label>
            <span><?php echo $data_dinas->data[0]->jabatan; ?></span>
        </div> -->
        <div class="surat-content">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td>1.</td>
                        <td>
                            <small>Project yang dilakukan:</small>
                        </td>
                        <td>
                            <small><?php echo $data_dinas->data[0]->project; ?></small>
                        </td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td>
                            <small class="jarak">Maksud dan tujuan:</small>
                        </td>
                        <td>
                            <small class="jarak"><?php echo $data_dinas->data[0]->tujuan; ?></small>
                        </td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td>
                            <small class="jarak">Nama Personel:</small>
                        </td>
                        <td>
                            <small class="jarak"><?php echo $data_dinas->data[0]->nama_personel; ?></small>
                        </td>
                    </tr>
                    <tr>
                        <td>4.</td>
                        <td>
                            <small class="jarak">Kota Tujuan:</small>
                        </td>
                        <td>
                            <small class="jarak"><?php echo $data_dinas->data[0]->kota_tujuan; ?></small>
                        </td>
                    </tr>
                    <tr>
                        <td>4.</td>
                        <td>
                            <small class="jarak">Tanggal Berangkat:</small>
                        </td>
                        <td>
                            <small class="jarak"><?php echo $data_dinas->data[0]->tanggal_berangkat; ?></small>
                        </td>
                    </tr>
                    <tr>
                        <td>5.</td>
                        <td>
                            <small class="jarak">Waktu Berangkat:</small>
                        </td>
                        <td>
                            <small class="jarak"><?php echo $data_dinas->data[0]->waktu_berangkat; ?></small>
                        </td>
                    </tr>
                    <tr>
                        <td>6.</td>
                        <td>
                            <small class="jarak">Kota Pulang:</small>
                        </td>
                        <td>
                            <small class="jarak"><?php echo $data_dinas->data[0]->kota_pulang; ?></small>
                        </td>
                    </tr>
                    <tr>
                        <td>7.</td>
                        <td>
                            <small class="jarak">Tanggal Pulang:</small>
                        </td>
                        <td>
                            <small class="jarak"><?php echo $data_dinas->data[0]->tanggal_pulang; ?></small>
                        </td>
                    </tr>
                    <tr>
                        <td>8.</td>
                        <td>
                            <small class="jarak">Transportasi:</small>
                        </td>
                        <td>
                            <small class="jarak"><?php echo $data_dinas->data[0]->transportasi; ?></small>
                        </td>
                    </tr>
                    <tr>
                        <td>8.</td>
                        <td>
                            <small class="jarak">Hotel / Tempat tinggal:</small>
                        </td>
                        <td>
                            <small class="jarak"><?php echo $data_dinas->data[0]->hotel; ?></small>
                        </td>
                    </tr>
                    <tr>
                        <td>9.</td>
                        <td>
                            <small class="jarak">Bagasi:</small>
                        </td>
                        <td>
                            <small class="jarak"><?php echo $data_dinas->data[0]->bagasi; ?></small>
                        </td>
                    </tr>
                    <tr>
                        <td>10.</td>
                        <td>
                            <small class="jarak">Cash Advance:</small>
                        </td>
                        <td>
                            <small class="jarak"><?php echo $data_dinas->data[0]->cash_advance; ?></small>
                        </td>
                    </tr>
                    <tr>
                        <td>11.</td>
                        <td>
                            <small class="jarak">Keterangan:</small>
                        </td>
                        <td>
                            <small class="jarak"><?php echo $data_dinas->data[0]->keterangan; ?></small>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div style="margin-top: -10px;" class="keterangan">
            Sehubungan dengan keperluan kantor, data yang terkait diatas sudah mendapatkan izin untuk melakukan perjalanan dinas selama waktu yang telah ditentukan untuk melakukan pekerjaannya sesuai arahan.
        </div>

        <div class="surat-info mb-5">
            <div class="row">
                <div class="col">
                    <label>Diketahui oleh:</label>
                    <span><?php echo $data_dinas->data[0]->diketahui_oleh; ?></span>
                </div>
                <div class="col">
                    <label style="margin-left: 80px;">Disetujui oleh:</label>
                    <span><?php echo $data_dinas->data[0]->disetujui_oleh; ?><br></span>
                    <span style="margin-left: 80px;">Tanggal: <?php echo date('d/m/Y'); ?></span>
                </div>
            </div>
        </div><br>
        <div class="footer">
            <p>Tanggal: <?php echo date('d/m/Y'); ?></p>
            <p>Surat Permohonan Perjalanan Dinas</p>
        </div>
    </div>
    <script>
        window.print();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</body>

</html>