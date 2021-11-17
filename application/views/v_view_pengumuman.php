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

            <?php if ($Status == "True") : ?>
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <!--  -->
                        <a class="btn btn-primary btn-sm" href="<?= base_url("Pengumuman") ?>"><i class="fas fa-arrow-left"></i> Kembali</a>
                    </div>
                    <div class="card-body">
                        <!--  -->
                        <div class="row">
                            <div class="col-lg-12">
                                <p style="font-size: 18px; margin-bottom: 8px; border-bottom: 1px solid black;"><strong>Judul</strong></p>

                                <p class="card-title"><?= @$Data[0]["Judul"] ?></p>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-12">
                                <p style="font-size: 18px; margin-bottom: 8px; border-bottom: 1px solid black;"><strong>Keterangan</strong></p>

                                <?= @$Data[0]["Keterangan"]; ?>
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
            <?php else : ?>
                <!-- Default box -->
                <div class="card card-danger">
                    <div class="card-header">
                        <!--  -->
                        <h3 class="card-title">Error</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <!--  -->
                        <p><strong><?= @$Message; ?></strong></p>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <p class="d-inline"><?= longdate_indo(date('Y-m-d')) ?> ||</p>
                        <p class="d-inline clock"><?= date('H:i:s') ?></p>
                    </div>
                    <!-- /.card-footer-->
                </div>
            <?php endif; ?>
            <!-- /.card -->
        </div>
    </section>
</div>