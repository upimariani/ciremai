<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Invoice</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Invoice</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">



                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-globe"></i> Detail Transaksi
                                    <small class="float-right">Date: <?= date('Y-m-d') ?></small>
                                </h4>


                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                From
                                <address>
                                    <strong><?= $detail['transaksi_boking']->nama_pendaki ?></strong><br>
                                    <?= $detail['transaksi_boking']->alamat_pendaki ?><br>
                                    Phone: <?= $detail['transaksi_boking']->no_hp_pendaki ?><br>
                                    Total Pembayaran: Rp. <?= number_format($detail['transaksi_boking']->total_boking)  ?><br>

                                </address>
                                <!-- <h5>Jaminan</h5>
                                <img class="mb-3" style="width: 250px;" src="<?= base_url('asset/jaminan/' . $detail['transaksi_boking']->jaminan) ?>"> -->
                            </div>
                        </div>
                        <!-- /.row -->

                        <!-- /.row -->
                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <th>No</th>
                                        <th>Nama Jasa</th>
                                        <th>Harga</th>
                                        <th>Tanggal Rencana Boking</th>
                                        <th>Tanggal Selesai Boking</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($detail['boking_full'] as $key => $value) {
                                        ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $value->nama_jasa ?></td>
                                                <td>Rp. <?= number_format($value->harga)  ?></td>
                                                <td><?= $value->tgl_rencana ?></td>

                                                <td><?= $value->tgl_selesai ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-6">

                            </div>
                            <!-- /.col -->
                            <div class="col-6">
                                <p class="lead">Amount Due <?= date('Y-m-d') ?></p>

                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th style="width:50%">Total:</th>
                                            <td>Rp. <?= number_format($detail['transaksi_boking']->total_boking)  ?></td>
                                        </tr>
                                        <tr>
                                            <th>DP</th>
                                            <td>Rp. <?= number_format($detail['transaksi_boking']->stat_pem_dp_boking)  ?></td>
                                        </tr>
                                        <tr>
                                            <th>Pelunasan:</th>
                                            <td>Rp. <?= number_format($detail['transaksi_boking']->stat_pem_all_boking)  ?></td>
                                        </tr>
                                        <tr>
                                            <th>Sisa:</th>
                                            <td>Rp. <?= number_format($detail['transaksi_boking']->total_boking -  $detail['transaksi_boking']->stat_pem_dp_boking - $detail['transaksi_boking']->stat_pem_all_boking)  ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>


                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-12">
                                <button onclick="window.print()" class="btn btn-default"><i class="fas fa-print"></i> Print</button>

                            </div>
                        </div>
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>