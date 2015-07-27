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
        if ($this->input->post('filtro_nomeGraduacao') <> '') {
            $this->data['filtro_nomeGraduacao'] = $this->input->post('filtro_nomeGraduacao');

            if ($this->input->post('filtro_arteMarcial') > 0) {
                $this->data['filtro_arteMarcial'] = $this->input->post('filtro_arteMarcial');
                $total_graduacoes = $this->graduacao_model
                        ->where('nomeGraduacao', 'like', $this->input->post('filtro_nomeGraduacao'))
                        ->where('arteMarcial', $this->input->post('filtro_arteMarcial'))
                        ->count();
                $this->data['graduacoes'] = $this->graduacao_model
                        ->where('nomeGraduacao', 'like', $this->input->post('filtro_nomeGraduacao'))
                        ->where('arteMarcial', $this->input->post('filtro_arteMarcial'))
                        ->with_arteMarcial_fk()
                        ->paginate(10, $total_graduacoes, $pagina);
            } else {
                $this->data['filtro_arteMarcial'] = '';
                $total_graduacoes = $this->graduacao_model
                        ->where('nomeGraduacao', 'like', $this->input->post('filtro_nomeGraduacao'))
                        ->count();
                $this->data['graduacoes'] = $this->graduacao_model
                        ->where('nomeGraduacao', 'like', $this->input->post('filtro_nomeGraduacao'))
                        ->with_arteMarcial_fk()
                        ->paginate(10, $total_graduacoes, $pagina);
            }
        } else {
            $this->data['filtro_nomeGraduacao'] = '';
            if ($this->input->post('filtro_arteMarcial') > 0) {
                $this->data['filtro_arteMarcial'] = $this->input->post('filtro_arteMarcial');
                $total_graduacoes = $this->graduacao_model
                        ->where('arteMarcial', $this->input->post('filtro_arteMarcial'))
                        ->count();
                $this->data['graduacoes'] = $this->graduacao_model
                        ->where('arteMarcial', $this->input->post('filtro_arteMarcial'))
                        ->with_arteMarcial_fk()
                        ->paginate(10, $total_graduacoes, $pagina);
            } else {
                $this->data['filtro_arteMarcial'] = '';
                $total_graduacoes = $this->graduacao_model->count();
                $this->data['graduacoes'] = $this->graduacao_model
                        ->with_arteMarcial_fk()
                        ->paginate(10, $total_graduacoes, $pagina);
            }
        }
        $this->data['all_pages'] = $this->graduacao_model->all_pages;
        $this->data['artesMarciais'] = $this->artemarcial_model->as_array()->get_all('nomeArteMarcial');
        //Insere o primeiro item       
        array_unshift($this->data['artesMarciais'], array('idArteMarcial' => '0', 'nomeArteMarcial' => 'Arte Marcial'));
        $this->load->view('GraduacaoList_view', $this->data);
    }

    function edit($id = 0) {
        $this->load->library('form_validation');
        $this->data['graduacao'] = $this->graduacao_model->as_array()->get($id);
        $this->data['artesMarciais'] = $this->artemarcial_model->as_dropdown('nomeArteMarcial')->get_all();
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
        $this->data['artesMarciais'] = $this->artemarcial_model->as_dropdown('nomeArteMarcial')->get_all();
        //Adiciona um item vazio no início
        array_unshift($this->data['artesMarciais'], '');

        if (count($this->input->post()) == 0) {
            $this->load->view('GraduacaoAdd_view', $this->data);
        } else {
            $graduacao = array(
                'nomeGraduacao' => $this->input->post('nomeGraduacao'),
                'arteMarcial' => $this->input->post('arteMarcial'));
            $resultado = $this->graduacao_model->from_form()->insert();
            if ($resultado) {
                $this->session->set_flashdata('message', 'Graduação "' . $this->input->post('nomeGraduacao') . '" cadastrada com sucesso');
                $this->session->set_flashdata('type_message', '1'); //Sucesso
                redirect('/Graduacao');
            } else {
                $this->data['nomeGraduacao_value'] = $this->input->post('nomeGraduacao');
                $this->data['arteMarcial_value'] = $this->input->post('arteMarcial');
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
