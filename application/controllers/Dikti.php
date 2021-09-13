<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Dikti Controller for show all information about academic in unas pasim
 */
class Dikti extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('AuthModel');
		$this->load->library('wsfeeder');
		
	}

	public function index()
	{
		$this->check->user_login();
		
		// get admin data
		$admin_data = $this->AuthModel->getDataByUsername($this->session->userdata('username'));

		$data = [
			'data' => $admin_data,
			'title' => 'PD DIKTI',
			'sub_title' => '',
		];

		$this->load->view('component/header',$data);
		$this->load->view('component/sidebar',$data);
		$this->load->view('pages/pd-dikti/report',$data);
		$this->load->view('component/footer',$data);	
	}

	public function krs()
	{
		# code...
	}

	public function nilai()
	{
		# code...
	}

	public function kurikulum()
	{
		# code...
	}

	public function lulusan()
	{
		# code...
	}

	public function dosen()
	{
		$temp = $this->wsfeeder->getAllDosen();
		$result = json_encode($temp);
		$data = [];

		// for ($i=0; $i < count($temp->data) ; $i++) { 
			
		// 	$data[] = [
		// 		'nidn' => $temp->data[$i]->nidn,
		// 		'nip' => $temp->data[$i]->nip,
		// 		'nama_dosen' => $temp->data[$i]->nama_dosen,
		// 		'nama_agama' => $temp->data[$i]->nama_agama,
		// 		'jenis_kelamin' => $temp->data[$i]->jenis_kelamin,
		// 		'tanggal_lahir' => $temp->data[$i]->tanggal_lahir,
		// 		'nama_status_dosen' => $temp->data[$i]->nama_status_aktif,
		// 	];

		// }
		var_dump($temp);die();

		header("Content-type: application/vnd-ms-excel");
    	header("Content-Disposition: attachment; filename=".uniqid()."laporan_mahasiswa.xls");

		$view = "
			<style type='text/css'>
			body{
				font-family: sans-serif;
			}
			table{
				margin: 20px auto;
				border-collapse: collapse;
			}
			table th,
			table td{
				border: 1px solid #3c3c3c;
				padding: 3px 8px;
		
			}
			a{
				background: blue;
				color: #fff;
				padding: 8px 10px;
				text-decoration: none;
				border-radius: 2px;
			}
			</style>

			<center>
				<h1>Laporan Data Dosen<br/> Universitas Nasional PASIM</h1>
			</center>

			<table border='1' cellpadding='10' cellspacing='0'>
				<tr>
					<th>NIDN</th>
					<th>NIK</th>
					<th>Nama Dosen</th>
					<th>Status</th>                                    
					<th>Agama</th>                                    
					<th>Tanggal Lahir</th>                                    
					<th>Tempat Lahir</th>                                    
					<th>Jenis Kelamin</th>
					<th>Status</th>
					<th>Pendidikan Terakhir</th>
					<th>Gelar</th>
					<th>Alamat</th>                                    
				</tr>
		";

		if(count($data) != 0){
			
			for ($i=0; $i < count($data); $i++) { 
				
				$view.="<tr><td>" .$data[$i]['nik']. "</td><td>" .$data[$i]['nidn']. "</td><td>". $data[$i]['nama_dosen'] ."</td><td>". $data[$i]['nama_status_dosen'] ."</td><td></td><td>". $data[$i]['nama_agama'] ."</td><td>". $data[$i]['tanggal_lahir'] ."</td><td></td><td>". $data[$i]['jenis_kelamin'] ."</td><td></td><td></td><td></td></tr>";
	
			}

		}else{

			$view .="<tr><td colspan='11' align='center'>Data tidak ditemukan!</td></tr>";

		}

		$view .="</table>";
		echo $view;
	}

	public function mahasiswa()
	{
		$temp = $this->wsfeeder->getAllMahasiswa();
		$result = json_encode($temp);
		$data = [];

		for ($i=0; $i < count($temp->data) ; $i++) { 
			
			$data[] = [
				'nim' => $temp->data[$i]->nim,
				'nama_mahasiswa' => $temp->data[$i]->nama_mahasiswa,
				'nama_program_studi' => $temp->data[$i]->nama_program_studi,
				'nama_agama' => $temp->data[$i]->nama_agama,
				'jenis_kelamin' => $temp->data[$i]->jenis_kelamin,
				'tanggal_lahir' => $temp->data[$i]->tanggal_lahir,
				'nama_status_mahasiswa' => $temp->data[$i]->nama_status_mahasiswa,
				'nama_periode_masuk' => $temp->data[$i]->nama_periode_masuk,
			];

		}

		header("Content-type: application/vnd-ms-excel");
    	header("Content-Disposition: attachment; filename=".uniqid()."laporan_mahasiswa.xls");

		$view = "
			<style type='text/css'>
			body{
				font-family: sans-serif;
			}
			table{
				margin: 20px auto;
				border-collapse: collapse;
			}
			table th,
			table td{
				border: 1px solid #3c3c3c;
				padding: 3px 8px;
		
			}
			a{
				background: blue;
				color: #fff;
				padding: 8px 10px;
				text-decoration: none;
				border-radius: 2px;
			}
			</style>

			<center>
				<h1>Laporan Data Mahasiswa<br/> Universitas Nasional PASIM</h1>
			</center>

			<table border='1' cellpadding='10' cellspacing='0'>
				<tr>
					<th>Nim</th>
					<th>Nama Mahasiswa</th>
					<th>Prodi</th>
					<th>Kelas</th>
					<th>Status</th>                                    
					<th>Agama</th>                                    
					<th>Tanggal Lahir</th>                                    
					<th>Tempat Lahir</th>                                    
					<th>Jenis Kelamin</th>
					<th>Tahun Angkatan</th>
					<th>Alamat</th>                                    
				</tr>
		";

		if(count($data) != 0){
			
			for ($i=0; $i < count($data); $i++) { 
				
				$view.="<tr><td>" .$data[$i]['nim']. "</td><td>". $data[$i]['nama_mahasiswa'] ."</td><td>". $data[$i]['nama_program_studi'] ."</td><td></td><td>". $data[$i]['nama_status_mahasiswa'] ."</td><td>". $data[$i]['nama_agama'] ."</td><td>". $data[$i]['tanggal_lahir'] ."</td><td></td><td>". $data[$i]['jenis_kelamin'] ."</td><td>". $data[$i]['nama_periode_masuk'] ."</td><td></td></tr>";
	
			}

		}else{

			$view .="<tr><td colspan='11' align='center'>Data tidak ditemukan!</td></tr>";

		}

		$view .="</table>";
		echo $view;
	}

	public function status_mahasiswa_aktif()
	{
		$temp = $this->wsfeeder->getMahasiswaAktif();
		$result = json_encode($temp);
		$data = [];

		for ($i=0; $i < count($temp->data) ; $i++) { 
			
			$data[] = [
				'nim' => $temp->data[$i]->nim,
				'nama_mahasiswa' => $temp->data[$i]->nama_mahasiswa,
				'nama_program_studi' => $temp->data[$i]->nama_program_studi,
				'nama_agama' => $temp->data[$i]->nama_agama,
				'jenis_kelamin' => $temp->data[$i]->jenis_kelamin,
				'tanggal_lahir' => $temp->data[$i]->tanggal_lahir,
				'nama_status_mahasiswa' => $temp->data[$i]->nama_status_mahasiswa,
				'nama_periode_masuk' => $temp->data[$i]->nama_periode_masuk,
			];

		}

		header("Content-type: application/vnd-ms-excel");
    	header("Content-Disposition: attachment; filename=".uniqid()."laporan_mahasiswa_aktif.xls");

		$view = "
			<style type='text/css'>
			body{
				font-family: sans-serif;
			}
			table{
				margin: 20px auto;
				border-collapse: collapse;
			}
			table th,
			table td{
				border: 1px solid #3c3c3c;
				padding: 3px 8px;
		
			}
			a{
				background: blue;
				color: #fff;
				padding: 8px 10px;
				text-decoration: none;
				border-radius: 2px;
			}
			</style>

			<center>
				<h1>Laporan Data Mahasiswa Dengan Status Aktif<br/> Universitas Nasional PASIM</h1>
			</center>

			<table border='1' cellpadding='10' cellspacing='0'>
				<tr>
					<th>Nim</th>
					<th>Nama Mahasiswa</th>
					<th>Prodi</th>
					<th>Kelas</th>
					<th>Status</th>                                    
					<th>Agama</th>                                    
					<th>Tanggal Lahir</th>                                    
					<th>Tempat Lahir</th>                                    
					<th>Jenis Kelamin</th>
					<th>Tahun Angkatan</th>
					<th>Alamat</th>                                    
				</tr>
		";

		if(count($data) != 0){
			
			for ($i=0; $i < count($data); $i++) { 
				
				$view.="<tr><td>" .$data[$i]['nim']. "</td><td>". $data[$i]['nama_mahasiswa'] ."</td><td>". $data[$i]['nama_program_studi'] ."</td><td></td><td>". $data[$i]['nama_status_mahasiswa'] ."</td><td>". $data[$i]['nama_agama'] ."</td><td>". $data[$i]['tanggal_lahir'] ."</td><td></td><td>". $data[$i]['jenis_kelamin'] ."</td><td>". $data[$i]['nama_periode_masuk'] ."</td><td></td></tr>";
	
			}

		}else{

			$view .="<tr><td colspan='11' align='center'>Data tidak ditemukan!</td></tr>";

		}

		$view .="</table>";
		echo $view;
		
		// $this->load->view('pd-dikti/report_excel',[
		// 	'data' => json_encode($data),
		// ]);

	}

	public function status_mahasiswa_non_aktif()
	{
		$temp = $this->wsfeeder->getMahasiswaNonAktif();
		$result = json_encode($temp);
		$data = [];

		for ($i=0; $i < count($temp->data) ; $i++) { 
			
			$data[] = [
				'nim' => $temp->data[$i]->nim,
				'nama_mahasiswa' => $temp->data[$i]->nama_mahasiswa,
				'nama_program_studi' => $temp->data[$i]->nama_program_studi,
				'nama_agama' => $temp->data[$i]->nama_agama,
				'jenis_kelamin' => $temp->data[$i]->jenis_kelamin,
				'tanggal_lahir' => $temp->data[$i]->tanggal_lahir,
				'nama_status_mahasiswa' => $temp->data[$i]->nama_status_mahasiswa,
				'nama_periode_masuk' => $temp->data[$i]->nama_periode_masuk,
			];

		}

		header("Content-type: application/vnd-ms-excel");
    	header("Content-Disposition: attachment; filename=".uniqid()."laporan_mahasiswa_non_aktif.xls");

		$view = "
			<style type='text/css'>
			body{
				font-family: sans-serif;
			}
			table{
				margin: 20px auto;
				border-collapse: collapse;
			}
			table th,
			table td{
				border: 1px solid #3c3c3c;
				padding: 3px 8px;
		
			}
			a{
				background: blue;
				color: #fff;
				padding: 8px 10px;
				text-decoration: none;
				border-radius: 2px;
			}
			</style>

			<center>
				<h1>Laporan Data Mahasiswa Dengan Status Non Aktif<br/> Universitas Nasional PASIM</h1>
			</center>

			<table border='1' cellpadding='10' cellspacing='0'>
				<tr>
					<th>Nim</th>
					<th>Nama Mahasiswa</th>
					<th>Prodi</th>
					<th>Kelas</th>
					<th>Status</th>                                    
					<th>Agama</th>                                    
					<th>Tanggal Lahir</th>                                    
					<th>Tempat Lahir</th>                                    
					<th>Jenis Kelamin</th>
					<th>Tahun Angkatan</th>
					<th>Alamat</th>                                    
				</tr>
		";

		if(count($data) != 0){
			
			for ($i=0; $i < count($data); $i++) { 
				
				$view.="<tr><td>" .$data[$i]['nim']. "</td><td>". $data[$i]['nama_mahasiswa'] ."</td><td>". $data[$i]['nama_program_studi'] ."</td><td></td><td>". $data[$i]['nama_status_mahasiswa'] ."</td><td>". $data[$i]['nama_agama'] ."</td><td>". $data[$i]['tanggal_lahir'] ."</td><td></td><td>". $data[$i]['jenis_kelamin'] ."</td><td>". $data[$i]['nama_periode_masuk'] ."</td><td></td></tr>";
	
			}

		}else{

			$view .="<tr><td colspan='11' align='center'>Data tidak ditemukan!</td></tr>";

		}


		$view .="</table>";

		echo $view;
		// $this->load->view('pd-dikti/report_excel',[
		// 	'data' => $data,
		// ]);

	}

	public function status_mahasiswa_lulus()
	{
		$temp = $this->wsfeeder->getMahasiswaLulus();
		$result = json_encode($temp);
		$data = [];

		for ($i=0; $i < count($temp->data) ; $i++) { 
			
			$data[] = [
				'nim' => $temp->data[$i]->nim,
				'nama_mahasiswa' => $temp->data[$i]->nama_mahasiswa,
				'nama_program_studi' => $temp->data[$i]->nama_program_studi,
				'nama_agama' => $temp->data[$i]->nama_agama,
				'jenis_kelamin' => $temp->data[$i]->jenis_kelamin,
				'tanggal_lahir' => $temp->data[$i]->tanggal_lahir,
				'nama_status_mahasiswa' => $temp->data[$i]->nama_status_mahasiswa,
				'nama_periode_masuk' => $temp->data[$i]->nama_periode_masuk,
			];

		}

		header("Content-type: application/vnd-ms-excel");
    	header("Content-Disposition: attachment; filename=".uniqid()."laporan_mahasiswa_lulus.xls");

		$view = "
			<style type='text/css'>
			body{
				font-family: sans-serif;
			}
			table{
				margin: 20px auto;
				border-collapse: collapse;
			}
			table th,
			table td{
				border: 1px solid #3c3c3c;
				padding: 3px 8px;
		
			}
			a{
				background: blue;
				color: #fff;
				padding: 8px 10px;
				text-decoration: none;
				border-radius: 2px;
			}
			</style>

			<center>
				<h1>Laporan Data Mahasiswa Dengan Status Lulus<br/> Universitas Nasional PASIM</h1>
			</center>

			<table border='1' cellpadding='10' cellspacing='0'>
				<tr>
					<th>Nim</th>
					<th>Nama Mahasiswa</th>
					<th>Prodi</th>
					<th>Kelas</th>
					<th>Status</th>                                    
					<th>Agama</th>                                    
					<th>Tanggal Lahir</th>                                    
					<th>Tempat Lahir</th>                                    
					<th>Jenis Kelamin</th>
					<th>Tahun Angkatan</th>
					<th>Alamat</th>                                    
				</tr>
		";

		if(count($data) != 0){
			
			for ($i=0; $i < count($data); $i++) { 
				
				$view.="<tr><td>" .$data[$i]['nim']. "</td><td>". $data[$i]['nama_mahasiswa'] ."</td><td>". $data[$i]['nama_program_studi'] ."</td><td></td><td>". $data[$i]['nama_status_mahasiswa'] ."</td><td>". $data[$i]['nama_agama'] ."</td><td>". $data[$i]['tanggal_lahir'] ."</td><td></td><td>". $data[$i]['jenis_kelamin'] ."</td><td>". $data[$i]['nama_periode_masuk'] ."</td><td></td></tr>";
	
			}

		}else{

			$view .="<tr><td colspan='11' align='center'>Data tidak ditemukan!</td></tr>";

		}


		$view .="</table>";

		echo $view;

		// $this->load->view('pd-dikti/report_excel',[
		// 	'data' => $data,
		// ]);

	}

	public function status_mahasiswa_keluar()
	{
		$temp1 = $this->wsfeeder->getMahasiswaKeluar1();
		$temp2 = $this->wsfeeder->getMahasiswaKeluar2();
		$result = json_encode($temp1);
		$data1 = [];
		$data2 = [];
		$count = 0;

		for ($i=0; $i < count($temp1->data) ; $i++) { 
			
			$data1[] = [
				'nim' => $temp1->data[$i]->nim,
				'nama_mahasiswa' => $temp1->data[$i]->nama_mahasiswa,
				'nama_program_studi' => $temp1->data[$i]->nama_program_studi,
				'nama_agama' => $temp1->data[$i]->nama_agama,
				'jenis_kelamin' => $temp1->data[$i]->jenis_kelamin,
				'tanggal_lahir' => $temp1->data[$i]->tanggal_lahir,
				'nama_status_mahasiswa' => $temp1->data[$i]->nama_status_mahasiswa,
				'nama_periode_masuk' => $temp1->data[$i]->nama_periode_masuk,
			];

		}

		for ($j=0; $j < count($temp2->data) ; $j++) { 
			
			$data2[] = [
				'nim' => $temp2->data[$j]->nim,
				'nama_mahasiswa' => $temp2->data[$j]->nama_mahasiswa,
				'nama_program_studi' => $temp2->data[$j]->nama_program_studi,
				'nama_agama' => $temp2->data[$j]->nama_agama,
				'jenis_kelamin' => $temp2->data[$j]->jenis_kelamin,
				'tanggal_lahir' => $temp2->data[$j]->tanggal_lahir,
				'nama_status_mahasiswa' => $temp2->data[$j]->nama_status_mahasiswa,
				'nama_periode_masuk' => $temp2->data[$j]->nama_periode_masuk,
			];

		}

		// array_push($data1,$data2);

		// var_dump($data1);die();

		header("Content-type: application/vnd-ms-excel");
    	header("Content-Disposition: attachment; filename=".uniqid()."laporan_mahasiswa_keluar.xls");

		$view = "
			<style type='text/css'>
			body{
				font-family: sans-serif;
			}
			table{
				margin: 20px auto;
				border-collapse: collapse;
			}
			table th,
			table td{
				border: 1px solid #3c3c3c;
				padding: 3px 8px;
		
			}
			a{
				background: blue;
				color: #fff;
				padding: 8px 10px;
				text-decoration: none;
				border-radius: 2px;
			}
			</style>

			<center>
				<h1>Laporan Data Mahasiswa Dengan Status Keluar<br/> Universitas Nasional PASIM</h1>
			</center>

			<table border='1' cellpadding='10' cellspacing='0'>
				<tr>
					<th>Nim</th>
					<th>Nama Mahasiswa</th>
					<th>Prodi</th>
					<th>Kelas</th>
					<th>Status</th>                                    
					<th>Agama</th>                                    
					<th>Tanggal Lahir</th>                                    
					<th>Tempat Lahir</th>                                    
					<th>Jenis Kelamin</th>
					<th>Tahun Angkatan</th>
					<th>Alamat</th>                                    
				</tr>
		";

		if(count($data1) != 0 || count($data2) != 0){
			
			for ($i=0; $i < count($data1); $i++) { 
				
				$view.="<tr><td>" .$data1[$i]['nim']. "</td><td>". $data1[$i]['nama_mahasiswa'] ."</td><td>". $data1[$i]['nama_program_studi'] ."</td><td></td><td>". $data1[$i]['nama_status_mahasiswa'] ."</td><td>". $data1[$i]['nama_agama'] ."</td><td>". $data1[$i]['tanggal_lahir'] ."</td><td></td><td>". $data1[$i]['jenis_kelamin'] ."</td><td>". $data1[$i]['nama_periode_masuk'] ."</td><td></td></tr>";
	
			}

			for ($i=0; $i < count($data2); $i++) { 
				
				$view.="<tr><td>" .$data2[$i]['nim']. "</td><td>". $data2[$i]['nama_mahasiswa'] ."</td><td>". $data2[$i]['nama_program_studi'] ."</td><td></td><td>". $data2[$i]['nama_status_mahasiswa'] ."</td><td>". $data2[$i]['nama_agama'] ."</td><td>". $data2[$i]['tanggal_lahir'] ."</td><td></td><td>". $data2[$i]['jenis_kelamin'] ."</td><td>". $data2[$i]['nama_periode_masuk'] ."</td><td></td></tr>";
	
			}

		}else{

			$view .="<tr><td colspan='11' align='center'>Data tidak ditemukan!</td></tr>";

		}


		$view .="</table>";

		echo $view;
		// $this->load->view('pd-dikti/report_excel',[
		// 	'data' => $data,
		// ]);

	}

	public function status_mahasiswa_cuti()
	{
		$temp = $this->wsfeeder->getMahasiswaAktif();
		$result = json_encode($temp);
		$data = [];

		for ($i=0; $i < count($temp->data) ; $i++) { 
			
			$data[] = [
				'nim' => $temp->data[$i]->nim,
				'nama_mahasiswa' => $temp->data[$i]->nama_mahasiswa,
				'nama_program_studi' => $temp->data[$i]->nama_program_studi,
				'nama_agama' => $temp->data[$i]->nama_agama,
				'jenis_kelamin' => $temp->data[$i]->jenis_kelamin,
				'tanggal_lahir' => $temp->data[$i]->tanggal_lahir,
				'nama_status_mahasiswa' => $temp->data[$i]->nama_status_mahasiswa,
				'nama_periode_masuk' => $temp->data[$i]->nama_periode_masuk,
			];

		}

		header("Content-type: application/vnd-ms-excel");
    	header("Content-Disposition: attachment; filename=".uniqid()."laporan_mahasiswa_cuti.xls");

		$view = "
			<style type='text/css'>
			body{
				font-family: sans-serif;
			}
			table{
				margin: 20px auto;
				border-collapse: collapse;
			}
			table th,
			table td{
				border: 1px solid #3c3c3c;
				padding: 3px 8px;
		
			}
			a{
				background: blue;
				color: #fff;
				padding: 8px 10px;
				text-decoration: none;
				border-radius: 2px;
			}
			</style>

			<center>
				<h1>Laporan Data Mahasiswa Dengan Status Cuti<br/> Universitas Nasional PASIM</h1>
			</center>

			<table border='1' cellpadding='10' cellspacing='0'>
				<tr>
					<th>Nim</th>
					<th>Nama Mahasiswa</th>
					<th>Prodi</th>
					<th>Kelas</th>
					<th>Status</th>                                    
					<th>Agama</th>                                    
					<th>Tanggal Lahir</th>                                    
					<th>Tempat Lahir</th>                                    
					<th>Jenis Kelamin</th>
					<th>Tahun Angkatan</th>
					<th>Alamat</th>                                    
				</tr>
		";

		if(count($data) != 0){
			
			for ($i=0; $i < count($data); $i++) { 
				
				$view.="<tr><td>" .$data[$i]['nim']. "</td><td>". $data[$i]['nama_mahasiswa'] ."</td><td>". $data[$i]['nama_program_studi'] ."</td><td></td><td>". $data[$i]['nama_status_mahasiswa'] ."</td><td>". $data[$i]['nama_agama'] ."</td><td>". $data[$i]['tanggal_lahir'] ."</td><td></td><td>". $data[$i]['jenis_kelamin'] ."</td><td>". $data[$i]['nama_periode_masuk'] ."</td><td></td></tr>";
	
			}

		}else{

			$view .="<tr><td colspan='11' align='center'>Data tidak ditemukan!</td></tr>";

		}


		$view .="</table>";

		echo $view;
		// $this->load->view('pd-dikti/report_excel',[
		// 	'data' => $data,
		// ]);

	}

}