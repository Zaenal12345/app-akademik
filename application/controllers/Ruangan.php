<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Ruangan Controller for management all information about faculty in unas pasim
 */
class Ruangan extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->check->user_login();
		$this->load->model('RuanganModel');
		$this->load->model('AuthModel');
	}

	public function index()
	{
		// get admin data
		$admin_data = $this->AuthModel->getDataByUsername($this->session->userdata('username'));

		$data = [
			'data' => $admin_data,
			'title' => 'Master',
			'sub_title' => 'Ruangan',
		];
		
		$this->load->view('component/header',$data);
		$this->load->view('component/sidebar',$data);
		$this->load->view('pages/ruangan/ruangan',$data);
		$this->load->view('component/footer',$data);
		$this->load->view('pages/ruangan/ruangan_script');
	}

	public function show()
	{
		$this->datatables->select('id_ruangan,nama_ruangan');
		$this->db->order_by('id_ruangan','DESC');
		$this->datatables->from('ruangan');
		$this->datatables->add_column('view','<a href="#" class="edit-ruangan btn btn-warning btn-sm" data-id="$1"><i class="feather icon-edit"></i> Edit</a> <a href="#" class="delete-ruangan btn btn-danger btn-sm" data-id="$1"><i class="feather icon-trash"></i> Hapus</a>','id_ruangan');
		return print_r($this->datatables->generate());
	}

	public function store()
	{
		// set up validation form
		$this->form_validation->set_rules('nama_ruangan','Nama Ruangan','required|max_length[30]',[
			'required' => 'Field nama ruangan harus di isi.',
			'max_length' => 'Nama yang dimasukkan melebihi batas maksimum'
		]);

		// check validation
		if ($this->form_validation->run() == FALSE){
            
            $message = [
            	'error' => true,
            	'nama_ruangan_err' => form_error('nama_ruangan'),
            ];

        }
        else{

        	$data = [
				'nama_ruangan' => $this->input->post('nama_ruangan'),
			];

			$this->RuanganModel->saveData($data);

			$message = [
				'success' => true
			];
        }
		
		
        echo json_encode($message);
	}

	public function edit()
	{
		$id = $this->input->post('id');
		$data = $this->RuanganModel->editData($id);
		echo json_encode($data);
	}

	public function update()
	{
		// set up validation form
		$this->form_validation->set_rules('nama_ruangan_edit','Nama Ruangan','required|max_length[30]',[
			'required' => 'Field nama ruangan harus di isi.',
			'max_length' => 'Nama yang dimasukkan melebihi batas maksimum'
		]);

		// check validation
		if ($this->form_validation->run() == FALSE){
            
            $message = [
            	'error' => true,
            	'nama_ruangan_edit_err' => form_error('nama_ruangan_edit'),
            ];

        }
        else{

        	$id = $this->input->post('id_ruangan_edit');
        	$data = [
				'nama_ruangan' => $this->input->post('nama_ruangan_edit'),
			];

			$this->RuanganModel->updateData($data,$id);

			$message = [
				'success' => true
			];
        }
		
		
        echo json_encode($message);
	}


	public function destroy()
	{
		$id = $this->input->post('id');
		$this->RuanganModel->deleteData($id);
		$message = [
			'success' => true
		];

		echo json_encode($message);

	}

}