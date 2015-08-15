<?php

class Login extends CI_Controller {

    public $data = array();

    function __construct() {
        parent::__construct();
        $this->data['titulo'] = 'OpenDojo';
        $this->data['cabecalho'] = 'Login';
    }

    function index() {
        if ($this->session->has_userdata('usuario') && $this->session->has_userdata('password')) {
            redirect('/Home');
        } else {
            if (count($this->input->post()) == 0) {
                $this->load->view('Login_view', $this->data);
            } else{
//                Aqui entrará uma validação de usuário
                $this->session->set_userdata('username', $this->input->post('username'));
                $this->session->set_userdata('password', password_hash($this->input->post('password'),PASSWORD_DEFAULT));
                redirect('/Home');
            }
        }
    }

    function logout() {
        $this->session->sess_destroy();
        redirect('/Login');
    }

}
