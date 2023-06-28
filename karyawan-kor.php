<?php
include "header-kordinator.php";


$link = "getKaryawanKor&id_user=" . urlencode($id_user);
$datas = getRegistran($link);
$nama_divisi = $datas->data[0]->nama_divisi;
// var_dump($nama_divisi);


$link = "getDivisi";
$output = getRegistran($link);
$id_divisi = $output->data[0]->id_divisi;
// var_dump($id_divisi);

$link3 = "getStaffNol&id_divisi=" . urlencode($id_divisi);
$staff = getRegistran($link3);
// var_dump($staff);
?>

<?php
if (isset($_POST['save'])) {
    $id_karyawan = $_POST['id_karyawan'];
    $nama_divisi = $_POST['nama_divisi'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $level_user = $_POST['level_user'];
    $project = $_POST['project'];
    $tanggal = $_POST['tanggal'];
    $mulai_lembur = $_POST['mulai_lembur'];
    $akhir_lembur = $_POST['akhir_lembur'];
    $total_lembur = $_POST['total_lembur'];
    $keterangan = $_POST['keterangan'];
    $mengetahui = $_POST['mengetahui'];

    $link = "setLembur2&id_karyawan=" . urlencode($id_karyawan) . "&nama_divisi=" . urlencode($nama_divisi) . "&nama_lengkap=" . urlencode($nama_lengkap) . "&level_user=" . urlencode($level_user) . "&project=" . urlencode($project) . "&tanggal=" . urlencode($tanggal) . "&mulai_lembur=" . urlencode($mulai_lembur) . "&akhir_lembur=" . urlencode($akhir_lembur) . "&total_lembur=" . urlencode($total_lembur) . "&keterangan=" . urlencode($keterangan) . "&mengetahui=" . urlencode($mengetahui);
    $data = getRegistran($link);
    // var_dump($data);
    //     echo "<script>
    //     alert('Data Berhasil terkirim')
    // </script>";
    //     echo "<script>
    //     location.href = 'lembur-karyawan-kor.php';
    // </script>";
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">DIVISI <?= $nama_divisi ?></h1>
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
                            <h3 class="card-title">Data Staf Karyawan</h3><br>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end pb-3">
                                <a href="karyawan-kor-tambah.php" class="btn btn-success " type="button">
                                    <i class="fas fa-plus"></i> Add Staff Kamu
                                </a>
                                <?php
                                if ($staff == null) { ?>

                                <?php } else { ?>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-warning ml-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                        <i class="fas fa-exclamation-triangle"></i> Notifikasi
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Permintaan Menjadi Staff</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <?php
                                                    $link3 = "getStaffNol&id_divisi=" . urlencode($id_divisi);
                                                    $staff = getRegistran($link3);
                                                    // var_dump($staff);
                                                    ?>
                                                    <?php foreach ($staff->data as $key => $array_item) : ?>
                                                        <?php
                                                        if (isset($_POST['konfirmasi'])) {
                                                            $id_karyawan = $_POST['id_karyawan'];
                                                            $id_user = $_POST['id_user'];

                                                            $link = "setUpdateKonfirmasi&id_karyawan=" . urlencode($id_karyawan) . "&id_user=" . urlencode($id_user);
                                                            $hasil = getRegistran($link);
                                                            // var_dump($hasil);
                                                            if ($hasil) {
                                                                echo "<script>alert('Data Berhasil ditambah')</script>";
                                                                echo ("<script>location.href = 'karyawan-kor.php';</script>");
                                                            }
                                                        }
                                                        ?>
                                                        <form action="" method="post">
                                                            <div class="card" style="width: 100%;">
                                                                <div class="card-body">
                                                                    <div class="form-group">
                                                                        <label for="nama_lengkap">Nama</label>
                                                                        <input type="hidden" name="id_karyawan" value="<?= $array_item->id_karyawan ?>">
                                                                        <input type="hidden" name="id_user" value="<?= $data->data[0]->id_user; ?>">
                                                                        <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" value="<?= $array_item->nama_lengkap ?>" readonly>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="no_hp">No Handphone</label>
                                                                        <input type="text" id="no_hp" name="no_hp" class="form-control" value="<?= $array_item->no_hp ?>" readonly>
                                                                    </div>

                                                                    <center>
                                                                        <div class="form-group">
                                                                            <img src="foto_karyawan/<?= $array_item->foto_karyawan ?>" alt="" id="foto_karyawan" class="img-fluid">
                                                                        </div>
                                                                    </center>

                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit" name="konfirmasi" class="btn btn-primary">Konfirmasi</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    <?php endforeach ?>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                <?php }
                                ?>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <?php
                        $link = "getKaryawanKor&id_user=" . urlencode($id_user);
                        $output = getRegistran($link);
                        ?>

                        <div class="card-body table-responsive">
                            <?php if ($output == NULL) { ?>
                                <h1 class="text-center">Data Kosong</h1>
                            <?php  } else { ?>
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No. </th>
                                            <th>Divisi</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Email</th>
                                            <th class="text-center">Jabatan</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($output->data as $key => $array_item) : ?>
                                            <tr>
                                                <td><?php echo $key + 1 ?></td>
                                                <td><?php echo $array_item->nama_divisi; ?></td>
                                                <td><?php echo $array_item->nama_lengkap; ?></td>
                                                <td><?php echo $array_item->jenis_kelamin; ?></td>
                                                <td><?php echo $array_item->email; ?></td>
                                                <td class="text-center">
                                                    <h4><b><?php echo $array_item->level_user; ?></b></h4>
                                                </td>
                                                <td align="center">
                                                    <?php
                                                    if (isset($_POST['delete'])) {
                                                        $id_karyawan = $_POST['id_karyawan'];
                                                        $link = "getDeleteKaryawanId&id_karyawan=" . urlencode($id_karyawan);
                                                        // $link = "getDeleteKaryawanId";
                                                        $delete = getRegistran($link);
                                                        var_dump($delete);
                                                        // if (!$delete) {
                                                        //     echo "<script>alert('Data berhasil dihapus');window.location='karyawan-kor.php'</script>";
                                                        // } else {
                                                        //     echo "<script>alert('Data gagal dihapus');window.location='karyawan-kor.php'</script>";
                                                        // }
                                                    }
                                                    ?>


                                                    <!-- Modal -->
                                                    <!-- Modal Edit Divisi -->
                                                    <div class="modal fade" id="divedit<?php echo $array_item->id_karyawan ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Form Lembur</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="post">
                                                                        <div class="form-group">
                                                                            <label for="id_karyawan">ID Karyawan</label>
                                                                            <input type="text" class="form-control" name="id_karyawan" id="id_karyawan" value="<?php echo $array_item->id_karyawan ?>">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="nama_divisi">Nama Divisi</label>
                                                                            <input type="text" class="form-control" name="nama_divisi" id="nama_divisi" value="<?php echo $array_item->nama_divisi ?>">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="nama_lengkap">Nama Karyawan</label>
                                                                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?php echo $array_item->nama_lengkap; ?>">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="level_user">Jabatan</label>
                                                                            <input type="text" class="form-control" id="level_user" name="level_user" value="<?php echo $array_item->level_user; ?>">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="project">Project yang dilakukan</label>
                                                                            <input type="text" class="form-control" id="project" name="project">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="tanggal">Tanggal Lembur</label>
                                                                            <input type="date" class="form-control" id="tanggal" name="tanggal">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="mulai_lembur">Jam Mulai Lembur</label>
                                                                            <input type="text" class="form-control" id="mulai_lembur" name="mulai_lembur">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="akhir_lembur">Sampai Jam</label>
                                                                            <input type="text" class="form-control" id="akhir_lembur" name="akhir_lembur">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="total_lembur">Total Jam Lembur</label>
                                                                            <input type="text" class="form-control" id="total_lembur" name="total_lembur">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="keterangan">Keterangan</label>
                                                                            <input type="text" class="form-control" id="keterangan" name="keterangan">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="mengetahui">Mengetahui</label>
                                                                            <input type="text" class="form-control" id="mengetahui" name="mengetahui">
                                                                        </div>
                                                                        <button type="submit" name="save" class="btn btn-primary w-100">Simpan</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <form method="post">
                                                        <!-- <a href="lembur-karyawan-kor.php?id=<?php echo $array_item->id_karyawan ?>" class="btn-sm btn btn-info" data-bs-toggle="tooltip" title="Lembur Karyawan">
                                                            <i class="fas fa-file"></i>
                                                        </a> -->
                                                        <!-- Button trigger modal -->
                                                        <a class="btn-sm btn btn-info mt-2" type="button" data-toggle="modal" data-target="#divedit<?php echo $array_item->id_karyawan ?>" data-bs-toggle="tooltip" title="Lembur Karyawan">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="karyawan-kor-evaluasi.php?id=<?php echo $array_item->id_karyawan ?>" class="btn-sm btn btn-warning mt-2" data-bs-toggle="tooltip" title="Evaluasi Karyawan">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a href="karyawan-kor-edit.php?id=<?php echo $array_item->id_karyawan ?>" class="btn-sm btn btn-success mt-2" data-bs-toggle="tooltip" title="Ubah data">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <!-- <a href="profile-kor.php?id=<?php echo $array_item->id_karyawan ?>" class="btn-sm btn btn-primary" data-bs-toggle="tooltip" title="Lihat Profile">
                                                            <i class="fas fa-user"></i> -->
                                                        </a>
                                                        <input type="hidden" name="id_karyawan" value="<?php echo $array_item->id_karyawan; ?>">
                                                        <button class="btn btn-danger btn-sm mt-2" onclick="return confirm('Apakah anda yakin ingin menghapus data?')" type="submit" data-bs-toggle="tooltip" title="Hapus data" name="delete">
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