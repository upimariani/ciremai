<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Informasi Pembatalan Boking Pendakian</h1>

                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Boking </li>
                    </ol>
                </div>
            </div>
        </div>
        <?php
        if ($this->session->userdata('success')) {
        ?>
            <div class="callout callout-success">
                <h5>Sukses!</h5>
                <p><?= $this->session->userdata('success') ?></p>
            </div>
        <?php
        }
        ?>

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Boking</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Boking</th>
                                        <th>Atas Nama</th>
                                        <th>Total Boking</th>
                                        <th>Status Boking</th>
                                        <th>Status Jaminan</th>
                                        <th>Bukti Pembayaran</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($transaksi as $key => $value) {
                                        if ($value->stat_boking == '9') {
                                            # code...

                                    ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $value->tgl_boking ?></td>
                                                <td><?= $value->nama_pendaki ?></td>
                                                <td>Rp. <?= number_format($value->total_boking)  ?></td>
                                                <td class="text-center">
                                                    <span class="badge badge-danger">Dibatalkan!</span><br>
                                                    <smal>Silahkan untuk mentrasfer sejumlah <strong>Rp. <?= number_format($value->uang_kembali)  ?></strong> ke No.Rekening <strong><?= $value->norek ?></strong></smal>
                                                </td>
                                                <td><?php if ($value->stat_jaminan == '0') {
                                                    ?>
                                                        <span class="badge badge-danger">Belum Diberikan</span><br>
                                                        <!-- <a href="<?= base_url('Admin/cTransaksi/stat_jaminan_menerima/' . $value->id_boking) ?>" class="btn btn-success">Menerima</a> -->
                                                    <?php
                                                    } else if ($value->stat_jaminan == '1') {
                                                    ?>
                                                        <span class="badge badge-warning">Disimpan</span><br>
                                                        <a href="<?= base_url('asset/jaminan/' . $value->jaminan) ?>"><?= $value->jaminan ?></a><br>
                                                        <!-- <a href="<?= base_url('Admin/cTransaksi/dikembalikan/' . $value->id_boking) ?>" class="btn btn-success">Dikembalikan</a> -->
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <span class="badge badge-success">Sudah Dikembalikan</span>
                                                    <?php
                                                    } ?>
                                                </td>
                                                <td>Pembayaran DP<br>
                                                    <?php
                                                    if ($value->bukti_pem_dp_boking == '0') {
                                                    ?>
                                                        <span class="badge badge-danger">Belum Melakukan DP</span>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <a href="<?= base_url('asset/PEMBAYARAN/' . $value->bukti_pem_dp_boking) ?>"><?= $value->bukti_pem_dp_boking ?></a>
                                                    <?php
                                                    }
                                                    ?>
                                                    Pembayaran Lunas <br>
                                                    <?php
                                                    if ($value->bukti_pem_all_boking == '0') {
                                                    ?>
                                                        <span class="badge badge-danger">Belum Melakukan Pelunasan</span>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <a href="<?= base_url('asset/PEMBAYARAN/' . $value->bukti_pem_all_boking) ?>"><?= $value->bukti_pem_all_boking ?></a>
                                                    <?php
                                                    }
                                                    ?>



                                                </td>
                                                <td class="text-center"><a class="btn btn-success" href="<?= base_url('Admin/cTransaksi/detail_boking/' . $value->id_boking) ?>">Detail Boking</a></td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Boking</th>
                                        <th>Atas Nama</th>
                                        <th>Total Boking</th>
                                        <th>Status Boking</th>
                                        <th>Status Jaminan</th>
                                        <th>Bukti Pembayaran</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>