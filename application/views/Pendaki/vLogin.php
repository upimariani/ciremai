<!doctype html>
<html lang="en">

<head>
    <title>LOGIN PENDAKI</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="<?= base_url('asset/login-form-20/') ?>css/style.css">

</head>

<body class="img js-fullheight" style="background-image: url(http://localhost/ciremai/asset/login-form-20/images/bg.jpg);">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Login Pendaki</h2>
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
                    <?php
                    if ($this->session->userdata('success')) {
                    ?>
                        <div class="alert alert-success">
                            <h5>Informasi!</h5>
                            <p><?= $this->session->userdata('success') ?></p>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <form action="<?= base_url('Pendaki/cAuth/signin') ?>" method="POST" class="signin-form">
                            <div class="form-group">
                                <input type="text" name="username" class="form-control" placeholder="Username" required>
                            </div>
                            <div class="form-group">
                                <input id="password-field" name="password" type="password" class="form-control" placeholder="Password" required>
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
                            </div>
                            <div class="form-group d-md-flex">

                                <div class="w-100 text-md-right">
                                    Belum Memiliki Akun?<a href="<?= base_url('pendaki/cAuth/register') ?>" style="color: #fff"> Register Disini!!!</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="<?= base_url('asset/login-form-20/') ?>js/jquery.min.js"></script>
    <script src="<?= base_url('asset/login-form-20/') ?>js/popper.js"></script>
    <script src="<?= base_url('asset/login-form-20/') ?>js/bootstrap.min.js"></script>
    <script src="<?= base_url('asset/login-form-20/') ?>js/main.js"></script>

</body>

</html>