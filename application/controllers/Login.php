<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->model('m_login');
        $this->load->library(array('form_validation', 'session'));
        $this->load->helper(array('url', 'html', 'form'));
        $this->id_user = $this->session->userdata('id_user');
    }

    public function index()
    {
        $this->load->view('menu/v_login');
    }

    public function register()
    {
        $this->load->view('menu/v_register');
    }

    public function post_login()
    {

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_message('required', 'Enter %s');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('menu/v_login');
        } else {
            $username = htmlspecialchars($this->input->post('username', TRUE), ENT_QUOTES);
            $password = htmlspecialchars($this->input->post('password', TRUE), ENT_QUOTES);

            $check = $this->m_login->login_check($username, $password);

            if ($check->num_rows() > 0) {
                $data = $check->row_array();
                $this->session->set_userdata('email', $data['email']);
                $this->session->set_userdata('name', $data['name']);
                $this->session->set_userdata('access_level', $data['access_level']);
                $this->session->set_userdata('logged_in', true);

                $this->session->set_userdata($username);

                redirect(base_url('home'));
            }

            $this->load->view('menu/v_login');
        }
    }
    public function post_register()
    {

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('correctpass', 'Correct Pass', 'required|matches[password]');
        $this->form_validation->set_rules('email', 'Email', 'required');

        $this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
        $this->form_validation->set_message('required', 'Masukkan %s dengan benar!');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('menu/v_register');
        } else {
            $data = array(
                'email' => $this->input->post('email'),
                'name' => $this->input->post('username'),
                'password' => sha1($this->input->post('password')),
                'access_level' => $this->input->post('access_level')

            );

            $check = $this->m_login->insert_user($data);

            if ($check != false) {

                $user = array(
                    'email' => $this->input->post('email'),
                    'name' => $this->input->post('username'),
                    'access_level' => $this->input->post('access_level'),
                    'logged_in' => TRUE
                );
            }

            $this->session->set_userdata($user);

            redirect(base_url('home'));
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }
}
