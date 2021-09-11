<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fakultas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('wsfeeder');

    }

    public function index()
    {
        $data = $this->db->get('fakultas')->result();
        echo json_encode($data);
    }


}