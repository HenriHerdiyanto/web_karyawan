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
            $first_name = $sheetData[$i][1];
            $last_name = $sheetData[$i][2];
            $gender = $sheetData[$i][3];
            $gender = str_replace(array("Female", "Male"), array("P", "L"), $gender);
            $country = $sheetData[$i][4];
            $age = $sheetData[$i][5];
            $date = $sheetData[$i][6];
            $id = $sheetData[$i][7];

            $date_explode = explode("/", $date);
            $date = $date_explode['2'] . "-" . $date_explode['1'] . "-" . $date_explode[0];
            // echo "
            //     <tr>
            //         <td>" . $first_name . "</td>
            //         <td>" . $last_name . "</td>
            //         <td>" . $gender . "</td>
            //         <td>" . $country . "</td>
            //         <td>" . $age . "</td>
            //         <td>" . $date . "</td>
            //         <td>" . $id . "</td> <br>
            //     </tr>
            // ";

            $link = "setAbsen&first_name=" . urlencode($first_name) . "&last_name=" . urlencode($last_name) . "&gender=" . urlencode($gender) . "&country=" . urlencode($country) . "&age=" . urlencode($age) . "&date=" . urlencode($date) . "&id=" . urlencode($id);
            $insert_absen = getRegistran($link);
            // var_dump($insert_absen);
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