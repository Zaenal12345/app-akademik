

<section class="pcoded-main-container">
    <div class="pcoded-content">
       
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Transkip Nilai</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url()?>dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Transkip Nilai</a></li>
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

                                <div class="container">
                                    <h4 class="text-center">TRANSKIP NILAI</h4>
                                    <div class="table-responsive">
                                        <table class="table" id="list_mahasiswa">
                                            <tr>
                                                <td><b>NIM</b></td>
                                                <td><b>:</b> <?= $mahasiswa[0]->nim?></td>
                                                <td><b>Nama</b></td>
                                                <td><b>:</b> <?= $mahasiswa[0]->nama_mahasiswa?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Jurusan</b></td>
                                                <td><b>:</b> <?= $mahasiswa[0]->nama_jurusan?></td>
                                                <td><b>Kelas</b></td>
                                                <td><b>:</b> <?= $mahasiswa[0]->nama_kelas?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Tempat Lahir</b></td>
                                                <td><b>:</b> <?= $mahasiswa[0]->tempat_lahir?></td>
                                                <td><b>Tanggal Lahir</b></td>
                                                <td><b>:</b> <?= $mahasiswa[0]->tanggal_lahir?></td>
                                            </tr>
                                            <tr>
                                                <td><b>SKS Tempuh</b></td>
                                                <td><b>:</b> <?= $sks_fix?>/<?= $sks_tempuh?></td>
                                                <td><b>IPK</b></td>
                                                <td><b>:</b> <?= $ipk?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <br><br>
                                <div class="table-responsive">
                                    <table class="table" id="list_nilai">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center">Kode Matakuliah</th>
                                                <th class="text-center">Nama Matakuliah</th>
                                                <th class="text-center">SKS</th>
                                                <th class="text-center">Semester</th>
                                                <th class="text-center">Grade</th>
                                                <th class="text-center">Bobot</th>
                                                <th class="text-center">Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no=1;foreach($transkip as $data):?>
                                                <tr>
                                                    <td class="text-center"><?= $no?></td>
                                                    <td class="text-center"><?= $data['kode_matakuliah']?></td>
                                                    <td class="text-center"><?= $data['nama_matakuliah']?></td>
                                                    <td class="text-center"><?= $data['sks']?></td>
                                                    <td class="text-center"><?= $data['semester']?></td>
                                                    <td class="text-center"><?= $data['grade']?></td>
                                                    <td class="text-center"><?= $data['bobot']?></td>
                                                    <td class="text-center"><?= $data['jumlah']?></td>
                                                </tr>
                                            <?php $no++;endforeach;?>
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