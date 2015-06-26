<?php

/*
 *
 * -------------------------------------------------------
 * CLASSNAME:        Graduacao_Model
 * FOR MYSQL TABLE:  Graduacao
 * FOR MYSQL DB:     OpenDojo
 * -------------------------------------------------------
 */

class Graduacao_Model extends MY_Model {

    var $idGraduacao;   // KEY ATTR. WITH AUTOINCREMENT
    var $nomeGraduacao;   // (normal Attribute)
    var $arteMarcial;   // (normal Attribute)
    protected $_table = 'Graduacao'; // Nome da tabela
    protected $primary_key = 'idGraduacao';

    protected $validate = array(
        array('field' => 'nomeGraduacao',
            'label' => 'Nome',
            'rules' => 'required'),
        array('field' => 'arteMarcial',
            'label' => 'Arte Marcial',
            'rules' => 'required|greater_than[0]',
            array('greater_than[0]' => '{field} é obrigatório')));
    



    public function get_graduacoes() {

        $query = $this->db
                ->select('idGraduacao, nomeGraduacao, nomeArteMarcial')
                ->from($this->_table)
                ->join('ArteMarcial', 'Graduacao.arteMarcial = ArteMarcial.idArteMarcial')
                ->order_by('idGraduacao')
                ->get();
        return $query->result();
    }
   


}

?>