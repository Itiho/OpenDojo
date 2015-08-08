<?php

class Horario extends CI_Controller {

    public $data = array();

    function __construct() {
        parent::__construct();
        $this->load->model('horario_model');
        $this->load->model('dojo_model');
        $this->load->model('turma_model');
        $this->load->model('diaSemana_model');
        $this->data['titulo'] = 'OpenDojo';
        $this->data['cabecalho'] = 'Horario';
        $this->form_validation->set_error_delimiters('<div class="col-xs-5 messageContainer help-block">', '</div>');
    }

    function index($pagina = 1) {
        $this->filtrar($this->input->post('filtro_turma'), $pagina);
        $this->data['all_pages'] = $this->dojo_model->all_pages;
        $this->data['turmas'] = $this->turma_model->as_dropdown('nomeTurma')->get_all();
        //Insere o primeiro item
        $this->data['turmas'] = array('0' => 'Turma') + $this->data['turmas'];
        $this->load->view('HorarioList_view', $this->data);
    }

    private function filtrar($filtro_turma, $pagina) {
        if ($filtro_turma > 0) {
            $this->data['filtro_turma'] = $filtro_turma;
            $total_horarios = $this->horario_model
                    ->where('Turma_idTurma', $filtro_turma)
                    ->count();
            $this->data['horarios'] = $this->horario_model
                    ->where('Turma_idTurma', $filtro_turma)
                    ->with_turma('fields:nomeTurma')
                    ->paginate(10, $total_horarios, $pagina);
        } else {
            $this->data['filtro_turma'] = '';
            $total_horarios = $this->horario_model
                    ->count();
            $this->data['horarios'] = $this->horario_model
                    ->with_turma()
                    ->paginate(10, $total_horarios, $pagina);
        }
    }

    function edit($id = 0) {
        $this->data['artesMarciais'] = $this->dojo_model->as_dropdown('nomeArtemarcial')->get_all();
        $this->data['academias'] = $this->academia_model->as_dropdown('nomeAcademia')->get_all();
        $this->data['horario'] = $this->horario_model->as_array()->get($id);
        if (count($this->input->post()) == 0) {
            $this->load->view('HorarioEdit_view', $this->data);
        } else {
            $horario = $this->input->post();
            $this->form_validation->set_rules($this->horario_model->rules);
            if ($this->form_validation->run() == TRUE) {
                $resultado = $this->horario_model->update($horario, $this->input->post('idHorario'));
                $this->session->set_flashdata('message', 'Horario "' . $this->input->post('nomeHorario') . '" editado com sucesso');
                $this->session->set_flashdata('type_message', '1'); //Sucesso
                redirect('/Horario');
            } else {
                $this->data['horario'] = $horario;
                $this->load->view('HorarioEdit_view', $this->data);
            }
        }
    }

    function add() {
        $this->data['turmas'] = $this->turma_model->as_dropdown('nomeTurma')->get_all();
        //Insere o primeiro item
        $this->data['turmas'] = array('0' => 'Turmal') + $this->data['turmas'];
        $this->data['diasSemana'] = array('0' => '') + $this->diaSemana_model->get_diasSemana();
        if (count($this->input->post()) == 0) {
            $this->load->view('HorarioAdd_view', $this->data);
        } else {
            $resultado = $this->horario_model->from_form()->insert();
            if ($resultado) {
                $this->session->set_flashdata('message', 'Horario cadastrado com sucesso');
                $this->session->set_flashdata('type_message', '1'); //Sucesso
                redirect('/Horario');
            } else {
                $this->data['horario'] = $this->input->post();
                $this->load->view('HorarioAdd_view', $this->data);
            }
        }
    }

    function delete($id = null) {
        if (isset($id)) {
            $horario = $this->horario_model->fields('nomeHorario')->get($id);
            if ($this->horario_model->delete($id)) {
                $this->session->set_flashdata('message', 'Horario "' . $horario->nomeHorario . '" deletado com sucesso');
                $this->session->set_flashdata('type_message', '1'); //Sucesso
            } else {
                $this->session->set_flashdata('message', 'Horario "' . $horario->nomeHorario . '" não pôde ser deletado');
                $this->session->set_flashdata('type_message', '0'); //Erro
            }
            redirect('/Horario');
        }
    }

}
