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
		

}