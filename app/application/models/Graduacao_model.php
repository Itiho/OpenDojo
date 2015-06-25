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

    
    public function get_graduacoes() {

        $query = $this->db
                ->select('idGraduacao, nomeGraduacao, nomeArteMarcial')
                ->from($this->_table)
                ->join('ArteMarcial', 'Graduacao.arteMarcial = ArteMarcial.idArteMarcial')
                ->get();
        return $query->result();
    }
}

?>