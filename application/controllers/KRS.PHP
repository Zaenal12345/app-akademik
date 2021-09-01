<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * KRS Controller for management all information about faculty in unas pasim
 */
class KRS extends CI_Controller
{
    function __construct()
	{
		parent::__construct();
		$this->load->model('KRSModel');
		$this->load->model('AuthModel');
		
	}
    
    public function index()
    {
        $this->check->user_login();
		// get admin data
		$admin_data = $this->AuthModel->getDataByUsername($this->session->userdata('username'));
		
		$data = [
			'data' => $admin_data,
			'title' => 'KRS',
			'sub_title' => '',
            'mahasiswa' => $this->db->get('mahasiswa')->result(),
            'tahun_ajar' => $this->db->get('tahun_ajar')->result(),
		];

		$this->load->view('component/header',$data);
		$this->load->view('component/sidebar',$data);
		$this->load->view('pages/krs/krs',$data);
		$this->load->view('component/footer',$data);
		$this->load->view('pages/krs/krs_script',$data);
    }

    public function show()
    {
        $this->datatables->select('mahasiswa.nim,mahasiswa.nama_mahasiswa,dosen.nama_dosen,tahun_ajar.tahun_ajar, matakuliah.kode_matakuliah, matakuliah.nama_matakuliah,krs.nama_kelas,krs.nama_jurusan,matakuliah.semester, matakuliah.sks');
		$this->datatables->from('krs');
		$this->datatables->join('mahasiswa','mahasiswa.id_mahasiswa = krs.mahasiswa_id');
		$this->datatables->join('matakuliah','matakuliah.id_matakuliah = krs.matakuliah_id');
		$this->datatables->join('dosen','dosen.id_dosen = krs.dosen_id');
		$this->datatables->join('tahun_ajar','tahun_ajar.id_tahun_ajar = krs.tahun_ajar_id');
		$this->datatables->add_column('view','<a href="#" class="delete-jurusan btn btn-danger btn-sm" data-id="$1">Hapus</a>','id_jurusan');
		return print_r($this->datatables->generate());
    }

    public function create()
    {
        $this->check->user_login();
		// get admin data
		$admin_data = $this->AuthModel->getDataByUsername($this->session->userdata('username'));
		
		$data = [
			'data' => $admin_data,
			'title' => 'KRS',
			'sub_title' => '',
            'mahasiswa' => $this->db->get('mahasiswa')->result(),
            'tahun_ajar' => $this->db->where('status','Aktif')->get('tahun_ajar')->result(),
		];

		$this->load->view('component/header',$data);
		$this->load->view('component/sidebar',$data);
		$this->load->view('pages/krs/krs_create',$data);
		$this->load->view('component/footer',$data);
		$this->load->view('pages/krs/krs_script',$data);
    }
    
    public function create2()
    {
        $this->check->user_login();
		// get admin data
		$admin_data = $this->AuthModel->getDataByUsername($this->session->userdata('username'));
		
		$data = [
			'data' => $admin_data,
			'title' => 'KRS',
			'sub_title' => '',
            'jurusan' => $this->db->get('jurusan')->result(),
            'kelas' => $this->db->get('kelas')->result(),
            'mahasiswa' => $this->db->get('mahasiswa')->result(),
            'tahun_ajar' => $this->db->where('status','Aktif')->get('tahun_ajar')->result(),
		];

		$this->load->view('component/header',$data);
		$this->load->view('component/sidebar',$data);
		$this->load->view('pages/krs/krs_create2',$data);
		$this->load->view('component/footer',$data);
		$this->load->view('pages/krs/krs_script',$data);
    }

    public function store(){

        $id_mahasiswa   = $this->input->post('id_mahasiswa');
        $nama_jurusan   = $this->input->post('nama_jurusan');
        $jurusan_id     = $this->input->post('jurusan_id');
        $nama_kelas     = $this->input->post('nama_kelas');
        $kelas_id       = $this->input->post('kelas_id');
        $tahun_ajar_id  = $this->input->post('tahun_ajar_id');
        $semester       = $this->input->post('semester');

        $data = [];

        for ($i=0; $i < count($this->input->post('data')) ; $i++) { 
            
            $data[] = [
                'mahasiswa_id' => $id_mahasiswa,
                'nama_kelas' => $nama_kelas,
                'nama_jurusan' => $nama_jurusan,
                'matakuliah_id' => $this->input->post('data')[$i]['id_matakuliah'],
                // 'sks_matakuliah' => $this->input->post('data')[$i]['sks'],
                // 'semester' => $semester,
                'tahun_ajar_id' => $tahun_ajar_id,
                'dosen_id' => $this->input->post('data')[$i]['id_dosen'],
            ];

        }   

        $this->KRSModel->saveDataMultiple($data);
        echo json_encode($data);

    }

