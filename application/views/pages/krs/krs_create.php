<style>
    /* .ui-menu .ui-menu-item a{
        color: #96f226;
        border-radius: 0px;
        border: 1px solid #454545;
    } */

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
                                            <label for="nim">NIM</label>
                                            <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan NIM" autocomplete="off">
                                            <input type="hidden" class="form-control" id="id_mahasiswa" name="id_mahasiswa">
                                            <small id="nim-err" class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="nama_mahasiswa">Nama Mahasiswa</label>
                                            <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa" placeholder="Masukkan Mahasiswa">
                                            <small id="nama_mahasiswa-err" class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="nama_jurusan">Program Studi</label>
                                            <input type="text" class="form-control" id="nama_jurusan" name="nama_jurusan" placeholder="Masukkan Program Studi">
                                            <small id="nama_jurusan-err" class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="nama_kelas">Kelas</label>
                                            <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" placeholder="Masukkan Kelas Kuliah">
                                            <small id="nama_kelas-err" class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="tahun_ajar">Tahun Ajar</label>
                                            <input type="text" class="form-control" id="tahun_ajar" name="tahun_ajar" placeholder="Masukkan Tahun Ajar" onkeypress="return onlyNumber(event)">
                                            <input type="hidden" id="id_tahun_ajar" name="id_tahun_ajar">
                                            <small id="tahun_ajar-err" class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="semester">Semester</label>
                                            <input type="text" class="form-control" id="semester" name="semester" placeholder="Masukkan Semester" onkeypress="return onlyNumber(event)">
                                            <small id="semester-err" class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="total_sks">Total SKS</label>
                                            <input type="text" class="form-control" id="total_sks" name="total_sks" placeholder="Masukkan Total SKS Yang Berhak Diambil" onkeypress="return onlyNumber(event)">
                                            <small id="total_sks-err" class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card mb-0">
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                
                                <h6>List Matakuliah :</h6>
                                <br>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="kode_matakuliah">Kode Matakuliah</label>
                                            <input type="text" class="form-control" id="kode_matakuliah" name="kode_matakuliah" placeholder="Masukkan Kode Matakuliah" autocomplete="off">
                                            <input type="hidden" name="id_matakuliah" id="id_matakuliah">
                                            <small id="kode_matakuliah-err" class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="nama_matakuliah">Nama Matakuliah</label>
                                            <input type="text" class="form-control" id="nama_matakuliah" name="nama_matakuliah" placeholder="Masukkan Nama Matakuliah">
                                            <small id="nama_matakuliah-err" class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="sks">SKS</label>
                                            <input type="text" class="form-control" id="sks" name="sks" placeholder="Masukkan SKS Matakuliah">
                                            <small id="sks-err" class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="nama_dosen">Nama Dosen</label>
                                            <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" placeholder="Masukkan Nama Dosen">
                                            <input type="hidden" name="id_dosen" id="id_dosen">
                                            <small id="nama_dosen-err" class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-primary" type="button" id="tambah-krs">Tambah KRS</button>  
                                <button class="btn btn-primary" id="simpan-krs">Simpan KRS</button> 
                                <a href="<?= base_url()?>krs" class="btn btn-secondary">Kembali</a> 
                                <br> 
                                
                                <!-- tabel untuk krs -->
                                <br>
                                <div class="table-responsive">
                                    <table class="table" id="table-krs_detail">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Kode Matakuliah</th>
                                                <th class="text-center">Nama Matakuliah</th>
                                                <th class="text-center">SKS</th>
                                                <th class="text-center">Nama Dosen</th>
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