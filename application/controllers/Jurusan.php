<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Jurusan Controller for management all information about major in unas pasim
 */
class Jurusan extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->check->user_login();
		$this->load->model('JurusanModel');
		$this->load->model('AuthModel');
	}

	public function index()
	{
		
		// get admin data
		$admin_data = $this->AuthModel->getDataByUsername($this->session->userdata('username'));

		$data = [
			'fakultas' => $this->db->get('fakultas')->result(),
			'data' => $admin_data,
			'title' => 'Master',
			'sub_title' => 'Jurusan',
		];
		
		$this->load->view('component/header',$data);
		$this->load->view('component/sidebar',$data);
		$this->load->view('pages/jurusan/jurusan',$data);
		$this->load->view('component/footer',$data);
		$this->load->view('pages/jurusan/jurusan_script',$data);

	}

	public function show()
	{
		$this->datatables->select('fakultas.nama_fakultas,jurusan.id_jurusan,jurusan.kode_jurusan,jurusan.nama_jurusan');
		$this->datatables->from('jurusan');
		$this->datatables->join('fakultas','fakultas.id_fakultas = jurusan.fakultas_id');
		$this->datatables->add_column('view','<a href="#" class="edit-jurusan btn btn-warning btn-sm" data-id="$1"><i class="feather icon-edit"></i> Edit</a> <a href="#" class="delete-jurusan btn btn-danger btn-sm" data-id="$1"><i class="feather icon-trash"></i> Hapus</a>','id_jurusan');
		return print_r($this->datatables->generate());
	}

	public function store()
	{
		
		// set up validation
		$this->form_validation->set_rules('nama_fakultas', 'Nama Fakultas', 'required',
		[
			'required' => 'Field nama fakultas harus di isi.'
		]);
		$this->form_validation->set_rules('kode_jurusan', 'Kode Jurusan', 'required|is_unique[jurusan.kode_jurusan]|max_length[100]',
		[
			'required' => 'Field kode fakultas harus di isi.',
			'is_unique' => 'Kode yang dimasukkan sudah ada.',
			'max_length' => 'Kode yang dimasukkan melebihi batas maksimum'
		]);
		$this->form_validation->set_rules('nama_jurusan', 'Nama Jurusan', 'required|max_length[100]', 
		[
			'required' => 'Field nama jurusan harus di isi.',
			'max_length' => 'Nama yang dimasukkan melebihi batas maksimum',
		]);

		// check validation
		if ($this->form_validation->run() == FALSE) {
			
			 $message = [
            	'error' => true,
            	'kode_jurusan_err' => form_error('kode_jurusan'),
            	'nama_jurusan_err' => form_error('nama_jurusan'),
            	'nama_fakultas_err' => form_error('nama_fakultas'),
            ];

		} else {
			
			$data = [
				'kode_jurusan' => $this->input->post('kode_jurusan'),
				'nama_jurusan' => $this->input->post('nama_jurusan'),
				'fakultas_id' => $this->input->post('nama_fakultas'),
			];

			$this->JurusanModel->saveData($data);

			$message = [
				'success' => true
			];			

		}

		echo json_encode($message);

	}

	public function edit()
	{
		$id = $this->input->post('id');
		$data = $this->JurusanModel->editData($id);
		echo json_encode($data);
	}

	public function update()
	{
		
		// set up validation
		$this->form_validation->set_rules('nama_fakultas_edit', 'Nama Fakultas', 'required',
		[
			'required' => 'Field nama fakultas harus di isi.'
		]);
		$this->form_validation->set_rules('kode_jurusan_edit', 'Kode Jurusan', 'required|max_length[100]',
		[
			'required' => 'Field kode fakultas harus di isi.',
			'max_length' => 'Kode yang dimasukkan melebihi batas maksimum'
		]);
		$this->form_validation->set_rules('nama_jurusan_edit', 'Nama Jurusan', 'required|max_length[100]', 
		[
			'required' => 'Field nama jurusan harus di isi.',
			'max_length' => 'Nama yang dimasukkan melebihi batas maksimum'
		]);

		// check validation
		if ($this->form_validation->run() == FALSE) {
			
			 $message = [
            	'error' => true,
            	'kode_jurusan_edit_err' => form_error('kode_jurusan_edit'),
            	'nama_jurusan_edit_err' => form_error('nama_jurusan_edit'),
            	'nama_fakultas_edit_err' => form_error('nama_fakultas_edit'),
            ];

		} else {
			
			$id = $this->input->post('id_jurusan_edit');

			$data = [
				'kode_jurusan' => $this->input->post('kode_jurusan_edit'),
				'nama_jurusan' => $this->input->post('nama_jurusan_edit'),
				'fakultas_id' => $this->input->post('nama_fakultas_edit'),
			];

			$this->JurusanModel->updateData($data,$id);

			$message = [
				'success' => true
			];			

		}

		echo json_encode($message);

	}


	public function destroy()
	{
		$id = $this->input->post('id');
		$this->JurusanModel->deleteData($id);
		$message = [
			'success' => true
		];

		echo json_encode($message);

	}

}