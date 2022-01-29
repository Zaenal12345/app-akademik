
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
						<div id="more-details"><?= strtoupper($data->username);?>&nbsp;&nbsp;<i class="fa fa-caret-down"></i></div>
					</div>
				</div>
				<div class="collapse" id="nav-user-link">
					<ul class="list-unstyled">
						<li class="list-group-item"><a href="user-profile.html"><i class="feather icon-user m-r-5"></i>Profile</a></li>
						<li class="list-group-item"><a href="<?= base_url()?>auth/logout" onclick="return confirm('Apakah anda ingin logout?')"><i class="feather icon-log-out m-r-5"></i>Logout</a></li>
					</ul>
				</div>
			</div>
			
			<ul class="nav pcoded-inner-navbar ">
				<li class="nav-item pcoded-menu-caption" style="color: #ff5252">
				    <label>Main Menu</label>
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
				        <li <?= $sub_title == 'Ruangan' ? 'active' : '' ?> ><a href="<?= base_url()?>ruangan">Ruangan</a></li>
				        <li <?= $sub_title == 'Kurikulum' ? 'active' : '' ?> ><a href="<?= base_url()?>kurikulum">Kurikulum</a></li>
				    </ul>
				</li>

				<li class="nav-item pcoded-menu-caption" style="color: #ff5252">
				    <label>Other Menu</label>
				</li>
				<li class="nav-item  <?= $title == 'Jadwal' ? 'active' : '' ?>">
				    <a href="<?= base_url() ?>jadwal" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Penjadwalan</span></a>
				</li>
				<li class="nav-item  <?= $title == 'KRS' ? 'active' : '' ?>">
				    <a href="<?= base_url() ?>krs" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">KRS</span></a>
				</li>
				<li class="nav-item  <?= $title == 'Nilai' ? 'active' : '' ?>">
				    <a href="<?= base_url()?>nilai" class="nav-link "><span class="pcoded-micon"><i class="feather icon-align-justify"></i></span><span class="pcoded-mtext">Nilai</span></a>
				</li>
				<li class="nav-item  <?= $title == 'PD DIKTI' ? 'active' : '' ?>">
				    <a href="<?= base_url()?>dikti" class="nav-link "><span class="pcoded-micon"><i class="feather icon-align-justify"></i></span><span class="pcoded-mtext">PD DIKTI</span></a>
				</li>


			</ul>
		
			
		</div>
	</div>
</nav>
<!-- [ navigation menu ] end -->

<!-- [ Header ] start -->
<header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue" style="background-color: #ff5252;">
	<div class="m-header">
		<a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
		<a href="#!" class="b-brand">
			SIAKAD UNAS PASIM
			<img src="<?= base_url()?>assets/template/dist/assets/images/logo-icon.png" alt="" class="logo-thumb">
		</a>
		<a href="#!" class="mob-toggler">
			<i class="feather icon-more-vertical"></i>
		</a>
	</div>

	<div class="collapse navbar-collapse">
	</div>				
</header>
<!-- [ Header ] end -->
	