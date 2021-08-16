
<!-- [ Main Content ] start -->
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Data Kegiatan Mahasiswa</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url()?>dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Data Kegiatan Mahasiswa</a></li>
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
                        <h5 class="float-right"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-kegiatan_mahasiswa"><i class="feather icon-plus"></i></a></h5>
                        <div style="clear: both;"></div>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table" id="data-kegiatan_mahasiswa">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="text-transform: capitalize;">Nama Kegiatan</th>
                                        <th class="text-center" style="text-transform: capitalize;">Gambar Utama</th>
                                        <th class="text-center" style="text-transform: capitalize;">Tanggal Awal Kegiatan</th>
                                        <th class="text-center" style="text-transform: capitalize;">Tanggal Akhir Kegiatan</th>
                                        <!-- <th class="text-center" style="text-transform: capitalize;">Deskripsi</th> -->
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


<div id="modal-kegiatan_mahasiswa" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Form Tambah Kegiatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="frm-kegiatan_mahasiswa">
                    <div class="form-group">
                        <label for="nama_kegiatan">Nama Kegiatan</label>
                        <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" placeholder="Masukkan Nama Kegiatan">
                        <small id="nama_kegiatan-err" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_awal">Tanggal Awal Kegiatan</label>
                        <input type="date" class="form-control" id="tanggal_awal" name="tanggal_awal">
                        <small id="tanggal_awal-err" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_akhir">Tanggal Akhir Kegiatan</label>
                        <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir">
                        <small id="tanggal_akhir-err" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <input type="file" class="form-control" id="gambar" name="gambar" required>
                        <small id="gambar-err" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" id="deskripsi" cols="30" rows="5"></textarea>
                        <small id="deskripsi-err" class="form-text text-danger"></small>
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="feather icon-x"></i></button>
                <button type="submit" class="btn btn-primary"><i class="feather icon-save"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="modal-kegiatan_mahasiswa_edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Form Edit Kegiatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="frm-kegiatan_mahasiswa_edit">
                    <div class="form-group">
                        <label for="nama_kegiatan_edit">Nama Kegiatan</label>
                        <input type="text" class="form-control" id="nama_kegiatan_edit" name="nama_kegiatan_edit" placeholder="Masukkan Nama Kegiatan">
                        <input type="hidden" name="id_kegiatan_edit" id="id_kegiatan_edit">
                        <small id="nama_kegiatan_edit-err" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_awal_edit">Tanggal Awal Kegiatan</label>
                        <input type="date" class="form-control" id="tanggal_awal_edit" name="tanggal_awal_edit">
                        <small id="tanggal_awal_edit-err" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_akhir_edit">Tanggal Akhir Kegiatan</label>
                        <input type="date" class="form-control" id="tanggal_akhir_edit" name="tanggal_akhir_edit">
                        <small id="tanggal_akhir_edit-err" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <input type="file" class="form-control" name="gambar">
                        <input type="hidden" name="gambar_lama" id="gambar_lama">
                        <small id="gambar-err" class="form-text ">Upload jika ingin mengganti gambar.</small>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi_edit">Deskripsi</label>
                        <textarea name="deskripsi_edit" class="form-control" id="deskripsi_edit" cols="30" rows="5"></textarea>
                        <small id="deskripsi_edit-err" class="form-text text-danger"></small>
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="feather icon-x"></i></button>
                <button type="submit" class="btn btn-primary"><i class="feather icon-save"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
