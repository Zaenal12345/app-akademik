<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Fakultas Controller for management all information about faculty in unas pasim
 */
class Fakultas extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->check->user_login();
		$this->load->model('FakultasModel');
		$this->load->model('AuthModel');
	}

	public function index()
	{
		// get admin data
		$admin_data = $this->AuthModel->getDataByUsername($this->session->userdata('username'));

		$data = [
			'data' => $admin_data,
			'title' => 'Master',
			'sub_title' => 'Fakultas',
		];

		$this->load->view('component/header',$data);
		$this->load->view('component/sidebar',$data);
		$this->load->view('pages/fakultas/fakultas',$data);
		$this->load->view('component/footer',$data);
		$this->load->view('pages/fakultas/fakultas_script');

	}

	public function show()
	{
		$this->datatables->select('id_fakultas,kode_fakultas,nama_fakultas');
		$this->datatables->from('fakultas');
		$this->datatables->add_column('view','<a href="#" class="edit-fakultas btn btn-warning btn-sm" data-id="$1"><i class="feather icon-edit"></i> Edit</a> <a href="#" class="delete-fakultas btn btn-danger btn-sm" data-id="$1"><i class="feather icon-trash"></i> Hapus</a>','id_fakultas');
		return print_r($this->datatables->generate());
	}

	public function store()
	{
		// set up validation form
		$this->form_validation->set_rules('kode_fakultas','Kode Fakultas','required|is_unique[fakultas.kode_fakultas]|max_length[50]',[
			'required' => 'Field kode fakultas harus di isi.',
			'is_unique' => 'Kode yang dimasukkan sudah ada.',
			'max_length' => 'Kode yang dimasukkan melebihi batas maksimum'
		]);
		$this->form_validation->set_rules('nama_fakultas','Nama Fakultas','required|max_length[50]|is_unique[fakultas.nama_fakultas]',[
			'required' => 'Field nama fakultas harus di isi.',
			'is_unique' => 'Nama yang dimasukkan sudah ada.',
			'max_length' => 'Nama yang dimasukkan melebihi batas maksimum'
		]);

		// check validation
		if ($this->form_validation->run() == FALSE){
            
            $message = [
            	'error' => true,
            	'kode_fakultas_err' => form_error('kode_fakultas'),
            	'nama_fakultas_err' => form_error('nama_fakultas'),
            ];

        }else{

        	$data = [
				'kode_fakultas' => $this->input->post('kode_fakultas'),
				'nama_fakultas' => $this->input->post('nama_fakultas'),
			];

			$this->FakultasModel->saveData($data);
			$message = [
				'success' => true
			];
        }
		
        echo json_encode($message);
	}

	public function edit()
	{
		$id = $this->input->post('id');
		$data = $this->FakultasModel->editData($id);
		echo json_encode($data);
	}

	public function update()
	{
		// set up validation form
		$this->form_validation->set_rules('kode_fakultas_edit','Kode Fakultas','required|max_length[50]',[
			'required' => 'Field kode fakultas harus di isi.',
			'max_length' => 'Kode yang dimasukkan melebihi batas maksimum',
		]);
		$this->form_validation->set_rules('nama_fakultas_edit','Nama Fakultas','required|max_length[50]',[
			'required' => 'Field nama fakultas harus di isi.',
			'max_length' => 'Nama yang dimasukkan melebihi batas maksimum',
		]);

		// check validation
		if ($this->form_validation->run() == FALSE){
            
            $message = [
            	'error' => true,
            	'kode_fakultas_edit_err' => form_error('kode_fakultas_edit'),
            	'nama_fakultas_edit_err' => form_error('nama_fakultas_edit'),
            ];

        }else{

        	$id = $this->input->post('id_fakultas_edit');
        	$data = [
				'kode_fakultas' => $this->input->post('kode_fakultas_edit'),
				'nama_fakultas' => $this->input->post('nama_fakultas_edit'),
			];

			$this->FakultasModel->updateData($data,$id);
			$message = [
				'success' => true
			];

        }
		
		echo json_encode($message);
	}

	public function destroy()
	{
		$id = $this->input->post('id');
		$this->FakultasModel->deleteData($id);
		$message = [
			'success' => true
		];

		echo json_encode($message);
	}

}