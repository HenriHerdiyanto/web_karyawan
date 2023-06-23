<?php
include "controller/koneksi.php";
require_once 'header.php';



?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6 text-right">
          <form action="karyawan_tambah.php" method="post">
            <button class="btn btn-lg btn-success" type="submit">
              <i class="fas fa-plus"></i> Add KORDINATOR
            </button>
          </form>
        </div>
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              <?php
              $query = mysqli_query($connect, "SELECT status, COUNT(*) as jumlah_data FROM perjalanan_dinas WHERE status = 'diproses'");
              $row = mysqli_fetch_assoc($query);
              $jumlah_data = $row['jumlah_data'];
              ?>
              <h3><?php echo $jumlah_data; ?> Notifikasi</h3>
              <p>Perjalanan Dinas</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-albums"></i>
            </div>
            <a href="perjalanan_dinas.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
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
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
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
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
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
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                Semua To Do List
              </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content p-0">
                <!-- Morris chart - Sales -->
                <div class="card-body table-responsive" id="revenue-chart" style="position: relative;">
                  <?php
                  $link = "getToDoListAll";
                  $output4 = getRegistran($link);
                  if ($output4 == NULL) { ?>
                    <div class="card text-center">
                      <div class="card-body">
                        <h5 class="card-text">Belum ada To Do List, silahkan tambahkan To do List</h5>
                      </div>
                    </div>
                  <?php } else { ?>


                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>No. </th>
                          <th>Nama Project</th>
                          <th>Kegiatan</th>
                          <th>Tanggal Mulai</th>
                          <th>Lama Hari</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($output4->data as $key => $array_item) :
                          $mulai = $array_item->tanggal_mulai;
                          $awal = date_create($mulai);
                          $akhir = date_create();
                          $diff = date_diff($awal, $akhir);
                        ?>
                          <tr class="<?php if ($array_item->status_job == 'Open') {
                                        echo 'table-success';
                                      } elseif ($array_item->status_job == 'Running') {
                                        echo 'table-warning';
                                      } else {
                                        echo 'table-danger';
                                      } ?>">
                            <td><?php echo $key + 1 ?></td>
                            <td><?php echo $array_item->nama_project; ?></td>
                            <td><?php echo $array_item->subjek; ?></td>
                            <td><?php echo $array_item->tanggal_mulai; ?></td>
                            <td><?php echo $diff->days; ?> Hari</td>
                            <td>
                              <?php echo $array_item->status_job;
                              if ($array_item->status_job == 'Close') {
                                echo '<br> ' . date('d-m-Y', strtotime($array_item->update_time));
                              }
                              ?>

                            </td>
                          </tr>
                        <?php endforeach ?>
                      </tbody>
                    </table>
                  <?php } ?>
                </div>
              </div>
            </div><!-- /.card-body -->
          </div>
        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">

          <!-- Map card -->

          <!-- /.card -->

          <!-- Calendar -->
          <div class="card bg-gradient-success">
            <div class="card-header border-0">

              <h3 class="card-title">
                <i class="far fa-calendar-alt"></i>
                Calendar
              </h3>
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body pt-0">
              <!--The calendar -->
              <div id="calendar" style="width: 100%"></div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
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
<!-- AdminLTE for demo purposes -->
<!-- <script src="dist/js/demo.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
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
  // The Calender
  $('#calendar').datetimepicker({
    format: 'L',
    inline: true
  })
</script>
</body>

</html>