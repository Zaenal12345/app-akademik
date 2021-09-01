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
                                <h6>Informasi Mahasiswa :</h6>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="nim">NIM</label><br>
                                            <select class="js-select2-mahasiswa form-control" name="nim" id="nim" style="width:100%">
                                                <option value=""></option>
                                                <?php foreach($mahasiswa as $data):?>
                                                    <option value="<?= $data->id_mahasiswa?>"><?= $data->nim?> - <?= $data->nama_mahasiswa?></option>
                                                <?php endforeach;?>
                                            </select>
                                            <small id="nim-err" class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="nama_jurusan">Program Studi</label>
                                            <input type="text" class="form-control" id="nama_jurusan" name="nama_jurusan" placeholder="Masukkan Program Studi" readonly>
                                            <input type="hidden" name="jurusan_id" id="jurusan_id">
                                            <small id="nama_jurusan-err" class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="nama_kelas">Kelas</label>
                                            <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" placeholder="Masukkan Kelas Kuliah" readonly>
                                            <input type="hidden" name="kelas_id" id="kelas_id">
                                            <small id="nama_kelas-err" class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="tahun_ajar">Tahun Ajar</label>
                                            <select class="js-select2-tahun_ajar form-control" name="tahun_ajar_id" id="tahun_ajar_id" style="width:100%">
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
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card mb-0">
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                
                                <button class="btn btn-primary btn-action" id="simpan-krs" style="display:none">Simpan</button> 
                                <a href="<?= base_url()?>krs" class="btn btn-secondary btn-action" style="display:none">Kembali</a> 
                                <br><br>
                                <h6>List Matakuliah :</h6>
                                <br> 
                                <div class="table-responsive">
                                    <table class="table" id="table-krs_detail">
                                        <thead>
                                            <tr>
                                                <th class="text-center" style="display:none">Id Matakuliah</th>
                                                <th class="text-center">Kode Matakuliah</th>
                                                <th class="text-center">Nama Matakuliah</th>
                                                <th class="text-center">SKS</th>
                                                <th class="text-center" style="display:none">Id Dosen</th>
                                                <th class="text-center">Nama Dosen</th>
                                                <th class="text-center"><input type="checkbox" name="select-all"></th>
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