<?php

class Turma extends CI_Controller {

    public $data = array();

    function __construct() {
        parent::__construct();
        $this->load->model('dojo_model');
        $this->load->model('turma_model');
        $this->load->model('artemarcial_model');
        $this->data['titulo'] = 'OpenDojo';
        $this->data['cabecalho'] = 'Turma';
        $this->form_validation->set_error_delimiters('<div class="col-xs-5 messageContainer help-block">', '</div>');
    }

    function index($pagina = 1) {
        $this->filtrar($this->input->post('filtro_arteMarcial'), $this->input->post('filtro_dojo'), $pagina);
        $this->data['all_pages'] = $this->turma_model->all_pages;
        $this->data['dojos'] = $this->dojo_model->as_dropdown('nomeDojo')->get_all();
        //Insere o primeiro item 
        $this->data['dojos'] = array('0' => 'Dojo') + $this->data['dojos'];
        $this->data['artesmarciais'] = $this->artemarcial_model->as_dropdown('nomeArteMarcial')->get_all();
        //Insere o primeiro item       
        $this->data['artesmarciais'] = array('0' => 'Arte Marcial') + $this->data['artesmarciais'];
        $this->load->view('TurmaList_view', $this->data);
    }

    private function filtrar($filtro_arteMarcial, $filtro_dojo, $pagina) {
        if ($filtro_dojo > 0) {
            $this->data['filtro_dojo'] = $filtro_dojo;

            if ($filtro_arteMarcial > 0) {
                $this->data['filtro_arteMarcial'] = $filtro_arteMarcial;
                $total_turmas = $this->turma_model
                        ->where('idDojo', $filtro_dojo)
                        ->where('ArteMarcial_idArte_Marcial', $filtro_arteMarcial)
                        ->count();
                $this->data['turmas'] = $this->turma_model
                        ->where('idDojo', $filtro_dojo)
                        ->where('ArteMarcial_idArte_Marcial', $filtro_arteMarcial)
                        ->with_dojo()
                        ->with_horarios('fields:*count*')
                        ->paginate(10, $total_turmas, $pagina);
            } else {
                $this->data['filtro_arteMarcial'] = '';
                $total_turmas = $this->turma_model
                        ->where('idDojo', $filtro_dojo)
                        ->count();
                $this->data['turmas'] = $this->dojo_model
                        ->where('idDojo', $filtro_dojo)
                        ->with_artemarcial()
                        ->with_dojo()
                        ->with_horarios('fields:*count*')
                        ->paginate(10, $total_turmas, $pagina);
            }
        } else {
            $this->data['filtro_dojo'] = '';
            if ($filtro_arteMarcial > 0) {
                $this->data['filtro_arteMarcial'] = $filtro_arteMarcial;


                $total_turmas = $this->turma_model
                        ->where('ArteMarcial_idArte_Marcial', $filtro_arteMarcial)
                        ->count();
                $this->data['turmas'] = $this->dojo_model
                        ->where('ArteMarcial_idArte_Marcial', $filtro_arteMarcial)
                        ->with_dojo()
                        ->with_horarios('fields:*count*')
                        ->paginate(10, $total_turmas, $pagina);
            } else {
                $this->data['filtro_arteMarcial'] = '';
                $total_turmas = $this->turma_model
                        ->count();
                $this->data['turmas'] = $this->turma_model
                        ->with_dojo()
                        ->with_horarios('fields:*count*')
                        ->paginate(10, $total_turmas, $pagina);
            }
        }
    }

    function edit($id = 0) {
        $this->load->model('dojo_model');
        $this->data['dojos'] = $this->dojo_model->as_dropdown('nomeDojo')->get_all();
        $this->data['options_active'] = array(
                '1' => 'Ativo',
                '2' => 'Inativo');
        $this->data['turma'] = $this->turma_model->as_array()->get($id);
        if (count($this->input->post()) == 0) {
            $this->load->view('TurmaEdit_view', $this->data);
        } else {
            $turma = $this->input->post();
            $this->form_validation->set_rules($this->turma_model->rules);
            if ($this->form_validation->run() == TRUE) {
                $resultado = $this->turma_model->update($turma, $this->input->post('idTurma'));
                $this->session->set_flashdata('message', 'Turma "' . $this->input->post('nomeTurma') . '" editada com sucesso');
                $this->session->set_flashdata('type_message', '1'); //Sucesso
                redirect('/Turma');
            } else {
                $this->data['turma'] = $turma;
                $this->load->view('TurmaEdit_view', $this->data);
            }
        }
    }

    function add() {
        $this->load->model('dojo_model');
        $this->data['dojos'] = $this->dojo_model->as_dropdown('nomeDojo')->get_all();
        //Insere o primeiro item
        $this->data['dojos'] = array('0' => 'Selecione um Dojo') + $this->data['dojos'];
        $this->data['options_active'] = array(
                '1' => 'Ativo',
                '2' => 'Inativo');
        if (count($this->input->post()) == 0) {
            $this->load->view('TurmaAdd_view', $this->data);
        } else {
            $resultado = $this->turma_model->from_form()->insert();
            if ($resultado) {
                $this->session->set_flashdata('message', 'Turma "' . $this->input->post('nomeTurma') . '" cadastrada com sucesso');
                $this->session->set_flashdata('type_message', '1'); //Sucesso
                redirect('/Turma');
            } else {
                $this->data['turma'] = $this->input->post();
                $this->load->view('TurmaAdd_view', $this->data);
            }
        }
    }

    function delete($id = null) {
        if (isset($id)) {
            $turma = $this->turma_model->fields('nomeTurma')->get($id);
            if ($this->turma_model->delete($id)) {
                $this->session->set_flashdata('message', 'Dojo "' . $turma->nomeTurma . '" deletada com sucesso');
                $this->session->set_flashdata('type_message', '1'); //Sucesso
            } else {
                $this->session->set_flashdata('message', 'Dojo "' . $turma->nomeTurma . '" não pôde ser deletada');
                $this->session->set_flashdata('type_message', '0'); //Erro
            }
            redirect('/Turma');
        }
    }

}
