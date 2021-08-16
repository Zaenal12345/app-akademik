<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Check {
    protected $ci;

    public function __construct(){
        $this->ci = &get_instance();
    }

	public function user_login() {
		if($this->ci->session->userdata('username') == false){
			redirect('auth','refresh');
		}
	}

	public function user_logout() {
		if($this->ci->session->userdata('username') == true){
			redirect('dashboard','refresh');
		}
	}

}
