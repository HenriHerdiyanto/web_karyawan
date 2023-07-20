<?php
include "controller/koneksi.php";
require_once 'header-kordinator.php';

$link = "getRequest&id_karyawan=" . urlencode($id_kar1);
$request = getRegistran($link);
// var_dump($profile);
$link2 = "getSOPid&id_divisi=" . urlencode($id_divisi);
$data_sop = getRegistran($link2);
// var_dump($data_sop);

if (isset($_POST['submit'])) {
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
    $status = $_POST['status'];

    $link = "setRequestBudget&id_karyawan=" . urlencode($id_karyawan) . "&nama_lengkap=" . urlencode($nama_lengkap) . "&jenis_item=" . urlencode($jenis_item) . "&nama_divisi=" . urlencode($nama_divisi) . "&tanggal=" . urlencode($tanggal) . "&keperluan1=" . urlencode($keperluan1) . "&harga1=" . urlencode($harga1) . "&keperluan2=" . urlencode($keperluan2) . "&harga2=" . urlencode($harga2) . "&keperluan3=" . urlencode($keperluan3) . "&harga3=" . urlencode($harga3) . "&keperluan4=" . urlencode($keperluan4) . "&harga4=" . urlencode($harga4) . "&total_harga=" . urlencode($total_harga) . "&status=" . urlencode($status);
    $create = getRegistran($link);
    // var_dump($create);
    if ($create->status == 1) {
        echo "<script>alert('Data berhasil dikirim');window.location.href='request_budget_kor.php';</script>";
    } else {
        echo "<script>alert('Data gagal dikirim');window.location.href='request_budget_kor.php';</script>";
    }
}


?>
<style>
    label {
        display: flex;
        justify-items: left;
        margin-left: 0 !important;
    }
