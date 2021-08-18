<style>
    .ui-helper-hidden-accessible{
        display: none;
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
                            <h5 class="m-b-10">Form Tambah Jadwal</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url()?>dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Form Tambah Jadwal</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-sm-12">
                <div class="accordion" id="accordionExample">
                    <div class="card mb-0">
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="tahun_ajar_id">Jadwal Untuk Tahun Ajaran :</label>
                                            <select name="tahun_ajar_id" id="tahun_ajar_id" class="form-control">
                                                <?php foreach($tahun_ajar as $data):?>
                                                    <option value="<?= $data->id_tahun_ajar?>"><?= $data->tahun_ajar?></option>
                                                <?php endforeach;?>
                                            </select>
                                            <small id="tahun_ajar_id-err" class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="kelas_id">Kelas</label>
                                            <select name="kelas_id" id="kelas_id" class="form-control">
                                                <?php foreach($kelas as $data):?>
                                                    <option value="<?= $data->id_kelas?>"><?= $data->nama_kelas?></option>
                                                <?php endforeach;?>
                                            </select>
                                            <small id="kelas_id-err" class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="jurusan_id">Program Studi</label>
                                            <select name="jurusan_id" id="jurusan_id" class="form-control">
                                                <?php foreach($jurusan as $data):?>
                                                    <option value="<?= $data->id_jurusan?>"><?= $data->nama_jurusan?></option>
                                                <?php endforeach;?>
                                            </select>
                                            <small id="jurusan-err" class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="semester">Semester</label>
                                            <input type="text" class="form-control" id="semester" name="semester" placeholder="Masukkan Semester">
                                            <input type="hidden" name="id_dosen" id="id_dosen">
                                            <small id="semester-err" class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="hari">Hari</label>
                                            <select name="hari" id="hari" class="form-control">
                                                <option value="Senin">Senin</option>
                                                <option value="Selasa">Selasa</option>
                                                <option value="Rabu">Rabu</option>
                                                <option value="Kamis">Kamis</option>
                                                <option value="Jumat">Jumat</option>
                                                <option value="Sabtu">Sabtu</option>
                                            </select>
                                            <small id="hari-err" class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="matakuliah_id">Matakuliah :</label>
                                            <select name="matakuliah_id" id="matakuliah_id" class="form-control">
                                                <option value=""></option>
                                            </select>
                                            <small id="matakuliah_id-err" class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="nama_dosen">Nama Dosen :</label>
                                            <input type="text" name="nama_dosen" id="nama_dosen" class="form-control">
                                            <input type="hidden" name="dosen_id" id="dosen_id">
                                            <small id="nama_dosen-err" class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="ruangan">Ruangan :</label>
                                            <input type="text" name="ruangan" id="ruangan" class="form-control">
                                            <small id="ruangan-err" class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="jam_masuk">Jam Masuk</label>
                                            <input type="time" name="jam_masuk" id="jam_masuk" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="jam_selesai">Jam Selesai</label>
                                            <input type="time" name="jam_selesai" id="jam_selesai" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-primary" type="button" id="btn-add">Tambah</button>  
                                <button class="btn btn-primary" id="btn-save">Simpan</button> 
                                <a href="<?= base_url()?>jadwal" class="btn btn-secondary">Kembali</a> 
                                <br> 
                                
                                <!-- tabel untuk krs -->
                                <br>
                                <div class="table-responsive">
                                    <table class="table" id="table-jadwal_detail">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Hari</th>
                                                <th class="text-center">Nama Matakuliah</th>
                                                <th class="text-center" style="display: none;">Id Matakuliah</th>
                                                <th class="text-center">Nama Dosen</th>
                                                <th class="text-center" style="display: none;">Id Dosen</th>
                                                <th class="text-center">Ruangan</th>
                                                <th class="text-center">Jam Masuk</th>
                                                <th class="text-center">Jam Selesai</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- [ Main Content ] end -->

    </div>
</section>
<!-- [ Main Content ] end