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
            'matakuliah' => $this->db->get('matakuliah')->result(),
            'mahasiswa' => $this->db->get('mahasiswa')->result(),
		];

		$this->load->view('component/header',$data);
		$this->load->view('component/sidebar',$data);
		$this->load->view('pages/nilai/nilai',$data);
		$this->load->view('component/footer',$data);
		$this->load->view('pages/nilai/nilai_script',$data);
    }

    public function show()
    {
        $this->datatables->select('nilai.id_nilai,nilai.nilai,nilai.standard_nilai,nilai.grade,nilai.keterangan,mahasiswa.nim,mahasiswa.nama_mahasiswa,matakuliah.kode_matakuliah,matakuliah.nama_matakuliah');
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
            'matakuliah' => $this->db->get('matakuliah')->result(),
            'kelas' => $this->db->get('kelas')->result(),
            'jurusan' => $this->db->get('jurusan')->result(),
            'tahun_ajar' => $this->db->get('tahun_ajar')->result(),
		];

		$this->load->view('component/header',$data);
		$this->load->view('component/sidebar',$data);
		$this->load->view('pages/nilai/nilai_create',$data);
		$this->load->view('component/footer',$data);
		$this->load->view('pages/nilai/nilai_script',$data);
    }

    public function store(){

        $id_jurusan = $this->input->post('jurusan_id');
        $id_kelas = $this->input->post('kelas_id');
        $id_matakuliah = $this->input->post('matakuliah_id');
        $id_tahun_ajar = $this->input->post('tahun_ajar_id');
        $semester = $this->input->post('semester');
        
        $data = [];
        $count = count($this->input->post('mahasiswa_id'));

        for ($i=0; $i <$count; $i++) { 

            $this->db->insert('nilai',[
                'mahasiswa_id' => $this->input->post('mahasiswa_id')[$i],
                'matakuliah_id' => $id_matakuliah,
                'nilai' => $this->input->post('nilai')[$i],
                'grade' => $this->input->post('grade')[$i],
                'keterangan' => $this->input->post('grade')[$i] != 'E' ? 'Lulus' : 'Belum Lulus',
            ]);

        }

        echo json_encode([
            'message' => 'Data berhasil disimpan',
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
        ->from('krs')
        ->join('mahasiswa','krs.mahasiswa_id = mahasiswa.id_mahasiswa')
        ->join('jurusan','jurusan.id_jurusan = mahasiswa.jurusan_id')
        ->where('mahasiswa.kelas_id',$id_kelas)
        ->where('mahasiswa.jurusan_id',$id_jurusan)
        ->where('krs.tahun_ajar_id',$id_tahun_ajar)
        ->get()->result();

        echo json_encode($list);

    }

    public function transkipNilai()
    {
        $data_nilai = [];
        $sks_tempuh = 0;
        $sks_fix = 0;
        $ipk = 0;
        $id_mahasiswa = $this->input->post('nim');
        $matakuliah = $this->db->get('matakuliah')->result();
        $mahasiswa = $this->db->select('mhs.*,kls.nama_kelas,j.nama_jurusan')
        ->from('mahasiswa mhs')
        ->join('kelas kls','kls.id_kelas = mhs.kelas_id')
        ->join('jurusan j','j.id_jurusan = mhs.jurusan_id')
        ->where('mhs.id_mahasiswa',$id_mahasiswa)
        ->get()->result(); 

        $nilai = $this->db->where('mahasiswa_id',$id_mahasiswa)->get('nilai')->result();

        for ($i=0; $i < count($matakuliah) ; $i++) { 
            
            $data_nilai[] = [
                'id_matakuliah' => $matakuliah[$i]->id_matakuliah,
                'kode_matakuliah' => $matakuliah[$i]->kode_matakuliah,
                'nama_matakuliah' => $matakuliah[$i]->nama_matakuliah,
                'sks' => $matakuliah[$i]->sks,
                'semester' => $matakuliah[$i]->semester,
                'grade' => 0,
                'bobot' => 0,
                'jumlah' => 0,
            ];

            $sks_tempuh+= $matakuliah[$i]->sks;
        }

        for ($j=0; $j < count($data_nilai) ; $j++) { 
            
            for ($k=0; $k < count($nilai); $k++) { 
                
                if($nilai[$k]->matakuliah_id == $data_nilai[$j]['id_matakuliah']){
                    $data_nilai[$j]['grade'] = $nilai[$k]->grade;
                    
                    if($nilai[$k]->grade == "A"){
                        $data_nilai[$j]['bobot'] = 4;
                    }else if($nilai[$k]->grade == "B"){
                        $data_nilai[$j]['bobot'] = 3;
                    }else if($nilai[$k]->grade == "C"){
                        $data_nilai[$j]['bobot'] = 2;
                    }else if($nilai[$k]->grade == "D"){
                        $data_nilai[$j]['bobot'] = 1;
                    }else if($nilai[$k]->grade == "E"){
                        $data_nilai[$j]['bobot'] = 0;
                    }

                }

            }

        }

        for ($l=0; $l < count($data_nilai) ; $l++) { 
            
            if($data_nilai[$l]['bobot'] != 0){

                $data_nilai[$l]['jumlah'] = ($data_nilai[$l]['bobot'] * $data_nilai[$l]['sks']);
                $sks_fix+=$data_nilai[$l]['sks'];
            }

        }

        // echo json_encode($data);

        $this->check->user_login();
		// get admin data
		$admin_data = $this->AuthModel->getDataByUsername($this->session->userdata('username'));
		
		$data = [
			'data' => $admin_data,
			'title' => 'Nilai',
			'sub_title' => '',
			'transkip' => $data_nilai,
			'mahasiswa' => $mahasiswa,
			'sks_tempuh' => $sks_tempuh,
			'sks_fix' => $sks_fix,
			'ipk' => $ipk,
		];

		$this->load->view('component/header',$data);
		$this->load->view('component/sidebar',$data);
		$this->load->view('pages/nilai/transkip_nilai',$data);
		$this->load->view('component/footer',$data);
		$this->load->view('pages/nilai/nilai_script',$data);

    }

    public function perbaikan_nilai()
    {
        $this->check->user_login();
		// get admin data
		$admin_data = $this->AuthModel->getDataByUsername($this->session->userdata('username'));
		
		$data = [
			'data' => $admin_data,
			'title' => 'Nilai',
			'sub_title' => '',
			'mahasiswa' => $this->db->get('mahasiswa')->result(),
		];

		$this->load->view('component/header',$data);
		$this->load->view('component/sidebar',$data);
		$this->load->view('pages/nilai/nilai_perubahan',$data);
		$this->load->view('component/footer',$data);
		$this->load->view('pages/nilai/nilai_script',$data);

    }

    public function getNilai()
    {
        $mahasiswa_id = $this->input->post('mahasiswa_id');
        $matakuliah_id = $this->input->post('matakuliah_id');

        $data = $this->db->select('*')->from('nilai')
        ->where('mahasiswa_id',$mahasiswa_id)
        ->where('matakuliah_id',$matakuliah_id)
        ->get()->result();

        echo json_encode($data);
    }

    public function ubahNilai()
    {
        $mahasiswa_id = $this->input->post('nim2');
        $matakuliah_id = $this->input->post('matakuliah_id');
        $nilai_edit = $this->input->post('nilai_edit');
        $grade_edit = $this->input->post('grade_edit');

        $this->db->set([
            'nilai' => $nilai_edit,
            'grade' => $grade_edit,
            'keterangan' => $grade_edit != 'E' ? 'Lulus' : 'Tidak Lulus',
        ])
        ->where('matakuliah_id',$matakuliah_id)
        ->where('mahasiswa_id',$mahasiswa_id)
        ->update('nilai');

        echo json_encode([
            'message' => 'Data berhasil di ubah',
        ]);

    }


}