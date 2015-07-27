
<?php
/*
 *
 * -------------------------------------------------------
 * CLASSNAME:        Dojo_Model
 * FOR MYSQL TABLE:  Dojo
 * FOR MYSQL DB:     OpenDojo
 * -------------------------------------------------------
 */

class Dojo_Model extends MY_Model {

    var $idDojo;   // KEY ATTR. WITH AUTOINCREMENT
    var $nome;   // (normal Attribute)
    var $Academia_idAcademia;   // (normal Attribute)
    var $ArteMarcial_idArte_Marcial;   // (normal Attribute)
    
    //Insira aqui no mome da tabela
    public $table = 'Dojo';
    public $primary_key = 'idDojo';

    protected $rules = array(
            'nome' => array('field'=>'nomeDojo',
                'label'=>'Nome',
                'rules'=>'required|min_length[3]'));
    
    
    function __construct() {
        $this->timestamps = FALSE;
        $this->has_one['artemarcial'] = array('ArteMarcial_Model','idArteMarcial','ArteMarcial_idArte_Marcial');
        $this->has_one['academia'] = array('Academia_Model','idAcademia','Academia_idAcademia');
        $this->has_many['turmas'] =  array('Turma_Model','Dojo_idDojo', 'idDojo');
        parent::__construct();

        $this->pagination_delimiters = array('<li>', '</li>');
        $this->pagination_arrows = array('&lt;', '&gt;');
    }

}

?>
