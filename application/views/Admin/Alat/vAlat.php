<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Alat Pendakian</h1>

                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Alat</li>
                    </ol>
                </div>

            </div>

        </div>
        <button type="button" class="btn btn-app" data-toggle="modal" data-target="#modal-default">
            <i class="fas fa-plus"></i>
            Tambah Alat
        </button>
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
                            <h3 class="card-title">Informasi Alat Pendakian</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th class="text-center">Gambar Alat</th>
                                        <th>Nama Alat</th>
                                        <th>Harga Sewa</th>
                                        <th>Stok</th>
                                        <th>Stok Tersedia</th>
                                        <th class="text-center">Deskripsi</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($alat as $key => $value) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td class="text-center"><img style="width: 250px;" src="<?= base_url('asset/FOTO-ALAT/' . $value->gambar) ?>"></td>
                                            <td><?= $value->nama_alat ?></td>
                                            <td>Rp. <?= number_format($value->harga_sewa)  ?></td>
                                            <td><?= $value->stok_alat ?></td>
                                            <td> <span class="badge badge-success"><?= $value->sisa_alat ?></span></td>
                                            <td><?= $value->deskripsi ?></td>

                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button type="button" data-toggle="modal" data-target="#edit<?= $value->id_alat ?>" class="btn btn-warning">Edit</button>
                                                    <a href="<?= base_url('Admin/cDataMaster/deletealat/' . $value->id_alat) ?>" class="btn btn-danger">Hapus</a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th class="text-center">Gambar Alat</th>
                                        <th>Nama Alat</th>
                                        <th>Harga Sewa</th>
                                        <th>Stok</th>
                                        <th>Stok Tersedia</th>
                                        <th class="text-center">Deskripsi</th>
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

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <?php echo form_open_multipart('Admin/cDataMaster/createalat'); ?>
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Masukkan Data Alat</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama Alat</label>
                    <input type="text" name="nama" class="form-control" placeholder="Enter ..." required>
                </div>
                <div class="form-group">
                    <label>Harga Sewa</label>
                    <input type="number" name="harga" class="form-control" placeholder="Enter ..." required>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea class="textarea" name="deskripsi" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
                <div class="form-group">
                    <label>Jumlah</label>
                    <input type="number" name="jumlah" class="form-control" placeholder="Enter ..." required>
                </div>
                <div class="form-group">
                    <label>Gambar</label>
                    <input type="file" name="gambar" class="form-control" placeholder="Enter ..." required>
                </div>


            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<?php
foreach ($alat as $key => $value) {
?>
    <div class="modal fade" id="edit<?= $value->id_alat ?>">
        <div class="modal-dialog">
            <?php echo form_open_multipart('Admin/cDataMaster/updatealat/' . $value->id_alat); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Masukkan Data Alat</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Alat</label>
                        <input type="text" value="<?= $value->nama_alat ?>" name="nama" class="form-control" placeholder="Enter ..." required>
                    </div>
                    <div class="form-group">
                        <label>Harga Sewa</label>
                        <input type="number" name="harga" value="<?= $value->harga_sewa ?>" class="form-control" placeholder="Enter ..." required>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="textarea" name="deskripsi" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $value->deskripsi ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="number" name="jumlah" value="<?= $value->stok_alat ?>" class="form-control" placeholder="Enter ..." required>
                    </div>
                    <div class="form-group">
                        <label>Gambar</label><br>
                        <img style="width: 250px;" src="<?= base_url('asset/FOTO-ALAT/' . $value->gambar) ?>">
                        <input type="file" name="gambar" class="form-control" placeholder="Enter ...">
                    </div>


                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php
}
?>

<!-- /.modal -->