<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Transaksi Boking Porter dan Guide Pendakian</h1>

                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Boking Guide dan Porter</li>
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
                                        <th>Tanggal Boking</th>
                                        <th>Atas Nama</th>
                                        <th>Total Sewa</th>
                                        <th>Status Sewa</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($transaksi as $key => $value) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $value->tgl_boking ?></td>
                                            <td><?= $value->nama_pendaki ?></td>
                                            <td>Rp. <?= number_format($value->total_bayar)  ?></td>
                                            <td class="text-center"><?php if ($value->status_pendakian == '0' && $value->bukti_pem_all != '0') {
                                                                    ?>
                                                    <span class="badge badge-info">Menunggu Konfirmasi</span><br>
                                                    <a href="<?= base_url('Admin/cTransaksi/konfirmasi_boking/' . $value->id_boking) ?>" class="btn btn-info">Konfirmasi</a>
                                                <?php
                                                                    } else if ($value->status_pendakian == '0' && $value->bukti_pem_all == '0') {
                                                ?>
                                                    <span class="badge badge-danger">Belum Melakukan Pembayaran</span>

                                                <?php
                                                                    } else if ($value->status_pendakian == '1' && $value->bukti_pem_all != '0') {
                                                ?>
                                                    <span class="badge badge-danger">Dalam Proses</span><br>
                                                    <a href="<?= base_url('Admin/cTransaksi/selesai_boking/' . $value->id_boking) ?>" class="btn btn-danger">Selesai</a>
                                                <?php
                                                                    } else {
                                                ?>
                                                    <span class="badge badge-success">Selesai</span>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center"><a class="btn btn-success" href="<?= base_url('Admin/cTransaksi/detail_boking/' . $value->id_boking) ?>">Detail Boking</a></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Boking</th>
                                        <th>Atas Nama</th>
                                        <th>Total Sewa</th>
                                        <th>Status Sewa</th>
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