<?php
include "controller/koneksi.php";
require_once 'header.php';



?>

<div class="content-wrapper" style="height: cover;">
  <div class="content-header">
    <div class="container-fluid">
      <div class="card">
        <div class="row">
          <div class="col">
            <h1 class="m-3">Dashboard</h1>
          </div>
          <div align="end" class="col mt-2 mr-3">
            <form action="karyawan_tambah.php" method="post">
              <button class="btn btn-lg btn-success" type="submit">
                <i class="fas fa-plus"></i> Add KORDINATOR
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-sm-12">
          <div class="small-box bg-info">
            <div class="inner">
              <?php
              $query = mysqli_query($connect, "SELECT status, COUNT(*) as jumlah_data FROM perjalanan_dinas WHERE status = 'diproses'");
              $row = mysqli_fetch_assoc($query);
              $jumlah_data = $row['jumlah_data'];
              ?>
              <h3><?php echo $jumlah_data; ?> Notifikasi Belum Lihat</h3>
              <p>Perjalanan Dinas</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-albums"></i>
            </div>
            <a href="perjalanan_dinas.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-sm-12">
          <div class="small-box bg-success">
            <div class="inner">
              <?php
              $query = mysqli_query($connect, "SELECT status, COUNT(*) as jumlah_data FROM pinjam_karyawan WHERE status = 'diproses'");
              $row = mysqli_fetch_assoc($query);
              $jumlah_data = $row['jumlah_data'];
              ?>
              <h3><?php echo $jumlah_data; ?> Notifikasi</h3>
              <p>Peminjaman Karyawan</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-copy"></i>
            </div>
            <a href="peminjaman_karyawan.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-sm-12">
          <div class="small-box bg-warning">
            <div class="inner">
              <?php
              $query = mysqli_query($connect, "SELECT nama_lengkap, COUNT(*) as jumlah_data FROM karyawan");
              $row = mysqli_fetch_assoc($query);
              $jumlah_data = $row['jumlah_data'];
              ?>
              <h3><?php echo $jumlah_data; ?> Karyawan</h3>
              <p>Jumlah Karyawan</p>
            </div>
            <div class="icon">
              <i class="ion ion-locked"></i>
            </div>
            <a href="staff.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-sm-12">
          <div class="small-box bg-danger">
            <div class="inner">
              <?php
              $query = mysqli_query($connect, "SELECT nama_divisi, COUNT(*) as jumlah_data FROM divisi");
              $row = mysqli_fetch_assoc($query);
              $jumlah_data = $row['jumlah_data'];
              ?>
              <h3><?php echo $jumlah_data; ?> DIVISI</h3>
              <p>Jumlah Divisi</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-stalker"></i>
            </div>
            <a href="divisi.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      <div class="row">
        <section class="col-lg-7 connectedSortable">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                Semua To Do List
              </h3>
            </div>
            <div class="card-body">
              <div class="tab-content p-0">
                <!-- Morris chart - Sales -->
                <div class="card-body table-responsive" id="revenue-chart" style="position: relative;">
                  <?php
                  $link = "getTodoListAdm&id_user=" . urlencode($id_user);
                  $output4 = getRegistran($link);
                  if ($output4 == NULL) { ?>
                    <div class="card text-center">
                      <div class="card-body">
                        <h5 class="card-text">Belum ada To Do List, silahkan tambahkan To do List</h5>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                          Tambah To Do List
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah To Do List</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <?php
                              if (isset($_POST['todo'])) {
                                $id_user = $_POST['id_user'];
                                $nama_project = $_POST['nama_project'];
                                $todolist = $_POST['todolist'];

                                $link = "setTodolist&id_user=" . urlencode($id_user) . "&nama_project=" . urlencode($nama_project) . "&todolist=" . urlencode($todolist);
                                $todo = getRegistran($link);
                                echo "<script>alert('To Do List Ditambahkan')</script>";
                                echo ("<script>location.href = 'index.php';</script>");
                              }
                              ?>
                              <form action="" method="post">
                                <div class="modal-body">
                                  <label for="">Nama Project</label><br>
                                  <input type="text" class="form-control" name="id_user" value="<?= $id_user ?>"><br>
                                  <input type="text" class="form-control" name="nama_project"><br>
                                  <textarea name="todolist" class="form-control" cols="30" rows="10"></textarea>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="submit" name="todo" class="btn btn-primary">Understood</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php } else { ?>
                    <?php
                    if (isset($_POST['updatetodo'])) {
                      $id_user = $_POST['id_user'];
                      $nama_project = $_POST['nama_project'];
                      $todolist = $_POST['todolist'];

                      $link = "setUpdateTodo&id_user=" . urlencode($id_user) . "&nama_project=" . urlencode($nama_project) . "&todolist=" . urlencode($todolist);
                      $datas = getRegistran($link);
                      var_dump($datas);
                      // echo ("<script>location.href = 'kordinator.php';</script>");
                    }
                    ?>
                    <form action="" method="post">
                      <div class="card">
                        <div class="card-body">

                          <input type="hidden" name="id_user" class="form-control" value="<?= $output4->data[0]->id_user ?>"><br>
                          <input type="text" name="nama_project" class="form-control" value="<?= $output4->data[0]->nama_project ?>"><br>
                          <textarea name="todolist" class="form-control" cols="30" rows="10"><?= $output4->data[0]->todolist ?></textarea>
                        </div>
                        <div class="card-footer">
                          <center><button type="submit" name="updatetodo" class="btn btn-outline-primary d-flex justify-content-center">UPDATE To Do List</button></center>
                        </div>
                      </div>
                    </form>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </section>

        <section class="col-lg-5 connectedSortable">
          <div class="card bg-gradient-success">
            <div class="card-header border-0">
              <h3 class="card-title">
                <i class="far fa-calendar-alt"></i>
                Calendar
              </h3>
            </div>
            <div class="card-body pt-0">
              <div id="calendar" style="width: 100%"></div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </section>
</div>
<aside class="control-sidebar control-sidebar-dark">
</aside>
</div>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
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
<script>
  $(document).ready(function() {
    $('#example').DataTable();
  });
</script>
<script>
  $('#calendar').datetimepicker({
    format: 'L',
    inline: true
  })
</script>
</body>

</html>