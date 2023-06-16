<?php
require_once 'header.php';

$id_service = $_GET['id'];

$link = "getServiceid&id_service=" . urlencode($id_service);
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
                                $id_service = $_POST['id_service'];
                                $nomor = $_POST['nomor'];
                                $tanggal = $_POST['tanggal'];
                                $infrastruktur = $_POST['infrastruktur'];
                                $ruangan = $_POST['ruangan'];
                                $jenis_perbaikan = $_POST['jenis_perbaikan'];
                                $keterangan = $_POST['keterangan'];
                                $prepared = $_POST['prepared'];

                                $link = "setServiceUpdate&id_service=" . urlencode($id_service) . "&nomor=" . urlencode($nomor) . "&tanggal=" . urlencode($tanggal) . "&infrastruktur=" . urlencode($infrastruktur) . "&ruangan=" . urlencode($ruangan) . "&jenis_perbaikan=" . urlencode($jenis_perbaikan) . "&keterangan=" . urlencode($keterangan) . "&prepared=" . urlencode($prepared);
                                $output = getRegistran($link);
                                if ($output) {
                                    echo "<script>alert('Data berhasil di UPDATE');window.location='service.php'</script>";
                                } else {
                                    echo "<script>alert('Data gagal di UPDATE');window.location='service.php'</script>";
                                }
                            }

                            ?>
                            <?php foreach ($output->data as $array_item) :  ?>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id_service" value="<?php echo $array_item->id_service ?>">
                                    <div class="form-group">
                                        <label for="">Nomor Service</label>
                                        <input class="form-control" type="text" name="nomor" value="<?php echo $array_item->nomor ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tanggal Service</label>
                                        <input class="form-control" type="date" name="tanggal" value="<?php echo $array_item->tanggal ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Infrastruktur yang diservice</label>
                                        <input class="form-control" type="text" name="infrastruktur" value="<?php echo $array_item->infrastruktur ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Ruangan di service</label>
                                        <input class="form-control" type="text" name="ruangan" value="<?php echo $array_item->ruangan ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Jenis Perbaikan</label>
                                        <input class="form-control" type="text" name="jenis_perbaikan" value="<?php echo $array_item->jenis_perbaikan ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Keterangan Service</label><br>
                                        <input class="form-control" type="text" name="keterangan" value="<?php echo $array_item->keterangan ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Prepared By</label><br>
                                        <input class="form-control" type="text" name="prepared" value="<?php echo $array_item->prepared ?>">
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