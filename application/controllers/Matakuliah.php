<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Matakuliah Controller for management all information about faculty in unas pasim
 */
class Matakuliah extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->check->user_login();
		$this->load->model('MatakuliahModel');
		$this->load->model('AuthModel');
		$this->load->library('wsfeeder');
	}

	public function index()
	{
		// get admin data
		$admin_data = $this->AuthModel->getDataByUsername($this->session->userdata('username'));

		$data = [
			'data' => $admin_data,
			'title' => 'Master',
			'sub_title' => 'Matakuliah',	
			'jurusan' => $this->db->get('jurusan')->result(),	
		];

		$this->load->view('component/header',$data);
		$this->load->view('component/sidebar',$data);
		$this->load->view('pages/matakuliah/matakuliah',$data);
		$this->load->view('component/footer',$data);
		$this->load->view('pages/matakuliah/matakuliah_script');
	}

	public function show()
	{
		$this->datatables->select('matakuliah.id_matakuliah,matakuliah.jenis,matakuliah.kode_matakuliah,matakuliah.nama_matakuliah,matakuliah.sks,matakuliah.semester,matakuliah.status_matakuliah,jurusan.nama_jurusan');
		$this->datatables->from('matakuliah');
		$this->datatables->join('jurusan','jurusan.id_jurusan = matakuliah.jurusan_id_matakuliah');
		$this->datatables->add_column('view','<a href="#" class="edit-matakuliah btn btn-warning btn-sm" data-id="$1"><i class="feather icon-edit"></i> Edit</a> <a href="#" class="delete-matakuliah btn btn-danger btn-sm" data-id="$1"><i class="feather icon-trash"></i> Hapus</a>','id_matakuliah');
		return print_r($this->datatables->generate());	
	}

	public function store()
	{
		// set up validation
		$this->form_validation->set_rules('sks', 'SKS', 'required|is_natural_no_zero',
		[
			'required' => 'Field SKS harus di isi.',
			'is_natural_no_zero' => 'SKS yang dimasukkan harus berupa angka (1,2,3 ..)'

		]);
		$this->form_validation->set_rules('semester', 'Semester', 'required|is_natural_no_zero',
		[
			'required' => 'Field Semester harus di isi.',
			'is_natural_no_zero' => 'Semester yang dimasukkan harus berupa angka (1,2,3 ..)'

		]);
		$this->form_validation->set_rules('kode_matakuliah', 'Kode Matakuliah', 'required|is_unique[matakuliah.kode_matakuliah]|max_length[100]',
		[
			'required' => 'Field kode matakuliah harus di isi.',
			'is_unique' => 'Kode yang dimasukkan sudah ada.',
			'max_length' => 'Kode yang dimasukkan melebihi batas maksimum'
		]);
		$this->form_validation->set_rules('nama_matakuliah', 'Nama Matakuliah', 'required|max_length[100]', 
		[
			'required' => 'Field nama matakuliah harus di isi.',
			'max_length' => 'Nama yang dimasukkan melebihi batas maksimum',
		]);

		// check validation
		if ($this->form_validation->run() == FALSE) {
			
			 $message = [
            	'error' => true,
            	'kode_matakuliah_err' => form_error('kode_matakuliah'),
            	'nama_matakuliah_err' => form_error('nama_matakuliah'),
            	'sks_err' => form_error('sks'),
            	'semester_err' => form_error('semester'),
            ];

		} else {
			
			$data = [
				'kode_matakuliah' => $this->input->post('kode_matakuliah'),
				'nama_matakuliah' => $this->input->post('nama_matakuliah'),
				'sks' => $this->input->post('sks'),
				'semester' => $this->input->post('semester'),
			];

			$this->MatakuliahModel->saveData($data);

			$message = [
				'success' => true
			];			

		}

		echo json_encode($message);
	}

	public function edit()
	{
		$id = $this->input->post('id');
		$data = $this->MatakuliahModel->editData($id);
		echo json_encode($data);
	}

	public function update()
	{
		
		// set up validation
		$this->form_validation->set_rules('sks_edit', 'SKS', 'required|is_natural_no_zero',
		[
			'required' => 'Field SKS harus di isi.',
			'is_natural_no_zero' => 'SKS yang dimasukkan harus berupa angka (1,2,3 ..)'

		]);
		$this->form_validation->set_rules('semester_edit', 'Semester', 'required|is_natural_no_zero',
		[
			'required' => 'Field Semester harus di isi.',
			'is_natural_no_zero' => 'Semester yang dimasukkan harus berupa angka (1,2,3 ..)'

		]);
		$this->form_validation->set_rules('kode_matakuliah_edit', 'Kode Matakuliah', 'required|max_length[100]',
		[
			'required' => 'Field kode matakuliah harus di isi.',
			'is_unique' => 'Kode yang dimasukkan sudah ada.',
		]);
		$this->form_validation->set_rules('nama_matakuliah_edit', 'Nama Matakuliah', 'required|max_length[100]', 
		[
			'required' => 'Field nama matakuliah harus di isi.',
			'max_length' => 'Nama yang dimasukkan melebihi batas maksimum',
		]);

		// check validation
		if ($this->form_validation->run() == FALSE) {
			
			 $message = [
            	'error' => true,
            	'kode_matakuliah_edit_err' => form_error('kode_matakuliah_edit'),
            	'nama_matakuliah_edit_err' => form_error('nama_matakuliah_edit'),
            	'sks_edit_err' => form_error('sks_edit'),
            	'semester_edit_err' => form_error('semester_edit'),
            ];

		} else {
			
			$id = $this->input->post('id_matakuliah_edit');

			$data = [
				'kode_matakuliah' => $this->input->post('kode_matakuliah_edit'),
				'nama_matakuliah' => $this->input->post('nama_matakuliah_edit'),
				'sks' => $this->input->post('sks_edit'),
				'semester' => $this->input->post('semester_edit'),
			];

			$this->MatakuliahModel->updateData($data,$id);

			$message = [
				'success' => true
			];			

		}

		echo json_encode($message);

	}

	public function destroy()
	{
		$id = $this->input->post('id');
		$this->MatakuliahModel->deleteData($id);
		$message = [
			'success' => true
		];

		echo json_encode($message);

	}
	
	public function insertMatakuliah()
	{
		$data = json_decode(json_encode($this->wsfeeder->getListMataKuliah()),true);
		echo json_encode($data);die();

		// for ($i=0; $i < count($data['data']) ; $i++) { 

		// 	$jurusan = $this->db->where('nama_jurusan',$data['data'][$i]['nama_program_studi'])->get('jurusan')->result();

		// 	$this->db->insert('matakuliah',[
		// 		'kode_matakuliah' => $data['data'][$i]['kode_mata_kuliah'],
		// 		'nama_matakuliah' => $data['data'][$i]['nama_mata_kuliah'],
		// 		'sks' => $data['data'][$i]['sks_mata_kuliah'],
		// 		'semester' => 0,
		// 		'jurusan_id' => $jurusan[0]->id_jurusan,
		// 	]);
		// }
	}

}