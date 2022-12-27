<div class="hero hero-inner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mx-auto text-center">
                <div class="intro-wrap">
                    <h1 class="mb-0">Informasi Alat Pendakian</h1>
                    <p class="text-white">Tersedia penyewaan alat pendakian</p>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="untree_co-section">
    <div class="container">
        <div class="row text-center">
            <?php
            $qty = 0;
            foreach ($this->cart->contents() as $key => $value) {
                $qty += $value['qty'];
            }
            if ($qty != 0) {
            ?>
                <div class="col-lg-12">
                    <div class="col-lg-12">
                        <h2 class="section-title text-center mb-3">Informasi Keranjang Alat</h2>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Jasa</th>
                                <th>Quantity</th>
                                <th>Harga</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($this->cart->contents() as $key => $value) {
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $value['name'] ?></td>
                                    <td><?= $value['qty'] ?></td>
                                    <td>Rp. <?= number_format($value['price'])  ?></td>
                                    <td>
                                        <a href="<?= base_url('Pendaki/cAlatPendakian/deletecart/' . $value['rowid']) ?>">Hapus</a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>

                        </tbody>

                    </table>
                    <a href="<?= base_url('pendaki/calatpendakian/checkout_alat') ?>" class="btn btn-success mb-5">Checkout</a>
                </div>
            <?php
            }
            ?>

            <div class="col-lg-12">
                <div class="row justify-content-center text-center mb-5">
                    <div class="col-lg-6">
                        <h2 class="section-title text-center mb-3">Alat Pendakian </h2>
                        <p>Perlengkapan kelompok merupakan perlengkapan yang akan digunakan secara bersama-sama dalam sebuah tim atau kelompok. Perlengkapan ini harus dipersiapkan agar pendakian dapat berjalan aman, lancar dan selalu terkendali.
                        </p>
                    </div>
                </div>
                <div class="row">
                    <?php
                    foreach ($alat as $key => $value) {
                    ?>
                        <div class="col-6 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                            <form action="<?= base_url('pendaki/calatpendakian/addtocart') ?>" method="POST">
                                <input type="hidden" name="name" value="<?= $value->nama_alat ?>">
                                <input type="hidden" name="id" value="<?= $value->id_alat ?>">
                                <input type="hidden" name="price" value="<?= $value->harga_sewa ?>">
                                <input type="hidden" name="qty" value="1">
                                <input type="hidden" name="sisa" value="<?= $value->sisa_alat ?>">
                                <div class="media-1">
                                    <div class="custom-accordion" id="accordion_1">
                                        <div class="accordion-item">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">Deskripsi?</button>
                                            </h2>

                                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion_1">
                                                <div class="accordion-body">
                                                    <p><?= $value->deskripsi ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">Detail Informasi?</button>
                                            </h2>
                                            <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion_1">
                                                <a href="#" class="d-block mb-3"><img style="height: 250px;" src="<?= base_url('asset/FOTO-ALAT/') ?><?= $value->gambar ?>" alt="Image" class="img-fluid"></a>
                                                <span class="d-flex align-items-center loc mb-2">
                                                    <span class="icon-room mr-4 ml-4"></span>
                                                    <span>Sisa Alat : <?= $value->sisa_alat ?></span>
                                                </span>
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <h3 class="ml-4"><a href="#"><?= $value->nama_alat ?></a></h3>
                                                        <div class="price ml-4">
                                                            <span>Rp. <?= number_format($value->harga_sewa) ?></span>
                                                            <br>
                                                            <button type="submit" class="btn btn-success mt-3">Add To Cart</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- .accordion-item -->
                                    </div> <!-- .accordion-item -->
                                </div>
                            </form>
                        </div>
                    <?php
                    }
                    ?>

                </div>
            </div>

        </div>

    </div>
</div>

<div class="py-5 cta-section">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <h2 class="mb-2 text-white">Gunung Ciremai</h2>
                <p class="mb-4 lead text-white text-white-opacity">Keindahan alam adalah anugerah yang menumbuhkan penghargaan dan rasa syukur.</p>
            </div>
        </div>
    </div>
</div>