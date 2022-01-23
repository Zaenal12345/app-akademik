
<!-- [ Main Content ] start -->

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

<section class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Data Mahasiswa</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url()?>dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Data Mahasiswa</a></li>
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
                        <div class="alert alert-info text-center alert-singkronisasi" style="padding-bottom:20px; display:none">Mohon tunggu proses singkronisasi sedang berlangsung &nbsp;
                            <div class="spinner-border text-primary" role="status" style="width:30px;">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                        <!-- <h5 class="float-right"><a href="#" data-toggle="modal" data-target="#modal-mahasiswa" id="tambah-mahasiswa" class="btn btn-primary"><i class="feather icon-plus"></i> Tambah Data</a></h5> -->
                        <h5 class="float-right"><a href="<?= base_url('mahasiswa/create')?>" class="btn btn-primary"><i class="feather icon-plus"></i> Tambah Data</a></h5>
                        <h5 class="float-right"><a href="#" id="singkronisasi-mahasiswa" class="btn btn-primary"><i class="feather icon-refresh-cw"></i> Singkronisasi</a></h5>
                        <div style="clear: both;"></div>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table" id="data-mahasiswa">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="text-transform: capitalize;">Nim</th>
                                        <th class="text-center" style="text-transform: capitalize;">Foto</th>
                                        <th class="text-center" style="text-transform: capitalize;">Nama Mahasiswa</th>
                                        <th class="text-center" style="text-transform: capitalize;">Prodi</th>
                                        <th class="text-center" style="text-transform: capitalize;">Kelas</th>
                                        <th class="text-center" style="text-transform: capitalize;">Status</th>                                    
                                        <th class="text-center" style="text-transform: capitalize;">Jenis Kelamin</th>
                                        <th class="text-center" style="text-transform: capitalize;">Tahun Angkatan</th>
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

