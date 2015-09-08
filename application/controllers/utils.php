<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Utils extends CI_Controller 
{
    /*  ******AULA 14 (https://www.alura.com.br/course/codeigniter-avancado/section/5)****** */
    public function migrate()
    {
        $this->load->library("migration");
        $success = $this->migration->current();
        
        if ($success) {
            echo 'migrado!';
        } else {
            show_error($this->migration->error_string());
        }
    }

}