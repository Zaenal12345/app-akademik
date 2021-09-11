<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('wsfeeder');

    }

    public function index()
    {
        $this->db->select('*')->from('jurusan');

        if($this->input->post('nama_jurusan')){
            $this->db->where('nama_jurusan',$this->input->post('nama_jurusan'));
        }

        if ($this->input->post('limit') != '' && $this->input->post('offset') != '') {
            $this->db->limit($this->input->post('limit'), $this->input->post('offset'));
        }

        $result['data'] = $this->db->get()->result();
        // $result['total_record'] = count($data->result());


        echo json_encode($result);
    }


}