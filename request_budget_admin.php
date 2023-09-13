<?php
include "header.php";

if (isset($_POST['delete'])) {
    $id_form = $_POST['id_form'];
    $link = "getDeleteBudget&id_form=" . urlencode($id_form);
    $delete = getRegistran($link);
    var_dump($delete);
    // if (!$delete) {
    //     echo "<script>alert('Data berhasil dihapus');window.location='staff.php'</script>";
    // } else {
    //     echo "<script>alert('Data gagal dihapus');window.location='staff.php'</script>";
    // }
}
$link = "getReqAdmin";
$output = getRegistran($link);

if ($output !== null) {
    if (isset($output->data[0]->status)) {
        $status = $output->data[0]->status;
    } else {
        // Handle the case where 'status' is not set in the response data.
        // You can set a default value or show an error message.
    }
} else {
    // Handle the case where $output is null, e.g., show an error message.
}

// var_dump($output);
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="row">
                    <div class="col">
                        <h1 class="m-3">Semua Data Request Budget</h1>
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
                                            <th>No. </th>
                                            <th>Nama Lengkap</th>
                                            <th>Divisi</th>
                                            <th class="text-center">Jenis Item</th>
                                            <th>Tanggal</th>
                                            <th>Keperluan</th>
                                            <th>Harga</th>
                                            <th>Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($output->data as $key => $array_item) : ?>
                                            <tr>
                                                <td><?php echo $key + 1 ?></td>
                                                <td><?php echo $array_item->nama_lengkap; ?></td>
                                                <td><?php echo $array_item->nama_divisi; ?></td>
                                                <td><?php echo $array_item->jenis_item; ?></td>
                                                <td><?php echo $array_item->tanggal; ?></td>
                                                <td><?php echo $array_item->keperluan1; ?></td>
                                                <td><?php echo $array_item->harga1; ?></td>
                                                <td>
                                                    <?php if ($array_item->status == "diterima") { ?>
                                                        <span class="badge bg-success"><?php echo $array_item->status; ?></span>
                                                    <?php } else if ($array_item->status == "ditolak") { ?>
                                                        <span class="badge bg-danger"><?php echo $array_item->status; ?></span>
                                                    <?php } else if ($array_item->status == "diproses") { ?>
                                                        <span class="badge bg-info"><?php echo $array_item->status; ?></span>
                                                    <?php } ?>
                                                </td>
                                                <td class="text-center">
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="staticBackdrop<?php echo $array_item->id_form ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-xl">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Data Request Budget</h1>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <?php
                                                                    if (isset($_POST['update'])) {
                                                                        $id_karyawan = $_POST['id_karyawan'];
                                                                        $nama_lengkap = $_POST['nama_lengkap'];
                                                                        $jenis_item = $_POST['jenis_item'];
                                                                        $nama_divisi = $_POST['nama_divisi'];
                                                                        $tanggal = $_POST['tanggal'];
                                                                        $keperluan1 = $_POST['keperluan1'];
                                                                        $harga1 = $_POST['harga1'];
                                                                        $keperluan2 = $_POST['keperluan2'];
                                                                        $harga2 = $_POST['harga2'];
                                                                        $keperluan3 = $_POST['keperluan3'];
                                                                        $harga3 = $_POST['harga3'];
                                                                        $keperluan4 = $_POST['keperluan4'];
                                                                        $harga4 = $_POST['harga4'];
                                                                        $total_harga = $_POST['total_harga'];
                                                                        $diketahui = $_POST['diketahui'];
                                                                        $disetujui = $_POST['disetujui'];
                                                                        $status = $_POST['status'];

                                                                        $link = "setUpdateReqAdmin&id_karyawan=" . urlencode($id_karyawan) . "&nama_lengkap=" . urlencode($nama_lengkap) . "&jenis_item=" . urlencode($jenis_item) . "&nama_divisi=" . urlencode($nama_divisi) . "&tanggal=" . urlencode($tanggal) . "&keperluan1=" . urlencode($keperluan1) . "&harga1=" . urlencode($harga1) . "&keperluan2=" . urlencode($keperluan2) . "&harga2=" . urlencode($harga2) . "&keperluan3=" . urlencode($keperluan3) . "&harga3=" . urlencode($harga3) . "&keperluan4=" . urlencode($keperluan4) . "&harga4=" . urlencode($harga4) . "&total_harga=" . urlencode($total_harga) . "&diketahui=" . urlencode($diketahui) . "&disetujui=" . urlencode($disetujui) . "&status=" . urlencode($status);
                                                                        $update = getRegistran($link);
                                                                        var_dump($update);
                                                                        if ($update) {
                                                                            echo "<script>alert('Data berhasil diupdate');window.location='request_budget_admin.php'</script>";
                                                                        } else {
                                                                            echo "<script>alert('Data gagal diupdate');window.location='request_budget_admin.php'</script>";
                                                                        }
                                                                    }
                                                                    ?>
                                                                    <form action="" method="post">
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div class="col-6">
                                                                                    <div class="mb-2">
                                                                                        <label for="nama_lengkap">Nama Lengkap</label>
                                                                                        <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" value="<?php echo $array_item->nama_lengkap; ?>" readonly>
                                                                                        <input type="hidden" name="id_karyawan" class="form-control" value="<?= $array_item->id_karyawan; ?>" readonly>
                                                                                    </div>
                                                                                    <div class="mb-2">
                                                                                        <label for="status">Jenis Item</label>
                                                                                        <select name="jenis_item" class="form-control">
                                                                                            <option value="<?php echo $array_item->jenis_item; ?>"><?php echo $array_item->jenis_item; ?></option>
                                                                                            <option value="barang">barang</option>
                                                                                            <option value="jasa">jasa</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-6">
                                                                                    <div class="mb-2">
                                                                                        <label for="nama_divisi">Divisi</label>
                                                                                        <input type="text" id="nama_divisi" name="nama_divisi" class="form-control" value="<?php echo $array_item->nama_divisi; ?>" readonly>
                                                                                    </div>
                                                                                    <div class="mb-2">
                                                                                        <label for="tanggal">Tanggal</label>
                                                                                        <input type="date" id="tanggal" value="<?php echo $array_item->tanggal; ?>" name="tanggal" class="form-control">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <hr>
                                                                            <small class="text-danger">*jangan gunakan titik Unit Price (Contoh: 5000)</small>
                                                                            <table class="table table-hover table-striped table-bordered">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>No</th>
                                                                                        <th>Keperluan</th>
                                                                                        <th>Unit Price</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>1</td>
                                                                                        <td><input type="text" value="<?php echo $array_item->keperluan1; ?>" class="form-control" name="keperluan1"></td>
                                                                                        <td><input type="number" value="<?php echo $array_item->harga1; ?>" name="harga1" class="form-control nilai-input"></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>2</td>
                                                                                        <td><input type="text" value="<?php echo $array_item->keperluan2; ?>" class="form-control" name="keperluan2"></td>
                                                                                        <td><input type="number" value="<?php echo $array_item->harga2; ?>" name="harga2" class="form-control nilai-input"></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>3</td>
                                                                                        <td><input type="text" value="<?php echo $array_item->keperluan3; ?>" class="form-control" name="keperluan3"></td>
                                                                                        <td><input type="number" value="<?php echo $array_item->harga3; ?>" name="harga3" class="form-control nilai-input"></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>4</td>
                                                                                        <td><input type="text" value="<?php echo $array_item->keperluan4; ?>" class="form-control" name="keperluan4"></td>
                                                                                        <td><input type="number" value="<?php echo $array_item->harga4; ?>" name="harga4" class="form-control nilai-input"></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>5</td>
                                                                                        <td><b>TOTAL NILAI</b></td>
                                                                                        <td><input type="number" value="<?php echo $array_item->total_harga; ?>" name="total_harga" class="form-control total-nilai" readonly></td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                            <div class="row">
                                                                                <div class="col">
                                                                                    <div class="mb-2">
                                                                                        <label for="diketahui">Diketahui HRD</label>
                                                                                        <input type="text" name="diketahui" class="form-control" value="<?php echo $array_item->diketahui; ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <div class="mb-2">
                                                                                        <label for="disetujui">Disetujui</label>
                                                                                        <input type="text" name="disetujui" class="form-control" value="<?php echo $array_item->disetujui; ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <div class="mb-2">
                                                                                        <label for="status">Status</label>
                                                                                        <select name="status" class="form-control">
                                                                                            <option value="<?php echo $array_item->diketahui; ?>">--- PILIH ---</option>
                                                                                            <option value="diproses">Diproses</option>
                                                                                            <option value="diterima">Diterima</option>
                                                                                            <option value="ditolak">Ditolak</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Close</button>
                                                                            <button type="submit" name="update" class="btn btn-lg btn-success">Kirim</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <form method="post">
                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $array_item->id_form ?>">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <input type="hidden" name="id_form" value="<?php echo $array_item->id_form; ?>">
                                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data?')" type="submit" data-bs-toggle="tooltip" title="Hapus" name="delete">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
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
<script>
    function calculateTotal(input) {
        var total = 0;
        var totalId = input.dataset.totalId;
        var inputs = document.querySelectorAll('.indikator-input[data-total-id="' + totalId + '"]');

        for (var i = 0; i < inputs.length; i++) {
            var value = parseInt(inputs[i].value);
            if (!isNaN(value)) {
                total += value;
            }
        }

        document.getElementById('total-' + totalId).value = total;
    }
</script>

</body>

</html>