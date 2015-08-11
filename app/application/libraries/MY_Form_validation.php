<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation {

    /**
     * MY_Form_validation::alpha_extra().
     * Alpha-numeric with periods, underscores, spaces and dashes.
     */
    function __construct() {
        parent::__construct();
        // reference to the CodeIgniter super object
        $this->CI = & get_instance();
    }

    public function hora($value) {
        $regex = '([01][0-9]|2[0-3]):[0-5][0-9]';
        $this->CI->form_validation->set_message('hora', 'Formato inválido para hora');
        if (preg_match("/".$regex."/", $value)) {
            // validation succeeded
            return true;
        } else {
            // validation failed
            $this->CI->form_validation->set_message('hora', 'Formato inválido para hora');
            return false;
        }
    }

}

?>