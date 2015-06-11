<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        Grupo_Model
* FOR MYSQL TABLE:  Grupo
* FOR MYSQL DB:     OpenDojo
* -------------------------------------------------------
*/

//$this->load->library('Abstract_model');
//include base_url().'application/libraries/Abstract_model.php';

class Grupo_Model extends MY_Model
{ 



var $idGrupo;   // KEY ATTR. WITH AUTOINCREMENT

var $nome;   // (normal Attribute)
var $descricao;   // (normal Attribute)

//Insira aqui no mome da tabela
var $_table = 'Grupo';




// **********************
// GETTER METHODS
// **********************


function get_idGrupo()
{
    return $this->idGrupo;
}

function get_nome()
{
    return $this->nome;
}

function get_descricao()
{
    return $this->descricao;
}

// **********************
// SETTER METHODS
// **********************


function set_idGrupo($val)
{
    $this->idGrupo =  $val;
}

function set_nome($val)
{
    $this->nome =  $val;
}

function set_descricao($val)
{
    $this->descricao =  $val;
}


} // class : end

?>
<!-- end of generated class -->
