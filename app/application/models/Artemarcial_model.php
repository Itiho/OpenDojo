<?php

/*
 *
 * -------------------------------------------------------
 * CLASSNAME:        ArteMarcial_Model
 * FOR MYSQL TABLE:  ArteMarcial
 * FOR MYSQL DB:     OpenDojo
 * -------------------------------------------------------
 */

class ArteMarcial_Model extends MY_Model {

    var $idArteMarcial;   // KEY ATTR. WITH AUTOINCREMENT
    var $nomeArteMarcial;   // (normal Attribute)
    public $table = 'ArteMarcial';
    public $primary_key = 'idArteMarcial';

    function __construct() {
        $this->has_many['graduacoes'] = 'Graduacao_Model';
        parent::__construct();
        
        $this->pagination_delimiters = array('<li>', '</li>');
        $this->pagination_arrows = array('&lt;', '&gt;');
    }
    
}
?>
