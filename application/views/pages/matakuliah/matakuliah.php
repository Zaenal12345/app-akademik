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
                            <h5 class="m-b-10">Data Matakuliah</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url()?>dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Data Matakuliah</a></li>
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
                        <h5 class="float-right"><a href="#" data-toggle="modal" data-target="#modal-matakuliah" class="btn btn-primary" id="tambah-matakuliah"><i class="feather icon-plus"></i> Tambah Data</a></h5>
                        <div style="clear: both;"></div>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table" id="data-matakuliah">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="text-transform: capitalize;">Kode Matakuliah</th>
                                        <th class="text-center" style="text-transform: capitalize;">Nama Matakuliah</th>
                                        <th class="text-center" style="text-transform: capitalize;">SKS</th>
                                        <th class="text-center" style="text-transform: capitalize;">Semester</th>
                                        <th class="text-center" style="text-transform: capitalize;">Jurusan</th>
                                        <th class="text-center" style="text-transform: capitalize;">Jenis</th>
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


<div id="modal-matakuliah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Form Tambah Matakuliah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="frm-matakuliah">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kode_matakuliah"><b>Kode Matakuliah :</b></label>
                                <input type="text" class="form-control" id="kode_matakuliah" name="kode_matakuliah" placeholder="Masukkan Kode Matakuliah">
                                <small id="kode_matakuliah-err" class="form-text text-danger"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_matakuliah"><b>Nama Matakuliah :</b></label>
                                <input type="text" class="form-control" id="nama_matakuliah" name="nama_matakuliah" placeholder="Masukkan Nama Matakuliah">
                                <small id="nama_matakuliah-err" class="form-text text-danger"></small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sks"><b>SKS :</b></label>
                                <select name="sks" id="sks" class="form-control" style="width:100%"> 
                                    <option></option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                                <!-- <input type="text" class="form-control" id="sks" name="sks" placeholder="Masukkan SKS"> -->
                                <small id="sks-err" class="form-text text-danger"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="semester"><b>Semester :</b></label>
                                <select name="semester" id="semester" class="form-control" style="width:100%"> 
                                    <option></option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                </select>
                                <small id="semester-err" class="form-text text-danger"></small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jurusan"><b>Jurusan :</b></label>
                                <select name="jurusan" id="jurusan" class="form-control" style="width:100%">
                                    <option></option>
                                    <?php foreach($jurusan as $data):?>
                                        <option value="<?= $data->id_jurusan?>"><?= $data->nama_jurusan?></option>
                                    <?php endforeach;?>
                                </select>
                                <small id="jurusan-err" class="form-text text-danger"></small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jenis"><b>Jenis :</b></label>
                                <select name="jenis" id="jenis" class="form-control" style="width:100%"> 
                                    <option></option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                </select>
                                <small id="jenis-err" class="form-text text-danger"></small>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="status"><b>Status :</b></label>
                        <select name="status" id="status" class="form-control" style="width:100%">
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                        </select>
                        <small id="status-err" class="form-text text-danger"></small>
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

<div id="modal-matakuliah_edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Form Edit Fakultas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="frm-matakuliah_edit">
                    
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kode_matakuliah_edit"><b>Kode Matakuliah :</b></label>
                            <input type="hidden" name="id_matakuliah_edit" id="id_matakuliah_edit">
                            <input type="text" class="form-control" name="kode_matakuliah_edit" id="kode_matakuliah_edit"  placeholder="Masukkan Kode Matakuliah" readonly>
                            <small id="kode_matakuliah_edit-err" class="form-text text-danger"></small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_matakuliah_edit"><b>Nama Matakuliah :</b></label>
                            <input type="text" class="form-control" name="nama_matakuliah_edit" id="nama_matakuliah_edit" placeholder="Masukkan Nama Matakuliah">
                            <small id="nama_matakuliah_edit-err" class="form-text text-danger"></small>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="sks_edit"><b>SKS :</b></label>
                            <select name="sks_edit" id="sks_edit" class="form-control" style="width:100%"> 
                                <option></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                            <!-- <input type="text" class="form-control" id="sks" name="sks" placeholder="Masukkan SKS"> -->
                            <small id="sks_edit-err" class="form-text text-danger"></small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="semester_edit"><b>Semester :</b></label>
                            <select name="semester_edit" id="semester_edit" class="form-control" style="width:100%"> 
                                <option></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                            </select>
                            <small id="semester_edit-err" class="form-text text-danger"></small>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jurusan_edit"><b>Jurusan :</b></label>
                            <select name="jurusan_edit" id="jurusan_edit" class="form-control" style="width:100%">
                                <option></option>
                                <?php foreach($jurusan as $data):?>
                                    <option value="<?= $data->id_jurusan?>"><?= $data->nama_jurusan?></option>
                                <?php endforeach;?>
                            </select>
                            <small id="jurusan_edit-err" class="form-text text-danger"></small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jenis_edit"><b>Jenis :</b></label>
                            <select name="jenis_edit" id="jenis_edit" class="form-control" style="width:100%"> 
                                <option></option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="E">E</option>
                            </select>
                            <small id="jenis_edit-err" class="form-text text-danger"></small>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="status_edit"><b>Status :</b></label>
                    <select name="status_edit" id="status_edit" class="form-control" style="width:100%">
                        <option value="Aktif">Aktif</option>
                        <option value="Tidak Aktif">Tidak Aktif</option>
                    </select>
                    <small id="status_edit-err" class="form-text text-danger"></small>
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