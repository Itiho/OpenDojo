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
    var $ArteMarcial_idArte_Marcial;   // (normal Attribute)
    public $table = 'Graduacao'; // Nome da tabela
    public $primary_key = 'idGraduacao';
    
    public $rules = array(
            'nomeGraduacao' => array(
                'field'=>'nomeGraduacao',
                'label'=>'Nome',
                'rules'=>'required|min_length[3]'),
            'ArteMarcial_idArte_Marcial' => array(
                'field'=>'ArteMarcial_idArte_Marcial',
                'label'=>'Arte marcial',
                'rules'=>'greater_than[0]',
                'errors' => array ('greater_than' => '%s é obrigatório')));

    function __construct() {
        $this->timestamps = FALSE;
        $this->has_one['arteMarcial'] = array('ArteMarcial_Model','idArteMarcial','ArteMarcial_idArte_Marcial');
        parent::__construct();
        
        $this->pagination_delimiters = array('<li>', '</li>');
        $this->pagination_arrows = array('&lt;', '&gt;');
    }
}
?>