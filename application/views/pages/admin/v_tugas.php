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
                    <button class="btn btn-primary btn-sm btnTambah_1">
                        <i class="fas fa-plus"></i> Tambah <?= @$Judul ?>
                    </button>
                    <button class="btn btn-info btn-sm btnRefresh_1">
                        <i class="fas fa-sync-alt"></i>
                    </button>
                </div>
                <div class="card-body">
                    <!--  -->
                    <!-- <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Sektor Usaha</label>
                                <select class="form-control select2" style="width: 100%;" id="filterKelurahan" name="filterKelurahan" required>
                                    <option selected="selected" value="">Semua</option>
                                </select>
                            </div>
                        </div>
                    </div> -->
                    <!--  -->
                    <table id="tbl_1" class="table table-bordered costum-hover w-100">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 250px;" data-text="Judul">Judul</th>
                                <th class="text-center" style="width: 150px;" data-text="Keterangan">Keterangan</th>
                                <th class="text-center" style="width: 150px;" data-text="File">File</th>
                                <th class="text-center" style="width: 120px;" data-text="Tanggal Berakhir">Tanggal Berakhir</th>
                                <th class="text-center" style="width: 80px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="body_tbl_1">

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <p class="d-inline"><?= date('d-M-Y') ?> ||</p>
                    <p class="d-inline clock"><?= date('H:i:s') ?></p>
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->
        </div>
    </section>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_1" data-backdrop="static">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data <?= @$Judul ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" id="form_1" enctype="multipart/form-data">
                    <input type="hidden" id="UID" name="UID">
                    <div class="callout callout-success">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="form-group">
                                    <label for="Judul">Judul</label>
                                    <input type="text" class="form-control" id="Judul" name="Judul" placeholder="Input Judul">
                                </div>
                            </div>

                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label for="Tgl_End">Tanggal Berakhir</label>
                                    <div class="input-group date Tanggal_Indo" id="Tgl_End" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#Tgl_End" id="val_Tgl_End" name="Tgl_End" data-toggle="datetimepicker" autocomplete="off" required />
                                        <div class="input-group-append" data-target="#Tgl_End" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    <small class="form-text text-muted"># dd-mm-yyyy</small>
                                </div>
                            </div>
                        </div> <!-- End Class row -->
                    </div> <!-- End Class callout -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="Keterangan">Keterangan</label>
                                <textarea id="Keterangan"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="callout callout-info">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="File">File</label>
                                    <input type="file" name="File" id="File" class="form-control">
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

<!-- Modal -->
<div class="modal fade" id="modal_keterangan" data-backdrop="static">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Keterangan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--  -->
                <div class="container">
                    <div class="field_keterangan">
                        <!--  -->
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                <!-- <button type="submit" class="btn btn-primary btnSimpan_1" form="form_1"><i class="fas fa-save"></i> Simpan</button> -->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->