<div id="modal-mahasiswa" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Form Tambah Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="frm-mahasiswa">
                    
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Form 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Form 2</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nim"><b>NIM* :</b></label>
                                    <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan NIM">
                                    <small id="nim_err" class="form-text text-danger"></small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nama_mahasiswa"><b>Nama Mahasiswa* :</b></label>
                                    <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa" placeholder="Masukkan Nama Mahasiswa">
                                    <small id="nama_mahasiswa_err" class="form-text text-danger"></small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="jenis_kelamin"><b>Jenis Kelamin* :</b></label>
                                    <select class="form-control js-select2-jenis_kelamin" style="width:100%" name="jenis_kelamin" id="jenis_kelamin">
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="agama"><b>Agama* :</b></label>
                                    <select class="form-control js-select2-agama" style="width:100%" name="agama" id="agama">
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Buddha">Buddha</option>
                                    </select>
                                    <!-- <input type="text" class="form-control" id="agama" name="agama" placeholder="Masukkan Agama"> -->
                                    <small id="agama_err" class="form-text text-danger"></small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="jurusan_id"><b>Program Studi* :</b></label>
                                    <select class="form-control js-select2-jurusan_id" style="width:100%" name="jurusan_id" id="jurusan_id">
                                        <?php foreach($jurusan as $data):?>
                                            <option value="<?= $data->id_jurusan?>"><?= $data->nama_jurusan?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="kelas_id"><b>Kelas* :</b></label>
                                    <select class="form-control js-select2-kelas_id" style="width:100%" name="kelas_id" id="kelas_id">
                                        <?php foreach($kelas as $data):?>
                                            <option value="<?= $data->id_kelas?>"><?= $data->nama_kelas?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nik"><b>NIK* :</b></label>
                                    <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukkan NIK">
                                    <small id="nik_err" class="form-text text-danger"></small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email"><b>Email :</b></label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Email">
                                    <small id="email_err" class="form-text text-danger"></small>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="tempat_lahir"><b>Tempat Lahir* :</b></label>
                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir">
                                    <small id="tempat_lahir_err" class="form-text text-danger"></small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="tanggal_lahir"><b>Tanggal Lahir* :</b></label>
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir">
                                    <small id="tanggal_lahir_err" class="form-text text-danger"></small>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="status_mahasiswa"><b>Status* :</b></label>
                                    <select class="form-control js-select2-status_mahasiswa" style="width:100%" name="status_mahasiswa" id="status_mahasiswa">
                                        <option value="Aktif">Aktif</option>
                                        <option value="Non Aktif">Non Aktif</option>
                                        <option value="Cuti">Cuti</option>
                                        <option value="Keluar">Keluar</option>
                                        <option value="Keluar">Lulus</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="foto"><b>Foto :</b></label>
                                    <input type="file" class="form-control" id="foto" name="foto" placeholder="Masukkan Foto">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="tahun_angkatan"><b>Tahun Angkatan* :</b></label>
                                    <input type="text" class="form-control" id="tahun_angkatan" name="tahun_angkatan" placeholder="Tahun Angkatan">
                                    <small id="tahun_angkatan_err" class="form-text text-danger"></small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="alamat"><b>Alamat :</b></label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat">
                                    <small id="alamat_err" class="form-text text-danger"></small>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nik_ibu"><b>NIK Ibu :</b></label>
                                    <input type="text" class="form-control" id="nik_ibu" name="nik_ibu" placeholder="Masukkan NIK Ibu">
                                    <small id="nik_ibu_err" class="form-text text-danger"></small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nama_ibu"><b>Nama Ibu* :</b></label>
                                    <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" placeholder="Masukkan Nama Ibu">
                                    <small id="nama_ibu_err" class="form-text text-danger"></small>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nik_ayah"><b>NIK Ayah :</b></label>
                                    <input type="text" class="form-control" id="nik_ayah" name="nik_ayah" placeholder="Masukkan NIK Ayah">
                                    <small id="nik_ayah_err" class="form-text text-danger"></small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nama_ayah"><b>Nama Ayah :</b></label>
                                    <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" placeholder="Masukkan Nama Ayah">
                                    <small id="nama_ayah_err" class="form-text text-danger"></small>
                                </div>
                            </div>
                        </div>

                    </div>
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


