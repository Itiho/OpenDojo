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
            } else {
//                Aqui entrará uma validação de usuário
                $this->session->set_userdata('username', $this->input->post('username'));
                $this->session->set_userdata('password', password_hash($this->input->post('password'), PASSWORD_DEFAULT));
                redirect('/Home');
            }
        }
    }

    function logout() {
        $this->session->sess_destroy();
        redirect('/Login');
    }

    function lost_pass() {
        if (count($this->input->post()) == 0) {
            $this->load->view('LostPass_view', $this->data);
        } else {
            //Aqui enviará por email o link para resetar a senha
            $this->data['ok'] = 'ok';
            $this->load->view('LostPass_view', $this->data);
        }
    }

    function reset_pass($token = 0) {
        //Se o token é válido (Consulta no banco de dados
        if ($token) {
            if (count($this->input->post()) == 0) {
                $this->load->view('ResetPass_view', $this->data);
            } else {
                //Aqui resetará a senha
            }
        } else {
            $this->session->sess_destroy();
            redirect('/Login');
        }
    }

}
