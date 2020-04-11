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
        $puskesmas = $this->m_barbuk;
        $validation = $this->form_validation;
        $validation->set_rules($puskesmas->rules());

        if ($validation->run()) {
            $puskesmas->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->template_admin->load('/admin/template_admin', '/admin/addBarbuk');
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/admin_barbuk');
       
        $puskesmas = $this->m_barbuk;
        $validation = $this->form_validation;
        $validation->set_rules($puskesmas->rules());

        if ($validation->run()) {
            $puskesmas->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["puskesmas"] = $puskesmas->getById($id);
        if (!$data["puskesmas"]) show_404();
        
        $this->template_admin->load('/admin/template_admin', '/admin/editBarbuk', $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->m_barbuk->delete($id)) {
            redirect(site_url('admin/admin_barbuk'));
        }
    }
}
