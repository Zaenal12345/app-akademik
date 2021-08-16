<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Nilai Controller for management all information about faculty in unas pasim
 */
class Nilai extends CI_Controller
{
    function __construct()
	{
		parent::__construct();
		$this->load->model('NilaiModel');
		$this->load->model('AuthModel');
		
	}
    
    public function index()
    {
        $this->check->user_login();
		// get admin data
		$admin_data = $this->AuthModel->getDataByUsername($this->session->userdata('username'));
		
		$data = [
			'data' => $admin_data,
			'title' => 'Nilai',
			'sub_title' => '',
		];

		$this->load->view('component/header',$data);
		$this->load->view('component/sidebar',$data);
		$this->load->view('pages/nilai/nilai',$data);
		$this->load->view('component/footer',$data);
		$this->load->view('pages/nilai/nilai_script',$data);
    }

    public function show()
    {
        $this->datatables->select('nilai.id_nilai,nilai.nilai,nilai.standard_nilai,nilai.grade,nilai.keterangan,mahasiswa.nim,mahasiswa.nama_mahasiswa,matakuliah.kode_matakuliah,matakuliah.nama_matakuliah,nilai.absen,nilai.tugas,nilai.uts,nilai.uas');
		$this->datatables->from('nilai');
		$this->datatables->join('mahasiswa','mahasiswa.id_mahasiswa = nilai.mahasiswa_id');
		$this->datatables->join('matakuliah','matakuliah.id_matakuliah = nilai.matakuliah_id');
		$this->datatables->add_column('view','<a href="#" class="delete-nilai btn btn-danger btn-sm" data-id="$1">Hapus</a>','id_jurusan');
		return print_r($this->datatables->generate());
    }

    public function create()
    {
        $this->check->user_login();
		// get admin data
		$admin_data = $this->AuthModel->getDataByUsername($this->session->userdata('username'));
		
		$data = [
			'data' => $admin_data,
			'title' => 'Nilai',
			'sub_title' => '',
		];

		$this->load->view('component/header',$data);
		$this->load->view('component/sidebar',$data);
		$this->load->view('pages/nilai/nilai_create',$data);
		$this->load->view('component/footer',$data);
		$this->load->view('pages/nilai/nilai_script',$data);
    }

    public function store(){

        $id_jurusan = $this->input->post('id_jurusan');
        $id_kelas = $this->input->post('id_kelas');
        $id_matakuliah = $this->input->post('id_matakuliah');
        $id_tahun_ajar = $this->input->post('id_tahun_ajar');
        $semester = $this->input->post('semester');
        
        $data = [];
        for ($i=0; $i < count($this->input->post('mahasiswa_id')); $i++) { 
            $data[] = [
                'mahasiswa_id' => $this->input->post('mahasiswa_id')[$i],
                'matakuliah_id' => $id_matakuliah,
                'tahun_ajar_id' => $id_tahun_ajar,
                'semester' => $semester,
                'absen' => $this->input->post('absen')[$i],
                'tugas' => $this->input->post('tugas')[$i],
                'uts' => $this->input->post('uts')[$i],
                'uas' => $this->input->post('uas')[$i],
                'nilai' => $this->input->post('nilai')[$i],
                'grade' => $this->input->post('grade')[$i],
                'keterangan' => $this->input->post('grade')[$i] != 'E' ? 'Lulus' : 'Belum Lulus',
            ];


        }

        $this->NilaiModel->saveMultipleData($data);
        echo json_encode([
            'message' => 'Data berhasil di simpan.'
        ]);

    }

    public function search()
    {
        $id_matakuliah = $this->input->post('id_matakuliah');
        $nama_matakuliah = $this->input->post('nama_matakuliah');
        $semester = $this->input->post('semester');
        $id_kelas = $this->input->post('id_kelas');
        $nama_kelas = $this->input->post('nama_kelas');
        $id_jurusan = $this->input->post('id_jurusan');
        $nama_jurusan = $this->input->post('nama_jurusan');
        $tahun_ajar = $this->input->post('tahun_ajar');
        $id_tahun_ajar = $this->input->post('id_tahun_ajar');

        // get list mahasiswa
        $list = $this->db->select('DISTINCT(mahasiswa.nim),mahasiswa.nama_mahasiswa,mahasiswa.id_mahasiswa')
        ->from('mahasiswa')
        ->join('krs','krs.mahasiswa_id = mahasiswa.id_mahasiswa')
        ->join('jurusan','jurusan.id_jurusan = mahasiswa.jurusan_id')
        ->where('mahasiswa.kelas_id',$id_kelas)
        ->where('mahasiswa.jurusan_id',$id_jurusan)
        ->where('krs.tahun_ajar_id',$id_tahun_ajar)
        ->get()->result();

        echo json_encode($list);

    }
    // ===============================================================
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
            $data = $this->db->select('nama_matakuliah as label, nama_matakuliah as value, id_matakuliah as result')
            ->like('nama_matakuliah', $_GET['term'] , 'both')
            ->order_by('id_matakuliah', 'ASC')
            ->limit(5)->get('matakuliah')->result();
            echo json_encode($data);
        }

    }

    public function getJurusan(){

        if (isset($_GET['term'])) {
            $data = $this->db->select('nama_jurusan as label, nama_jurusan as value, id_jurusan as result')
            ->like('nama_jurusan', $_GET['term'] , 'both')->order_by('id_jurusan', 'ASC')->limit(5)->get('jurusan')->result();
            echo json_encode($data);
        }

    }

    public function getKelas(){

        if (isset($_GET['term'])) {
            $data = $this->db->select('nama_kelas as label, nama_kelas as value, id_kelas as result')
            ->like('nama_kelas', $_GET['term'] , 'both')->order_by('id_kelas', 'ASC')->limit(5)->get('kelas')->result();
            echo json_encode($data);
        }

    }


}