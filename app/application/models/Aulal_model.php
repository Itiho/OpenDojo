<?php
/*
 *
 * -------------------------------------------------------
 * CLASSNAME:        Aulal_Model
 * FOR MYSQL TABLE:  Aula
 * FOR MYSQL DB:     OpenDojo
 * -------------------------------------------------------
 */

class Aulal_Model extends AbstractModel {

    var $idAula;   // KEY ATTR. WITH AUTOINCREMENT
    var $data;   // (normal Attribute)
    var $Turma_idTurma;   // (normal Attribute)
    var $relatorio;   // (normal Attribute)

    //Insira aqui no mome da tabela
    var $_table = 'Aula';

// **********************
// GETTER METHODS
// **********************


    function get_idAula() {
        return $this->idAula;
    }

    function get_data() {
        return $this->data;
    }

    function get_Turma_idTurma() {
        return $this->Turma_idTurma;
    }

    function get_relatorio() {
        return $this->relatorio;
    }

// **********************
// SETTER METHODS
// **********************


    function set_idAula($val) {
        $this->idAula = $val;
    }

    function set_data($val) {
        $this->data = $val;
    }

    function set_Turma_idTurma($val) {
        $this->Turma_idTurma = $val;
    }

    function set_relatorio($val) {
        $this->relatorio = $val;
    }

}
?>

