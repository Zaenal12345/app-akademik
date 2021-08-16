
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
                        <h5 class="float-right"><a href="<?= base_url()?>nilai/create" class="btn btn-primary"><i class="feather icon-plus"></i></a></h5>
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
