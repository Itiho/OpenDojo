<?php
class Graduacao extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
                //$this->load->library('Abstract_model');
                $this->load->helper('inflector');
		$this->load->model('graduacao_model');
		$this->load->helper('url');
		//$this->_init();
    }


    function index()
    {
        
        $this->load->view('header');
        
        $data['titulo'] = "OpenDojo";
  		$data['cabecalho'] = "Grupos";

		$data['grupos'] = $this->grupo_model->get_all();

        $this->load->view('grupo_view', $data);
        $this->load->view('footer');
    }
}
