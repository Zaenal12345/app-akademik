
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
                                <p class="m-b-0"><a href="<?= base_url()?>mahasiswa" style="color:white">lihat detail<i class="feather icon-more-horizontal m-l-10"></a></i></p>
                                <i class="card-icon fas fa-user-graduate"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card bg-c-blue order-card">
                            <div class="card-body">
                                <h6 class="text-white">Total Dosen</h6>
                                <h2 class="text-white"><?= $dosen?></h2>
                                <p class="m-b-0"><a href="<?= base_url()?>dosen" style="color:white">lihat detail<i class="feather icon-more-horizontal m-l-10"></a></i></p>
                                <i class="card-icon fas fa-user-tie"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card bg-c-green order-card">
                            <div class="card-body">
                                <h6 class="text-white">Total Fakultas</h6>
                                <h2 class="text-white"><?= $fakultas?></h2>
                                <p class="m-b-0"><a href="<?= base_url()?>fakultas" style="color:white">lihat detail<i class="feather icon-more-horizontal m-l-10"></a></i></p>
                                <i class="card-icon fas fa-ellipsis-v"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card bg-c-purple order-card">
                            <div class="card-body">
                                <h6 class="text-white">Total Jurusan</h6>
                                <h2 class="text-white"><?= $jurusan?></h2>
                                <p class="m-b-0"><a href="<?= base_url()?>jurusan" style="color:white">lihat detail<i class="feather icon-more-horizontal m-l-10"></a></i></p>
                                <i class="card-icon fas fa-layer-group"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- page statustic card end -->
            </div>

            <div class="col-xl-12 col-md-12">
                <div class="row">
                    <div class="col-6">
                        
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
                                <table class="table">
                                    <tr>
                                        <th>Mahasiswa Aktif</th>
                                        <td>:</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>Mahasiswa Non Aktif </th>
                                        <td>:</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>Mahasiswa Lulus </th>
                                        <td>:</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>Mahasiswa Cuti </th>
                                        <td>:</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>Mahasiswa Keluar </th>
                                        <td>:</td>
                                        <td></td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h5>Grafik Jumlah Mahasiswa Berdasarkan Jurusan</h5>
                            </div>
                            <div class="card-body">
                                <div id="pie-chart-2" style="width:100%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>