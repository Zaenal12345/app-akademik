<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once(APPPATH.'libraries/REST_Controller.php');

class Dosen extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('wsfeeder');

    }

    public function index_get()
    {
        $data = $this->wsfeeder->getAllDosen();

        $result['data'] = $data;
        // $result['length'] = count($data);
        // $result['message'] = count($data) != 0 ? "Data has been retrieved !" : "Data not found" ;
        
        $this->response($result, 200);
    }

}