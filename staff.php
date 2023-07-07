<?php
include "header.php"

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="row">
                    <div class="col">
                        <h1 class="m-3">Semua Data Karyawan</h1>
                    </div>
                    <div align="end" class="col mt-3 mr-3">
                        <a href="karyawan_tambah.php" class="btn btn-success" type="button">
                            <i class="fas fa-plus"></i> Add Staff Kamu
                        </a>
                    </div>
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
                        <div class="card-header">
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
                        $link = "getKaryawanPinjam";
                        $output = getRegistran($link);

                        $link2 = "getDivisi";
                        $data_divisi = getRegistran($link2);
                        $id_divisi = $data_divisi->data[0]->id_divisi;
                        $nama_divisi = $data_divisi->data[0]->nama_divisi;
                        // var_dump($nama_divisi);
                        ?>

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
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No. </th>
                                            <th>Nama Lengkap</th>
                                            <th>Jabatan</th>
                                            <th>status karyawan</th>
                                            <th>Divisi</th>
                                            <th>Email</th>
                                            <th>Besaran Gaji</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($output->data as $key => $array_item) : ?>
                                            <tr>
                                                <td><?php echo $key + 1 ?></td>
                                                <td><?php echo $array_item->nama_lengkap; ?></td>
                                                <td><?php echo $array_item->level_user; ?></td>
                                                <td><?php echo $array_item->status_karyawan; ?></td>
                                                <td>
                                                    <!-- <?php foreach ($data_divisi->data as $key => $value) { ?>
                                                        <?php echo $value->nama_divisi ?>
                                                    <?php } ?> -->
                                                    <?php echo $array_item->nama_divisi; ?>
                                                </td>
                                                <td><?php echo $array_item->email; ?></td>
                                                <td><?php echo $array_item->gaji; ?></td>
                                                <!-- <td>
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
                                                </td> -->
                                                <td class="text-center">
                                                    <?php
                                                    if (isset($_POST['delete'])) {
                                                        $id_karyawan = $_POST['id_karyawan'];
                                                        $id_user = $_POST['id_user'];
                                                        $link = "getDeleteKaryawanAdmin&id_karyawan=" . urlencode($id_karyawan);
                                                        $delete = getRegistran($link);
                                                        var_dump($delete2);
                                                        // if (!$delete) {
                                                        //     echo "<script>alert('Data berhasil dihapus');window.location='staff.php'</script>";
                                                        // } else {
                                                        //     echo "<script>alert('Data gagal dihapus');window.location='staff.php'</script>";
                                                        // }
                                                    }
                                                    ?>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="editModal<?= $array_item->id_karyawan ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-xl">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title text-center fs-5" id="staticBackdropLabel">KEY PERFORMANCE INDICATOR</h1>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="POST">
                                                                        <div class="row">
                                                                            <div class="col-6">
                                                                                <div class="mb-2">
                                                                                    <label class="text-center">Nama Lengkap</label>
                                                                                    <input type="text" class="form-control text-center" name="id_karyawan" value="<?= $array_item->nama_lengkap ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-6">
                                                                                <div class="mb-2">
                                                                                    <label class="text-center">Tanggal Masuk Kerja</label>
                                                                                    <input type="text" class="form-control text-center" name="id_karyawan" value="<?= $array_item->mulai_kerja ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <table class="table table-hover table-striped table-bordered">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>No</th>
                                                                                    <th>Indikator Penelitian</th>
                                                                                    <th>Nilai</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>1</td>
                                                                                    <td>KEHADIRAN & TEPAT WAKTU</td>
                                                                                    <td><input type="text" name="" class="form-control"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>2</td>
                                                                                    <td>BEKERJA BERDASARKAN SOP</td>
                                                                                    <td><input type="text" name="" class="form-control"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>3</td>
                                                                                    <td>MENJELASKAN DENGAN BAIK DAN MUDAH DIMENGERTI</td>
                                                                                    <td><input type="text" name="" class="form-control"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>4</td>
                                                                                    <td>MAMPU MENERIMA & MENJALANKAN INSTRUKSI DENGAN BAIK</td>
                                                                                    <td><input type="text" name="" class="form-control"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>5</td>
                                                                                    <td>TEAM WORK / BEKERJA SECARA MANDIRI</td>
                                                                                    <td><input type="text" name="" class="form-control"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>6</td>
                                                                                    <td>MEMPERHATIKAN HAL - HAL SECARA DETAIL</td>
                                                                                    <td><input type="text" name="" class="form-control"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>7</td>
                                                                                    <td>PENYELESAIAN MASALAH DALAM HAL IT DI MAHARIS GROUP</td>
                                                                                    <td><input type="text" name="" class="form-control"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>8</td>
                                                                                    <td>LAPORAN HASIL PEKERJAAN IT PER HARINYA</td>
                                                                                    <td><input type="text" name="" class="form-control"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>9</td>
                                                                                    <td>PENCATATAN HARDWARE & SOFTWARE DI SERVER MAHARIS GROUP</td>
                                                                                    <td><input type="text" name="" class="form-control"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>10</td>
                                                                                    <td>MEMASTIKAN HARDWARE, SOFTWARE, & INTERNET BERJALAN DENGAN EFEKTIF DAN STABIL</td>
                                                                                    <td><input type="text" name="" class="form-control"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>11</td>
                                                                                    <td>KECEPATAN MENINDAKLANJUTI PEKERJAAN IT YANG BELUM TERSELESAIKAN</td>
                                                                                    <td><input type="text" name="" class="form-control"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>12</td>
                                                                                    <td>PRODUKTIVITAS DALAM BEKERJA</td>
                                                                                    <td><input type="text" name="" class="form-control"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>13</td>
                                                                                    <td><b>TOTAL NILAI</b></td>
                                                                                    <td><input type="text" name="" class="form-control"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                            <button type="button" class="btn btn-primary">Submit</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <form method="post">
                                                        <button type="button" title="KPI" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $array_item->id_karyawan ?>">
                                                            <i class="fas fa-file"></i>
                                                        </button>
                                                        <a href="karyawan_edit.php?id=<?php echo $array_item->id_karyawan ?>" class="btn-sm btn btn-primary" data-bs-toggle="tooltip" title="Ubah">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="karyawan_detail.php?id=<?php echo $array_item->id_karyawan ?>" class="btn-sm btn btn-primary" data-bs-toggle="tooltip" title="Profile">
                                                            <i class="fas fa-user"></i>
                                                        </a>
                                                        <input type="hidden" name="id_karyawan" value="<?php echo $array_item->id_karyawan; ?>">
                                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data?')" type="submit" data-bs-toggle="tooltip" title="Hapus" name="delete">
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
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