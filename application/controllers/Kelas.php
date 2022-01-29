<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Kelas Controller for management all information about faculty in unas pasim
 */
class Kelas extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->check->user_login();
		$this->load->model('KelasModel');
		$this->load->model('AuthModel');
	}

	public function index()
	{
		// get admin data
		$admin_data = $this->AuthModel->getDataByUsername($this->session->userdata('username'));

		$data = [
			'data' => $admin_data,
			'title' => 'Master',
			'sub_title' => 'Kelas',
		];
		
		$this->load->view('component/header',$data);
		$this->load->view('component/sidebar',$data);
		$this->load->view('pages/kelas/kelas',$data);
		$this->load->view('component/footer',$data);
		$this->load->view('pages/kelas/kelas_script');
	}

	public function show()
	{
		$this->datatables->select('id_kelas,kode_kelas,nama_kelas,status_kelas');
		$this->db->order_by('id_kelas','DESC');
		$this->datatables->from('kelas');
		$this->datatables->add_column('view','<a href="#" class="edit-kelas btn btn-warning btn-sm" data-id="$1"><i class="feather icon-edit"></i> Edit</a> <a href="#" class="delete-kelas btn btn-danger btn-sm" data-id="$1"><i class="feather icon-trash"></i> Hapus</a>','id_kelas');
		return print_r($this->datatables->generate());
	}

	public function store()
	{
		// set up validation form
		$this->form_validation->set_rules('kode_kelas','Kode Kelas','required|is_unique[kelas.kode_kelas]|max_length[100]',[
			'required' => 'Field kode kelas harus di isi.',
			'is_unique' => 'Kode yang dimasukkan sudah ada.',
			'max_length' => 'Kode yang dimasukkan melebihi batas maksimum'
		]);
		$this->form_validation->set_rules('nama_kelas','Nama Kelas','required|max_length[100]',[
			'required' => 'Field nama kelas harus di isi.',
			'max_length' => 'Nama yang dimasukkan melebihi batas maksimum'
		]);

		// check validation
		if ($this->form_validation->run() == FALSE){
            
            $message = [
            	'error' => true,
            	'kode_kelas_err' => form_error('kode_kelas'),
            	'nama_kelas_err' => form_error('nama_kelas'),
            ];

        }
        else{

        	$data = [
				'kode_kelas' => $this->input->post('kode_kelas'),
				'nama_kelas' => $this->input->post('nama_kelas'),
				'status_kelas' => $this->input->post('status'),
			];

			$this->KelasModel->saveData($data);

			$message = [
				'success' => true
			];
        }
		
		
        echo json_encode($message);
	}

	public function edit()
	{
		$id = $this->input->post('id');
		$data = $this->KelasModel->editData($id);
		echo json_encode($data);
	}

	public function update()
	{
		// set up validation form
		$this->form_validation->set_rules('kode_kelas_edit','Kode Kelas','required|max_length[100]',[
			'required' => 'Field kode kelas harus di isi.',
			'max_length' => 'Kode yang dimasukkan melebihi batas maksimum'
		]);
		$this->form_validation->set_rules('nama_kelas_edit','Nama Kelas','required|max_length[100]',[
			'required' => 'Field nama kelas harus di isi.',
			'max_length' => 'Nama yang dimasukkan melebihi batas maksimum'
		]);

		// check validation
		if ($this->form_validation->run() == FALSE){
            
            $message = [
            	'error' => true,
            	'kode_kelas_edit_err' => form_error('kode_kelas_edit'),
            	'nama_kelas_edit_err' => form_error('nama_kelas_edit'),
            ];

        }
        else{

        	$id = $this->input->post('id_kelas_edit');
        	$data = [
				'kode_kelas' => $this->input->post('kode_kelas_edit'),
				'nama_kelas' => $this->input->post('nama_kelas_edit'),
				'status_kelas' => $this->input->post('status_edit'),
			];

			$this->KelasModel->updateData($data,$id);

			$message = [
				'success' => true
			];
        }
		
		
        echo json_encode($message);
	}


	public function destroy()
	{
		$id = $this->input->post('id');
		$this->KelasModel->deleteData($id);
		$message = [
			'success' => true
		];

		echo json_encode($message);

	}

}