<?php
require_once 'header.php';

$id_krywn = $_GET['id'];

$link = "getDivisi";
$data_divisi = getRegistran($link);

$link = "getKaryawanById&id_karyawan=" . urlencode($id_krywn);
$data_karyawan = getRegistran($link);
$status = $data_karyawan->data[0]->status_karyawan;
var_dump($status);

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
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- About Me Box -->
          <div class="card card-primary">
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
                <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
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

                <!-- tab-pane-pendidikan -->
                <div class="tab-pane" id="pendidikan">
                  <div class="d-grid gap-2 d-md-flex justify-content-md-end pb-3">
                    <a href="karyawan_tambah.php" class="btn btn-success " type="button">
                      <i class="fas fa-plus"></i> Add Karyawan
                    </a>
                  </div>

                  <div class="card-body table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>No. </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>

                <div class="tab-pane" id="timeline">
                  <!-- The timeline -->
                  <div class="timeline timeline-inverse">
                    <!-- timeline time label -->
                    <div class="time-label">
                      <span class="bg-danger">
                        10 Feb. 2014
                      </span>
                    </div>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <div>
                      <i class="fas fa-envelope bg-primary"></i>

                      <div class="timeline-item">
                        <span class="time"><i class="far fa-clock"></i> 12:05</span>

                        <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                        <div class="timeline-body">
                          Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                          weebly ning heekya handango imeem plugg dopplr jibjab, movity
                          jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                          quora plaxo ideeli hulu weebly balihoo...
                        </div>
                        <div class="timeline-footer">
                          <a href="#" class="btn btn-primary btn-sm">Read more</a>
                          <a href="#" class="btn btn-danger btn-sm">Delete</a>
                        </div>
                      </div>
                    </div>
                    <!-- END timeline item -->
                    <!-- timeline item -->
                    <div>
                      <i class="fas fa-user bg-info"></i>

                      <div class="timeline-item">
                        <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                        <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                        </h3>
                      </div>
                    </div>
                    <!-- END timeline item -->
                    <!-- timeline item -->
                    <div>
                      <i class="fas fa-comments bg-warning"></i>

                      <div class="timeline-item">
                        <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                        <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                        <div class="timeline-body">
                          Take me to your leader!
                          Switzerland is small and neutral!
                          We are more like Germany, ambitious and misunderstood!
                        </div>
                        <div class="timeline-footer">
                          <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                        </div>
                      </div>
                    </div>
                    <!-- END timeline item -->
                    <!-- timeline time label -->
                    <div class="time-label">
                      <span class="bg-success">
                        3 Jan. 2014
                      </span>
                    </div>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <div>
                      <i class="fas fa-camera bg-purple"></i>

                      <div class="timeline-item">
                        <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                        <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                        <div class="timeline-body">
                          <img src="https://placehold.it/150x100" alt="...">
                          <img src="https://placehold.it/150x100" alt="...">
                          <img src="https://placehold.it/150x100" alt="...">
                          <img src="https://placehold.it/150x100" alt="...">
                        </div>
                      </div>
                    </div>
                    <!-- END timeline item -->
                    <div>
                      <i class="far fa-clock bg-gray"></i>
                    </div>
                  </div>
                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="settings">
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