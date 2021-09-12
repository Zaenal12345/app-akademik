<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Mahasiswa Controller for management all information about faculty in unas pasim
 */
class Mahasiswa extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->check->user_login();
		$this->load->model('MahasiswaModel');
		$this->load->model('AuthModel');
		$this->load->model('JurusanModel');
		$this->load->model('KelasModel');
		$this->load->library('wsfeeder');
	}

	public function index()
	{
		// get admin data
		$admin_data = $this->AuthModel->getDataByUsername($this->session->userdata('username'));

		$data = [
			'data' => $admin_data,
			'jurusan' => $this->JurusanModel->showData(),
			'kelas' => $this->KelasModel->showData(),
			'title' => 'Master',
			'sub_title' => 'Mahasiswa',			
		];

		$this->load->view('component/header',$data);
		$this->load->view('component/sidebar',$data);
		$this->load->view('pages/mahasiswa/mahasiswa',$data);
		$this->load->view('component/footer',$data);
		$this->load->view('pages/mahasiswa/mahasiswa_script');
	}
	
	public function show()
	{
		$base = base_url();
		$this->datatables->select('mahasiswa.id_mahasiswa,jurusan.nama_jurusan,kelas.nama_kelas,mahasiswa.foto,mahasiswa.nim,mahasiswa.nama_mahasiswa,mahasiswa.jenis_kelamin,mahasiswa.status_mahasiswa,mahasiswa.tempat_lahir,mahasiswa.tanggal_lahir,mahasiswa.agama,mahasiswa.alamat,mahasiswa.foto,mahasiswa.tahun_angkatan');
		$this->datatables->join('jurusan','jurusan.id_jurusan = mahasiswa.jurusan_id', 'left');
		$this->datatables->join('kelas','kelas.id_kelas = mahasiswa.kelas_id', 'left');
		$this->datatables->add_column('gambar','<img src="'. $base .'assets/picture/mahasiswa/$1" width="60" height="60">','foto');
		$this->datatables->add_column('view','<a href="#" class="edit-mahasiswa btn btn-warning btn-sm" data-id="$1"><i class="feather icon-edit"></i></a> <a href="#" class="delete-mahasiswa btn btn-danger btn-sm" data-id="$1"><i class="feather icon-trash"></i></a>','id_mahasiswa');
		$this->datatables->from('mahasiswa');
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
		$this->form_validation->set_rules('nim','NIK','required|is_unique[mahasiswa.nim]|max_length[20]');
		$this->form_validation->set_rules('nama_mahasiswa','Nama Mahasiswa','required|max_length[100]');
		$this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required|max_length[10]');
		$this->form_validation->set_rules('status_mahasiswa','Status','required|max_length[20]');
		$this->form_validation->set_rules('tempat_lahir','Tempat Lahir','required|max_length[100]');
		$this->form_validation->set_rules('tanggal_lahir','Tanggal Lahir','required');
		$this->form_validation->set_rules('agama','Agama','required|max_length[20]');
		$this->form_validation->set_rules('alamat','Alamat','required');
		$this->form_validation->set_rules('jurusan_id','Prodi','required');
		$this->form_validation->set_rules('kelas_id','Kelas','required');
		$this->form_validation->set_rules('tahun_angkatan','Tahun Angkatan','required');

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
				'nim' => $this->input->post('nim'),
				'nama_mahasiswa' => $this->input->post('nama_mahasiswa'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'jurusan_id' => $this->input->post('jurusan_id'),
				'kelas_id' => $this->input->post('kelas_id'),
				'status_mahasiswa' => $this->input->post('status_mahasiswa'),
				'tempat_lahir' => $this->input->post('tempat_lahir'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				'agama' => $this->input->post('agama'),
				'alamat' => $this->input->post('alamat'),
				'tahun_angkatan' => $this->input->post('tahun_angkatan'),
				'foto' => $foto,
			];

			$this->MahasiswaModel->saveData($data);
			$message = ['success' => true];

		} else {
			
			$message = [
				'error' => true,
				'nim_err' =>form_error('nim'),
				'nama_mahasiswa_err' =>form_error('nama_mahasiswa'),
				'jenis_kelamin_err' =>form_error('jenis_kelamin'),
				'jurusan_id_err' =>form_error('jurusan_id'),
				'kelas_id_err' =>form_error('kelas_id'),
				'status_mahasiswa_err' =>form_error('status_mahasiswa'),
				'tempat_lahir_err' =>form_error('tempat_lahir'),
				'tanggal_lahir_err' =>form_error('tanggal_lahir'),
				'agama_err' =>form_error('agama'),
				'alamat_err' =>form_error('alamat'),
				'tahun_angkatan_err' =>form_error('tahun_angkatan'),
			];

		}


		echo json_encode($message);

	}

	public function edit()
	{
		$id =  $this->input->post('id');
		$data = $this->MahasiswaModel->editData($id);
		echo json_encode($data);
	}

	public function update()
	{
		// set up validation
		$this->form_validation->set_rules('nim_edit','NIK','required|max_length[20]');
		$this->form_validation->set_rules('nama_mahasiswa_edit','Nama Mahasiswa','required|max_length[100]');
		$this->form_validation->set_rules('jenis_kelamin_edit','Jenis Kelamin','required|max_length[10]');
		$this->form_validation->set_rules('status_mahasiswa_edit','Status','required|max_length[20]');
		$this->form_validation->set_rules('tempat_lahir_edit','Tempat Lahir','required|max_length[100]');
		$this->form_validation->set_rules('tanggal_lahir_edit','Tanggal Lahir','required');
		$this->form_validation->set_rules('agama_edit','Agama','required|max_length[20]');
		$this->form_validation->set_rules('alamat_edit','Alamat','required');
		$this->form_validation->set_rules('jurusan_id_edit','Prodi','required');
		$this->form_validation->set_rules('kelas_id_edit','Kelas','required');
		$this->form_validation->set_rules('tahun_angkatan_edit','Tahun Angkatan','required');

		$this->form_validation->set_message('required','Field %s tidak boleh kosong');

		// check validation
		if ($this->form_validation->run()) {

			$data = [
				'nim' => $this->input->post('nim_edit'),
				'nama_mahasiswa' => $this->input->post('nama_mahasiswa_edit'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin_edit'),
				'jurusan_id' => $this->input->post('jurusan_id_edit'),
				'kelas_id' => $this->input->post('kelas_id_edit'),
				'status_mahasiswa' => $this->input->post('status_mahasiswa_edit'),
				'tempat_lahir' => $this->input->post('tempat_lahir_edit'),
				'tanggal_lahir' => $this->input->post('tanggal_lahir_edit'),
				'agama' => $this->input->post('agama_edit'),
				'alamat' => $this->input->post('alamat_edit'),
				'tahun_angkatan' => $this->input->post('tahun_angkatan_edit'),
			];

			// check if user input picture in form
			if ($_FILES['foto']['name'] != "") {
				$foto = $this->_upload();
				$data['foto'] = $foto;
				if($this->input->post('foto_lama') != 'default.jpg'){
					$this->_hapus_file($this->input->post('foto_lama'));
				}
			}
			

			$id = $this->input->post('id_mahasiswa_edit');
			$this->MahasiswaModel->updateData($data,$id);
			$message = ['success' => true];

		} else {
			
			$message = [
				'error' => true,
				'nim_edit_err' =>form_error('nim_edit'),
				'nama_mahasiswa_edit_err' =>form_error('nama_mahasiswa_edit'),
				'jenis_kelamin_edit_err' =>form_error('jenis_kelamin_edit'),
				'jurusan_id_edit_err' =>form_error('jurusan_id_edit'),
				'kelas_id_edit_err' =>form_error('kelas_id_edit'),
				'status_mahasiswa_edit_err' =>form_error('status_mahasiswa_edit'),
				'tempat_lahir_edit_err' =>form_error('tempat_lahir_edit'),
				'tanggal_lahir_edit_err' =>form_error('tanggal_lahir_edit'),
				'agama_edit_err' =>form_error('agama_edit'),
				'alamat_edit_err' =>form_error('alamat_edit'),
				'tahun_angkatan_edit_err' =>form_error('tahun_angkatan_edit'),
			];

		}


		echo json_encode($message);
	}

	public function destroy()
	{
		$data = $this->MahasiswaModel->editData($this->input->post('id'));

		if ($data->foto != 'default.jpg') {
			$this->_hapus_file($data->foto);
		}
		$this->MahasiswaModel->deleteData($data->id_mahasiswa);

		$message = ['success' => true];
		echo json_encode($message);
	}


	// this method for upload picture file 

	private function _upload(){

        $config['allowed_types']    = 'jpg|jpeg|png';
        $config['max_size']         = 0;
        $config['file_name']        = uniqid();
        $config['upload_path']      = './assets/picture/mahasiswa/';

        $this->load->library('upload',$config);

        if($this->upload->do_upload('foto')){
            return $this->upload->data('file_name');
        }

    }

    // this method for delete picture file 
    private function _hapus_file($file)
    {
        return unlink(FCPATH.'/assets/picture/mahasiswa/'.$file);
    }

	public function singkronisasi()
    {
        $data = $this->wsfeeder->getAllMahasiswa();
        $data_mahasiswa = $this->db->get('mahasiswa')->result();

		if(count($data_mahasiswa) != 0){

            // masukkan record terbaru
			$newrecorord = 0;
            for ($i=0; $i < count($data->data); $i++) { 
                
				$temp = $this->db->where('nim',$data->data[$i]->nim)->get('mahasiswa')->result();
				if (count($temp) == 0) {
					$newrecorord++;
					$this->db->insert('mahasiswa',[
						'nim' => $data->data[$i]->nim,
						'nama_mahasiswa' => $data->data[$i]->nama_mahasiswa,
						'jenis_kelamin' => $data->data[$i]->jenis_kelamin,
						'tanggal_lahir' => $data->data[$i]->tanggal_lahir,
						'tempat_lahir' => "",
						'jurusan_id' => "2",
						'kelas_id' => "1",
						'agama' => $data->data[$i]->nama_agama,
						'status_mahasiswa' => $data->data[$i]->nama_status_mahasiswa,
						'alamat' => "",
						'foto' => "default.jpg",
						'tahun_angkatan' => $data->data[$i]->nama_periode_masuk,
					]);

				}

            }

			if ($newrecorord != 0) {
				
				$message = [
					'message' => 'Singkronisasi berhasil!',
					'success' => true,
				];

			}else{

				$message = [
					'message' => 'Data telah uptodate!',
					'success' => true,
				];

			}

        }else{

            // insert semua data yang ada
            $index=1;
			$jurusan = $this->db->get('jurusan')->result();
			$temp_jurusan = null;

			// insert seluruh data dari server 
            for ($i=0; $i < count($data->data); $i++) { 
                
                if($data->data[$i]->id_periode != 19971 && $data->data[$i]->id_periode != 19972 && $data->data[$i]->id_periode != 19981 && $data->data[$i]->id_periode != 19982 && $data->data[$i]->id_periode != 19991 && $data->data[$i]->id_periode != 19992 && $data->data[$i]->id_periode != 20001 && $data->data[$i]->id_periode != 20002 && $data->data[$i]->id_periode != 20011 && $data->data[$i]->id_periode != 20012 && $data->data[$i]->id_periode != 20021 && $data->data[$i]->id_periode != 20022 && $data->data[$i]->id_periode != 20031 && $data->data[$i]->id_periode != 20032 && $data->data[$i]->id_periode != 20041 && $data->data[$i]->id_periode != 20042 && $data->data[$i]->id_periode != 20051 && $data->data[$i]->id_periode != 20052 && $data->data[$i]->id_periode != 20061 && $data->data[$i]->id_periode != 20062){

					if(count($data->data) != 0){

						for ($j=0; $j < count($jurusan) ; $j++) { 
							
							if($data->data[$i]->nama_program_studi == $jurusan[$j]->nama_jurusan){
									$temp_jurusan = $jurusan[$j]->id_jurusan;
							}
	
						}
		
					}

					$this->db->insert('mahasiswa',[
						'id_mahasiswa' => $index,
						'nim' => $data->data[$i]->nim,
						'nama_mahasiswa' => $data->data[$i]->nama_mahasiswa,
						'jenis_kelamin' => $data->data[$i]->jenis_kelamin,
						'tanggal_lahir' => $data->data[$i]->tanggal_lahir,
						'tempat_lahir' => "",
						'jurusan_id' => $temp_jurusan,
						'kelas_id' => null,
						'agama' => $data->data[$i]->nama_agama,
						'status_mahasiswa' => $data->data[$i]->nama_status_mahasiswa,
						'alamat' => "",
						'foto' => "default.jpg",
						'tahun_angkatan' => $data->data[$i]->nama_periode_masuk,
					]);
	
					$index++;

				}


			}
			
			$message = [
				'message' => 'Singkronisasi berhasil!',
				'success' => true,
			];
			
        }
        
        echo json_encode($message);
    }
	

}