    public function store2(){

        $matakuliah_id   = $this->input->post('matakuliah_id');
        $nama_jurusan   = $this->input->post('nama_jurusan');
        $jurusan_id     = $this->input->post('jurusan_id');
        $nama_kelas     = $this->input->post('nama_kelas');
        $kelas_id       = $this->input->post('kelas_id');
        $tahun_ajar_id  = $this->input->post('tahun_ajar_id');
        $semester       = $this->input->post('semester');
        $dosen_id       = $this->input->post('dosen_id');

        $data = [];

        for ($i=0; $i < count($this->input->post('data')) ; $i++) { 
            
            $data[] = [
                'mahasiswa_id' => $this->input->post('data')[$i]['id_mahasiswa'],
                'nama_kelas' => $nama_kelas,
                'nama_jurusan' => $nama_jurusan,
                'matakuliah_id' => $matakuliah_id,
                'tahun_ajar_id' => $tahun_ajar_id,
                'dosen_id' => $dosen_id,
            ];

        }   

        $this->KRSModel->saveDataMultiple($data);
        echo json_encode($data);

    }

    public function edit()
    {
        $nim = $this->input->post('nim');
		$tahun_ajar_id = $this->input->post('tahun_ajar_id');
		$result = [];

		
		$this->db->select('k.id_krs,m.semester,m.nama_matakuliah,m.sks,m.kode_matakuliah,t.tahun_ajar,t.id_tahun_ajar,d.nama_dosen,ks.nama_kelas,m.id_matakuliah,d.id_dosen,mhs.id_mahasiswa,mhs.nim,mhs.nama_mahasiswa');
		$this->db->from('krs k');
		$this->db->join('dosen d','d.id_dosen = k.dosen_id', 'left');
		$this->db->join('matakuliah m', 'm.id_matakuliah = k.matakuliah_id');
		$this->db->join('tahun_ajar t', 't.id_tahun_ajar = k.tahun_ajar_id');
		$this->db->join('mahasiswa mhs', 'mhs.id_mahasiswa = k.mahasiswa_id');
		$this->db->join('jurusan j', 'j.id_jurusan = mhs.jurusan_id');
		$this->db->join('kelas ks', 'ks.id_kelas = mhs.kelas_id');
		$this->db->where('t.id_tahun_ajar',$tahun_ajar_id);
		$this->db->where('mhs.id_mahasiswa',$nim);
        
		$result_krs = $this->db->get()->result();
		
		if(count($result_krs) != 0){

			for ($i=0; $i < count($result_krs) ; $i++) { 
				
				$result[] = [
					'id_krs' => $result_krs[$i]->id_krs,
					'kode_matakuliah' => $result_krs[$i]->kode_matakuliah,
					'nama_matakuliah' => $result_krs[$i]->nama_matakuliah,
					'sks' => $result_krs[$i]->sks,
					'id_matakuliah' => $result_krs[$i]->id_matakuliah,
					'id_dosen' => $result_krs[$i]->id_dosen,
					'tahun_ajar' => $result_krs[$i]->tahun_ajar,
					'nama_kelas' => $result_krs[$i]->nama_kelas,
					'semester' => $result_krs[$i]->semester,
					'nama_dosen' => $result_krs[$i]->nama_dosen == null ? '-' : $result_krs[$i]->nama_dosen,
				];

			}

		}

        // var_dump($result_krs);
		// echo json_encode($result);

        $data = [
			'data' => $admin_data,
			'title' => 'KRS',
			'sub_title' => '',
            'krs' => $this->db->get('jurusan')->result(),
		];
        
        $this->load->view('component/header',$data);
		$this->load->view('component/sidebar',$data);
		$this->load->view('pages/krs/p_krs',$data);
		$this->load->view('component/footer',$data);
		$this->load->view('pages/krs/krs_script',$data);

    }

    // =======================================================
    public function getMahasiswa(){

        // get id mahasiswa
        $id_mahasiswa = $this->input->post('id');

        // get nama kelas dan nama jurusan by id mahasiswa
        $data = $this->db->select('kelas.nama_kelas,jurusan.nama_jurusan,jurusan.id_jurusan,kelas.id_kelas')
        ->from('mahasiswa')
        ->join('kelas','mahasiswa.kelas_id = kelas.id_kelas')
        ->join('jurusan','mahasiswa.jurusan_id = jurusan.id_jurusan')
        ->where('mahasiswa.id_mahasiswa',$id_mahasiswa)
        ->get()->result();

        echo json_encode($data);
    }

