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
		];

		$this->load->view('component/header',$data);
		$this->load->view('component/sidebar',$data);
		$this->load->view('pages/krs/krs',$data);
		$this->load->view('component/footer',$data);
		$this->load->view('pages/krs/krs_script',$data);
    }

    public function show()
    {
        $this->datatables->select('krs.semester,krs.sks_matakuliah,mahasiswa.nim,mahasiswa.nama_mahasiswa,dosen.nama_dosen,tahun_ajar.tahun_ajar, matakuliah.kode_matakuliah, matakuliah.nama_matakuliah,krs.nama_kelas,krs.nama_jurusan');
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
			'title' => 'dashboard',
		];

		$this->load->view('component/header',$data);
		$this->load->view('component/sidebar',$data);
		$this->load->view('pages/krs/krs_create',$data);
		$this->load->view('component/footer',$data);
		$this->load->view('pages/krs/krs_script',$data);
    }

    public function store(){

        $id_mahasiswa = $this->input->post('id_mahasiswa');
        $nama_mahasiswa = $this->input->post('nama_mahasiswa');
        $semester = $this->input->post('semester');
        $nama_kelas = $this->input->post('nama_kelas');
        $nama_jurusan = $this->input->post('nama_jurusan');
        $tahun_ajar = $this->input->post('tahun_ajar');
        $id_tahun_ajar = $this->input->post('id_tahun_ajar');
        $total_sks = $this->input->post('total_sks');

        $data = [];

        for ($i=0; $i < count($this->input->post('data')) ; $i++) { 
            
            $data[] = [
                'mahasiswa_id' => $id_mahasiswa,
                'nama_kelas' => $nama_kelas,
                'nama_jurusan' => $nama_jurusan,
                'matakuliah_id' => $this->input->post('data')[$i]['id_matakuliah'],
                'sks_matakuliah' => $this->input->post('data')[$i]['sks'],
                'semester' => $semester,
                'tahun_ajar_id' => $id_tahun_ajar,
                'dosen_id' => $this->input->post('data')[$i]['id_dosen'],
            ];

        }   

        $this->KRSModel->saveDataMultiple($data);
        echo json_encode($data);

    }

    // =======================================================
    public function getMahasiswa(){

        // $data = $this->db->select('mahasiswa.nim,mahasiswa.nama_mahasiswa,mahasiswa.id_mahasiswa,kelas.nama_kelas,jurusan.nama_jurusan')
        // ->from('mahasiswa')
        // ->join('kelas','mahasiswa.kelas_id = kelas.id_kelas')
        // ->join('jurusan','mahasiswa.jurusan_id = jurusan.id_jurusan')
        // ->get()->result();

        // for ($i=0; $i < count($data); $i++) { 
        //     $result[$i] = [
        //         'label' => $data[$i]->nim,
        //         'value' => $data[$i]->nim,
        //         'result' => $data[$i]->nama_mahasiswa,
        //         'result2' => $data[$i]->id_mahasiswa,
        //         'result3' => $data[$i]->nama_kelas,
        //         'result4' => $data[$i]->nama_jurusan,
        //     ];
        // }
        // echo json_encode($result);

        if (isset($_GET['term'])) {
            
            $data = $this->db->select('mahasiswa.nim as label,mahasiswa.nim as value,mahasiswa.nama_mahasiswa as result ,mahasiswa.id_mahasiswa as result2 ,kelas.nama_kelas as result3 ,jurusan.nama_jurusan as result4')
            ->from('mahasiswa')
            ->join('kelas','mahasiswa.kelas_id = kelas.id_kelas')
            ->join('jurusan','mahasiswa.jurusan_id = jurusan.id_jurusan')
            ->like('mahasiswa.nim', $_GET['term'] , 'both')
            ->order_by('mahasiswa.id_mahasiswa', 'ASC')
            ->limit(5)
            ->get()->result();

            echo json_encode($data);
        }
    }

    public function getTahunAjar(){

        if (isset($_GET['term'])) {
            
            $data = $this->db->select('tahun_ajar.id_tahun_ajar as result, tahun_ajar.tahun_ajar as label, tahun_ajar.tahun_ajar as value ')
            ->like('tahun_ajar', $_GET['term'] , 'both')
            ->order_by('id_tahun_ajar', 'ASC')
            ->limit(5)
            ->where('status','Aktif')
            ->get('tahun_ajar')->result();

            echo json_encode($data);
        }

    }

    public function getMatakuliah(){

        if (isset($_GET['term'])) {
            $data = $this->db->like('kode_matakuliah', $_GET['term'] , 'both')->order_by('id_matakuliah', 'ASC')->limit(5)->get('matakuliah')->result();
            if (count($data) > 0) {
            foreach ($data as $row)
                $arr_result[] = [
                    'label' => $row->kode_matakuliah,
                    'value' => $row->kode_matakuliah,
                    'result' => $row->id_matakuliah,
                    'result2' => $row->nama_matakuliah,
                    'result3' => $row->sks,
                ];
                echo json_encode($arr_result);
            }

        }

    }

    public function getDosen(){

        if (isset($_GET['term'])) {

            $data = $this->db->select('dosen.nama_dosen as label, dosen.nama_dosen as value, dosen.id_dosen as result')
            ->like('nama_dosen', $_GET['term'] , 'both')
            ->order_by('id_dosen', 'ASC')
            ->limit(5)->get('dosen')->result();

            echo json_encode($data);

        }

    }



}