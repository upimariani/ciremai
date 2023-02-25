<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Transaksi Sewa Alat Pendakian</h1>

                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Sewa Alat</li>
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
                            <h3 class="card-title">Informasi Sewa</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Sewa</th>
                                        <th>Atas Nama</th>
                                        <th>Total Sewa</th>
                                        <th>Status Sewa</th>
                                        <th>Status Jaminan</th>
                                        <th>Bukti Pembayaran</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $sisa = 0;
                                    foreach ($transaksi as $key => $value) {
                                        $sisa = $value->total_sewa - $value->stat_pem_dp_sewa - $value->stat_pem_all_sewa;
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $value->tgl_sewa ?></td>
                                            <td><?= $value->nama_pendaki ?></td>
                                            <td>Rp. <?= number_format($value->total_sewa)  ?></td>
                                            <td class="text-center"><?php if ($value->status_sewa == '0' && $sisa == 0) {
                                                                    ?>
                                                    <span class="badge badge-info">Menunggu Konfirmasi</span><br>
                                                    <a href="<?= base_url('Admin/cTransaksi/konfirmasi_sewa/' . $value->id_sewa) ?>" class="btn btn-info">Konfirmasi</a>
                                                <?php
                                                                    } else if ($sisa != 0) {
                                                ?>
                                                    <span class="badge badge-danger">Belum Melakukan Pembayaran</span>

                                                <?php
                                                                    } else if ($stat_boking == '1' && $sisa == 0) {
                                                ?>
                                                    <span class="badge badge-danger">Dalam Proses</span><br>
                                                    <a href="<?= base_url('Admin/cTransaksi/selesai_sewa/' . $value->id_sewa) ?>" class="btn btn-danger">Selesai</a>
                                                <?php
                                                                    } else {
                                                ?>
                                                    <span class="badge badge-success">Selesai</span>
                                                <?php } ?>
                                            </td>
                                            <td><?php if ($value->stat_jaminan == '0') {
                                                ?>
                                                    <span class="badge badge-danger">Belum Diberikan</span><br>
                                                    <a href="<?= base_url('Admin/cTransaksi/stat_jaminan_menerima/' . $value->id_sewa) ?>" class="btn btn-success">Menerima</a>
                                                <?php
                                                } else if ($value->stat_jaminan == '1') {
                                                ?>
                                                    <span class="badge badge-warning">Disimpan</span><br>
                                                    <a href="<?= base_url('asset/jaminan/' . $value->jaminan) ?>"><?= $value->jaminan ?></a><br>
                                                    <a href="<?= base_url('Admin/cTransaksi/dikembalikan/' . $value->id_sewa) ?>" class="btn btn-success">Dikembalikan</a>
                                                <?php
                                                } else {
                                                ?>
                                                    <span class="badge badge-success">Sudah Dikembalikan</span>
                                                <?php
                                                } ?>
                                            </td>
                                            <td>Pembayaran DP<br>
                                                <?php
                                                if ($value->bukti_pem_dp_sewa == '0' && $sisa != 0) {
                                                ?>
                                                    <span class="badge badge-danger">Belum Melakukan DP</span>
                                                <?php
                                                } else {
                                                ?>
                                                    <a href="<?= base_url('asset/PEMBAYARAN/' . $value->bukti_pem_dp_sewa) ?>"><?= $value->bukti_pem_dp_sewa ?></a>
                                                <?php
                                                }
                                                ?>
                                                <br> Pembayaran Lunas <br>
                                                <?php
                                                if ($value->bukti_pem_all_sewa == '0' && $sisa != 0) {
                                                ?>
                                                    <span class="badge badge-danger">Belum Melakukan Pelunasan</span>
                                                    <?php
                                                } else {
                                                    if ($sisa == '0') {
                                                        echo 'Sudah Lunas';
                                                    } else {

                                                    ?>
                                                        <a href="<?= base_url('asset/PEMBAYARAN/' . $value->bukti_pem_all_sewa) ?>"><?= $value->bukti_pem_all_sewa ?></a>
                                                <?php
                                                    }
                                                }
                                                ?>



                                            </td>
                                            <td class="text-center"><a class="btn btn-success" href="<?= base_url('Admin/cTransaksi/detail_sewa/' . $value->id_sewa) ?>">Detail Sewa</a></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Sewa</th>
                                        <th>Atas Nama</th>
                                        <th>Total Sewa</th>
                                        <th>Status Sewa</th>
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