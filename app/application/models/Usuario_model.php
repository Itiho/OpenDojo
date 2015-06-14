
<?php

/*
 *
 * -------------------------------------------------------
 * CLASSNAME:        Usuario_Model
 * FOR MYSQL TABLE:  Usuario
 * FOR MYSQL DB:     OpenDojo
 * -------------------------------------------------------
 */

class Usuario_Model extends AbstractModel {

    var $idUsuario;   // KEY ATTR. WITH AUTOINCREMENT
    var $nome;   // (normal Attribute)
    var $login;   // (normal Attribute)
    var $password;   // (normal Attribute)
    var $_table = 'Usuario'; // Nome da tabela

// **********************
// GETTER METHODS
// **********************

    function get_idUsuario() {
        return $this->idUsuario;
    }

    function get_nome() {
        return $this->nome;
    }

    function get_login() {
        return $this->login;
    }

    function get_password() {
        return $this->password;
    }

// **********************
// SETTER METHODS
// **********************


    function set_idUsuario($val) {
        $this->idUsuario = $val;
    }

    function set_nome($val) {
        $this->nome = $val;
    }

    function set_login($val) {
        $this->login = $val;
    }

    function set_password($val) {
        $this->password = $val;
    }

}
?>
