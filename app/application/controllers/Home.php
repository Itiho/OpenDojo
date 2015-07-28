<?php

class Home extends CI_Controller {

    public $data = array();

    function __construct() {
        parent::__construct();
        $this->data['titulo'] = 'OpenDojo';
        $this->data['cabecalho'] = '';
    }

    function index() {
        $this->load->view('Home_view', $this->data);
    }
}
