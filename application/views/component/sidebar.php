
<!-- [ Pre-loader ] start -->
<div class="loader-bg">
	<div class="loader-track">
		<div class="loader-fill"></div>
	</div>
</div>
<!-- [ Pre-loader ] End -->

<!-- [ navigation menu ] start -->
<nav class="pcoded-navbar menu-light ">
	<div class="navbar-wrapper">
		<div class="navbar-content scroll-div ">
			
			<div class="">
				<div class="main-menu-header">
					<img class="img-radius" src="<?= base_url('assets/')?>logo.png" alt="User-Profile-Image">
					<div class="user-details">
						<div id="more-details"><?= strtoupper($data->username); ?></div>
					</div>
				</div>
			</div>
			
			<ul class="nav pcoded-inner-navbar ">
				<li class="nav-item pcoded-menu-caption">
				    <label>Main</label>
				</li>
				<li class="nav-item <?= $title == 'Dashboard' ? 'active' : '' ?>">
				    <a href="<?= base_url()?>dashboard" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
				</li>
				<li class="nav-item pcoded-hasmenu <?= $title == 'Master' ? 'active' : '' ?>">
				    <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">Master Data</span></a>
				    <ul class="pcoded-submenu">
				        <li <?= $sub_title == 'Fakultas' ? 'active' : '' ?> ><a href="<?= base_url()?>fakultas">Fakultas</a></li>
				        <li <?= $sub_title == 'Jurusan' ? 'active' : '' ?> ><a href="<?= base_url()?>jurusan">Jurusan/Prodi</a></li>
				        <li <?= $sub_title == 'Matakuliah' ? 'active' : '' ?> ><a href="<?= base_url()?>matakuliah">Matakuliah</a></li>
				        <li <?= $sub_title == 'Dosen' ? 'active' : '' ?> ><a href="<?= base_url()?>dosen">Dosen</a></li>
				        <li <?= $sub_title == 'Mahasiswa' ? 'active' : '' ?> ><a href="<?= base_url()?>mahasiswa">Mahasiswa</a></li>
				        <li <?= $sub_title == 'Tahun Ajar' ? 'active' : '' ?> ><a href="<?= base_url()?>tahunajar">Tahun Ajar</a></li>
				        <li <?= $sub_title == 'Kelas' ? 'active' : '' ?> ><a href="<?= base_url()?>kelas">Kelas Kuliah</a></li>
				        <li <?= $sub_title == 'Kurikulum' ? 'active' : '' ?> ><a href="<?= base_url()?>kurikulum">Kurikulum</a></li>
				    </ul>
				</li>
				<li class="nav-item <?= $title == 'Kegiatan' ? 'active' : '' ?>">
				    <a href="<?= base_url()?>KegiatanMahasiswa" class="nav-link"><span class="pcoded-micon"><i class="feather icon-calendar"></i></span><span class="pcoded-mtext">Kegiatan Mahasiswa</span></a>
				</li>

				<!-- ============================================================= -->
				<!-- KRS & Nilai -->
				<!-- ============================================================= -->
				<!-- <li class="nav-item pcoded-menu-caption">
				    <label>KRS & Nilai</label>
				</li> -->

				<li class="nav-item  <?= $title == 'Jadwal' ? 'active' : '' ?>">
				    <a href="<?= base_url() ?>jadwal" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Penjadwalan</span></a>
				</li>
				<li class="nav-item  <?= $title == 'KRS' ? 'active' : '' ?>">
				    <a href="<?= base_url() ?>krs" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">KRS</span></a>
				</li>
				<li class="nav-item  <?= $title == 'Nilai' ? 'active' : '' ?>">
				    <a href="<?= base_url()?>nilai" class="nav-link "><span class="pcoded-micon"><i class="feather icon-align-justify"></i></span><span class="pcoded-mtext">Nilai</span></a>
				</li>


			</ul>
		
			
		</div>
	</div>
</nav>
<!-- [ navigation menu ] end -->

<!-- [ Header ] start -->
<header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">
	<div class="m-header">
		<a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
		<a href="#!" class="b-brand">
			<!-- ========   change your logo hear   ============ -->
			<!-- <img src="<?= base_url()?>assets/template/dist/assets/images/logo.png" alt="" class="logo"> -->SIAKAD UNAS PASIM
			<img src="<?= base_url()?>assets/template/dist/assets/images/logo-icon.png" alt="" class="logo-thumb">
		</a>
		<a href="#!" class="mob-toggler">
			<i class="feather icon-more-vertical"></i>
		</a>
	</div>
	<div class="collapse navbar-collapse">
		
		<ul class="navbar-nav ml-auto">

			<li>
				<div class="dropdown drp-user">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="feather icon-user"></i>
					</a>
					<div class="dropdown-menu dropdown-menu-right profile-notification">
						<div class="pro-head">
							<img src="<?= base_url('assets/')?>logo.png" class="img-radius" alt="User-Profile-Image">
							<span><?= strtoupper($data->username); ?></span>
							<!-- <a href="auth-signin.html" class="dud-logout" title="Logout">
								<i class="feather icon-log-out"></i>
							</a> -->
						</div>
						<ul class="pro-body">
							<li><a href="user-profile.html" class="dropdown-item"><i class="feather icon-user"></i> Profile</a></li>
							<li><a href="<?= base_url()?>auth/logout" class="dropdown-item"><i class="feather  icon-log-out"></i> Logout</a></li>
							<!-- <li><a href="auth-signin.html" class="dropdown-item"><i class="feather icon-lock"></i> Lock Screen</a></li> -->
						</ul>
					</div>
				</div>
			</li>
		</ul>
	</div>				
</header>
<!-- [ Header ] end -->
	