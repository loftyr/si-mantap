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
                    <button class="btn btn-info btn-sm btnRefresh_1">
                        <i class="fas fa-sync-alt"></i>
                    </button>
                </div>
                <div class="card-body">
                    <!--  -->
                    <div class="callout callout-success">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Status Pensiun</label>
                                    <select class="form-control select2" style="width: 100%;" id="filterStatus" name="filterStatus" required>
                                        <option selected="selected" value="">Semua</option>
                                        <option value="<=450">Sudah Mendekati (<= 15 Bulan)</option>
                                        <option value=">450">Belum Mendekati (> 15 Bulan)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                    <table id="tbl_1" class="table table-bordered costum-hover">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 250px;" data-text="Nama">Nama</th>
                                <th class="text-center" style="width: 200px;" data-text="Nip">NIP</th>
                                <th class="text-center" style="width: 200px;" data-text="Berkala Terakhir">Berkala Terakhir</th>
                                <th class="text-center" style="width: 200px;" data-text="Berkala Berikutnya">Berkala Berikutnya</th>
                                <th class="text-center" style="width: 80px;" data-text="Delay">Delay (Bulan)</th>
                                <th class="text-center" style="width: 150px;" data-text="No. Hp">No. Hp</th>
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
                <form action="#" id="form_1">
                    <input type="hidden" id="UID" name="UID">
                    <div class="callout callout-success">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="Nama">Nama Pegawai</label>
                                    <input type="text" class="form-control" id="Nama" name="Nama" placeholder="Input Nama Pegawai">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="Nip">No Induk Pegawai (NIP)</label>
                                    <input type="text" class="form-control" id="Nip" name="Nip" placeholder="Input NIP Pegawai">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="No_Hp">No. Hp</label>
                                    <input type="text" class="form-control" id="No_Hp" name="No_Hp" placeholder="Input No. Hp" required>
                                </div>
                            </div>
                        </div> <!-- End Class row -->
                    </div> <!-- End Class callout -->

                    <div class="callout callout-info">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="Tgl_Lahir">Tanggal Lahir</label>
                                    <div class="input-group date Tanggal_Indo" id="Tgl_Lahir" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#Tgl_Lahir" id="val_Tgl_Lahir" name="Tgl_Lahir" data-toggle="datetimepicker" autocomplete="off" required />
                                        <div class="input-group-append" data-target="#Tgl_Lahir" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    <small class="form-text text-muted"># dd-mm-yyyy</small>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="Berkala_Terakhir">Berkala Terakhir</label>
                                    <div class="input-group date Tanggal_Indo" id="Berkala_Terakhir" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#Berkala_Terakhir" id="val_Berkala_Terakhir" name="Berkala_Terakhir" data-toggle="datetimepicker" autocomplete="off" required />
                                        <div class="input-group-append" data-target="#Berkala_Terakhir" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    <small class="form-text text-muted"># dd-mm-yyyy</small>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="Pangkat">Pangkat Terakhir</label>
                                    <input type="text" class="form-control" id="Pangkat" name="Pangkat" placeholder="Input Pangkat Terakhir">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="Pangkat_Terakhir">Tanggal Pangkat Terakhir</label>
                                    <div class="input-group date Tanggal_Indo" id="Pangkat_Terakhir" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#Pangkat_Terakhir" id="val_Pangkat_Terakhir" name="Pangkat_Terakhir" data-toggle="datetimepicker" autocomplete="off" required />
                                        <div class="input-group-append" data-target="#Pangkat_Terakhir" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                    <small class="form-text text-muted"># dd-mm-yyyy</small>
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