<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>User</h1>

                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User</li>
                    </ol>
                </div>

            </div>

        </div>
        <button type="button" class="btn btn-app" data-toggle="modal" data-target="#modal-default">
            <i class="fas fa-plus"></i>
            Tambah User
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
                            <h3 class="card-title">Informasi User</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama User</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Alamat User</th>
                                        <th>No Hp User</th>
                                        <th class="text-center">Akun User</th>
                                        <th class="text-center">Level User</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($user as $key => $value) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $value->nama_user ?></td>
                                            <td><?= $value->jk ?></td>
                                            <td><?= $value->alamat ?></td>
                                            <td><?= $value->no_hp ?></td>
                                            <td class="text-center"><span class="badge badge-warning"><?= $value->username ?></span> | <span class="badge badge-success"><?= $value->password ?></span></td>
                                            <td class="text-center"><?php if ($value->level_user == '1') {
                                                                    ?>
                                                    <span class="badge badge-warning">Admin</span>
                                                <?php
                                                                    } else {
                                                ?>
                                                    <span class="badge badge-success">Pengelola</span>
                                                <?php
                                                                    }
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button type="button" data-toggle="modal" data-target="#edit<?= $value->id_user ?>" class="btn btn-warning">Edit</button>
                                                    <a href="<?= base_url('Admin/cDataMaster/delete/' . $value->id_user) ?>" class="btn btn-danger">Hapus</a>
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
                                        <th>Nama User</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Alamat User</th>
                                        <th>No Hp User</th>
                                        <th class="text-center">Akun User</th>
                                        <th class="text-center">Level User</th>
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
        <form action="<?= base_url('Admin/cDataMaster/createuser') ?>" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Masukkan Data User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama User</label>
                        <input type="text" name="nama" class="form-control" placeholder="Enter ..." required>
                    </div>
                    <div class="form-group">
                        <label>Alamat User</label>
                        <input type="text" name="alamat" class="form-control" placeholder="Enter ..." required>
                    </div>
                    <div class="form-group">
                        <label>No Telepon</label>
                        <input type="text" name="no_hp" class="form-control" placeholder="Enter ..." required>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select class="form-control" name="jk" required>
                            <option value="">---Pilih Jenis Kelamin---</option>
                            <option value="Perempuan">Perempuan</option>
                            <option value="Laki - Laki">Laki - Laki</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Username Admin</label>
                        <input type="text" name="username" class="form-control" placeholder="Enter ..." required>
                    </div>
                    <div class="form-group">
                        <label>Password Admin</label>
                        <input type="text" name="password" class="form-control" placeholder="Enter ..." required>
                    </div>
                    <div class="form-group">
                        <label>Level User</label>
                        <select name="level" class="form-control" required>
                            <option value="">---Pilih Level User---</option>
                            <option value="1">Admin</option>
                            <option value="2">Pengelola</option>
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
foreach ($user as $key => $value) {
?>
    <div class="modal fade" id="edit<?= $value->id_user ?>">
        <div class="modal-dialog">
            <form action="<?= base_url('Admin/cDataMaster/updateuser/' . $value->id_user) ?>" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Masukkan Data User</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama User</label>
                            <input type="text" value="<?= $value->nama_user ?>" name="nama" class="form-control" placeholder="Enter ..." required>
                        </div>
                        <div class="form-group">
                            <label>Alamat User</label>
                            <input type="text" name="alamat" value="<?= $value->alamat ?>" class="form-control" placeholder="Enter ..." required>
                        </div>
                        <div class="form-group">
                            <label>No Telepon</label>
                            <input type="text" name="no_hp" value="<?= $value->no_hp ?>" class="form-control" placeholder="Enter ..." required>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select class="form-control" name="jk" required>
                                <option value="">---Pilih Jenis Kelamin---</option>
                                <option value="Perempuan" <?php if ($value->jk == 'Perempuan') {
                                                                echo 'selected';
                                                            } ?>>Perempuan</option>
                                <option value="Laki - Laki" <?php if ($value->jk == 'Laki - Laki') {
                                                                echo 'selected';
                                                            } ?>>Laki - Laki</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Username Admin</label>
                            <input type="text" name="username" value="<?= $value->username ?>" class="form-control" placeholder="Enter ..." required>
                        </div>
                        <div class="form-group">
                            <label>Password Admin</label>
                            <input type="text" name="password" value="<?= $value->password ?>" class="form-control" placeholder="Enter ..." required>
                        </div>
                        <div class="form-group">
                            <label>Level User</label>
                            <select name="level" class="form-control" required>
                                <option value="">---Pilih Level User---</option>
                                <option value="1" <?php if ($value->level_user == '1') {
                                                        echo 'selected';
                                                    } ?>>Admin</option>
                                <option value="2" <?php if ($value->level_user == '2') {
                                                        echo 'selected';
                                                    } ?>>Pengelola</option>
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