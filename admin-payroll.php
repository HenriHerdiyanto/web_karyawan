<?php
include "controller/koneksi.php";
require_once 'header.php';
$link = "getPayrollAdmin";
$data_payroll = getRegistran($link);
// var_dump($data_payroll);

?>
<style>
    /* label {
        margin-right: 70%;
    } */
</style>
<div class="content-wrapper" style="height: max-content;">
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="row">
                    <div class="col">
                        <h1 class="m-3">Gaji Karyawan</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <section class="col-lg-12 col-sm-12 connectedSortable">
                    <div class="card">
                        <?php
                        if ($data_payroll == null) { ?>
                            <div class="card-body">
                                <div class="tab-content p-0 table-responsive">
                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Lengkap</th>
                                                <th>Jabatan</th>
                                                <th>Pendidikan</th>
                                                <th>Cabang</th>
                                                <th>Total Gaji Bersih</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="9" align="center">Data Kosong</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="card-header">
                                <h2>Data Payroll</h2>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Lengkap</th>
                                                <th class="text-center">Jabatan</th>
                                                <th class="text-center">Pendidikan</th>
                                                <th class="text-center">Cabang</th>
                                                <th class="text-center">Total Gaji Bersih</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($data_payroll->data as $array_item) :
                                                $gaji = $array_item->total_gaji_bersih;
                                                $formatted_gaji = number_format($gaji, 0, ",", ".");
                                            ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $array_item->nama_lengkap; ?></td>
                                                    <td class="text-center"><?php echo $array_item->level_user; ?></td>
                                                    <td class="text-center"><?php echo $array_item->pendidikan; ?></td>
                                                    <td class="text-center"><?php echo $array_item->cabang; ?></td>
                                                    <td class="text-center">Rp.<?php echo $formatted_gaji; ?></td>
                                                    <td class="text-center">
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="staticBackdrop<?php echo $array_item->id_karyawan ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-xl">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Detail Payrol</h1>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="" method="POST">
                                                                            <div class="card col-lg-12">
                                                                                <div class="card-header">
                                                                                    <h3 class="card-title"><i class="fas fa-user mr"></i> Data Pribadi
                                                                                </div>
                                                                                <div class="card-body">
                                                                                    <div class="tab-content p-0">
                                                                                        <div class="row">
                                                                                            <div class="col-lg-6">
                                                                                                <div class="mb-2">
                                                                                                    <input type="hidden" name="id_karyawan" value="<?= $array_item->id_karyawan ?>">
                                                                                                    <input type="hidden" name="id_divisi" value="<?= $array_item->id_divisi ?>">
                                                                                                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                                                                                    <input type="text" class="form-control text-center" id="nama_lengkap" name="nama_lengkap" value="<?= $array_item->nama_lengkap; ?>" readonly>
                                                                                                </div>
                                                                                                <div class="mb-2">
                                                                                                    <label for="level_user" class="form-label">Jabatan</label>
                                                                                                    <input type="text" class="form-control text-center" id="level_user" name="level_user" value="<?= $array_item->level_user; ?>" readonly>
                                                                                                </div>
                                                                                                <div class="mb-2">
                                                                                                    <label for="pendidikan" class="form-label">Pendidikan</label>
                                                                                                    <input type="text" class="form-control text-center" id="pendidikan" value="<?= $array_item->pendidikan; ?>" name="pendidikan" required>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-lg-6">
                                                                                                <div class="mb-2">
                                                                                                    <label for="status_ptkp" class="form-label">Status PTKP</label>
                                                                                                    <input type="text" class="form-control text-center" id="status_ptkp" value="<?= $array_item->status_ptkp; ?>" name="status_ptkp" required>
                                                                                                </div>
                                                                                                <div class="mb-2">
                                                                                                    <label for="cabang" class="form-label">Cabang</label>
                                                                                                    <input type="text" class="form-control text-center" id="cabang" value="<?= $array_item->cabang; ?>" name="cabang" required>
                                                                                                </div>
                                                                                                <div class="mb-2">
                                                                                                    <label for="group" class="form-label">Group</label>
                                                                                                    <input type="text" class="form-control text-center" id="group" value="<?= $array_item->group_payroll; ?>" name="group_payroll" required>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="card">
                                                                                <div class="card-header">
                                                                                    <h3 class="card-title"><i class="fas fa-chart-pie mr"></i> Tunjangan Jabatan
                                                                                </div>
                                                                                <div class="card-body">
                                                                                    <div class="row">
                                                                                        <div class="col-lg-6">
                                                                                            <div class="mb-2">
                                                                                                <label for="gaji_pokok" class="form-label">GAJI POKOK</label>
                                                                                                <input type="number" value="<?= $array_item->gaji_pokok; ?>" class="form-control nilai-input text-center" id="gaji_pokok" name="gaji_pokok" required>
                                                                                            </div>
                                                                                            <div class="mb-2">
                                                                                                <label for="tempat_kerja" class="form-label">Tempat Bekerja</label>
                                                                                                <input type="text" value="<?= $array_item->tempat_kerja; ?>" class="form-control text-center" id="tempat_kerja " name="tempat_kerja" placeholder="HO / CGK / PIK / BALI / YAO / CKR" required>
                                                                                            </div>
                                                                                            <div class="mb-2">
                                                                                                <label for="besar_tunjangan" class="form-label">Besar Tunjangan Jabatan</label>
                                                                                                <input type="number" value="<?= $array_item->besar_tunjangan; ?>" class="form-control nilai-input text-center" id="besar_tunjangan" name="besar_tunjangan" required>
                                                                                            </div>
                                                                                            <div class="mb-2">
                                                                                                <label for="tunjangan_pulsa" class="form-label">Tunjangan Pulsa</label>
                                                                                                <input type="number" value="<?= $array_item->tunjangan_pulsa; ?>" class="form-control nilai-input text-center" id="tunjangan_pulsa" name="tunjangan_pulsa" required>
                                                                                            </div>
                                                                                            <div class="mb-2">
                                                                                                <label for="lain_lain" class="form-label">Tunjangan Lain-lain</label>
                                                                                                <input type="number" value="<?= $array_item->lain_lain; ?>" class="form-control nilai-input text-center" id="lain_lain" name="lain_lain" required>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-lg-6">
                                                                                            <div class="mb-2">
                                                                                                <label for="tunjangan_pendidikan" class="form-label">Tunjangan Pendidikan</label>
                                                                                                <input type="number" value="<?= $array_item->tunjangan_pendidikan; ?>" class="form-control nilai-input text-center" id="tunjangan_pendidikan" name="tunjangan_pendidikan" required>
                                                                                            </div>
                                                                                            <div class="mb-2">
                                                                                                <label for="uang_makan" class="form-label">Uang Makan</label>
                                                                                                <input type="number" value="<?= $array_item->uang_makan; ?>" class="form-control nilai-input text-center" id="uang_makan" name="uang_makan" required>
                                                                                            </div>
                                                                                            <div class="mb-2">
                                                                                                <label for="uang_transport" class="form-label">Uang Transport</label>
                                                                                                <input type="number" value="<?= $array_item->uang_transport; ?>" class="form-control nilai-input text-center" id="uang_transport" name="uang_transport" required>
                                                                                            </div>
                                                                                            <div class="mb-2">
                                                                                                <label for="total_gaji" class="form-label">TOTAL GAJI BULANAN</label>
                                                                                                <input type="number" value="<?= $array_item->total_gaji; ?>" class="form-control total-nilai text-center" readonly required>
                                                                                            </div>
                                                                                            <div class="mb-2">
                                                                                                <small class="text-red">*Masukan Kembali Total Gaji Bulanan Diatas</small>
                                                                                                <input type="number" value="<?= $array_item->total_gaji; ?>" class="form-control total-nilai text-center" id="total_gaji" name="total_gaji" required>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="card">
                                                                                <div class="card-header">
                                                                                    <h3 class="card-title"><i class="fas fa-chart-pie mr"></i> Pendapatan
                                                                                </div>
                                                                                <div class="card-body">
                                                                                    <div class="row">
                                                                                        <div class="col-lg-6">
                                                                                            <div class="mb-2">
                                                                                                <label for="lembur">Lembur</label>
                                                                                                <input type="number" value="<?= $array_item->lembur; ?>" class="form-control nilai-input1 text-center" id="lembur" name="lembur" required>
                                                                                            </div>
                                                                                            <div class="mb-2">
                                                                                                <label for="dinas">Dinas</label>
                                                                                                <input type="number" value="<?= $array_item->dinas; ?>" class="form-control nilai-input1 text-center" id="dinas" name="dinas" required>
                                                                                            </div>
                                                                                            <div class="mb-2">
                                                                                                <label for="cuti_tahunan">Cuti Tahunan</label>
                                                                                                <input type="number" value="<?= $array_item->cuti_tahunan; ?>" class="form-control nilai-input1 text-center" id="cuti_tahunan" name="cuti_tahunan" required>
                                                                                            </div>
                                                                                            <div class="mb-2">
                                                                                                <label for="thr">THR</label>
                                                                                                <input type="number" value="<?= $array_item->thr; ?>" class="form-control nilai-input1 text-center" id="thr" name="thr" required>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-lg-6">
                                                                                            <div class="mb-2">
                                                                                                <label for="total_tunjangan">Total Tunjangan Di Luar Gaji</label>
                                                                                                <input type="number" value="<?= $array_item->total_tunjangan; ?>" class="form-control total-nilai1 text-center" readonly required>
                                                                                            </div>
                                                                                            <div class="mb-2">
                                                                                                <small class="text-red">*Masukan Kembali Tunjangan Di Luar Gaji Diatas</small>
                                                                                                <input type="number" value="<?= $array_item->total_tunjangan; ?>" class="form-control total-nilai1 text-center" id="total_tunjangan" name="total_tunjangan" required>
                                                                                            </div>
                                                                                            <div class="mb-2">
                                                                                                <label for="total_gaji_tunjangan">Total Gaji + Tunjangan Di Luar Gaji</label>
                                                                                                <input type="number" value="<?= $array_item->total_gaji_tunjangan; ?>" class="form-control total-nilai2 text-center" id="total_gaji_tunjangan" name="total_gaji_tunjangan" required>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="card">
                                                                                <div class="card-header">
                                                                                    <h3 class="card-title"><i class="fas fa-chart-pie mr"></i> Insentif ( setiap tanggal 15 )
                                                                                </div>
                                                                                <div class="card-body">
                                                                                    <div class="row">
                                                                                        <div class="col-lg-6">
                                                                                            <div class="mb-2">
                                                                                                <label for="">REFERAL CLIENT-5%</label>
                                                                                                <input type="number" value="<?= $array_item->referal_client; ?>" class="form-control nilai-input6 text-center" id="referal_client" name="referal_client" required>
                                                                                            </div>
                                                                                            <div class="mb-2">
                                                                                                <label for="">INSENTIF KK-5%</label>
                                                                                                <input type="number" value="<?= $array_item->insentif_kk; ?>" class="form-control nilai-input6 text-center" id="insentif_kk" name="insentif_kk" required>
                                                                                            </div>
                                                                                            <div class="mb-2">
                                                                                                <label for="">INSENTIF SPV-1%</label>
                                                                                                <input type="number" value="<?= $array_item->insentif_spv; ?>" class="form-control nilai-input6 text-center" id="insentif_spv" name="insentif_spv" required>
                                                                                            </div>
                                                                                            <div class="mb-2">
                                                                                                <label for="">INSENTIF STAFF-2%</label>
                                                                                                <input type="number" value="<?= $array_item->insentif_staff; ?>" class="form-control nilai-input6 text-center" id="insentif_staff" name="insentif_staff" required>
                                                                                            </div>
                                                                                            <div class="mb-2">
                                                                                                <label for="">INSENTIF SPT OP</label>
                                                                                                <input type="number" value="<?= $array_item->insentif_spt_op; ?>" class="form-control nilai-input6 text-center" id="insentif_spt_op" name="insentif_spt_op" required>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-lg-6">
                                                                                            <div class="mb-2">
                                                                                                <label for="">INSENTIF SPT BADAN</label>
                                                                                                <input type="number" value="<?= $array_item->insentif_spt_badan; ?>" class="form-control nilai-input6 text-center" id="insentif_spt_badan" name="insentif_spt_badan" required>
                                                                                            </div>
                                                                                            <div class="mb-2">
                                                                                                <label for="">INSENTIF SPT</label>
                                                                                                <input type="number" value="<?= $array_item->insentif_spt; ?>" class="form-control nilai-input6 text-center" id="insentif_spt" name="insentif_spt" required>
                                                                                            </div>
                                                                                            <div class="mb-2">
                                                                                                <label for="">KOMISI MARKETING</label>
                                                                                                <input type="number" value="<?= $array_item->komisi_marketing; ?>" class="form-control nilai-input6 text-center" id="komisi_marketing" name="komisi_marketing" required>
                                                                                            </div>
                                                                                            <div class="mb-2">
                                                                                                <label for="total_insentif">TOTAL INSENTIF DAN KOMISI LAINNYA - PAYMENT PERTENGAHAN BULAN</label>
                                                                                                <input type="number" value="<?= $array_item->total_insentif; ?>" class="form-control total-nilai6 text-center" readonly required>
                                                                                            </div>
                                                                                            <div class="mb-2">
                                                                                                <small class="text-red">*Masukan Kembali TOTAL INSENTIF DAN KOMISI LAINNYA - PAYMENT PERTENGAHAN BULAN diatas</small>
                                                                                                <input type="number" value="<?= $array_item->total_insentif; ?>" class="form-control text-center" id="total_insentif" name="total_insentif" required>
                                                                                            </div>
                                                                                            <div class="mb-2">
                                                                                                <label for="total_pendapatan">TOTAL PENDAPATAN BRUTO / BULAN</label>
                                                                                                <input type="number" value="<?= $array_item->total_pendapatan; ?>" class="form-control total-nilai7 text-center" id="total_pendapatan" name="total_pendapatan" required>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="card">
                                                                                <div class="card-header">
                                                                                    <h3 class="card-title"><i class="fas fa-chart-pie mr"></i> Pengurangan
                                                                                </div>
                                                                                <div class="card-body">
                                                                                    <div class="row">
                                                                                        <div class="col-lg-6">
                                                                                            <div class="mb-2">
                                                                                                <label for="">Terlambat</label>
                                                                                                <input type="number" value="<?= $array_item->terlambat; ?>" class="form-control nilai-input4 text-center" id="terlambat" name="terlambat" required>
                                                                                            </div>
                                                                                            <div class="mb-2">
                                                                                                <label for="">Cuti Bersama</label>
                                                                                                <input type="number" value="<?= $array_item->cuti_bersama; ?>" class="form-control nilai-input4 text-center" id="cuti_bersama" name="cuti_bersama" required>
                                                                                            </div>
                                                                                            <div class="mb-2">
                                                                                                <label for="">CUTI</label>
                                                                                                <input type="number" value="<?= $array_item->cuti; ?>" class="form-control nilai-input4 text-center" id="cuti" name="cuti" required>
                                                                                            </div>
                                                                                            <div class="mb-2">
                                                                                                <label for="">Sakit</label>
                                                                                                <input type="number" value="<?= $array_item->sakit; ?>" class="form-control nilai-input4 text-center" id="sakit" name="sakit" required>
                                                                                            </div>
                                                                                            <div class="mb-2">
                                                                                                <label for="">IZIN</label>
                                                                                                <input type="number" value="<?= $array_item->izin; ?>" class="form-control nilai-input4 text-center" id="izin" name="izin" required>
                                                                                            </div>
                                                                                            <div class="mb-2">
                                                                                                <label for="">Alpha</label>
                                                                                                <input type="number" value="<?= $array_item->alpha; ?>" class="form-control nilai-input4 text-center" id="alpa" name="alpha" required>
                                                                                            </div>
                                                                                            <div class="mb-2">
                                                                                                <label for="">Pinjaman</label>
                                                                                                <input type="number" value="<?= $array_item->pinjaman; ?>" class="form-control nilai-input4 text-center" id="pinjaman" name="pinjaman" required>
                                                                                            </div>
                                                                                            <div class="mb-2">
                                                                                                <label for="">BPJS KESEHATAN Ditanggung Karyawan 1%</label>
                                                                                                <input type="number" value="<?= $array_item->bpjs_karyawan; ?>" class="form-control nilai-input4 text-center" id="bpjs_karyawan" name="bpjs_karyawan" required>
                                                                                            </div>
                                                                                            <div class="mb-2">
                                                                                                <label for="">BPJS KETENAGAKERJAAN Ditanggung Karyawan 2.00%</label>
                                                                                                <input type="number" value="<?= $array_item->ditanggung_karyawan; ?>" class="form-control nilai-input4 text-center" id="ditanggung_karyawan" name="ditanggung_karyawan" required>
                                                                                            </div>
                                                                                            <div class="mb-2">
                                                                                                <label for="">TOTAL PENGURANGAN</label>
                                                                                                <input type="number" value="<?= $array_item->total_pengurangan; ?>" class="form-control total-nilai4 text-center" readonly required>
                                                                                            </div>
                                                                                            <div class="mb-2">
                                                                                                <small class="text-red">*Masukan TOTAL PENGURANGAN diatas</small>
                                                                                                <input type="number" value="<?= $array_item->total_pengurangan; ?>" class="form-control total-nilai4 text-center" id="total_pengurangan" name="total_pengurangan" required>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-lg-6">
                                                                                            <div class="mb-2">
                                                                                                <label for="">JKK 0.24%</label>
                                                                                                <input type="number" value="<?= $array_item->jkk; ?>" class="form-control nilai-input10 text-center" id="jkk" name="jkk" required>
                                                                                            </div>
                                                                                            <div class="mb-2">
                                                                                                <label for="">JKM 0.30%</label>
                                                                                                <input type="number" value="<?= $array_item->jkm; ?>" class="form-control nilai-input10 text-center" id="jkm" name="jkm" required>
                                                                                            </div>
                                                                                            <div class="mb-2">
                                                                                                <label for="">JHT 3.7%</label>
                                                                                                <input type="number" value="<?= $array_item->jht_37; ?>" class="form-control nilai-input10 text-center" id="jht_37" name="jht_37" required>
                                                                                            </div>
                                                                                            <div class="mb-2">
                                                                                                <label for="">BPJS KESEHATAN Ditanggung Perusahaan 4%</label>
                                                                                                <input type="number" value="<?= $array_item->bpjs_perusahaan; ?>" class="form-control nilai-input10 text-center" id="bpjs_perusahaan" name="bpjs_perusahaan" required>
                                                                                            </div>
                                                                                            <div class="mb-2">
                                                                                                <label for="">BPJS KETENAGAKERJAAN Ditanggung Perusahaan 4.24%</label>
                                                                                                <input type="number" value="<?= $array_item->ditanggung_perusahaan; ?>" class="form-control total-nilai10 text-center" id="ditanggung_perusahaan" name="ditanggung_perusahaan" required>
                                                                                            </div>
                                                                                            <div class="mb-2">
                                                                                                <label for="">TOTAL GAJI BERSIH</label>
                                                                                                <input type="number" value="<?= $array_item->total_gaji_bersih; ?>" class="form-control total-nilai9 text-center" id="total_gaji_bersih" name="total_gaji_bersih" required>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="card-footer">
                                                                                    <div class="row d-flex justify-content-end">
                                                                                        <div class="col-auto">
                                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                                            <button type="button" class="btn btn-primary">Understood</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $array_item->id_karyawan ?>">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <form method="post">
                                                            <!-- <a href="karyawan_detail.php?id=<?php echo $array_item->id_karyawan ?>" class="btn-sm btn btn-warning" data-bs-toggle="tooltip" title="Detail">
                                                                    <i class="fas fa-eye"></i>
                                                                </a> -->
                                                            <input type="hidden" name="id_karyawan" value="<?php echo $array_item->id_karyawan; ?>">
                                                            <button class="btn btn-danger btn-sm m-1" onclick="return confirm('Apakah anda yakin ingin menghapus data?')" type="submit" data-bs-toggle="tooltip" title="Hapus" name="delete">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        <?php }
                        ?>
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
</body>

</html>