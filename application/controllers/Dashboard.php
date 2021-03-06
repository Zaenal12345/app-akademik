<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Dashboard Controller for show all information about academic in unas pasim
 */
class Dashboard extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('AuthModel');
		
	}

	public function index()
	{
		$this->check->user_login();
		
		// get admin data
		$admin_data = $this->AuthModel->getDataByUsername($this->session->userdata('username'));
		$mahasiswa = count($this->db->get('mahasiswa')->result());
		$fakultas = count($this->db->get('fakultas')->result());
		$jurusan = count($this->db->get('jurusan')->result());
		$dosen = count($this->db->get('dosen')->result());

		$aktif = count($this->db->where('status_mahasiswa','Aktif')->get('mahasiswa')->result());
		$lulus = count($this->db->where('status_mahasiswa','Lulus')->get('mahasiswa')->result());
		$cuti = count($this->db->where('status_mahasiswa','Cuti')->get('mahasiswa')->result());
		$non_aktif = count($this->db->where('status_mahasiswa','Non Aktif')->get('mahasiswa')->result());
		$keluar = count($this->db->where('status_mahasiswa','Keluar')->get('mahasiswa')->result()) + count($this->db->where('status_mahasiswa','Dikeluarkan')->get('mahasiswa')->result());

		$this->db->select('count(mhs.nim) as jumlah,j.nama_jurusan');
		$this->db->from('mahasiswa mhs');
		$this->db->join('jurusan j','mhs.jurusan_id = j.id_jurusan', 'right');
		$this->db->group_by('j.nama_jurusan');
		$data_grafik_jumlah_mahasiswa = $this->db->get()->result();


		$data = [
			'data' => $admin_data,
			'title' => 'dashboard',
			'sub_title' => '',
			'mahasiswa' => $mahasiswa,
			'fakultas' => $fakultas,
			'jurusan' => $jurusan,
			'dosen' => $dosen,
			'jumlah_mahasiswa_aktif' => $aktif,
			'jumlah_mahasiswa_lulus' => $lulus,
			'jumlah_mahasiswa_cuti' => $cuti,
			'jumlah_mahasiswa_non_aktif' => $non_aktif,
			'jumlah_mahasiswa_keluar' => $keluar,
			'data_grafik_jumlah_mahasiswa' => $data_grafik_jumlah_mahasiswa,
		];

		$this->load->view('component/header',$data);
		$this->load->view('component/sidebar',$data);
		$this->load->view('pages/dashboard',$data);
		$this->load->view('component/footer',$data);	
	}

	public function getDataPerJurusan()
	{
		
		
		echo json_encode($data);
	}

}