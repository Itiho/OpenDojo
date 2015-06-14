
<?php
/*
 *
 * -------------------------------------------------------
 * CLASSNAME:        Contato_Model
 * FOR MYSQL TABLE:  Contato
 * FOR MYSQL DB:     OpenDojo
 * -------------------------------------------------------
 */

class Contato_Model extends AbstractModel {

    var $idContato;   // KEY ATTR. WITH AUTOINCREMENT
    var $tipoContato_idtipoContato;   // (normal Attribute)
    var $dadoContato;   // (normal Attribute)
    var $Pessoa_idPessoa;   // (normal Attribute)

    //Insira aqui no mome da tabela
    var $_table = 'Contato';

// **********************
// GETTER METHODS
// **********************


    function get_idContato() {
        return $this->idContato;
    }

    function get_tipoContato_idtipoContato() {
        return $this->tipoContato_idtipoContato;
    }

    function get_dadoContato() {
        return $this->dadoContato;
    }

    function get_Pessoa_idPessoa() {
        return $this->Pessoa_idPessoa;
    }

// **********************
// SETTER METHODS
// **********************


    function set_idContato($val) {
        $this->idContato = $val;
    }

    function set_tipoContato_idtipoContato($val) {
        $this->tipoContato_idtipoContato = $val;
    }

    function set_dadoContato($val) {
        $this->dadoContato = $val;
    }

    function set_Pessoa_idPessoa($val) {
        $this->Pessoa_idPessoa = $val;
    }

}

?>
