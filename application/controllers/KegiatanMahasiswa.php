<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Kegiatan Mahasiswa Controller for management all information about activity in unas pasim
 */
class KegiatanMahasiswa extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->check->user_login();
		$this->load->model('KegiatanMahasiswaModel');
		$this->load->model('AuthModel');
	}

	public function index()
	{
		// get admin data
		$admin_data = $this->AuthModel->getDataByUsername($this->session->userdata('username'));

		$data = [
			'data' => $admin_data,
			'title' => 'Kegiatan',
			'sub_title' => '',
		];

		$this->load->view('component/header',$data);
		$this->load->view('component/sidebar',$data);
		$this->load->view('pages/kegiatan_mahasiswa/kegiatan_mahasiswa',$data);
		$this->load->view('component/footer',$data);
		$this->load->view('pages/kegiatan_mahasiswa/kegiatan_mahasiswa_script');
	}

	public function show()
	{
		$base = base_url();
		$this->datatables->select('id,nama_kegiatan,tanggal_awal,tanggal_akhir,deskripsi,gambar_utama');
		$this->datatables->add_column('gambar','<img src="'. $base .'assets/picture/activity/$1" width="90">','gambar_utama');
		$this->datatables->add_column('view','<a href="#" class="edit-kegiatan_mahasiswa btn btn-warning btn-sm" data-id="$1"><i class="feather icon-edit"></i></a> <a href="#" class="delete-kegiatan_mahasiswa btn btn-danger btn-sm" data-id="$1"><i class="feather icon-trash"></i></a>','id');
		$this->datatables->from('kegiatan_mahasiswa');
		return print_r($this->datatables->generate());
	}

	// public function create()
	// {
	
	// }

	public function store()
	{
		// set up validation
		$this->form_validation->set_rules('nama_kegiatan','Nama Kegiatan','required|max_length[150]');
		$this->form_validation->set_rules('tanggal_awal','Tanggal Awal','required');
		$this->form_validation->set_rules('tanggal_akhir','Tanggal Akhir','required');
		$this->form_validation->set_rules('deskripsi','Deskripsi','required');

		$this->form_validation->set_message('required','Field %s tidak boleh kosong');

		// check validation
		if ($this->form_validation->run()) {

            $foto = $this->_upload();

			$data = [
				'nama_kegiatan' => $this->input->post('nama_kegiatan'),
				'tanggal_awal' => $this->input->post('tanggal_awal'),
				'tanggal_akhir' => $this->input->post('tanggal_akhir'),
				'deskripsi' => $this->input->post('deskripsi'),
				'gambar_utama' => $foto,
			];

			$this->KegiatanMahasiswaModel->saveData($data);
			$message = ['success' => true];

		} else {
			
			$message = [
				'error' => true,
				'nama_kegiatan_err' =>form_error('nama_kegiatan'),
				'tanggal_awal_err' =>form_error('tanggal_awal'),
				'tanggal_akhir_err' =>form_error('tanggal_akhir'),
				'deskripsi_err' =>form_error('deskripsi'),
			];

		}

		echo json_encode($message);

	}

	public function edit()
	{
		$id =  $this->input->post('id');
		$data = $this->KegiatanMahasiswaModel->editData($id);
		echo json_encode($data);
	}

	public function update()
	{
		// set up validation
		$this->form_validation->set_rules('nama_kegiatan_edit','Nama Kegiatan','required|max_length[150]');
		$this->form_validation->set_rules('tanggal_awal_edit','Tanggal Awal','required');
		$this->form_validation->set_rules('tanggal_akhir_edit','Tanggal Akhir','required');
		$this->form_validation->set_rules('deskripsi_edit','Deskripsi','required');

		$this->form_validation->set_message('required','Field %s tidak boleh kosong');

		// check validation
		if ($this->form_validation->run()) {

			$data = [
				'nama_kegiatan' => $this->input->post('nama_kegiatan_edit'),
				'tanggal_awal' => $this->input->post('tanggal_awal_edit'),
				'tanggal_akhir' => $this->input->post('tanggal_akhir_edit'),
				'deskripsi' => $this->input->post('deskripsi_edit'),
			];

			// check if user input picture in form
			if ($_FILES['gambar']['name'] != "") {
				
                $gambar = $this->_upload();
				$data['gambar_utama'] = $gambar;
                $this->_hapus_file($this->input->post('gambar_lama'));

			}

			$id = $this->input->post('id_kegiatan_edit');
			$this->KegiatanMahasiswaModel->updateData($data,$id);
			$message = ['success' => true];

		} else {
			
			$message = [
				'error' => true,
				'nama_kegiatan_edit_err' =>form_error('nama_kegiatan_edit'),
				'tanggal_awal_edit_err' =>form_error('tanggal_awal_edit'),
				'tanggal_akhir_edit_err' =>form_error('tanggal_akhir_edit'),
				'deskripsi_edit_err' =>form_error('deskripsi_edit'),
			];

		}

		echo json_encode($message);
	}

	public function destroy()
	{
		$data = $this->KegiatanMahasiswaModel->editData($this->input->post('id'));

        if(file_exists(FCPATH.'/assets/picture/activity/'.$data->gambar_utama)){
            $this->_hapus_file($data->gambar_utama);
        }
		$this->KegiatanMahasiswaModel->deleteData($data->id);

		$message = ['success' => true];
		echo json_encode($message);
	}


	// this method for upload picture file 

	private function _upload(){

        $config['allowed_types']    = 'jpg|jpeg|png';
        $config['max_size']         = 0;
        $config['file_name']        = uniqid();
        $config['upload_path']      = './assets/picture/activity/';

        $this->load->library('upload',$config);

        if($this->upload->do_upload('gambar')){
            return $this->upload->data('file_name');
        }

    }

    // this method for delete picture file 
    private function _hapus_file($file)
    {
        return unlink(FCPATH.'/assets/picture/activity/'.$file);
    }

}


// update data belum