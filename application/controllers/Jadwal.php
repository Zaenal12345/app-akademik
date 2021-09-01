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
		$this->load->model('JadwalModel');
		
	}

	public function index()
	{
		$this->check->user_login();
		
		// get admin data
		$admin_data = $this->AuthModel->getDataByUsername($this->session->userdata('username'));
		$data = [
			'fakultas' => $this->db->get('fakultas')->result(),
			'data' => $admin_data,
			'title' => 'Jadwal',
			'sub_title' => '',
		];
		
		$this->load->view('component/header',$data);
		$this->load->view('component/sidebar',$data);
		$this->load->view('pages/jadwal/jadwal',$data);
		$this->load->view('component/footer',$data);
		$this->load->view('pages/jadwal/jadwal_script',$data);

		
	}

	public function show(){

		$this->datatables->select('jadwal.hari,jadwal.ruangan,jadwal.jam_masuk,jadwal.jam_selesai,tahun_ajar.tahun_ajar,matakuliah.nama_matakuliah,dosen.nama_dosen,kelas.nama_kelas,jurusan.nama_jurusan,matakuliah.semester,jadwal.id_jadwal');
		$this->datatables->from('jadwal');
		$this->datatables->join('tahun_ajar','tahun_ajar.id_tahun_ajar = jadwal.tahun_ajar_id');
		$this->datatables->join('matakuliah','matakuliah.id_matakuliah = jadwal.matakuliah_id');
		$this->datatables->join('dosen','dosen.id_dosen = jadwal.dosen_id');
		$this->datatables->join('jurusan','jurusan.id_jurusan = jadwal.jurusan_id');
		$this->datatables->join('kelas','kelas.id_kelas = jadwal.kelas_id');
		$this->datatables->add_column('view','<a href="#" class="delete-jurusan btn btn-danger btn-sm" data-id="$1">Hapus</a>','id_jadwal');
		return print_r($this->datatables->generate());

	}

	public function create()
	{
		$this->check->user_login();
		
		// get admin data
		$admin_data = $this->AuthModel->getDataByUsername($this->session->userdata('username'));
		$data = [
			'data' => $admin_data,
			'kelas' => $this->db->get('kelas')->result(),
			'jurusan' => $this->db->get('jurusan')->result(),
			'ruangan' => $this->db->get('ruangan')->result(),
			'tahun_ajar' => $this->db->order_by('id_tahun_ajar','desc')->get('tahun_ajar')->result(),
			'title' => 'Jadwal',
			'sub_title' => '',
		];
		
		$this->load->view('component/header',$data);
		$this->load->view('component/sidebar',$data);
		$this->load->view('pages/jadwal/jadwal_create',$data);
		$this->load->view('component/footer',$data);
		$this->load->view('pages/jadwal/jadwal_script',$data);
		
	}

	public function store(){

		$tahun_ajar_id= $this->input->post('tahun_ajar_id'); 
		$kelas_id= $this->input->post('kelas_id'); 
		$jurusan_id= $this->input->post('jurusan_id'); 

		$data = [];
		for ($i=0; $i < count($this->input->post('data')) ; $i++) { 
			
			$data[] = [
				'hari' =>$this->input->post('data')[$i]['hari'], 
				'matakuliah_id' =>$this->input->post('data')[$i]['matakuliah_id'],
				'dosen_id' =>$this->input->post('data')[$i]['dosen_id'], 
				'kelas_id' =>$kelas_id,
				'jurusan_id' =>$jurusan_id,
				'jam_masuk' =>$this->input->post('data')[$i]['jam_masuk'],
				'jam_selesai' =>$this->input->post('data')[$i]['jam_selesai'],
				'ruangan' =>$this->input->post('data')[$i]['ruangan_id'],
				'tahun_ajar_id' =>$tahun_ajar_id,
			];

		}
		 
		$this->JadwalModel->saveMultipleData($data);

		$message = [
			'success' =>true,
			'message' => 'Data berhasil disimpan'
		];
		echo json_encode($message);

	}

	public function destroy(){

	}

	// ===============================================================

	public function getMatakuliah(){

		$tahun_ajar_id = $this->input->post('tahun_ajar_id');
		$kelas_id = $this->input->post('kelas_id');
		$jurusan_id = $this->input->post('jurusan_id');

		$matakuliah = $this->db->select('DISTINCT(m.id_matakuliah),m.nama_matakuliah,m.semester,m.kode_matakuliah')
		->from('kurikulum kl')
		->join('matakuliah m','m.id_matakuliah = kl.matakuliah_id')
		->join('tahun_ajar t','t.id_tahun_ajar = kl.tahun_ajar_id')
		->join('kelas k','k.id_kelas = kl.kelas_id')
		->join('jurusan j','j.id_jurusan = kl.jurusan_id')
		->where('t.id_tahun_ajar',$tahun_ajar_id)
		->where('k.id_kelas',$kelas_id)
		->where('j.id_jurusan',$jurusan_id)
		->get()->result();

		echo json_encode($matakuliah);

	}
	
	public function getDosen(){

		$tahun_ajar_id = $this->input->post('tahun_ajar_id');
		$kelas_id = $this->input->post('kelas_id');
		$jurusan_id = $this->input->post('jurusan_id');
		$matakuliah_id = $this->input->post('matakuliah_id');

		$dosen = $this->db->select('DISTINCT(d.id_dosen),d.nama_dosen')
		->from('kurikulum kl')
		->join('dosen d','d.id_dosen = kl.dosen_id')
		->join('matakuliah m','m.id_matakuliah = kl.matakuliah_id')
		->join('tahun_ajar t','t.id_tahun_ajar = kl.tahun_ajar_id')
		->join('kelas k','k.id_kelas = kl.kelas_id')
		->join('jurusan j','j.id_jurusan = kl.jurusan_id')
		->where('t.id_tahun_ajar',$tahun_ajar_id)
		->where('k.id_kelas',$kelas_id)
		->where('j.id_jurusan',$jurusan_id)
		->where('m.id_matakuliah',$matakuliah_id)
		->get()->result();

		echo json_encode($dosen);

	}

	public function getSemester(){

		$matakuliah_id = $this->input->post('matakuliah_id');
		$matakuliah = $this->db->get_where('matakuliah',['id_matakuliah' => $matakuliah_id])->row();
		echo json_encode($matakuliah);

	}
}