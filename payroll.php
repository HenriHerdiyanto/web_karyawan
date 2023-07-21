<?php
include "controller/koneksi.php";
require_once 'header.php';

if (isset($_GET['nomor_induk'])) {
    $nomor_induk = $_GET['nomor_induk'];
    $link = "getPayroll&nomor_induk=" . $nomor_induk;
    $payroll = getRegistran($link);
    var_dump($payroll);
} else {
    echo "Error: 'nomor_induk' parameter is missing in the URL.";
}

?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="row">
                    <div class="col">
                        <h1 class="m-3">Data Payroll Karyawan</h1>
                    </div>
                    <div align="end" class="col mt-2 mr-3">
                        <a href="absen-admin.php" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <section class="col-lg-12 col-sm-12 connectedSortable">
                    <form action="" method="post">
                        <div class="card col-lg-12">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-chart-pie mr"></i>Data Pribadi
                            </div>
                            <div class="card-body">
                                <div class="tab-content p-0">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-2">
                                                <input type="hidden" name="id_karyawan" value="<?= $payroll->data[0]->id_karyawan ?>">
                                                <input type="hidden" name="id_divisi" value="<?= $payroll->data[0]->id_divisi ?>">
                                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= $payroll->data[0]->nama_lengkap; ?>" readonly>
                                            </div>
                                            <div class="mb-2">
                                                <label for="level_user" class="form-label">Jabatan</label>
                                                <input type="text" class="form-control" id="level_user" name="level_user" value="<?= $payroll->data[0]->level_user; ?>" readonly>
                                            </div>
                                            <div class="mb-2">
                                                <label for="pendidikan" class="form-label">Pendidikan</label>
                                                <input type="text" class="form-control" id="pendidikan" name="pendidikan">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-2">
                                                <label for="status_ptkp" class="form-label">Status PTKP</label>
                                                <input type="text" class="form-control" id="status_ptkp" name="status_ptkp">
                                            </div>
                                            <div class="mb-2">
                                                <label for="cabang" class="form-label">Cabang</label>
                                                <input type="text" class="form-control" id="cabang" name="cabang">
                                            </div>
                                            <div class="mb-2">
                                                <label for="group" class="form-label">Group</label>
                                                <input type="text" class="form-control" id="group" name="group">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-chart-pie mr"></i>Tunjangan Jabatan
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-2">
                                            <label for="gaji_pokok" class="form-label">GAJI POKOK</label>
                                            <input type="number" class="form-control nilai-input" id="gaji_pokok" name="gaji_pokok">
                                        </div>
                                        <div class="mb-2">
                                            <label for="tempat_kerja" class="form-label">Tempat Bekerja</label>
                                            <input type="text" class="form-control" id="tempat_kerja" name="tempat_kerja" placeholder="HO / CGK / PIK / BALI / YAO / CKR">
                                        </div>
                                        <div class="mb-2">
                                            <label for="besar_tunjangan" class="form-label">Besar Tunjangan Jabatan</label>
                                            <input type="number" class="form-control nilai-input" id="besar_tunjangan" name="besar_tunjangan">
                                        </div>
                                        <div class="mb-2">
                                            <label for="tunjangan_pulsa" class="form-label">Tunjangan Pulsa</label>
                                            <input type="number" class="form-control nilai-input" id="tunjangan_pulsa" name="tunjangan_pulsa">
                                        </div>
                                        <div class="mb-2">
                                            <label for="lain_lain" class="form-label">Tunjangan Lain-lain</label>
                                            <input type="number" class="form-control nilai-input" id="lain_lain" name="lain_lain">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-2">
                                            <label for="tunjangan_pendidikan" class="form-label">Tunjangan Pendidikan</label>
                                            <input type="number" class="form-control nilai-input" id="tunjangan_pendidikan" name="tunjangan_pendidikan">
                                        </div>
                                        <div class="mb-2">
                                            <label for="uang_makan" class="form-label">Uang Makan</label>
                                            <input type="number" class="form-control nilai-input" id="uang_makan" name="uang_makan">
                                        </div>
                                        <div class="mb-2">
                                            <label for="uang_transport" class="form-label">Uang Transport</label>
                                            <input type="number" class="form-control nilai-input" id="uang_transport" name="uang_transport">
                                        </div>
                                        <div class="mb-2">
                                            <label for="total_gaji" class="form-label">TOTAL GAJI BULANAN</label>
                                            <small class="text-red">*tambahkan angka 1 lalu hapus</small>
                                            <input type="number" class="form-control total-nilai" id="total_gaji" name="total_gaji">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-chart-pie mr"></i>Pendapatan
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-2">
                                            <label for="lembur">Lembur</label>
                                            <input type="number" class="form-control nilai-input1" id="lembur" name="lembur">
                                        </div>
                                        <div class="mb-2">
                                            <label for="dinas">Dinas</label>
                                            <input type="number" class="form-control nilai-input1" id="dinas" name="dinas">
                                        </div>
                                        <div class="mb-2">
                                            <label for="cuti_tahunan">Cuti Tahunan</label>
                                            <input type="number" class="form-control nilai-input1" id="cuti_tahunan" name="cuti_tahunan">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-2">
                                            <label for="thr">THR</label>
                                            <input type="number" class="form-control nilai-input1" id="thr" name="thr">
                                        </div>
                                        <div class="mb-2">
                                            <label for="total_tunjangan">Total Tunjangan Di Luar Gaji</label>
                                            <small class="text-red">*tambahkan angka 1 lalu hapus</small>
                                            <input type="number" class="form-control total-nilai1" id="total_tunjangan" name="total_tunjangan">
                                        </div>
                                        <div class="mb-2">
                                            <label for="total_gaji_tunjangan">Total Gaji + Tunjangan Di Luar Gaji</label>
                                            <input type="number" class="form-control total-nilai2" id="total_gaji_tunjangan" name="total_gaji_tunjangan">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-chart-pie mr"></i>Insentif ( setiap tanggal 15 )
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-2">
                                            <label for="">REFERAL CLIENT-5%</label>
                                            <input type="number" class="form-control nilai-input6" id="referal_client" name="referal_client">
                                        </div>
                                        <div class="mb-2">
                                            <label for="">INSENTIF KK-5%</label>
                                            <input type="number" class="form-control nilai-input6" id="insentif_kk" name="insentif_kk">
                                        </div>
                                        <div class="mb-2">
                                            <label for="">INSENTIF SPV-1%</label>
                                            <input type="number" class="form-control nilai-input6" id="insentif_spv" name="insentif_spv">
                                        </div>
                                        <div class="mb-2">
                                            <label for="">INSENTIF STAFF-2%</label>
                                            <input type="number" class="form-control nilai-input6" id="insentif_staff" name="insentif_staff">
                                        </div>
                                        <div class="mb-2">
                                            <label for="">INSENTIF SPT OP</label>
                                            <input type="number" class="form-control nilai-input6" id="insentif_spt_op" name="insentif_spt_op">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-2">
                                            <label for="">INSENTIF SPT BADAN</label>
                                            <input type="number" class="form-control nilai-input6" id="insentif_spt_badan" name="insentif_spt_badan">
                                        </div>
                                        <div class="mb-2">
                                            <label for="">INSENTIF SPT</label>
                                            <input type="number" class="form-control nilai-input6" id="insentif_spt" name="insentif_spt">
                                        </div>
                                        <div class="mb-2">
                                            <label for="">KOMISI MARKETING</label>
                                            <input type="number" class="form-control nilai-input6" id="komisi_marketing" name="komisi_marketing">
                                        </div>
                                        <div class="mb-2">
                                            <label for="">TOTAL INSENTIF DAN KOMISI LAINNYA - PAYMENT PERTENGAHAN BULAN</label>
                                            <small class="text-red">*tambahkan angka 1 lalu hapus</small>
                                            <input type="number" class="form-control total-nilai6" id="total_insentif" name="total_insentif">
                                        </div>

                                        <div class="mb-2">
                                            <label for="">TOTAL PENDAPATAN BRUTO / BULAN</label>
                                            <input type="number" class="form-control total-nilai7" id="total_pendapatan" name="total_pendapatan">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-chart-pie mr"></i>Pengurangan
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-2">
                                            <label for="">Terlambat</label>
                                            <input type="number" class="form-control nilai-input4" id="terlambat" name="terlambat">
                                        </div>
                                        <div class="mb-2">
                                            <label for="">Cuti Bersama</label>
                                            <input type="number" class="form-control nilai-input4" id="cuti_bersama" name="cuti_bersama">
                                        </div>
                                        <div class="mb-2">
                                            <label for="">CUTI</label>
                                            <input type="number" class="form-control nilai-input4" id="cuti" name="cuti">
                                        </div>
                                        <div class="mb-2">
                                            <label for="">Sakit</label>
                                            <input type="number" class="form-control nilai-input4" id="sakit" name="sakit">
                                        </div>
                                        <div class="mb-2">
                                            <label for="">IZIN</label>
                                            <input type="number" class="form-control nilai-input4" id="izin" name="izin">
                                        </div>
                                        <div class="mb-2">
                                            <label for="">Alpha</label>
                                            <input type="number" class="form-control nilai-input4" id="alpa" name="alpha">
                                        </div>
                                        <div class="mb-2">
                                            <label for="">Pinjaman</label>
                                            <input type="number" class="form-control nilai-input4" id="pinjaman" name="pinjaman">
                                        </div>
                                        <div class="mb-2">
                                            <label for="">BPJS KESEHATAN Ditanggung Karyawan 1%</label>
                                            <input type="number" class="form-control nilai-input4" id="bpjs_karyawan" name="bpjs_karyawan">
                                        </div>
                                        <div class="mb-2">
                                            <label for="">BPJS KETENAGAKERJAAN Ditanggung Karyawan 2.00%</label>
                                            <input type="number" class="form-control nilai-input4" id="ditanggung_karyawan" name="ditanggung_karyawan">
                                        </div>
                                        <div class="mb-2">
                                            <label for="">TOTAL PENGURANGAN</label>
                                            <input type="number" class="form-control total-nilai4" id="total_pengurangan" name="total_pengurangan">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-2">
                                            <label for="">JKK 0.24%</label>
                                            <input type="number" class="form-control" id="jkk" name="jkk">
                                        </div>
                                        <div class="mb-2">
                                            <label for="">JKM 0.30%</label>
                                            <input type="number" class="form-control" id="jkm" name="jkm">
                                        </div>
                                        <div class="mb-2">
                                            <label for="">JHT 3.7%</label>
                                            <input type="number" class="form-control" id="jht_37" name="jht_37">
                                        </div>
                                        <div class="mb-2">
                                            <label for="">BPJS KESEHATAN Ditanggung Perusahaan 4%</label>
                                            <input type="number" class="form-control" id="bpjs_perusahaan" name="bpjs_perusahaan">
                                        </div>
                                        <div class="mb-2">
                                            <label for="">BPJS KETENAGAKERJAAN Ditanggung Perusahaan 4.24%</label>
                                            <input type="number" class="form-control" id="ditanggung_perusahaan" name="ditanggung_perusahaan">
                                        </div>
                                        <div class="mb-2">
                                            <label for="">TOTAL GAJI BERSIH</label>
                                            <input type="number" class="form-control total-nilai9" id="total_gaji_bersih" name="total_gaji_bersih">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row d-flex justify-content-end">
                                    <div class="col-auto">
                                        <button type="submit" name="submit" class="btn btn-lg btn-primary" onclick="return confirmSave();">Simpan</button>
                                        <button type="reset" class="btn btn-lg btn-danger" onclick="return confirmReset();">Reset</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </section>
            </div>
        </div>
    </section>
    <aside class="control-sidebar control-sidebar-dark">
    </aside>
