
<!-- [ Main Content ] start -->
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Data Kurikulum</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url()?>dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Data Kurikulum</a></li>
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
                        <div style="margin-left:20px">
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="tahun_ajar_id">Matakuliah Untuk Periode : </label>
                                        <select name="tahun_ajar_id" id="tahun_ajar_id" class="form-control">
                                            <option value="">Pilih Periode</option>
                                            <?php foreach($tahun_ajar as $data):?>
                                                <option value="<?= $data['id_tahun_ajar']?>"><?= $data['tahun_ajar']?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="jurusan_id">Program Studi :</label>
                                        <select name="jurusan_id" id="jurusan_id" class="form-control">
                                            <option value="">Pilih Program Studi</option>
                                            <?php foreach($jurusan as $data):?>
                                                <option value="<?= $data['id_jurusan']?>"><?= $data['nama_jurusan']?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="kelas_id">Kelas :</label>
                                        <select name="kelas_id" id="kelas_id" class="form-control">
                                            <option value="">Pilih Kelas</option>
                                            <?php foreach($kelas as $data):?>
                                                <option value="<?= $data['id_kelas']?>"><?= $data['nama_kelas']?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mt-4"></div>
                                    <button type="button" class="btn  btn-danger" id="search-kurikulum"><i class="feather icon-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body table-border-style">
                        <div class="btn-group mb-2 btn-action" role="group" aria-label="Basic example" style="display:none">
                            <!-- add button -->
                            <button type="button" class="btn btn-primary" id="add-kurikulum" title="tambah data baru" data-target="#modal-kurikulum_tambah" data-toggle="modal"><i class="feather icon-plus"></i></button>
                            <!-- copy button -->
                            <button type="button" class="btn  btn-primary" id="copy-kurikulum" title="copy dari periode sebelumya" data-target="#modal-kurikulum_copy" data-toggle="modal"><i class="feather icon-copy"></i></button>
                        </div>
                        <div class="table-responsive" id="tabel-kurikulum" style="display:none">
                            <table class="table" id="data-kurikulum">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="text-transform: capitalize;">Kode Matakuliah</th>
                                        <th class="text-center" style="text-transform: capitalize;">Nama Matakuliah</th>
                                        <th class="text-center" style="text-transform: capitalize;">SKS</th>
                                        <th class="text-center" style="text-transform: capitalize;">Semester</th>
                                        <th class="text-center" style="text-transform: capitalize;">Kelas</th>
                                        <th class="text-center" style="text-transform: capitalize;">Dosen Pengampuh</th>
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

<!-- modal add matakuliah -->
<div class="modal fade" id="modal-kurikulum_tambah" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4" id="myLargeModalLabel">List Matakuliah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                
                <!-- alert error -->
                <div class="alert alert-danger" id="alert-error" style="display: none;"></div>

                <div class="table-responsive">
                    <table class="table" id="datatable2" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center" style="text-transform: capitalize;display: none">id Matakuliah</th>
                                <th class="text-center" style="text-transform: capitalize;">Kode Matakuliah</th>
                                <th class="text-center" style="text-transform: capitalize;">Nama Matakuliah</th>
                                <th class="text-center" style="text-transform: capitalize;">SKS</th>
                                <th class="text-center" style="text-transform: capitalize;">Semester</th>
                                <th class="text-center" style="text-transform: capitalize;"><input type="checkbox" name="select_all"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($matakuliah as $data):?>
                                <tr>
                                    <td class="text-center" style="display:none"><?= $data['id_matakuliah']?></td>
                                    <td class="text-center"><?= $data['kode_matakuliah']?></td>
                                    <td class="text-center"><?= $data['nama_matakuliah']?></td>
                                    <td class="text-center"><?= $data['sks']?></td>
                                    <td class="text-center"><?= $data['semester']?></td>
                                    <td class="text-center"><input type="checkbox"></td>
                                </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="feather icon-x"></i></button>
                <button type="submit" class="btn btn-primary" id="btn-save"><i class="feather icon-save"></i></button>
            </div>
        </div>
    </div>
</div>

<!-- modal copy kurikulum from before periode -->
<div class="modal fade" id="modal-kurikulum_copy" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4" id="myLargeModalLabel">List Matakuliah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <!-- alert error -->
                <div class="alert alert-danger" id="alert-error2" style="display: none;"></div>
                
                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <select name="tahun_ajar_id2" id="tahun_ajar_id2" class="form-control">
                                <option value="">Pilih Periode</option>
                                <?php foreach($tahun_ajar as $data):?>
                                    <option value="<?= $data['id_tahun_ajar']?>"><?= $data['tahun_ajar']?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <select name="jurusan_id2" id="jurusan_id2" class="form-control">
                                <option value="">Pilih Program Studi</option>
                                <?php foreach($jurusan as $data):?>
                                    <option value="<?= $data['id_jurusan']?>"><?= $data['nama_jurusan']?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <select name="kelas_id2" id="kelas_id2" class="form-control">
                                <option value="">Pilih Kelas</option>
                                <?php foreach($kelas as $data):?>
                                    <option value="<?= $data['id_kelas']?>"><?= $data['nama_kelas']?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <!-- <div class="mt-4"></div> -->
                        <button type="button" class="btn  btn-primary" id="search-kurikulum2"><i class="feather icon-search"></i></button>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table" id="datatable3" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center" style="text-transform: capitalize;display: none">id Matakuliah</th>
                                <th class="text-center" style="text-transform: capitalize;">Kode Matakuliah</th>
                                <th class="text-center" style="text-transform: capitalize;">Nama Matakuliah</th>
                                <th class="text-center" style="text-transform: capitalize;">SKS</th>
                                <th class="text-center" style="text-transform: capitalize;">Semester</th>
                                <th class="text-center" style="text-transform: capitalize;"><input type="checkbox" name="select_all2"></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="feather icon-x"></i></button>
                <button type="submit" class="btn btn-primary" id="btn-save2"><i class="feather icon-save"></i></button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-kurikulum_ubah" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4" id="myLargeModalLabel">List Dosen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                
                <div class="form-group">
                    <input type="hidden" name="id_kurikulum" id="id_kurikulum">
                    <select name="dosen_id" id="dosen_id" class="form-control">
                        <option value="">Pilih Nama Dosen</option>
                        <?php foreach($dosen as $data):?>
                            <option value="<?= $data['id_dosen']?>"><?= $data['nama_dosen']?></option>
                        <?php endforeach;?>
                    </select>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="feather icon-x"></i></button>
                <button type="submit" class="btn btn-primary" id="btn-update"><i class="feather icon-save"></i></button>
            </div>
        </div>
    </div>
</div>
