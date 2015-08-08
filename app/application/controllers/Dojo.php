<?php

class Dojo extends CI_Controller {

    public $data = array();

    function __construct() {
        parent::__construct();
        $this->load->model('dojo_model');
        $this->load->model('artemarcial_model');
        $this->load->model('academia_model');
        $this->data['titulo'] = 'OpenDojo';
        $this->data['cabecalho'] = 'Dojo';
        $this->form_validation->set_error_delimiters('<div class="col-xs-5 messageContainer help-block">', '</div>');
    }

    function index($pagina = 1) {
        $this->filtrar($this->input->post('filtro_academia'), $this->input->post('filtro_arteMarcial'), $this->input->post('filtro_nomeDojo'), $pagina);
        $this->data['all_pages'] = $this->artemarcial_model->all_pages;
        $this->data['artesMarciais'] = $this->artemarcial_model->as_dropdown('nomeArteMarcial')->get_all();
        //Insere o primeiro item
        $this->data['artesMarciais'] = array('0' => 'Arte Marcial') + $this->data['artesMarciais'];
        $this->data['academias'] = $this->academia_model->as_dropdown('nomeAcademia')->get_all();
        //Insere o primeiro item
        $this->data['academias'] = array('0' => 'Academia') + $this->data['academias'];
        $this->load->view('DojoList_view', $this->data);
    }

