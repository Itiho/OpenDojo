<?php

class TipoContato extends CI_Controller {

    public $data = array();

    function __construct() {
        parent::__construct();
        $this->load->model('tipocontato_model');
        $this->data['titulo'] = "OpenDojo";
        $this->data['cabecalho'] = "Tipo de contato";
        $this->form_validation->set_error_delimiters('<div class="col-xs-5 messageContainer help-block">', '</div>');
    }

    function index($pagina = 1) {
        $this->data['cabecalho'] = "Tipos de contato";
        $this->filtrar($this->input->post('filtro_nomeTipoContato'), $pagina);
        $this->data['all_pages'] = $this->tipocontato_model->all_pages;
        $this->load->view('TipoContatoList_view', $this->data);
    }

    private function filtrar($filtro_nomeTipoContato, $pagina) {
        if ($filtro_nomeTipoContato <> '') {
            $this->data['filtro_nomeTipoContato'] = $filtro_nomeTipoContato;
            $filtro_nomeTipoContato = strtoupper($filtro_nomeTipoContato);
            $total_tiposcontato = $this->tipocontato_model
                    ->where('UPPER(tipoContato)', 'like', $filtro_nomeTipoContato)
                    ->count();
            $this->data['tiposcontato'] = $this->tipocontato_model
                    ->where('UPPER(tipoContato)', 'like', $filtro_nomeTipoContato)
                    ->paginate(10, $total_tiposcontato, $pagina);
        } else {
            $this->data['filtro_nomeTipoContato'] = '';
            $total_tiposcontato = $this->tipocontato_model->count();
            $this->data['tiposcontato'] = $this->tipocontato_model
                    ->paginate(10, $total_tiposcontato, $pagina);
        }
    }

    function edit($id = 0) {
        $this->data['tipocontato'] = $this->tipocontato_model->as_array()->get($id);
        if (count($this->input->post()) == 0) {
            $this->load->view('TipoContatoEdit_view', $this->data);
        } else {
            $tipocontato = $this->input->post();
            $this->form_validation->set_rules($this->tipocontato_model->rules);
            if ($this->form_validation->run() == TRUE) {
                $resultado = $this->tipocontato_model->update($tipocontato, $this->input->post('idTipoContato'));
                $this->session->set_flashdata('message', 'Tipo de contato "' . $this->input->post('tipoContato') . '" editado com sucesso');
                $this->session->set_flashdata('type_message', '1'); //Sucesso
                redirect('/TipoContato');
            } else {
                $this->data['tipocontato'] = $tipocontato;
                $this->load->view('TipoContatoEdit_view', $this->data);
            }
        }
    }

    function add() {
        if (count($this->input->post()) == 0) {
            $this->load->view('TipoContatoAdd_view', $this->data);
        } else {
            $resultado = $this->tipocontato_model->from_form()->insert();
            if ($resultado) {
                $this->session->set_flashdata('message', 'Tipo de contato "' . $this->input->post('tipoContato') . '" cadastrado com sucesso');
                $this->session->set_flashdata('type_message', '1'); //Sucesso
                redirect('/TipoContato');
            } else {
                $this->data['tipocontato'] = $this->input->post();
                $this->load->view('TipoContatoAdd_view', $this->data);
            }
        }
    }

    function delete($id = null) {
        if (isset($id)) {
            $tipocontato = $this->tipocontato_model->fields('tipoContato')->get($id);
            if ($this->tipocontato_model->delete($id)) {
                $this->session->set_flashdata('message', 'Tipo de contato "' . $tipocontato->tipoContato . '" deletado com sucesso');
                $this->session->set_flashdata('type_message', '1'); //Sucesso
            } else {
                $this->session->set_flashdata('message', 'Arte marcial "' . $tipocontato->tipoContato . '" não pôde ser deletado');
                $this->session->set_flashdata('type_message', '0'); //Erro
            }
            redirect('/TipoContato');
        }
    }

}
