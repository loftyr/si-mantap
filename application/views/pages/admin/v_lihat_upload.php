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
                    <a class="btn btn-primary btn-sm" href="<?= base_url($_uri . "/Tugas") ?>"><i class="fas fa-arrow-left"></i> Kembali</a>
                    <button class="btn btn-info btn-sm btnRefresh_1" dataId="<?= $this->uri->segment(4); ?>">
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
                    <table id="tbl_1" class="table table-bordered costum-hover">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 250px;" data-text="Nama">Nama</th>
                                <th class="text-center" style="width: 200px;" data-text="Nip">NIP</th>
                                <th class="text-center" style="width: 150px;" data-text="Tanggal Lahir">Tanggal Lahir</th>
                                <th class="text-center" style="width: 150px;" data-text="Berkala Terakhir">Berkala Terakhir</th>
                                <th class="text-center" style="width: 200px;" data-text="Pangkat Terakhir">Pangkat Terakhir</th>
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?= @$Judul ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table" id="tbl_2">
                    <thead>
                        <tr>
                            <th>Nip</th>
                            <th>Nama</th>
                            <th>File</th>
                        </tr>
                    </thead>
                    <tbody id="body_tbl_2">
                        <!-- Isi Data -->
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