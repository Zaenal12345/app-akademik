
<!-- [ Main Content ] start -->
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Data Dosen</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url()?>dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Data Dosen</a></li>
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
                        <!-- <h5 class="float-right"><a href="<?= base_url()?>dosen/create" class="btn btn-primary" id="tambah-dosen">Tambah Data</a></h5> -->
                        <h5 class="float-right"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-dosen" id="tambah-dosen"><i class="feather icon-plus"></i> Tambah Data</a></h5>
                        <div style="clear: both;"></div>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table" id="data-dosen">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="text-transform: capitalize;">Foto</th>
                                        <th class="text-center" style="text-transform: capitalize;">NIK</th>
                                        <th class="text-center" style="text-transform: capitalize;">NIDN</th>
                                        <th class="text-center" style="text-transform: capitalize;">Nama Dosen</th>
                                        <th class="text-center" style="text-transform: capitalize;">Gelar</th>
                                        <th class="text-center" style="text-transform: capitalize;">Pendidikan</th>
                                        <th class="text-center" style="text-transform: capitalize;">Status</th>
                                        <th class="text-center" style="text-transform: capitalize;">Jenis Kelamin</th>
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


<div id="modal-dosen" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Form Tambah Dosen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="frm-dosen">
                    
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
                                    <label for="nik"><b>NIK :</b></label>
                                    <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukkan NIK">
                                    <small id="nik_err" class="form-text text-danger"></small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nidn"><b>NIDN :</b></label>
                                    <input type="text" class="form-control" id="nidn" name="nidn" placeholder="Masukkan NIDN (opsional)">
                                    <small id="nidn_err" class="form-text text-danger"></small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nama_dosen"><b>Nama Dosen :</b></label>
                                    <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" placeholder="Masukkan Nama Dosen">
                                    <small id="nama_dosen_err" class="form-text text-danger"></small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="jenis_kelamin"><b>Jenis Kelamin :</b></label>
                                    <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="gelar"><b>Gelar :</b></label>
                                    <input type="text" class="form-control" id="gelar" name="gelar" placeholder="Masukkan Gelar">
                                    <small id="gelar_err" class="form-text text-danger"></small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="pendidikan"><b>Pendidikan Terakhir :</b></label>
                                    <input type="text" class="form-control" id="pendidikan" name="pendidikan" placeholder="Masukkan Pendidikan Terakhir">
                                    <small id="pendidikan_err" class="form-text text-danger"></small>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="tempat_lahir"><b>Tempat Lahir :</b></label>
                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir">
                                    <small id="tempat_lahir_err" class="form-text text-danger"></small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="tanggal_lahir"><b>Tanggal Lahir :</b></label>
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir">
                                    <small id="tanggal_lahir_err" class="form-text text-danger"></small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="agama"><b>Agama :</b></label>
                                    <select class="form-control" name="agama" id="agama">
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
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="status"><b>Status :</b></label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="Aktif">Aktif</option>
                                        <option value="Tidak Aktif">Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="alamat"><b>Alamat :</b></label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat">
                                    <small id="alamat_err" class="form-text text-danger"></small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="foto"><b>Foto :</b></label>
                                    <input type="file" class="form-control" id="foto" name="foto" placeholder="Masukkan Foto">
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

<div id="modal-dosen_edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Form Edit Dosen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="frm-dosen_edit">
                <input type="hidden" name="id_dosen_edit" id="id_dosen_edit">
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
                                    <label for="nik_edit"></b>NIK :</b></label>
                                    <input type="text" class="form-control" id="nik_edit" name="nik_edit" placeholder="Masukkan NIK">
                                    <small id="nik_edit_err" class="form-text text-danger"></small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nidn_edit"><b>NIDN :</b></label>
                                    <input type="text" class="form-control" id="nidn_edit" name="nidn_edit" placeholder="Masukkan NIDN (opsional)">
                                    <small id="nidn_edit_err" class="form-text text-danger"></small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="nama_dosen_edit"><b>Nama Dosen :</b></label>
                                    <input type="text" class="form-control" id="nama_dosen_edit" name="nama_dosen_edit" placeholder="Masukkan Nama Dosen">
                                    <small id="nama_dosen_edit_err" class="form-text text-danger"></small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="jenis_kelamin_edit"><b>Jenis Kelamin :</b></label>
                                    <select class="form-control" name="jenis_kelamin_edit" id="jenis_kelamin_edit">
    
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="gelar_edit"><b>Gelar :</b></label>
                                    <input type="text" class="form-control" id="gelar_edit" name="gelar_edit" placeholder="Masukkan Gelar">
                                    <small id="gelar_edit_err" class="form-text text-danger"></small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="pendidikan_edit"><b>Pendidikan Terakhir :</b></label>
                                    <input type="text" class="form-control" id="pendidikan_edit" name="pendidikan_edit" placeholder="Masukkan Pendidikan Terakhir">
                                    <small id="pendidikan_edit_err" class="form-text text-danger"></small>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="pills-profile2" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="tempat_lahir_edit"><b>Tempat Lahir :</b></label>
                                    <input type="text" class="form-control" id="tempat_lahir_edit" name="tempat_lahir_edit" placeholder="Masukkan Tempat Lahir">
                                    <small id="tempat_lahir_edit_err" class="form-text text-danger"></small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="tanggal_lahir_edit"><b>Tanggal Lahir :</b></label>
                                    <input type="date" class="form-control" id="tanggal_lahir_edit" name="tanggal_lahir_edit" placeholder="Masukkan Tanggal Lahir">
                                    <small id="tanggal_lahir_edit_err" class="form-text text-danger"></small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="agama_edit"><b>Agama :</b></label>
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
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="status_edit"><b>Status :</b></label>
                                    <select class="form-control" name="status_edit" id="status_edit">
                                        <option value="Aktif">Aktif</option>
                                        <option value="Tidak Aktif">Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="alamat_edit"><b>Alamat :</b></label>
                                    <input type="text" class="form-control" id="alamat_edit" name="alamat_edit" placeholder="Masukkan Alamat">
                                    <small id="alamat_edit_err" class="form-text text-danger"></small>
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
