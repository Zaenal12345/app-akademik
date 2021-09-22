<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once(APPPATH.'libraries/REST_Controller.php');

class Mahasiswa extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('wsfeeder');

    }

    public function index_get()
    {
        $this->db->select('mahasiswa.*, jurusan.nama_jurusan, kelas.nama_kelas');
		$this->db->from('mahasiswa');;
		$this->db->join('jurusan','jurusan.id_jurusan = mahasiswa.jurusan_id');
		$this->db->join('kelas','kelas.id_kelas = mahasiswa.kelas_id', 'left');
        $data = $this->db->get()->result(); 

        // if (count($data) != 0) {
        //     for ($i=0; $i < ; $i++) { 
                
        //     }
        // }

        $result['data'] = $data;
        $result['length'] = count($data);
        $result['message'] = count($data) != 0 ? "Data has been retrieved !" : "Data not found" ;
        
        $this->response($result, 200);
    }


    public function getMahasiswaAktif()
    {
        $data = $this->wsfeeder->getMahasiswaAktif();
        echo json_encode($data);
    }

    public function getMahasiswaNonAktif()
    {
        $data = $this->wsfeeder->getMahasiswaNonAktif();
        $this->response($data, 200);
    }

    public function getMahasiswaLulus()
    {
        $data = $this->wsfeeder->getMahasiswaLulus();
        $this->response($data, 200);
    }

    public function getMahasiswaKeluar1()
    {
        $data = $this->wsfeeder->getMahasiswaKeluar1();
        $this->response($data, 200);
    }

    public function getMahasiswaKeluar2()
    {
        $data = $this->wsfeeder->getMahasiswaKeluar2();
        $this->response($data, 200);
    }

    public function getMahasiswaCuti()
    {
        $data = $this->wsfeeder->getMahasiswaCuti();
        $this->response($data, 200);
    }

    public function getAgama()
    {
        $data = $this->wsfeeder->getAgama();
        $this->response($data, 200);
    }





}