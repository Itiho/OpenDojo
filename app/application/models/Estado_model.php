<?php

/*
 *
 * -------------------------------------------------------
 * CLASSNAME:        Academia_Model
 * FOR MYSQL TABLE:  Academia
 * FOR MYSQL DB:     OpenDojo
 * -------------------------------------------------------
 */

class Estado_Model extends MY_Model {

    private $estados = array(
        'AC' => 'Acre',
        'AL' => 'Alagoas',
        'AP' => 'Amapá',
        'AM' => 'Amazonas',
        'BA' => 'Bahia',
        'CE' => 'Ceará',
        'DF' => 'Distrito Federal',
        'ES' => 'Espírito Santo',
        'GO' => 'Goiás',
        'MA' => 'Maranhão',
        'MT' => 'Mato Grosso',
        'MS' => 'Mato Grosso do Sul',
        'MG' => 'Minas Gerais',
        'PA' => 'Pará',
        'PB' => 'Paraíba',
        'PR' => 'Paraná',
        'PE' => 'Pernambuco',
        'PI' => 'Piauí',
        'RJ' => 'Rio de Janeiro',
        'RN' => 'Rio Grande do Norte',
        'RS' => 'Rio Grande do Sul',
        'RO' => 'Rondônia',
        'RR' => 'Roraima',
        'SC' => 'Santa Catarina',
        'SP' => 'São Paulo',
        'SE' => 'Sergipe',
        'TO' => 'Tocantins');

    public function get_estados() {
        return $this->estados;
    }

    public function get_sigla($nome) {
        return array_search($nome, $this->estados, true);
    }

    public function get_nome($sigla) {
        if(isset($this->estados[strtoupper($sigla)])) {
            return $this->estados[strtoupper($sigla)];
        } else {
            return NULL;
        }
    }

}
?>

