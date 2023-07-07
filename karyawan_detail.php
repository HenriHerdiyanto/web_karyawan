<?php
require_once 'header.php';

$id_krywn = $_GET['id'];

$link = "getDivisi";
$data_divisi = getRegistran($link);

$link = "getKaryawanById&id_karyawan=" . urlencode($id_krywn);
$data_karyawan = getRegistran($link);
$status = $data_karyawan->data[0]->status_karyawan;
var_dump($status);

$link = "getProfilePendidikan&id_karyawan=" . urlencode($id_krywn);
$data_pendidikan = getRegistran($link);
// var_dump($data_pendidikan);

$link = "getKeluarga&id_karyawan=" . urlencode($id_krywn);
$data_keluarga = getRegistran($link);
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
    </div>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
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
                  <p class="">
                    <?php if ($data_karyawan->data[0]->jenis_kelamin = 0) {
                      echo 'Laki-laki';
                    } else {
                      echo 'Perempuan';
                    } ?>
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

              <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
            </div>
          </div>

          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Address</h3>
            </div>
            <div class="card-body">
              <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat KTP</strong>
              <p class="text-muted"><?php echo $data_karyawan->data[0]->alamat_ktp; ?></p>
              <hr>
              <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat Domisili</strong>
              <p class="text-muted"><?php echo $data_karyawan->data[0]->alamat_domisili; ?></p>
            </div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Umum</a></li>
                <li class="nav-item"><a class="nav-link" href="#pendidikan" data-toggle="tab">Pendidikan</a></li>
                <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Keluarga</a></li>
                <!-- <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li> -->
              </ul>
            </div>
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
                <div class="tab-pane" id="pendidikan">
                  <div class="d-grid gap-2 d-md-flex justify-content-md-end pb-3">
                    <!-- <a href="karyawan_tambah.php" class="btn btn-success " type="button">
                      <i class="fas fa-plus"></i> Add Karyawan
                    </a> -->
                  </div>
                  <div class="card-body">
                    <?php
                    if ($data_pendidikan == null) { ?>
                      <div class="tab-pane" id="pendidikan">
                        <h1 class="text-center">USER BELUM UPDATE</h1>
                      </div>
                    <?php } else { ?>
                      <div class="tab-pane" id="pendidikan">
                        <form class="form-horizontal">
                          <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">JENJANG PENDIDIKAN :</label>
                            <div class="col-sm-10">
                              <input type="email" class="form-control" id="inputName" value="<?php echo $data_pendidikan->data[0]->jenjang_pendidikan; ?>" disabled>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">INSTANSI PENDIDIKAN :</label>
                            <div class="col-sm-10">
                              <input type="email" class="form-control" id="inputEmail" value="<?php echo $data_pendidikan->data[0]->instansi_pendidikan; ?>" disabled>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">JURUSAN :</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="inputName2" value="<?php echo $data_pendidikan->data[0]->jurusan; ?>" disabled>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputExperience" class="col-sm-2 col-form-label">TAHUN MASUK :</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="inputName2" value="<?php echo $data_pendidikan->data[0]->tahun_masuk; ?>" disabled>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputSkills" class="col-sm-2 col-form-label">TAHUN LULUS :</label>
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
                  </div>
                </div>

                <div class="tab-pane" id="timeline">
                  <?php
                  if ($data_keluarga == null) { ?>
                    <div class="tab-pane" id="pendidikan">
                      <h1 class="text-center">USER BELUM UPDATE</h1>
                    </div>
                    <!-- <form method="POST" class="form-horizontal">
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
                        </form> -->
                  <?php } else { ?>
                    <!-- <form method="POST" class="form-horizontal"> -->
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Nama Ayah</label>
                          <div class="col-sm-10">
                            <input type="hidden" class="form-control" name="id_karyawan" value="<?= $id_krywn ?>" placeholder="Name">
                            <input type="text" class="form-control mt-2" name="nama_ayah" value="<?= $data_keluarga->data[0]->nama_ayah ?>" readonly>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                          <div class="col-sm-10">
                            <input type="date" class="form-control mt-2" name="tanggal_lahir_ayah" value="<?= $data_keluarga->data[0]->tanggal_lahir_ayah ?>" readonly>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Pendidikan Terakhir</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control mt-2" name="pendidikan_terakhir_ayah" value="<?= $data_keluarga->data[0]->pendidikan_terakhir_ayah ?>" readonly>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Pekerjaan Terakhir</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control mt-2" name="pekerjaan_ayah" value="<?= $data_keluarga->data[0]->pekerjaan_ayah ?>" readonly>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Jabatan Terakhir</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control mt-2" name="jabatan_ayah" value="<?= $data_keluarga->data[0]->jabatan_ayah ?>" readonly>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Nama Perusahaan</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control mt-2" name="nama_perusahaan_ayah" value="<?= $data_keluarga->data[0]->nama_perusahaan_ayah ?>" readonly>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group row">
                          <label for="inputName2" class="col-sm-2 col-form-label">Nama Ibu</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama_ibu" value="<?= $data_keluarga->data[0]->nama_ibu ?>" readonly>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                          <div class="col-sm-10">
                            <input type="date" class="form-control mt-2" name="tanggal_lahir_ibu" value="<?= $data_keluarga->data[0]->tanggal_lahir_ibu ?>" readonly>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Pendidikan Terakhir</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control mt-2" name="pendidikan_terakhir_ibu" value="<?= $data_keluarga->data[0]->pendidikan_terakhir_ibu ?>" readonly>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Pekerjaan Terakhir</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control mt-2" name="pekerjaan_ibu" value="<?= $data_keluarga->data[0]->pekerjaan_ibu ?>" readonly>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Jabatan Terakhir</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control mt-2" name="jabatan_ibu" value="<?= $data_keluarga->data[0]->jabatan_ibu ?>" readonly>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Nama Perusahaan</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control mt-2" name="nama_perusahaan_ibu" value="<?= $data_keluarga->data[0]->nama_perusahaan_ibu ?>" readonly>
                          </div>
                        </div>
                        <!-- <div class="form-group row ">
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
                            </div> -->
                      </div>
                    </div>
                    <!-- </form> -->
                  <?php }
                  ?>
                </div>
                <!-- <div class="tab-pane" id="settings">
                  <form class="form-horizontal">
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputName" placeholder="Name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName2" placeholder="Name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-danger">Submit</button>
                      </div>
                    </div>
                  </form>
                </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
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