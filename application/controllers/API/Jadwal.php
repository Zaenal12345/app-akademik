<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once(APPPATH.'libraries/REST_Controller.php');

class Jadwal extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('wsfeeder');
    }

    public function index_get()
    {
        $this->db->select('jadwal.hari,jadwal.ruangan,jadwal.jam_masuk,jadwal.jam_selesai,tahun_ajar.tahun_ajar,matakuliah.nama_matakuliah,matakuliah.kode_matakuliah,matakuliah.sks,dosen.nama_dosen,dosen.nidn,kelas.nama_kelas,jurusan.nama_jurusan,matakuliah.semester,jadwal.id_jadwal');
		$this->db->from('jadwal');
		$this->db->join('tahun_ajar','tahun_ajar.id_tahun_ajar = jadwal.tahun_ajar_id');
		$this->db->join('matakuliah','matakuliah.id_matakuliah = jadwal.matakuliah_id');
		$this->db->join('dosen','dosen.id_dosen = jadwal.dosen_id');
		$this->db->join('jurusan','jurusan.id_jurusan = jadwal.jurusan_id');
		$this->db->join('kelas','kelas.id_kelas = jadwal.kelas_id');
        $data = $this->db->get()->result(); 

        $result['data'] = $data;
        $result['length'] = count($data);
        $result['message'] = count($data) != 0 ? "Data has been retrieved !" : "Data not found" ;
        
        $this->response($result, 200);
    }


}