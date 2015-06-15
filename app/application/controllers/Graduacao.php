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

        $consulta = array('tabela' => 'ArteMarcial', 'condicao' => 'Graduacao.arteMarcial = ArteMarcial.idArteMarcial');
        $this->graduacao_model->order_by('idGraduacao');
        $colunas = 'idGraduacao, nomeGraduacao, nomeArteMarcial';
        $this->data['graduacoes'] = $this->graduacao_model->get_all_join($consulta, $colunas);

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
