
<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header" >
            <div class="page-block" >
                <div class="row align-items-center">
                    <div class="col-md-12" >
                        <div class="page-header-title">
                            <h5 class="m-b-10">Dashboard</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Dashboard</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <!-- page statustic card start -->
                <div class="row">
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <h4 class="text-c-blue"><?= $mahasiswa?></h4>
                                        <h6 class="text-muted m-b-0">Total Mahasiswa</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-c-blue">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <h4 class="text-c-green"><?= $dosen?></h4>
                                        <h6 class="text-muted m-b-0">Total Dosen</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-c-green">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <h4 class="text-c-red"><?= $fakultas?></h4>
                                        <h6 class="text-muted m-b-0">Total Fakultas</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-c-red">
                                <div class="row align-items-center">
                                    <div class="col-9">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <h4 class="text-c-blue"><?= $jurusan?></h4>
                                        <h6 class="text-muted m-b-0">Total Program Studi</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-c-blue">
                                <div class="row align-items-center">
                                    <div class="col-9">
                                    </div>
                                    <div class="col-3 text-right">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- page statustic card end -->
            </div>

            <div class="col-xl-12 col-md-12">
                <div class="card latest-update-card">
                    <div class="card-header">
                        <h5>Pengumuman/Kegiatan Kampus</h5>
                        <div class="card-header-right">
                            <div class="btn-group card-option">
                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="feather icon-more-horizontal"></i>
                                </button>
                                <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                                    <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                                    <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                                    <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="latest-update-box">
                            <?php foreach($kegiatan as $data):?>
                                <div class="row p-t-30 p-b-30">
                                    <div class="col-auto text-right update-meta">
                                        <!-- <i class="feather icon-twitter bg-twitter update-icon"></i> -->
                                        <p class="text-muted m-b-0 d-inline-flex"><?php 
                                            echo "<small>" . date_diff(date_create($data->tanggal_awal),date_create(date('Y-m-d')))->format('%a'). " hari yang <br> lalu </small>" ; 
                                        ?>&nbsp;</p>
                                        <img src="<?= base_url()?>assets/picture/activity/<?= $data->gambar_utama?>" width="40" class="rounded" alt="Cinque Terre">
                                    </div>
                                    <div class="col">
                                        <h6><?= $data->nama_kegiatan?></h6>
                                        <p class="text-muted m-b-0"><?= $data->deskripsi?></p>
                                    </div>
                                </div>
                            <?php endforeach;?>

                        </div>
                        <div class="text-center">
                            <a href="<?= base_url()?>KegiatanMahasiswa" class="b-b-primary text-primary">View all Projects</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- prject ,team member start -->
            
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>