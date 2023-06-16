<?php 
require_once 'controller/utility.php';
$id = $_GET['id'];

$link = "getProjectId&id_project=" . urlencode($id);
$output1 = getRegistran($link);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cetak Project Detail</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body>
  <div class="wrapper">
    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-12">
          <h2 class="page-header">
            <img src="assets/img/logo-header.png" style="height: 100px;">
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <div class="m-5"></div>
      <div class="m-5"></div>
      <div class="m-5"></div>
      <div class="m-5"></div>
      <div class="m-5"></div>
      <div class="container">
        <!-- info row -->
        <div class="row invoice-info mb-3">
          <div class="col-sm-8 invoice-col">
            <h1><b><?php echo $output1->data[0]->nama_project; ?></b></h1>
            <small><b>Leader Project :</b></small>
            <h3><?php echo $output1->data[0]->nama_lengkap; ?></h3>
          </div>
          
          <!-- /.col -->
          <div class="col-sm-4 invoice-col">
            <small><b>Project Start :</b></small>
            <h3><?php echo date('d F Y',strtotime($output1->data[0]->start_project)); ?></h3>
            <?php if ($output1->data[0]->status == 'Close') { ?>
              <small><b>Project Fibish :</b></small>
              <h3><?php echo date('d F Y',strtotime($output1->data[0]->time_update)); ?></h3>
            <?php } ?>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <?php 
        $link = "getMemberId&id_project=" . urlencode($id);
        $output3 = getRegistran($link);

        $link = "getToDoListId&id_project=" . urlencode($id);
        $output4 = getRegistran($link);
        ?>
        <!-- Table row -->
        <div class="row">
          <div class="col-12 table-responsive">
            <p class="lead"><b>Member Project :</b></p>
            <?php if ($output3 == NULL) { ?>
              <div class="card text-center">
                <div class="card-body">
                  <h5 class="card-text">Kosong</h5>
                </div>
              </div>
            <?php } else { ?>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Bagian</th>
                    <th>Project</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($output3->data as $key=>$array_item) : ?>
                    <tr>
                      <td><?php echo $key+1 ?></td>
                      <td><?php echo $array_item->nama_lengkap; ?></td>
                      <td><?php echo $array_item->deskripsi; ?></td>
                      <td><?php echo $array_item->nama_project; ?></td>
                      <td><?php echo $array_item->status_member; ?></td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            <?php } ?>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <!-- accepted payments column -->
          <!-- /.col -->
          <div class="col-12">
            <p class="lead"><b>To Do List :</b></p>

            <div class="table-responsive">
              <?php if ($output4 == NULL) { ?>
                <div class="card text-center">
                  <div class="card-body">
                    <h5 class="card-text">Kosong</h5>
                  </div>
                </div>
              <?php } else { ?>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>No. </th>
                      <th>Kegiatan</th>
                      <th>Member</th>
                      <th>Tanggal Mulai</th>
                      <th>Lama Hari</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($output4->data as $key=>$array_item) : 
                      $mulai = $array_item->tanggal_mulai;
                      $awal = date_create($mulai);
                      $akhir = date_create();
                      $diff = date_diff($awal, $akhir);
                      ?>
                      <tr>
                        <td><?php echo $key+1 ?></td>
                        <td><?php echo $array_item->subjek; ?></td>
                        <td><?php echo $array_item->nama_lengkap; ?></td>
                        <td><?php echo $array_item->tanggal_mulai; ?></td>
                        <td><?php echo $diff->days; ?> Hari</td>
                        <td>
                          <?php echo $array_item->status_job; 
                          if ($array_item->status_job == 'Close') {
                            echo '<br> ' . date('d-m-Y',strtotime($array_item->update_time));
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
          <!-- /.col -->
        </div><br>
        <!-- /.row -->
        <?php 
        $link = "getKomentarProject&id_project=" . urlencode($id);
        $tampil = getRegistran($link);
        ?>


        <div class="row">
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title mb-3">Daftar Komentar</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive mailbox-messages">
                  <?php 
                  if ($tampil == NULL) { ?>
                    <div class="card text-center">
                      <div class="card-body">
                        <h5 class="card-text">Belum ada komentar</h5>
                      </div>
                    </div>
                  <?php } else { ?>
                    <table class="table table-hover table-striped">
                      <tbody>
                        <?php foreach ($tampil->data as $key => $value) { ?>

                          <tr>
                            <td class="mailbox-name"><?php echo $value->nama_lengkap ?></td>
                            <td class="mailbox-subject"><?php echo $value->deskripsi ?></td>
                            <td class="mailbox-attachment text-right"><?php echo $value->time_create ?></td>

                          </tr>

                        <?php } ?>
                      </tbody>
                    </table>
                  <?php } ?>
                  <!-- /.table -->
                </div>
                <!-- /.mail-box-messages -->
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>

    </section>
    <!-- /.content -->

  </div>
  <!-- ./wrapper -->
  <!-- Page specific script -->
  <script>
    window.addEventListener("load", window.print());
  </script>
</body>
</html>
