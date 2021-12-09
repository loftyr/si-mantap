<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIPASTI | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('include/plugins/fontawesome-free/css/all.min.css') ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url('include/ionicons/css/ionicons.min.css') ?>">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('include/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('include/admin_lte/css/adminlte.min.css') ?>">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <!-- <a href="<?= base_url() ?>">SI<b>PASTI</b></a> -->
            <img width="200" src="<?= base_url("assets/img/logo.png") ?>" alt="">
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in</p>

                <form action="#" method="post" id="form_1">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" name="Username" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <!-- Check Error Login -->
                    <?php if ($this->session->flashdata('login_err')) : ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-danger" style="text-align: center;" role="alert">
                                    <?= $this->session->flashdata('login_err'); ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-7">
                            <div class="icheck-primary">
                                <!-- <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label> -->
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-5">
                            <button type="submit" class="btn btn-primary btn-block" id="btnLogin" form="form_1">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url('include/plugins/jquery/jquery.min.js') ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('include/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- Toast -->
    <script src="<?= base_url('include/toast/jquery.toast.min.js') ?>"></script>
    <!-- Toast -->
    <link rel="stylesheet" href="<?= base_url('include/toast/jquery.toast.min.css') ?>">
    <!-- AdminLTE App -->
    <script src="<?= base_url('include/admin_lte/js/adminlte.min.js') ?>"></script>

    <script>
        const _url = "Login/";

        $(document).ready(function() {
            $('#form_1').submit(function(e) {
                e.preventDefault();
                $.toast({
                    heading: 'Information',
                    text: 'Loading Auth. . .',
                    position: 'top-right'
                });

                $("#btnLogin")[0].disabled = true;
                $("#btnLogin").html('<img src="assets/gif/loadbtn.svg"/> Memuat...');

                var formData = $(this).serialize();

                $.ajax({
                    url: _url + 'Auth',
                    type: "POST",
                    dataType: "JSON",
                    data: formData,
                    success: function(result) {
                        if (result.Status == true) {
                            $.toast({
                                heading: 'Information',
                                text: result.Pesan,
                                position: 'top-right'
                            });
                            var delay = 1000;
                            setTimeout(function() {
                                window.location.href = 'PortalAdmin/Dashboard';
                                // if (result.Level === "Admin Pusat" || result.Level === "Super Admin") {
                                //     window.location.href = 'PortalAdminPusat/Dashboard';
                                // } else if (result.Level === "Admin") {
                                //     window.location.href = 'PortalAdmin/Dashboard';
                                // } else {
                                //     window.location.href = 'PortalUser/Dashboard';
                                // }
                            }, delay);
                        } else {
                            $.toast({
                                heading: 'Error',
                                text: result.Pesan,
                                position: 'top-right'
                            });
                        }

                        $("#btnLogin")[0].disabled = false;
                        $("#btnLogin").html('Login');
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        $.toast({
                            heading: 'Error',
                            text: 'Tidak Diketahui, Hubungin Admin !!!',
                            position: 'top-right'
                        });
                        $("#btnLogin")[0].disabled = false;
                        $("#btnLogin").html('Login');
                    }
                });
            });
        });
    </script>

</body>

</html>