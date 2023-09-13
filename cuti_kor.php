<?php
include "header-kordinator.php";
$link = "getKaryawanstaff&id_karyawan=" . urlencode($id_kar1);
$output = getRegistran($link);
// var_dump($output);
$link = "getCuti&id_karyawan=" . urlencode($id_kar1);
$cutiObj = getRegistran($link);
// var_dump($cuti);


$link = "getSisaCuti&id_karyawan=" . urlencode($id_kar1);
$sisa_cuti = getRegistran($link);
var_dump($sisa_cuti);


if (isset($_POST['cuti'])) {
    $id = $_POST['id_karyawan'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $nama_divisi = $_POST['nama_divisi'];
    $level_user = $_POST['level_user'];
    $hak_cuti = $_POST['hak_cuti'];
    $ambil_cuti = $_POST['ambil_cuti'];
    $sisa_cuti = $_POST['sisa_cuti'];
    $tanggal_mulai = $_POST['tanggal_mulai'];
    $tanggal_selesai = $_POST['tanggal_selesai'];
    $alasan_cuti = $_POST['alasan_cuti'];
    $status = $_POST['status'];
    $link = "getAddCuti&id_karyawan=" . urlencode($id) . "&nama_lengkap=" . urlencode($nama_lengkap) . "&nama_divisi=" . urlencode($nama_divisi) . "&level_user=" . urlencode($level_user) . "&hak_cuti=" . urlencode($hak_cuti) . "&ambil_cuti=" . urlencode($ambil_cuti) . "&sisa_cuti=" . urlencode($sisa_cuti) . "&tanggal_mulai=" . urlencode($tanggal_mulai) . "&tanggal_selesai=" . urlencode($tanggal_selesai) . "&alasan_cuti=" . urlencode($alasan_cuti) . "&status=" . urlencode($status);
    $output = getRegistran($link);
    var_dump($output);
    if (!$output) {
        echo "<script>alert('Data berhasil ditambahkan');window.location='cuti_kor.php'</script>";
    } else {
        echo "<script>alert('Data gagal ditambahkan');window.location='cuti_kor.php'</script>";
    }
}

?>

<style>
    /* buatkan css agar posisi label berada rata dikiri */
    label {
        display: inline-block;
        width: 200px;
        margin-right: 100%;
        text-align: justify;

    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="row">
                    <div class="col">
                        <h1 class="m-3">PENGAJUAN CUTI KARYAWAN</h1>
                    </div>
                    <div align="end" class="col mt-3 mr-3">
                        <?php
                        if ($sisa_cuti == '0') { ?>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#habis">
                                <i class="fas fa-plus"></i> Sisa Cuti
                            </button>
                            <div class="modal fade" id="habis" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                <i class="fas fa-close">X</i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card">
                                                <div class="card-body text-center bg-success p-5 rounded mb-4 shadow-sm h-75 justify-content-between d-flex flex-column">
                                                    <p style="color: white;">SUDAH MELEWATI BATAS MAKSIMAL CUTI</p>
                                                    <h1 style="color: white;">SISA CUTI ANDA SUDAH HABIS</h1>
                                                    <a href="cuti_kor.php" class="btn btn-primary">OK</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } elseif (isset($cutiObj->data) && is_array($cutiObj->data) && empty($cutiObj->data)) { ?>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <i class="fas fa-plus"></i> Add CUTI
                            </button>
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Pengajuan Cuti</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="" method="post">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-2">
                                                            <label for="nama_lengkap">Nama Lengkap</label>
                                                            <input type="text" class="form-control" id="id_karyawan" name="id_karyawan" value="<?= $output->data[0]->id_karyawan ?>" required>
                                                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= $output->data[0]->nama_lengkap ?>" required readonly>
                                                        </div>
                                                        <div class="mb-2">
                                                            <label for="nama_divisi">Nama Divisi</label>
                                                            <input type="text" class="form-control" id="nama_divisi" name="nama_divisi" value="<?= $output->data[0]->nama_divisi ?>" required readonly>
                                                        </div>
                                                        <div class="mb-2">
                                                            <label for="level_user">Jabatan</label>
                                                            <input type="text" class="form-control" id="level_user" name="level_user" value="<?= $output->data[0]->level_user ?>" required readonly>
                                                        </div>
                                                        <div class="mb-2">
                                                            <label for="hak_cuti">Hak Cuti ( Satuan Hari )</label>
                                                            <input type="number" class="form-control" id="hak_cuti" name="hak_cuti" value="20" required readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-2">
                                                            <label for="ambil_cuti">Lama Permintaan Cuti</label>
                                                            <input type="number" class="form-control" id="ambil_cuti" name="ambil_cuti" placeholder="Lama Permintaan Cuti ( Satuan Hari )" required required oninput="hitungSisaCuti()">
                                                        </div>
                                                        <div class="mb-2">
                                                            <label for="sisa_cuti">Sisa Cuti ( Satuan Hari )</label>
                                                            <input type="number" class="form-control" id="sisa_cuti" name="sisa_cuti" placeholder="Sisa Cuti" required readonly>
                                                        </div>
                                                        <div class="mb-2">
                                                            <label for="tanggal_mulai">Tanggal Mulai</label>
                                                            <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" placeholder="Tanggal Mulai" required>
                                                        </div>
                                                        <div class="mb-2">
                                                            <label for="tanggal_selesai">Tanggal Selesai</label>
                                                            <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" placeholder="Tanggal Selesai" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-2">
                                                            <label for="alasan_cuti">Alasan cuti</label>
                                                            <textarea class="form-control" id="alasan_cuti" name="alasan_cuti" rows="3" placeholder="alasan_cuti" required></textarea>
                                                            <input type="text" class="form-control" id="status" name="status" value="diproses" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" name="cuti" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php } else { ?>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#cuti">
                                <i class="fas fa-plus"></i> Add CUTI
                            </button>
                            <div class="modal fade" id="cuti" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Pengajuan Cuti</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="" method="post">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-2">
                                                            <label for="nama_lengkap">Nama Lengkap</label>
                                                            <input type="text" class="form-control" id="id_karyawan" name="id_karyawan" value="<?= $output->data[0]->id_karyawan ?>" required>
                                                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= $output->data[0]->nama_lengkap ?>" required readonly>
                                                        </div>
                                                        <div class="mb-2">
                                                            <label for="nama_divisi">Nama Divisi</label>
                                                            <input type="text" class="form-control" id="nama_divisi" name="nama_divisi" value="<?= $output->data[0]->nama_divisi ?>" required readonly>
                                                        </div>
                                                        <div class="mb-2">
                                                            <label for="level_user">Jabatan</label>
                                                            <input type="text" class="form-control" id="level_user" name="level_user" value="<?= $output->data[0]->level_user ?>" required readonly>
                                                        </div>
                                                        <div class="mb-2">
                                                            <label for="hak_cuti">Hak Cuti ( Satuan Hari )</label>
                                                            <input type="number" class="form-control" id="hak_cuti" name="hak_cuti" value="<?= $sisa_cuti->data[0]->sisa_cuti ?>" required readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-2">
                                                            <label for="ambil_cuti">Lama Permintaan Cuti</label>
                                                            <input type="number" class="form-control" id="ambil_cuti" name="ambil_cuti" placeholder="Lama Permintaan Cuti ( Satuan Hari )" required required oninput="hitungSisaCuti()">
                                                        </div>
                                                        <div class="mb-2">
                                                            <label for="sisa_cuti">Sisa Cuti ( Satuan Hari )</label>
                                                            <input type="number" class="form-control" id="sisa_cuti" name="sisa_cuti" placeholder="Sisa Cuti" required readonly>
                                                        </div>
                                                        <div class="mb-2">
                                                            <label for="tanggal_mulai">Tanggal Mulai</label>
                                                            <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" placeholder="Tanggal Mulai" required>
                                                        </div>
                                                        <div class="mb-2">
                                                            <label for="tanggal_selesai">Tanggal Selesai</label>
                                                            <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" placeholder="Tanggal Selesai" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="mb-2">
                                                            <label for="alasan_cuti">Alasan cuti</label>
                                                            <textarea class="form-control" id="alasan_cuti" name="alasan_cuti" rows="3" placeholder="alasan_cuti" required></textarea>
                                                            <input type="text" class="form-control" id="status" name="status" value="diproses" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            if ($sisa_cuti->data[0]->sisa_cuti == 0) {
                                            } else { ?>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" name="cuti" class="btn btn-primary">Submit</button>
                                                </div>
                                            <?php }
                                            ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php }
                        ?>

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

                        <div class="card-body">
                            <?php if ($cutiObj == NULL) { ?>
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered table-hover" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No. </th>
                                                <th>Di ajukan Oleh</th>
                                                <th>Jabatan</th>
                                                <th>Tujuan Pengajuan</th>
                                                <th>Kota Tujuan</th>
                                                <th>Keterangan</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="8" class="text-center">Data Kosong</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            <?php  } else { ?>
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-hover table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No. </th>
                                                <th>Nama Lengkap</th>
                                                <th>Nama Divisi</th>
                                                <th>Jabatan</th>
                                                <th>hak cuti</th>
                                                <th>Cuti Diambil</th>
                                                <th>Sisa Cuti</th>
                                                <th>Tanggal Cuti</th>
                                                <th>Pulang Cuti</th>
                                                <th>Keterangan Cuti</th>
                                                <th>Status</th>
                                                <!-- <th>Action</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($cutiObj->data as $key => $array_item) : ?>
                                                <tr>
                                                    <td><?php echo $key + 1 ?></td>
                                                    <td><?php echo $array_item->nama_lengkap; ?></td>
                                                    <td><?php echo $array_item->nama_divisi; ?></td>
                                                    <td><?php echo $array_item->level_user; ?></td>
                                                    <td><?php echo $array_item->hak_cuti; ?></td>
                                                    <td><?php echo $array_item->ambil_cuti; ?></td>
                                                    <td><?php echo $array_item->sisa_cuti; ?></td>
                                                    <td><?php echo $array_item->tanggal_mulai; ?></td>
                                                    <td><?php echo $array_item->tanggal_selesai; ?></td>
                                                    <td><?php echo $array_item->alasan_cuti; ?></td>
                                                    <td>
                                                        <?php
                                                        $status = $array_item->status;
                                                        if ($status == "diproses") {
                                                            echo '<a class="btn bg-warning text-white">' . $status . '</a>';
                                                        } elseif ($status == "diterima") {
                                                            echo '<a class="btn bg-success text-white">' . $status . '</a>';
                                                        } else {
                                                            echo '<a class="btn bg-danger text-white">' . $status . '</a>';
                                                        }
                                                        ?>
                                                    </td>
                                                    <!-- <td>
                                                                <?php
                                                                if (isset($_POST['delete'])) {
                                                                    $id_karyawan = $_POST['id_karyawan'];
                                                                    $link = "getDeleteDinasId&id_karyawan=" . urlencode($id_karyawan);
                                                                    $delete = getRegistran($link);
                                                                    if (!$delete) {
                                                                        echo "<script>alert('Data berhasil dihapus');window.location='perjalanan-dinas-kor.php'</script>";
                                                                    } else {
                                                                        echo "<script>alert('Data gagal dihapus');window.location='perjalanan-dinas-kor.php'</script>";
                                                                    }
                                                                }
                                                                ?>

                                                                <form method="post">
                                                                    <?php
                                                                    $status = $array_item->status;
                                                                    if ($status == "diterima") { ?>
                                                                        <a href="cetak_surat.php?id=<?php echo $array_item->id_karyawan ?>" target="_blank" class="btn-sm btn btn-warning" data-bs-toggle="tooltip" title="cetak surat">
                                                                            <i class="fas fa-print"></i>
                                                                        </a>
                                                                    <?php } else { ?>
                                                                    <?php }
                                                                    ?>
                                                                    <a href="perjalanan-dinas-kor-edit.php?id=<?php echo $array_item->id_karyawan ?>" class="btn-sm btn btn-primary" data-bs-toggle="tooltip" title="Lihat">
                                                                        <i class="fas fa-eye"></i>
                                                                    </a>
                                                                    <input type="hidden" name="id_karyawan" value="<?php echo $array_item->id_karyawan; ?>">
                                                                    <button class="btn btn-danger btn-sm m-1" onclick="return confirm('Apakah anda yakin ingin menghapus data?')" type="submit" data-bs-toggle="tooltip" title="Hapus" name="delete">
                                                                        <i class="fas fa-trash-alt"></i>
                                                                    </button>
                                                                </form>
                                                            </td> -->
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
    function hitungSisaCuti() {
        // Ambil nilai dari input hak_cuti dan ambil_cuti
        var hakCuti = parseInt(document.getElementById('hak_cuti').value);
        var ambilCuti = parseInt(document.getElementById('ambil_cuti').value);

        // Lakukan pengurangan
        var sisaCuti = hakCuti - ambilCuti;

        // Tampilkan hasil di input sisa_cuti
        document.getElementById('sisa_cuti').value = sisaCuti;
    }
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