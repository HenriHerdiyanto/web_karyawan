<?php
include "header.php";
$link = "getDivisi";
$data_divisi = getRegistran($link);

$link = "getSOP";
$output = getRegistran($link);

$link2 = "getDivisi";
$data_divisi = getRegistran($link2);
$id_divisi = $data_divisi->data[0]->id_divisi;
$nama_divisi = $data_divisi->data[0]->nama_divisi;
// var_dump($nama_divisi);

if (isset($_POST['update'])) {
    $id_sop = $_POST['id_sop'];
    $aturan = $_POST['aturan'];

    $link = "setUpdateSOP&id_sop=" . urlencode($id_sop) . "&aturan=" . urlencode($aturan);
    $updatesop = getRegistran($link);
    // var_dump($updatesop);
    echo '<script>alert("SOP berhasil diupdate")</script>';
    echo ("<script>location.href = 'sop.php';</script>");
}

if (isset($_POST['delete'])) {
    $id_sop = $_POST['id_sop'];
    $link = "getDeleteSOP&id_sop=" . urlencode($id_sop);
    $delete = getRegistran($link);
    // var_dump($delete);
    if (!$delete) {
        echo "<script>alert('Data berhasil dihapus');window.location='sop.php'</script>";
    } else {
        echo "<script>alert('Data gagal dihapus');window.location='sop.php'</script>";
    }
}

if (isset($_POST['sop'])) {
    $id_user = $_POST['id_user'];
    $id_divisi = $_POST['id_divisi'];
    $aturan = $_POST['aturan'];

    $link = "setSOP&id_user=" . urlencode($id_user) . "&id_divisi=" . urlencode($id_divisi) . "&aturan=" . urlencode($aturan);
    $datas = getRegistran($link);
    // var_dump($datas);
    echo '<script>alert("SOP berhasil ditambah")</script>';
    echo ("<script>location.href = 'sop.php';</script>");
}
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="row">
                    <div class="col">
                        <h1 class="m-3">Data SOP divisi</h1>
                    </div>
                    <div align="end" class="col mt-3 mr-3">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Tambah SOP
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">SOP DIVISI</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="" method="post">
                                        <div class="modal-body">
                                            <div class="mb-2">
                                                <div class="form-group">
                                                    <input type="hidden" name="id_user" value="<?php echo $id_user ?>">
                                                    <!-- <label for="">Divisi</label> -->
                                                    <select class="form-control" name="id_divisi">
                                                        <option selected>--Pilih Divisi--</option>
                                                        <?php foreach ($data_divisi->data as $key => $value) { ?>
                                                            <option value="<?php echo $value->id_divisi ?>"><?php echo $value->nama_divisi ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-2">
                                                <div class="form-group">
                                                    <!-- <label for="">Tambahkan SOP</label> -->
                                                    <textarea name="aturan" placeholder="Tambahkan SOP..." id="deskripsi" class="form-control" cols="30" rows="10"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" name="sop" class="btn btn-primary">SUBMIT</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th style="width: 10%">No.</th>
                                            <th style="width: 30%">Nama Divisi</th>
                                            <th style="width: 40%">Standard Operating Procedure</th>
                                            <th style="width: 20%" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($output->data as $key => $array_item) : ?>
                                            <tr>
                                                <td><?php echo $key + 1 ?></td>
                                                <td><?php echo $array_item->nama_divisi; ?></td>
                                                <td>
                                                    <span class="d-inline-block text-truncate" style="max-width: 500px;">
                                                        <?php echo $array_item->aturan; ?>
                                                    </span>
                                                </td>
                                                <td class="text-center">
                                                    <div class="d-flex justify-content-center">

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="editModal<?php echo $array_item->id_sop ?>" tabindex="-1" aria-labelledby="editModalLabel<?php echo $array_item->id_sop ?>" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="editModalLabel<?php echo $array_item->id_sop ?>">Ubah Data</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <form method="POST">
                                                                        <div class="modal-body">
                                                                            <div class="mb-3">
                                                                                <input type="text" name="id_sop" value="<?= $array_item->id_sop ?>">
                                                                                <input type="text" class="form-control" id="nama_divisi" value="<?php echo $array_item->nama_divisi; ?>" readonly>
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <textarea class="form-control" name="aturan" id="aturan" rows="20" col="20"><?php echo $array_item->aturan; ?></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-success" data-bs-dismiss="modal">Tutup</button>
                                                                            <button type="submit" name="update" class="btn btn-primary">UPDATE</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <form method="post">
                                                            <a href="#" class="btn-sm btn btn-info mx-2" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $array_item->id_sop ?>" title="Ubah">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <input type="hidden" name="id_sop" value="<?php echo $array_item->id_sop; ?>">
                                                            <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data?')" type="submit" data-bs-toggle="tooltip" title="Hapus" name="delete">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
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