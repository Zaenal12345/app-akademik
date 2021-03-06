<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once(APPPATH.'libraries/REST_Controller.php');

class Jurusan extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('wsfeeder');

    }

    // GET
	public function index_get(){

		$data_siswa = array(
			"error_message" => "something wrong"
		);

		$this->response($data_siswa, 500);
	}

    public function index_post()
    {
        $this->db->select('jurusan.*, fakultas.nama_fakultas');
		$this->db->from('jurusan');
		$this->db->join('fakultas','fakultas.id_fakultas = jurusan.fakultas_id');
        $data = $this->db->get()->result(); 

        $result['data'] = $data;
        $result['length'] = count($data);
        $result['message'] = count($data) != 0 ? "Data has been retrieved !" : "Data not found" ;
        
        $this->response($result, 200);
    }


}