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
                            <h5 class="m-b-10">Form Tambah Nilai</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url()?>dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Form Tambah Nilai</a></li>
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
                            <form id="list-nilai" action="<?= base_url()?>nilai/store" method="post">
                                <h6>Form  :</h6>
                                <br>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="matakuliah_id"><b>Matakuliah: </b></label><br>
                                            <select class="js-select2-matakuliah form-control" name="matakuliah_id" id="matakuliah_id" style="width:100%">
                                                <option value=""></option>
                                                <?php foreach($matakuliah as $data):?>
                                                    <option value="<?= $data->id_matakuliah?>"><?= $data->kode_matakuliah?> - <?= $data->nama_matakuliah?></option>
                                                <?php endforeach;?>
                                            </select>
                                            <small id="nim-err" class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="kelas_id"><b>Kelas: </b></label><br>
                                            <select class="js-select2-kelas form-control" name="kelas_id" id="kelas_id" style="width:100%">
                                                <option value=""></option>
                                                <?php foreach($kelas as $data):?>
                                                    <option value="<?= $data->id_kelas?>"><?= $data->nama_kelas?></option>
                                                <?php endforeach;?>
                                            </select>
                                            <small id="nim-err" class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="jurusan_id"><b>Jurusan: </b></label><br>
                                            <select class="js-select2-jurusan form-control" name="jurusan_id" id="jurusan_id" style="width:100%">
                                                <option value=""></option>
                                                <?php foreach($jurusan as $data):?>
                                                    <option value="<?= $data->id_jurusan?>"><?= $data->kode_jurusan?> - <?= $data->nama_jurusan?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="semester">Semester</label>
                                            <select name="semester" id="semester" class="form-control js-select2-semester">
                                                <option value=""></option>
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
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="tahun_ajar_id"><b>Tahun Ajar: </b></label>
                                            <select class="js-select2-tahun_ajar form-control" name="tahun_ajar_id" id="tahun_ajar_id" style="width:100%">
                                                <option value=""></option>
                                                <?php foreach($tahun_ajar as $data):?>
                                                    <option value="<?= $data->id_tahun_ajar?>"><?= $data->tahun_ajar?></option>
                                                <?php endforeach;?>
                                            </select>
                                            <small id="tahun_ajar-err" class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-primary" type="button" id="cari-list_mahasiwa">Cari</button>  
                                <a href="<?= base_url()?>nilai" class="btn btn-secondary">Kembali</a> 
                                <br> 
                                
                                <!-- tabel untuk krs -->
                                <br>
                                <div id="tabel-list_nilai" style="display:none">
                                    <h6>List Mahasiswa :</h6>
                                    <!-- <br> -->
                                    <div class="table-responsive">
                                        <table class="table" id="list_mahasiswa">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">NIM</th>
                                                    <th class="text-center">Nama Mahasiswa</th>
                                                    <th class="text-center">Absen</th>
                                                    <th class="text-center">Tugas</th>
                                                    <th class="text-center">UTS</th>
                                                    <th class="text-center">UAS</th>
                                                    <th class="text-center">Nilai Akhir</th>
                                                    <th class="text-center">Grade</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    <br>
                                    <div class="float-right" id="btn-aksi">
                                        <button class="btn btn-primary" type="submit">Simpan</button> 
                                        </form>
                                        <!-- <a href="<?= base_url()?>nilai" class="btn btn-secondary">Kembali</a>  -->
                                    </div>
                                    <div style="clear:both"></div>
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