
<!-- begin of generated class -->
<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        Graduacao_Model
* FOR MYSQL TABLE:  Graduacao
* FOR MYSQL DB:     OpenDojo
* -------------------------------------------------------
*/


class Graduacao_Model extends AbstractModel
{ 



var $idGraduacao;   // KEY ATTR. WITH AUTOINCREMENT

var $graduacao;   // (normal Attribute)
var $ArteMarcial_idArteMarcial;   // (normal Attribute)




// **********************
// GETTER METHODS
// **********************


function get_idGraduacao()
{
    return $this->idGraduacao;
}

function get_graduacao()
{
    return $this->graduacao;
}

function get_ArteMarcial_idArteMarcial()
{
    return $this->ArteMarcial_idArteMarcial;
}

// **********************
// SETTER METHODS
// **********************


function set_idGraduacao($val)
{
    $this->idGraduacao =  $val;
}

function set_graduacao($val)
{
    $this->graduacao =  $val;
}

function set_ArteMarcial_idArteMarcial($val)
{
    $this->ArteMarcial_idArteMarcial =  $val;
}


} // class : end

?>
<!-- end of generated class -->
