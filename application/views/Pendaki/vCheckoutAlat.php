<div class="hero hero-inner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12 mx-auto text-center">
                <div class="intro-wrap">
                    <h1 class="mb-0">Checkout</h1>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="untree_co-section">
    <div class="container my-5">


        <div class="row justify-content-center">

            <div class="col-lg-4">
                <?php
                if ($error != ' ') {
                ?>
                    <div class="alert alert-danger">
                        <h5>Informasi!</h5>
                        <p>Upload Ulang Jaminan <?= $error ?></p>
                    </div>
                <?php
                }
                ?>
                <?php
                if ($this->session->userdata('error')) {
                ?>
                    <div class="alert alert-danger">
                        <h5>Informasi!</h5>
                        <p><?= $this->session->userdata('error') ?></p>
                    </div>
                <?php
                }
                ?>
                <div class="custom-block" data-aos="fade-up">
                    <h2 class="section-title">Informasi</h2>
                    <div class="custom-accordion" id="accordion_1">
                        <div class="accordion-item">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Bagaimanaa Cara Penyewaan Alat Pendakian?</button>
                            </h2>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion_1">
                                <div class="accordion-body">
                                    Masuk ke halaman login -> Pilih alat pendakian yang dibutuhkan -> "Add To Cart" -> Klik Checkout
                                </div>
                            </div>
                        </div> <!-- .accordion-item -->

                        <div class="accordion-item">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Bagaimana Pembayaran penyewaan?</button>
                            </h2>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion_1">
                                <div class="accordion-body">
                                    Transfer via Bank BRI 9087678-098-012-01<br>
                                    Upload bukti pembayaran
                                    <br>
                                    <br>
                                    *Catatan : Dapat Melakukan pembayaran DP terlebih dahulu
                                </div>
                            </div>
                        </div> <!-- .accordion-item -->


                    </div>
                </div> <!-- END .custom-block -->
                <div class="custom-block" data-aos="fade-up">
                    <h2 class="section-title">Gallery</h2>
                    <div class="row gutter-v2 gallery">
                        <div class="col-4">
                            <a href="<?= base_url('asset/FOTO GUNUNG/') ?>1.webp" class="gal-item" data-fancybox="gal"><img src="<?= base_url('asset/FOTO GUNUNG/') ?>1.webp" alt="Image" class="img-fluid"></a>
                        </div>
                        <div class="col-4">
                            <a href="<?= base_url('asset/FOTO GUNUNG/') ?>2.jpg" class="gal-item" data-fancybox="gal"><img src="<?= base_url('asset/FOTO GUNUNG/') ?>2.jpg" alt="Image" class="img-fluid"></a>
                        </div>
                        <div class="col-4">
                            <a href="<?= base_url('asset/FOTO GUNUNG/') ?>3.jpg" class="gal-item" data-fancybox="gal"><img src="<?= base_url('asset/FOTO GUNUNG/') ?>3.jpg" alt="Image" class="img-fluid"></a>
                        </div>

                    </div>
                </div> <!-- END .custom-block -->

            </div>
            <div class="col-lg-4">
                <div class="custom-block" data-aos="fade-up" data-aos-delay="100">
                    <h2 class="section-title">Checkout Alat</h2>
                    <?php
                    echo form_open_multipart('pendaki/calatpendakian/checkout_ok');
                    ?>
                    <input type="hidden" name="harga_porter" class="harga-porter">
                    <input type="hidden" name="harga_guide" class="harga-guide">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="text-black" for="fname">Atas Nama</label>
                                <input type="text" value="<?= $this->session->userdata('nama') ?>" class="form-control" id="fname" readonly>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="text-black" for="lname">No Telepon</label>
                                <input type="text" value="<?= $this->session->userdata('no_hp') ?>" class="form-control" id="lname" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="text-black" for="email">Tanggal Rencana Penyewaan</label>
                        <input type="date" name="date" class="form-control" id="email" aria-describedby="emailHelp" required>
                        <small id="emailHelp" class="form-text text-muted">Jangan lupa untuk mengisi tanggal penyewaan</small>
                    </div>
                    <div class="form-group">
                        <label class="text-black" for="lname">Total Pendaki</label>
                        <input type="number" name="jml" class="form-control" id="lname" required>
                    </div>
                    <hr>
                    <div class="form-group">

                        <label class="text-black" for="email">Guide</label>
                        <small id="emailHelp" class="form-text text-muted">Apakah Anda membutuhkan Guide?</small>
                        <select class="form-control" id="guide" name="guide">
                            <option value="">--Pilih Guide---</option>
                            <?php
                            foreach ($jasa['guide'] as $key => $value) {
                            ?>
                                <option data-harga-guide="<?= $value->harga ?>" value="<?= $value->id_jasa ?>"><?= $value->nama_jasa ?></option>
                            <?php
                            }
                            ?>

                        </select>

                    </div>
                    <div class="form-group">

                        <label class="text-black" for="email">Porter</label>
                        <small id="emailHelp" class="form-text text-muted">Apakah Anda membutuhkan Porter?</small>
                        <select class="form-control" id="porter" name="porter">
                            <option value="">--Pilih Porter---</option>
                            <?php
                            foreach ($jasa['porter'] as $key => $value) {
                            ?>
                                <option data-harga-porter="<?= $value->harga ?>" value="<?= $value->id_jasa ?>"><?= $value->nama_jasa ?></option>
                            <?php
                            }
                            ?>
                        </select>

                    </div>
                    <div class="form-group">
                        <label class="text-black" for="lname">Jaminan KTP</label>
                        <input type="file" name="jaminan" class="form-control" id="lname" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <div class="custom-block" data-aos="fade-up">
                    <h2 class="section-title">Social Icons</h2>
                    <ul class="list-unstyled social-icons light">
                        <li><a href="#"><span class="icon-facebook"></span></a></li>
                        <li><a href="#"><span class="icon-twitter"></span></a></li>
                        <li><a href="#"><span class="icon-linkedin"></span></a></li>
                        <li><a href="#"><span class="icon-google"></span></a></li>
                        <li><a href="#"><span class="icon-play"></span></a></li>
                    </ul>
                </div> <!-- END .custom-block -->



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