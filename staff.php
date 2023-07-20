<?php
include "header.php";

if (isset($_POST['delete'])) {
    $id_karyawan = $_POST['id_karyawan'];
    // $id_user = $_POST['id_user'];
    $link = "getDeleteKaryawanAdmin&id_karyawan=" . urlencode($id_karyawan);
    $delete = getRegistran($link);
    var_dump($delete2);
    // if (!$delete) {
    //     echo "<script>alert('Data berhasil dihapus');window.location='staff.php'</script>";
    // } else {
    //     echo "<script>alert('Data gagal dihapus');window.location='staff.php'</script>";
    // }
}

$link = "getKaryawanPinjam";
$output = getRegistran($link);
$id_karyawan = $output->data[0]->id_karyawan;

$link2 = "getDivisi";
$data_divisi = getRegistran($link2);
$id_divisi = $data_divisi->data[0]->id_divisi;
$nama_divisi = $data_divisi->data[0]->nama_divisi;
// var_dump($nama_divisi);
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
                            <i class="fas fa-plus"></i> Add New Karyawan
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
                        </div>
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
                                            <th>Nomor Karyawan</th>
                                            <th>Jabatan</th>
                                            <th class="text-center">status karyawan</th>
                                            <th>Divisi</th>
                                            <th>Email</th>
                                            <th>Besaran Gaji</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach ($output->data as $key => $array_item) :
                                            $gaji = $array_item->gaji;
                                            $formatted_gaji = number_format($gaji, 0, ",", ".");
                                        ?>
                                            <tr>
                                                <td><?php echo $key + 1 ?></td>
                                                <td><?php echo $array_item->nama_lengkap; ?></td>
                                                <td><?php echo $array_item->nomor_induk; ?></td>
                                                <td><?php echo $array_item->level_user; ?></td>
                                                <td class="text-center">

                                                    <?php $array_item->akhir_kerja; ?>
                                                    <?php
                                                    // Konversi tanggal akhir kerja dari string menjadi objek DateTime
                                                    $akhir_kerja = new DateTime($array_item->akhir_kerja);
                                                    // Hitung 30 hari sebelum akhir kerja
                                                    $batas_waktu = clone $akhir_kerja;
                                                    $batas_waktu->modify('-30 days');

                                                    // Jika tanggal saat ini lebih besar dari batas_waktu, maka tampilkan tautan "warning masa_kerja"
                                                    if (new DateTime() > $batas_waktu) {
                                                        echo '<span class="btn btn-sm btn-warning">warning masa_kerja</span>';
                                                    } else {
                                                        echo $array_item->status_karyawan;
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php echo $array_item->nama_divisi; ?>
                                                </td>
                                                <td><?php echo $array_item->email; ?></td>
                                                <td>Rp. <?php echo $formatted_gaji ?></td>
                                                <td class="text-center">
                                                    <form method="post">
                                                        <a href="karyawan_edit.php?id=<?php echo $array_item->id_karyawan ?>" class="btn-sm btn btn-primary" data-bs-toggle="tooltip" title="Ubah">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="karyawan_detail.php?id=<?php echo $array_item->id_karyawan ?>" class="btn-sm btn btn-info" data-bs-toggle="tooltip" title="Profile">
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
                                </table>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

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