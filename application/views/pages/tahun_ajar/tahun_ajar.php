
<!-- [ Main Content ] start -->
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Data Tahun Ajar</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url()?>dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Data Tahun Ajar</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ basic-table ] start -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="float-right"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-tahun_ajar"><i class="feather icon-plus"></i> Tambah Data</a></h5>
                        <div style="clear: both;"></div>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table" id="data-tahun_ajar">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="text-transform: capitalize;">Kode Tahun Ajar</th>
                                        <th class="text-center" style="text-transform: capitalize;">Tahun Ajar</th>
                                        <th class="text-center" style="text-transform: capitalize;">Status</th>
                                        <th class="text-center" style="text-transform: capitalize;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ basic-table ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</section>
<!-- [ Main Content ] end -->


<div id="modal-tahun_ajar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Form Tambah Tahun Ajar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="frm-tahun_ajar">

                    <div class="form-group">
                        <label for="kode_tahun_ajar">Kode Tahun Ajar</label>
                        <input type="text" class="form-control" id="kode_tahun_ajar" name="kode_tahun_ajar" placeholder="Masukkan Kode Tahun Ajar">
                        <small id="kode_tahun_ajar-err" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label for="tahun_ajar">Tahun Ajar</label>
                        <input type="text" class="form-control" id="tahun_ajar" name="tahun_ajar" placeholder="Masukkan Tahun Ajar">
                        <small id="tahun_ajar-err" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label for="nama_kelas">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                        </select>
                        <small id="status_edit-err" class="form-text text-danger"></small>
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="feather icon-x"></i> Tutup</button>
                <button type="submit" class="btn btn-primary"><i class="feather icon-save"></i> Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="modal-tahun_ajar_edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Form Tambah Tahun Ajar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="frm-tahun_ajar_edit">

                    <div class="form-group">
                        <label for="kode_tahun_ajar_edit">Kode Tahun Ajar</label>
                        <input type="text" class="form-control" id="kode_tahun_ajar_edit" name="kode_tahun_ajar_edit" placeholder="Masukkan Tahun Ajar">
                        <small id="kode_tahun_ajar_edit-err" class="form-text text-danger"></small>
                    </div>

                    <div class="form-group">
                        <label for="tahun_ajar_edit">Tahun Ajar</label>
                        <input type="hidden" name="id_tahun_ajar_edit" id="id_tahun_ajar_edit">
                        <input type="text" class="form-control" id="tahun_ajar_edit" name="tahun_ajar_edit" placeholder="Masukkan Tahun Ajar">
                        <small id="tahun_ajar_edit-err" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label for="status_edit">Status</label>
                        <select name="status_edit" id="status_edit" class="form-control">
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                        </select>
                        <small id="status_edit-err" class="form-text text-danger"></small>
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="feather icon-x"></i> Tutup</button>
                <button type="submit" class="btn btn-primary"><i class="feather icon-save"></i> Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
