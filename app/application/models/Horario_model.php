<?php

/*
 *
 * -------------------------------------------------------
 * CLASSNAME:        Horario_Model
 * FOR MYSQL TABLE:  Horario
 * FOR MYSQL DB:     OpenDojo
 * -------------------------------------------------------
 */

class Horario_Model extends MY_Model {

    var $idHorario;   // KEY ATTR. WITH AUTOINCREMENT
    var $diaSemana;   // (normal Attribute)
    var $horaInicio;   // (normal Attribute)
    var $horaFim;   // (normal Attribute)
    var $Turma_idTurma;   // (normal Attribute)
    public $table = 'Horario'; // Nome da tabela
    public $primary_key = 'idHorario';
    public $rules = array(
        'diaSemana' => array(
            'field' => 'diaSemana',
            'label' => 'Dia da semana',
            'rules' => 'greater_than[0]',
            'errors' => array('greater_than' => '%s é obrigatório')),
        'horaInicio' => array(
            'field' => 'horaInicio',
            'label' => 'Hora de início',
            'rules' => 'required|hora'),
        'horaFim' => array(
            'field' => 'horaFim',
            'label' => 'Hora de término',
            'rules' => 'required|hora'),
        'Turma_idTurma' => array(
            'field' => 'Turma_idTurma',
            'label' => 'Turma',
            'rules' => 'greater_than[0]',
            'errors' => array('greater_than' => '%s é obrigatório'))
    );

    function __construct() {
        $this->timestamps = FALSE;
        $this->has_one['turma'] = array('Turma_Model', 'idTurma', 'Turma_idTurma');

        parent::__construct();

        $this->pagination_delimiters = array('<li>', '</li>');
        $this->pagination_arrows = array('&lt;', '&gt;');
    }

    

}

?>
