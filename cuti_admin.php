<?php
include "header.php";
$link = "getKaryawanstaff&id_user=" . urlencode($id_user);
$output = getRegistran($link);
var_dump($output);
$link = "getCuti";
$cuti = getRegistran($link);
// var_dump($cuti);




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
                        <h1 class="m-3">CUTI KARYAWAN</h1>
                    </div>
                    <div align="end" class="col mt-3 mr-3">
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
                                    <?php if ($cuti == NULL) { ?>
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
                                                    <tr class="bg-secondary">
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
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($cuti->data as $key => $array_item) : ?>
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
                                                                } elseif ($status == "ditolak") {
                                                                    echo '<a class="btn bg-danger text-white">' . $status . '</a>';
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                if (isset($_POST['delete'])) {
                                                                    $id_karyawan = $_POST['id_karyawan'];
                                                                    $link = "getDeleteDinasId&id_karyawan=" . urlencode($id_karyawan);
                                                                    $delete = getRegistran($link);
                                                                    if (!$delete) {
                                                                        echo "<script>alert('Data berhasil dihapus');window.location='cuti_admin.php'</script>";
                                                                    } else {
                                                                        echo "<script>alert('Data gagal dihapus');window.location='cuti_admin.php'</script>";
                                                                    }
                                                                }
                                                                if (isset($_POST['update'])) {
                                                                    $id_cuti = $_POST['id_cuti'];
                                                                    $status = $_POST['status'];
                                                                    $alasan_cuti = $_POST['alasan_cuti'];
                                                                    $link = "getAddCuti&id_cuti=" . urlencode($id_cuti) . "&alasan_cuti=" . urlencode($alasan_cuti) . "&status=" . urlencode($status);
                                                                    $update = getRegistran($link);
                                                                    var_dump($update);
                                                                    // if (!$update) {
                                                                    //     echo "<script>alert('Data berhasil diupdate');window.location='cuti_admin.php'</script>";
                                                                    // } else {
                                                                    //     echo "<script>alert('Data gagal diupdate');window.location='cuti_admin.php'</script>";
                                                                    // }
                                                                }
                                                                ?>

                                                                <form method="post">
                                                                    <!-- Tambahkan tombol yang akan memicu tampilan modal -->
                                                                    <button type="button" class="btn-sm btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalPerjalananDinas<?php echo $array_item->id_cuti ?>" data-bs-toggle="tooltip" title="Lihat">
                                                                        <i class="fas fa-eye"></i>
                                                                    </button>

                                                                    <!-- Tambahkan modal untuk tautan -->
                                                                    <div class="modal fade" id="modalPerjalananDinas<?php echo $array_item->id_cuti ?>" tabindex="-1" aria-labelledby="modalPerjalananDinasLabel<?php echo $array_item->id_cuti ?>" aria-hidden="true">
                                                                        <div class="modal-dialog modal-xl">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="modalPerjalananDinasLabel<?php echo $array_item->id_cuti ?>">Detai Cuti</h5>
                                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <!-- detail cuti -->
                                                                                    <div class="row">
                                                                                        <div class="col">
                                                                                            <label for="nama_lengkap">Nama Lengkap</label>
                                                                                            <input type="hidden" class="form-control" id="id_cuti" name="id_cuti" value="<?php echo $array_item->id_cuti; ?>">
                                                                                            <input type="hidden" class="form-control" id="id_karyawan" name="id_karyawan" value="<?php echo $array_item->id_karyawan; ?>">
                                                                                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?php echo $array_item->nama_lengkap; ?>">
                                                                                        </div>
                                                                                        <div class="col">
                                                                                            <label for="nama_divisi">Nama Divisi</label>
                                                                                            <input type="text" class="form-control" id="nama_divisi" name="nama_divisi" value="<?php echo $array_item->nama_divisi; ?>">
                                                                                        </div>
                                                                                    </div><br />
                                                                                    <div class="row">
                                                                                        <div class="col">
                                                                                            <label for="level_user">Jabatan</label>
                                                                                            <input type="text" class="form-control" id="level_user" name="level_user" value="<?php echo $array_item->level_user; ?>">
                                                                                        </div>
                                                                                        <div class="col">
                                                                                            <label for="hak_cuti">Hak Cuti</label>
                                                                                            <input type="text" class="form-control" id="hak_cuti" name="hak_cuti" value="<?php echo $array_item->hak_cuti; ?>">
                                                                                        </div>
                                                                                    </div><br />
                                                                                    <div class="row">
                                                                                        <div class="col">
                                                                                            <label for="ambil_cuti">Cuti Diambil</label>
                                                                                            <input type="text" class="form-control" id="ambil_cuti" name="ambil_cuti" value="<?php echo $array_item->ambil_cuti; ?>">
                                                                                        </div>
                                                                                        <div class="col">
                                                                                            <label for="sisa_cuti">Sisa Cuti</label>
                                                                                            <input type="text" class="form-control" id="sisa_cuti" name="sisa_cuti" value="<?php echo $array_item->sisa_cuti; ?>">
                                                                                        </div>
                                                                                    </div><br />
                                                                                    <div class="row">
                                                                                        <div class="col">
                                                                                            <label for="tanggal_mulai">Tanggal Mulai</label>
                                                                                            <input type="text" class="form-control" id="tanggal_mulai" name="tanggal_mulai" value="<?php echo $array_item->tanggal_mulai; ?>">
                                                                                        </div>
                                                                                        <div class="col">
                                                                                            <label for="tanggal_selesai">Tanggal Selesai</label>
                                                                                            <input type="text" class="form-control" id="tanggal_selesai" name="tanggal_selesai" value="<?php echo $array_item->tanggal_selesai; ?>">
                                                                                        </div>
                                                                                    </div><br />
                                                                                    <div class="row">
                                                                                        <div class="col">
                                                                                            <label for="alasan_cuti">Alasan Cuti</label>
                                                                                            <input type="text" class="form-control" id="alasan_cuti" name="alasan_cuti" value="<?php echo $array_item->alasan_cuti; ?>">
                                                                                        </div>
                                                                                        <div class="col">
                                                                                            <label for="status">Status</label>
                                                                                            <select name="status" class="form-control" id="status">
                                                                                                <option value="<?php echo $array_item->status; ?>"><?php echo $array_item->status; ?></option>
                                                                                                <option value="diterima">Diterima</option>
                                                                                                <option value="ditolak">Ditolak</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div><br />
                                                                                    <div class="row">
                                                                                        <div class="col">
                                                                                            <label for="alasan_cuti">Keterangan</label>
                                                                                            <input type="text" class="form-control" id="alasan_cuti" name="alasan_cuti" value="<?php echo $array_item->alasan_cuti; ?>">
                                                                                        </div>
                                                                                    </div><br />
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                                                    <button type="submit" name="update" class="btn btn-success">UPDATE</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <input type="hidden" name="id_karyawan" value="<?php echo $array_item->id_karyawan; ?>">
                                                                    <button class="btn btn-danger btn-sm m-1" onclick="return confirm('Apakah anda yakin ingin menghapus data?')" type="submit" data-bs-toggle="tooltip" title="Hapus" name="delete">
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
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
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