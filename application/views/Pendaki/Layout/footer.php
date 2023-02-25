<div class="site-footer">
    <div class="inner first">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="widget">
                        <h3 class="heading">Tentang Gunung Ciremai</h3>
                        <p>Gunung Ciremai merupakan gunung berapi aktif berbentuk kerucut dengan tipe stato dengan kawah ganda di puncaknya.</p>
                    </div>
                    <div class="widget">
                        <ul class="list-unstyled social">
                            <li><a href="#"><span class="icon-twitter"></span></a></li>
                            <li><a href="#"><span class="icon-instagram"></span></a></li>
                            <li><a href="#"><span class="icon-facebook"></span></a></li>
                            <li><a href="#"><span class="icon-linkedin"></span></a></li>
                            <li><a href="#"><span class="icon-dribbble"></span></a></li>
                            <li><a href="#"><span class="icon-pinterest"></span></a></li>
                            <li><a href="#"><span class="icon-apple"></span></a></li>
                            <li><a href="#"><span class="icon-google"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="widget">

                        <ul class="links list-unstyled quick-info links">
                            <li>
                                <h3 class="heading">Informasi</h3>
                            </li>
                            <li><a href="#"><strong>3.078</strong> mdpl</a></li>
                            <li><a href="#"><strong>Stratovolcano</strong></a></li>
                            <li class="phone"><a href="#">089 532 405 5023</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="inner dark">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-8 mb-3 mb-md-0 mx-auto">
                    <p>
                        GUNUNG CIREMAI
                    </p>
                </div>

            </div>
        </div>
    </div>
</div>

<div id="overlayer"></div>
<div class="loader">
    <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>

<script src="<?= base_url('asset/tour-1.0.0/') ?>js/jquery-3.4.1.min.js"></script>
<script src="<?= base_url('asset/tour-1.0.0/') ?>js/popper.min.js"></script>
<script src="<?= base_url('asset/tour-1.0.0/') ?>js/bootstrap.min.js"></script>
<script src="<?= base_url('asset/tour-1.0.0/') ?>js/owl.carousel.min.js"></script>
<script src="<?= base_url('asset/tour-1.0.0/') ?>js/jquery.animateNumber.min.js"></script>
<script src="<?= base_url('asset/tour-1.0.0/') ?>js/jquery.waypoints.min.js"></script>
<script src="<?= base_url('asset/tour-1.0.0/') ?>js/jquery.fancybox.min.js"></script>
<script src="<?= base_url('asset/tour-1.0.0/') ?>js/aos.js"></script>
<script src="<?= base_url('asset/tour-1.0.0/') ?>js/moment.min.js"></script>
<script src="<?= base_url('asset/tour-1.0.0/') ?>js/daterangepicker.js"></script>

<script src="<?= base_url('asset/tour-1.0.0/') ?>js/typed.js"></script>
<script>
    datePickerId.min = new Date().toISOString().split("T")[0];
</script>
<script>
    $(function() {
        var slides = $('.slides'),
            images = slides.find('img');

        images.each(function(i) {
            $(this).attr('data-id', i + 1);
        })

        var typed = new Typed('.typed-words', {
            strings: ["Palutungan."],
            typeSpeed: 80,
            backSpeed: 80,
            backDelay: 4000,
            startDelay: 1000,
            loop: true,
            showCursor: true,
            preStringTyped: (arrayPos, self) => {
                arrayPos++;
                console.log(arrayPos);
                $('.slides img').removeClass('active');
                $('.slides img[data-id="' + arrayPos + '"]').addClass('active');
            }

        });
    })
</script>
<script>
    function hanyaAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))

            return false;
        return true;
    }
</script>
<script src="<?= base_url('asset/tour-1.0.0/') ?>js/custom.js"></script>
<script>
    console.log = function() {}
    $("#guide").on('change', function() {

        $(".harga-guide").html($(this).find(':selected').attr('data-harga-guide'));
        $(".harga-guide").val($(this).find(':selected').attr('data-harga-guide'));


    });
</script>
<script>
    console.log = function() {}
    $("#porter").on('change', function() {

        $(".harga-porter").html($(this).find(':selected').attr('data-harga-porter'));
        $(".harga-porter").val($(this).find(':selected').attr('data-harga-porter'));


    });
</script>
</body>

</html>