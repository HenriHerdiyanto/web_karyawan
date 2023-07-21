<?php
include 'controller/koneksi.php';
require 'vendor/autoload.php';

if (isset($_POST['upload'])) {
    $err = "";
    $ekstensi = "";
    $success = "";

    $file_name = $_FILES['file_absen']['name'];
    $file_data = $_FILES['file_absen']['tmp_name'];

    if (empty($file_name)) {
        $err .= "File tidak boleh kosong";
    } else {
        $ekstensi = pathinfo($file_name)['extension'];
    }
    $ekstensi_allowed = array("xls", "xlsx");
    if (!in_array($ekstensi, $ekstensi_allowed)) {
        $err .= "Ekstensi file tidak sesuai";
    }
    if (empty($err)) {
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile($file_data);
        $spreadsheet = $reader->load($file_data);
        $sheetData = $spreadsheet->getActiveSheet()->toArray();

        $jumlahData = count($sheetData) - 1;
        for ($i = 1; $i < count($sheetData); $i++) {
            $nama_lengkap = $sheetData[$i][1];
            $date = $sheetData[$i][2];
            $jam_masuk = $sheetData[$i][3];
            $jam_keluar = $sheetData[$i][4];
            $nomor_induk = $sheetData[$i][5];

            $link = "setAbsen&nama_lengkap=" . urlencode($nama_lengkap) . "&date=" . urlencode($jam_keluar) . "&jam_masuk=" . urlencode($date) . "&jam_keluar=" . urlencode($jam_masuk) . "&nomor_induk=" . urlencode($nomor_induk);
            $insert_absen = getRegistran($link);
            var_dump($insert_absen);
            // echo "<script>alert('Data Berhasil diupload')</script>";
            // echo ("<script>location.href = 'absen-admin.php';</script>");
        }
        if ($jumlahData > 0) {
            $success .= "Data berhasil diupload";
        }
    }
    if ($err) {
?>
        <div class="alert alert-danger">
            <?php echo $err; ?>
        </div>
    <?php
    }

    if ($success) {
    ?>
        <div class="alert alert-primary">
            <?php echo $success; ?>
        </div>
<?php
    }
}
?>