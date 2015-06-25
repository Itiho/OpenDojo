<?php
class Grupo extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
		$this->load->model('grupo_model');
    }


    function index()
    {
        
        $this->load->view('Header_view');
        $this->load->view('Navbar_view');
        
        $data['titulo'] = "OpenDojo";
  		$data['cabecalho'] = "Grupos";

		$data['grupos'] = $this->grupo_model->get_all();

        $this->load->view('GrupoList_view', $data);
        $this->load->view('Footer_view');
    }
}
