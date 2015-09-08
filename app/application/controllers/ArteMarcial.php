<?php

class ArteMarcial extends CI_Controller {

    public $data = array();

    function __construct() {
        parent::__construct();
        $this->load->model('artemarcial_model');
        $this->data['titulo'] = "OpenDojo";
        $this->data['cabecalho'] = "Arte Marcial";
        $this->form_validation->set_error_delimiters('<div class="col-xs-5 messageContainer help-block">', '</div>');
    }

    function index($pagina = 1) {
        $this->data['cabecalho'] = "Artes Marciais";
        $this->filtrar($this->input->post('filtro_nomeArteMarcial'), $pagina);
        $this->data['all_pages'] = $this->artemarcial_model->all_pages;
        $this->load->view('ArteMarcialList_view', $this->data);
    }

    private function filtrar($filtro_nomeArteMarcial, $pagina) {
        if ($filtro_nomeArteMarcial <> '') {
            $this->data['filtro_nomeArteMarcial'] = $filtro_nomeArteMarcial;
            $filtro_nomeArteMarcial= strtoupper($filtro_nomeArteMarcial);
            $total_artesmarciais = $this->artemarcial_model
                    ->where('UPPER(nomeArteMarcial)', 'like', $filtro_nomeArteMarcial)
                    ->count();
            $this->data['artesmarciais'] = $this->artemarcial_model
                    ->with_graduacoes('fields:*count*')
                    ->with_dojos('fields:*count*')
                    ->where('UPPER(nomeArteMarcial)', 'like', $filtro_nomeArteMarcial)
                    ->paginate(10, $total_artesmarciais, $pagina);
        } else {
            $this->data['filtro_nomeArteMarcial'] = '';
            $total_artesmarciais = $this->artemarcial_model->count();
            $this->data['artesmarciais'] = $this->artemarcial_model
                    ->with_graduacoes('fields:*count*')
                    ->with_dojos('fields:*count*')
                    ->paginate(10, $total_artesmarciais, $pagina);
        }
    }

    function edit($id = 0) {
        $this->data['artemarcial'] = $this->artemarcial_model->as_array()->get($id);
        if (count($this->input->post()) == 0) {
            $this->load->view('ArteMarcialEdit_view', $this->data);
        } else {
            $artemarcial = $this->input->post();
            $this->form_validation->set_rules($this->artemarcial_model->rules);
            if ($this->form_validation->run() == TRUE) {
                $resultado = $this->artemarcial_model->update($artemarcial, $this->input->post('idArteMarcial'));
                $this->session->set_flashdata('message', 'Arte marcial "' . $this->input->post('nomeArteMarcial') . '" editada com sucesso');
                $this->session->set_flashdata('type_message', '1'); //Sucesso
                redirect('/ArteMarcial');
            } else {
                $this->data['artemarcial'] = $artemarcial;
                $this->load->view('ArteMarcialEdit_view', $this->data);
            }
        }
    }

    function add() {
        if (count($this->input->post()) == 0) {
            $this->load->view('ArteMarcialAdd_view', $this->data);
        } else {
            $resultado = $this->artemarcial_model->from_form()->insert();
            if ($resultado) {
                $this->session->set_flashdata('message', 'Arte marcial "' . $this->input->post('nomeArteMarcial') . '" cadastrada com sucesso');
                $this->session->set_flashdata('type_message', '1'); //Sucesso
                redirect('/ArteMarcial');
            } else {
                $this->data['artemarcial'] = $this->input->post();
                $this->load->view('ArteMarcialAdd_view', $this->data);
            }
        }
    }

    function delete($id = null) {
        if (isset($id)) {
            $artemarcial = $this->artemarcial_model->fields('nomeArteMarcial')->get($id);
            if ($this->artemarcial_model->delete($id)) {
                $this->session->set_flashdata('message', 'Arte marcial "' . $artemarcial->nomeArteMarcial . '" deletada com sucesso');
                $this->session->set_flashdata('type_message', '1'); //Sucesso
            } else {
                $this->session->set_flashdata('message', 'Arte marcial "' . $artemarcial->nomeArteMarcial . '" não pôde ser deletada');
                $this->session->set_flashdata('type_message', '0'); //Erro
            }
            redirect('/ArteMarcial');
        }
    }

}
