<?php 
require_once 'header.php';
$user = $_SESSION["login"];
$level = $_SESSION["user"];
$id = $_GET['id'];
$link = "getProjectId&id_project=" . urlencode($id);
$output1 = getRegistran($link);

// input untuk member
if (isset($_POST['submit'])) {
  $id_project = $_POST['id_project'];
  $id_karyawan = $_POST['id_karyawan'];
  $deskripsi = $_POST['deskripsi'];
  $status_member = $_POST['status_member'];;
  

  $link = "setMember&id_project=" . urlencode($id_project) . '&id_karyawan=' . urlencode($id_karyawan) . '&deskripsi=' . urlencode($deskripsi) . '&status_member=' . urlencode($status_member)  . '&type=insert';
  $data = getRegistran($link);
  if ($data && $data != NULL) {
    echo '<script>alert("data berhasil diatambah")</script>';
  }
}
// end input member

// input To Do List
if (isset($_POST['submit2'])) {
  $id_project2 = $_POST['id_project2'];
  // $id_member2 = $_POST['id_member2'];
  $subjek = $_POST['subjek'];
  $status_job = $_POST['status_job'];
  $tanggal_mulai = $_POST['tanggal_mulai'];;
  

  $link = "setToDoList&id_project=" . urlencode($id_project2) . '&subjek=' . urlencode($subjek) . '&status_job=' . urlencode($status_job) . '&tanggal_mulai=' . urlencode($tanggal_mulai)  . '&type=insert';
  $data = getRegistran($link);
  if ($data && $data != NULL) {
    echo '<script>alert("data berhasil diatambah")</script>';
  }
}


