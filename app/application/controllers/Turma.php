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
        array_unshift($this->data['dojos'], 'Dojo');
        $this->data['artesmarciais'] = $this->artemarcial_model->as_dropdown('nomeArteMarcial')->get_all();
        //Insere o primeiro item       
        array_unshift($this->data['artesmarciais'], 'Arte Marcial');
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
                        ->with_dojos()
                        ->paginate(10, $total_turmas, $pagina);
            } else {
                $this->data['filtro_arteMarcial'] = '';
                $total_turmas = $this->turma_model
                        ->where('idDojo', $filtro_dojo)
                        ->count();
                $this->data['turmas'] = $this->dojo_model
                        ->where('idDojo', $filtro_dojo)
                        ->with_artemarcial()
                        ->with_dojos()
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
                        ->with_dojos()
                        ->paginate(10, $total_turmas, $pagina);
            } else {
                $this->data['filtro_arteMarcial'] = '';
                $total_turmas = $this->turma_model
                        ->count();
                $this->data['turmas'] = $this->turma_model
                        ->with_dojos()
                        ->paginate(10, $total_turmas, $pagina);
            }
        }
    }

    function edit($id = 0) {
        $this->data['artesMarciais'] = $this->artemarcial_model->as_dropdown('nomeArtemarcial')->get_all();
        $this->data['academias'] = $this->academia_model->as_dropdown('nomeAcademia')->get_all();
        $this->data['dojo'] = $this->dojo_model->as_array()->get($id);
        if (count($this->input->post()) == 0) {
            $this->load->view('DojoEdit_view', $this->data);
        } else {
            $dojo = $this->input->post();
            $this->form_validation->set_rules($this->dojo_model->rules);
            if ($this->form_validation->run() == TRUE) {
                $resultado = $this->dojo_model->update($dojo, $this->input->post('idDojo'));
                $this->session->set_flashdata('message', 'Dojo "' . $this->input->post('nomeDojo') . '" editado com sucesso');
                $this->session->set_flashdata('type_message', '1'); //Sucesso
                redirect('/Dojo');
            } else {
                $this->data['dojo'] = $dojo;
                $this->load->view('DojoEdit_view', $this->data);
            }
        }
    }

    function add() {
        $this->data['artesMarciais'] = $this->artemarcial_model->as_dropdown('nomeArtemarcial')->get_all();
//Insere o primeiro item       
        array_unshift($this->data['artesMarciais'], 'Arte Marcial');
        $this->data['academias'] = $this->academia_model->as_dropdown('nomeAcademia')->get_all();
//Insere o primeiro item       
        array_unshift($this->data['academias'], 'Academia');
        if (count($this->input->post()) == 0) {
            $this->load->view('DojoAdd_view', $this->data);
        } else {
            $resultado = $this->dojo_model->from_form()->insert();
            if ($resultado) {
                $this->session->set_flashdata('message', 'Dojo "' . $this->input->post('nomeDojo') . '" cadastrado com sucesso');
                $this->session->set_flashdata('type_message', '1'); //Sucesso
                redirect('/Dojo');
            } else {
                $this->data['dojo'] = $this->input->post();
                $this->load->view('DojoAdd_view', $this->data);
            }
        }
    }

    function delete($id = null) {
        if (isset($id)) {
            $dojo = $this->dojo_model->fields('nomeDojo')->get($id);
            if ($this->dojo_model->delete($id)) {
                $this->session->set_flashdata('message', 'Dojo "' . $dojo->nomeDojo . '" deletado com sucesso');
                $this->session->set_flashdata('type_message', '1'); //Sucesso
            } else {
                $this->session->set_flashdata('message', 'Dojo "' . $dojo->nomeDojo . '" não pôde ser deletada');
                $this->session->set_flashdata('type_message', '0'); //Erro
            }
            redirect('/Dojo');
        }
    }

}