    public function getMatakuliah()
    {
        $jurusan_id = $this->input->post('jurusan_id');
		$tahun_ajar_id = $this->input->post('tahun_ajar_id');
		$kelas_id = $this->input->post('kelas_id');
		$semester = $this->input->post('semester');
		$result = [];

		
		$this->db->select('k.id_kurikulum,m.semester,m.nama_matakuliah,m.sks,m.kode_matakuliah,t.tahun_ajar,t.id_tahun_ajar,d.nama_dosen,ks.nama_kelas,m.id_matakuliah,d.id_dosen');
		$this->db->from('kurikulum k');
		$this->db->join('dosen d','d.id_dosen = k.dosen_id', 'left');
		$this->db->join('matakuliah m', 'm.id_matakuliah = k.matakuliah_id');
		$this->db->join('tahun_ajar t', 't.id_tahun_ajar = k.tahun_ajar_id');
		$this->db->join('jurusan j', 'j.id_jurusan = k.jurusan_id');
		$this->db->join('kelas ks', 'ks.id_kelas = k.kelas_id');
		$this->db->where('j.id_jurusan',$jurusan_id);
		$this->db->where('ks.id_kelas',$kelas_id);
        if($tahun_ajar_id != null){
            $this->db->where('k.tahun_ajar_id',$tahun_ajar_id);
        }
        if($semester != null){
            $this->db->where('m.semester',$semester);
        }
        
		$result_kurikulum = $this->db->get()->result();
		
		if(count($result_kurikulum) != 0){

			for ($i=0; $i < count($result_kurikulum) ; $i++) { 
				
				$result[] = [
					'id_kurikulum' => $result_kurikulum[$i]->id_kurikulum,
					'kode_matakuliah' => $result_kurikulum[$i]->kode_matakuliah,
					'nama_matakuliah' => $result_kurikulum[$i]->nama_matakuliah,
					'sks' => $result_kurikulum[$i]->sks,
					'id_matakuliah' => $result_kurikulum[$i]->id_matakuliah,
					'id_dosen' => $result_kurikulum[$i]->id_dosen,
					'tahun_ajar' => $result_kurikulum[$i]->tahun_ajar,
					'nama_kelas' => $result_kurikulum[$i]->nama_kelas,
					'semester' => $result_kurikulum[$i]->semester,
					'nama_dosen' => $result_kurikulum[$i]->nama_dosen == null ? '-' : $result_kurikulum[$i]->nama_dosen,
				];

			}

		}

		echo json_encode($result);
    }

    public function getDetailMatakuliah()
    {
        $matakuliah_id = $this->input->post('matakuliah_id');
		$result = [];

		
		$this->db->select('k.id_kurikulum,m.semester,m.nama_matakuliah,m.sks,m.kode_matakuliah,t.tahun_ajar,t.id_tahun_ajar,d.nama_dosen,ks.nama_kelas,m.id_matakuliah,d.id_dosen');
		$this->db->from('kurikulum k');
		$this->db->join('dosen d','d.id_dosen = k.dosen_id', 'left');
		$this->db->join('matakuliah m', 'm.id_matakuliah = k.matakuliah_id');
		$this->db->join('tahun_ajar t', 't.id_tahun_ajar = k.tahun_ajar_id');
		$this->db->join('jurusan j', 'j.id_jurusan = k.jurusan_id');
		$this->db->join('kelas ks', 'ks.id_kelas = k.kelas_id');
		$this->db->where('m.id_matakuliah',$matakuliah_id);
		$result_kurikulum = $this->db->get()->result();
		
		if(count($result_kurikulum) != 0){

			for ($i=0; $i < count($result_kurikulum) ; $i++) { 
				
				$result[] = [
					'kode_matakuliah' => $result_kurikulum[$i]->kode_matakuliah,
					'nama_matakuliah' => $result_kurikulum[$i]->nama_matakuliah,
					'sks' => $result_kurikulum[$i]->sks,
					'id_matakuliah' => $result_kurikulum[$i]->id_matakuliah,
					'id_dosen' => $result_kurikulum[$i]->id_dosen,
					'tahun_ajar' => $result_kurikulum[$i]->tahun_ajar,
					'nama_kelas' => $result_kurikulum[$i]->nama_kelas,
					'semester' => $result_kurikulum[$i]->semester,
					'nama_dosen' => $result_kurikulum[$i]->nama_dosen == null ? '-' : $result_kurikulum[$i]->nama_dosen,
				];

			}

		}

		echo json_encode($result);
    }



}