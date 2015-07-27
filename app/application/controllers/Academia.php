<?php

class Academia extends CI_Controller {

    public $data = array();

    function __construct() {
        parent::__construct();
        $this->load->model('academia_model');
//        $this->load->model('artemarcial_model');
        $this->data['titulo'] = "OpenDojo";
        $this->data['cabecalho'] = "Academias";
        $this->form_validation->set_error_delimiters('<div class="col-xs-5 messageContainer help-block">', '</div>');
    }

    function index($pagina = 1) {
        if ($this->input->post('filtro_nomeAcademia') <> '') {
            $this->data['filtro_nomeAcademia'] = $this->input->post('filtro_nomeAcademia');
            $total_artesmarciais = $this->academia_model
                    ->where('nome', 'like', $this->input->post('filtro_nomeAcademia'))
                    ->count();
            $this->data['academias'] = $this->academia_model
                    ->with_dojos()
                    ->where('nome', 'like', $this->input->post('filtro_nomeAcademia'))
                    ->paginate(10, $total_artesmarciais, $pagina);
        } else {
            $this->data['filtro_nomeAcademia'] = '';
            $total_artesmarciais = $this->academia_model->count();
            $this->data['academias'] = $this->academia_model
                    ->with_graduacoes()
                    ->paginate(10, $total_artesmarciais, $pagina);
        }
        $this->data['all_pages'] = $this->academia_model->all_pages;
        $this->load->view('AcademiaList_view', $this->data);
    }

    function edit($id = 0) {
        $this->load->library('form_validation');
        $graduacao = $this->graduacao_model->get($id);
        $this->data['graduacao'] = objectToArray($graduacao);
        $this->data['artesMarciais'] = objectToArray($this->artemarcial_model->get_all());
        if (count($this->input->post()) == 0) {
            $this->load->view('GraduacaoEdit_view', $this->data);
        } else {
            $graduacao = array(
                'nomeGraduacao' => $this->input->post('nomeGraduacao'),
                'arteMarcial' => $this->input->post('arteMarcial'));
            $rules = array(
                array(
                    'field' => 'nomeGraduacao',
                    'label' => 'Nome',
                    'rules' => 'required|min_length[3]'));
            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run() == TRUE) {
                $resultado = $this->graduacao_model->update($graduacao, $this->input->post('idGraduacao'));
                $this->session->set_flashdata('message', 'Graduação "' . $this->input->post('nomeGraduacao') . '" editada com sucesso');
                $this->session->set_flashdata('type_message', '1'); //Sucesso
                redirect('/Graduacao');
            } else {
                $this->data['idGraduacao'] = $this->input->post('idGraduacao');
                $this->data['nomeGraduacao_value'] = $this->input->post('nomeGraduacao');
                $this->data['arteMarcial_value'] = $this->input->post('arteMarcial');
                $this->load->view('GraduacaoEdit_view', $this->data);
            }
        }
    }

    function add() {
        $this->load->model('estado_model');
        $this->data['estados'] = $this->estado_model->get_estados();
        //Adiciona um item vazio no início
        array_unshift($this->data['estados'], '');
        if (count($this->input->post()) == 0) {
            $this->load->view('AcademiaAdd_view', $this->data);
        } else {
            $academia = array(
                'nome' => $this->input->post('nome'),
                'logradouro' => $this->input->post('logradouro'),
                'numero' => $this->input->post('numero'),
                'complemento' => $this->input->post('complemento'),
                'bairro' => $this->input->post('bairro'),
                'cidade' => $this->input->post('cidade'),
                'estado' => $this->input->post('estado'));
            $resultado = $this->academia_model->from_form()->insert();
            if ($resultado) {
                $this->session->set_flashdata('message', 'Academia "' . $this->input->post('nome') . '" cadastrada com sucesso');
                $this->session->set_flashdata('type_message', '1'); //Sucesso
                redirect('/Academia');
            } else {
                $this->data['nomeAcademia_value'] = $this->input->post('nome');
                $this->data['logradouro_value'] = $this->input->post('logradouro');
                $this->data['numero_value'] = $this->input->post('numero');
                $this->data['complemento_value'] = $this->input->post('complemento');
                $this->data['bairro_value'] = $this->input->post('bairro');
                $this->data['cidadeo_value'] = $this->input->post('cidade');
                $this->data['estado_value'] = $this->input->post('estado');
                $this->load->view('AcademiaAdd_view', $this->data);
            }
        }
    }

    function delete($id = null) {
        if (isset($id)) {
            $graduacao = $this->graduacao_model->get($id);
            $this->graduacao_model->delete($id);
            $this->session->set_flashdata('message', 'Graduação "' . $graduacao->nomeGraduacao . '" deletada com sucesso');
            $this->session->set_flashdata('type_message', '1'); //Sucesso
            redirect('/Graduacao');
        }
    }
}
