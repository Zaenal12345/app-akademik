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
                                            <label for="nama_matakuliah">Nama Matakuliah</label>
                                            <input type="text" class="form-control" id="nama_matakuliah" name="nama_matakuliah" placeholder="Masukkan Nama Matakuliah">
                                            <input type="hidden" name="id_matakuliah" id="id_matakuliah">
                                            <small id="nama_matakuliah-err" class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="nama_kelas">Kelas</label>
                                            <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" placeholder="Masukkan Kelas">
                                            <input type="hidden" name="id_kelas" id="id_kelas">
                                            <small id="nama_kelas-err" class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="nama_jurusan">Program Studi</label>
                                            <input type="text" class="form-control" id="nama_jurusan" name="nama_jurusan" placeholder="Masukkan Program Studi">
                                            <input type="hidden" name="id_jurusan" id="id_jurusan">
                                            <small id="nama_jurusan-err" class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="semester">Semester</label>
                                            <input type="text" class="form-control" id="semester" name="semester" placeholder="Masukkan Semester">
                                            <small id="semester-err" class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="tahun_ajar">Tahun Ajaran</label>
                                            <input type="text" class="form-control" id="tahun_ajar" name="tahun_ajar" placeholder="Masukkan Tahun Ajaran">
                                            <input type="hidden" name="id_tahun_ajar" id="id_tahun_ajar">
                                            <small id="tahun_ajar-err" class="form-text text-danger"></small>
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-primary" type="button" id="cari-list_mahasiwa">Cari</button>  
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
                                                <!-- <tr>
                                                    <td class="text-center">
                                                        0203171081
                                                    </td>
                                                    <td class="text-center">
                                                        Zaenal Muttaqin
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="form-group" style="margin-top:-10px; margin-bottom: -5px">
                                                            <input type="text" class="form-control" id="tahun_ajar" name="tahun_ajar">
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="form-group" style="margin-top:-10px; margin-bottom: -5px">
                                                            <input type="text" class="form-control" id="tahun_ajar" name="tahun_ajar">
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="form-group" style="margin-top:-10px; margin-bottom: -5px">
                                                            <input type="text" class="form-control" id="tahun_ajar" name="tahun_ajar">
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="form-group" style="margin-top:-10px; margin-bottom: -5px">
                                                            <input type="text" class="form-control" id="tahun_ajar" name="tahun_ajar">
                                                        </div>
                                                    </td>
                                                </tr> -->
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    <br>
                                    <div class="float-right" id="btn-aksi">
                                        <button class="btn btn-primary" type="submit">Simpan</button> 
                                        </form>
                                        <a href="<?= base_url()?>nilai" class="btn btn-secondary">Kembali</a> 
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