
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
                                                    <td style="height:50px">&nbsp;<b>Matakuliah</b></td>
                                                    <td>
                                                        :&nbsp;&nbsp;&nbsp;<div class="btn-group">
                                                            <button class="btn  btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pilih Aksi</button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="<?= base_url()?>dikti/matakuliah">Download Data</a>
                                                                <a class="dropdown-item" href="#" data-target="#modal-insert_matakuliah" data-toggle="modal">Export Ke PD DIKTI</a>
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
                                                                <a class="dropdown-item" href="#">Export Data Ke PD DIKTI</a>
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

<!-- modal add matakuliah -->
<div class="modal fade" id="modal-insert_matakuliah" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4" id="myLargeModalLabel">List Matakuliah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                
                <!-- alert error -->
                <div class="alert alert-danger text-danger text-center" id="alert-error" style="display: none;"></div>

                <div class="table-responsive">
                    <table class="table" id="table-matakuliah" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center" style="text-transform: capitalize;display: none">id Matakuliah</th>
                                <th class="text-center" style="text-transform: capitalize;">Kode Matakuliah</th>
                                <th class="text-center" style="text-transform: capitalize;">Nama Matakuliah</th>
                                <th class="text-center" style="text-transform: capitalize;">SKS</th>
                                <th class="text-center" style="text-transform: capitalize;">Semester</th>
                                <th class="text-center" style="text-transform: capitalize;">Nama Jurusan</th>
                                <th class="text-center" style="text-transform: capitalize;">Jenis</th>
                                <th class="text-center" style="text-transform: capitalize;"><input type="checkbox" name="select_all"></th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php foreach($matakuliah as $item):?>
                                <tr>
                                    <td class="text-center" style="display:none"><?= $item['id_matakuliah']?></td>
                                    <td class="text-center"><?= $item['kode_matakuliah']?></td>
                                    <td class="text-center"><?= $item['nama_matakuliah']?></td>
                                    <td class="text-center"><?= $item['sks']?></td>
                                    <td class="text-center"><?= $item['semester']?></td>
                                    <td class="text-center"><?= $item['nama_jurusan']?></td>
                                    <td class="text-center"><?= $item['jenis']?></td>
                                    <td class="text-center"><input type="checkbox"></td>
                                </tr>
                           <?php endforeach;?>
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="feather icon-x"></i></button>
                <button type="submit" class="btn btn-primary" id="btn-save"><i class="feather icon-save"></i></button>
            </div>
        </div>
    </div>
</div>


<!-- href="<?= base_url()?>dikti/insertMatakuliah" -->