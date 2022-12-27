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
                                    <i class="fas fa-globe"></i> Detail Transaksi Boking
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
                                    <strong><?= $detail['transaksi']->nama_pendaki ?></strong><br>
                                    <?= $detail['transaksi']->alamat_pendaki ?><br>
                                    Phone: <?= $detail['transaksi']->no_hp_pendaki ?><br>
                                    Jumlah Pendaki : <?= $detail['transaksi']->jml_pendaki ?>

                                </address>
                            </div>
                            <?php
                            if ($detail['transaksi']->bukti_pem_dp != '0') {
                            ?>
                                <div class="col-sm-4">
                                    <h5>Bukti Pembayaran DP</h5>
                                    <img class="mb-4" style="width: 250px;" src="<?= base_url('asset/PEMBAYARAN/' . $detail['transaksi']->bukti_pem_dp) ?>">
                                </div>
                            <?php
                            }
                            ?>
                            <?php
                            if ($detail['transaksi']->bukti_pem_all != '0') {
                            ?>
                                <div class="col-sm-4">
                                    <h5>Bukti Pembayaran Pelunasan</h5>
                                    <img class="mb-4" style="width: 250px;" src="<?= base_url('asset/PEMBAYARAN/' . $detail['transaksi']->bukti_pem_all) ?>">
                                </div>
                            <?php
                            }
                            ?>




                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <th>No</th>
                                        <th>Nama Jasa</th>
                                        <th>Harga</th>
                                        <th>Quantity Jasa</th>
                                        <th>Tanggal Rencana</th>
                                        <th>Tanggal Selesai</th>
                                        <th>Status Boking</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($detail['boking'] as $key => $value) {
                                        ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $value->nama_jasa ?></td>
                                                <td>Rp. <?= number_format($value->harga)  ?></td>
                                                <td><?= $value->jml ?></td>
                                                <td><?= $value->tgl_rencana ?></td>
                                                <td><?= $value->tgl_selesai ?></td>
                                                <td><?php if ($value->tgl_selesai == '0') {
                                                    ?>
                                                        <span class="badge badge-danger">Belum Selesai</span>
                                                    <?php
                                                    } else {
                                                        echo $value->tgl_selesai;
                                                    }  ?>
                                                </td>
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