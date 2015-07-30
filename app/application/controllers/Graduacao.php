<?php

class Graduacao extends CI_Controller {

    public $data = array();

    function __construct() {
        parent::__construct();
        $this->load->model('graduacao_model');
        $this->load->model('artemarcial_model');
        $this->data['titulo'] = "OpenDojo";
        $this->data['cabecalho'] = "Graduações";
        $this->form_validation->set_error_delimiters('<div class="col-xs-5 messageContainer help-block">', '</div>');
    }

    function index($pagina = 1) {
        $this->filtrar($this->input->post('filtro_arteMarcial'), $this->input->post('filtro_nomeGraduacao'), $pagina);
        $this->data['all_pages'] = $this->graduacao_model->all_pages;
        $this->data['artesMarciais'] = $this->artemarcial_model->as_dropdown('nomeArteMarcial')->get_all('nomeArteMarcial');
        //Insere o primeiro item       
        array_unshift($this->data['artesMarciais'], '');
        $this->load->view('GraduacaoList_view', $this->data);
    }

    private function filtrar($filtro_arteMarcial, $filtro_nomeGraduacao, $pagina) {
        if ($filtro_nomeGraduacao <> '') {
            $this->data['filtro_nomeGraduacao'] = $filtro_nomeGraduacao;

            if ($filtro_arteMarcial > 0) {
                $this->data['filtro_arteMarcial'] = $filtro_arteMarcial;
                $total_graduacoes = $this->graduacao_model
                        ->where('nomeGraduacao', 'like', $filtro_nomeGraduacao)
                        ->where('arteMarcial', $filtro_arteMarcial)
                        ->count();
                $this->data['graduacoes'] = $this->graduacao_model
                        ->where('nomeGraduacao', 'like', $filtro_nomeGraduacao)
                        ->where('arteMarcial', $filtro_arteMarcial)
                        ->with_arteMarcial()
                        ->paginate(10, $total_graduacoes, $pagina);
            } else {
                $this->data['filtro_arteMarcial'] = '';
                $total_graduacoes = $this->graduacao_model
                        ->where('nomeGraduacao', 'like', $filtro_nomeGraduacao)
                        ->count();
                $this->data['graduacoes'] = $this->graduacao_model
                        ->where('nomeGraduacao', 'like', $filtro_nomeGraduacao)
                        ->with_arteMarcial()
                        ->paginate(10, $total_graduacoes, $pagina);
            }
        } else {
            $this->data['filtro_nomeGraduacao'] = '';
            if ($filtro_arteMarcial > 0) {
                $this->data['filtro_arteMarcial'] = $filtro_arteMarcial;
                $total_graduacoes = $this->graduacao_model
                        ->where('arteMarcial', $filtro_arteMarcial)
                        ->count();
                $this->data['graduacoes'] = $this->graduacao_model
                        ->where('arteMarcial', $filtro_arteMarcial)
                        ->with_arteMarcial()
                        ->paginate(10, $total_graduacoes, $pagina);
            } else {
                $this->data['filtro_arteMarcial'] = '';
                $total_graduacoes = $this->graduacao_model->count();
                $this->data['graduacoes'] = $this->graduacao_model
                        ->with_arteMarcial()
                        ->paginate(10, $total_graduacoes, $pagina);
            }
        }
    }

    function edit($id = 0) {
        $this->load->library('form_validation');
        $this->data['graduacao'] = $this->graduacao_model->as_array()->get($id);
        $this->data['artesMarciais'] = $this->artemarcial_model->as_dropdown('nomeArteMarcial')->get_all();
        if (count($this->input->post()) == 0) {
            $this->load->view('GraduacaoEdit_view', $this->data);
        } else {
            $graduacao = $this->input->post();
            $this->form_validation->set_rules($this->graduacao_model->rules);
            if ($this->form_validation->run() == TRUE) {
                $resultado = $this->graduacao_model->update($graduacao, $this->input->post('idGraduacao'));
                $this->session->set_flashdata('message', 'Graduação "' . $this->input->post('nomeGraduacao') . '" editada com sucesso');
                $this->session->set_flashdata('type_message', '1'); //Sucesso
                redirect('/Graduacao');
            } else {
                $this->data['graduacao'] = $this->input->post();
                $this->load->view('GraduacaoEdit_view', $this->data);
            }
        }
    }

    function add() {
        $this->data['artesMarciais'] = $this->artemarcial_model->as_dropdown('nomeArteMarcial')->get_all();
        //Adiciona um item vazio no início
        array_unshift($this->data['artesMarciais'], '');

        if (count($this->input->post()) == 0) {
            $this->load->view('GraduacaoAdd_view', $this->data);
        } else {
            $resultado = $this->graduacao_model->from_form()->insert();
            if ($resultado) {
                $this->session->set_flashdata('message', 'Graduação "' . $this->input->post('nomeGraduacao') . '" cadastrada com sucesso');
                $this->session->set_flashdata('type_message', '1'); //Sucesso
                redirect('/Graduacao');
            } else {
                $this->data['graduacao'] = $this->input->post();
                $this->load->view('GraduacaoAdd_view', $this->data);
            }
        }
    }

    function delete($id = null) {
        if (isset($id)) {
            $graduacao = $this->graduacao_model->fields('nomeGraduacao')->get($id);
            if ($this->graduacao_model->delete($id)) {
                $this->session->set_flashdata('message', 'Graduação "' . $artemarcial->nomeGraduacao . '" deletada com sucesso');
                $this->session->set_flashdata('type_message', '1'); //Sucesso
            } else {
                $this->session->set_flashdata('message', 'Graduação "' . $artemarcial->nomeGraduacao . '" não pôde ser deletada');
                $this->session->set_flashdata('type_message', '0'); //Erro
            }
            redirect('/Graduacao');
        }
    }

}
