<?php
require_once 'header.php';


?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Kordinator</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <!-- <div class="card-header">
              <h3 class="card-title">Data Staf Karyawan</h3>
              <div class="d-grid gap-2 d-md-flex justify-content-md-end pb-3">
                <a href="karyawan_tambah.php" class="btn btn-success " type="button">
                  <i class="fas fa-plus"></i> Add Karyawan
                </a>
              </div>

              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Input Staf</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="post">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Nama Lengkap</label>
                          <input type="text" class="form-control" name="nama_lengkap">
                        </div>
                        <div class="form-group">
                          <label for="">Jenis Kelamin</label>
                          <select class="form-control" name="jenis_kelamin">
                            <option selected>--Pilih Gender--</option>
                            <option value="0">Laki-laki</option>
                            <option value="1">Perempuan</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Email</label>
                          <input type="email" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Password</label>
                          <input type="text" class="form-control" name="password">
                        </div>
                        <div class="form-group">
                          <label for="">Jabatan</label>
                          <select class="form-control" name="level">
                            <option selected>--Pilih Posisi--</option>
                            <option value="0">Admin</option>
                            <option value="1">Supervisor</option>
                            <option value="2">Staf</option>
                          </select>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary w-100">Submit</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
            <?php
            $link = "getKordinator";
            $data = getRegistran($link);
            ?>
            <div class="row d-flex justify-content-center">
              <div class="col-lg-3">
                <div class="card text-center m-3">
                  <h5 class="card-header">KO'ORDINATOR</h5>
                  <div class="card-body">
                    <center>
                      <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" fill="currentColor" class="bi bi-person-bounding-box" viewBox="0 0 16 16">
                        <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z" />
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                      </svg>
                    </center>
                    <br>
                    <h4><?php echo $data->data[0]->nama_user ?></h4>
                  </div>
                  <div class="card-footer">
                    <a href="anggota.php?id=<?php echo $data->data[0]->id_user ?>" class="btn btn-primary">Anggota</a>
                  </div>
                </div>
              </div>
            </div>



          </div>


          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
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
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="dist/js/demo.js"></script> -->
<!-- Page specific script -->
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
</body>

</html>