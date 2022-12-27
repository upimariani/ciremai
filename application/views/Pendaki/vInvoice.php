<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GUNUNG CIREMAI</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('asset/AdminLTE/') ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="<?= base_url('asset/AdminLTE/') ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('asset/AdminLTE/') ?>dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url('asset/AdminLTE/') ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url('asset/AdminLTE/') ?>plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url('asset/AdminLTE/') ?>plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('asset/AdminLTE/') ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('asset/AdminLTE/') ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="<?= base_url('asset/AdminLTE/') ?>plugins/daterangepicker/daterangepicker.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url('asset/AdminLTE/') ?>plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url('asset/AdminLTE/') ?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('asset/AdminLTE/') ?>plugins/summernote/summernote-bs4.css">
</head>

<body>


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
                                    <i class="fas fa-globe"></i> Invoice
                                    <small class="float-right">Date: <?= date('Y-m-d') ?></small>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                Atas Nama
                                <address>
                                    <strong><?= $detail['transaksi']->nama_pendaki ?></strong><br>
                                    <?= $detail['transaksi']->alamat_pendaki ?><br>
                                    <?= $detail['transaksi']->no_hp_pendaki ?><br>
                                </address>
                            </div>
                            <!-- /.col -->

                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
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
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
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
                            </div>
                            <!-- /.col -->
                        </div>
                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-6">

                            </div>
                            <!-- /.col -->
                            <div class="col-6">

                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th style="width:50%">Total:</th>
                                            <td>Rp. <?= number_format($detail['transaksi']->total_sewa)  ?></td>
                                        </tr>
                                        <tr>
                                            <th>DP</th>
                                            <td>Rp. <?= number_format($detail['transaksi']->stat_pem_dp_sewa)  ?></td>
                                        </tr>
                                        <tr>
                                            <th>Pelunasan:</th>
                                            <td>Rp. <?= number_format($detail['transaksi']->stat_pem_all_sewa)  ?></td>
                                        </tr>
                                        <tr>
                                            <th>Sisa:</th>
                                            <td>Rp. <?= number_format($detail['transaksi']->total_sewa - $detail['transaksi']->stat_pem_dp_sewa - $detail['transaksi']->stat_pem_all_sewa)  ?></td>
                                        </tr>
                                    </table>
                                </div>
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
    </section>
    <!-- /.content -->
    </div>
    <script src="<?= base_url('asset/AdminLTE/') ?>plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?= base_url('asset/AdminLTE/') ?>plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

    <!-- Bootstrap 4 -->
    <script src="<?= base_url('asset/AdminLTE/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- daterangepicker -->
    <script src="<?= base_url('asset/AdminLTE/') ?>plugins/moment/moment.min.js"></script>
    <script src="<?= base_url('asset/AdminLTE/') ?>plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?= base_url('asset/AdminLTE/') ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="<?= base_url('asset/AdminLTE/') ?>plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="<?= base_url('asset/AdminLTE/') ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('asset/AdminLTE/') ?>dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?= base_url('asset/AdminLTE/') ?>dist/js/pages/dashboard.js"></script>
</body>

</html>
<!-- Content Wrapper. Contains page content -->