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

}