</style>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="row">
                    <div class="col">
                        <h1 class="m-3">Form Request</h1>
                    </div>
                    <div align="end" class="col mt-2 mr-3">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-lg btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $id_kar1 ?>">
                            <i class="nav-icon fas fa-plus"></i> Request
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal<?php echo $id_kar1 ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Form Request Budget</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="" method="post">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="mb-2">
                                                        <label for="nama_lengkap">Nama Lengkap</label>
                                                        <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" value="<?= $nama ?>" readonly>
                                                        <input type="hidden" name="id_karyawan" class="form-control" value="<?= $id_kar1 ?>" readonly>
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="jenis_item">Jenis Item</label>
                                                        <select id="jenis_item" name="jenis_item" class="form-control">
                                                            <option selected disabled>---Jenis Item---</option>
                                                            <option value="barang">Barang</option>
                                                            <option value="jasa">Jasa</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="mb-2">
                                                        <label for="nama_divisi">Divisi</label>
                                                        <input type="text" id="nama_divisi" name="nama_divisi" class="form-control" value="<?= $nama_divisi ?>" readonly>
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="tanggal">Tanggal</label>
                                                        <input type="date" id="tanggal" name="tanggal" class="form-control">
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
                                                        <td><input type="text" class="form-control" name="keperluan1"></td>
                                                        <td><input type="number" name="harga1" class="form-control nilai-input"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td><input type="text" class="form-control" name="keperluan2"></td>
                                                        <td><input type="number" name="harga2" class="form-control nilai-input"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td><input type="text" class="form-control" name="keperluan3"></td>
                                                        <td><input type="number" name="harga3" class="form-control nilai-input"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td><input type="text" class="form-control" name="keperluan4"></td>
                                                        <td><input type="number" name="harga4" class="form-control nilai-input"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>5</td>
                                                        <td><b>TOTAL NILAI</b></td>
                                                        <td><input type="number" name="total_harga" class="form-control total-nilai" readonly></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="hidden" value="diproses" name="status" class="form-control total-nilai" readonly></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" name="submit" class="btn btn-lg btn-success">Kirim</button>
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
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <section class="col-lg-12 col-sm-12 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-chart-pie mr-2"></i>Form Request Anda</h3>
                        </div><!-- /.card-header -->
                        <?php
                        if ($request == null) { ?>
                            <div class="card-body">
                                <div class="tab-content p-0">
                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No. </th>
                                                <th>Nama Lengkap</th>
                                                <th>Nama Divisi</th>
                                                <th>Tanggal</th>
                                                <th>Keperluan</th>
                                                <th>Harga</th>
                                                <th>Total Harga</th>
                                                <th>Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="9" class="text-center">Data Kosong</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            <?php } else { ?>
                                <div class="card-body">
                                    <div class="tab-content p-0">
                                        <div class="table-responsive">
                                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>No. </th>
                                                        <th>Nama Lengkap</th>
                                                        <th>Nama Divisi</th>
                                                        <th>Tanggal</th>
                                                        <th>Keperluan</th>
                                                        <th>Harga</th>
                                                        <th>Total Harga</th>
                                                        <th>status</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($request->data as $key => $array_item) : ?>
                                                        <tr>
                                                            <td><?php echo $key + 1 ?></td>
                                                            <td><?php echo $array_item->nama_lengkap; ?></td>
                                                            <td><?php echo $array_item->nama_divisi; ?></td>
                                                            <td><?php echo $array_item->tanggal; ?></td>
                                                            <td><?php echo $array_item->keperluan1; ?></td>
                                                            <td><?php echo $array_item->harga1; ?></td>
                                                            <td><?php echo $array_item->total_harga; ?></td>
                                                            <td>
                                                                <?php
                                                                if ($array_item->status == "diproses") {
                                                                    echo "<span class='badge bg-info text-dark'>" . $array_item->status . "</span>";
                                                                } elseif ($array_item->status == "disetujui") {
                                                                    echo "<span class='badge bg-success'>" . $array_item->status . "</span>";
                                                                } elseif ($array_item->status == "ditolak") {
                                                                    echo "<span class='badge bg-danger'>" . $array_item->status . "</span>";
                                                                }
                                                                ?>
                                                            </td>
                                                            <td class="text-center">
                                                                <div class="d-flex align-items-center justify-content-center">
                                                                    <?php
                                                                    if (isset($_POST['hapuskpi'])) {
                                                                        $id_karyawan = $_POST['id_karyawan'];
                                                                        $link = "getDeleteKPIadmin&id_karyawan=" . urlencode($id_karyawan);
                                                                        $delete = getRegistran($link);
                                                                        if (!$delete) {
                                                                            echo "<script>alert('Data berhasil dihapus');window.location='kpi_admin.php'</script>";
                                                                        } else {
                                                                            echo "<script>alert('Data gagal dihapus');window.location='karyawan.php'</script>";
                                                                        }
                                                                    }
                                                                    ?>
                                                                    <form action="" method="post">
                                                                        <!-- <a href="perjalanan_dinas_edit.php?id=<?php echo $array_item->id_karyawan ?>" class="btn-sm btn btn-primary" data-bs-toggle="tooltip" title="Ubah">
                                                                    <i class="fas fa-edit"></i>
                                                                </a> -->
                                                                        <!-- Modal -->
                                                                        <div class="modal fade" id="staticBackdrop<?php echo $array_item->id_form ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                                            <div class="modal-dialog modal-xl">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Data Request Budget</h1>
                                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <form action="" method="post">
                                                                                            <div class="modal-body">
                                                                                                <div class="row">
                                                                                                    <div class="col-6">
                                                                                                        <div class="mb-2">
                                                                                                            <label for="nama_lengkap">Nama Lengkap</label>
                                                                                                            <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" value="<?php echo $array_item->nama_lengkap; ?>" readonly>
                                                                                                            <input type="hidden" name="id_karyawan" class="form-control" value="<?= $id_kar1 ?>" readonly>
                                                                                                        </div>
                                                                                                        <div class="mb-2">
                                                                                                            <label for="jenis_item">Jenis Item</label>
                                                                                                            <select id="jenis_item" name="jenis_item" class="form-control">
                                                                                                                <option selected disabled><?php echo $array_item->jenis_item; ?></option>
                                                                                                                <option value="barang">Barang</option>
                                                                                                                <option value="jasa">Jasa</option>
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
                                                                                            </div>
                                                                                            <div class="modal-footer">
                                                                                                <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Close</button>
                                                                                                <button type="submit" name="submit" class="btn btn-lg btn-success">Kirim</button>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $array_item->id_form ?>">
                                                                            <i class="fas fa-edit"></i>
                                                                        </button>

                                                                        <input type="hidden" name="id_karyawan" value="<?php echo $array_item->id_form ?>">
                                                                        <button class="btn btn-danger btn-sm m-1" onclick="return confirm('Apakah anda yakin ingin menghapus data?')" type="submit" data-bs-toggle="tooltip" title="Hapus" name="hapuskpi">
                                                                            <i class="fas fa-trash-alt"></i>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                <?php }
                                ?>
                                </div>
                </section>
            </div>
        </div>
    </section>
</div>
<aside class="control-sidebar control-sidebar-dark">
</aside>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
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
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<script>
    $('#calendar').datetimepicker({
        format: 'L',
        inline: true
    })
</script>
<script>
    // Mendapatkan elemen input nilai
    const nilaiInputs = document.querySelectorAll('.nilai-input');

    // Mendapatkan elemen input total nilai
    const totalNilaiInput = document.querySelector('.total-nilai');

    // Menghitung total nilai
    function hitungTotalNilai() {
        let totalNilai = 0;

        // Meloopi setiap input nilai dan menjumlahkannya
        nilaiInputs.forEach(input => {
            const nilai = parseFloat(input.value) || 0;
            totalNilai += nilai;
        });

        // Mengatur nilai total pada input total nilai
        totalNilaiInput.value = totalNilai;
    }

    // Menjalankan fungsi hitungTotalNilai saat input nilai berubah
    nilaiInputs.forEach(input => {
        input.addEventListener('input', hitungTotalNilai);
    });
</script>
</body>

</html>