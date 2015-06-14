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
    protected $_table = 'Graduacao'; // Nome da tabela

// **********************
// GETTER METHODS
// **********************

    function get_idGraduacao() {
        return $this->idGraduacao;
    }

    function get_nomeGraduacao() {
        return $this->nomeGraduacao;
    }

    function get_arteMarcial() {
        return $this->arteMarcial;
    }

// **********************
// SETTER METHODS
// **********************


    function set_idGraduacao($val) {
        $this->idGraduacao = $val;
    }

    function set_nomeGraduacao($val) {
        $this->nomeGraduacao = $val;
    }

    function set_arteMarcial($val) {
        $this->arteMarcial = $val;
    }

}
?>