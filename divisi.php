<?php
require_once 'header.php';

// input Divisi
if (isset($_POST['submit'])) {
  $kode_divisi = $_POST['kode_divisi'];
  $nama_divisi = $_POST['nama_divisi'];


  $link = "setDivisi&kode_divisi=" . urlencode($kode_divisi) . '&nama_divisi=' . urlencode($nama_divisi) . '&type=insert';
  $data = getRegistran($link);
  echo '<script>alert("data berhasil ditambah")</script>';
}

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Divisi</h1>
        </div>
        <div class="col-sm-6 float-sm-right">
          <button class="btn btn-lg btn-success float-sm-right" type="button" data-toggle="modal" data-target="#AddDivisi">
            <i class="fas fa-plus"></i> Add Divisi
          </button>
        </div>
        <!-- Modal Add Divisi -->
        <div class="modal fade" id="AddDivisi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Divisi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="post">
                  <div class="form-group">
                    <label for="">Kode Divisi</label>
                    <input class="form-control" type="text" name="kode_divisi">
                  </div>
                  <div class="form-group">
                    <label for="">Nama Divisi</label>
                    <input class="form-control" type="text" name="nama_divisi">
                  </div>
                  <button type="submit" name="submit" class="btn btn-primary w-100">Submit</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </section>

  <!-- Main content -->
  <?php
  $link = "getDivisi";
  $data = getRegistran($link);
  ?>
  <section class="content">
    <div class="container-fluid">

      <div class="row">
        <?php foreach ($data->data as $key => $value) {
          $link = "getDivisibyIdDiv&id_divisi=" . urlencode($value->id_divisi);
          $data = getRegistran($link);

          // input Divisi
          if (isset($_POST['save'])) {
            $id_divisi2 = $_POST['id_divisi2'];
            $kode_divisi2 = $_POST['kode_divisi2'];
            $nama_divisi2 = $_POST['nama_divisi2'];


            $link = "setUpdateDivisiId&id_divisi=" . urlencode($id_divisi2) . '&kode_divisi=' . urlencode($kode_divisi2) . '&nama_divisi=' . urlencode($nama_divisi2);
            $data = getRegistran($link);
            echo '<script>alert("data berhasil diupdate")</script>';
            echo "<script>location = 'divisi.php'</script>";
          }
        ?>

          <!-- Modal Edit Divisi -->
          <div class="modal fade" id="divedit<?php echo $value->id_divisi; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Divisi</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="post">
                    <input class="form-control" type="hidden" name="id_divisi2" name="kode_divisi2" value="<?php echo $value->id_divisi ?>">
                    <div class="form-group">
                      <label for="">Kode Divisi</label>
                      <input class="form-control" type="text" name="kode_divisi2" value="<?php echo $value->kode_divisi ?>">
                    </div>
                    <div class="form-group">
                      <label for="">Nama Divisi</label>
                      <input class="form-control" type="text" name="nama_divisi2" value="<?php echo $value->nama_divisi ?>">
                    </div>
                    <button type="submit" name="save" class="btn btn-primary w-100">Simpan</button>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-info">
                <h5 class="widget-user-desc">DIVISI</h5>
                <h3 class="widget-user-username"><?php echo $value->nama_divisi; ?></h3>
              </div>
              <div class="widget-user-image">
                <img class="img-circle elevation-2" src="assets/img/logomt.png" alt="User Avatar">
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">KODE</h5>
                      <span class="description-text"><?php echo $value->kode_divisi; ?></span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <a class="btn btn-primary" type="button" data-toggle="modal" data-target="#divedit<?php echo $value->id_divisi; ?>" data-bs-toggle="tooltip" title="Ubah">
                        <i class="fas fa-edit"></i>
                      </a>
                      <!-- <a class="btn btn-success" type="button" data-toggle="modal" data-target="#divedit<?php echo $value->id_divisi; ?>" data-bs-toggle="tooltip" title="Ubah">
                        <i class="fas fa-plus"></i>
                      </a> -->
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                      <?php
                      // Delete Divisi
                      if (isset($_POST['delete'])) {
                        $id_divisi3 = $_POST['id_divisi3'];
                        $link = "getDeleteDivisiId&id_divisi=" . urlencode($id_divisi3);
                        $data = getRegistran($link);
                        echo '<script>alert("data berhasil dihapus")</script>';
                        echo "<script>location = 'divisi.php'</script>";
                      }

                      ?>
                      <form method="post">
                        <input type="hidden" name="id_divisi3" value="<?php echo $value->id_divisi; ?>">
                        <button class="btn btn-danger" type="submit" name="delete" data-bs-toggle="tooltip" title="Hapus">
                          <i class="fas fa-trash"></i>
                        </button>
                      </form>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.widget-user -->
          </div>
        <?php } ?>
        <!-- /.col -->
      </div>
      <!-- /.row -->
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