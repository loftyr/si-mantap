<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><?= @$Judul ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Content -->

            <!-- Small Box (Stat card) -->
            <h5 class="mb-2 mt-4">Statik Pegawai</h5>
            <div class="row">
                <!-- Piece Card -->
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= @$Total_PNS ?></h3>

                            <p>Total PNS</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="<?= base_url("PortalAdmin/Data-Pegawai") ?>" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- /Piece Card -->

                <!-- Piece Card -->
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= @$Total_PNS_Wanita ?></h3>

                            <p>Total PNS perempuan</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-female"></i>
                        </div>
                        <a href="<?= base_url("PortalAdmin/Data-Pegawai?Jk=Perempuan") ?>" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- /Piece Card -->

                <!-- Piece Card -->
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= @$Total_PNS_Pria ?></h3>

                            <p>Total PNS Laki-Laki</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-male"></i>
                        </div>
                        <a href="<?= base_url("PortalAdmin/Data-Pegawai?Jk=Laki-Laki") ?>" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- /Piece Card -->
            </div>
            <!-- /.row -->

            <!-- Static Jabatan -->
            <h5 class="mb-2 mt-4">Statik Jabatan Pegawai</h5>
            <div class="row">
                <!-- Piece Card -->
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= @$Total_Peg_Jab ?></h3>

                            <p>Total Pegawai yang Memiliki Jabatan</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-bookmark"></i>
                        </div>
                        <a href="<?= base_url("PortalAdmin/Jabatan") ?>" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- /Piece Card -->

                <!-- Piece Card -->
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?= @$Total_Peg_Non_Jab ?></h3>

                            <p>Total Pegawai yang Tidak Memiliki Jabatan</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-bookmark"></i>
                        </div>
                        <a href="javascript:void(0)" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- /Piece Card -->
            </div>
            <!-- /.row -->
        </div>
    </section>
</div>