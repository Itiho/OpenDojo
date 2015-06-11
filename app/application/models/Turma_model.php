
<!-- begin of generated class -->
<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        Turma_Model
* FOR MYSQL TABLE:  Turma
* FOR MYSQL DB:     OpenDojo
* -------------------------------------------------------
*/



class Turma_Model extends AbstractModel
{ 



var $idTurma;   // KEY ATTR. WITH AUTOINCREMENT

var $nome;   // (normal Attribute)
var $ativo;   // (normal Attribute)
var $Dojo_idDojo;   // (normal Attribute)




// **********************
// GETTER METHODS
// **********************


function get_idTurma()
{
    return $this->idTurma;
}

function get_nome()
{
    return $this->nome;
}

function get_ativo()
{
    return $this->ativo;
}

function get_Dojo_idDojo()
{
    return $this->Dojo_idDojo;
}

// **********************
// SETTER METHODS
// **********************


function set_idTurma($val)
{
    $this->idTurma =  $val;
}

function set_nome($val)
{
    $this->nome =  $val;
}

function set_ativo($val)
{
    $this->ativo =  $val;
}

function set_Dojo_idDojo($val)
{
    $this->Dojo_idDojo =  $val;
}


} // class : end

?>
<!-- end of generated class -->
