<?php
require_once 'header.php';

// input Divisi
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $tipe = $_POST['tipe'];
    $jumlah = $_POST['jumlah'];
    $tanggal = $_POST['tanggal'];
    $harga = $_POST['harga'];

    $extensi_izin = array("jpg", "jpeg", "png", "pdf", "gif");
    $size_izin = (20971520000000 / 2);

    $allow_file = true;
    $sumber_file = $_FILES['gambar']['tmp_name'];
    $target_file = "foto_inventaris/";
    $nama_file = $_FILES['gambar']['name'];
    $size_file = $_FILES['gambar']['size'];

    if ($nama_file != "") {
        if ($size_file > $size_izin) {
            $error .= "- Ukuran File file tidak Boleh Melebihi 1 MB";
            $allow_file = false;
        } else {
            $getExtensi = explode(".", $nama_file);
            $extensi_file = strtolower(end($getExtensi));
            $nama_file =  "-inventaris"  . "." . $extensi_file;
            if (!in_array($extensi_file, $extensi_izin) == true) {
                $error .= " File hanya diperbolehkan dalam bentuk (jpg, jpeg, png, gif)";
                $allow_ktp = false;
            }
        }

        if ($allow_file) {
            if (!move_uploaded_file($sumber_file, $target_file . $nama_file)) {
                $error .= " Gagal Uplaod File file ke server";
                $error .= $sumber_file . " " . $target_file . $nama_file;
                $allow_file = false;
            }
        }
    }

    $link = "setInventaris&nama=" . urlencode($nama) . '&tipe=' . urlencode($tipe) . "&jumlah=" . urlencode($jumlah) . "&tanggal=" . urlencode($tanggal) . "&harga=" . urlencode($harga) . "&gambar=" . urlencode($nama_file) . '&type=insert';
    $data = getRegistran($link);
    var_dump($data);
    if ($data) {
        echo '<script>alert("data berhasil ditambah");window.location="inventaris.php"</script>';
    } else {
        echo '<script>alert("Data gagal disimpan");window.location="inventaris.php"</script>';
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
                        <h1 class="m-3">Inventaris Kantor</h1>
                    </div>
                    <div align="end" class="col mt-2 mr-3">
                        <button class="btn btn-lg btn-success float-sm-right" type="button" data-toggle="modal" data-target="#AddDivisi">
                            <i class="fas fa-plus"></i> Add Inventaris
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <!-- Modal Add Divisi -->
                <div class="modal fade" id="AddDivisi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Invetaris Kantor</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="">Nama Barang</label>
                                        <input class="form-control" type="text" name="nama">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Type Barang</label>
                                        <input class="form-control" type="text" name="tipe">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Jumlah Barang</label>
                                        <input class="form-control" type="number" name="jumlah">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tanggal Beli</label>
                                        <input class="form-control" type="date" name="tanggal">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Harga Beli</label>
                                        <input class="form-control" type="text" name="harga">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Keadaan Barang</label>
                                        <input class="form-control" type="file" name="gambar">
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-primary w-100">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
    <!-- Main content -->
    <section class="content" style="margin-top: -3%;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body table-responsive">
                            <table id="example" class="table table-striped table-hover table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Barang</th>
                                        <th scope="col">Type Barang</th>
                                        <th scope="col">Jumlah Barang</th>
                                        <th scope="col">Tanggal Beli</th>
                                        <th scope="col">Harga Beli</th>
                                        <th scope="col">Keadaan Barang</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $link = "getInventaris";
                                    $output = getRegistran($link);
                                    ?>
                                    <?php
                                    if ($output == null) { ?>
                                        <tr>
                                            <td colspan="8">
                                                <center><img src="assets/img/logo-header.png" class="img-fluid" alt=""></center>
                                                <h1 class="text-center">Belum ada data</h1>
                                            </td>
                                        </tr>
                                    <?php } else { ?>
                                        <?php foreach ($output->data as $array_item) :  ?>
                                            <tr>
                                                <td class="text-center"><?= $no++ ?></td>
                                                <td><?php echo $array_item->nama ?></td>
                                                <td><?php echo $array_item->tipe ?></td>
                                                <td><?php echo $array_item->jumlah ?></td>
                                                <td><?php echo $array_item->tanggal ?></td>
                                                <td><?php echo $array_item->harga ?></td>
                                                <td><img style="width: 200px;" src="foto_inventaris/<?php echo $array_item->gambar ?>" alt=""></td>
                                                <td>
                                                    <?php
                                                    if (isset($_POST['delete'])) {
                                                        $id_inventaris = $_POST['id_inventaris'];
                                                        $link = "getDeleteInventaris&id_inventaris=" . urlencode($id_inventaris);
                                                        $delete = getRegistran($link);
                                                        if (!$delete) {
                                                            echo "<script>alert('Data berhasil dihapus');window.location='inventaris.php'</script>";
                                                        } else {
                                                            echo "<script>alert('Data gagal dihapus');window.location='inventaris.php'</script>";
                                                        }
                                                    }
                                                    ?>
                                                    <form method="post">
                                                        <a href="inventaris_edit.php?id=<?php echo $array_item->id_inventaris ?>" class="btn-sm btn btn-primary" data-bs-toggle="tooltip" title="Ubah">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <input type="hidden" name="id_inventaris" value="<?php echo $array_item->id_inventaris; ?>">
                                                        <button class="btn btn-danger btn-sm m-1" onclick="return confirm('Apakah anda yakin ingin menghapus data?')" type="submit" data-bs-toggle="tooltip" title="Hapus" name="delete">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    <?php }
                                    ?>
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