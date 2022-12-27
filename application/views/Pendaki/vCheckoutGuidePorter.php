<div class="hero hero-inner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mx-auto text-center">
                <div class="intro-wrap">
                    <h1 class="mb-0">Boking Guide dan Porter</h1>
                    <p class="text-white">Apa itu guide dalam pendakian?
                        Guide dalam pendakian biasanya bertugas mengarahkan, memberi informasi dan petujuk selama perjalanan. Sedangkan porter bertugas membawa barang atau kebutuhan bersama selama di gunung.</p>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="untree_co-section">
    <div class="container my-5">


        <div class="row justify-content-center">

            <div class="col-lg-4">
                <div class="custom-block" data-aos="fade-up">
                    <h2 class="section-title">Informasi</h2>
                    <div class="custom-accordion" id="accordion_1">
                        <div class="accordion-item">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Bagaimanaa Cara Boking Guide dan Porter Pendakian?</button>
                            </h2>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion_1">
                                <div class="accordion-body">
                                    Masuk ke halaman login -> Pilih Guide dan Porter pendakian yang dibutuhkan -> "Add To Cart" -> Klik Checkout
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
                    <form action="<?= base_url('pendaki/cGuidePorter/checkout_ok') ?>" method="POST" class="contact-form bg-white">
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
                            <small id="emailHelp" class="form-text text-muted">Silahkan isi tanggal rencana boking guide dan porter</small>
                        </div>
                        <div class="form-group">
                            <label class="text-black" for="lname">Total Pendaki</label>
                            <input type="number" name="jml" class="form-control" id="lname" required>
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
                <h2 class="mb-2 text-white">Lets you Explore the Best. Contact Us Now</h2>
                <p class="mb-4 lead text-white text-white-opacity">Keindahan alam adalah anugerah yang menumbuhkan penghargaan dan rasa syukur.</p>
            </div>
        </div>
    </div>
</div>