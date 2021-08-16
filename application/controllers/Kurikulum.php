<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Kurikulum Controller for management all information about curiculum in unas pasim
 */
class Kurikulum extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->check->user_login();
		$this->load->model('KurikulumModel');
		$this->load->model('AuthModel');
	}

	public function index()
	{
		// get admin data
		$admin_data = $this->AuthModel->getDataByUsername($this->session->userdata('username'));

        $matakuliah = $this->db->order_by('id_matakuliah','desc')->get('matakuliah')->result('array');
        $jurusan = $this->db->order_by('id_jurusan','desc')->get('jurusan')->result('array');
        $tahun_ajar = $this->db->order_by('id_tahun_ajar','desc')->where('status','Aktif')->limit(5)->get('tahun_ajar')->result('array');
        $dosen = $this->db->order_by('id_dosen','desc')->get('dosen')->result('array');

		$data = [
			'data' => $admin_data,
			'title' => 'Master',
			'sub_title' => 'Kurikulum',
            'matakuliah' => $matakuliah, 
            'jurusan' => $jurusan, 
            'tahun_ajar' => $tahun_ajar, 
            'dosen' => $dosen, 
		];
		
		$this->load->view('component/header',$data);
		$this->load->view('component/sidebar',$data);
		$this->load->view('pages/kurikulum/kurikulum',$data);
		$this->load->view('component/footer',$data);
		$this->load->view('pages/kurikulum/kurikulum_script');
	}

	public function show()
	{
		$jurusan_id = $this->input->post('jurusan_id');
		$tahun_ajar_id = $this->input->post('tahun_ajar_id');
		$result = [];

		
		$result_kurikulum = $this->db->select('k.id_kurikulum,m.nama_matakuliah,m.sks,m.kode_matakuliah,t.tahun_ajar,t.id_tahun_ajar,d.nama_dosen')
		->from('kurikulum k')
		->join('dosen d','d.id_dosen = k.dosen_id', 'left')
		->join('matakuliah m', 'm.id_matakuliah = k.matakuliah_id')
		->join('tahun_ajar t', 't.id_tahun_ajar = k.tahun_ajar_id')
		->join('jurusan j', 'j.id_jurusan = k.jurusan_id')
		->where('j.id_jurusan',$jurusan_id)
		->where('k.tahun_ajar_id',$tahun_ajar_id)
		->get()->result();
		
		if(count($result_kurikulum) != 0){

			for ($i=0; $i < count($result_kurikulum) ; $i++) { 
				
				$result[] = [
					'id_kurikulum' => $result_kurikulum[$i]->id_kurikulum,
					'kode_matakuliah' => $result_kurikulum[$i]->kode_matakuliah,
					'nama_matakuliah' => $result_kurikulum[$i]->nama_matakuliah,
					'sks' => $result_kurikulum[$i]->sks,
					'tahun_ajar' => $result_kurikulum[$i]->tahun_ajar,
					'nama_dosen' => $result_kurikulum[$i]->nama_dosen == null ? '<a href="#" data-id="'. $result_kurikulum[$i]->id_kurikulum .'" class="edit-kurikulum btn btn-warning btn-sm"><i class="feather icon-edit"></i></a>' : $result_kurikulum[$i]->nama_dosen,
				];

			}

		}

		echo json_encode($result);
	}

	public function show2()
	{
		$jurusan_id = $this->input->post('jurusan_id');
		$tahun_ajar_id = $this->input->post('tahun_ajar_id');
		$result = [];

		
		$result_kurikulum = $this->db->select('k.id_kurikulum,m.nama_matakuliah,m.id_matakuliah,m.sks,m.kode_matakuliah,t.tahun_ajar,t.id_tahun_ajar,d.nama_dosen')
		->from('kurikulum k')
		->join('dosen d','d.id_dosen = k.dosen_id', 'left')
		->join('matakuliah m', 'm.id_matakuliah = k.matakuliah_id')
		->join('tahun_ajar t', 't.id_tahun_ajar = k.tahun_ajar_id')
		->join('jurusan j', 'j.id_jurusan = k.jurusan_id')
		->where('k.tahun_ajar_id',$tahun_ajar_id)
		->where('j.id_jurusan',$jurusan_id)
		->get()->result();
		
		if(count($result_kurikulum) != 0){

			for ($i=0; $i < count($result_kurikulum) ; $i++) { 
				
				$result[] = [
					'id_matakuliah' => $result_kurikulum[$i]->id_matakuliah,
					'kode_matakuliah' => $result_kurikulum[$i]->kode_matakuliah,
					'nama_matakuliah' => $result_kurikulum[$i]->nama_matakuliah,
					'sks' => $result_kurikulum[$i]->sks,
				];

			}

		}

		echo json_encode($result);
	}

	public function store()
	{
		$jurusan_id = $this->input->post('jurusan_id');
		$tahun_ajar_id = $this->input->post('tahun_ajar_id');
		$kelas_id = $this->input->post('kelas_id');

        $data = [];

        for ($i=0; $i < count($this->input->post('data')) ; $i++) { 
            $data[] = [
                'matakuliah_id' => $this->input->post('data')[$i]['id_matakuliah'],
                'dosen_id' => null,
                'jurusan_id' => $jurusan_id,
                'tahun_ajar_id' => $tahun_ajar_id,
                'kelas_id' => null,
            ];
        }

		$this->KurikulumModel->saveDataMultiple($data);
		
		$message = [
			'message' => 'Data berhasil di simpan'
		];

		echo json_encode($message);
		// echo json_encode($this->input->post('data'));

	}

	public function store2()
	{
		$jurusan_id = $this->input->post('jurusan_id');
		$tahun_ajar_id = $this->input->post('tahun_ajar_id');
		$kelas_id = $this->input->post('kelas_id');

        $data = [];

        for ($i=0; $i < count($this->input->post('data')) ; $i++) { 
            $data[] = [
                'matakuliah_id' => $this->input->post('data')[$i]['id_matakuliah'],
                'dosen_id' => null,
                'jurusan_id' => $jurusan_id,
                'tahun_ajar_id' => $tahun_ajar_id,
                'kelas_id' => null,
            ];
        }

		$this->KurikulumModel->saveDataMultiple($data);
		
		$message = [
			'message' => 'Data berhasil di simpan'
		];

		echo json_encode($message);
		// echo json_encode($this->input->post('data'));

	}

	public function edit()
	{
		
	}

	public function update()
	{
		$dosen_id = $this->input->post('dosen_id');
		$id_kurikulum = $this->input->post('id_kurikulum');

		$this->KurikulumModel->updateData(['dosen_id' => $dosen_id],$id_kurikulum);
		echo json_encode([
			'message' => 'Data berhasil diubah'
		]);
	}


	public function destroy()
	{
		

	}

}