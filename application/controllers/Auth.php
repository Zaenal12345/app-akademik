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
		// $this->AuthModel->saveData([
		// 	'username' => 'admin',
		// 	'password' => password_hash('123456789',PASSWORD_BCRYPT)
		// ]);
	}

	public function generateAdmin()
    {
        $last_user = $this->db->select('*')->order_by('id','DESC')->limit(1)->get('users')->result();
        if (count($last_user) != 0) {
            $last_user = $last_user[0]->username;
        
            if(strlen($last_user) == 10){
                $count = (int)(substr($last_user,8))+1;
                $username = 'admin'.$this->getRandomString(4).$count;
            }else{
                $username = 'admin'.$this->getRandomString(4).'1';
            }
        }else{
            $username = 'admin'.$this->getRandomString(4).'1';
        }

        $data = [
            'username' => $username,
            'password' => password_hash('admin123', PASSWORD_BCRYPT),
            'role_id' => '1',
        ];
        $this->db->insert('users',$data);
    }

    private function getRandomString($n) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
      
        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
      
        return $randomString;
    }

}