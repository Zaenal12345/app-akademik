
<!-- [ Main Content ] start -->
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Data Fakultas</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url()?>dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Data Fakultas</a></li>
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
                        <h5 class="float-right"><a href="#" data-toggle="modal" data-target="#modal-fakultas" class="btn btn-primary" id="tambah-fakultas"><i class="feather icon-plus"></i></a></h5>
                        <div style="clear: both;"></div>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table" id="data-fakultas">
                                <thead>
                                    <tr>
                                        <!-- <th class="text-center" style="text-transform: capitalize;">No</th> -->
                                        <th class="text-center" style="text-transform: capitalize;">Kode Fakultas</th>
                                        <th class="text-center" style="text-transform: capitalize;">Nama Fakultas</th>
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

<div id="modal-fakultas" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Form Tambah Fakultas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="frm-fakultas">
                    <div class="form-group">
                        <label for="kode_fakultas"><b>Kode Fakultas :</b></label>
                        <input type="text" class="form-control" id="kode_fakultas" name="kode_fakultas" placeholder="Masukkan Kode Fakultas">
                        <small id="kode_fakultas-err" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label for="nama_fakultas"><b>Nama Fakultas :</b></label>
                        <input type="text" class="form-control" id="nama_fakultas" name="nama_fakultas" placeholder="Masukkan Nama Fakultas">
                        <small id="nama_fakultas-err" class="form-text text-danger"></small>
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" title="close"><i class="feather icon-x"></i></button>
                <button type="submit" class="btn btn-primary" title="save"><i class="feather icon-save"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="modal-fakultas_edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Form Edit Fakultas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="frm-fakultas_edit">
                    <div class="form-group">
                        <label for="kode_fakultas_edit"><b>Kode Fakultas :</b></label>
                        <input type="hidden" name="id_fakultas_edit" id="id_fakultas_edit">
                        <input type="text" class="form-control" name="kode_fakultas_edit" id="kode_fakultas_edit"  placeholder="Masukkan Kode Fakultas" readonly>
                        <small id="kode_fakultas_edit-err" class="form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label for="nama_fakultas_edit"><b>Nama Fakultas :</b></label>
                        <input type="text" class="form-control" name="nama_fakultas_edit" id="nama_fakultas_edit" placeholder="Masukkan Nama Fakultas">
                        <small id="nama_fakultas_edit-err" class="form-text text-danger"></small>
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn  btn-secondary" data-dismiss="modal"><i class="feather icon-x"></i></button>
                <button type="submit" class="btn  btn-primary"><i class="feather icon-save"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>