<?php
include "controller/koneksi.php";
require_once 'header-staff.php';

$link = "getKaryawanById&id_karyawan=" . urlencode($id_karyawan);
$profile = getRegistran($link);
$nama_lengkap = $profile->data[0]->nama_lengkap;
var_dump($profile);
$link2 = "getSOPid&id_divisi=" . urlencode($id_divisi);
$data_sop = getRegistran($link2);
// var_dump($data_sop);

?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="row">
                    <div class="col">
                        <h1 class="m-3">Absen Karyawan</h1>
                    </div>
                    <div align="end" class="col mt-2 mr-3">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-lg btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $id_karyawan ?>">
                            <i class="nav-icon fas fa-book-open"></i> ABSEN
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal<?php echo $id_karyawan ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">ABSEN KARYAWAN</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">






                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
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
                        </div><!-- /.card-header -->
                        <div class="card-body text-center">
                            <div class="tab-content p-0">
                                <h1>Form Absensi Karyawan</h1>
                                <form>
                                    <!-- <label for="barcodeInput">Barcode:</label> -->
                                    <input type="hidden" id="barcodeInput" readonly>
                                    <input type="button" value="Generate Barcode" onclick="generateBarcode()">
                                    <input type="submit" value="Submit">
                                </form>
                                <canvas id="barcodeCanvas" style="display: none;"></canvas> <!-- Baris ini untuk menggenerate barcode dan menyembunyikannya -->
                                <img id="barcodeImage" src="" style="display: none;"> <!-- Baris ini untuk menampilkan gambar barcode -->
                                <script>
                                    const namaLengkap = <?php echo json_encode($nama_lengkap); ?>; // Mendapatkan nilai $nama_lengkap dari server PHP

                                    function getCurrentDateTime() {
                                        const currentDate = new Date();
                                        const year = currentDate.getFullYear();
                                        const month = String(currentDate.getMonth() + 1).padStart(2, '0');
                                        const day = String(currentDate.getDate()).padStart(2, '0');
                                        const hours = String(currentDate.getHours()).padStart(2, '0');
                                        const minutes = String(currentDate.getMinutes()).padStart(2, '0');
                                        const seconds = String(currentDate.getSeconds()).padStart(2, '0');

                                        return `${year}-${month}-${day}_${hours}:${minutes}:${seconds}`;
                                    }

                                    function generateBarcode() {
                                        const apiBaseUrl = 'https://barcode.tec-it.com/barcode.ashx?data=';
                                        const currentDateTime = getCurrentDateTime();
                                        const barcodeValue = `${namaLengkap}_${currentDateTime}`;
                                        const barcodeType = 'CODE128';
                                        const barcodeSize = '50x50'; // Ukuran gambar barcode
                                        const barcodeImageURL = `${apiBaseUrl}${barcodeValue}&code=${barcodeType}&dpi=96&unit=Fit&format=png&rotation=0&align=Center&color=000000&bgcolor=FFFFFF&code=${barcodeType}&modulewidth=0.3&paddingleft=10&paddingright=10&paddingtop=10&paddingbottom=10&size=${barcodeSize}`;

                                        document.getElementById('barcodeInput').value = barcodeValue;

                                        // Generate barcode secara visual menggunakan JsBarcode
                                        const barcodeCanvas = document.getElementById('barcodeCanvas');
                                        JsBarcode(barcodeCanvas, barcodeValue, {
                                            format: "CODE128",
                                            displayValue: false,
                                            fontSize: 20,
                                            height: 50,
                                        });

                                        // Ubah gambar menjadi data URL dan tampilkan di elemen <img>
                                        const barcodeImage = document.getElementById('barcodeImage');
                                        const canvas = document.createElement('canvas');
                                        canvas.width = barcodeCanvas.width;
                                        canvas.height = barcodeCanvas.height;
                                        const ctx = canvas.getContext('2d');
                                        ctx.drawImage(barcodeCanvas, 0, 0, canvas.width, canvas.height);
                                        barcodeImage.src = canvas.toDataURL('image/png');
                                        barcodeImage.style.display = 'inline'; // Tampilkan gambar setelah selesai generate
                                    }

                                    // Handler saat form disubmit
                                    document.querySelector('form').addEventListener('submit', function(event) {
                                        event.preventDefault();
                                        const barcodeValue = document.getElementById('barcodeInput').value;
                                        // Lakukan proses absensi sesuai dengan barcodeValue, seperti mengirim ke server atau menyimpan ke database.
                                        alert('Karyawan dengan barcode ' + barcodeValue + ' telah melakukan absensi.');
                                    });
                                </script>
                            </div>
                        </div><!-- /.card-body -->
                    </div>
                </section>
            </div>
        </div>
    </section>
</div>
<aside class="control-sidebar control-sidebar-dark">
</aside>
</div>
<!-- script barcode -->
<script src="https://cdn.jsdelivr.net/npm/instascan@1.0.0/instascan.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uuid@8.3.2/dist/umd/uuidv4.min.js"></script>
<!-- Tambahkan library JsBarcode melalui CDN -->
<!-- tutup script barcode -->

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