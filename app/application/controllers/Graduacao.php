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
        $this->data['titulo'] = "OpenDojo";
        $this->data['cabecalho'] = "Graduações";

        $this->load->view('Header_view', $this->data);
        $this->load->view('Navbar_view');

        $consulta = array('tabela' => 'ArteMarcial', 'condicao' => 'Graduacao.arteMarcial = ArteMarcial.idArteMarcial');
        $this->graduacao_model->order_by('idGraduacao');
        $colunas = 'idGraduacao, nomeGraduacao, nomeArteMarcial';
        $this->data['graduacoes'] = $this->graduacao_model->get_all_join($consulta, $colunas);

        $this->load->view('GraduacaoList_view', $this->data);
        $this->load->view('Footer_view');
    }

    function edit($id = 0){

        $this->data['titulo'] = "OpenDojo";
        $this->data['cabecalho'] = "Graduação";
     
        
        $this->load->view('Header_view', $this->data);
        $this->load->view('Navbar_view');    
        
        if($id > 0){
            $graduacao = $this->graduacao_model->get($id);
            $this->data['graduacao'] = objectToArray($graduacao);
        } else{
            //aqui entrará a parte da nova graduação
            
        }

        $this->data['artesMarciais'] = objectToArray($this->artemarcial_model->get_all());
        
        $this->load->view('GraduacaoEdit_view', $this->data);
        $this->load->view('Footer_view');
        
    }
    
    function add() {
        $this->data['titulo'] = "OpenDojo";
        $this->data['cabecalho'] = "Graduação";
        $this->load->view('Header_view', $this->data);
        $this->load->view('Navbar_view');
        
        $this->data['artesMarciais'] = objectToArray($this->artemarcial_model->get_all());
        //Adiciona um item vazio no início
        array_unshift($this->data['artesMarciais'],array('idArteMarcial'=> 0, 'nomeArteMarcial' => ''));
        
        $this->load->view('GraduacaoAdd_view', $this->data);
        $this->load->view('Footer_view');
    }

    function save() {
            $graduacao = new Graduacao_Model();
            $graduacao->set_nomeGraduacao($this->input->post('nomeGraduacao'));
            $graduacao->set_arteMarcial($this->input->post('arteMarcial'));
            
        //Se vier da tela de cadastro
        if ($this->input->post('idGraduacao') == NULL) {
            if ($this->graduacao_model->insert($graduacao)) {
                $this->data['message'] = 'Graduação cadastrada com sucesso';
            } else {
                $this->data['message'] = 'Erro no cadastro da Graduação';
            }
            $this->index();
        } else {
            $graduacao->set_idGraduacao($this->input->post('idGraduacao'));
            if ($this->graduacao_model->update($graduacao->idGraduacao, $graduacao)) {
                $this->data['message'] = 'Graduação atualizada com sucesso';
            } else {
                $this->data['message'] = 'Erro na atualização da Graduação';
            }
            $this->index();
        }
    }

}
