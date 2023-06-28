<?php
require_once 'header-kordinator.php';

// input Karyawan
// if (isset($_POST['submit'])) {
//     $id_user = $_POST['id_user'];
//     $nama = $_POST['nama'];
//     $mulai_kerja = $_POST['mulai_kerja'];
//     $pinjaman_terakhir = $_POST['pinjaman_terakhir'];
//     $pelunasan_terakhir = $_POST['pelunasan_terakhir'];
//     $nik = $_POST['nik'];
//     $jabatan = $_POST['jabatan'];
//     $gaji_terakhir = $_POST['gaji_terakhir'];
//     $nilai_loan = $_POST['nilai_loan'];
//     $keperluan = $_POST['keperluan'];
//     $pelunasan = $_POST['pelunasan'];
//     $pemohon = $_POST['pemohon'];
//     $disetujui_oleh = $_POST['disetujui_oleh'];
//     $status = $_POST['status'];


//     $link = "setPinjaman&id_user=" . urlencode($id_user) . "&nama=" . urlencode($nama) . "&mulai_kerja=" . urlencode($mulai_kerja) . '&pinjaman_terakhir=' . urlencode($pinjaman_terakhir) . '&pelunasan_terakhir=' . urlencode($pelunasan_terakhir) . '&nik=' . urlencode($nik) . '&jabatan=' . urlencode($jabatan) . '&gaji_terakhir=' . urlencode($gaji_terakhir) . '&nilai_loan=' . urlencode($nilai_loan) . '&keperluan=' . urlencode($keperluan) . '&pelunasan=' . urlencode($pelunasan) . '&pemohon=' . urlencode($pemohon) . '&disetujui_oleh=' . urlencode($disetujui_oleh) . '&status=' . urlencode($status) . '&type=insert';
//     $data = getRegistran($link);
//     var_dump($data);
//     echo "<script>alert('PENGAJUAN PINJAMAN KARYAWAN')</script>";
//     echo ("<script>location.href = 'peminjaman-karyawan-kor.php';</script>");
// }

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Peminjaman Karyawan</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Pengajuan Surat Peminjaman Karyawan</h3>
                </div>
                <!-- /.card-header -->
                <!-- <form method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nama" id="namaKaryawan">
                                <div id="dataKaryawan"></div>

                                <div class="form-group">
                                    <label>Nama Karyawan yang dipinjam</label>
                                    <input type="hidden" name="id_user" value="<?= $id_user ?>">
                                    <input type="text" class="form-control" name="nama">
                                </div>
                                <div class="form-group">
                                    <label>Mulai Kerja</label>
                                    <input type="date" class="form-control" name="mulai_kerja">
                                </div>
                                <div class="form-group">
                                    <label>Pinjaman terakhir</label>
                                    <input type="date" class="form-control" name="pinjaman_terakhir">
                                </div>
                                <div class="form-group">
                                    <label>pelunasan terakhir</label>
                                    <input type="date" class="form-control" name="pelunasan_terakhir">
                                </div>
                                <div class="form-group">
                                    <label>NIK</label>
                                    <input type="text" class="form-control" name="nik">
                                </div>
                                <div class="form-group">
                                    <label>Jabatan</label>
                                    <input type="text" name="jabatan" class="form-control"></input>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Gaji Terakhir</label>
                                    <input type="text" class="form-control" name="gaji_terakhir">
                                </div>
                                <div class="form-group">
                                    <label>Nilai Loan</label>
                                    <input type="text" class="form-control" name="nilai_loan">
                                </div>
                                <div class="form-group">
                                    <label>Keperluan</label>
                                    <input type="text" class="form-control" name="keperluan">
                                </div>
                                <div class="form-group">
                                    <label>Pelunasan Perbulan selama berapa lama</label>
                                    <input type="text" class="form-control" name="pelunasan">
                                </div>
                                <div class="form-group">
                                    <label>Pemohon</label>
                                    <input type="text" class="form-control" name="pemohon" value="<?= $nama ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="disetujui_oleh" value="">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="status" value="diproses">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-lg btn-primary float-sm-right" name="submit">Submit</button>
                    </div>
                </form> -->
                <style>
                    .result-container {
                        border: 1px solid #ccc;
                        padding: 10px;
                        margin-bottom: 10px;
                        background-color: #f7f7f7;
                    }

                    .result-title {
                        font-weight: bold;
                        margin-bottom: 5px;
                    }

                    .form-group {
                        display: flex;
                        align-items: center;
                        margin-bottom: 10px;
                    }

                    .form-group label {
                        flex: 0 0 auto;
                        margin-right: 10px;
                    }

                    .form-group .form-control {
                        flex: 1 1 auto;
                    }

                    .form-group .btn {
                        flex: 0 0 auto;
                    }
                </style>
                <?php
                if (isset($_POST['testing'])) {
                    $nama_lengkap = $_POST["nama_lengkap"];
                    $link = "getKaryawanMuncul&nama_lengkap=" . urlencode($nama_lengkap);
                    $hasilPencarian = getRegistran($link);
                    var_dump($hasilPencarian);
                    if ($hasilPencarian == null) {
                        // Tidak ada tindakan yang diambil jika hasil pencarian null
                    } else {
                        foreach ($hasilPencarian->data as $person) {
                ?>
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h1 class="text-center">Detail Karyawan</h1>
                                            </div>
                                            <div class="card-body">
                                                <form action="" method="post">
                                                    <div class="row g-2">
                                                        <div class="col-md-4">
                                                            <div class="form-floating">
                                                                <input type="text" name="id_karyawan" class="form-control" value="<?php echo $person->id_karyawan; ?>">
                                                                <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $person->nama_lengkap; ?>">
                                                                <input type="text" name="no_ktp" class="form-control" value="<?php echo $person->no_ktp; ?>">
                                                                <input type="text" class="form-control" value="<?php echo $person->jenis_kelamin; ?>">
                                                                <input type="text" name="level_user" class="form-control" value="<?php echo $person->level_user; ?>">
                                                                <input type="text" name="gaji" class="form-control" value="<?php echo $person->gaji; ?>">
                                                                <input type="text" name="mulai_kerja" class="form-control" value="<?php echo $person->mulai_kerja; ?>">
                                                                <input type="text" class="form-control" value="<?php echo $person->tanggal_lahir; ?>">
                                                                <input type="text" class="form-control" value="<?php echo $person->alamat_ktp; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" value="<?php echo $person->alamat_domisili; ?>">
                                                            <input type="text" class="form-control" value="<?php echo $person->no_hp; ?>">
                                                            <input type="text" class="form-control" value="<?php echo $person->no_npwp; ?>">
                                                            <input type="text" class="form-control" value="<?php echo $person->agama; ?>">
                                                            <input type="text" class="form-control" value="<?php echo $person->gol_darah; ?>">
                                                            <input type="text" class="form-control" value="<?php echo $person->status_pernikahan; ?>">
                                                            <input type="text" class="form-control" value="<?php echo $person->status_karyawan; ?>">
                                                            <input type="text" class="form-control" value="<?php echo $person->email; ?>">
                                                            <input type="text" class="form-control" value="<?php echo $person->nama_divisi; ?>">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <img src="foto_karyawan/<?php echo $person->foto_karyawan; ?>" alt="">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label for="">Pinjaman Terakhir</label>
                                                            <input type="text" name="pinjaman_terakhir" class="form-control">
                                                            <label for="">pelunasan Terakhir</label>
                                                            <input type="text" name="pelunasan_terakhir" class="form-control">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                <?php
                        }
                    }
                }
                ?>

                <div class="container">
                    <form method="post" action="">
                        <div class="form-group mt-5">
                            <label for="nama">Cari Karyawan:</label>
                            <input class="form-control" type="text" id="nama_lengkap" name="nama_lengkap">
                            <button type="submit" class="btn btn-primary" name="testing">Cari</button>
                        </div>
                    </form>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th class="text-center">Divisi</th>
                                <th class="col-2 text-center">Status Karyawan</th>
                                <th class="text-center">Jabatan</th>
                                <th class="col-2 text-center">Foto Karyawan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $link = "getKaryawanPinjam";
                            $output = getRegistran($link);
                            $no = 1;
                            ?>
                            <?php foreach ($output->data as $value) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $value->nama_lengkap ?></td>
                                    <td class="text-center"><?= $value->nama_divisi ?></td>
                                    <td class="text-center"><?= $value->status_karyawan ?></td>
                                    <td class="text-center"><?= $value->level_user ?></td>
                                    <td class="text-center"><img style="width: 150px;" src="foto_karyawan/<?= $value->foto_karyawan ?>" alt=""></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
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
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="dist/js/demo.js"></script> -->
<!-- Page specific script -->
</body>

</html>