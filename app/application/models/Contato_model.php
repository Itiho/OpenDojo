
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
    var $TipoContato_idTipoContato;   // (normal Attribute)
    var $dadoContato;   // (normal Attribute)
    var $Pessoa_idPessoa;   // (normal Attribute)
    //Insira aqui no mome da tabela
    public $table = 'Contato';
    public $primary_key = 'idContato';

    function __construct() {
        $this->timestamps = FALSE;
        $this->has_one['tipoContato'] = array('TipoContato_Model', 'idTipoContato', 'TipoContato_idTipoContato');
        parent::__construct();

        $this->pagination_delimiters = array('<li>', '</li>');
        $this->pagination_arrows = array('&lt;', '&gt;');
    }

}

?>
