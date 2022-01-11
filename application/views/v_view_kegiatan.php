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
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <!--  -->
                    <a class="btn btn-primary btn-sm" href="<?= base_url("Portal-Kegiatan") ?>"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
                <div class="card-body">
                    <!--  -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <p style="font-size: 18px; margin-bottom: 8px; border-bottom: 1px solid black;"><strong>Kegiatan</strong></p>
                                <p><?= @$Data[0]["Kegiatan"] ?></p>
                            </div>
                        </div>
                    </div>

                    <!--  -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <p style="font-size: 18px; margin-bottom: 8px; border-bottom: 1px solid black;"><strong>Nomor</strong></p>
                                <p><?= @$Data[0]["Nomor"] ?></p>
                            </div>
                        </div>
                    </div>

                    <!--  -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <p style="font-size: 18px; margin-bottom: 8px; border-bottom: 1px solid black;"><strong>Tanggal</strong></p>
                                <p><?= longdate_indo($Data[0]["Tanggal"]) ?></p>
                            </div>
                        </div>
                    </div>

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
        </div>
    </section>
</div>