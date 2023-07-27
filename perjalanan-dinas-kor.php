<?php
include "header-kordinator.php"

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>PERMOHONAN PERJALANAN DINAS</h1>
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
                            <h3 class="card-title">Data Perjalanan Dinas</h3><br>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end pb-3">
                                <a href="perjalanan-dinas-kor-tambah.php" class="btn btn-success " type="button">
                                    <i class="fas fa-plus"></i> Add Permohonan
                                </a>
                            </div>
                            <!-- Modal Tambah-->
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
                        </div>
                        <!-- /.card-header -->
                        <?php
                        $link = "getDinas&id_user=" . urlencode($id_user);
                        $output = getRegistran($link);
                        ?>

                        <div class="card-body">
                            <?php if ($output == NULL) { ?>
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No. </th>
                                                <th>Di ajukan Oleh</th>
                                                <th>Jabatan</th>
                                                <th>Tujuan Pengajuan</th>
                                                <th>Kota Tujuan</th>
                                                <th>Keterangan</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="8" class="text-center">Data Kosong</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            <?php  } else { ?>
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-hover table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No. </th>
                                                <th>Di ajukan Oleh</th>
                                                <th>Jabatan</th>
                                                <th>Tujuan Pengajuan</th>
                                                <th>Kota Tujuan</th>
                                                <th>Keterangan</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($output->data as $key => $array_item) : ?>
                                                <tr>
                                                    <td><?php echo $key + 1 ?></td>
                                                    <td><?php echo $array_item->nama_pengajuan; ?></td>
                                                    <td><?php echo $array_item->jabatan; ?></td>
                                                    <td><?php echo $array_item->tujuan; ?></td>
                                                    <td><?php echo $array_item->kota_tujuan; ?></td>
                                                    <td><?php echo $array_item->keterangan; ?></td>
                                                    <td>
                                                        <?php
                                                        $status = $array_item->status;
                                                        if ($status == "diproses") {
                                                            echo '<a class="btn bg-warning text-white">' . $status . '</a>';
                                                        } elseif ($status == "diterima") {
                                                            echo '<a class="btn bg-success text-white">' . $status . '</a>';
                                                        } else {
                                                            echo '<a class="btn bg-danger text-white">' . $status . '</a>';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if (isset($_POST['delete'])) {
                                                            $id_dinas = $_POST['id_dinas'];
                                                            $link = "getDeleteDinasId&id_dinas=" . urlencode($id_dinas);
                                                            $delete = getRegistran($link);
                                                            if (!$delete) {
                                                                echo "<script>alert('Data berhasil dihapus');window.location='perjalanan-dinas-kor.php'</script>";
                                                            } else {
                                                                echo "<script>alert('Data gagal dihapus');window.location='perjalanan-dinas-kor.php'</script>";
                                                            }
                                                        }
                                                        ?>

                                                        <form method="post">
                                                            <?php
                                                            $status = $array_item->status;
                                                            if ($status == "diterima") { ?>
                                                                <a href="cetak_surat.php?id=<?php echo $array_item->id_dinas ?>" target="_blank" class="btn-sm btn btn-warning" data-bs-toggle="tooltip" title="cetak surat">
                                                                    <i class="fas fa-print"></i>
                                                                </a>
                                                                <input type="hidden" name="id_dinas" value="<?php echo $array_item->id_dinas; ?>">
                                                                <button class="btn btn-danger btn-sm m-1" onclick="return confirm('Apakah anda yakin ingin menghapus data?')" type="submit" data-bs-toggle="tooltip" title="Hapus" name="delete">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </button>
                                                            <?php } else { ?>
                                                                <a href="perjalanan-dinas-kor-edit.php?id=<?php echo $array_item->id_dinas ?>" class="btn-sm btn btn-primary" data-bs-toggle="tooltip" title="Ubah">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                                <input type="hidden" name="id_dinas" value="<?php echo $array_item->id_dinas; ?>">
                                                                <button class="btn btn-danger btn-sm m-1" onclick="return confirm('Apakah anda yakin ingin menghapus data?')" type="submit" data-bs-toggle="tooltip" title="Hapus" name="delete">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </button>
                                                            <?php }
                                                            ?>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
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