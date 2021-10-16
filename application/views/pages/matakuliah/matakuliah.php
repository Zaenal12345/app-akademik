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
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Form Tambah Matakuliah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="frm-matakuliah">

                    <div class="form-group">
                        <label for="kode_matakuliah"><b>Kode Matakuliah :</b></label>
                        <input type="text" class="form-control" id="kode_matakuliah" name="kode_matakuliah" placeholder="Masukkan Kode Matakuliah">
                        <small id="kode_matakuliah-err" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label for="nama_matakuliah"><b>Nama Matakuliah :</b></label>
                        <input type="text" class="form-control" id="nama_matakuliah" name="nama_matakuliah" placeholder="Masukkan Nama Matakuliah">
                        <small id="nama_matakuliah-err" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label for="sks"><b>SKS :</b></label>
                        <input type="text" class="form-control" id="sks" name="sks" placeholder="Masukkan SKS">
                        <small id="sks-err" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label for="semester"><b>Semester :</b></label>
                        <input type="text" class="form-control" id="semester" name="semester" placeholder="Masukkan SKS">
                        <small id="semester-err" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label for="jurusan"><b>Jurusan :</b></label>
                        <select name="jurusan" id="jurusan" class="form-control">
                            <option></option>
                            <?php foreach($jurusan as $data):?>
                                <option value="<?= $data->id_jurusan?>"><?= $data->nama_jurusan?></option>
                            <?php endforeach;?>
                        </select>
                        <small id="jurusan-err" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label for="jenis"><b>Jenis :</b></label>
                        <select name="jenis" id="jenis" class="form-control">
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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="feather icon-x"></i> Tutup</button>
                <button type="submit" class="btn btn-primary"><i class="feather icon-save"></i> Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="modal-matakuliah_edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Form Edit Fakultas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="frm-matakuliah_edit">

                    <div class="form-group">
                        <label for="kode_matakuliah_edit"><b>Kode Matakuliah :</b></label>
                        <input type="hidden" name="id_matakuliah_edit" id="id_matakuliah_edit">
                        <input type="text" class="form-control" name="kode_matakuliah_edit" id="kode_matakuliah_edit"  placeholder="Masukkan Kode Matakuliah" readonly>
                        <small id="kode_matakuliah_edit-err" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label for="nama_matakuliah_edit"><b>Nama Matakuliah :</b></label>
                        <input type="text" class="form-control" name="nama_matakuliah_edit" id="nama_matakuliah_edit" placeholder="Masukkan Nama Matakuliah">
                        <small id="nama_matakuliah_edit-err" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label for="sks_edit"><b>SKS :</b></label>
                        <input type="text" class="form-control" name="sks_edit" id="sks_edit" placeholder="Masukkan SKS">
                        <small id="sks_edit-err" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label for="semester_edit"><b>Semester :</b></label>
                        <input type="text" class="form-control" id="semester_edit" name="semester_edit" placeholder="Masukkan SKS">
                        <small id="semester_edit-err" class="form-text text-danger"></small>
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