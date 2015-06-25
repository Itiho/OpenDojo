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
    var $nome;   // (normal Attribute)
    protected $_table = 'ArteMarcial';
    protected $primary_key = 'idArteMarcial';

}
?>
