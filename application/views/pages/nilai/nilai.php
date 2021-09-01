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
                            <h5 class="m-b-10">Data Nilai</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url()?>dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Data Nilai</a></li>
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
                        <!-- <h5 class="float-right"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-kelas">Tambah Data</a></h5> -->
                        <!-- <h5 class="float-right"><a href="<?= base_url()?>nilai/create" class="btn btn-primary"><i class="feather icon-plus"></i></a></h5> -->
                        <!-- <h5 class=""><a href="<?= base_url()?>nilai/create" class="btn btn-primary">Tambah Data</a></h5> -->
                        <div class="btn-group">
							<button class="btn  btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Manajemen Data</button>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="<?= base_url()?>krs/create">Tambah Data</a>
								<!-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-perbaikan_nilai">Perbaikan Nilai</a> -->
								<a class="dropdown-item" href="#">Perbaikan Nilai</a>
								<a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-transkip_nilai">Cek Transkip Nilai</a>
								<a class="dropdown-item" href="#">Cek Nilai Persemester</a>
								<!-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-nilai_persemester">Cek Nilai Persemester</a> -->
							</div>
						</div>
                        <div style="clear: both;"></div>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table" id="data-nilai">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="text-transform: capitalize;">NIM</th>
                                        <th class="text-center" style="text-transform: capitalize;">Nama Mahasiswa</th>
                                        <th class="text-center" style="text-transform: capitalize;">Nama Matakuliah</th>
                                        <th class="text-center" style="text-transform: capitalize;">Absen</th>
                                        <th class="text-center" style="text-transform: capitalize;">Tugas</th>
                                        <th class="text-center" style="text-transform: capitalize;">UTS</th>
                                        <th class="text-center" style="text-transform: capitalize;">UAS</th>
                                        <th class="text-center" style="text-transform: capitalize;">Nilai Akhir</th>
                                        <th class="text-center" style="text-transform: capitalize;">Grade</th>
                                        <th class="text-center" style="text-transform: capitalize;">Keterangan</th>
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

<div id="modal-transkip_nilai" class="modal fade"  role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Form Cek Transkip Nilai Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="frm-kelas" method="post" action="<?= base_url()?>nilai/transkipNilai">
                    <div class="form-group">
                        <label for="nim"><b>NIM: </b></label><br>
                        <select class="js-select2-mahasiswa2 form-control" name="nim" id="nim" style="width:100%">
                            <option value=""></option>
                            <?php foreach($mahasiswa as $data):?>
                                <option value="<?= $data->id_mahasiswa?>"><?= $data->nim?> - <?= $data->nama_mahasiswa?></option>
                            <?php endforeach;?>
                        </select>
                        <small id="nim-err" class="form-text text-danger"></small>
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Cari</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- <div id="modal-nilai_persemester" class="modal fade"  role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Form Cek Transkip Nilai Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="frm-kelas" method="post" action="<?= base_url()?>nilai/nilaiPersemester">
                    
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nim"><b>NIM: </b></label><br>
                                <select class="js-select2-mahasiswa2 form-control" name="nim" id="nim" style="width:100%">
                                    <option value=""></option>
                                    <?php foreach($mahasiswa as $data):?>
                                        <option value="<?= $data->id_mahasiswa?>"><?= $data->nim?> - <?= $data->nama_mahasiswa?></option>
                                    <?php endforeach;?>
                                </select>
                                <small id="nim-err" class="form-text text-danger"></small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="semester">Semester</label><br>
                                <select name="semester" id="semester" class="form-control js-select2-semester" style>
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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Cari</button>
                </form>
            </div>
        </div>
    </div>
</div> -->

<!-- <div id="modal-perbaikan_nilai" class="modal fade"  role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Form Cari Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="frm-kelas" method="post" action="<?= base_url()?>nilai/transkipNilai">
                    <div class="form-group">
                        <label for="nim"><b>NIM: </b></label><br>
                        <select class="js-select2-mahasiswa form-control" name="nim" id="nim" style="width:100%">
                            <option value=""></option>
                            <?php foreach($mahasiswa as $data):?>
                                <option value="<?= $data->id_mahasiswa?>"><?= $data->nim?> - <?= $data->nama_mahasiswa?></option>
                            <?php endforeach;?>
                        </select>
                        <small id="nim-err" class="form-text text-danger"></small>
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Cari</button>
                </form>
            </div>
        </div>
    </div>
</div> -->