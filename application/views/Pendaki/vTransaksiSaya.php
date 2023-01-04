<div class="hero hero-inner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mx-auto text-center">
                <div class="intro-wrap">
                    <h1 class="mb-0">Transaksi Saya</h1>
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
                        <h2 class="section-title mb-4">Informasi Transaksi Sewa Alat Pendakian</h2>
                        <table class="table">
                            <?php
                            foreach ($transaksi_sewa as $key => $value) {
                            ?>
                                <tr>
                                    <td>
                                        <h5>Tanggal Transaksi. </h5>
                                    </td>
                                    <td>
                                        <h5><strong><?= $value->tgl_sewa ?></strong></h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Atas Nama</p>
                                    </td>
                                    <td><?= $value->nama_pendaki ?></td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>No Telepon</p>
                                    </td>
                                    <td><?= $value->no_hp_pendaki ?></td>
                                </tr>
                                <tr>
                                    <td>Total Pembayaran Sewa.</td>
                                    <td>Rp. <?= number_format($value->total_sewa) ?></td>
                                </tr>
                                <tr>
                                    <td>Status Sewa</td>
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
                                <tr>
                                    <td>&nbsp;</td>
                                    <td><a class="btn btn-success" href="<?= base_url('pendaki/cTransaksiSaya/detail_sewa/' . $value->id_sewa) ?>">Detail Transaksi</a></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="col-lg-6">
        <div class="untree_co-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 pl-lg-5 ml-auto">
                        <h2 class="section-title mb-4">Informasi Transaksi Boking Guide dan Porter</h2>
                        <table class="table">
                            <?php
                            foreach ($transaksi_boking as $key => $value) {
                            ?>
                                <tr>
                                    <td>
                                        <h5>Tanggal Transaksi. </h5>
                                    </td>
                                    <td>
                                        <h5><strong><?= $value->tgl_boking ?></strong></h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Atas Nama</p>
                                    </td>
                                    <td><?= $value->nama_pendaki ?></td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>No Telepon</p>
                                    </td>
                                    <td><?= $value->no_hp_pendaki ?></td>
                                </tr>
                                <tr>
                                    <td>Total Pembayaran Sewa.</td>
                                    <td>Rp. <?= number_format($value->total_bayar) ?></td>
                                </tr>
                                <tr>
                                    <td>Status Boking</td>
                                    <td><?php if ($value->stat_pem_dp == '0' && $value->stat_pem_all == '0' && $value->status_pendakian == '0') {
                                        ?>
                                            <span class="badge badge-danger">Belum Bayar</span>
                                        <?php
                                        } else if ($value->stat_pem_dp != '0' && $value->stat_pem_all == '0' && $value->status_pendakian == '0') {
                                        ?>
                                            <span class="badge badge-warning">Belum Melakukan Pelunasan Pembayaran</span>
                                        <?php
                                        } else if ($value->stat_pem_dp != '0' && $value->stat_pem_all != '0' && $value->status_pendakian == '0') {
                                        ?>
                                            <span class="badge badge-info">Menunggu Konfirmasi</span>
                                        <?php
                                        } else if ($value->status_pendakian == '1') {
                                        ?>
                                            <span class="badge badge-success">Selesai</span>
                                        <?php
                                        } ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td><a class="btn btn-success" href="<?= base_url('pendaki/cTransaksiSaya/detail_boking/' . $value->id_boking) ?>">Detail Transaksi</a></td>
                                </tr>
                                <hr>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
</div>