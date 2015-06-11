<?php
class Graduacao extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
		$this->load->model('graduacao_model');
    }


    function index()
    {
        
        $this->load->view('Header_view');
        $this->load->view('Navbar_view');
        
        $data['titulo'] = "OpenDojo";
        $data['cabecalho'] = "Graduações";

        $consulta = array('tabela' => 'ArteMarcial', 'condicao' => 'Graduacao.arteMarcial = ArteMarcial.idArteMarcial');
        //$consulta[] = ();
        //$consulta['condicao'] = 'Graduacao.arteMarcial = ArteMarcial.idArteMarcial';
//        get_join($data)
//        $this->db->select('*');
//        $this->db->from('blogs');
//        $this->db->join('comments', 'comments.id = blogs.id');
//
//        $query = $this->db->get();
        
        
	$data['graduacoes'] = $this->graduacao_model->get_join($consulta);

        $this->load->view('GraduacaoList_view', $data);
        $this->load->view('Footer_view');
    }
}
