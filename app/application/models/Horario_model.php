
<!-- begin of generated class -->
<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        Horario_Model
* FOR MYSQL TABLE:  Horario
* FOR MYSQL DB:     OpenDojo
* -------------------------------------------------------
*/



class Horario_Model extends AbstractModel
{ 



var $idHorario;   // KEY ATTR. WITH AUTOINCREMENT

var $diaSemana;   // (normal Attribute)
var $horaInicio;   // (normal Attribute)
var $horaFim;   // (normal Attribute)
var $Turma_idTurma;   // (normal Attribute)




// **********************
// GETTER METHODS
// **********************


function get_idHorario()
{
    return $this->idHorario;
}

function get_diaSemana()
{
    return $this->diaSemana;
}

function get_horaInicio()
{
    return $this->horaInicio;
}

function get_horaFim()
{
    return $this->horaFim;
}

function get_Turma_idTurma()
{
    return $this->Turma_idTurma;
}

// **********************
// SETTER METHODS
// **********************


function set_idHorario($val)
{
    $this->idHorario =  $val;
}

function set_diaSemana($val)
{
    $this->diaSemana =  $val;
}

function set_horaInicio($val)
{
    $this->horaInicio =  $val;
}

function set_horaFim($val)
{
    $this->horaFim =  $val;
}

function set_Turma_idTurma($val)
{
    $this->Turma_idTurma =  $val;
}


} // class : end

?>
<!-- end of generated class -->
