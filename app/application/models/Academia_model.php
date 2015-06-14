<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        Academia_Model
* FOR MYSQL TABLE:  Academia
* FOR MYSQL DB:     OpenDojo
* -------------------------------------------------------
*/



class Academia_Model extends AbstractModel {

    var $idAcademia;   // KEY ATTR. WITH AUTOINCREMENT
    var $nome;   // (normal Attribute)
    var $logradouro;   // (normal Attribute)
    var $numero;   // (normal Attribute)
    var $complemento;   // (normal Attribute)
    var $bairro;   // (normal Attribute)
    var $cidade;   // (normal Attribute)
    var $estado;   // (normal Attribute)

    //Insira aqui no mome da tabela
    var $_table = 'Academia';

// **********************
// GETTER METHODS
// **********************


    function get_idAcademia() {
        return $this->idAcademia;
    }

    function get_nome() {
        return $this->nome;
    }

    function get_logradouro() {
        return $this->logradouro;
    }

    function get_numero() {
        return $this->numero;
    }

    function get_complemento() {
        return $this->complemento;
    }

    function get_bairro() {
        return $this->bairro;
    }

    function get_cidade() {
        return $this->cidade;
    }

    function get_estado() {
        return $this->estado;
    }

// **********************
// SETTER METHODS
// **********************


    function set_idAcademia($val) {
        $this->idAcademia = $val;
    }

    function set_nome($val) {
        $this->nome = $val;
    }

    function set_logradouro($val) {
        $this->logradouro = $val;
    }

    function set_numero($val) {
        $this->numero = $val;
    }

    function set_complemento($val) {
        $this->complemento = $val;
    }

    function set_bairro($val) {
        $this->bairro = $val;
    }

    function set_cidade($val) {
        $this->cidade = $val;
    }

    function set_estado($val) {
        $this->estado = $val;
    }

}
?>

