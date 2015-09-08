<?php

class Academia extends CI_Controller {

    public $data = array();

    function __construct() {
        parent::__construct();
        $this->load->model('academia_model');
        $this->data['titulo'] = "OpenDojo";
        $this->data['cabecalho'] = "Academias";
        $this->form_validation->set_error_delimiters('<div class="col-xs-5 messageContainer help-block">', '</div>');
    }

    function index($pagina = 1) {
        $this->filtrar($this->input->post('filtro_nomeAcademia'),$pagina);
        $this->data['all_pages'] = $this->academia_model->all_pages;
        $this->load->view('AcademiaList_view', $this->data);
    }
    
    private function filtrar($filtro_nomeAcademia, $pagina) {
        if ($filtro_nomeAcademia <> '') {
            $this->data['filtro_nomeAcademia'] = $filtro_nomeAcademia;
            $filtro_nomeAcademia = strtoupper($filtro_nomeAcademia);
            $total_academias = $this->academia_model
                    ->where('UPPER(nomeAcademia)', 'like', $filtro_nomeAcademia)
                    ->count();
            $this->data['academias'] = $this->academia_model
                    ->with_dojos('fields:*count*')
                    ->where('UPPER(nomeAcademia)', 'like', $filtro_nomeAcademia)
                    ->paginate(10, $total_academias, $pagina);
        } else {
            $this->data['filtro_nomeAcademia'] = '';
            $total_academias = $this->academia_model->count();
            $this->data['academias'] = $this->academia_model
                    ->with_dojos('fields:*count*')
                    ->paginate(10, $total_academias, $pagina);
        }
    }

    function edit($id = 0) {
        $this->load->model('estado_model');
        $this->data['estados'] = $this->estado_model->get_estados();
        $this->data['academia'] = $this->academia_model->as_array()->get($id);
        if (count($this->input->post()) == 0) {
            $this->load->view('AcademiaEdit_view', $this->data);
        } else {
            $academia = $this->input->post();
            $this->form_validation->set_rules($this->academia_model->rules);
            if ($this->form_validation->run() == TRUE) {
                $resultado = $this->academia_model->update($academia, $this->input->post('idAcademia'));
                $this->session->set_flashdata('message', 'Academia "' . $this->input->post('nomeAcademia') . '" editada com sucesso');
                $this->session->set_flashdata('type_message', '1'); //Sucesso
                redirect('/Academia');
            } else {
                $this->data['academia'] = $academia;
                $this->load->view('AcademiaEdit_view', $this->data);
            }
        }
    }

    function add() {
        $this->load->model('estado_model');
        $this->data['estados'] = $this->estado_model->get_estados();
        //Adiciona um item vazio no início
        $this->data['estados'] = array('0' => '') + $this->data['estados'];
        if (count($this->input->post()) == 0) {
            $this->load->view('AcademiaAdd_view', $this->data);
        } else {
            $resultado = $this->academia_model->from_form()->insert();
            if ($resultado) {
                $this->session->set_flashdata('message', 'Academia "' . $this->input->post('nomeAcademia') . '" cadastrada com sucesso');
                $this->session->set_flashdata('type_message', '1'); //Sucesso
                redirect('/Academia');
            } else {
                    $this->data['academia'] = $this->input->post();
                $this->load->view('AcademiaAdd_view', $this->data);
            }
        }
    }

    function delete($id = null) {
        if (isset($id)) {
            $academia = $this->academia_model->fields('nomeAcademia')->get($id);
            if ($this->academia_model->delete($id)) {
                $this->session->set_flashdata('message', 'Academia "' . $academia->nomeAcademia . '" deletada com sucesso');
                $this->session->set_flashdata('type_message', '1'); //Sucesso
            } else {
                $this->session->set_flashdata('message', 'Academia "' . $academia->nomeAcademia . '" não pôde ser deletada');
                $this->session->set_flashdata('type_message', '0'); //Erro
            }
            redirect('/Academia');
        }
    }

}
