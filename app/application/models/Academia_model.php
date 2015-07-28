<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        Academia_Model
* FOR MYSQL TABLE:  Academia
* FOR MYSQL DB:     OpenDojo
* -------------------------------------------------------
*/

class Academia_Model extends MY_Model {

    var $idAcademia;   // KEY ATTR. WITH AUTOINCREMENT
    var $nomeAcademia;   // (normal Attribute)
    var $logradouro;   // (normal Attribute)
    var $numero;   // (normal Attribute)
    var $complemento;   // (normal Attribute)
    var $bairro;   // (normal Attribute)
    var $cidade;   // (normal Attribute)
    var $estado;   // (normal Attribute)

    //Insira aqui no mome da tabela
    public $table = 'Academia';
    public $primary_key = 'idAcademia';

    protected $rules = array(
            'nomeAcademia' => array('field'=>'nomeAcademia',
                'label'=>'Nome',
                'rules'=>'required|min_length[3]'),
            'logradouro' => array('field'=>'logradouro',
                'label'=>'Logradouro'),
            'numero' => array('field'=>'numero',
                'label'=>'Numero'),
            'complemento' => array('field'=>'complemento',
                'label'=>'Complemento'),
            'bairro' => array('field'=>'bairro',
                'label'=>'Bairro'),
            'cidade' => array('field'=>'cidade',
                'label'=>'Cidade',
                'rules'=>'required|min_length[5]'),
            'estado' => array('field'=>'estado',
                'label'=>'Estado',
                'rules'=>'exact_length[2]',
                'errors' => array ('exact_length' => '%s é obrigatório')));
    
    function __construct() {
        $this->timestamps = FALSE;
        $this->has_many['dojos'] =  array('Dojo_Model','Academia_idAcademia', 'idAcademia');
        parent::__construct();

        $this->pagination_delimiters = array('<li>', '</li>');
        $this->pagination_arrows = array('&lt;', '&gt;');
    }
}
?>

