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

    public $rules = array(
            'nomeArteMarcial' => array('field'=>'nomeArteMarcial',
                'label'=>'Nome',
                'rules'=>'required|min_length[3]'));
    
    
    function __construct() {
        $this->timestamps = FALSE;
        $this->has_many['graduacoes'] =  array('Graduacao_Model','ArteMarcial_idArte_Marcial', 'idArteMarcial');
        $this->has_many['dojos'] =  array('Dojo_Model','ArteMarcial_idArte_Marcial', 'idArteMarcial');
        parent::__construct();

        $this->pagination_delimiters = array('<li>', '</li>');
        $this->pagination_arrows = array('&lt;', '&gt;');
    }

}

?>
