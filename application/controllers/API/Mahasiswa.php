<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('wsfeeder');

    }

    public function index()
    {
        $data = $this->wsfeeder->getAllDosen();
        // $index = 0;
        // // insert seluruh data dari server 
        // for($i=0; $i < count($data->data); $i++) { 
                
        //     if($data->data[$i]->id_periode != 19971 && $data->data[$i]->id_periode != 19972 && $data->data[$i]->id_periode != 19981 && $data->data[$i]->id_periode != 19982 && $data->data[$i]->id_periode != 19991 && $data->data[$i]->id_periode != 19992 && $data->data[$i]->id_periode != 20001 && $data->data[$i]->id_periode != 20002 && $data->data[$i]->id_periode != 20011 && $data->data[$i]->id_periode != 20012 && $data->data[$i]->id_periode != 20021 && $data->data[$i]->id_periode != 20022 && $data->data[$i]->id_periode != 20031 && $data->data[$i]->id_periode != 20032 && $data->data[$i]->id_periode != 20041 && $data->data[$i]->id_periode != 20042 && $data->data[$i]->id_periode != 20051 && $data->data[$i]->id_periode != 20052 && $data->data[$i]->id_periode != 20061 && $data->data[$i]->id_periode != 20062){

        //         $index++;

        //     }

        // }
        // $data_mahasiswa = $this->db->get('mahasiswa')->result();

        // if(count($data_mahasiswa) != 0){

        //     // masukkan record terbaru

        // }else{

        //     // insert semua data yang ada
        //     $index=1;
        //     for ($i=0; $i < count($data->data); $i++) { 
                
        //         $this->db->insert('mahasiswa',[
        //             'id_mahasiswa' => $index,
        //             'nim' => $data->data[$i]->nim,
        //             'nama_mahasiswa' => $data->data[$i]->nama_mahasiswa,
        //             'jenis_kelamin' => $data->data[$i]->jenis_kelamin,
        //             'tanggal_lahir' => $data->data[$i]->tanggal_lahir,
        //             'tempat_lahir' => "",
        //             'jurusan_id' => "2",
        //             'kelas_id' => "1",
        //             'agama' => $data->data[$i]->nama_agama,
        //             'status_mahasiswa' => $data->data[$i]->nama_status_mahasiswa,
        //             'alamat' => "",
        //             'foto' => "default.jpg",
        //             'tahun_angkatan' => $data->data[$i]->nama_periode_masuk,
        //         ]);

        //         $index++;

        //     }

        // }
        
        // $message = [
        //     'message' => 'Singkronisasi berhasil',
        //     'success' => true,
        // ];
        // echo json_encode($message);

        // $data = $this->db->get('mahasiswa');
        echo json_encode($data);

    }

    public function getMahasiswaAktif()
    {
        $data = $this->wsfeeder->getMahasiswaAktif();
        echo json_encode($data);
    }

    public function getMahasiswaNonAktif()
    {
        $data = $this->wsfeeder->getMahasiswaNonAktif();
        echo json_encode($data->data);
    }

    public function getMahasiswaLulus()
    {
        $data = $this->wsfeeder->getMahasiswaLulus();
        echo json_encode($data->data);
    }

    public function getMahasiswaKeluar1()
    {
        $data = $this->wsfeeder->getMahasiswaKeluar1();
        echo json_encode($data->data);
    }

    public function getMahasiswaKeluar2()
    {
        $data = $this->wsfeeder->getMahasiswaKeluar2();
        echo json_encode($data->data);
    }

    public function getMahasiswaCuti()
    {
        $data = $this->wsfeeder->getMahasiswaCuti();
        echo json_encode(count($data->data));
    }

}