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
	}

	public function index()
	{
		// get admin data
		$admin_data = $this->AuthModel->getDataByUsername($this->session->userdata('username'));

		$data = [
			'data' => $admin_data,
			'title' => 'Master',
			'sub_title' => 'Matakuliah',	
		];

		$this->load->view('component/header',$data);
		$this->load->view('component/sidebar',$data);
		$this->load->view('pages/matakuliah/matakuliah',$data);
		$this->load->view('component/footer',$data);
		$this->load->view('pages/matakuliah/matakuliah_script');
	}

	public function show()
	{
		$this->datatables->select('id_matakuliah,kode_matakuliah,nama_matakuliah,sks');
		$this->datatables->from('matakuliah');
		$this->datatables->add_column('view','<a href="#" class="edit-matakuliah btn btn-warning btn-sm" data-id="$1"><i class="feather icon-edit"></i></a> <a href="#" class="delete-matakuliah btn btn-danger btn-sm" data-id="$1"><i class="feather icon-trash"></i></a>','id_matakuliah');
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
            ];

		} else {
			
			$data = [
				'kode_matakuliah' => $this->input->post('kode_matakuliah'),
				'nama_matakuliah' => $this->input->post('nama_matakuliah'),
				'sks' => $this->input->post('sks'),
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
            	'sks_err' => form_error('sks'),
            ];

		} else {
			
			$id = $this->input->post('id_matakuliah_edit');

			$data = [
				'kode_matakuliah' => $this->input->post('kode_matakuliah_edit'),
				'nama_matakuliah' => $this->input->post('nama_matakuliah_edit'),
				'sks' => $this->input->post('sks_edit'),
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

}