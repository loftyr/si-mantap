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
                    <table id="tbl_1" class="table table-bordered costum-hover">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 130px;" data-text="Kode Jabatan">Kode Jabatan</th>
                                <th class="text-center" style="width: 150px;" data-text="Nama Jabatan">Nama Jabatan</th>
                                <th class="text-center" style="width: 150px;" data-text="Keterangan">Keterangan</th>
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


<!-- Modal Siswa -->
<div class="modal fade" id="modal_1" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data <?= @$Judul; ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" id="form_1">
                    <input type="hidden" id="Id" name="Id">
                    <div class="callout callout-success">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="Kd_Jabatan">Kode Jabatan</label>
                                    <input type="text" class="form-control" id="Kd_Jabatan" name="Kd_Jabatan" placeholder="Enter Kode Jabatan" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="Nama_Jabatan">Nama Jabatan</label>
                                    <input type="text" class="form-control" id="Nama_Jabatan" name="Nama_Jabatan" placeholder="Enter Nama Jabatan">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="Keterangan">Keterangan</label>
                                    <textarea class="form-control" rows="2" id="Keterangan" name="Keterangan" placeholder="Enter ..."></textarea>
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