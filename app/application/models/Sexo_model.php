<?php
class Sexo_Model extends MY_Model {

    private $sexo = array(
        '1' => 'Masculino',
        '2' => 'Feminino');

    public function get_sexos() {
        return $this->sexo;
    }

    public function get_sexo($sexoId) {
        if($sexoId == 1 or $sexoId == 2){
            return $sexo[];
        } else {
            return false;
        }
    }
}
?>
