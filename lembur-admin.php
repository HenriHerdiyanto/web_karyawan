<?php
include "header.php";

$link = "getLemburByNama";
$data_lembur = getRegistran($link);
var_dump($data_lembur);

?>
<style>
    /* buatkan css agar posisi label berada rata dikiri */
    label {
        display: inline-block;
        width: 200px;
        margin-right: 100%;
        text-align: justify;
        font-size: medium;
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="row">
                    <div class="col">
                        <h1 class="m-3">Lembur Karyawan</h1>
                    </div>
                    <div align="end" class="col mt-3 mr-3">

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
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end pb-3">

                            </div>
                        </div>

                        <div class="card-body">
                            <?php if ($data_lembur == NULL) { ?>
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr class="bg-secondary">
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
                                            <tr class="bg-secondary">
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
                                                        <?php
                                                        if (isset($_POST['delete'])) {
                                                            $id_lembur = $_POST['id_lembur'];
                                                            $link = "getDeleteLembur&id_lembur=" . urlencode($id_lembur);
                                                            $delete = getRegistran($link);
                                                            if (!$delete) {
                                                                echo "<script>alert('Data berhasil dihapus');window.location='lembur-admin.php'</script>";
                                                            } else {
                                                                echo "<script>alert('Data gagal dihapus');window.location='lembur-admin.php'</script>";
                                                            }
                                                        }
                                                        ?>

                                                        <!-- Modal Evaluasi Karyawan -->
                                                        <div class="modal fade" id="evaluasiModal<?= $array_item->id_lembur ?>" tabindex="-1" aria-labelledby="evaluasiModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-xl">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="evaluasiModalLabel">Data Lembur Karyawan</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                                    </div>
                                                                    <?php
                                                                    if (isset($_POST['update'])) {
                                                                        $id_lembur = $_POST['id_lembur'];
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
                                                                        $status = $_POST['status'];

                                                                        $link = "getUpdateLembur&id_lembur=" . urlencode($id_lembur) . "&nama_divisi=" . urlencode($nama_divisi) . "&nama_lengkap=" . urlencode($nama_lengkap) . "&level_user=" . urlencode($level_user) . "&project=" . urlencode($project) . "&tanggal=" . urlencode($tanggal) . "&mulai_lembur=" . urlencode($mulai_lembur) . "&akhir_lembur=" . urlencode($akhir_lembur) . "&total_lembur=" . urlencode($total_lembur) . "&keterangan=" . urlencode($keterangan)  . "&mengetahui=" . urlencode($mengetahui) . "&status=" . urlencode($status);
                                                                        $update = getRegistran($link);
                                                                        // var_dump($update);
                                                                        if ($update) {
                                                                            echo "<script>alert('Data berhasil diubah');window.location='lembur-admin.php'</script>";
                                                                        } else {
                                                                            echo "<script>alert('Data gagal diubah');window.location='lembur-admin.php'</script>";
                                                                        }
                                                                    }
                                                                    ?>
                                                                    <form action="" method="post">
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div class="col-lg-6">
                                                                                    <div class="mb-2">
                                                                                        <label for="nama_lengkap">Nama Lengkap</label>
                                                                                        <input type="hidden" class="form-control" name="id_lembur" value="<?= $array_item->id_lembur ?>">
                                                                                        <input type="text" class="form-control" name="nama_lengkap" value="<?= $array_item->nama_lengkap ?>">
                                                                                    </div>
                                                                                    <div class="mb-2">
                                                                                        <label for="nama_divisi">Divisi</label>
                                                                                        <input type="text" class="form-control" name="nama_divisi" value="<?= $array_item->nama_divisi ?>">
                                                                                    </div>
                                                                                    <div class="mb-2">
                                                                                        <label for="level_user">Jabatan</label>
                                                                                        <input type="text" class="form-control" name="level_user" value="<?= $array_item->level_user ?>">
                                                                                    </div>
                                                                                    <div class="mb-2">
                                                                                        <label for="project">Project</label>
                                                                                        <input type="text" class="form-control" name="project" value="<?= $array_item->project ?>">
                                                                                    </div>
                                                                                    <div class="mb-2">
                                                                                        <label for="tanggal">Tanggal Lembur</label>
                                                                                        <input type="date" class="form-control" name="tanggal" value="<?= $array_item->tanggal ?>">
                                                                                    </div>
                                                                                    <div class="mb-2">
                                                                                        <label for="mulai_lembur">Mulai Lembur</label>
                                                                                        <input type="time" class="form-control" name="mulai_lembur" value="<?= $array_item->mulai_lembur ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-6">
                                                                                    <div class="mb-2">
                                                                                        <label for="akhir_lembur">Akhir Lembur</label>
                                                                                        <input type="time" class="form-control" name="akhir_lembur" value="<?= $array_item->akhir_lembur ?>">
                                                                                    </div>
                                                                                    <div class="mb-2">
                                                                                        <label for="total_lembur">Total Jam Lembur</label>
                                                                                        <input type="text" class="form-control" name="total_lembur" value="<?= $array_item->total_lembur ?>">
                                                                                    </div>
                                                                                    <div class="mb-2">
                                                                                        <label for="keterangan">Keterangan</label>
                                                                                        <input type="text" class="form-control" name="keterangan" value="<?= $array_item->keterangan ?>">
                                                                                    </div>
                                                                                    <div class="mb-2">
                                                                                        <label for="mengetahui">Mengetahui</label>
                                                                                        <input type="text" class="form-control" name="mengetahui" value="<?= $array_item->mengetahui ?>">
                                                                                    </div>
                                                                                    <div class="mb-2">
                                                                                        <label for="status">Status</label>
                                                                                        <select class="form-control" name="status" id="status">
                                                                                            <option value="<?= $array_item->status ?>" selected><?= $array_item->status ?></option>
                                                                                            <option value="diterima">Diterima</option>
                                                                                            <option value="ditolak">Ditolak</option>
                                                                                        </select>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                                            <button type="submit" class="btn btn-success" name="update">Simpan</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <form method="post">
                                                            <!-- <a href="lembur-karyawan-kor.php?id=<?php echo $array_item->id_karyawan ?>" class="btn-sm btn btn-info" data-bs-toggle="tooltip" title="Lembur Karyawan">
                                                            <i class="fas fa-file"></i>
                                                        </a> -->
                                                            <!-- Button trigger modal -->
                                                            <!-- <a class="btn-sm btn btn-info" type="button" data-toggle="modal" data-target="#divedit<?php echo $array_item->id_karyawan ?>" data-bs-toggle="tooltip" title="Lembur Karyawan">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="karyawan-kor-edit.php?id=<?php echo $array_item->id_karyawan ?>" class="btn-sm btn btn-primary" data-bs-toggle="tooltip" title="Ubah data">
                                                            <i class="fas fa-edit"></i>
                                                        </a> -->
                                                            <button type="button" class="btn-sm btn btn-warning" data-bs-toggle="modal" data-bs-target="#evaluasiModal<?= $array_item->id_lembur ?>" title="Evaluasi Karyawan">
                                                                <i class="fas fa-eye"></i>
                                                            </button>

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