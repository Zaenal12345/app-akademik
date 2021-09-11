
<!-- [ Main Content ] start -->
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Data Jadwal</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url()?>dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Data Jadwal</a></li>
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
                        <!-- <h5 class="float-right"><a href="#" data-toggle="modal" data-target="#modal-fakultas" class="btn btn-primary" id="tambah-fakultas"><i class="feather icon-plus"></i></a></h5> -->
                        <!-- <h5 class="float-right"><a href="<?= base_url()?>jadwal/create" class="btn btn-primary"><i class="feather icon-plus"></i></a></h5> -->
                        <h5 class="float-right"><a href="<?= base_url()?>jadwal/create" class="btn btn-primary"><i class="feather icon-plus"></i> Tambah Data </a></h5>
                        <div style="clear: both;"></div>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table" id="data-jadwal">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="text-transform: capitalize;">Tahun Ajaran</th>
                                        <th class="text-center" style="text-transform: capitalize;">Hari</th>
                                        <th class="text-center" style="text-transform: capitalize;">Nama Matakuliah</th>
                                        <th class="text-center" style="text-transform: capitalize;">Nama Dosen</th>
                                        <th class="text-center" style="text-transform: capitalize;">Kelas</th>
                                        <th class="text-center" style="text-transform: capitalize;">Jurusan</th>
                                        <th class="text-center" style="text-transform: capitalize;">Semester</th>
                                        <th class="text-center" style="text-transform: capitalize;">Jam Masuk</th>
                                        <th class="text-center" style="text-transform: capitalize;">Jam Selesai</th>
                                        <th class="text-center" style="text-transform: capitalize;">Ruangan</th>
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
