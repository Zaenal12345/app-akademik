
<style>
    .table td {
        border-top: 1px solid #e2e5e8;
        white-space: nowrap;
        padding: .70rem 0.5rem;
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
                            <h5 class="m-b-10">PD DIKTI</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url()?>dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">PD DIKTI</a></li>
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
                    <div class="card-body table-border-style">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Jenis Report (Export dan Import)</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td style="height:50px">&nbsp;<b>Mahasiswa</b></td>
                                                    <td>
                                                        :&nbsp;&nbsp;&nbsp;<div class="btn-group">
                                                            <button class="btn  btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pilih Aksi</button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="<?= base_url()?>dikti/mahasiswa">Download Data</a>
                                                                <a class="dropdown-item" href="#">Export Data Ke PD DIKTI</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="height:50px">&nbsp;<b>Dosen</b></td>
                                                    <td>
                                                        :&nbsp;&nbsp;&nbsp;<div class="btn-group">
                                                            <button class="btn  btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pilih Aksi</button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="<?= base_url()?>dikti/dosen">Download Data</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="height:50px">&nbsp;<b>Kurikulum</b></td>
                                                    <td>
                                                        :&nbsp;&nbsp;&nbsp;<div class="btn-group">
                                                            <button class="btn  btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pilih Aksi</button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="<?= base_url()?>dikti/kurikulum">Download Data</a>
                                                                <a class="dropdown-item" href="#">Export Data Ke PD DIKTI</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="height:50px">&nbsp;<b>Lulusan</b></td>
                                                    <td>
                                                        :&nbsp;&nbsp;&nbsp;<div class="btn-group">
                                                            <button class="btn  btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pilih Aksi</button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="<?= base_url()?>dikti/lulusan">Download Data</a>
                                                                <a class="dropdown-item" href="#">Export Data Ke PD DIKTI</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="height:50px">&nbsp;<b>KRS</b></td>
                                                    <td>
                                                        :&nbsp;&nbsp;&nbsp;<div class="btn-group">
                                                            <button class="btn  btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pilih Aksi</button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="<?= base_url()?>dikti/krs">Download Data</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="height:50px">&nbsp;<b>Nilai</b></td>
                                                    <td>
                                                        :&nbsp;&nbsp;&nbsp;<div class="btn-group">
                                                            <button class="btn  btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pilih Aksi</button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="<?= base_url()?>dikti/nilai">Download Data</a>
                                                                <a class="dropdown-item" href="#">Export Data Ke PD DIKTI</a>a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="height:50px">&nbsp;<b>Aktivitas Mahasiswa</b></td>
                                                    <td>
                                                        :&nbsp;&nbsp;&nbsp;<div class="btn-group">
                                                            <button class="btn  btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pilih Aksi</button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="<?= base_url()?>dikti/status_mahasiswa_aktif">Download Data</a>
                                                                <a class="dropdown-item" href="#">Export Data Ke PD DIKTI</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="height:50px">&nbsp;<b>Status Mahasiswa</b></td>
                                                    <td>
                                                        :&nbsp;&nbsp;&nbsp;<div class="btn-group">
                                                            <button class="btn  btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pilih Aksi</button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="<?= base_url()?>dikti/status_mahasiswa_aktif">Aktif</a>
                                                                <a class="dropdown-item" href="<?= base_url()?>dikti/status_mahasiswa_non_aktif">Non Aktif</a>
                                                                <a class="dropdown-item" href="<?= base_url()?>dikti/status_mahasiswa_cuti">Cuti</a>
                                                                <a class="dropdown-item" href="<?= base_url()?>dikti/status_mahasiswa_lulus">Lulus</a>
                                                                <a class="dropdown-item" href="<?= base_url()?>dikti/status_mahasiswa_keluar">Keluar</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <br>
                                    <h5>Catatan :</h5>
                                    <ul>
                                        <li class="text-justify">Pada saat export <b>Nilai</b>, itu sudah termasuk dengan export <b>Kartu Rencana Studi (KRS)</b>.</li>
                                        <li class="text-justify"><b>Nilai</b> dan <b>KRS</b> merupakan satu kesatuan, lakukan export ke Feeder apabila data yang di input sudah benar.</li>
                                        <li class="text-justify">Wajib konfirmasi ke admin.</li>
                                    </ul>
                                </div>
                            </div>
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
