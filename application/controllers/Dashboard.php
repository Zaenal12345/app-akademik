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

		$kegiatan = $this->db->limit(7)->get('kegiatan_mahasiswa')->result();

		$data = [
			'data' => $admin_data,
			'title' => 'dashboard',
			'sub_title' => '',
			'mahasiswa' => $mahasiswa,
			'fakultas' => $fakultas,
			'jurusan' => $jurusan,
			'dosen' => $dosen,
			'kegiatan' => $kegiatan
		];

		$this->load->view('component/header',$data);
		$this->load->view('component/sidebar',$data);
		$this->load->view('pages/dashboard',$data);
		$this->load->view('component/footer',$data);	
	}

}