</div>
<!-- untuk mencari total gaji bersih -->
<script>
    // JavaScript code
    document.addEventListener("DOMContentLoaded", function() {
        // Function to update the value of total-nilai9
        function updateTotalGajiBersih() {
            const totalNilai7 = parseFloat(document.querySelector(".total-nilai7").value) || 0;
            const totalNilai4 = parseFloat(document.querySelector(".total-nilai4").value) || 0;
            const totalGajiBersih = totalNilai7 - totalNilai4;
            document.querySelector(".total-nilai9").value = totalGajiBersih.toFixed(); // Display with 2 decimal places
        }

        // Call the updateTotalGajiBersih function when the page loads
        updateTotalGajiBersih();

        // Call the updateTotalGajiBersih function whenever values in total-nilai7 and total-nilai4 change
        document.querySelector(".total-nilai7").addEventListener("input", updateTotalGajiBersih);
        document.querySelector(".total-nilai4").addEventListener("input", updateTotalGajiBersih);
    });
</script>

<!-- untuk menampilkan total bruno-->
<script>
    // JavaScript code
    document.addEventListener("DOMContentLoaded", function() {
        // Function to update the value of total-nilai7
        function updateTotalPendapatan() {
            const nilai2 = parseFloat(document.querySelector(".total-nilai2").value) || 0;
            const nilai6 = parseFloat(document.querySelector(".total-nilai6").value) || 0;
            const totalPendapatan = nilai2 + nilai6;
            document.querySelector(".total-nilai7").value = totalPendapatan.toFixed(); // Display with 2 decimal places
        }

        // Call the updateTotalPendapatan function when the page loads
        updateTotalPendapatan();

        // Call the updateTotalPendapatan function whenever values in total-nilai2 and total-nilai6 change
        document.querySelector(".total-nilai2").addEventListener("input", updateTotalPendapatan);
        document.querySelector(".total-nilai6").addEventListener("input", updateTotalPendapatan);
    });