    private function filtrar($filtro_academia, $filtro_arteMarcial, $filtro_nomeDojo, $pagina) {
        if ($filtro_nomeDojo <> '') {
            $this->data['filtro_nomeDojo'] = $filtro_nomeDojo;

            if ($filtro_arteMarcial > 0) {
                $this->data['filtro_arteMarcial'] = $filtro_arteMarcial;

                if ($filtro_academia > 0) {
                    $this->data['filtro_academia'] = $filtro_academia;
                    $total_dojos = $this->dojo_model
                            ->where('nomeDojo', 'like', $filtro_nomeDojo)
                            ->where('ArteMarcial_idArte_Marcial', $filtro_arteMarcial)
                            ->where('Academia_idAcademia', $filtro_academia)
                            ->count();
                    $this->data['dojos'] = $this->dojo_model
                            ->where('nomeDojo', 'like', $filtro_nomeDojo)
                            ->where('ArteMarcial_idArte_Marcial', $filtro_arteMarcial)
                            ->where('Academia_idAcademia', $filtro_academia)
                            ->with_artemarcial('fields:nomeArteMarcial')
                            ->with_academia('fields:nomeAcademia')
                            ->with_turmas('fields:*count*')
                            ->paginate(10, $total_dojos, $pagina);
                } else {
                    $this->data['filtro_academia'] = '';
                    $total_dojos = $this->dojo_model
                            ->where('nomeDojo', 'like', $filtro_nomeDojo)
                            ->where('ArteMarcial_idArte_Marcial', $filtro_arteMarcial)
                            ->count();
                    $this->data['dojos'] = $this->dojo_model
                            ->where('nomeDojo', 'like', $filtro_nomeDojo)
                            ->where('ArteMarcial_idArte_Marcial', $filtro_arteMarcial)
                            ->with_artemarcial('fields:nomeArteMarcial')
                            ->with_academia('fields:nomeAcademia')
                            ->with_turmas('fields:*count*')
                            ->paginate(10, $total_dojos, $pagina);
                }
            } else {
                $this->data['filtro_arteMarcial'] = '';
                if ($filtro_academia > 0) {
                    $this->data['filtro_academia'] = $filtro_academia;
                    $total_dojos = $this->dojo_model
                            ->where('nomeDojo', 'like', $filtro_nomeDojo)
                            ->where('Academia_idAcademia', $filtro_academia)
                            ->count();
                    $this->data['dojos'] = $this->dojo_model
                            ->where('nomeDojo', 'like', $filtro_nomeDojo)
                            ->where('Academia_idAcademia', $filtro_academia)
                            ->with_artemarcial('fields:nomeArteMarcial')
                            ->with_academia('fields:nomeAcademia')
                            ->with_turmas('fields:*count*')
                            ->paginate(10, $total_dojos, $pagina);
                } else {
                    $this->data['filtro_academia'] = '';
                    $total_dojos = $this->dojo_model
                            ->where('nomeDojo', 'like', $filtro_nomeDojo)
                            ->count();
                    $this->data['dojos'] = $this->dojo_model
                            ->where('nomeDojo', 'like', $filtro_nomeDojo)
                            ->with_artemarcial('fields:nomeArteMarcial')
                            ->with_academia('fields:nomeAcademia')
                            ->with_turmas('fields:*count*')
                            ->paginate(10, $total_dojos, $pagina);
                }
            }
        } else {
            $this->data['filtro_nomeDojo'] = '';
            if ($filtro_arteMarcial > 0) {
                $this->data['filtro_arteMarcial'] = $filtro_arteMarcial;

                if ($filtro_academia > 0) {
                    $this->data['filtro_academia'] = $filtro_academia;
                    $total_dojos = $this->dojo_model
                            ->where('ArteMarcial_idArte_Marcial', $filtro_arteMarcial)
                            ->where('Academia_idAcademia', $filtro_academia)
                            ->count();
                    $this->data['dojos'] = $this->dojo_model
                            ->where('ArteMarcial_idArte_Marcial', $filtro_arteMarcial)
                            ->where('Academia_idAcademia', $filtro_academia)
                            ->with_artemarcial('fields:nomeArteMarcial')
                            ->with_academia('fields:nomeAcademia')
                            ->with_turmas('fields:*count*')
                            ->paginate(10, $total_dojos, $pagina);
                } else {
                    $this->data['filtro_academia'] = '';
                    $total_dojos = $this->dojo_model
                            ->where('ArteMarcial_idArte_Marcial', $filtro_arteMarcial)
                            ->count();
                    $this->data['dojos'] = $this->dojo_model
                            ->where('ArteMarcial_idArte_Marcial', $filtro_arteMarcial)
                            ->with_artemarcial('fields:nomeArteMarcial')
                            ->with_academia('fields:nomeAcademia')
                            ->with_turmas('fields:*count*')
                            ->paginate(10, $total_dojos, $pagina);
                }
            } else {
                $this->data['filtro_arteMarcial'] = '';
                if ($filtro_academia > 0) {
                    $this->data['filtro_academia'] = $filtro_academia;
                    $total_dojos = $this->dojo_model
                            ->where('Academia_idAcademia', $filtro_academia)
                            ->count();
                    $this->data['dojos'] = $this->dojo_model
                            ->where('Academia_idAcademia', $filtro_academia)
                            ->with_artemarcial('fields:nomeArteMarcial')
                            ->with_academia('fields:nomeAcademia')
                            ->with_turmas('fields:*count*')
                            ->paginate(10, $total_dojos, $pagina);
                } else {
                    $this->data['filtro_academia'] = '';
                    $total_dojos = $this->dojo_model
                            ->count();
                    $this->data['dojos'] = $this->dojo_model
                            ->with_artemarcial('fields:nomeArteMarcial')
                            ->with_academia('fields:nomeAcademia')
                            ->with_turmas('fields:*count*')
                            ->paginate(10, $total_dojos, $pagina);
                }
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
            $this->data['artesMarciais'] = array('0' => 'Arte Marcial') + $this->data['artesMarciais'];
            $this->data['academias'] = $this->academia_model->as_dropdown('nomeAcademia')->get_all();
            //Insere o primeiro item
            $this->data['academias'] = array('0' => 'Academia') + $this->data['academias'];
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
                    $this->session->set_flashdata('message', 'Dojo "' . $dojo->nomeDojo . '" não pôde ser deletado');
                    $this->session->set_flashdata('type_message', '0'); //Erro
                }
                redirect('/Dojo');
            }
        }

    }
    