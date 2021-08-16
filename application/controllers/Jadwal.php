<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Jadwal Controller for show all information about academic in unas pasim
 */
class Jadwal extends CI_Controller
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
		$data = [
			'fakultas' => $this->db->get('fakultas')->result(),
			'data' => $admin_data,
			'title' => 'Master',
			'sub_title' => 'Jurusan',
		];
		
		$this->load->view('component/header',$data);
		$this->load->view('component/sidebar',$data);
		$this->load->view('pages/jadwal/jadwal',$data);
		$this->load->view('component/footer',$data);
		$this->load->view('pages/jadwal/jadwal_script',$data);

		

}