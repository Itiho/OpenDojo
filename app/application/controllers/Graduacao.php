<?php
class Graduacao extends CI_Controller
{
    public $data = array();

    function __construct() {
        parent::__construct();
        $this->load->model('graduacao_model');
        $this->load->model('artemarcial_model');
        $this->data['titulo'] = "OpenDojo";
        
    }

    function index() {
        $this->data['cabecalho'] = "Graduações";
        if ($this->input->post('nomeGraduacao') <> '') {
            $this->graduacao_model->_database->like('nomeGraduacao', $this->input->post('nomeGraduacao'));
            $this->data['filtro_nomeGraduacao'] = $this->input->post('nomeGraduacao');
        } else{
            $this->data['filtro_nomeGraduacao'] = '';
        }
        
        if ($this->input->post('arteMarcial') > 0) {
            $this->graduacao_model->_database->where('arteMarcial', $this->input->post('arteMarcial'));
            $this->data['filtro_arteMarcial'] = $this->input->post('arteMarcial');
        } else{
            $this->data['filtro_arteMarcial'] = '';
        }
        
        $this->data['graduacoes']= $this->graduacao_model->get_graduacoes();
        $this->data['artesMarciais'] = objectToArray($this->artemarcial_model->get_all());
        array_unshift($this->data['artesMarciais'],array('idArteMarcial'=> 0, 'nomeArteMarcial' => 'Arte marcial'));
        $this->load->view('GraduacaoList_view', $this->data);

    }

    function edit($id = 0){
        $this->data['cabecalho'] = "Graduação";
        
        if($id > 0){
            $graduacao = $this->graduacao_model->get($id);
            $this->data['graduacao'] = objectToArray($graduacao);
        } 
        $this->data['artesMarciais'] = objectToArray($this->artemarcial_model->get_all());
        
        $this->load->view('GraduacaoEdit_view', $this->data);        
    }
    
    function add() {

        $this->data['cabecalho'] = "Graduação";
        
        $this->data['artesMarciais'] = objectToArray($this->artemarcial_model->get_all());
        //Adiciona um item vazio no início
        array_unshift($this->data['artesMarciais'],array('idArteMarcial'=> 0, 'nomeArteMarcial' => ''));
        
        $this->load->view('GraduacaoAdd_view', $this->data);
    }

    function save() {
        $this->data['cabecalho'] = "Graduação";
        
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        //Validating Name Field
        $this->form_validation->set_rules('nomeArteMarcial', 'nomeArteMarcial', 'required|min_length[5]|max_length[25]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('GraduacaoAdd_view', $this->data);
        } else {
            $graduacao = new Graduacao_Model();
            $graduacao->set_nomeGraduacao($this->input->post('nomeGraduacao'));
            $graduacao->set_arteMarcial($this->input->post('arteMarcial'));

            //Se vier da tela de cadastro
            if ($this->input->post('idGraduacao') == NULL) {
                if ($this->graduacao_model->insert($graduacao)) {
                    $this->data['message'] = 'Graduação cadastrada com sucesso';
                    $this->data['type_message'] = '1'; //Sucesso
                } else {
                    $this->data['message'] = 'Erro no cadastro da Graduação';
                    $this->data['type_message'] = '0'; //Erro
                }
                $this->index();
            } else {
                //Se a tela vier do update
                $graduacao->set_idGraduacao($this->input->post('idGraduacao'));
                if ($this->graduacao_model->update($graduacao->idGraduacao, $graduacao)) {
                    $this->data['message'] = 'Graduação atualizada com sucesso';
                    $this->data['type_message'] = '1'; //Sucesso
                } else {
                    $this->data['message'] = 'Erro na atualização da Graduação';
                    $this->data['type_message'] = '0'; //Erro
                }
                $this->index();
            }
        }
    }

}
