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
            <h5 class="mb-2 mt-4">Statistik Pegawai</h5>
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
            <h5 class="mb-2 mt-4">Statistik Jabatan Pegawai</h5>
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
                            <h3><?= @$Total_Jab_Kosong ?></h3>

                            <p>Total Jabatan yang Kosong</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-bookmark"></i>
                        </div>
                        <a href="javascript:void(0)" class="small-box-footer viewJabKosong">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- /Piece Card -->
            </div>
            <!-- /.row -->

            <!-- Static Jabatan -->
            <h5 class="mb-2 mt-4">Pemakaian Aula</h5>
            <div class="row">
                <!-- Piece Card -->
                <div class="col-lg-6">
                    <!-- small card -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <!--  -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <?php if (isset($Aula[0]["Tanggal"])) : ?>
                                            <p style="font-size: 18px; margin-bottom: 8px; border-bottom: 1px solid white;"><strong>Pemakaian Aula (<?= longdate_indo(@$Aula[0]["Tanggal"]) ?>)</strong></p>
                                            <p><?= @$Aula[0]["Aula"] ?></p>
                                        <?php else : ?>
                                            <p style="font-size: 18px; margin-bottom: 8px; border-bottom: 1px solid white;"><strong>Tidak Ditemukan Pemakaian Aula</strong></p>
                                            <p><?= @$Aula[0]["Aula"] ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <!--  -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php if (empty($Aula[0]["Keterangan"])) : ?>
                                        <div class="form-group">
                                            <p style="font-size: 18px; margin-bottom: 8px; border-bottom: 1px solid white;"><strong>Keterangan</strong></p>
                                            <?php if (strlen(@$Aula[0]["Keterangan"]) > 180) : ?>
                                                <p><?= substr(@$Aula[0]["Keterangan"], 0, 180) ?> . . . . .</p>
                                            <?php else :  ?>
                                                <p><?= @$Aula[0]["Keterangan"] ?></p>
                                            <?php endif; ?>
                                        </div>
                                    <?php else : ?>
                                        <div class="form-group">
                                            <p style="font-size: 18px; margin-bottom: 8px; border-bottom: 1px solid white;"><strong>Tidak Ditemukan Keterangan</strong></p>
                                        </div>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                        <div class="icon">
                            <!-- <i class="fas fa-bookmark"></i> -->
                        </div>
                        <a href="<?= base_url("PortalAdmin/Aula") ?>" class="small-box-footer">
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

<!-- Modal Jabtan Kosong -->
<div class="modal fade" id="modal_jab" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Jabatan Kosong</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered costum-hover">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 60px;" data-text="">No</th>
                            <th class="text-center" data-text="Kode Jabatan">Kode Jabatan</th>
                            <th class="text-center" data-text="Nama Jabatan">Nama Jabatan</th>
                        </tr>
                    </thead>
                    <tbody id="body_tbl_jab">
                        <!--  -->
                    </tbody>
                </table>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->