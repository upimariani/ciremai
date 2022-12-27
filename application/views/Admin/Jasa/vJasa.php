<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Jasa Porter dan Guide</h1>

                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Jasa Porter Guide</li>
                    </ol>
                </div>

            </div>

        </div>
        <button type="button" class="btn btn-app" data-toggle="modal" data-target="#modal-default">
            <i class="fas fa-plus"></i>
            Tambah Jasa
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
                            <h3 class="card-title">Informasi Jasa</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Jasa</th>
                                        <th>Deskripsi</th>
                                        <th>Harga</th>
                                        <th class="text-center">Jumlah</th>
                                        <th class="text-center">Status Jasa</th>
                                        <th class="text-center">Type Jasa</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($jasa as $key => $value) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $value->nama_jasa ?></td>
                                            <td><?= $value->deskripsi ?></td>
                                            <td>Rp. <?= number_format($value->harga)  ?></td>
                                            <td><?= $value->jumlah ?></td>
                                            <td class="text-center"><?php if ($value->status_jasa == '0') {
                                                                    ?>
                                                    <span class="badge badge-success">Tersedia</span>
                                                <?php
                                                                    } else {
                                                ?>
                                                    <span class="badge badge-danger">Proses Perjalanan</span>
                                                <?php
                                                                    }
                                                ?>
                                            </td>
                                            <td class="text-center"><?php if ($value->type_jasa == '1') {
                                                                    ?>
                                                    <span class="badge badge-primary">Porter</span>
                                                <?php
                                                                    } else {
                                                ?>
                                                    <span class="badge badge-secondary">Guide</span>
                                                <?php
                                                                    }
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button type="button" data-toggle="modal" data-target="#edit<?= $value->id_jasa ?>" class="btn btn-warning">Edit</button>
                                                    <a href="<?= base_url('Admin/cDataMaster/deletejasa/' . $value->id_jasa) ?>" class="btn btn-danger">Hapus</a>
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
                                        <th>Nama Jasa</th>
                                        <th>Deskripsi</th>
                                        <th>Harga</th>
                                        <th class="text-center">Jumlah</th>
                                        <th class="text-center">Status Jasa</th>
                                        <th class="text-center">Type Jasa</th>
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
        <form action="<?= base_url('Admin/cDataMaster/createjasa') ?>" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Masukkan Data Jasa</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Jasa</label>
                        <input type="text" name="nama" class="form-control" placeholder="Enter ..." required>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea class="textarea" name="deskripsi" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" name="harga" class="form-control" placeholder="Enter ..." required>
                    </div>

                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="number" name="jumlah" class="form-control" placeholder="Enter ..." required>
                    </div>
                    <div class="form-group">
                        <label>Type Jasa</label>
                        <select name="type" class="form-control" required>
                            <option value="">---Pilih Type Jasa---</option>
                            <option value="1">Porter</option>
                            <option value="2">Guide</option>
                        </select>
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
foreach ($jasa as $key => $value) {
?>
    <div class="modal fade" id="edit<?= $value->id_jasa ?>">
        <div class="modal-dialog">
            <form action="<?= base_url('Admin/cDataMaster/updatejasa/' . $value->id_jasa) ?>" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Masukkan Data Jasa</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Jasa</label>
                            <input type="text" value="<?= $value->nama_jasa ?>" name="nama" class="form-control" placeholder="Enter ..." required>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea class="textarea" name="deskripsi" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $value->deskripsi ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="number" value="<?= $value->harga ?>" name="harga" class="form-control" placeholder="Enter ..." required>
                        </div>

                        <div class="form-group">
                            <label>Jumlah</label>
                            <input type="number" name="jumlah" value="<?= $value->jumlah ?>" class="form-control" placeholder="Enter ..." required>
                        </div>
                        <div class="form-group">
                            <label>Type Jasa</label>
                            <select name="type" class="form-control" required>
                                <option value="">---Pilih Type Jasa---</option>
                                <option value="1" <?php if ($value->type_jasa == '1') {
                                                        echo 'selected';
                                                    } ?>>Porter</option>
                                <option value="2" <?php if ($value->type_jasa == '2') {
                                                        echo 'selected';
                                                    } ?>>Guide</option>
                            </select>
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