</script>
<!-- untuk mendapatkan total gaji bulanan + tunjangan diluar gaji -->
<!-- Add this script at the end of your HTML body or in a separate JS file -->
<script>
    class TotalNilaiCalculator {
        constructor() {
            this.totalNilaiInput = document.getElementById("total_gaji");
            this.totalNilai1Input = document.getElementById("total_tunjangan");
            this.totalNilai2Input = document.getElementById("total_gaji_tunjangan");

            this.attachEventListeners();
        }

        attachEventListeners() {
            this.totalNilaiInput.addEventListener("input", this.calculateTotalNilai2.bind(this));
            this.totalNilai1Input.addEventListener("input", this.calculateTotalNilai2.bind(this));
        }

        calculateTotalNilai2() {
            const totalNilai = parseFloat(this.totalNilaiInput.value) || 0;
            const totalNilai1 = parseFloat(this.totalNilai1Input.value) || 0;
            const totalNilai2 = totalNilai + totalNilai1;

            this.totalNilai2Input.value = totalNilai2.toFixed();
        }
    }

    // Create an instance of the class when the document is ready
    document.addEventListener("DOMContentLoaded", function() {
        new TotalNilaiCalculator();
    });
</script>
<!-- Add this script at the end of your HTML body or in a separate JS file -->
<script>
    class TotalNilai6Calculator {
        constructor() {
            this.nilaiInput6Elements = document.querySelectorAll(".nilai-input6");
            this.totalNilai6Input = document.getElementById("total_insentif");

            this.attachEventListeners();
        }

        attachEventListeners() {
            this.nilaiInput6Elements.forEach((input) => {
                input.addEventListener("input", this.calculateTotalNilai6.bind(this));
            });
        }

        calculateTotalNilai6() {
            let totalNilai6 = 0;
            this.nilaiInput6Elements.forEach((input) => {
                const value = parseFloat(input.value) || 0;
                totalNilai6 += value;
            });

            this.totalNilai6Input.value = totalNilai6;
        }
    }

    // Create an instance of the class when the document is ready
    document.addEventListener("DOMContentLoaded", function() {
        new TotalNilai6Calculator();
    });
