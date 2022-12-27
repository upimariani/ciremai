<div class="hero hero-inner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mx-auto text-center">
                <div class="intro-wrap">
                    <h1 class="mb-0">Transaksi Saya</h1>
                    <p class="text-white">Berdasarkan Pasal 1548 Kitab Undang-Undang Hukum Perdata (“KUHPer”) pengertian Sewa Menyewa adalah : “Sewa menyewa adalah suatu persetujuan, dengan mana pihak yang satu mengikatkan diri untuk memberikan kenikmatan suatu barang kepada pihak yang lain selama waktu tertentu, dengan pembayaran suatu harga yang disanggupi </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row ml-5 mr-5">
    <div class="col-lg-12">
        <div class="untree_co-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 pl-lg-5 ml-auto">
                        <h2 class="section-title mb-4">Informasi Detail Sewa</h2>
                        <table class="table">
                            <tr>
                                <td>
                                    Jumlah Pendaki :
                                </td>
                                <td><?= $detail['transaksi']->jml_pendaki ?> orang</td>
                            </tr>
                            <tr>
                                <td>
                                    Subtotal Tiket :
                                </td>
                                <td>Rp.<?= number_format($detail['transaksi']->jml_pendaki * 50000)  ?></td>
                            </tr>
                            <tr>
                                <td>
                                    Total Transaksi :
                                </td>
                                <td>Rp.<?= number_format($detail['transaksi']->total_sewa)  ?></td>
                            </tr>
                        </table>


                        <div class="custom-accordion" id="accordion_1">
                            <?php
                            if ($detail['transaksi']->stat_pem_dp_sewa == '0') {
                            ?>
                                <div class="accordion-item">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Pembayaran DP?</button>
                                    </h2>

                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion_1">
                                        <div class="accordion-body">
                                            <?php echo form_open_multipart('pendaki/cTransaksiSaya/bayar_dp_sewa/' . $detail['transaksi']->id_sewa); ?>
                                            <h4>Upload Bukti Pembayaran</h4><br>
                                            <p>Transfer Via Bank BRI No. Rekening 0123-1232-02-01</p>
                                            <p>Sisa Pembayaran : Rp. <?= number_format($detail['transaksi']->total_sewa)  ?></p>
                                            <input type="text" class="form-control mb-3" name="total" placeholder="Masukkan Nominal Pembayaran...">
                                            <input type="file" name="gambar" class="form-control">
                                            <button type="submit" class="btn btn-success mb-4 mt-4">Upload</button>
                                            </form>
                                        </div>
                                    </div>
                                </div> <!-- .accordion-item -->
                            <?php
                            }
                            ?>
                            <?php
                            if ($detail['transaksi']->stat_pem_all_sewa == '0') {
                            ?>
                                <div class="accordion-item">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Pembayaran Lunas?</button>
                                    </h2>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion_1">
                                        <div class="accordion-body">
                                            <?php echo form_open_multipart('pendaki/cTransaksiSaya/bayar_all_sewa/' . $detail['transaksi']->id_sewa); ?>
                                            <h4>Upload Bukti Pembayaran</h4><br>
                                            <p>Transfer Via Bank BRI No. Rekening 0123-1232-02-01</p>
                                            <p>Sisa Pembayaran : Rp. <?= number_format($detail['transaksi']->total_sewa - $detail['transaksi']->stat_pem_dp_sewa)  ?></p>
                                            <input type="text" class="form-control mb-3" name="total" placeholder="Masukkan Nominal Pembayaran...">
                                            <input type="file" name="bukti" class="form-control">
                                            <button type="submit" class="btn btn-success mb-4 mt-4">Upload</button>
                                            </form>
                                        </div>
                                    </div>
                                </div> <!-- .accordion-item -->
                            <?php
                            }
                            ?>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Alat</th>
                                    <th>Harga</th>
                                    <th>Quantity Sewa</th>
                                    <th>Tanggal Rencana Sewa</th>
                                    <th>Tanggal Selesai Sewa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($detail['sewa'] as $key => $value) {
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $value->nama_alat ?></td>
                                        <td>Rp. <?= number_format($value->harga_sewa)  ?></td>
                                        <td><?= $value->jml_sewa ?></td>
                                        <td><?= $value->tgl_rencana_sewa ?></td>
                                        <td><?php if ($value->stat_pem_dp_sewa == '0' && $value->stat_pem_all_sewa == '0' && $value->status_sewa == '0') {
                                            ?>
                                                <span class="badge badge-danger">Belum Bayar</span>
                                            <?php
                                            } else if ($value->stat_pem_dp_sewa != '0' && $value->stat_pem_all_sewa == '0' && $value->status_sewa == '0') {
                                            ?>
                                                <span class="badge badge-warning">Belum Melakukan Pelunasan Pembayaran</span>
                                            <?php
                                            } else if ($value->stat_pem_dp_sewa != '0' && $value->stat_pem_all_sewa != '0' && $value->status_sewa == '0') {
                                            ?>
                                                <span class="badge badge-info">Menunggu Konfirmasi</span>
                                            <?php
                                            } else if ($value->status_sewa == '1') {
                                            ?>
                                                <span class="badge badge-success">Selesai</span>
                                            <?php
                                            } ?>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>

                            </tbody>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Jasa</th>
                                        <th>Tanggal Rencana Boking</th>
                                        <th>Tanggal Selesai Boking</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($detail_boking['boking'] as $key => $value) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $value->nama_jasa ?></td>
                                            <td><?= $value->tgl_rencana ?></td>
                                            <td><?php if ($value->stat_pem_dp_sewa == '0' && $value->stat_pem_all_sewa == '0' && $value->status_sewa == '0') {
                                                ?>
                                                    <span class="badge badge-danger">Belum Bayar</span>
                                                <?php
                                                } else if ($value->stat_pem_dp_sewa != '0' && $value->stat_pem_all_sewa == '0' && $value->status_sewa == '0') {
                                                ?>
                                                    <span class="badge badge-warning">Belum Melakukan Pelunasan Pembayaran</span>
                                                <?php
                                                } else if ($value->stat_pem_dp_sewa != '0' && $value->stat_pem_all_sewa != '0' && $value->status_sewa == '0') {
                                                ?>
                                                    <span class="badge badge-info">Menunggu Konfirmasi</span>
                                                <?php
                                                } else if ($value->status_sewa == '1') {
                                                ?>
                                                    <span class="badge badge-success">Selesai</span>
                                                <?php
                                                } ?>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>

                                </tbody>

                            </table>

                        </table>
                        <a class="btn btn-danger" href="<?= base_url('pendaki/cTransaksisaya') ?>">Kembali</a>
                        <a class="btn btn-warning" href="<?= base_url('pendaki/cTransaksisaya/invoice/' . $detail['transaksi']->id_sewa) ?>">Cetak Invoice</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>