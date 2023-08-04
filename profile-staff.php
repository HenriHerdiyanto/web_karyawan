<?php
require_once 'header-staff.php';

$id_krywn = $_GET['id'];

$link = "getDivisi";
$data_divisi = getRegistran($link);

$link = "getKeluarga&id_karyawan=" . urlencode($id_krywn);
$data_keluarga = getRegistran($link);
// var_dump($data_keluarga);

$link = "getKaryawanById&id_karyawan=" . urlencode($id_krywn);
$data_karyawan = getRegistran($link);
$status = $data_karyawan->data[0]->status_karyawan;
// var_dump($status);

$link = "getProfilePendidikan&id_karyawan=" . urlencode($id_krywn);
$data_pendidikan = getRegistran($link);
// var_dump($data_pendidikan);


if (isset($_POST['submit'])) {
    $id_krywn = $_POST['id_karyawan'];
    $nama_ayah = $_POST['nama_ayah'];
    $tanggal_lahir_ayah = $_POST['tanggal_lahir_ayah'];
    $pendidikan_terakhir_ayah = $_POST['pendidikan_terakhir_ayah'];
    $pekerjaan_ayah = $_POST['pekerjaan_ayah'];
    $jabatan_ayah = $_POST['jabatan_ayah'];
    $nama_perusahaan_ayah = $_POST['nama_perusahaan_ayah'];
    $nama_ibu = $_POST['nama_ibu'];
    $tanggal_lahir_ibu = $_POST['tanggal_lahir_ibu'];
    $pendidikan_terakhir_ibu = $_POST['pendidikan_terakhir_ibu'];
    $pekerjaan_ibu = $_POST['pekerjaan_ibu'];
    $jabatan_ibu = $_POST['jabatan_ibu'];
    $nama_perusahaan_ibu = $_POST['nama_perusahaan_ibu'];

    $link = "setKeluarga&id_karyawan=" . urlencode($id_krywn) . "&nama_ayah=" . urlencode($nama_ayah) . "&tanggal_lahir_ayah=" . urlencode($tanggal_lahir_ayah) . "&pendidikan_terakhir_ayah=" . urlencode($pendidikan_terakhir_ayah) . "&pekerjaan_ayah=" . urlencode($pekerjaan_ayah) . "&jabatan_ayah=" . urlencode($jabatan_ayah) . "&nama_perusahaan_ayah=" . urlencode($nama_perusahaan_ayah) . "&nama_ibu=" . urlencode($nama_ibu) . "&tanggal_lahir_ibu=" . urlencode($tanggal_lahir_ibu) . "&pendidikan_terakhir_ibu=" . urlencode($pendidikan_terakhir_ibu) . "&pekerjaan_ibu=" . urlencode($pekerjaan_ibu) . "&jabatan_ibu=" . urlencode($jabatan_ibu) . "&nama_perusahaan_ibu=" . urlencode($nama_perusahaan_ibu);
    $keluarga = getRegistran($link);
    var_dump($keluarga);
    echo "<script>alert('Update Keluarga Berhasil')</script>";
    echo ("<script>location.href = 'dashboard-staff.php';</script>");
}

