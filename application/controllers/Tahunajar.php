<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Tahunajar Controller for management all information about faculty in unas pasim
 */
class Tahunajar extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->check->user_login();
		$this->load->model('TahunajarModel');
		$this->load->model('AuthModel');
	}

	public function index()
	{
		// get admin data
		$admin_data = $this->AuthModel->getDataByUsername($this->session->userdata('username'));

		$data = [
			'data' => $admin_data,
			'title' => 'Master',
			'sub_title' => 'Tahun Ajar',	
		];
		
		$this->load->view('component/header',$data);
		$this->load->view('component/sidebar',$data);
		$this->load->view('pages/tahun_ajar/tahun_ajar',$data);
		$this->load->view('component/footer',$data);
		$this->load->view('pages/tahun_ajar/tahun_ajar_script');
	}

	public function show()
	{
		$this->datatables->select('id_tahun_ajar,tahun_ajar,status');
		$this->db->order_by("status", "asc");
		$this->datatables->from('tahun_ajar');
		$this->datatables->add_column('view','<a href="#" class="edit-tahun_ajar btn btn-warning btn-sm" data-id="$1"><i class="feather icon-edit"></i></a> <a href="#" class="delete-tahun_ajar btn btn-danger btn-sm" data-id="$1"><i class="feather icon-trash"></i></a>','id_tahun_ajar');
		return print_r($this->datatables->generate());
	}

	public function store()
	{
		// set up validation form
		$this->form_validation->set_rules('tahun_ajar','Tahun Ajar','required|is_unique[tahun_ajar.tahun_ajar]|max_length[30]',[
			'required' => 'Field tahun ajar harus di isi.',
			'is_unique' => 'Tahun ajar yang dimasukkan sudah ada.',
			'max_length' => 'Karaktek yang dimasukkan melebihi batas maksimum'
		]);
		$this->form_validation->set_rules('status','Status','required',[
			'required' => 'Field tahun ajar harus di isi.',
		]);

		// check validation
		if ($this->form_validation->run() == FALSE){
            
            $message = [
            	'error' => true,
            	'tahun_ajar_err' => form_error('tahun_ajar'),
            	'status_err' => form_error('status'),
            ];

        }
        else{

        	$data = [
				'tahun_ajar' => $this->input->post('tahun_ajar'),
				'status' => $this->input->post('status'),
			];

			$this->TahunajarModel->saveData($data);

			$message = [
				'success' => true
			];
        }
		
		
        echo json_encode($message);
	}

	public function edit()
	{
		$id = $this->input->post('id');
		$data = $this->TahunajarModel->editData($id);
		echo json_encode($data);
	}

	public function update()
	{
		// set up validation form
		$this->form_validation->set_rules('tahun_ajar_edit','Tahun Ajar','required|max_length[30]',[
			'required' => 'Field tahun ajar harus di isi.',
			'max_length' => 'Karaktek yang dimasukkan melebihi batas maksimum'
		]);
		$this->form_validation->set_rules('status_edit','Status','required',[
			'required' => 'Field tahun ajar harus di isi.',
		]);


		// check validation
		if ($this->form_validation->run() == FALSE){
            
            $message = [
            	'error' => true,
            	'tahun_ajar_edit_err' => form_error('tahun_ajar_edit'),
            	'status_edit_err' => form_error('status_edit'),
            ];

        }
        else{

        	$id = $this->input->post('id_tahun_ajar_edit');
        	$data = [
				'tahun_ajar' => $this->input->post('tahun_ajar_edit'),
				'status' => $this->input->post('status_edit'),
			];

			$this->TahunajarModel->updateData($data,$id);

			$message = [
				'success' => true
			];
        }
		
		
        echo json_encode($message);
	}


	public function destroy()
	{
		$id = $this->input->post('id');
		$this->TahunajarModel->deleteData($id);
		$message = [
			'success' => true
		];

		echo json_encode($message);

	}

}