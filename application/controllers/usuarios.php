<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller
{
    
    /*  ******AULA 5 (https://www.alura.com.br/course/codeigniter/section/5)****** */
    public function novo()
    {
        /*  ******AULA 6 (https://www.alura.com.br/course/codeigniter/section/6)****** */
        // Usado para exibir na tela diversas informações, não sendo necessário visualizar no console do browser.
        //$this->output->enable_profiler(TRUE);
        
        
        $usuario = array(
                        'nome' => $this->input->post('nome'),
                        'email' => $this->input->post('email'),
                        'senha' => md5($this->input->post('senha'))
                        );
        
        /*
        $this->load->database();
        */
        $this->load->model('usuarios_model');
        $this->usuarios_model->salva($usuario);
        
        $this->load->template('usuarios/novo');
    }
    
}