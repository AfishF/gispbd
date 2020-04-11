<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tabel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('pagination');
        $this->load->helper('url');
        $this->load->model('m_tabel');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data["puskesmas"] = $this->m_tabel->getAll();
        $this->load->view('menu/v_tabel', $data);
    }
    public function add()
    {
        $puskesmas = $this->m_tabel;
        $validation = $this->form_validation;
        $validation->set_rules($puskesmas->rules());

        if ($validation->run()) {
            $puskesmas->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view('menu/v_add');
    }

    public function edit($kode_puskesmas = null)
    {
        if (!isset($kode_puskesmas)) redirect('tabel');
       
        $puskesmas = $this->m_tabel;
        $validation = $this->form_validation;
        $validation->set_rules($puskesmas->rules());

        if ($validation->run()) {
            $puskesmas->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["puskesmas"] = $puskesmas->getById($kode_puskesmas);
        if (!$data["puskesmas"]) show_404();
        
        $this->load->view('menu/v_edit', $data);
    }

    public function delete($kode_puskesmas=null)
    {
        if (!isset($kode_puskesmas)) show_404();
        
        if ($this->m_tabel->delete($kode_puskesmas)) {
            redirect(site_url('tabel'));
        }
    }
}
