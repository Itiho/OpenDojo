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
        if ($this->input->post('filtro_nomeArteMarcial') <> '') {
            $this->data['filtro_nomeArteMarcial'] = $this->input->post('filtro_nomeArteMarcial');
            $total_artesmarciais = $this->artemarcial_model
                    ->where('nomeArteMarcial', 'like', $this->input->post('filtro_nomeArteMarcial'))
                    ->count();
            $this->data['artesmarciais'] = $this->artemarcial_model
                    ->with_graduacoes()
                    ->with_dojos()
                    ->where('nomeArteMarcial', 'like', $this->input->post('filtro_nomeArteMarcial'))
                    ->paginate(10, $total_graduacoes, $pagina);
        } else {
            $this->data['filtro_nomeArteMarcial'] = '';
            $total_graduacoes = $this->artemarcial_model->count();
            $this->data['artesmarciais'] = $this->artemarcial_model
                    ->with_graduacoes()
                    ->with_dojos()
                    ->paginate(10, $total_graduacoes, $pagina);
        }
        $this->data['all_pages'] = $this->artemarcial_model->all_pages;
        $this->load->view('ArteMarcialList_view', $this->data);
    }

    function edit($id = 0) {
//        $this->data['cabecalho'] = "Arte Marcial";
        if ($id > 0) {
            $this->load->library('form_validation');
            $artemarcial = $this->artemarcial_model->get($id);
            $this->data['artemarcial'] = objectToArray($artemarcial);
            if (count($this->input->post()) == 0) {
                $this->load->view('ArteMarcialEdit_view', $this->data);
            } else {
                $artemarcial = array('nomeArteMarcial' => $this->input->post('nomeArteMarcial'));
                $rules = array(
                    array(
                        'field' => 'nomeArteMarcial',
                        'label' => 'Nome',
                        'rules' => 'required|min_length[3]'));
                $this->form_validation->set_rules($rules);
                if ($this->form_validation->run() == TRUE) {
                    $resultado = $this->artemarcial_model->update($artemarcial, $this->input->post('idArteMarcial'));
                    $this->session->set_flashdata('message', 'Arte marcial "' . $this->input->post('nomeArteMarcial') . '" editada com sucesso');
                    $this->session->set_flashdata('type_message', '1'); //Sucesso
                    redirect('/ArteMarcial');
                } else {
                    $this->data['idArteMarcial'] = $this->input->post('idArteMarcial');
                    $this->data['nomeArteMarcial'] = $this->input->post('nomeArteMarcial');
                    $this->load->view('ArteMarcialEdit_view', $this->data);
                }
            }
        } else {
            redirect('/ArteMarcial');
        }
    }

    function add() {
//        $this->data['cabecalho'] = "Arte Marcial";
        if (count($this->input->post()) == 0) {
            $this->load->view('ArteMarcialAdd_view', $this->data);
        } else {
            $artemarcial = array('nomeArteMarcial' => $this->input->post('nomeArteMarcial'));
            $resultado = $this->artemarcial_model->from_form()->insert();
            if ($resultado) {
                $this->session->set_flashdata('message', 'Arte marcial "' . $this->input->post('nomeArteMarcial') . '" cadastrada com sucesso');
                $this->session->set_flashdata('type_message', '1'); //Sucesso
                redirect('/ArteMarcial');
            } else {
                $this->data['nomeArteMarcial'] = $this->input->post('nomeArteMarcial');
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
