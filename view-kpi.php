<?php
require_once 'header.php';

$id_krywn = $_GET['id'];

$link = "getDivisi";
$data_divisi = getRegistran($link);

$link = "getKaryawanById&id_karyawan=" . urlencode($id_krywn);
$data_karyawan = getRegistran($link);

// input Karyawan
if (isset($_POST['submit'])) {
    $id_divisi = $_POST['id_divisi'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat_ktp = $_POST['alamat_ktp'];
    $alamat_domisili = $_POST['alamat_domisili'];
    $no_hp = $_POST['no_hp'];
    $no_ktp = $_POST['no_ktp'];
    $no_npwp = $_POST['no_npwp'];
    $agama = $_POST['agama'];
    $gol_darah = $_POST['gol_darah'];
    $status_pernikahan = $_POST['status_pernikahan'];
    $status_karyawan = $_POST['status_karyawan'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $level_user = $_POST['level_user'];
    $gaji = $_POST['gaji'];
    $mulai_kerja = $_POST['mulai_kerja'];

    $extensi_izin = array("jpg", "jpeg", "png", "pdf", "gif");
    $size_izin = (20971520000000 / 2);

    $allow_file = true;
    $sumber_file = $_FILES['foto_karyawan']['tmp_name'];
    $target_file = "foto_karyawan/";
    $nama_file = $_FILES['foto_karyawan']['name'];
    $size_file = $_FILES['foto_karyawan']['size'];

    if ($nama_file != "") {
        if ($size_file > $size_izin) {
            $error .= "- Ukuran File file tidak Boleh Melebihi 1 MB";
            $allow_file = false;
        } else {
            $getExtensi = explode(".", $nama_file);
            $extensi_file = strtolower(end($getExtensi));
            $nama_file = "Update-" . $nama_lengkap . "-" . $no_ktp . "." . $extensi_file;
            if (!in_array($extensi_file, $extensi_izin) == true) {
                $error .= " File hanya diperbolehkan dalam bentuk (jpg, jpeg, png, gif)";
                $allow_ktp = false;
            }
        }

        if ($allow_file) {
            if (!move_uploaded_file($sumber_file, $target_file . $nama_file)) {
                $error .= " Gagal Uplaod File file ke server";
                $error .= $sumber_file . " " . $target_file . $nama_file;
                $allow_file = false;
            }
        }
    }

    if (empty($sumber_file)) {

        if (empty($password)) {
            $link = "setUpdateKaryawanNoFtPw&id_karyawan=" . urlencode($id_krywn) . '&id_divisi=' . urlencode($id_divisi) . '&nama_lengkap=' . urlencode($nama_lengkap) . '&jenis_kelamin=' . urlencode($jenis_kelamin) . '&tempat_lahir=' . urlencode($tempat_lahir) . '&tanggal_lahir=' . urlencode($tanggal_lahir) . '&alamat_ktp=' . urlencode($alamat_ktp) . '&alamat_domisili=' . urlencode($alamat_domisili) . '&no_hp=' . urlencode($no_hp) . '&no_ktp=' . urlencode($no_ktp) . '&no_npwp=' . urlencode($no_npwp) . '&agama=' . urlencode($agama) . '&gol_darah=' . urlencode($gol_darah) . '&status_pernikahan=' . urlencode($status_pernikahan) . '&status_karyawan=' . urlencode($status_karyawan) . '&email=' . urlencode($email) . '&level_user=' . urlencode($level_user) . '&gaji=' . urlencode($gaji) . '&mulai_kerja=' . urlencode($mulai_kerja);
        } else {
            $link = "setUpdateKaryawanNoFoto&id_karyawan=" . urlencode($id_krywn) . '&id_divisi=' . urlencode($id_divisi) . '&nama_lengkap=' . urlencode($nama_lengkap) . '&jenis_kelamin=' . urlencode($jenis_kelamin) . '&tempat_lahir=' . urlencode($tempat_lahir) . '&tanggal_lahir=' . urlencode($tanggal_lahir) . '&alamat_ktp=' . urlencode($alamat_ktp) . '&alamat_domisili=' . urlencode($alamat_domisili) . '&no_hp=' . urlencode($no_hp) . '&no_ktp=' . urlencode($no_ktp) . '&no_npwp=' . urlencode($no_npwp) . '&agama=' . urlencode($agama) . '&gol_darah=' . urlencode($gol_darah) . '&status_pernikahan=' . urlencode($status_pernikahan) . '&status_karyawan=' . urlencode($status_karyawan) . '&email=' . urlencode($email) . '&password=' . urlencode($password) . '&level_user=' . urlencode($level_user) . '&gaji=' . urlencode($gaji) . '&mulai_kerja=' . urlencode($mulai_kerja);
        }
    } else {

        if (empty($password)) {
            $link = "setUpdateKaryawanNoPassword&id_karyawan=" . urlencode($id_krywn) . '&id_divisi=' . urlencode($id_divisi) . '&nama_lengkap=' . urlencode($nama_lengkap) . '&jenis_kelamin=' . urlencode($jenis_kelamin) . '&tempat_lahir=' . urlencode($tempat_lahir) . '&tanggal_lahir=' . urlencode($tanggal_lahir) . '&alamat_ktp=' . urlencode($alamat_ktp) . '&alamat_domisili=' . urlencode($alamat_domisili) . '&no_hp=' . urlencode($no_hp) . '&no_ktp=' . urlencode($no_ktp) . '&no_npwp=' . urlencode($no_npwp) . '&agama=' . urlencode($agama) . '&gol_darah=' . urlencode($gol_darah) . '&status_pernikahan=' . urlencode($status_pernikahan) . '&status_karyawan=' . urlencode($status_karyawan) . '&email=' . urlencode($email) . '&level_user=' . urlencode($level_user) . '&foto_karyawan=' . urlencode($nama_file) . '&gaji=' . urlencode($gaji) . '&mulai_kerja=' . urlencode($mulai_kerja);
        } else {
            $link = "setUpdateKaryawan&id_karyawan=" . urlencode($id_krywn) . '&id_divisi=' . urlencode($id_divisi) . '&nama_lengkap=' . urlencode($nama_lengkap) . '&jenis_kelamin=' . urlencode($jenis_kelamin) . '&tempat_lahir=' . urlencode($tempat_lahir) . '&tanggal_lahir=' . urlencode($tanggal_lahir) . '&alamat_ktp=' . urlencode($alamat_ktp) . '&alamat_domisili=' . urlencode($alamat_domisili) . '&no_hp=' . urlencode($no_hp) . '&no_ktp=' . urlencode($no_ktp) . '&no_npwp=' . urlencode($no_npwp) . '&agama=' . urlencode($agama) . '&gol_darah=' . urlencode($gol_darah) . '&status_pernikahan=' . urlencode($status_pernikahan) . '&status_karyawan=' . urlencode($status_karyawan) . '&email=' . urlencode($email) . '&password=' . urlencode($password) . '&level_user=' . urlencode($level_user) . '&foto_karyawan=' . urlencode($nama_file) . '&gaji=' . urlencode($gaji) . '&mulai_kerja=' . urlencode($mulai_kerja);
        }
    }

    $data = getRegistran($link);
    var_dump($data);
    echo '<script>alert("data berhasil diupdate")</script>';
    echo ("<script>location.href = 'staff.php';</script>");
}

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ubah Data Karyawan</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Input Karyawan</h3>
                </div>
                <!-- /.card-header -->
                <form method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Divisi</label>
                                    <select class="form-control" name="id_divisi">
                                        <?php foreach ($data_divisi->data as $key => $value) : ?>
                                            <option value="<?php echo $value->id_divisi; ?>" <?php if ($value->id_divisi == $data_karyawan->data[0]->id_divisi) {
                                                                                                    echo 'selected';
                                                                                                } ?>><?php echo $value->nama_divisi; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" class="form-control" name="nama_lengkap" value="<?php echo $data_karyawan->data[0]->nama_lengkap; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                        <option value="<?php echo $data_karyawan->data[0]->jenis_kelamin; ?>"><?php echo $data_karyawan->data[0]->jenis_kelamin; ?></option>
                                        <option value="laki-laki">LAKI - LAKI</option>
                                        <option value="perempuan">PEREMPUAN</option>
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label>Tempat Lahir</label>
                                    <input type="text" class="form-control" name="tempat_lahir" value="<?php echo $data_karyawan->data[0]->tempat_lahir ?>">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tanggal_lahir" value="<?php echo $data_karyawan->data[0]->tanggal_lahir ?>">
                                </div>
                                <div class="form-group">
                                    <label>Alamat Lengkap (Sesuai KTP)</label>
                                    <textarea type="text" name="alamat_ktp" class="form-control" rows="2" id="alamat_ktp"><?php echo $data_karyawan->data[0]->alamat_ktp ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="alamatDomisili">Alamat Domisili</label>
                                    <div class="form-check pt-2 pb-2">
                                        <input type="checkbox" class="form-check-input" id="sama_dengan_ktp" name="sama_dengan_ktp" onchange="handleCheckboxChange(this)">
                                        <label class="form-check-label" for="cekAlamat">Alamat Domisili sama dengan Alamat KTP</label>
                                    </div>
                                    <textarea type="text" rows="2" name="alamat_domisili" class="form-control" id="alamat_domisili"><?php echo $data_karyawan->data[0]->alamat_domisili; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Nomor Telepon</label>
                                    <input type="text" class="form-control" name="no_hp" value="<?php echo $data_karyawan->data[0]->no_hp; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Besaran Gaji Karyawan</label>
                                    <input type="text" class="form-control" name="gaji" value="<?php echo $data_karyawan->data[0]->gaji; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Mulai Kerja</label>
                                    <input type="date" class="form-control" name="mulai_kerja" value="<?php echo $data_karyawan->data[0]->mulai_kerja; ?>">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nomor KTP</label>
                                    <input type="text" class="form-control" name="no_ktp" value="<?php echo $data_karyawan->data[0]->no_ktp; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Nomor NPWP</label>
                                    <input type="text" class="form-control" name="no_npwp" value="<?php echo $data_karyawan->data[0]->no_npwp; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Agama</label>
                                    <select class="form-control" name="agama">
                                        <option value="Islam" <?php if ($data_karyawan->data[0]->agama == "Islam") {
                                                                    echo "selected";
                                                                } ?>>Islam</option>
                                        <option value="Protestan" <?php if ($data_karyawan->data[0]->agama == "Protestan") {
                                                                        echo "selected";
                                                                    } ?>>Protestan</option>
                                        <option value="Katolik" <?php if ($data_karyawan->data[0]->agama == "Katolik") {
                                                                    echo "selected";
                                                                } ?>>Katolik</option>
                                        <option value="Hindu" <?php if ($data_karyawan->data[0]->agama == "Hindu") {
                                                                    echo "selected";
                                                                } ?>>Hindu</option>
                                        <option value="Buddha" <?php if ($data_karyawan->data[0]->agama == "Buddha") {
                                                                    echo "selected";
                                                                } ?>>Buddha</option>
                                        <option value="Khonghucu" <?php if ($data_karyawan->data[0]->agama == "Khonghucu") {
                                                                        echo "selected";
                                                                    } ?>>Khonghucu</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Golongan Drah</label>
                                    <select class="form-control" name="gol_darah">
                                        <option value="A" <?php if ($data_karyawan->data[0]->gol_darah == "A") {
                                                                echo "selected";
                                                            } ?>>A</option>
                                        <option value="B" <?php if ($data_karyawan->data[0]->gol_darah == "B") {
                                                                echo "selected";
                                                            } ?>>B</option>
                                        <option value="O" <?php if ($data_karyawan->data[0]->gol_darah == "O") {
                                                                echo "selected";
                                                            } ?>>O</option>
                                        <option value="AB" <?php if ($data_karyawan->data[0]->gol_darah == "AB") {
                                                                echo "selected";
                                                            } ?>>AB</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Status Pernikahan</label>
                                    <select class="form-control" name="status_pernikahan">
                                        <option value="Kawin" <?php if ($data_karyawan->data[0]->status_pernikahan == "Kawin") {
                                                                    echo "selected";
                                                                } ?>>Kawin</option>
                                        <option value="Belum Kawin" <?php if ($data_karyawan->data[0]->status_pernikahan == "Belum Kawin") {
                                                                        echo "selected";
                                                                    } ?>>Belum Kawin</option>
                                        <option value="Cerai Hidup" <?php if ($data_karyawan->data[0]->status_pernikahan == "Cerai Hidup") {
                                                                        echo "selected";
                                                                    } ?>>Cerai Hidup</option>
                                        <option value="Cerai Mati" <?php if ($data_karyawan->data[0]->status_pernikahan == "Cerai Mati") {
                                                                        echo "selected";
                                                                    } ?>>Cerai Mati</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Status Karyawan</label>
                                    <select class="form-control" name="status_karyawan">
                                        <option value="<?= $data_karyawan->data[0]->status_karyawan ?>"><?= $data_karyawan->data[0]->status_karyawan ?></option>
                                        <option value="aktif">Aktif</option>
                                        <option value="nonaktif">Nonaktif</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Level User</label>
                                    <select class="form-control" name="level_user">
                                        <option value="<?= $data_karyawan->data[0]->level_user ?>"><?= $data_karyawan->data[0]->level_user ?></option>
                                        <option value="manager">Manager</option>
                                        <option value="staff">staff</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" value="<?php echo $data_karyawan->data[0]->email ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="Password" class="form-control" name="password">
                                    <p class="text-muted">Kosongkan jika password tidak diubah</p>
                                </div>
                                <label for="exampleInputFile">Foto</label>
                                <div class="form-group">
                                    <img class="pb-3" src="foto_karyawan/<?php echo $data_karyawan->data[0]->foto_karyawan ?>" width="100">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile" name="foto_karyawan">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <!-- /.card-body -->
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-lg btn-primary float-sm-right" name="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
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
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="dist/js/demo.js"></script> -->
<!-- Page specific script -->
<script>
    function handleCheckboxChange(checkbox) {
        const alamatKTP = document.getElementById("alamat_ktp");
        const alamatDomisili = document.getElementById("alamat_domisili");

        if (checkbox.checked) {
            alamatDomisili.value = alamatKTP.value;
            alamatDomisili.readOnly = true;
        } else {
            alamatDomisili.value = "";
            alamatDomisili.readOnly = false;
        }
    }
</script>
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
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>
<script>
    $(function() {
        bsCustomFileInput.init();
    });
</script>
</body>

</html>