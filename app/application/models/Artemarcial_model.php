
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
    //Insira aqui no mome da tabela
    var $_table = 'ArteMarcial';

// **********************
// GETTER METHODS
// **********************


    function get_idArteMarcial() {
        return $this->idArteMarcial;
    }

    function get_nome() {
        return $this->nome;
    }

// **********************
// SETTER METHODS
// **********************


    function set_idArteMarcial($val) {
        $this->idArteMarcial = $val;
    }

    function set_nome($val) {
        $this->nome = $val;
    }

}

?>
