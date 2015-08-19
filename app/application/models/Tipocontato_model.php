<?php
/*
 *
 * -------------------------------------------------------
 * CLASSNAME:        TipoContato_Model
 * FOR MYSQL TABLE:  tipoContato
 * FOR MYSQL DB:     OpenDojo
 * -------------------------------------------------------
 */

class TipoContato_Model extends MY_Model {

    var $idTipoContato;   // KEY ATTR. WITH AUTOINCREMENT
    var $tipoContato;   // (normal Attribute)
    public $table = 'TipoContato';
    public $primary_key = 'idTipoContato';

    public $rules = array(
            'tipoContato' => array(
                'field'=>'tipoContato',
                'label'=>'Tipo de contato',
                'rules'=>'required|min_length[3]')
        );
    
    
    function __construct() {
        $this->timestamps = FALSE;
        $this->has_many['contatos'] =  array('Contato_Model','TipoContato_idTipoContato', 'idTipoContato');
        parent::__construct();

        $this->pagination_delimiters = array('<li>', '</li>');
        $this->pagination_arrows = array('&lt;', '&gt;');
    }
    
}
?>
