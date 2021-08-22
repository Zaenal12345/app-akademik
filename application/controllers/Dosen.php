<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Dosen Controller for management all information about faculty in unas pasim
 */
class Dosen extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->check->user_login();
		$this->load->model('DosenModel');
		$this->load->model('AuthModel');
	}

	public function index()
	{
		// get admin data
		$admin_data = $this->AuthModel->getDataByUsername($this->session->userdata('username'));

		$data = [
			'data' => $admin_data,
			'title' => 'Master',
			'sub_title' => 'Dosen',
		];

		$this->load->view('component/header',$data);
		$this->load->view('component/sidebar',$data);
		$this->load->view('pages/dosen/dosen',$data);
		$this->load->view('component/footer',$data);
		$this->load->view('pages/dosen/dosen_script');
	}

	public function show()
	{
		$base = base_url();
		$this->datatables->select('id_dosen,nidn,nik,nama_dosen,jenis_kelamin_dosen,gelar,pendidikan,status_dosen,tempat_lahir_dosen,tanggal_lahir_dosen,agama_dosen,alamat_dosen,foto_dosen');
		$this->datatables->add_column('gambar','<img src="'. $base .'assets/picture/dosen/$1" width="90">','foto_dosen');
		$this->datatables->add_column('view','<a href="#" class="edit-dosen btn btn-warning btn-sm" data-id="$1"><i class="feather icon-edit"></i></a> <a href="#" class="delete-dosen btn btn-danger btn-sm" data-id="$1"><i class="feather icon-trash"></i></a>','id_dosen');
		$this->datatables->from('dosen');
		return print_r($this->datatables->generate());
	}

	public function create()
	{
		// get admin data
		$admin_data = $this->AuthModel->getDataByUsername($this->session->userdata('username'));

		$data = [
			'data' => $admin_data,
		];

		$this->load->view('component/header',$data);
		$this->load->view('component/sidebar',$data);
		$this->load->view('pages/dosen/dosen_create',$data);
		$this->load->view('component/footer',$data);
		$this->load->view('pages/dosen/dosen_script');
	}

	public function store()
	{
		// set up validation
		$this->form_validation->set_rules('nik','NIK','required|is_unique[dosen.nik]|max_length[20]|is_natural_no_zero',[
			'is_natural_no_zero' => 'NIK yang dimasukkan harus berupa angka (1,2,3 ..)',
			'max_length' => 'NIK yang dimasukkan melebihi batas maksimum'
		]);
		$this->form_validation->set_rules('nidn','NIDN','is_unique[dosen.nidn]|max_length[20]|is_natural_no_zero',[
			'is_natural_no_zero' => 'NIDN yang dimasukkan harus berupa angka (1,2,3 ..)',
			'max_length' => 'NIDN yang dimasukkan melebihi batas maksimum'
		]);
		$this->form_validation->set_rules('nama_dosen','Nama Dosen','required|max_length[100]',[
			'max_length' => 'Nama Dosen yang dimasukkan melebihi batas maksimum'
		]);
		$this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required');
		$this->form_validation->set_rules('gelar','Gelar','required|max_length[50]',[
			'max_length' => 'Gelar yang dimasukkan melebihi batas maksimum'
		]);
		$this->form_validation->set_rules('pendidikan','Pendidikan Terakhir','required|max_length[100]',[
			'max_length' => 'Pendidikan Terakhir yang dimasukkan melebihi batas maksimum'
		]);
		$this->form_validation->set_rules('status','Status','required');
		$this->form_validation->set_rules('tempat_lahir','Tempat Lahir','required|max_length[100]',[
			'max_length' => 'Tempat Lahir yang dimasukkan melebihi batas maksimum'
		]);
		$this->form_validation->set_rules('tanggal_lahir','Tanggal Lahir','required');
		$this->form_validation->set_rules('agama','Agama','required');
		$this->form_validation->set_rules('alamat','Alamat','required');

		$this->form_validation->set_message('required','Field %s tidak boleh kosong');

		// check validation
		if ($this->form_validation->run()) {
			
			// check if user input picture in form
			if ($_FILES['foto']['name'] != "") {
				$foto = $this->_upload();
			} else {
				$foto = 'default.jpg';
			}

			$data = [
				'nidn' => $this->input->post('nidn'),
				'nik' => $this->input->post('nik'),
				'nama_dosen' => $this->input->post('nama_dosen'),
				'jenis_kelamin_dosen' => $this->input->post('jenis_kelamin'),
				'gelar' => $this->input->post('gelar'),
				'pendidikan' => $this->input->post('pendidikan'),
				'status_dosen' => $this->input->post('status'),
				'tempat_lahir_dosen' => $this->input->post('tempat_lahir'),
				'tanggal_lahir_dosen' => $this->input->post('tanggal_lahir'),
				'agama_dosen' => $this->input->post('agama'),
				'alamat_dosen' => $this->input->post('alamat'),
				'foto_dosen' => $foto,
			];

			$this->DosenModel->saveData($data);
			$message = ['success' => true];

		} else {
			
			$message = [
				'error' => true,
				'nidn_err' =>form_error('nidn'),
				'nik_err' =>form_error('nik'),
				'nama_dosen_err' =>form_error('nama_dosen'),
				'jenis_kelamin_err' =>form_error('jenis_kelamin'),
				'gelar_err' =>form_error('gelar'),
				'pendidikan_err' =>form_error('pendidikan'),
				'status_err' =>form_error('status'),
				'tempat_lahir_err' =>form_error('tempat_lahir'),
				'tanggal_lahir_err' =>form_error('tanggal_lahir'),
				'agama_err' =>form_error('agama'),
				'alamat_err' =>form_error('alamat'),
				'no_telp_err' =>form_error('no_telp'),
			];

		}


		echo json_encode($message);

	}

	public function edit()
	{
		$id =  $this->input->post('id');
		$data = $this->DosenModel->editData($id);
		echo json_encode($data);
	}

	public function update()
	{
		// set up validation
		$this->form_validation->set_rules('nik_edit','NIK','required|max_length[20]');
		$this->form_validation->set_rules('nidn_edit','NIDN','max_length[20]');
		$this->form_validation->set_rules('nama_dosen_edit','Nama Dosen','required|max_length[100]');
		$this->form_validation->set_rules('jenis_kelamin_edit','Jenis Kelamin','required|max_length[10]');
		$this->form_validation->set_rules('gelar_edit','Gelar','required|max_length[50]');
		$this->form_validation->set_rules('pendidikan_edit','Pendidikan','required|max_length[100]');
		$this->form_validation->set_rules('status_edit','Status','required|max_length[20]');
		$this->form_validation->set_rules('tempat_lahir_edit','Tempat Lahir','required|max_length[100]');
		$this->form_validation->set_rules('tanggal_lahir_edit','Tanggal Lahir','required');
		$this->form_validation->set_rules('agama_edit','Agama','required|max_length[20]');
		$this->form_validation->set_rules('alamat_edit','Alamat','required');

		$this->form_validation->set_message('required','Field %s tidak boleh kosong');

		// check validation
		if ($this->form_validation->run()) {

			$data = [
				'nidn' => $this->input->post('nidn_edit'),
				'nik' => $this->input->post('nik_edit'),
				'nama_dosen' => $this->input->post('nama_dosen_edit'),
				'jenis_kelamin_dosen' => $this->input->post('jenis_kelamin_edit'),
				'gelar' => $this->input->post('gelar_edit'),
				'pendidikan' => $this->input->post('pendidikan_edit'),
				'status_dosen' => $this->input->post('status_edit'),
				'tempat_lahir_dosen' => $this->input->post('tempat_lahir_edit'),
				'tanggal_lahir_dosen' => $this->input->post('tanggal_lahir_edit'),
				'agama_dosen' => $this->input->post('agama_edit'),
				'alamat_dosen' => $this->input->post('alamat_edit'),
			];

			// check if user input picture in form
			if ($_FILES['foto']['name'] != "") {
				$foto = $this->_upload();
				$data['foto_dosen'] = $foto;
				if($this->input->post('foto_lama') != 'default.jpg'){
					$this->_hapus_file($this->input->post('foto_lama'));
				}
			}
			

			$id = $this->input->post('id_dosen_edit');
			$this->DosenModel->updateData($data,$id);
			$message = ['success' => true];

		} else {
			
			$message = [
				'error' => true,
				'nidn_edit_err' =>form_error('nidn_edit'),
				'nik_edit_err' =>form_error('nik_edit'),
				'nama_dosen_edit_err' =>form_error('nama_dosen_edit'),
				'jenis_kelamin_edit_err' =>form_error('jenis_kelamin_edit'),
				'gelar_edit_err' =>form_error('gelar_edit'),
				'pendidikan_edit_err' =>form_error('pendidikan_edit'),
				'status_edit_err' =>form_error('status_edit'),
				'tempat_lahir_edit_err' =>form_error('tempat_lahir_edit'),
				'tanggal_lahir_edit_err' =>form_error('tanggal_lahir_edit'),
				'agama_edit_err' =>form_error('agama_edit'),
				'alamat_edit_err' =>form_error('alamat_edit'),
			];

		}


		echo json_encode($message);
	}

	public function destroy()
	{
		$data = $this->DosenModel->editData($this->input->post('id'));

		if ($data->foto != 'default.jpg') {
			$this->_hapus_file($data->foto);
		}
		$this->DosenModel->deleteData($data->id_dosen);

		$message = ['success' => true];
		echo json_encode($message);
	}


	// this method for upload picture file 

	private function _upload(){

        $config['allowed_types']    = 'jpg|jpeg|png';
        $config['max_size']         = 0;
        $config['file_name']        = uniqid();
        $config['upload_path']      = './assets/picture/dosen/';

        $this->load->library('upload',$config);

        if($this->upload->do_upload('foto')){
            return $this->upload->data('file_name');
        }

    }

    // this method for delete picture file 
    private function _hapus_file($file)
    {
        return unlink(FCPATH.'/assets/picture/dosen/'.$file);
    }

}


// update data belum