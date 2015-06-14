<?php
/*
 *
 * -------------------------------------------------------
 * CLASSNAME:        Pessoa_Model
 * FOR MYSQL TABLE:  Pessoa
 * FOR MYSQL DB:     OpenDojo
 * -------------------------------------------------------
 */

class Pessoa_Model extends AbstractModel {

    var $idPessoa;   // KEY ATTR. WITH AUTOINCREMENT
    var $nome;   // (normal Attribute)
    var $dataNascimento;   // (normal Attribute)
    var $nomeMae;   // (normal Attribute)
    var $nomePai;   // (normal Attribute)
    var $logradouro;   // (normal Attribute)
    var $numero;   // (normal Attribute)
    var $complemento;   // (normal Attribute)
    var $bairro;   // (normal Attribute)
    var $cidade;   // (normal Attribute)
    var $estado;   // (normal Attribute)
    var $rg;   // (normal Attribute)
    var $cpf;   // (normal Attribute)
    var $Sexo_idSexo;   // (normal Attribute)
    var $_table = 'Pessoa'; // Nome da tabela

// **********************
// GETTER METHODS
// **********************

    function get_idPessoa() {
        return $this->idPessoa;
    }

    function get_nome() {
        return $this->nome;
    }

    function get_dataNascimento() {
        return $this->dataNascimento;
    }

    function get_nomeMae() {
        return $this->nomeMae;
    }

    function get_nomePai() {
        return $this->nomePai;
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

    function get_rg() {
        return $this->rg;
    }

    function get_cpf() {
        return $this->cpf;
    }

    function get_Sexo_idSexo() {
        return $this->Sexo_idSexo;
    }

// **********************
// SETTER METHODS
// **********************


    function set_idPessoa($val) {
        $this->idPessoa = $val;
    }

    function set_nome($val) {
        $this->nome = $val;
    }

    function set_dataNascimento($val) {
        $this->dataNascimento = $val;
    }

    function set_nomeMae($val) {
        $this->nomeMae = $val;
    }

    function set_nomePai($val) {
        $this->nomePai = $val;
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

    function set_rg($val) {
        $this->rg = $val;
    }

    function set_cpf($val) {
        $this->cpf = $val;
    }

    function set_Sexo_idSexo($val) {
        $this->Sexo_idSexo = $val;
    }

}

?>
