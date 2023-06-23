<?php
require_once 'header.php';

$link = "getDivisi";
$data_divisi = getRegistran($link);

$link = "getUserALL";
$data_user = getRegistran($link);

$link = "getKordinator";
$data = getRegistran($link);

$link = "getDivisiUser";
$data2 = getRegistran($link);
// var_dump($data2);

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <section class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-6">
                    <h1>Semua Kordinator</h1>
                  </div>
                  <div class="col-sm-6 text-right">
                    <button class="btn btn-lg btn-success" type="button" data-toggle="modal" data-target="#AddDivisi">
                      <i class="fas fa-plus"></i> Add Kordinator
                    </button>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>
      </div>
      <div class="row">
        <?php
        if ($data2 == null) { ?>
          <div class="col-lg-12">
            <div class="card">
              <section class="content-header">
                <div class="container-fluid">
                  <div class="row mb-2">
                    <div class="col-sm-12">
                      <h1 class="text-center">Belum ada data</h1>
                      <center><img src="assets/img/logo-header.png" class="img-fluid" alt=""></center>
                    </div>
                  </div>
                </div>
              </section>
            </div>
          </div>
        <?php } else { ?>
          <?php foreach ($data2->data as $key => $array_item) :
            $nama_user = $array_item->nama_user;
            // var_dump($data2);
          ?>
            <div class="col-lg-3 col-md-6 col-sm-12">
              <div class="card ">
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3><?php echo $array_item->nama_divisi ?></h3>
                    <?php
                    if ($nama_user == null) { ?>
                      <h4>Belum ada Kordinator</h4>
                    <?php } else { ?>
                      <h4><?php echo $array_item->nama_user ?></h4>
                    <?php }
                    ?>
                  </div>
                  <div class="icon">
                    <i class="ion ion-ios-albums"></i>
                  </div>
                  <a href="anggota.php?id=<?php echo $array_item->id_user ?>" class="small-box-footer">Anggota<i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
            </div>
          <?php endforeach ?>
        <?php }
        ?>
      </div>
    </div>
  </section>

  <!-- Modal Add Divisi -->
  <div class="modal fade" id="AddDivisi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Kordinator</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post">
            <div class="form-group">
              <label for="">Nama User</label>
              <input type="text" name="nama_user" class="form-control">
            </div>
            <div class="form-group">
              <label for="">Username</label>
              <input type="text" name="username" class="form-control">
            </div>
            <div class="form-group">
              <label for="">Password</label>
              <input type="text" name="password" class="form-control">
            </div>
            <div class="form-group">
              <label for="">Level User</label>
              <select name="level_user" class="form-control">
                <option value="1"></option>
              </select>
            </div>
            <button type="submit" name="submit" class="btn btn-primary w-100">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>

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