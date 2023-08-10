<?php
include "header-staff.php";


$link = "getKaryawanstaff&id_karyawan=" . urlencode($id_karyawan);
$datas = getRegistran($link);
$nama_divisi = $datas->data[0]->nama_divisi;
// var_dump($nama_divisi);

$link = "getLemburByNama&id_karyawan=" . urlencode($id_karyawan);
$data_lembur = getRegistran($link);
// $status_lembur = $data_lembur->data[0]->status;
// var_dump($data_lembur);  

?>

<?php
if (isset($_POST['delete'])) {
    $id_lembur = $_POST['id_lembur'];
    $link = "getDeleteLembur&id_lembur=" . urlencode($id_lembur);
    $delete = getRegistran($link);
    if (!$delete) {
        echo "<script>alert('Data berhasil dihapus');window.location='lembur-karyawan-kor.php'</script>";
    } else {
        echo "<script>alert('Data gagal dihapus');window.location='lembur-karyawan-kor.php'</script>";
    }
}

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
    $status = $_POST['status'];

    $link = "setLembur2&id_karyawan=" . urlencode($id_karyawan) . "&nama_divisi=" . urlencode($nama_divisi) . "&nama_lengkap=" . urlencode($nama_lengkap) . "&level_user=" . urlencode($level_user) . "&project=" . urlencode($project) . "&tanggal=" . urlencode($tanggal) . "&mulai_lembur=" . urlencode($mulai_lembur) . "&akhir_lembur=" . urlencode($akhir_lembur) . "&total_lembur=" . urlencode($total_lembur) . "&status=" . urlencode($status);
    $data = getRegistran($link);
    var_dump($data);
    echo "<script>alert('Data Berhasil terkirim')</script>";
    echo "<script>location.href = 'lembur_staff.php';</script>";
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
                            <h3 class="card-title">Data Lembur Staf Karyawan</h3>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end pb-3">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    <i class="fas fa-plus"></i> Add Lembur
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Lembur</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="" method="post">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="mb-2">
                                                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= $nama_user ?>" readonly>
                                                                <input type="hidden" class="form-control" id="id_karyawan" name="id_karyawan" value="<?= $id_karyawan ?>" readonly>
                                                            </div>
                                                            <div class="mb-2">
                                                                <label for="level_user" class="form-label">Jabatan</label>
                                                                <input type="text" class="form-control" id="level_user" name="level_user" value="<?= $level_user ?>" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="mb-2">
                                                                <label for="nama_divisi" class="form-label">Nama Divisi</label>
                                                                <input type="text" class="form-control" id="nama_divisi" name="nama_divisi" value="<?= $nama_divisi ?>" readonly>
                                                            </div>
                                                            <div class="mb-2">
                                                                <label for="project" class="form-label">Project yang dilakukan</label>
                                                                <input type="text" class="form-control" id="project" name="project">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="mb-2">
                                                                <label for="tanggal">Tanggal</label>
                                                                <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                                                            </div>
                                                            <div class="mb-2">
                                                                <label for="mulai_lembur">Mulai Lembur</label>
                                                                <input type="time" class="form-control" id="mulai_lembur" name="mulai_lembur" required>
                                                            </div>
                                                            <div class="mb-2">
                                                                <label for="akhir_lembur">Akhir Lembur</label>
                                                                <input type="time" class="form-control" id="akhir_lembur" name="akhir_lembur" required>
                                                            </div>
                                                            <div class="mb-2">
                                                                <label for="total_lembur">Total Jam Lembur / JAM</label>
                                                                <input type="number" class="form-control" id="total_lembur" name="total_lembur" required>
                                                                <input type="hidden" class="form-control" id="status" name="status" value="diproses">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" name="save" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <?php if ($data_lembur == NULL) { ?>
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No. </th>
                                                <th>Divisi</th>
                                                <th>Nama Lengkap</th>
                                                <th>Jabatan</th>
                                                <th>Project dilakukan</th>
                                                <th>Tanggal Lembur</th>
                                                <th>Mulai Lembur</th>
                                                <th>Akhir Lembur</th>
                                                <th>Total Jam Lembur</th>
                                                <th>Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="12" align="center">Data Kosong</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            <?php  } else { ?>
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No. </th>
                                                <th>Divisi</th>
                                                <th>Nama Lengkap</th>
                                                <th>Jabatan</th>
                                                <th>Project dilakukan</th>
                                                <th>Tanggal Lembur</th>
                                                <th>Mulai Lembur</th>
                                                <th>Akhir Lembur</th>
                                                <th>Total Jam Lembur</th>
                                                <th>Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($data_lembur->data as $key => $array_item) : ?>
                                                <tr>
                                                    <td><?php echo $key + 1 ?></td>
                                                    <td><?php echo $array_item->nama_divisi; ?></td>
                                                    <td><?php echo $array_item->nama_lengkap; ?></td>
                                                    <td><?php echo $array_item->level_user; ?></td>
                                                    <td><?php echo $array_item->project; ?></td>
                                                    <td><?php echo $array_item->tanggal; ?></td>
                                                    <td><?php echo $array_item->mulai_lembur; ?></td>
                                                    <td><?php echo $array_item->akhir_lembur; ?></td>
                                                    <td><?php echo $array_item->total_lembur; ?> JAM</td>
                                                    <td>
                                                        <?php
                                                        if ($array_item->status == "diproses") {
                                                            echo "<span class='badge bg-warning text-dark'>$array_item->status</span>";
                                                        } elseif ($array_item->status == "diterima") {
                                                            echo "<span class='badge bg-success'>$array_item->status</span>";
                                                        } elseif ($array_item->status == "ditolak") {
                                                            echo "<span class='badge bg-danger'>$array_item->status</span>";
                                                        }
                                                        ?>
                                                    </td>
                                                    <td align="center">
                                                        <form method="post">
                                                            <!-- <a href="lembur-karyawan-kor.php?id=<?php echo $array_item->id_karyawan ?>" class="btn-sm btn btn-info" data-bs-toggle="tooltip" title="Lembur Karyawan">
                                                            <i class="fas fa-file"></i>
                                                        </a> -->
                                                            <!-- Button trigger modal -->
                                                            <!-- <a class="btn-sm btn btn-info" type="button" data-toggle="modal" data-target="#divedit<?php echo $array_item->id_karyawan ?>" data-bs-toggle="tooltip" title="Lembur Karyawan">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="karyawan-kor-evaluasi.php?id=<?php echo $array_item->id_karyawan ?>" class="btn-sm btn btn-warning" data-bs-toggle="tooltip" title="Evaluasi Karyawan">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a href="karyawan-kor-edit.php?id=<?php echo $array_item->id_karyawan ?>" class="btn-sm btn btn-primary" data-bs-toggle="tooltip" title="Ubah data">
                                                            <i class="fas fa-edit"></i>
                                                        </a> -->
                                                            <input type="hidden" name="id_lembur" value="<?php echo $array_item->id_lembur; ?>">
                                                            <button class="btn btn-danger btn-sm m-1" onclick="return confirm('Apakah anda yakin ingin menghapus data?')" type="submit" data-bs-toggle="tooltip" title="Hapus data" name="delete">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
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

<script>
    // Function to calculate the total lembur
    function calculateTotalLembur() {
        const mulaiLembur = document.getElementById('mulai_lembur').value;
        const akhirLembur = document.getElementById('akhir_lembur').value;

        // Parse the time values to calculate the difference
        const mulaiTime = new Date(`2000-01-01T${mulaiLembur}`);
        const akhirTime = new Date(`2000-01-01T${akhirLembur}`);

        // Calculate the difference in hours
        const diffHours = (akhirTime - mulaiTime) / 3600000;

        // Update the total_lembur input with the calculated value
        document.getElementById('total_lembur').value = diffHours;
    }

    // Add event listeners to the input fields to trigger the calculation
    document.getElementById('mulai_lembur').addEventListener('change', calculateTotalLembur);
    document.getElementById('akhir_lembur').addEventListener('change', calculateTotalLembur);
</script>
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