<?php
include "header.php";
$link = "getPinjsmKaryawanAll";
$output2 = getRegistran($link);


$link = "gePinjamKaryawan";
$output = getRegistran($link);
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="row">
                    <div class="col">
                        <h1 class="m-3">History Peminjaman Karyawan</h1>
                    </div>
                    <!-- <div align="end" class="col mt-3 mr-3">
                        <a href="karyawan_tambah.php" class="btn btn-success" type="button">
                            <i class="fas fa-plus"></i> Add Staff Kamu
                        </a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-info">
                            <h3>Daftar Karyawan Pinjam</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Karyawan</th>
                                            <th>Permintaan Pinjam</th>
                                            <th>Tanggal Pelunasan</th>
                                            <th>Cicilan Perbulan</th>
                                            <th>Keperluan</th>
                                            <th>Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($output2->data as $key => $array_item) : ?>
                                            <tr>
                                                <td><?php echo $key + 1 ?></td>
                                                <td><?php echo $array_item->nama_lengkap; ?></td>
                                                <td><?php echo number_format($array_item->jumlah_pinjam)  ?></td>
                                                <td><?php echo $array_item->pelunasan_terakhir; ?></td>
                                                <td><?php echo number_format($array_item->jumlah_cicilan) ?></td>
                                                <td><?php echo $array_item->keperluan; ?></td>
                                                <td>
                                                    <?php
                                                    if ($array_item->status == 'diproses') { ?>
                                                        <a href="" class="btn btn-sm btn-warning"><?php echo $array_item->status; ?></a>
                                                    <?php } elseif ($array_item->status == 'diterima') { ?>
                                                        <a href="" class="btn btn-sm btn-success"><?php echo $array_item->status; ?></a>
                                                    <?php } elseif ($array_item->status == 'ditolak') { ?>
                                                        <a href="" class="btn btn-sm btn-danger"><?php echo $array_item->status; ?></a>
                                                    <?php } elseif ($array_item->status == 'lunas') { ?>
                                                        <a href="" class="btn btn-sm btn-info"><?php echo $array_item->status; ?></a>
                                                    <?php } else {
                                                        echo "tidak ada";
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <form method="post">
                                                        <a href="peminjaman_karyawan_edit.php?id=<?php echo $array_item->id_pinjam ?>" class="btn-sm btn btn-primary" data-bs-toggle="tooltip" title="Ubah">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <input type="hidden" name="id_pinjam" value="<?php echo $array_item->id_pinjam; ?>">
                                                        <button class="btn btn-danger btn-sm m-1" onclick="return confirm('Apakah anda yakin ingin menghapus data?')" type="submit" data-bs-toggle="tooltip" title="Hapus" name="delete">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header bg-gradient-secondary">
                            <h3>Daftar Cicilan Karyawan</h3>
                            <!-- <div class="d-grid gap-2 d-md-flex justify-content-md-end pb-3">
                                <a href="perjalanan-dinas-kor-tambah.php" class="btn btn-success " type="button">
                                    <i class="fas fa-plus"></i> Add Permohonan
                                </a>
                            </div> -->
                            <!-- Modal Tambah-->
                            <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            </div> -->
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body table-responsive">
                            <?php if ($output == NULL) { ?>
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
                            <?php  } else { ?>
                                <table id="example" class="table table-striped table-hover table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No. </th>
                                            <th>Nama Karyawan</th>
                                            <th>Jabatan</th>
                                            <th>Jumlah Pinjam</th>
                                            <th>Cicilan / Bulan</th>
                                            <th>Jumlah Sudah Bayar</th>
                                            <th>Total Bayar</th>
                                            <th>Keperluan</th>
                                            <th>Pemohon</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $totalJumlahBayar = 0;
                                        foreach ($output->data as $key => $array_item) :
                                            $jumlah_bayar = $array_item->jumlah_bayar_history;

                                            // Add the current value to the total
                                            $totalJumlahBayar += $jumlah_bayar;
                                        ?>
                                            <tr>
                                                <td><?php echo $key + 1 ?></td>
                                                <td><?php echo $array_item->nama_lengkap; ?></td>
                                                <td><?php echo $array_item->jabatan; ?></td>
                                                <td><?php echo number_format($array_item->jumlah_pinjam) ?></td>
                                                <td><?php echo number_format($array_item->jumlah_cicilan) ?></td>
                                                <td>
                                                    <?php
                                                    if ($array_item->jumlah_bayar_history == null) {
                                                        echo "belum ada cicilan";
                                                    } else {
                                                        echo number_format($array_item->jumlah_bayar_history, '0', ',', '.');
                                                    }
                                                    ?>
                                                </td>
                                                <td><?php echo number_format($totalJumlahBayar) ?></td>
                                                <td><?php echo $array_item->keperluan; ?></td>
                                                <td><img class="img-fluid" src="foto_cicilan/<?php echo $array_item->foto_cicilan; ?>" alt=""></td>
                                                <td>
                                                    <?php
                                                    if ($array_item->jumlah_pinjam == $totalJumlahBayar) { ?>
                                                        <a class="btn bg-success text-white">Lunas</a>
                                                    <?php } else { ?>
                                                        <a class="btn bg-danger text-white">Belum Lunas</a>
                                                    <?php }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if (isset($_POST['delete'])) {
                                                        $id_pinjam = $_POST['id_pinjam'];
                                                        $link = "getDeleteDinasId&id_pinjam=" . urlencode($id_pinjam);
                                                        $delete = getRegistran($link);
                                                        if (!$delete) {
                                                            echo "<script>alert('Data berhasil dihapus');window.location='peminjaman_karyawan.php'</script>";
                                                        } else {
                                                            echo "<script>alert('Data gagal dihapus');window.location='peminjaman_karyawan.php'</script>";
                                                        }
                                                    }
                                                    ?>
                                                    <form method="post">
                                                        <a href="peminjaman_karyawan_edit.php?id=<?php echo $array_item->id_pinjam ?>" class="btn-sm btn btn-primary" data-bs-toggle="tooltip" title="Ubah">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <input type="hidden" name="id_pinjam" value="<?php echo $array_item->id_pinjam; ?>">
                                                        <button class="btn btn-danger btn-sm m-1" onclick="return confirm('Apakah anda yakin ingin menghapus data?')" type="submit" data-bs-toggle="tooltip" title="Hapus" name="delete">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                <?php } ?>
                                </table>
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