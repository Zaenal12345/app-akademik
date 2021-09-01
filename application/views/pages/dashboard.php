
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
                        <div class="card bg-c-yellow order-card">
                            <div class="card-body">
                                <h6 class="text-white">Total Mahasiswa</h6>
                                <h2 class="text-white"><?= $mahasiswa?></h2>
                                <p class="m-b-0"><a href="" style="color:white">lihat detail<i class="feather icon-more-horizontal m-l-10"></a></i></p>
                                <i class="card-icon fas fa-user-graduate"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card bg-c-blue order-card">
                            <div class="card-body">
                                <h6 class="text-white">Total Dosen</h6>
                                <h2 class="text-white"><?= $dosen?></h2>
                                <p class="m-b-0"><a href="" style="color:white">lihat detail<i class="feather icon-more-horizontal m-l-10"></a></i></p>
                                <i class="card-icon fas fa-user-tie"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card bg-c-green order-card">
                            <div class="card-body">
                                <h6 class="text-white">Total Fakultas</h6>
                                <h2 class="text-white"><?= $fakultas?></h2>
                                <p class="m-b-0"><a href="" style="color:white">lihat detail<i class="feather icon-more-horizontal m-l-10"></a></i></p>
                                <i class="card-icon fas fa-ellipsis-v"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card bg-c-purple order-card">
                            <div class="card-body">
                                <h6 class="text-white">Total Jurusan</h6>
                                <h2 class="text-white"><?= $jurusan?></h2>
                                <p class="m-b-0"><a href="" style="color:white">lihat detail<i class="feather icon-more-horizontal m-l-10"></a></i></p>
                                <i class="card-icon fas fa-layer-group"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- page statustic card end -->
            </div>

            <div class="col-xl-12 col-md-12">
                <div class="row">
                    <div class="col-4">
                        
                        <div class="card feed-card">
                            <div class="card-header">
                                <h5>Total Mahasiswa (Berdasarkan Status)</h5>
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
                                <div class="row m-b-30">
                                    <div class="col-auto p-r-0">
                                        <i class="fas fa-user-check bg-c-blue feed-icon"></i>
                                    </div>
                                    <div class="col">
                                        <a href="#!">
                                            <h6 class="m-b-5">Mahasiswa Aktif : </h6>
                                        </a>
                                    </div>
                                </div>
                                <div class="row m-b-30">
                                    <div class="col-auto p-r-0">
                                        <i class="fas fa-user-graduate bg-c-red feed-icon"></i>
                                    </div>
                                    <div class="col">
                                        <a href="#!">
                                            <h6 class="m-b-5">Mahasiswa Lulus :</h6>
                                        </a>
                                    </div>
                                </div>
                                <div class="row m-b-30">
                                    <div class="col-auto p-r-0">
                                        <i class="fas fa-user-clock bg-c-green feed-icon"></i>
                                    </div>
                                    <div class="col">
                                        <a href="#!">
                                            <h6 class="m-b-5">Mahasiswa Cuti : </h6>
                                        </a>
                                    </div>
                                </div>
                                <div class="row m-b-20">
                                    <div class="col-auto p-r-0">
                                        <i class="fas fa-user-slash bg-c-red feed-icon"></i>
                                    </div>
                                    <div class="col">
                                        <a href="#!">
                                            <h6 class="m-b-5">Mahasiswa Non Aktif : </h6>
                                        </a>
                                    </div>
                                </div>
                                <div class="row m-b-20">
                                    <div class="col-auto p-r-0">
                                        <i class="fas fa-user-times bg-c-red feed-icon"></i>
                                    </div>
                                    <div class="col">
                                        <a href="#!">
                                            <h6 class="m-b-5">Mahasiswa Keluar : </h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-8">
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
                </div>
            </div>
            
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>