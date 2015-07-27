<?php
/*
 *
 * -------------------------------------------------------
 * CLASSNAME:        Turma_Model
 * FOR MYSQL TABLE:  Turma
 * FOR MYSQL DB:     OpenDojo
 * -------------------------------------------------------
 */

class Turma_Model extends MY_Model {

    var $idTurma;   // KEY ATTR. WITH AUTOINCREMENT
    var $nome;   // (normal Attribute)
    var $ativo;   // (normal Attribute)
    var $Dojo_idDojo;   // (normal Attribute)
    public $table = 'Turma'; // Nome da tabela
    public $primary_key = 'idTurma';

     function __construct() {
        $this->timestamps = FALSE;
        $this->has_one['dojo'] = array('Dojo_Model','idDojo','Dojo_idDojo');

        parent::__construct();

        $this->pagination_delimiters = array('<li>', '</li>');
        $this->pagination_arrows = array('&lt;', '&gt;');
    }

}

?>
