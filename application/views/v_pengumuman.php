<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?= @$Judul ?></h1>
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
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <!--  -->
                    <h3 class="card-title"><strong><?= @$Judul ?></strong></h3>
                </div>

                <div class="card-body">
                    <!--  -->
                    <div class="card card-outline card-primary ml-1 mr-1">
                        <div class="card-header">
                            <p class="card-title"><strong>Filter Pencarian</strong></p>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!--  -->
                            <div class="row">
                                <div class="col-lg-4 col-sm-12">
                                    <form action="<?= base_url("Pengumuman") ?>" method="GET">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="Cari" name="Cari" placeholder="Cari Pengumuman" required>
                                            <div class="input-group-prepend">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!--  -->
                        </div>
                        <!-- /.card-body -->
                    </div>

                    <!-- Card Filter -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div id="data_paging" style="min-height: 450px;">
                                <!--  -->

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div id="number_paging">
                                <!--  -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <p class="d-inline"><?= longdate_indo(date('Y-m-d')) ?> ||</p>
                    <p class="d-inline clock"><?= date('H:i:s') ?></p>
                </div>
                <!-- /.card-footer-->
            </div>
        </div>
    </section>
</div>