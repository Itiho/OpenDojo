<?php
/*
 *
 * -------------------------------------------------------
 * CLASSNAME:        TipoContato_Model
 * FOR MYSQL TABLE:  tipoContato
 * FOR MYSQL DB:     OpenDojo
 * -------------------------------------------------------
 */

class TipoContato_Model extends AbstractModel {

    var $idTipoContato;   // KEY ATTR. WITH AUTOINCREMENT
    var $idtipoContato;   // (normal Attribute)
    var $tipoContato;   // (normal Attribute)
    var $_table = 'tipoContato'; // Nome da tabela

// **********************
// GETTER METHODS
// **********************

    function get_idtipoContato() {
        return $this->idtipoContato;
    }

    function get_tipoContato() {
        return $this->tipoContato;
    }

// **********************
// SETTER METHODS
// **********************


    function set_idtipoContato($val) {
        $this->idtipoContato = $val;
    }

    function set_tipoContato($val) {
        $this->tipoContato = $val;
    }

}

?>
