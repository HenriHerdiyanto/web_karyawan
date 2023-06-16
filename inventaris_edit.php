<?php
require_once 'header.php';

$id_inventaris = $_GET['id'];

$link = "getInventarisid&id_inventaris=" . urlencode($id_inventaris);
$output = getRegistran($link);
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail data Inventaris</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Detail Inventaris</li>
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
                        <div class="card-body table-responsive">
                            <?php
                            if (isset($_POST['update'])) {
                                $id_inventaris = $_POST['id_inventaris'];
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
                                        $nama_file = "Update-" . "-"  . $extensi_file;
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
                                if (empty($nama_file)) {
                                    $link = "setInventarisUpdateNoGambar&id_inventaris=" . urlencode($id_inventaris) . "&nama=" . urlencode($nama) . "&tipe=" . urlencode($tipe) . "&jumlah=" . urlencode($jumlah) . "&tanggal=" . urlencode($tanggal) . "&harga=" . urlencode($harga);
                                    $data = getRegistran($link);
                                    echo '<script>alert("data berhasil DI UPDATE");window.location="inventaris.php"</script>';
                                } else {
                                    $link = "setInventarisUpdateGambar&id_inventaris=" . urlencode($id_inventaris) . "&nama=" . urlencode($nama) . "&tipe=" . urlencode($tipe) . "&jumlah=" . urlencode($jumlah) . "&tanggal=" . urlencode($tanggal) . "&harga=" . urlencode($harga) . "&gambar=" . urlencode($nama_file);
                                    $data = getRegistran($link);
                                    echo '<script>alert("data berhasil DI UPDATE");window.location="inventaris.php"</script>';
                                }
                            }

                            ?>
                            <?php foreach ($output->data as $array_item) :  ?>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id_inventaris" value="<?php echo $array_item->id_inventaris ?>">
                                    <div class="form-group">
                                        <label for="">Nama Barang</label>
                                        <input class="form-control" type="text" name="nama" value="<?php echo $array_item->nama ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Type Barang</label>
                                        <input class="form-control" type="text" name="tipe" value="<?php echo $array_item->tipe ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Jumlah Barang</label>
                                        <input class="form-control" type="number" name="jumlah" value="<?php echo $array_item->jumlah ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tanggal Beli</label>
                                        <input class="form-control" type="date" name="tanggal" value="<?php echo $array_item->tanggal ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Harga Beli</label>
                                        <input class="form-control" type="text" name="harga" value="<?php echo $array_item->harga ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Keadaan Barang</label><br>
                                        <img style="width: 200px;" src="foto_inventaris/<?php echo $array_item->gambar ?>" alt="">
                                        <input class="form-control" type="file" name="gambar">
                                    </div>
                                    <button type="submit" name="update" class="btn btn-success">UPDATE</button>
                                </form>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>

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
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>

</html>