?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><?php echo $output1->data[0]->nama_project; ?></h1>
          <a href="project_cetak.php?id=<?php echo $id; ?>" target="_blank"><h3><span class="badge badge-info m-1"><i class="fas fa-print"></i> Cetak</span></h3></a>
        </div>
        <div class="col-sm-6 float-sm-right">
          <ol class="breadcrumb float-sm-right">
            <h3><span class="badge badge-warning m-1"><?php echo $output1->data[0]->status; ?></span></h3>
            <h3><span class="badge badge-danger m-1"><?php echo $output1->data[0]->start_project; ?></span></h3>
          </ol>
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
            <div class="card-header">
              <small>Leader Project</small>
              <div><h2 class="card-title"><b><?php echo $output1->data[0]->nama_lengkap; ?></b></h2></div>
            </div>
            <!-- /.card-header -->
            <?php   
            $link = "getProject";
            $output2 = getRegistran($link);

            $link = "getMemberId&id_project=" . urlencode($id);
            $output3 = getRegistran($link);

            $link = "getKaryawan";
            $staf = getRegistran($link);
            ?>

            <div class="card-body table-responsive">

              <div class="d-grid gap-2 d-md-flex justify-content-md-end pb-3">
                <?php if ($level <= 1) { ?>
                  <button class="btn btn-success " type="button" data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-plus"></i> Add Member
                  </button>
                <?php } ?>
              </div>
              <!-- Modal Tambah Member-->
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="post">
                        <div class="form-group">
                          <label class="form-label">Nama</label>
                          <select class="form-control" name="id_karyawan" required="required">
                            <option value="">--Pilih Member--</option>
                            <?php foreach ($staf->data as $key => $value): ?>
                              <option value="<?php echo $value->id_karyawan ?>">
                                <?php echo $value->nama_lengkap; ?>
                              </option>
                            <?php endforeach ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="">Bagian</label>
                          <input class="form-control" type="text" name="deskripsi">
                        </div>
                        <input type="hidden" class="form-control" name="id_project" value="<?php echo $id ?>">
                        <div class="form-group">
                          <label for="exampleInputPassword1">Status</label>
                          <select class="form-control" name="status_member">
                            <option selected>--Pilih Status--</option>
                            <option>Aktif</option>
                            <option>Nonaktif</option>
                          </select>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary w-100">Submit</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <?php 
              if ($output3 == NULL) { ?>
                <div class="card text-center">
                  <div class="card-body">
                    <h5 class="card-text">Belum ada member, silahkan tambahkan member</h5>
                  </div>
                </div>
              <?php } else { ?>


                <table id="" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr>
                      <th>No. </th>
                      <th>Nama</th>
                      <th>Bagian</th>
                      <th>Project</th>
                      <th>Status</th>
                      <?php if ($level <= 1) { ?>
                        <th>Action</th>
                      <?php } ?>
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
                        <?php if ($level <= 1) { ?>
                          <td>
                            <?php 
                            $link = "getMemberIdMember&id_member=" . urlencode($array_item->id_member);
                            $data1 = getRegistran($link);


                            ?>
                            <!-- Modal Edit Member-->
                            <div class="modal fade" id="exampleModal<?php echo $array_item->id_member ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Member</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <form method="post">
                                      <div class="form-group">
                                        <label class="form-label">Nama</label>
                                        <select class="form-control" name="id_karyawan2" required="required">
                                          <!-- <option value="">--Pilih Karyawan--</option> -->
                                          <?php foreach ($staf->data as $key => $value): ?>
                                            <option value="<?php echo $value->id_karyawan; ?>" <?php if ($value->id_karyawan == $data1->data[0]->id_karyawan) {
                                              echo 'selected';
                                            } ?> ><?php echo $value->nama_lengkap; ?></option>
                                          <?php endforeach ?>
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Bagian</label>
                                        <input type="text" class="form-control" name="deskripsi" value="<?php echo $data1->data[0]->deskripsi; ?>">
                                      </div>
                                      <input type="hidden" class="form-control" name="id_member" value="<?php echo $data1->data[0]->id_member ?>">
                                      <div class="form-group">
                                        <label for="exampleInputPassword1">Status</label>
                                        <select class="form-control" name="status_member">
                                          <option value="Aktif" <?php if($data1->data[0]->status_member == "Aktif"){echo "selected";} ?>>Aktif</option>
                                          <option value="Nonaktif" <?php if($data1->data[0]->status_member == "Nonaktif"){echo "selected";} ?>>Nonaktif</option>
                                        </select>
                                      </div>
                                      <button type="submit" name="simpan" class="btn btn-primary w-100">Simpan</button>
                                      <?php 
                                      if (isset($_POST['simpan'])) {
                                        $id_member = $_POST['id_member'];
                                        $id_karyawan2 = $_POST['id_karyawan2'];
                                        $deskripsi = $_POST['deskripsi'];
                                        $status_member = $_POST['status_member'];


                                        $link = "setUpdateMemberId&id_member=" . urlencode($id_member) . '&id_karyawan=' . urlencode($id_karyawan2) . '&deskripsi=' . urlencode($deskripsi) . '&status_member=' . urlencode($status_member);
                                        $data = getRegistran($link);
                                        if ($data && $data == 1) {
                                          echo '<script>alert("data berhasil diupdate")</script>';
                                          echo "<script>location = 'project_detail.php?id=$id'</script>";
                                        }
                                      }
                                      ?>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <?php
                            if (isset($_POST['hapus'])) {
                              $id_member = $_POST['id_member'];
                              $link = "getDeleteMemberId&id_member=" . urlencode($id_member);
                              $delete = getRegistran($link);
                              if (!$delete) {
                                echo "<script>alert('Data berhasil dihapus');window.location='project_detail.php?id=$id'</script>";
                              } else {
                                echo "<script>alert('Data gagal dihapus');window.location='project_detail.php?id=$id'</script>";
                              }
                            }
                            ?>

                            <form method="post">
                              <a class="btn btn-primary btn-sm m-1" type="button" data-toggle="modal" data-target="#exampleModal<?php echo $array_item->id_member ?>" data-bs-toggle="tooltip" title="Ubah">
                                <i class="fas fa-edit"></i>
                              </a>

                              <input type="hidden" name="id_member" value="<?php echo $array_item->id_member; ?>">
                              <button class="btn btn-danger btn-sm m-1" onclick="return confirm('Apakah anda yakin ingin menghapus data?')" type="submit" data-bs-toggle="tooltip" title="Hapus" name="hapus">
                                <i class="fas fa-trash-alt"></i>
                              </button>
                            </form>   
                          </td>
                        <?php } ?>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              <?php } ?>
            </div>
            <!-- /.card-body -->
          </div>


          <!-- /.card -->
        </div>

        <div class="col-12">

          <div class="card">
            <div class="card-header">
              <div><h2 class="card-title"><b>To Do List</b></h2></div>
            </div>
            <!-- /.card-header -->
            <?php   
            $link = "getProject";
            $output2 = getRegistran($link);

            $link = "getToDoListId&id_project=" . urlencode($id);
            $output4 = getRegistran($link);
            ?>

            <div class="card-body table-responsive">

              <div class="d-grid gap-2 d-md-flex justify-content-md-end pb-3">
                <?php if ($level <= 1) { ?>
                  <button class="btn btn-success " type="button" data-toggle="modal" data-target="#exampleModal2">
                    <i class="fas fa-plus"></i> Add To Do List
                  </button>
                <?php } ?>
              </div>
              <!-- Modal tambah todolist -->
              <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="post">
                        <input type="hidden" name="id_project2" value="<?php echo $id ?>">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Subjek</label>
                          <input type="text" class="form-control" name="subjek">
                        </div>
                        <input type="hidden" class="form-control" name="status_job" value="Open">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Tanggal Mulai</label>
                          <input type="date" class="form-control" name="tanggal_mulai" value="<?php echo date("Y-m-d"); ?>">
                        </div>
                        <button type="submit" name="submit2" class="btn btn-primary w-100">Submit</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <?php 
              if ($output4 == NULL) { ?>
                <div class="card text-center">
                  <div class="card-body">
                    <h5 class="card-text">Belum ada To Do List, silahkan tambahkan To do List</h5>
                  </div>
                </div>
              <?php } else { ?>


                <table id="" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr>
                      <th>No. </th>
                      <th>Kegiatan</th>
                      <th>Member</th>
                      <th>Tanggal Mulai</th>
                      <th>Lama Berjalan</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($output4->data as $key=>$array_item) : 
                      $mulai = $array_item->tanggal_mulai;
                      $awal = date_create($mulai);
                      $akhir = date_create();
                      $diff = date_diff($awal, $akhir);
                      ?>
                      <tr class="<?php if ($array_item->status_job == 'Open') {
                        echo 'table-success';
                        }elseif ($array_item->status_job == 'Running') {
                          echo 'table-warning';
                          }else{
                            echo 'table-danger';
                          }?>">
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
                          <td>
                            <?php 
                            $link = "getToDoListPerId&id_todolist=" . urlencode($array_item->id_todolist);
                            $data2 = getRegistran($link);


                            ?>
                            <!-- Modal edit todolist Admin -->
                            <div class="modal fade" id="Modal<?php echo $array_item->id_todolist ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit ToDo</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <form method="post">
                                      <input type="hidden" class="form-control" name="id_todolist" value="<?php echo $data2->data[0]->id_todolist ?>">
                                      <?php if ($level <= 1) { ?>
                                        <div class="form-group">
                                          <label for="exampleInputEmail1">Subjek</label>
                                          <input type="text" class="form-control" name="subjek" value="<?php echo $data2->data[0]->subjek ?>">
                                        </div>
                                      <?php } ?>
                                      <div class="form-group">
                                        <label for="">Status</label>
                                        <select class="form-control" name="status_job">
                                          <option value="Open" <?php if($data2->data[0]->status_job == "Open"){echo "selected";} ?>>Open</option>
                                          <option value="Close" <?php if($data2->data[0]->status_job == "Close"){echo "selected";} ?>>Close</option>
                                          <option value="Running" <?php if($data2->data[0]->status_job == "Running"){echo "selected";} ?>>Running</option>
                                        </select>
                                      </div>
                                      <?php if ($level <= 1) { ?>
                                        <div class="form-group">
                                          <label for="exampleInputEmail1">Tanggal Mulai</label>
                                          <input type="date" class="form-control" name="tanggal_mulai" value="<?php echo $data2->data[0]->tanggal_mulai ?>">
                                        </div>
                                      <?php } ?>
                                      <button type="submit" name="save" class="btn btn-primary w-100">Simpan</button>
                                      <?php 
                                      if (isset($_POST['save'])) {
                                        if ($level <= 1) {
                                          $id_todolist = $_POST['id_todolist'];
                                          $subjek = $_POST['subjek'];
                                          $status_job = $_POST['status_job'];
                                          $tanggal_mulai = $_POST['tanggal_mulai'];

                                          $link = "setUpdateToDoListId&id_todolist=" . urlencode($id_todolist) . '&subjek=' . urlencode($subjek) . '&status_job=' . urlencode($status_job) . '&tanggal_mulai=' . urlencode($tanggal_mulai);
                                          $data = getRegistran($link);
                                        }else {
                                          
                                          $link = "getMemberIdStaf&id_karyawan=" . urlencode($user);
                                          $staf = getRegistran($link);

                                          $id_todolist = $_POST['id_todolist'];
                                          $id_member3 = $staf->data[0]->id_member;
                                          $status_job = $_POST['status_job'];
                                          $link = "setUpdateToDoListMember&id_todolist=" . urlencode($id_todolist) . '&id_member=' . urlencode($id_member3) . '&status_job=' . urlencode($status_job);
                                          $data = getRegistran($link);
                                        }

                                        echo '<script>alert("data berhasil diupdate")</script>';
                                        echo "<script>location = 'project_detail.php?id=$id'</script>";

                                      }
                                      ?>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <?php
                            if (isset($_POST['delete'])) {
                              $id_todolist = $_POST['id_todolist'];
                              $link = "getDeleteToDoListId&id_todolist=" . urlencode($id_todolist);
                              $delete = getRegistran($link);
                              if (!$delete) {
                                echo "<script>alert('Data berhasil dihapus');window.location='project_detail.php?id=$id'</script>";
                              } else {
                                echo "<script>alert('Data gagal dihapus');window.location='project_detail.php?id=$id'</script>";
                              }
                            }
                            ?>

                            <?php if ($level <= 1) { ?>
                              <form method="post">
                                <a class="btn btn-primary btn-sm m-1" type="button" data-toggle="modal" data-target="#Modal<?php echo $array_item->id_todolist ?>" data-bs-toggle="tooltip" title="Ubah">
                                  <i class="fas fa-edit"></i>
                                </a>
                                <input type="hidden" name="id_todolist" value="<?php echo $array_item->id_todolist; ?>">
                                <button class="btn btn-danger btn-sm m-1" onclick="return confirm('Apakah anda yakin ingin menghapus data?')" type="submit" data-bs-toggle="tooltip" title="Hapus" name="delete">
                                  <i class="fas fa-trash-alt"></i>
                                </button>
                              </form>
                            <?php } else { ?>
                              <a class="btn btn-primary btn-sm m-1" type="button" data-toggle="modal" data-target="#Modal<?php echo $array_item->id_todolist ?>" data-bs-toggle="tooltip" title="Ubah">
                                <i class="fas fa-edit"></i>Ubah Status
                              </a>
                            <?php } ?>
                          </td>
                        </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                <?php } ?>
              </div>
              <!-- /.card-body -->
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
    <?php 
    if (isset($_POST['kirim'])) {
      $id_project3 = $id;
      $deskripsi = $_POST['deskripsi'];
      date_default_timezone_set('Asia/Jakarta');
      $time_create =  date('Y-m-d H:i:s');


      $link = "setKomentarProject&id_project=" . urlencode($id_project3). '&id_karyawan=' . urlencode($user) . '&deskripsi=' . urlencode($deskripsi) . '&time_create=' . urlencode($time_create) . '&type=insert';
      $data = getRegistran($link);
      if ($data && $data != NULL) {
        echo '<script>alert("data berhasil diatambah")</script>';
      }
    }

    ?>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                <b>Komentar</b>
              </h3>
            </div>
            <!-- /.card-header -->
            <form method="post">
              <div class="card-body">
                <textarea id="summernote" name="deskripsi"></textarea>
              </div>
              <div class="card-footer d-grid gap-2 d-md-flex justify-content-md-end pb-3">
                <button class="btn btn-success btn-lg" type="submit" name="kirim">
                  <i class="fas fa-paper-plane"></i> Kirim
                </button>
              </div>
            </form>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>

    <?php 
    $link = "getKomentarProject&id_project=" . urlencode($id);
    $tampil = getRegistran($link);
    ?>

    <section class="content komentar">
      <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title"><b>Daftar Komentar</b></h3>
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
                          <td class="mailbox-date text-right"><?php echo $value->time_create ?></td>
                          <td class="mailbox-attachment">
                            <?php
                            if (isset($_POST['delete_komen'])) {
                              $id_komentar = $_POST['id_komentar'];
                              $link = "getDeleteKomentarId&id_komentar=" . urlencode($id_komentar);
                              $delete = getRegistran($link);
                              if (!$delete) {
                                echo "<script>alert('Data berhasil dihapus');window.location='project_detail.php?id=$id'</script>";
                              } else {
                                echo "<script>alert('Data gagal dihapus');window.location='project_detail.php?id=$id'</script>";
                              }
                            }
                            ?>
                            <form method="post">
                            <!-- <a class="btn btn-warning btn-sm m-1" type="button">
                              <i class="fas fa-eye"></i>
                            </a> -->
                            <input type="hidden" name="id_komentar" value="<?php echo $value->id_komentar; ?>">
                            <button class="btn btn-danger btn-sm m-1 float-right" onclick="return confirm('Apakah anda yakin ingin menghapus data?')" type="submit" name="delete_komen">
                              <i class="fas fa-trash-alt"></i> Delete
                            </button>
                          </form>
                        </td>
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
  </section>
</div>
<div class="my-4"></div><br><br>
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
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()
  })
</script>
<script>
  $(document).ready(function () {
    $('#example').DataTable();
  });
</script>
<script>
  $(document).ready(function () {
    $('#example2').DataTable();
  });
</script>
<script>
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
  })
</script>
</body>
</html>
