<?php
class DiaSemana_Model extends MY_Model {

    private $diasSemanas = array(
        '1' => 'Domingo',
        '2' => 'Segunda',
        '3' => 'Terça',
        '4' => 'Quarta',
        '5' => 'Quinta',
        '6' => 'Sexta',
        '7' => 'Sábado');

    public function get_diasSemana() {
        return $this->diasSemanas;
    }

    public function get_dia($nome) {
        return array_search($nome, $this->diasSemanas, true);
    }

    public function get_diaNome($dia) {
        if(isset($this->diasSemanas[strtoupper($dia)])) {
            return $this->diasSemanas[strtoupper($dia)];
        } else {
            return NULL;
        }
    }
}
?>