
<!-- begin of generated class -->
<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        Exame_Model
* FOR MYSQL TABLE:  Exame
* FOR MYSQL DB:     OpenDojo
* -------------------------------------------------------
*/



class Exame_Model extends AbstractModel
{ 



var $idExame;   // KEY ATTR. WITH AUTOINCREMENT

var $data;   // (normal Attribute)
var $ArteMarcial_idArteMarcial;   // (normal Attribute)
var $nome;   // (normal Attribute)




// **********************
// GETTER METHODS
// **********************


function get_idExame()
{
    return $this->idExame;
}

function get_data()
{
    return $this->data;
}

function get_ArteMarcial_idArteMarcial()
{
    return $this->ArteMarcial_idArteMarcial;
}

function get_nome()
{
    return $this->nome;
}

// **********************
// SETTER METHODS
// **********************


function set_idExame($val)
{
    $this->idExame =  $val;
}

function set_data($val)
{
    $this->data =  $val;
}

function set_ArteMarcial_idArteMarcial($val)
{
    $this->ArteMarcial_idArteMarcial =  $val;
}

function set_nome($val)
{
    $this->nome =  $val;
}


} // class : end

?>
<!-- end of generated class -->
