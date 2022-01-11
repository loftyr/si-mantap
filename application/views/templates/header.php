<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= @$Judul ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('include/plugins/fontawesome-free/css/all.min.css') ?>">
    <!-- Ionicons -->
    <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="<?= base_url('include/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') ?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url('include/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
    <!-- JQVMap -->
    <!-- <link rel="stylesheet" href="<?= base_url('include/plugins/jqvmap/jqvmap.min.css') ?>"> -->
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('include/admin_lte/css/adminlte.min.css') ?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url('include/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url('include/plugins/daterangepicker/daterangepicker.css') ?>">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('include/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('include/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('include/plugins/datatables-fixedcolumns/css/fixedColumns.bootstrap4.min.css') ?>">

    <!-- summernote -->
    <!-- <link rel="stylesheet" href="<?= base_url('include/plugins/summernote/summernote-bs4.css') ?>"> -->
    <!-- SweetAlert 2 -->
    <link rel="stylesheet" href="<?= base_url('include/sweetalert2/sweetalert2.min.css') ?>">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url('include/plugins/select2/css/select2.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('include/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') ?>">

    <!-- Pace-Progress -->
    <link rel="stylesheet" href="<?= base_url('include/plugins/pace-progress/themes/black/pace-theme-flat-top.css') ?>">
    <!-- Boostrap Switch -->
    <link rel="stylesheet" href="<?= base_url('include/plugins/bootstrap-switch/css/bootstrap3/bootstrap-switch.min.css') ?>">

    <!-- Google Font: Source Sans Pro -->
    <link href="<?= base_url('include/css/fonts.css') ?>" rel="stylesheet">
    <link href="<?= base_url('include/animate.css') ?>" rel="stylesheet">
    <link href="<?= base_url('include/css/base.css') ?>" rel="stylesheet">
    <!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> -->
</head>

<body class="hold-transition sidebar-mini layout-fixed pace-secondary">
    <div class="loading_page d-none"><img src="<?= base_url('assets/gif/load.svg') ?>" alt=""></div>
    <div class="wrapper">

        <!-- Navbar -->
        <!-- Old Color = navbar-white navbar-light -->
        <nav class="main-header navbar navbar-expand costum-bg-main-header">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="javascript:void(0)" class="nav-link">Home</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item" style="border-right: 2px solid white;">
                    <a class="nav-link" href="#">
                        <i class="fas fa-user"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)">
                        Welcome
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <!-- old Color = sidebar-dark-primary -->
        <aside class="main-sidebar custom-bg-aside elevation-4">
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?= base_url('assets/img/laptop-user.svg') ?>" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">SI<b>PASTI</b></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="javascript:void(0)" class="nav-link <?= @$Tugas ?>">
                                <i class="nav-icon fas fa-home"></i>
                                <p>Lihat Tugas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url("Pengumuman") ?>" class="nav-link <?= @$Pengumuman ?>">
                                <i class="nav-icon fas fa-home"></i>
                                <p>Pengumuman</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url("Portal-Kegiatan") ?>" class="nav-link <?= @$Portal_Kegiatan ?>">
                                <i class="nav-icon fas fa-home"></i>
                                <p>Portal Kegiatan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url("Portal-Aula") ?>" class="nav-link <?= @$Portal_Aula ?>">
                                <i class="nav-icon fas fa-home"></i>
                                <p>Portal Aula</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>