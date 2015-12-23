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
}