</script>





<script>
    function confirmSave() {
        return confirm("Apakah Anda yakin semua data sudah benar?");
    }

    function confirmReset() {
        return confirm("Apakah Anda yakin ingin RESET SEMUA DATA?");
    }
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
<script>
    // Mendapatkan elemen input nilai
    const nilaiInputs1 = document.querySelectorAll('.nilai-input1');

    // Mendapatkan elemen input total nilai
    const totalNilaiInput1 = document.querySelector('.total-nilai1');

    // Menghitung total nilai
    function hitungTotalNilai() {
        let totalNilai = 0;

        // Meloopi setiap input nilai dan menjumlahkannya
        nilaiInputs1.forEach(input => {
            const nilai = parseFloat(input.value) || 0;
            totalNilai += nilai;
        });

        // Mengatur nilai total pada input total nilai
        totalNilaiInput1.value = totalNilai;
    }

    // Menjalankan fungsi hitungTotalNilai saat input nilai berubah
    nilaiInputs1.forEach(input => {
        input.addEventListener('input', hitungTotalNilai);
    });
</script>
<script>
    // Mendapatkan elemen input nilai
    const nilaiInputs4 = document.querySelectorAll('.nilai-input4');

    // Mendapatkan elemen input total nilai
    const totalNilaiInput4 = document.querySelector('.total-nilai4');

    // Menghitung total nilai
    function hitungTotalNilai() {
        let totalNilai = 0;

        // Meloopi setiap input nilai dan menjumlahkannya
        nilaiInputs4.forEach(input => {
            const nilai = parseFloat(input.value) || 0;
            totalNilai += nilai;
        });

        // Mengatur nilai total pada input total nilai
        totalNilaiInput4.value = totalNilai;
    }

    // Menjalankan fungsi hitungTotalNilai saat input nilai berubah
    nilaiInputs4.forEach(input => {
        input.addEventListener('input', hitungTotalNilai);
    });
</script>
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
</body>

</html>