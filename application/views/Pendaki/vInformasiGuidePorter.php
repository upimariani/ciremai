<div class="hero hero-inner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mx-auto text-center">
                <div class="intro-wrap">
                    <h1 class="mb-0">Informasi</h1>
                    <p class="text-white">Guide dan Poter Pendakian Gunung Ciremai</p>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="untree_co-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="row justify-content-center text-center mb-5">
                    <div class="col-lg-12">
                        <h2 class="section-title text-center mb-3">Guide &amp; Porter</h2>
                        <p>Apa itu guide dalam pendakian?
                            Guide dalam pendakian biasanya bertugas mengarahkan, memberi informasi dan petujuk selama perjalanan. Sedangkan porter bertugas membawa barang atau kebutuhan bersama selama di gunung. </p>
                    </div>
                </div>

                <div class="row">
                    <?php
                    foreach ($jasa as $key => $value) {
                    ?>
                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 mb-4 mb-lg-0">
                            <form action="<?= base_url('pendaki/cGuidePorter/addtocart') ?>" method="POST">
                                <input type="hidden" name="name" value="<?= $value->nama_jasa ?>">
                                <input type="hidden" name="id" value="<?= $value->id_jasa ?>">
                                <input type="hidden" name="price" value="<?= $value->harga ?>">
                                <input type="hidden" name="qty" value="1">
                                <input type="hidden" name="type" value="<?= $value->type_jasa ?>">
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
                                                <div class="accordion-body">
                                                    <span class="d-flex align-items-center loc mb-2">
                                                        <span class="icon-room mr-3"></span>
                                                        <span><?php if ($value->type_jasa) {
                                                                    echo 'Porter';
                                                                } else {
                                                                    'Guide';
                                                                }  ?></span>
                                                    </span>
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <h3><a href="#"><?= $value->nama_jasa ?></a></h3>
                                                            <div class="price ml-auto">
                                                                <span>Rp. <?= number_format($value->harga)  ?></span>
                                                            </div>
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
            <div class="col-lg-6">
                <?php
                $qty = 0;
                foreach ($this->cart->contents() as $key => $value) {
                    $qty += $value['qty'];
                    if ($qty != 0) {
                ?>
                        <div class="col-lg-12">
                            <h2 class="section-title text-center mb-3">Informasi Keranjang Jasa</h2>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Jasa</th>
                                    <th>Type Jasa</th>
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
                                        <td><?= $no++ ?>.</td>
                                        <td><?= $value['name'] ?></td>
                                        <td><?php if ($value['type'] == '1') {
                                                echo '<span class="badge badge-success">Porter</span>';
                                            } else {
                                                echo '<span class="badge badge-primary">Guide</span>';
                                            }  ?></td>
                                        <td>Rp. <?= number_format($value['price'])  ?></td>
                                        <td>
                                            <a href="<?= base_url('Pendaki/cGuidePorter/deletecart/' . $value['rowid']) ?>">Hapus</a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        <a href="<?= base_url('pendaki/cGuidePorter/checkout') ?>" class="btn btn-warning mt-3">Checkout</a>


                <?php
                    }
                }
                ?>

            </div>
        </div>

    </div>
</div>

<div class="py-5 cta-section">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <h2 class="mb-2 text-white">Lets you Explore the Best. Contact Us Now</h2>
                <p class="mb-4 lead text-white text-white-opacity">Keindahan alam adalah anugerah yang menumbuhkan penghargaan dan rasa syukur.</p>
            </div>
        </div>
    </div>
</div>