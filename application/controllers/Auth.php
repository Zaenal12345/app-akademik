<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Auth Controller for authentication user.
 */
class Auth extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('AuthModel');
	}

	public function index()
	{
		// $this->check->user_logout();
		$this->load->view('pages/login_page');
	}

	// public function test()
	// {
	// 	$this->check->user_logout();
	// 	$this->load->view('pages/sign-in');
	// }

	public function login(){

		$this->form_validation->set_rules('username','Username','required',[
			'required' => 'Field username harus di isi.',
		]);
		$this->form_validation->set_rules('password','Password','required',[
			'required' => 'Field password harus di isi.',
		]);

		if ($this->form_validation->run() == false) {
			
			$message = [
				'error' => true,
				'username_error' => form_error('username'),
				'password_error' => form_error('password'),
			];

		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$data = $this->AuthModel->getDataByUsername($username);

			if($data){

				if(password_verify($password,$data->password)){

					$message = [
						'success' => true
					];

					$data = [
						'username' => $data->username,
					];

					$this->session->set_userdata($data);

				}else{
					
					$message = [
						'error_login' => true,
						'message' => 'Username atau password salah'
					];
				}

			}else{
				
				$message = [
					'error_login' => true,
					'message' => 'Username atau password salah'
				];

			}			

		}
		
		echo json_encode($message);
	}

	public function logout(){
		$this->session->sess_destroy();
		return redirect('auth');
	}

	// test function for insert admin data 
	public function createUser(){
		$this->AuthModel->saveData([
			'username' => 'admin',
			'password' => password_hash('123456789',PASSWORD_BCRYPT)
		]);
	}



}