<div id="modal-mahasiswa_edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Form Edit Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="frm-mahasiswa_edit">
                <input type="hidden" name="id_mahasiswa_edit" id="id_mahasiswa_edit">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home2" role="tab" aria-controls="pills-home" aria-selected="true">Form 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile2" role="tab" aria-controls="pills-profile" aria-selected="false">Form 2</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home2" role="tabpanel" aria-labelledby="pills-home-tab">
                    
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nim_edit"><b>NIM* :</b></label>
                                    <input type="text" class="form-control" id="nim_edit" name="nim_edit" placeholder="Masukkan NIM">
                                    <small id="nim_edit_err" class="form-text text-danger"></small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nama_mahasiswa_edit"><b>Nama Mahasiswa* :</b></label>
                                    <input type="text" class="form-control" id="nama_mahasiswa_edit" name="nama_mahasiswa_edit" placeholder="Masukkan Nama Mahasiswa">
                                    <small id="nama_mahasiswa_edit_err" class="form-text text-danger"></small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="jenis_kelamin_edit"><b>Jenis Kelamin* :</b></label>
                                    <select class="form-control" name="jenis_kelamin_edit" id="jenis_kelamin_edit">
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="agama_edit"><b>Agama* :</b></label>
                                    <select class="form-control" name="agama_edit" id="agama_edit">
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Buddha">Buddha</option>
                                    </select>
                                    <!-- <input type="text" class="form-control" id="agama_edit" name="agama_edit" placeholder="Masukkan Agama"> -->
                                    <small id="agama_edit_err" class="form-text text-danger"></small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="jurusan_id_edit"><b>Program Studi* :</b></label>
                                    <select class="form-control" name="jurusan_id_edit" id="jurusan_id_edit">
                                        <?php foreach($jurusan as $data):?>
                                            <option value="<?= $data->id_jurusan?>"><?= $data->nama_jurusan?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="kelas_id_edit"><b>Kelas* :</b></label>
                                    <select class="form-control" name="kelas_id_edit" id="kelas_id_edit">
                                        <?php foreach($kelas as $data):?>
                                            <option value="<?= $data->id_kelas?>"><?= $data->nama_kelas?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile2" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nik_edit"><b>NIK* :</b></label>
                                    <input type="text" class="form-control" id="nik_edit" name="nik_edit" placeholder="Masukkan NIK">
                                    <small id="nik_edit_err" class="form-text text-danger"></small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email_edit"><b>Email :</b></label>
                                    <input type="text" class="form-control" id="email_edit" name="email_edit" placeholder="Masukkan Email">
                                    <small id="email_edit_err" class="form-text text-danger"></small>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="tempat_lahir_edit"><b>Tempat Lahir* :</b></label>
                                    <input type="text" class="form-control" id="tempat_lahir_edit" name="tempat_lahir_edit" placeholder="Masukkan Tempat Lahir">
                                    <small id="tempat_lahir_edit_err" class="form-text text-danger"></small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="tanggal_lahir_edit"><b>Tanggal Lahir* :</b></label>
                                    <input type="date" class="form-control" id="tanggal_lahir_edit" name="tanggal_lahir_edit" placeholder="Masukkan Tanggal Lahir">
                                    <small id="tanggal_lahir_edit_err" class="form-text text-danger"></small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="status_mahasiswa_edit"><b>Status* :</b></label>
                                    <select class="form-control" name="status_mahasiswa_edit" id="status_mahasiswa_edit">
                                        <option value="Aktif">Aktif</option>
                                        <option value="Tidak Aktif">Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="foto"><b>Foto :</b></label>
                                    <input type="file" class="form-control" id="foto" name="foto" placeholder="Masukkan Foto">
                                    <input type="hidden" name="foto_lama" id="foto_lama">
                                    <small>Upload jika ingin mengganti foto.</small>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="tahun_angkatan_edit"><b>Tahun Angkatan* :</b></label>
                                    <input type="text" class="form-control" id="tahun_angkatan_edit" name="tahun_angkatan_edit" placeholder="Tahun Angkatan">
                                    <small id="tahun_angkatan_edit_err" class="form-text text-danger"></small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="alamat_edit"><b>Alamat :</b></label>
                                    <input type="text" class="form-control" id="alamat_edit" name="alamat_edit" placeholder="Masukkan Alamat">
                                    <small id="alamat_edit_err" class="form-text text-danger"></small>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nik_ibu_edit"><b>NIK Ibu :</b></label>
                                    <input type="text" class="form-control" id="nik_ibu_edit" name="nik_ibu_edit" placeholder="Masukkan NIK Ibu">
                                    <small id="nik_ibu_edit_err" class="form-text text-danger"></small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nama_ibu_edit"><b>Nama Ibu* :</b></label>
                                    <input type="text" class="form-control" id="nama_ibu_edit" name="nama_ibu_edit" placeholder="Masukkan Nama Ibu">
                                    <small id="nama_ibu_edit_err" class="form-text text-danger"></small>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nik_ayah_edit"><b>NIK Ayah :</b></label>
                                    <input type="text" class="form-control" id="nik_ayah_edit" name="nik_ayah_edit" placeholder="Masukkan NIK Ayah">
                                    <small id="nik_ayah_edit_err" class="form-text text-danger"></small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nama_ayah_edit"><b>Nama Ayah :</b></label>
                                    <input type="text" class="form-control" id="nama_ayah_edit" name="nama_ayah_edit" placeholder="Masukkan Nama Ayah">
                                    <small id="nama_ayah_edit_err" class="form-text text-danger"></small>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="feather icon-x"></i></button>
                <button type="submit" class="btn btn-primary"><i class="feather icon-save"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>