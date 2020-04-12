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
        if($this->session->userdata('logged_in')){ 
            $this->load->view('menu/v_map');
            
		} else{
			echo "<script>
			alert('Access Denied ! ');
			window.location='".site_url('login')."';
			</script>";
		}
        
    }
    public function puskesmas_json()
    {
        $data = $this->db->get('puskesmas')->result();
        echo json_encode($data);
    }
}
