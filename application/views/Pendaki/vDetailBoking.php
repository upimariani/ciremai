<div class="hero hero-inner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mx-auto text-center">
                <div class="intro-wrap">
                    <h1 class="mb-0">Detail Transaksi Boking Guide dan Porter</h1>
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
                        <?php
                        if ($error != ' ') {
                        ?>
                            <div class="alert alert-danger">
                                <h4>Informasi!</h4>
                                <p>Upload Ulang bukti pembayaran!!!</p>
                            </div>
                        <?php
                        }
                        ?>

                        <?php
                        if ($detail['transaksi_boking']->stat_jaminan == '0') {
                            echo '<div class="alert alert-success">
                            <h4>Informasi!!!</h4><p>Jaminan Belum Diterima!!!</p>
                       </div>';
                        } else if ($detail['transaksi_boking']->stat_jaminan == '1') {
                            echo '<div class="alert alert-success">
                            <h4>Informasi!!!</h4>
                            <p>Jaminan Sudah Diterima!!!</p>
                            <a href="' . base_url('Pendaki/cTransaksiSaya/jaminan_kembali/' . $detail['transaksi_boking']->id_boking) . '" class="btn btn-success">Sudah Dikembalikan</a>
                        </div>';
                        } else if ($detail['transaksi_boking']->stat_jaminan == '2') {
                            echo '<div class="alert alert-success">
                            <h4>Informasi!!!</h4> <p>Jaminan Sudah Dikembalikan!!!</p>
                        </div>';
                        }
                        ?>

                        <?php
                        if ($this->session->userdata('error')) {
                        ?>
                            <div class="alert alert-danger">
                                <p><?= $this->session->userdata('error')  ?></p>
                            </div>
                        <?php
                        }
                        ?>
                        <h2 class="section-title mb-4">Informasi Detail Boking</h2>
                        <table class="table">
                            <tr>
                                <td>
                                    Jumlah Pendaki :
                                </td>
                                <td><?= $detail['transaksi_boking']->jml_pendaki ?> orang</td>
                            </tr>
                            <tr>
                                <td>
                                    Subtotal Tiket :
                                </td>
                                <td>Rp.<?= number_format($detail['transaksi_boking']->jml_pendaki * 50000)  ?></td>
                            </tr>
                            <tr>
                                <td>
                                    Total Transaksi :
                                </td>
                                <td>Rp.<?= number_format($detail['transaksi_boking']->total_boking)  ?></td>
                            </tr>
                        </table>


                        <div class="custom-accordion" id="accordion_1">
                            <?php
                            if ($detail['transaksi_boking']->stat_pem_dp_boking == '0' && $detail['transaksi_boking']->stat_pem_all_boking == '0') {
                            ?>
                                <div class="accordion-item">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Pembayaran DP?</button>
                                    </h2>

                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion_1">
                                        <div class="accordion-body">
                                            <?php echo form_open_multipart('pendaki/cTransaksiSaya/bayar_dp_boking/' . $detail['transaksi_boking']->id_boking); ?>
                                            <h4>Upload Bukti Pembayaran</h4><br>
                                            <p>Pembayaran DP minimal pembayaran 40% dari total pembayaran</p>
                                            <p>Transfer Via Bank BRI No. Rekening 0123-1232-02-01</p>
                                            <p>Sisa Pembayaran : Rp. <?= number_format($detail['transaksi_boking']->total_boking)  ?></p>
                                            <input type="text" onkeypress="return hanyaAngka(event)" class="form-control mb-3" name="total" placeholder="Masukkan Nominal Pembayaran...">
                                            <input type="hidden" class="form-control mb-3" value="<?= $detail['transaksi_boking']->total_boking ?>" name="jml_pembayaran">
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
                            $sisa = $detail['transaksi_boking']->total_boking - $detail['transaksi_boking']->stat_pem_dp_boking - $detail['transaksi_boking']->stat_pem_all_boking;
                            if ($detail['transaksi_boking']->stat_pem_all_boking == '0' && $sisa != 0) {
                            ?>
                                <div class="accordion-item">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Pembayaran Lunas?</button>
                                    </h2>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion_1">
                                        <div class="accordion-body">
                                            <?php echo form_open_multipart('pendaki/cTransaksiSaya/bayar_all_boking/' . $detail['transaksi_boking']->id_boking); ?>
                                            <h4>Upload Bukti Pembayaran</h4><br>
                                            <p>Transfer Via Bank BRI No. Rekening 0123-1232-02-01</p>
                                            <p>Sisa Pembayaran : Rp. <?= number_format($detail['transaksi_boking']->total_boking - $detail['transaksi_boking']->stat_pem_dp_boking)  ?></p>
                                            <input type="text" onkeypress="return hanyaAngka(event)" class="form-control mb-3" name="total" placeholder="Masukkan Nominal Pembayaran...">
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
                                    <th>Nama Jasa</th>
                                    <th>Tanggal Rencana Boking</th>
                                    <th>Tanggal Selesai Boking</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($detail['boking_full'] as $key => $value) {
                                    $tgl = $value->tgl_rencana;
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $value->nama_jasa ?></td>
                                        <td><?= $value->tgl_rencana ?></td>
                                        <td><?php
                                            if ($value->tgl_selesai == '0') {
                                            ?>
                                                <span class="badge badge-danger">Belum Selesai</span>
                                            <?php
                                            } else {
                                            ?>
                                                <span class="badge badge-danger"><?= $value->tgl_selesai ?></span>
                                            <?php
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>

                            </tbody>

                        </table>

                        </table>
                        <a class="btn btn-info" href="<?= base_url('pendaki/cTransaksisaya/boking') ?>">Kembali</a>
                        <?php
                        if ($detail['transaksi_boking']->stat_boking != '0') {
                        ?>
                            <a class="btn btn-warning" href="<?= base_url('pendaki/cTransaksisaya/invoice_boking/' . $detail['transaksi_boking']->id_boking) ?>">Cetak Invoice</a>
                        <?php
                        }
                        ?>

                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                            Pembatalan Rencana
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<form action="<?= base_url('pendaki/cTransaksiSaya/pembatalan_boking/' . $detail['transaksi_boking']->id_boking) ?>" method="POST">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Anda Yakin Membatalkan Rencana?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4>Informasi</h4>
                    <p>Tanggal : <?= date('Y-m-d') ?></p>
                    <p>Tanggal Rencana : <?= $tgl ?></p>
                    <p class="text-primary">Masukkan No Rekening Anda untuk mengembalikan pembayaran Anda</p>
                    <?php
                    $datein = date('Y-m-d');
                    $datefast = $tgl;
                    if ($datefast == $datein) {
                        $uang = 20 / 100 * $detail['transaksi_boking']->total_boking;
                    ?>
                        <p>Pembayaran anda kembali 20% dari total pembayaran. Informasi uang kembali <strong>Rp. <?= number_format($uang) ?></strong></p>
                    <?php
                    } else {
                        $uang = $detail['transaksi_boking']->total_boking;
                    ?>
                        <p>Pembayaran anda kembali 100% dari total pembayaran. Informasi uang kembali <strong>Rp. <?= number_format($uang) ?></strong></p>
                    <?php
                    }
                    ?>
                    <input type="hidden" name="uang" value="<?= $uang ?>">
                    <input class="form-control" name="pembatalan" placeholder="masukkan no rekening...">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</form>