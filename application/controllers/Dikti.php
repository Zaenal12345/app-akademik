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
		
		// get semester dari feeder
		$temp_semester = json_decode(json_encode($this->wsfeeder->getSemester()),true);
        $semester = [];
		
		for ($i=0; $i < count($temp_semester['data']) ; $i++) { 
			$semester[] = [
				'id_semester' => $temp_semester['data'][$i]['id_semester'],
				'nama_semester' => $temp_semester['data'][$i]['nama_semester'],
			];
		}
		
		// get prodi 
		$prodi = $this->db->get('jurusan')->result();
		$matakuliah = $this->db->select('matakuliah.*,jurusan.nama_jurusan')
					->from('matakuliah')
					->join('jurusan','jurusan.id_jurusan = matakuliah.jurusan_id_matakuliah')
					->get()->result('array');

		$data = [
			'data' => $admin_data,
			'title' => 'PD DIKTI',
			'sub_title' => '',
			'semester' => $semester,
			'prodi' => $prodi,
			'matakuliah' => $matakuliah,
		];


		$this->load->view('component/header',$data);
		$this->load->view('component/sidebar',$data);
		$this->load->view('pages/pd-dikti/report',$data);
		$this->load->view('component/footer',$data);	
		$this->load->view('pages/pd-dikti/report_script');
	}

	public function matakuliah()
	{
		$temp = $this->wsfeeder->getListMataKuliah();
		$result = json_encode($temp);

		// echo $result;die();
		$data = [];

		for ($i=0; $i < count($temp->data) ; $i++) { 
			
			$data[] = [
				'kode_mata_kuliah'=> $temp->data[$i]->kode_mata_kuliah,
				'nama_mata_kuliah'=> $temp->data[$i]->nama_mata_kuliah,
				'nama_program_studi'=> $temp->data[$i]->nama_program_studi,
				'id_jenis_mata_kuliah'=> $temp->data[$i]->id_jenis_mata_kuliah,
				'id_kelompok_mata_kuliah'=> $temp->data[$i]->id_kelompok_mata_kuliah,
				'sks_mata_kuliah'=> $temp->data[$i]->sks_mata_kuliah,
				'sks_tatap_muka'=> $temp->data[$i]->sks_tatap_muka,
				'sks_praktek'=> $temp->data[$i]->sks_praktek,
				'sks_praktek_lapangan'=> $temp->data[$i]->sks_praktek_lapangan
			];

		}

		header("Content-type: application/vnd-ms-excel");
    	header("Content-Disposition: attachment; filename=".uniqid()."laporan_matakuliah.xls");

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
				<h1>Laporan Data Matakuliah<br/> Universitas Nasional PASIM<br/></h1>
			</center>

			<table border='1' cellpadding='10' cellspacing='0'>
				<tr>
					<th>Kode Matakuliah</th>
					<th>Nama Matakuliah</th>
					<th>Prodi</th>
					<th>Jenis Matakuliah</th>
					<th>Kelompok Matakuliah</th>                                    
					<th>SKS</th>     
					<th>SKS Tatap Muka</th>                                    
					<th>SKS Praktek</th>                                    
					<th>SKS Praktek Lapangan</th>                           
				</tr>
		";

		if(count($data) != 0){
			
			for ($i=0; $i < count($data); $i++) { 
				
				$view.="<tr><td>" .$data[$i]['kode_mata_kuliah']. "</td><td>". $data[$i]['nama_mata_kuliah'] ."</td><td>". $data[$i]['nama_program_studi'] ."</td><td>". $data[$i]['id_jenis_mata_kuliah'] ."</td><td>". $data[$i]['id_kelompok_mata_kuliah'] ."</td><td>". $data[$i]['sks_mata_kuliah'] ."</td><td>". $data[$i]['sks_tatap_muka'] ."</td><td>". $data[$i]['sks_praktek'] ."</td><td>". $data[$i]['sks_praktek_lapangan']  ."</td></tr>";
	
			}

		}else{

			$view .="<tr><td colspan='11' align='center'>Data tidak ditemukan!</td></tr>";

		}

		$view .="</table>";
		echo $view;
	}

	public function insertMatakuliah()
	{
		// get prodi berdasarkan matakuliah yang diambil
		$jurusan = $this->input->post('data')[0]['jurusan'];
		
		// insert matakuliah ke feeder
		$matakuliah = [];
		
		for ($i=0; $i <count($this->input->post('data')) ; $i++) { 

			$matakuliah_feeder = $this->wsfeeder->getListMataKuliah2($jurusan);

			$matakuliah[] = [
				'kode_mata_kuliah'=> $this->input->post('data')[$i]['kode_matakuliah'],
				'nama_mata_kuliah'=> $this->input->post('data')[$i]['nama_matakuliah'],
				'id_prodi'=> $matakuliah_feeder->data[0]->id_prodi,
				'id_jenis_mata_kuliah'=>  $this->input->post('data')[$i]['jenis'],
				'id_kelompok_mata_kuliah'=> "",
				'sks_mata_kuliah'=> $this->input->post('data')[$i]['sks'].".00",
				'sks_tatap_muka'=> "0.00",
				'sks_praktek'=> "0.00",
				'sks_praktek_lapangan'=> "0.00",
				'sks_simulasi'=> null,
				'metode_kuliah'=> null,
				'ada_sap'=> "0",
				'ada_silabus'=> "0",
				'ada_bahan_ajar'=> null,
				'ada_acara_praktek'=> null,
				'ada_diktat'=> null,
				'tanggal_mulai_efektif'=> null,
			];
		}

		$result = $this->wsfeeder->insertMatakuliah($matakuliah);

		if($result->error_code == 0){
			$message = [
				'success' => true,
				'message' => 'Matakuliah berhasil di export'
			];
		}else{
			$message = [
				'success' => false,
				'message' => 'Matakuliah yang dimasukkan sudah ada atau ada error. Cek kembali input yang diberikan'
			];
		}

		echo json_encode($message);


	}

	public function krs()
	{
		$temp = $this->wsfeeder->getKRS();
		$result = json_encode($temp);

		// echo $result;die();
		$data = [];

		for ($i=0; $i < count($temp->data) ; $i++) { 
			
			$data[] = [
				'nim' => $temp->data[$i]->nim,
				'nama_mahasiswa' => $temp->data[$i]->nama_mahasiswa,
				'nama_program_studi' => $temp->data[$i]->nama_program_studi,
				'nama_kelas_kuliah' => $temp->data[$i]->nama_kelas_kuliah,
				'id_periode' => $temp->data[$i]->id_periode,
				'kode_mata_kuliah' => $temp->data[$i]->kode_mata_kuliah,
				'nama_mata_kuliah' => $temp->data[$i]->nama_mata_kuliah,
				'sks_mata_kuliah' => $temp->data[$i]->sks_mata_kuliah,
				'angkatan' => $temp->data[$i]->angkatan,
			];

		}

		header("Content-type: application/vnd-ms-excel");
    	header("Content-Disposition: attachment; filename=".uniqid()."laporan_krs.xls");

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
				<h1>Laporan Data Kartu Rencana Studi<br/> Universitas Nasional PASIM<br/> Periode :</h1>
			</center>

			<table border='1' cellpadding='10' cellspacing='0'>
				<tr>
					<th>Nim</th>
					<th>Nama Mahasiswa</th>
					<th>Prodi</th>
					<th>Kelas</th>
					<th>Id Periode</th>                                    
					<th>Kode Matakuliah</th>                                    
					<th>Nama Matakuliah</th>                                    
					<th>SKS</th>     
					<th>Tahun Angkatan</th>                             
				</tr>
		";

		if(count($data) != 0){
			
			for ($i=0; $i < count($data); $i++) { 
				
				$view.="<tr><td>" .$data[$i]['nim']. "</td><td>". $data[$i]['nama_mahasiswa'] ."</td><td>". $data[$i]['nama_program_studi'] ."</td><td>". $data[$i]['nama_kelas_kuliah'] ."</td><td>". $data[$i]['id_periode'] ."</td><td>". $data[$i]['kode_mata_kuliah'] ."</td><td>". $data[$i]['nama_mata_kuliah'] ."</td><td>". $data[$i]['sks_mata_kuliah'] ."</td><td>". $data[$i]['angkatan']  ."</td></tr>";
	
			}

		}else{

			$view .="<tr><td colspan='11' align='center'>Data tidak ditemukan!</td></tr>";

		}

		$view .="</table>";
		echo $view;
	}

	public function nilai()
	{
		$temp = $this->wsfeeder->getNilai();
		$result = json_encode($temp);

		// echo $result;die();
		$data = [];

		for ($i=0; $i < count($temp->data) ; $i++) { 
			
			$data[] =[
				"nama_program_studi" => $temp->data[$i]->nama_program_studi,
				"nama_semester" => $temp->data[$i]->nama_semester,
				"kode_mata_kuliah" => $temp->data[$i]->kode_mata_kuliah,
				"nama_mata_kuliah" => $temp->data[$i]->nama_mata_kuliah,
				"sks_mata_kuliah" => $temp->data[$i]->sks_mata_kuliah,
				"nama_kelas_kuliah" => $temp->data[$i]->nama_kelas_kuliah,
				"nim" => $temp->data[$i]->nim,
				"nama_mahasiswa" => $temp->data[$i]->nama_mahasiswa,
				"jurusan" => $temp->data[$i]->jurusan,
				"angkatan" => $temp->data[$i]->angkatan,
				"nilai_angka" => $temp->data[$i]->nilai_angka,
				"nilai_indeks" => $temp->data[$i]->nilai_indeks,
				"nilai_huruf" => $temp->data[$i]->nilai_huruf
			];

		}

		header("Content-type: application/vnd-ms-excel");
    	header("Content-Disposition: attachment; filename=".uniqid()."laporan_nilai_mahasiswa.xls");

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
				<h1>Laporan Data Nilai Mahasiswa<br/> Universitas Nasional PASIM<br/> Periode :</h1>
			</center>

			<table border='1' cellpadding='10' cellspacing='0'>
				<tr>
					<th>NIM</th>
					<th>Nama Mahasiswa</th>
					<th>Prodi</th>
					<th>Angkatan</th>
					<th>Semester</th>                                     
					<th>Kode Matakuliah</th>                                    
					<th>Matakuliah</th>                                    
					<th>SKS</th>                                    
					<th>Kelas</th>                                    
					<th>Nilai</th>                         
					<th>Indeks</th>                         
					<th>Grade</th>                                 
				</tr>
		";

		if(count($data) != 0){
			
			for ($i=0; $i < count($data); $i++) { 
				
				$view.="<tr><td>" .$data[$i]['nim']. "</td><td>". $data[$i]['nama_mahasiswa'] ."</td><td>". $data[$i]['nama_program_studi'] ."</td><td>". $data[$i]['angkatan'] ."</td><td>". $data[$i]['nama_semester'] ."</td><td>". $data[$i]['kode_mata_kuliah'] ."</td><td>". $data[$i]['nama_mata_kuliah'] ."</td><td>". $data[$i]['sks_mata_kuliah'] ."</td><td>". $data[$i]['nama_kelas_kuliah'] ."</td><td>". $data[$i]['nilai_angka'] ."</td><td>". $data[$i]['nilai_indeks'] ."</td><td>" .$data[$i]['nilai_huruf']. "</td></tr>";
	
			}

		}else{

			$view .="<tr><td colspan='11' align='center'>Data tidak ditemukan!</td></tr>";

		}

		$view .="</table>";
		echo $view;
	}

	public function aktivitas_mahasiswa()
	{
		$temp = $this->wsfeeder->getListPerkuliahanMahasiswa();
		$result = json_encode($temp);

		// echo $result;die();
		$data = [];

		for ($i=0; $i < count($temp->data) ; $i++) { 
			
			$data[] =[
				"nim"=> $temp->data[$i]->nim,
				"nama_mahasiswa"=> $temp->data[$i]->nama_mahasiswa,
				"nama_program_studi"=> $temp->data[$i]->nama_program_studi,
				"angkatan"=> $temp->data[$i]->angkatan,
				"nama_semester"=> $temp->data[$i]->nama_semester,
				"nama_status_mahasiswa"=> $temp->data[$i]->nama_status_mahasiswa,
				"ips"=> $temp->data[$i]->ips,
				"ipk"=> $temp->data[$i]->ipk,
				"sks_semester"=> $temp->data[$i]->sks_semester,
				"sks_total"=> $temp->data[$i]->sks_total,
				"biaya_kuliah_smt"=> null
			];

		}

		header("Content-type: application/vnd-ms-excel");
    	header("Content-Disposition: attachment; filename=".uniqid()."laporan_aktivitas_mahasiswa.xls");

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
				<h1>Laporan Data Aktivitas Mahasiswa<br/> Universitas Nasional PASIM<br/> Periode :</h1>
			</center>

			<table border='1' cellpadding='10' cellspacing='0'>
				<tr>
					<th>NIM</th>
					<th>Nama Mahasiswa</th>
					<th>Prodi</th>
					<th>Angkatan</th>
					<th>Semester</th>                                    
					<th>Status Mahasiswa</th>                                    
					<th>IPS</th>                                    
					<th>IPK</th>                         
					<th>SKS Semester</th>                         
					<th>SKS Total</th>                         
					<th>Biaya Kuliah</th>                         
				</tr>
		";

		if(count($data) != 0){
			
			for ($i=0; $i < count($data); $i++) { 
				
				$view.="<tr><td>" .$data[$i]['nim']. "</td><td>". $data[$i]['nama_mahasiswa'] ."</td><td>". $data[$i]['nama_program_studi'] ."</td><td>". $data[$i]['angkatan'] ."</td><td>". $data[$i]['nama_semester'] ."</td><td>". $data[$i]['nama_status_mahasiswa'] ."</td><td>". $data[$i]['ips'] ."</td><td>". $data[$i]['ipk'] ."</td><td>". $data[$i]['sks_semester'] ."</td><td>". $data[$i]['sks_total'] ."</td><td>". $data[$i]['biaya_kuliah_smt'] ."</td></tr>";
	
			}

		}else{

			$view .="<tr><td colspan='11' align='center'>Data tidak ditemukan!</td></tr>";

		}

		$view .="</table>";
		echo $view;
	}

	public function kurikulum()
	{
		$temp = $this->wsfeeder->getKurikulum();
		$result = json_encode($temp);

		echo $result;die();
		$data = [];

		for ($i=0; $i < count($temp->data) ; $i++) { 
			
			$data[] =[
				"nama_kurikulum" =>  $temp->data[$i]->nama_kurikulum,
				"nama_program_studi" =>  $temp->data[$i]->nama_program_studi,
				"semester_mulai_berlaku" =>  $temp->data[$i]->semester_mulai_berlaku,
				"jumlah_sks_lulus" =>  $temp->data[$i]->jumlah_sks_lulus,
				"jumlah_sks_wajib" =>  $temp->data[$i]->jumlah_sks_wajib,
				"jumlah_sks_pilihan" =>  $temp->data[$i]->jumlah_sks_pilihan,
				"jumlah_sks_mata_kuliah_wajib" =>  $temp->data[$i]->jumlah_sks_mata_kuliah_wajib,
				"jumlah_sks_mata_kuliah_pilihan" =>  $temp->data[$i]->jumlah_sks_mata_kuliah_pilihan
			];

		}

		header("Content-type: application/vnd-ms-excel");
    	header("Content-Disposition: attachment; filename=".uniqid()."laporan_kurikulum.xls");

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
				<h1>Laporan Data Kurikulum<br/> Universitas Nasional PASIM<br/> Periode :</h1>
			</center>

			<table border='1' cellpadding='10' cellspacing='0'>
				<tr>
					<th>Nama Kurikulum</th>
					<th>Nama Program Studi</th>
					<th>Semester Berlaku</th>
					<th>Jumlah SKS Lulus</th>
					<th>Jumlah SKS Wajib</th>                                    
					<th>Jumlah SKS Pilihan</th>                                    
					<th>Jumlah SKS Matakuliah Wajib</th>                                    
					<th>Jumlah SKS Matakuliah Pilihan</th>                         
				</tr>
		";

		if(count($data) != 0){
			
			for ($i=0; $i < count($data); $i++) { 
				
				$view.="<tr><td>" .$data[$i]['nama_kurikulum']. "</td><td>". $data[$i]['nama_program_studi'] ."</td><td>". $data[$i]['semester_mulai_berlaku'] ."</td><td>". $data[$i]['jumlah_sks_lulus'] ."</td><td>". $data[$i]['jumlah_sks_wajib'] ."</td><td>". $data[$i]['jumlah_sks_pilihan'] ."</td><td>". $data[$i]['jumlah_sks_mata_kuliah_wajib'] ."</td><td>". $data[$i]['jumlah_sks_mata_kuliah_pilihan'] ."</td></tr>";
	
			}

		}else{

			$view .="<tr><td colspan='11' align='center'>Data tidak ditemukan!</td></tr>";

		}

		$view .="</table>";
		echo $view;
	}

	public function insertKurikulum()
	{
		
		$id_semester = $this->input->post('id_semester');
		$id_prodi = $this->input->post('id_prodi');

		$nama_kurikulum = $this->input->post('nama_kurikulum');
		$jumlah_sks_lulus = $this->input->post('jumlah_sks_lulus');
		$jumlah_sks_wajib = $this->input->post('jumlah_sks_wajib');
		$jumlah_sks_pilihan = $this->input->post('jumlah_sks_pilihan');


	}

	public function lulusan()
	{
		$temp = $this->wsfeeder->getListMahasiswaLulusDO();
		$result = json_encode($temp);
		$data = [];

		// echo $result;die();

		for ($i=0; $i < count($temp->data) ; $i++) { 
			
			$data[] = [
				'nim'=> $temp->data[$i]->nim,
				'nama_mahasiswa'=> $temp->data[$i]->nama_mahasiswa,
				'nama_program_studi'=> $temp->data[$i]->nama_program_studi,
				'angkatan'=> $temp->data[$i]->angkatan,
				'nama_jenis_keluar'=> $temp->data[$i]->nama_jenis_keluar,
				'tanggal_keluar'=> $temp->data[$i]->tanggal_keluar,
				'keterangan'=> $temp->data[$i]->keterangan,
			];

		}

		header("Content-type: application/vnd-ms-excel");
    	header("Content-Disposition: attachment; filename=".uniqid()."laporan_lulusan_mahasiswa.xls");

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
				<h1>Laporan Data Lulusan Mahasiswa<br/> Universitas Nasional PASIM<br/> Periode :</h1>
			</center>

			<table border='1' cellpadding='10' cellspacing='0'>
				<tr>
					<th>NIM</th>
					<th>Nama Mahasiswa</th>
					<th>Prodi</th>                                    
					<th>Angkatan</th>                                    
					<th>Jenis Keluar</th>                                    
					<th>Tanggal Keluar</th>  
					<th>Keterangan</th>                                  
				</tr>
		";

		if(count($data) != 0){
			
			for ($i=0; $i < count($data); $i++) { 
				
				$view.="<tr><td>" .$data[$i]['nim']. "</td><td>" .$data[$i]['nama_mahasiswa']. "</td><td>". $data[$i]['nama_program_studi'] ."</td><td>". $data[$i]['angkatan'] ."</td><td>". $data[$i]['nama_jenis_keluar'] ."</td><td>". $data[$i]['tanggal_keluar'] ."</td><td>". $data[$i]['keterangan'] ."</td></tr>";
	
			}

		}else{

			$view .="<tr><td colspan='11' align='center'>Data tidak ditemukan!</td></tr>";

		}

		$view .="</table>";
		echo $view;
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
				<h1>Laporan Data Mahasiswa<br/> Universitas Nasional PASIM<br/> Periode :</h1>
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