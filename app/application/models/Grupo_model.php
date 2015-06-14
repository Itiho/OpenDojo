<?php

/*
 *
 * -------------------------------------------------------
 * CLASSNAME:        Grupo_Model
 * FOR MYSQL TABLE:  Grupo
 * FOR MYSQL DB:     OpenDojo
 * -------------------------------------------------------
 */

class Grupo_Model extends MY_Model {

    var $idGrupo;   // KEY ATTR. WITH AUTOINCREMENT
    var $nome;   // (normal Attribute)
    var $descricao;   // (normal Attribute)
    var $_table = 'Grupo'; //Nome da tabela

// **********************
// GETTER METHODS
// **********************

    function get_idGrupo() {
        return $this->idGrupo;
    }

    function get_nome() {
        return $this->nome;
    }

    function get_descricao() {
        return $this->descricao;
    }

// **********************
// SETTER METHODS
// **********************


    function set_idGrupo($val) {
        $this->idGrupo = $val;
    }

    function set_nome($val) {
        $this->nome = $val;
    }

    function set_descricao($val) {
        $this->descricao = $val;
    }

}
?>
