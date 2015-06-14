
<?php
/*
 *
 * -------------------------------------------------------
 * CLASSNAME:        Dojo_Model
 * FOR MYSQL TABLE:  Dojo
 * FOR MYSQL DB:     OpenDojo
 * -------------------------------------------------------
 */

class Dojo_Model extends AbstractModel {

    var $idDojo;   // KEY ATTR. WITH AUTOINCREMENT
    var $nome;   // (normal Attribute)
    var $Academia_idAcademia;   // (normal Attribute)
    var $ArteMarcial_idArteMarcial;   // (normal Attribute)
    
    //Insira aqui no mome da tabela
    var $_table = 'Dojo';

// **********************
// GETTER METHODS
// **********************


    function get_idDojo() {
        return $this->idDojo;
    }

    function get_nome() {
        return $this->nome;
    }

    function get_Academia_idAcademia() {
        return $this->Academia_idAcademia;
    }

    function get_ArteMarcial_idArteMarcial() {
        return $this->ArteMarcial_idArteMarcial;
    }

// **********************
// SETTER METHODS
// **********************


    function set_idDojo($val) {
        $this->idDojo = $val;
    }

    function set_nome($val) {
        $this->nome = $val;
    }

    function set_Academia_idAcademia($val) {
        $this->Academia_idAcademia = $val;
    }

    function set_ArteMarcial_idArteMarcial($val) {
        $this->ArteMarcial_idArteMarcial = $val;
    }

}

?>
