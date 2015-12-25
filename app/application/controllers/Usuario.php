<?php

class Usuario extends CI_Controller {

    public $data = array();

    function __construct() {
        parent::__construct();
        $this->load->model('usuario_model');
        $this->data['titulo'] = "OpenDojo";
        $this->data['cabecalho'] = "Usuario";
        $this->form_validation->set_error_delimiters('<div class="col-xs-5 messageContainer help-block">', '</div>');
    }

    function index($pagina = 1) {
        $this->data['cabecalho'] = "Usuários";
        $this->filtrar($this->input->post('filtro_nomeUsuario'), $pagina);
        $this->data['all_pages'] = $this->usuario_model->all_pages;
        $this->load->view('UsuarioList_view', $this->data);
    }

    private function filtrar($filtro_nomeUsuario, $pagina) {
        if ($filtro_nomeUsuario <> '') {
            $this->data['filtro_nomeUsuario'] = $filtro_nomeUsuario;
            $filtro_nomeUsuario = strtoupper($filtro_nomeUsuario);
            $total_usuario = $this->usuario_model
                    ->where('UPPER(nomeUsuario)', 'like', $filtro_nomeUsuario)
                    ->count();
            $this->data['usuarios'] = $this->usuario_model
                    ->where('UPPER(nomeUsuario)', 'like', $filtro_nomeUsuario)
                    ->paginate(10, $total_usuario, $pagina);
        } else {
            $this->data['filtro_nomeUsuario'] = '';
            $total_usuario = $this->usuario_model->count();
            $this->data['usuarios'] = $this->usuario_model
                    ->paginate(10, $total_usuario, $pagina);
        }
    }

    function edit($id = 0) {
        // $this->load->model('usuario_model');
        $this->data['usuario'] = $this->usuario_model->as_array()->get($id);
            // var_dump($this->usuario_model->rulesUpdate);
            // $this->form_validation->set_rules($this->usuario_model->rulesUpdate);
        if (count($this->input->post()) == 0) {
            $this->load->view('UsuarioEdit_view', $this->data);
        } else {
            $usuario = $this->input->post();
            // $this->form_validation->set_rules('login','Login','trim|strtolower|required|min_length[3]');
            $this->usuario_model->rules = $this->usuario_model->rulesUpdate;
            if ($this->form_validation->run() == TRUE) {
            echo "teste";
                $resultado = $this->usuario_model->update($usuario, $this->input->post('idUsuario'));
                $this->session->set_flashdata('message', 'Usuario "' . $this->input->post('nomeUsuario') . '" editado com sucesso');
                $this->session->set_flashdata('type_message', '1'); //Sucesso
                redirect('/Usuario');
            } else {
                $this->data['usuario'] = $usuario;
                $this->load->view('UsuarioEdit_view', $this->data);
            }
        }
    }

     function add() {
        if (count($this->input->post()) == 0) {
            $this->load->view('UsuarioAdd_view', $this->data);
        } else {
            $resultado = $this->usuario_model->from_form()->insert();
            if ($resultado) {
                $this->session->set_flashdata('message', 'Usuario "' . $this->input->post('nomeUsuario') . '" cadastrado com sucesso');
                $this->session->set_flashdata('type_message', '1'); //Sucesso
                redirect('/Usuario');
            } else {
                $this->data['usuario'] = $this->input->post();
                $this->load->view('UsuarioAdd_view', $this->data);
            }
        }
    }
}