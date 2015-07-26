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
    public $table = 'Graduacao'; // Nome da tabela
    public $primary_key = 'idGraduacao';
    
    protected $rules = array(
            'nomeGraduacao' => array('field'=>'nomeGraduacao',
                'label'=>'Nome',
                'rules'=>'required|min_length[3]'),
            'arteMarcial' => array('field'=>'arteMarcial',
                'label'=>'Arte marcial',
                'rules'=>'required'));

    function __construct() {
        $this->timestamps = FALSE;
        $this->has_one['arteMarcial_fk'] = array('ArteMarcial_Model','idArteMarcial','arteMarcial');
        parent::__construct();
        
        $this->pagination_delimiters = array('<li>', '</li>');
        $this->pagination_arrows = array('&lt;', '&gt;');
    }
}
?>