if (isset($_POST['update'])) {
    $id_krywn = $_POST['id_karyawan'];
    $nama_ayah = $_POST['nama_ayah'];
    $tanggal_lahir_ayah = $_POST['tanggal_lahir_ayah'];
    $pendidikan_terakhir_ayah = $_POST['pendidikan_terakhir_ayah'];
    $pekerjaan_ayah = $_POST['pekerjaan_ayah'];
    $jabatan_ayah = $_POST['jabatan_ayah'];
    $nama_perusahaan_ayah = $_POST['nama_perusahaan_ayah'];
    $nama_ibu = $_POST['nama_ibu'];
    $tanggal_lahir_ibu = $_POST['tanggal_lahir_ibu'];
    $pendidikan_terakhir_ibu = $_POST['pendidikan_terakhir_ibu'];
    $pekerjaan_ibu = $_POST['pekerjaan_ibu'];
    $jabatan_ibu = $_POST['jabatan_ibu'];
    $nama_perusahaan_ibu = $_POST['nama_perusahaan_ibu'];

    $link = "setUpdateKeluarga&id_karyawan=" . urlencode($id_krywn) . "&nama_ayah=" . urlencode($nama_ayah) . "&tanggal_lahir_ayah=" . urlencode($tanggal_lahir_ayah) . "&pendidikan_terakhir_ayah=" . urlencode($pendidikan_terakhir_ayah) . "&pekerjaan_ayah=" . urlencode($pekerjaan_ayah) . "&jabatan_ayah=" . urlencode($jabatan_ayah) . "&nama_perusahaan_ayah=" . urlencode($nama_perusahaan_ayah) . "&nama_ibu=" . urlencode($nama_ibu) . "&tanggal_lahir_ibu=" . urlencode($tanggal_lahir_ibu) . "&pendidikan_terakhir_ibu=" . urlencode($pendidikan_terakhir_ibu) . "&pekerjaan_ibu=" . urlencode($pekerjaan_ibu) . "&jabatan_ibu=" . urlencode($jabatan_ibu) . "&nama_perusahaan_ibu=" . urlencode($nama_perusahaan_ibu);
    $keluarga = getRegistran($link);
    var_dump($keluarga);
    echo "<script>alert('Update Keluarga Berhasil')</script>";
    echo ("<script>location.href = 'dashboard-staff.php';</script>");
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="foto_karyawan/<?php echo $data_karyawan->data[0]->foto_karyawan; ?>" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center"><?php echo $data_karyawan->data[0]->nama_lengkap; ?></h3>

                            <p class="text-muted text-center"><?php echo $data_karyawan->data[0]->nama_divisi; ?></p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item p-1">
                                    <b>Jenis Kelamin</b>
                                    <p class=""><?php echo $data_karyawan->data[0]->jenis_kelamin; ?>
                                    </p>
                                </li>
                                <li class="list-group-item p-1">
                                    <b>Tempat, Tanggal Lahir</b>
                                    <p class=""><?php echo $data_karyawan->data[0]->tempat_lahir; ?>, <?php echo $data_karyawan->data[0]->tanggal_lahir; ?></p>
                                </li>
                                <li class="list-group-item p-1">
                                    <b>No Handphone</b>
                                    <p class=""><?php echo $data_karyawan->data[0]->no_hp ?></p>
                                </li>
                                <li class="list-group-item p-1">
                                    <b>No KTP</b>
                                    <p class=""><?php echo $data_karyawan->data[0]->no_ktp; ?></p>
                                </li>
                                <li class="list-group-item p-1">
                                    <b>No NPWP</b>
                                    <p class=""><?php echo $data_karyawan->data[0]->no_npwp; ?></p>
                                </li>
                            </ul>

                            <a href="#" class="btn btn-outline-primary btn-block"><b>Follow</b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card ">
                        <div class="card-header">
                            <h3 class="card-title">Address</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat KTP</strong>
                            <p class="text-muted"><?php echo $data_karyawan->data[0]->alamat_ktp; ?></p>
                            <hr>
                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat Domisili</strong>
                            <p class="text-muted"><?php echo $data_karyawan->data[0]->alamat_domisili; ?></p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Umum</a></li>
                                <li class="nav-item"><a class="nav-link" href="#pendidikan" data-toggle="tab">Pendidikan</a></li>
                                <li class="nav-item"><a class="nav-link" href="#keluarga" data-toggle="tab">Keluarga</a></li>
                                <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Akun</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <form class="form-horizontal">
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Agama</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputName" value="<?php echo $data_karyawan->data[0]->agama; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Golongan Darah</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputEmail" value="<?php echo $data_karyawan->data[0]->gol_darah; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName2" class="col-sm-2 col-form-label">Status Pernikahan</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputName2" value="<?php echo $data_karyawan->data[0]->status_pernikahan; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputExperience" class="col-sm-2 col-form-label">Status Karyawan</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputName2" value="<?php echo $data_karyawan->data[0]->status_karyawan; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputSkills" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" value="<?php echo $data_karyawan->data[0]->email; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputSkills" class="col-sm-2 col-form-label">Jabatan</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" value="<?php echo $data_karyawan->data[0]->level_user; ?>" disabled>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                                <?php
                                if ($data_pendidikan == null) { ?>
                                    <div class="tab-pane" id="pendidikan">
                                        <div class="tab-pane" id="pendidikan">
                                            <h1 class="text-center mb-3">Silahkan UPDATE di Dashboard Anda</h1>
                                            <form class="form-horizontal">
                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label">JENJANG PENDIDIKAN</label>
                                                    <div class="col-sm-10">
                                                        <input type="email" class="form-control" id="inputName" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail" class="col-sm-2 col-form-label">INSTANSI PENDIDIKAN</label>
                                                    <div class="col-sm-10">
                                                        <input type="email" class="form-control" id="inputEmail" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputName2" class="col-sm-2 col-form-label">JURUSAN</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="inputName2" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputExperience" class="col-sm-2 col-form-label">TAHUN MASUK</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="inputName2" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputSkills" class="col-sm-2 col-form-label">TAHUN LULUS</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputSkills" class="col-sm-2 col-form-label">INDEX NILAI</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" disabled>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                <?php } else { ?>
                                    <!-- tab-pane-pendidikan -->
                                    <div class="tab-pane" id="pendidikan">
                                        <form class="form-horizontal">
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">JENJANG PENDIDIKAN</label>
                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control" id="inputName" value="<?php echo $data_pendidikan->data[0]->jenjang_pendidikan; ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail" class="col-sm-2 col-form-label">INSTANSI PENDIDIKAN</label>
                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control" id="inputEmail" value="<?php echo $data_pendidikan->data[0]->instansi_pendidikan; ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName2" class="col-sm-2 col-form-label">JURUSAN</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputName2" value="<?php echo $data_pendidikan->data[0]->jurusan; ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputExperience" class="col-sm-2 col-form-label">TAHUN MASUK</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="inputName2" value="<?php echo $data_pendidikan->data[0]->tahun_masuk; ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputSkills" class="col-sm-2 col-form-label">TAHUN LULUS</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" value="<?php echo $data_pendidikan->data[0]->tahun_lulus; ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputSkills" class="col-sm-2 col-form-label">INDEX NILAI</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" value="<?php echo $data_pendidikan->data[0]->index_nilai; ?>" disabled>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                <?php }
                                ?>

                                <div class="tab-pane" id="keluarga">
                                    <?php
                                    if ($data_keluarga == null) { ?>
                                        <form method="POST" class="form-horizontal">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group row">
                                                        <label for="inputName" class="col-sm-2 col-form-label">Nama Ayah</label>
                                                        <div class="col-sm-10">
                                                            <input type="hidden" class="form-control" name="id_karyawan" value="<?= $id_krywn ?>" placeholder="Name">
                                                            <input type="text" class="form-control mt-2" name="nama_ayah">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputName" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                                        <div class="col-sm-10">
                                                            <input type="date" class="form-control mt-2" name="tanggal_lahir_ayah">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputName" class="col-sm-2 col-form-label">Pendidikan Terakhir</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control mt-2" name="pendidikan_terakhir_ayah">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputName" class="col-sm-2 col-form-label">Pekerjaan Terakhir</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control mt-2" name="pekerjaan_ayah">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputName" class="col-sm-2 col-form-label">Jabatan Terakhir</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control mt-2" name="jabatan_ayah">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputName" class="col-sm-2 col-form-label">Nama Perusahaan</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control mt-2" name="nama_perusahaan_ayah">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group row">
                                                        <label for="inputName2" class="col-sm-2 col-form-label">Nama Ibu</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="nama_ibu">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputName" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                                        <div class="col-sm-10">
                                                            <input type="date" class="form-control mt-2" name="tanggal_lahir_ibu">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputName" class="col-sm-2 col-form-label">Pendidikan Terakhir</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control mt-2" name="pendidikan_terakhir_ibu">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputName" class="col-sm-2 col-form-label">Pekerjaan Terakhir</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control mt-2" name="pekerjaan_ibu">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputName" class="col-sm-2 col-form-label">Jabatan Terakhir</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control mt-2" name="jabatan_ibu">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputName" class="col-sm-2 col-form-label">Nama Perusahaan</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control mt-2" name="nama_perusahaan_ibu">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row ">
                                                        <div class=" col-sm-10">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class=" col-sm-10">
                                                            <button type="submit" name="submit" class="btn btn-danger">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    <?php } else { ?>
                                        <form method="POST" class="form-horizontal">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group row">
                                                        <label for="inputName" class="col-sm-2 col-form-label">Nama Ayah</label>
                                                        <div class="col-sm-10">
                                                            <input type="hidden" class="form-control" name="id_karyawan" value="<?= $id_krywn ?>" placeholder="Name">
                                                            <input type="text" class="form-control mt-2" name="nama_ayah" value="<?= $data_keluarga->data[0]->nama_ayah ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputName" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                                        <div class="col-sm-10">
                                                            <input type="date" class="form-control mt-2" name="tanggal_lahir_ayah" value="<?= $data_keluarga->data[0]->tanggal_lahir_ayah ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputName" class="col-sm-2 col-form-label">Pendidikan Terakhir</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control mt-2" name="pendidikan_terakhir_ayah" value="<?= $data_keluarga->data[0]->pendidikan_terakhir_ayah ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputName" class="col-sm-2 col-form-label">Pekerjaan Terakhir</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control mt-2" name="pekerjaan_ayah" value="<?= $data_keluarga->data[0]->pekerjaan_ayah ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputName" class="col-sm-2 col-form-label">Jabatan Terakhir</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control mt-2" name="jabatan_ayah" value="<?= $data_keluarga->data[0]->jabatan_ayah ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputName" class="col-sm-2 col-form-label">Nama Perusahaan</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control mt-2" name="nama_perusahaan_ayah" value="<?= $data_keluarga->data[0]->nama_perusahaan_ayah ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group row">
                                                        <label for="inputName2" class="col-sm-2 col-form-label">Nama Ibu</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" name="nama_ibu" value="<?= $data_keluarga->data[0]->nama_ibu ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputName" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                                        <div class="col-sm-10">
                                                            <input type="date" class="form-control mt-2" name="tanggal_lahir_ibu" value="<?= $data_keluarga->data[0]->tanggal_lahir_ibu ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputName" class="col-sm-2 col-form-label">Pendidikan Terakhir</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control mt-2" name="pendidikan_terakhir_ibu" value="<?= $data_keluarga->data[0]->pendidikan_terakhir_ibu ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputName" class="col-sm-2 col-form-label">Pekerjaan Terakhir</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control mt-2" name="pekerjaan_ibu" value="<?= $data_keluarga->data[0]->pekerjaan_ibu ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputName" class="col-sm-2 col-form-label">Jabatan Terakhir</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control mt-2" name="jabatan_ibu" value="<?= $data_keluarga->data[0]->jabatan_ibu ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputName" class="col-sm-2 col-form-label">Nama Perusahaan</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control mt-2" name="nama_perusahaan_ibu" value="<?= $data_keluarga->data[0]->nama_perusahaan_ibu ?>">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row ">
                                                        <div class=" col-sm-10">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class=" col-sm-10">
                                                            <button type="submit" name="update" class="btn btn-success">UPDATE</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    <?php }
                                    ?>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="timeline">
                                    <!-- The timeline -->
                                    <div class="timeline timeline-inverse">
                                        <!-- timeline time label -->
                                        <div class="time-label">
                                            <span class="bg-warning">
                                                Account
                                            </span>
                                        </div>
                                        <!-- /.timeline-label -->
                                        <!-- timeline item -->
                                        <div>
                                            <i class="fas fa-user bg-info"></i>


                                            <div class="timeline-item">
                                                <span class="time"><i class="far fa-clock"></i> 12:05</span>

                                                <h3 class="timeline-header"><a href=""><?php echo $data_karyawan->data[0]->nama_lengkap; ?></a></h3>
                                                <?php
                                                if (isset($_POST['fotoupdate'])) {
                                                    $id_krywn = $_POST['id_karyawan'];
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
                                                            $nama_file = $id_krywn . "-" . $id_krywn . "." . $extensi_file;
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

                                                    $link = "setUpdateFoto&id_karyawan=" . urlencode($id_krywn) . '&foto_karyawan=' . urlencode($nama_file);
                                                    $update = getRegistran($link);
                                                    var_dump($update);
                                                }
                                                ?>
                                                <form action="" method="post" enctype="multipart/form-data">
                                                    <div class="timeline-body">
                                                        <div class="row m-2">
                                                            <div class="col-lg-6">
                                                                <div class="mb-2">
                                                                    <img class="img-fluid" src="foto_karyawan/<?php echo $data_karyawan->data[0]->foto_karyawan ?>" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-2">
                                                                    <label for="username">Your Username</label>
                                                                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo $data_karyawan->data[0]->username; ?>" readonly>
                                                                </div>
                                                                <div class="mb-2">
                                                                    <label for="password">Your Password</label>
                                                                    <input type="text" class="form-control" id="password" name="password" placeholder="Password" value="<?php echo $data_karyawan->data[0]->password; ?>" readonly>
                                                                </div>
                                                                <div class="mb-2">
                                                                    <label for="foto_karyawan">Change Your Photo</label>
                                                                    <input type="hidden" class="form-control" id="id_karyawan" name="id_karyawan" placeholder="id_karyawan" value="<?php echo $data_karyawan->data[0]->id_karyawan; ?>">
                                                                    <input type="file" class="form-control" id="foto_karyawan" name="foto_karyawan" placeholder="Foto" value="<?php echo $data_karyawan->data[0]->foto_karyawan; ?>">
                                                                </div>
                                                                <div class="mb-2">
                                                                    <button type="submit" name="fotoupdate" class="btn btn-outline-primary w-100">UPDATE</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>

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
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>

</html>