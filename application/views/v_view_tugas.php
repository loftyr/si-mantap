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
                        <h3 class="card-title"><strong><?= @$Data[0]["Judul"] ?></strong></h3>
                    </div>
                    <div class="card-body">
                        <!--  -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <p style="font-size: 18px; margin-bottom: 8px; border-bottom: 1px solid black;"><strong>Tanggal Berakhir</strong></p>
                                    <p><?= longdate_indo(explode(" ", $Data[0]["Tgl_End"])[0]) . " || Jam " . explode(" ", $Data[0]["Tgl_End"])[1] ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <p style="font-size: 18px; margin-bottom: 8px; border-bottom: 1px solid black;"><strong>Keterangan</strong></p>

                                <?= @$Data[0]["Keterangan"]; ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <p style="font-size: 18px; margin-bottom: 8px; border-bottom: 1px solid black;"><strong>Lampiran</strong></p>

                                    <?php if ($Data[0]["File"] != "") : ?>
                                        <a href="<?= base_url("FileUpload/" . $Data[0]["File"]) ?>" target="_blank" class="badge badge-primary">File Lampiran</a>
                                    <?php else : ?>
                                        <a href="javascript:void(0)" class="badge badge-secondary">File Tidak Ditemukan</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <p style="font-size: 18px; margin-bottom: 8px; border-bottom: 1px solid black;"><strong>Upload Tugas</strong></p>

                                    <?php if ($Data[0]["Tgl_End"] >= date("Y-m-d H:i:s")) : ?>
                                        <button class="btn btn-primary btn-xs btnUploadTugas">Upload Tugas</button>
                                    <?php else : ?>
                                        <a href="javascript:void(0)" class="badge badge-secondary">Jadwal Telah Selesai</a>
                                    <?php endif; ?>
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

<!-- Modal -->
<div class="modal fade" id="modal_1" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Upload Tugas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" id="form_1" enctype="multipart/form-data" method="POST">
                    <input type="hidden" id="UID" name="UID" value="<?= $Data[0]["UID"] ?>">
                    <div class="callout callout-success">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="Nip">No Induk Pegawai (NIP)</label>
                                    <input type="text" class="form-control" id="Nip" name="Nip" placeholder="Input NIP Pegawai">
                                </div>
                            </div>
                        </div> <!-- End Class row -->
                    </div> <!-- End Class callout -->

                    <div class="callout callout-info">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="Keterangan">Keterangan</label>
                                    <textarea class="form-control" rows="2" id="Keterangan" name="Keterangan" placeholder="Enter ..."></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="Lampiran">Lampiran</label>
                                    <input type="File" name="Lampiran" id="Lampiran" class="form-control">
                                    <span class="text-muted">MAX Lampiran 10MB. Lampiran berbentuk PDF / Dokumen Office</span>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-warning progress-bar-striped" id="progress_upload" role="progressbar" aria-valuenow="0" aria-valuemin="" aria-valuemax="100" style="width: 0%;">
                                        0%
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                <button type="submit" class="btn btn-primary btnSimpan_1" form="form_1"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->