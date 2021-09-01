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
                            <h5 class="m-b-10">Form Tambah KRS</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url()?>dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Form Tambah KRS</a></li>
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
                    <div class="card mb-4">
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <!-- <form id="form-krs"> -->
                                <h6>Informasi Matakuliah :</h6>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="tahun_ajar_id2"><b>Tahun Ajar: </b></label>
                                            <select class="js-select2-tahun_ajar form-control" name="tahun_ajar_id2" id="tahun_ajar_id2" style="width:100%">
                                                <option value=""></option>
                                                <?php foreach($tahun_ajar as $data):?>
                                                    <option value="<?= $data->id_tahun_ajar?>"><?= $data->tahun_ajar?></option>
                                                <?php endforeach;?>
                                            </select>
                                            <small id="tahun_ajar-err" class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="jurusan_id2"><b>Jurusan: </b></label><br>
                                            <select class="js-select2-jurusan form-control" name="jurusan_id2" id="jurusan_id2" style="width:100%">
                                                <option value=""></option>
                                                <?php foreach($jurusan as $data):?>
                                                    <option value="<?= $data->id_jurusan?>"><?= $data->kode_jurusan?> - <?= $data->nama_jurusan?></option>
                                                <?php endforeach;?>
                                            </select>
                                            <small id="nim-err" class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="kelas_id2"><b>Kelas: </b></label><br>
                                            <select class="js-select2-kelas form-control" name="kelas_id2" id="kelas_id2" style="width:100%">
                                                <option value=""></option>
                                                <?php foreach($kelas as $data):?>
                                                    <option value="<?= $data->id_kelas?>"><?= $data->nama_kelas?></option>
                                                <?php endforeach;?>
                                            </select>
                                            <small id="nim-err" class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="kode_matakuliah2"><b>Kode Matakuliah: </b></label><br>
                                            <select class="js-select2-matakuliah form-control" name="kode_matakuliah2" id="kode_matakuliah2" style="width:100%">
                                                <option value=""></option>
                                            </select>
                                            <small id="nim-err" class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="sks2"><b>SKS: </b></label>
                                            <input type="text" class="form-control" id="sks2" name="sks2" placeholder="Masukkan SKS">
                                            <small id="sks-err" class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="semester2"><b>Semester: </b></label>
                                            <input type="text" class="form-control" id="semester2" name="semester2" placeholder="Masukkan Semester">        
                                            <small id="semester-err" class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="nama_dosen2"><b>Nama Dosen: </b></label>
                                            <input type="text" class="form-control" id="nama_dosen2" name="nama_dosen2" placeholder="Masukkan Nama Dosen">
                                            <input type="hidden" name="dosen_id2" id="dosen_id2">        
                                            <small id="semester-err" class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card mb-0">
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="nim2"><b>NIM: </b></label><br>
                                            <select class="js-select2-mahasiswa form-control" name="nim2" id="nim2" style="width:100%">
                                                <option value=""></option>
                                                <?php foreach($mahasiswa as $data):?>
                                                    <option value="<?= $data->id_mahasiswa?>"><?= $data->nim?> - <?= $data->nama_mahasiswa?></option>
                                                <?php endforeach;?>
                                            </select>
                                            <small id="nim-err" class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-primary btn-action" id="simpan-krs2">Simpan</button> 
                                <button class="btn btn-primary btn-action" id="tambah-krs">Tambah</button> 
                                <a href="<?= base_url()?>krs" class="btn btn-secondary btn-action">Kembali</a> 
                                <br><br>
                                <h6>List Mahasiswa :</h6>
                                <br> 
                                <div class="table-responsive">
                                    <table class="table" id="table-krs_detail">
                                        <thead>
                                            <tr>
                                                <th class="text-center" style="display:none">Id Mahasiswa</th>
                                                <th class="text-center">NIM</th>
                                                <th class="text-center">Nama Mahasiswa</th>
                                                <th class="text-center">Aksi</th>
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