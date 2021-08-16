
<!-- [ Main Content ] start -->
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Data KRS</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url()?>dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Data KRS</a></li>
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
                        <h5 class="float-right"><a href="<?= base_url()?>krs/create" class="btn btn-primary"><i class="feather icon-plus"></i></a></h5>
                        <div style="clear: both;"></div>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table" id="data-krs">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="text-transform: capitalize;">NIM</th>
                                        <th class="text-center" style="text-transform: capitalize;">Nama Mahasiswa</th>
                                        <th class="text-center" style="text-transform: capitalize;">Kelas</th>
                                        <th class="text-center" style="text-transform: capitalize;">Program Studi</th>
                                        <th class="text-center" style="text-transform: capitalize;">Kode Matakuliah</th>
                                        <th class="text-center" style="text-transform: capitalize;">Nama Matakuliah</th>
                                        <th class="text-center" style="text-transform: capitalize;">Jumlah SKS</th>
                                        <th class="text-center" style="text-transform: capitalize;">Semester</th>
                                        <th class="text-center" style="text-transform: capitalize;">Nama Dosen</th>
                                        <th class="text-center" style="text-transform: capitalize;">Tahun Ajar</th>
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


<div id="modal-kelas" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Form Tambah kelas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="frm-kelas">
                    <div class="form-group">
                        <label for="kode_kelas">Kode Kelas</label>
                        <input type="text" class="form-control" id="kode_kelas" name="kode_kelas" placeholder="Masukkan Kode Kelas">
                        <small id="kode_kelas-err" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label for="nama_kelas">Nama Kelas</label>
                        <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" placeholder="Masukkan Nama Kelas">
                        <small id="nama_kelas-err" class="form-text text-danger"></small>
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="modal-kelas_edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Form Edit Kelas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="frm-kelas_edit">
                    <div class="form-group">
                        <label for="kode_kelas_edit">Kode Kelas</label>
                        <input type="hidden" name="id_kelas_edit" id="id_kelas_edit">
                        <input type="text" class="form-control" name="kode_kelas_edit" id="kode_kelas_edit"  placeholder="Masukkan Kode Kelas" readonly>
                        <small id="kode_kelas_edit-err" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label for="nama_kelas_edit">Nama Kelas</label>
                        <input type="text" class="form-control" name="nama_kelas_edit" id="nama_kelas_edit" placeholder="Masukkan Nama Kelas">
                        <small id="nama_kelas_edit-err" class="form-text text-danger"></small>
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn  btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn  btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>