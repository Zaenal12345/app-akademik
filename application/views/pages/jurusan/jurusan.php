<style>

    .ui-helper-hidden-accessible{
        display: none;
    }

    .select2-container .select2-selection--single .select2-selection__rendered {
        display: block;
        padding-left: 8px;
        padding-right: 20px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .select2-container .select2-selection--single {
        box-sizing: border-box;
        cursor: pointer;
        display: block;
        height: 43px;
        user-select: none;
        -webkit-user-select: none;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #444;
        line-height: 38px;
        border:0px !important;
        outline:0px !important!
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow b {
        border-color: #888 transparent transparent transparent;
        border-style: solid;
        border-width: 5px 4px 0 4px;
        height: 0;
        left: 50%;
        margin-left: -4px;
        margin-top: 5px;
        position: absolute;
        top: 50%;
        width: 0;
    }

    .select2-container--default .select2-selection--single {
        background-color: #fff;
        border:none;
        border-bottom: 1px solid #ced4da;
        border-radius: 1px;
    }
    
</style>

<!-- [ Main Content ] start -->
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Data Jurusan</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url()?>dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Data Jurusan</a></li>
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
                        <h5 class="float-right"><a href="#" data-toggle="modal" data-target="#modal-jurusan" class="btn btn-primary" id="tambah-jurusan"><i class="feather icon-plus"></i> Tambah Data</a></h5>
                        <div style="clear: both;"></div>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table" id="data-jurusan">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="text-transform: capitalize;">Nama Fakultas</th>
                                        <th class="text-center" style="text-transform: capitalize;">Kode Jurusan</th>
                                        <th class="text-center" style="text-transform: capitalize;">Nama Jurusan</th>
                                        <th class="text-center" style="text-transform: capitalize;">Status Akreditasi</th>
                                        <th class="text-center" style="text-transform: capitalize;">Jenjang</th>
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


<div id="modal-jurusan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Form Tambah Jurusan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="frm-jurusan">

                    <div class="form-group">
                        <label for="nama_fakultas"><b>Nama Fakultas :</b></label>
                        <select class="form-control js-select2-fakultas" id="nama_fakultas" name="nama_fakultas" style="width:100%">
                            <option value=""></option>
                            <?php foreach($fakultas as $data):?>
                            <option value="<?= $data->id_fakultas ?>"><?= $data->nama_fakultas ?></option>
                            <?php endforeach;?>
                        </select>
                        <small id="nama_fakultas-err" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label for="kode_jurusan"><b>Kode Jurusan :</b></label>
                        <input type="text" class="form-control" id="kode_jurusan" name="kode_jurusan" placeholder="Masukkan Kode Jurusan">
                        <small id="kode_jurusan-err" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label for="nama_jurusan"><b>Nama Jurusan :</b></label>
                        <input type="text" class="form-control" id="nama_jurusan" name="nama_jurusan" placeholder="Masukkan Nama Jurusan">
                        <small id="nama_jurusan-err" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label for="status_akreditasi"><b>Status Akreditasi :</b></label>
                        <input type="text" class="form-control" id="status_akreditasi" name="status_akreditasi" placeholder="Masukkan Status Akreditasi">
                        <small id="status_akreditasi-err" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label for="jenjang"><b>Jenjang :</b></label>
                        <select class="form-control js-select2-jenjang" id="jenjang" name="jenjang" style="width:100%">
                            <option value=""></option>
                            <option value="D3">D3</option>
                            <option value="S1">S1</option>
                        </select>
                        <small id="jenjang-err" class="form-text text-danger"></small>
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

<div id="modal-jurusan_edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Form Edit Jurusan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="frm-jurusan_edit">

                    <div class="form-group">
                        <label for="kode_jurusan_edit"><b>Kode Jurusan :</b></label>
                        <input type="hidden" name="id_jurusan_edit" id="id_jurusan_edit">
                        <input type="text" class="form-control" name="kode_jurusan_edit" id="kode_jurusan_edit"  placeholder="Masukkan Kode Jurusan" readonly>
                        <small id="kode_jurusan_edit-err" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label for="nama_jurusan_edit"><b>Nama Jurusan :</b></label>
                        <input type="text" class="form-control" name="nama_jurusan_edit" id="nama_jurusan_edit" placeholder="Masukkan Nama Jurusan">
                        <small id="nama_jurusan_edit-err" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label for="nama_fakultas_edit"><b>Nama Fakultas :</b></label>
                        <select class="form-control js-select2-fakultas2" id="nama_fakultas_edit" name="nama_fakultas_edit" style="width:100%">
                            <option value=""></option>
                            <?php foreach($fakultas as $data):?>
                            <option value="<?= $data->id_fakultas ?>"><?= $data->nama_fakultas ?></option>
                            <?php endforeach;?>
                        </select>
                        <small id="nama_fakultas_edit-err" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label for="status_akreditasi_edit"><b>Status Akreditasi :</b></label>
                        <input type="text" class="form-control" id="status_akreditasi_edit" name="status_akreditasi_edit" placeholder="Masukkan Status Akreditasi">
                        <small id="status_akreditasi_edit-err" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label for="jenjang_edit"><b>Jenjang :</b></label>
                        <select class="form-control js-select2-jenjang2" id="jenjang_edit" name="jenjang_edit" style="width:100%">
                            <option value=""></option>
                            <option value="D3">D3</option>
                            <option value="S1">S1</option>
                        </select>
                        <small id="jenjang_edit-err" class="form-text text-danger"></small>
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn  btn-secondary" data-dismiss="modal"><i class="feather icon-x"></i> Tutup</button>
                <button type="submit" class="btn  btn-primary"><i class="feather icon-save"></i> Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>