<?php
/*
 *
 * -------------------------------------------------------
 * CLASSNAME:        Aluno_Model
 * FOR MYSQL TABLE:  Aluno
 * FOR MYSQL DB:     OpenDojo
 * -------------------------------------------------------
 */

class Aluno_Model extends AbstractModel {

    var $idAluno;   // KEY ATTR. WITH AUTOINCREMENT
    var $ativo;   // (normal Attribute)
    var $Pessoa_idPessoa;   // (normal Attribute)
    
    //Insira aqui no mome da tabela
    var $_table = 'Aluno';

// **********************
// GETTER METHODS
// **********************


    function get_idAluno() {
        return $this->idAluno;
    }

    function get_ativo() {
        return $this->ativo;
    }

    function get_Pessoa_idPessoa() {
        return $this->Pessoa_idPessoa;
    }

// **********************
// SETTER METHODS
// **********************


    function set_idAluno($val) {
        $this->idAluno = $val;
    }

    function set_ativo($val) {
        $this->ativo = $val;
    }

    function set_Pessoa_idPessoa($val) {
        $this->Pessoa_idPessoa = $val;
    }

}
?>

