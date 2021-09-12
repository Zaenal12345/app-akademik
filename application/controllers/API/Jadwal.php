<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('wsfeeder');
    }

    public function index()
    {
        $this->db->select('jadwal.hari,jadwal.ruangan,jadwal.jam_masuk,jadwal.jam_selesai,tahun_ajar.tahun_ajar,matakuliah.nama_matakuliah,dosen.nama_dosen,kelas.nama_kelas,jurusan.nama_jurusan,matakuliah.semester,jadwal.id_jadwal');
		$this->db->from('jadwal');
		$this->db->join('tahun_ajar','tahun_ajar.id_tahun_ajar = jadwal.tahun_ajar_id');
		$this->db->join('matakuliah','matakuliah.id_matakuliah = jadwal.matakuliah_id');
		$this->db->join('dosen','dosen.id_dosen = jadwal.dosen_id');
		$this->db->join('jurusan','jurusan.id_jurusan = jadwal.jurusan_id');
		$this->db->join('kelas','kelas.id_kelas = jadwal.kelas_id');
        $data = $this->db->get()->result();
        
        echo json_encode($data);
    }


}