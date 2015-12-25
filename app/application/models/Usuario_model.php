
<?php

/*
 *
 * -------------------------------------------------------
 * CLASSNAME:        Usuario_Model
 * FOR MYSQL TABLE:  Usuario
 * FOR MYSQL DB:     OpenDojo
 * -------------------------------------------------------
 */

class Usuario_Model extends MY_Model {

    var $idUsuario;   // KEY ATTR. WITH AUTOINCREMENT
    var $nomeUsuario;   // (normal Attribute)
    var $login;   // (normal Attribute)
    var $password;   // (normal Attribute)
    var $passwordConfirm;

    //Insira aqui no mome da tabela
    public $table = 'Usuario';
    public $primary_key = 'idUsuario';

    public $rules = array(
        'nomeUsuario' => array('field'=>'nomeUsuario',
            'label'=>'Nome',
            'rules'=>'trim|required|min_length[3]'),
        'login' => array('field'=>'login',
            'label'=>'Login',
            'rules'=>'trim|strtolower|required|min_length[3]|is_unique[Usuario.login]',
            'errors' => array ('is_unique' => 'Este %s já foi utilizado')),
        'password' => array('field'=>'password',
            'label'=>'Senha',
            'rules'=>'trim|required|min_length[6]|matches[passwordConfirm]|md5'),
        'passwordConfirm' => array('field'=>'passwordConfirm',
            'label'=>'Confirmação da senha',
            'rules'=>'trim|required|min_length[6]')
        );

    public $rulesUpdate = array(
        'nomeUsuario' => array('field'=>'nomeUsuario',
            'label'=>'Nome',
            'rules'=>'trim|required|min_length[3]'),
        'login' => array('field'=>'login',
            'label'=>'Login',
            'rules'=>'trim|strtolower|required|min_length[3]'),
        'password' => array('field'=>'password',
            'label'=>'Senha',
            'rules'=>'trim|required|min_length[6]|matches[passwordConfirm]|md5'),
        'passwordConfirm' => array('field'=>'passwordConfirm',
            'label'=>'Confirmação da senha',
            'rules'=>'trim|required|min_length[6]')
        );
    
    function __construct() {
        $this->timestamps = FALSE;
        $this->has_many['usuariogrupo'] =  array('Usuariogrupo_Model','Usuario_idUsuario', 'idUsuario');
        parent::__construct();

        $this->pagination_delimiters = array('<li>', '</li>');
        $this->pagination_arrows = array('&lt;', '&gt;');
    }

}
