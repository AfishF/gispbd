<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Map extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->load->view('menu/v_map');
    }
    public function puskesmas_json()
    {
        $data = $this->db->get('puskesmas')->result();
        echo json_encode($data);
    }
}
