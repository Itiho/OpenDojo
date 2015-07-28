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
        array_unshift($this->data['artesMarciais'], 'Arte Marcial');
        $this->data['academias'] = $this->academia_model->as_dropdown('nomeAcademia')->get_all();
        //Insere o primeiro item       
        array_unshift($this->data['academias'], 'Academia');
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
                            ->with_artemarcial()
                            ->with_academia()
                            ->with_turmas()
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
                            ->with_artemarcial()
                            ->with_academia()
                            ->with_turmas()
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
                            ->with_artemarcial()
                            ->with_academia()
                            ->with_turmas()
                            ->paginate(10, $total_dojos, $pagina);
                } else {
                    $this->data['filtro_academia'] = '';
                    $total_dojos = $this->dojo_model
                            ->where('nomeDojo', 'like', $filtro_nomeDojo)
                            ->count();
                    $this->data['dojos'] = $this->dojo_model
                            ->where('nomeDojo', 'like', $filtro_nomeDojo)
                            ->with_artemarcial()
                            ->with_academia()
                            ->with_turmas()
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
                            ->with_artemarcial()
                            ->with_academia()
                            ->with_turmas()
                            ->paginate(10, $total_dojos, $pagina);
                } else {
                    $this->data['filtro_academia'] = '';
                    $total_dojos = $this->dojo_model
                            ->where('ArteMarcial_idArte_Marcial', $filtro_arteMarcial)
                            ->count();
                    $this->data['dojos'] = $this->dojo_model
                            ->where('ArteMarcial_idArte_Marcial', $filtro_arteMarcial)
                            ->with_artemarcial()
                            ->with_academia()
                            ->with_turmas()
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
                            ->with_artemarcial()
                            ->with_academia()
                            ->with_turmas()
                            ->paginate(10, $total_dojos, $pagina);
                } else {
                    $this->data['filtro_academia'] = '';
                    $total_dojos = $this->dojo_model
                            ->count();
                    $this->data['dojos'] = $this->dojo_model
                            ->with_artemarcial()
                            ->with_academia()
                            ->with_turmas()
                            ->paginate(10, $total_dojos, $pagina);
                }
            }
        }
    }

    function edit($id = 0) {
//        $this->data['cabecalho'] = "Arte Marcial";
        if ($id > 0) {
            $this->load->library('form_validation');
            $artemarcial = $this->artemarcial_model->get($id);
            $this->data['artemarcial'] = objectToArray($artemarcial);
            if (count($this->input->post()) == 0) {
                $this->load->view('DojoEdit_view', $this->data);
            } else {
                $artemarcial = array('nomeArteMarcial' => $this->input->post('nomeArteMarcial'));
//                Alterar para from_form depois
                
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
                    redirect('/Dojo');
                } else {
                    $this->data['idArteMarcial'] = $this->input->post('idArteMarcial');
                    $this->data['nomeArteMarcial'] = $this->input->post('nomeArteMarcial');
                    $this->load->view('DojoEdit_view', $this->data);
                }
            }
        } else {
            redirect('/ArteMarcial');
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
            var_dump($resultado);
            if ($resultado) {
                $this->session->set_flashdata('message', 'Dojo "' . $this->input->post('nomeDojo') . '" cadastrado com sucesso');
                $this->session->set_flashdata('type_message', '1'); //Sucesso
                redirect('/Dojo');
            } else {
                $this->data['nomeDojo_value'] = $this->input->post('nomeDojo');
                $this->data['academia_value'] = $this->input->post('Academia_idAcademia');
                $this->data['artemarcial_value'] = $this->input->post('ArteMarcial_idArte_Marcial');
                $this->load->view('DojoAdd_view', $this->data);
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
