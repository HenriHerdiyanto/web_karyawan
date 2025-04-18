<?php
require_once 'header.php';

// input Divisi
if (isset($_POST['submit'])) {
    $nomor = $_POST['nomor'];
    $tanggal = $_POST['tanggal'];
    $infrastruktur = $_POST['infrastruktur'];
    $ruangan = $_POST['ruangan'];
    $jenis_perbaikan = $_POST['jenis_perbaikan'];
    $keterangan = $_POST['keterangan'];
    $prepared = $_POST['prepared'];

    $link = "setService&nomor=" . urlencode($nomor) . "&tanggal=" . urlencode($tanggal) . '&infrastruktur=' . urlencode($infrastruktur) . "&ruangan=" . urlencode($ruangan) . "&tanggal=" . urlencode($tanggal) . "&jenis_perbaikan=" . urlencode($jenis_perbaikan) . "&keterangan=" . urlencode($keterangan) . "&prepared=" . urlencode($prepared) . '&type=insert';
    $data = getRegistran($link);
    var_dump($data);
    if ($data) {
        echo '<script>alert("data service berhasil ditambah");window.location="service.php"</script>';
    } else {
        echo '<script>alert("Data gagal disimpan");window.location="service.php"</script>';
    }
}

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="row">
                    <div class="col">
                        <h1 class="m-3">EVALUASI KARYAWAN OLEH KORDINATOR</h1>
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
                        <div class="card-body table-responsive">
                            <table id="example" class="table table-striped table-bordered table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama lengkap karyawan</th>
                                        <th scope="col">Lama Percobaan</th>
                                        <th scope="col">Jabatan</th>
                                        <th scope="col">Tanggal Mulai kerja</th>
                                        <th scope="col">Status Kerja</th>
                                        <th scope="col" class="text-center">Status Evaluasi</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $link = "getEvaluasiAdmin";
                                    $output = getRegistran($link);
                                    ?>
                                    <?php if ($output == NULL) { ?>
                                        <tr>
                                            <td colspan="9">
                                                <center><img src="assets/img/logo-header.png" class="img-fluid" alt=""></center>
                                                <h1 class="text-center">Belum ada data</h1>
                                            </td>
                                        </tr>
                                    <?php  } else { ?>
                                        <?php foreach ($output->data as $array_item) :  ?>
                                            <tr>
                                                <td class="text-center"><?= $no++ ?></td>
                                                <td><?php echo $array_item->nama_lengkap ?></td>
                                                <td><?php echo $array_item->lama_percobaan ?></td>
                                                <td><?php echo $array_item->level_user ?></td>
                                                <td><?php echo $array_item->tanggal_kerja ?></td>
                                                <td><?php echo $array_item->status ?></td>
                                                <td class="text-center">
                                                    <?php
                                                    $status = $array_item->status_evaluasi;
                                                    if ($status == "diproses") {
                                                        echo '<a class="btn bg-warning text-white">' . $status . '</a>';
                                                    } elseif ($status == "diterima") {
                                                        echo '<a class="btn bg-success text-white">' . $status . '</a>';
                                                    } elseif ($status == "perlu perbaikan") {
                                                        echo '<a class="btn bg-info text-white">' . $status . '</a>';
                                                    } else {
                                                        echo '<a class="btn bg-danger text-white">' . $status . '</a>';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if (isset($_POST['delete'])) {
                                                        $id_evaluasi = $_POST['id_evaluasi'];
                                                        $link = "getDeleteService&id_evaluasi=" . urlencode($id_evaluasi);
                                                        $delete = getRegistran($link);
                                                        if (!$delete) {
                                                            echo "<script>alert('Data berhasil dihapus');window.location='service.php'</script>";
                                                        } else {
                                                            echo "<script>alert('Data gagal dihapus');window.location='service.php'</script>";
                                                        }
                                                    }
                                                    ?>
                                                    <form method="post">
                                                        <a href="evaluasi-edit.php?id=<?php echo $array_item->id_evaluasi ?>" class="btn-sm btn btn-primary" data-bs-toggle="tooltip" title="Ubah">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <input type="hidden" name="id_evaluasi" value="<?php echo $array_item->id_evaluasi; ?>">
                                                        <button class="btn btn-danger btn-sm m-1" onclick="return confirm('Apakah anda yakin ingin menghapus data?')" type="submit" data-bs-toggle="tooltip" title="Hapus" name="delete">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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