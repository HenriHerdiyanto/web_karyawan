<?php
require_once 'header.php';
// $id_input = $_GET['id'];
$link = "getDivisi";
$data_divisi = getRegistran($link);
// var_dump($data_divisi);



// input Karyawan
if (isset($_POST['submit'])) {

  $id_divisi = $_POST['id_divisi'];
  $nomor_induk = $_POST['nomor_induk'];
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
  $uang_makan = $_POST['uang_makan'];
  $uang_transport = $_POST['uang_transport'];
  $mulai_kerja = $_POST['mulai_kerja'];
  $akhir_kerja = $_POST['akhir_kerja'];

  // upload foto karyawan
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
      $nama_file = $nama_lengkap . "-" . $no_ktp . "." . $extensi_file;
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

  // upload kontrak kerja
  $extensi_izin = array("pdf");
  $size_izin = (20971520000000 / 2);
  $allow_file = true;
  $sumber_file = $_FILES['kontrak_kerja']['tmp_name'];
  $target_file = "kontrak_kerja/";
  $nama_file_kontrak = $_FILES['kontrak_kerja']['name'];
  $size_file = $_FILES['kontrak_kerja']['size'];
  if ($nama_file_kontrak != '') {
    if ($size_file > $size_izin) {
      $error .= "- Ukuran File file tidak Boleh Melebihi 1 MB";
      $allow_file = false;
    } else {
      $getExtensi = explode(".", $nama_file_kontrak);
      $extensi_file = strtolower(end($getExtensi));
      $nama_file_kontrak = $nama_lengkap . "-" . $nomor_induk . "." . $extensi_file;
      if (!in_array($extensi_file, $extensi_izin) == true) {
        $error .= " File hanya diperbolehkan dalam bentuk (pdf)";
        $allow_ktp = false;
      }
    }

    if ($allow_file) {
      if (!move_uploaded_file($sumber_file, $target_file . $nama_file_kontrak)) {
        $error .= " Gagal Uplaod File file ke server";
        $error .= $sumber_file . " " . $target_file . $nama_file_kontrak;
        $allow_file = false;
      }
    }
  }



  if ($level_user == 'staff') {
    $link = "setKaryawanByAdmin&id_divisi=" . urlencode($id_divisi) . '&nomor_induk=' . urlencode($nomor_induk) . '&nama_lengkap=' . urlencode($nama_lengkap) . '&jenis_kelamin=' . urlencode($jenis_kelamin) . '&tempat_lahir=' . urlencode($tempat_lahir) . '&tanggal_lahir=' . urlencode($tanggal_lahir) . '&alamat_ktp=' . urlencode($alamat_ktp) . '&alamat_domisili=' . urlencode($alamat_domisili) . '&no_hp=' . urlencode($no_hp) . '&no_ktp=' . urlencode($no_ktp) . '&no_npwp=' . urlencode($no_npwp) . '&agama=' . urlencode($agama) . '&gol_darah=' . urlencode($gol_darah) . '&status_pernikahan=' . urlencode($status_pernikahan) . '&status_karyawan=' . urlencode($status_karyawan) . '&email=' . urlencode($email) . '&username=' . urlencode($email) . '&password=' . urlencode($password) . '&level_user=' . urlencode($level_user) . '&foto_karyawan=' . urlencode($nama_file) . '&gaji=' . urlencode($gaji) . '&uang_makan=' . urlencode($uang_makan) . '&uang_transport=' . urlencode($uang_transport) . '&mulai_kerja=' . urlencode($mulai_kerja) . '&akhir_kerja=' . urlencode($akhir_kerja) . '&kontrak_kerja=' . urlencode($nama_file_kontrak) . '&type=insert';
    $data = getRegistran($link);

    $link2 = "setUserByAdmin&nama_user=" . urlencode($nama_lengkap) . "&username=" . urlencode($email) . "&password=" . urlencode($password) . "&level_user=2";
    $data2 = getRegistran($link2);
    var_dump($data2);
  } elseif ($level_user == 'manager') {
    $link = "setKaryawanByAdmin&id_divisi=" . urlencode($id_divisi) . '&nomor_induk=' . urlencode($nomor_induk) . '&nama_lengkap=' . urlencode($nama_lengkap) . '&jenis_kelamin=' . urlencode($jenis_kelamin) . '&tempat_lahir=' . urlencode($tempat_lahir) . '&tanggal_lahir=' . urlencode($tanggal_lahir) . '&alamat_ktp=' . urlencode($alamat_ktp) . '&alamat_domisili=' . urlencode($alamat_domisili) . '&no_hp=' . urlencode($no_hp) . '&no_ktp=' . urlencode($no_ktp) . '&no_npwp=' . urlencode($no_npwp) . '&agama=' . urlencode($agama) . '&gol_darah=' . urlencode($gol_darah) . '&status_pernikahan=' . urlencode($status_pernikahan) . '&status_karyawan=' . urlencode($status_karyawan) . '&email=' . urlencode($email) . '&username=' . urlencode($email) . '&password=' . urlencode($password) . '&level_user=' . urlencode($level_user) . '&foto_karyawan=' . urlencode($nama_file) . '&gaji=' . urlencode($gaji) . '&uang_makan=' . urlencode($uang_makan) . '&uang_transport=' . urlencode($uang_transport) . '&mulai_kerja=' . urlencode($mulai_kerja) . '&akhir_kerja=' . urlencode($akhir_kerja) . '&kontrak_kerja=' . urlencode($nama_file_kontrak) . '&type=insert';
    $data = getRegistran($link);
    var_dump($data);

    $link2 = "setUserByAdmin&nama_user=" . urlencode($nama_lengkap) . "&username=" . urlencode($email) . "&password=" . urlencode($password) . "&level_user=1";
    $data2 = getRegistran($link2);
    var_dump($data2);
  }
  echo '<script>alert("Data berhasil ditambah")</script>';
  echo ("<script>location.href = 'staff.php';</script>");
}

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="card">
        <div class="row">
          <div class="col">
            <h1 class="m-3 text-center">TAMBAH KARYAWAN</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  if ($data_divisi == null) { ?>
    <section class="content">
      <div class="container-fluid">
        <div class="card card-primary">
          <div class="card-header">
            <h1 class="card-title">SILAHKAN TAMBAH DIVISI TERLEBIH DAHULU</h1>
          </div>
        </div>
      </div>
    </section>
  <?php } else { ?>
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
                    <!-- <input type="text" name="id_user" value="<?php echo $id_userJ + 1 ?>"> -->

                    <select class="form-control" name="id_divisi">
                      <option selected>--Pilih Divisi--</option>
                      <?php foreach ($data_divisi->data as $key => $value) { ?>
                        <option value="<?php echo $value->id_divisi ?>"><?php echo $value->nama_divisi ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama_lengkap" required>
                  </div>
                  <div class="form-group">
                    <input class="form-control" name="nomor_induk" type="hidden" id="nomor-induk" readonly>
                  </div>
                  <div class="form-group">
                    <label for="">Jenis Kelamin</label>
                    <select class="form-control" name="jenis_kelamin" required>
                      <option selected>--Pilih Gender--</option>
                      <option value="laki-laki">Laki-laki</option>
                      <option value="perempuan">Perempuan</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input type="text" class="form-control" name="tempat_lahir" required>
                  </div>
                  <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tanggal_lahir" required>
                  </div>
                  <div class="form-group">
                    <label>Alamat Lengkap (Sesuai KTP)</label>
                    <textarea type="text" name="alamat_ktp" class="form-control" rows="2" id="alamat_ktp" required></textarea>
                  </div>
                  <div class="form-group">
                    <label for="alamatDomisili">Alamat Domisili</label>
                    <div class="form-check pt-2 pb-2">
                      <input type="checkbox" class="form-check-input" id="sama_dengan_ktp" name="sama_dengan_ktp" onchange="handleCheckboxChange(this)" required>
                      <label class="form-check-label" for="cekAlamat">Alamat Domisili sama dengan Alamat KTP</label>
                    </div>
                    <textarea type="text" rows="2" name="alamat_domisili" class="form-control" id="alamat_domisili"></textarea>
                  </div>
                  <div class="form-group">
                    <label>Nomor Telepon</label>
                    <input type="text" class="form-control" name="no_hp" required>
                  </div>
                  <div class="form-group">
                    <label>Gaji Pokok Karyawan</label>
                    <input type="text" class="form-control" name="gaji" required>
                  </div>
                  <div class="form-group">
                    <label>Uang Makan</label>
                    <input type="text" class="form-control" name="uang_makan" required>
                  </div>
                  <div class="form-group">
                    <label>Uang Transport</label>
                    <input type="text" class="form-control" name="uang_trasport" required>
                  </div>
                  <div class="form-group">
                    <label>Mulai Kerja</label>
                    <input type="date" class="form-control" name="mulai_kerja" required>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Batas Akhir Kerja</label>
                    <input type="date" class="form-control" name="akhir_kerja" required>
                  </div>
                  <div class="form-group">
                    <label>Nomor KTP</label>
                    <input type="text" class="form-control" name="no_ktp" required>
                  </div>
                  <div class="form-group">
                    <label>Nomor NPWP</label>
                    <input type="text" class="form-control" name="no_npwp" required>
                  </div>
                  <div class="form-group">
                    <label>Agama</label>
                    <select class="form-control" name="agama" required>
                      <option selected>--Pilih Agama--</option>
                      <option value="Islam">Islam</option>
                      <option value="Protestan">Protestan</option>
                      <option value="Katolik">Katolik</option>
                      <option value="Hindu">Hindu</option>
                      <option value="Buddha">Buddha</option>
                      <option value="Khonghucu">Khonghucu</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Golongan Drah</label>
                    <select class="form-control" name="gol_darah" required>
                      <option selected>--Pilih Golongan Darah--</option>
                      <option value="A">A</option>
                      <option value="B">B</option>
                      <option value="O">O</option>
                      <option value="AB">AB</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Status Pernikahan</label>
                    <select class="form-control" name="status_pernikahan" required>
                      <option selected>--Pilih Status Pernikahan--</option>
                      <option value="Kawin">Kawin</option>
                      <option value="Belum Kawin">Belum Kawin</option>
                      <option value="Cerai Hidup">Cerai Hidup</option>
                      <option value="Cerai Mati">Cerai Mati</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Status Karyawan</label>
                    <select class="form-control" name="status_karyawan" required>
                      <option selected>--Pilih Status Karyawan--</option>
                      <option value="aktif">aktif</option>
                      <option value="nonaktif">nonaktif</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Level User</label>
                    <!-- <input class="form-control" type="text" name="level_user" value="manager" readonly> -->
                    <select class="form-control" name="level_user" required>
                      <option selected>--Pilih Level User--</option>
                      <option value="manager">Manager</option>
                      <option value="staff">Staff</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" required>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="text" class="form-control" name="password" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Kontrak Kerja</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="kontrak_kerja" required>
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Foto</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="foto_karyawan" required>
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
              <button type="submit" class="btn btn-lg btn-primary float-sm-right" onclick="generateNomorInduk()" name="submit">Submit</button>
            </div>
          </form>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  <?php }
  ?>
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script>
  let nomorInduk = 9270;

  function generateRandomInduk() {
    const min = 1000; // Angka minimum untuk nomor induk random
    const max = 9999; // Angka maksimum untuk nomor induk random
    return Math.floor(Math.random() * (max - min + 1)) + min;
  }

  function generateNomorInduk() {
    nomorInduk = generateRandomInduk();
    document.getElementById("nomor-induk").value = nomorInduk;
  }
</script>

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