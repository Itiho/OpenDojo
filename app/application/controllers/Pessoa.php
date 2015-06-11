<?php
class Pessoa extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $data['titulo'] = "OpenDojo";
  		$data['cabecalho'] = "Pessoas";

  		$this->load->view('pessoa_view', $data);
    }
}
