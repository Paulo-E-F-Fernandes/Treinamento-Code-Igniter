<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
    
    /*  ******AULA 7 (https://www.alura.com.br/course/codeigniter/section/7)****** */
    public function autenticar()
    {
        $email = $this->input->post('email');
        $senha = md5($this->input->post('senha'));
        
        $this->load->model('usuarios_model');
        $usuario = $this->usuarios_model->busca_por_email_senha($email, $senha);
        
        if ($usuario) {
            $this->session->set_userdata('usuario_logado', $usuario);
            /*  ******AULA 8 (https://www.alura.com.br/course/codeigniter/section/8)****** */
            // Flashdata é um dado temporário, sendo que sobrevive a uma requisição,
            // diferente de session que sobrevive várias requisições.
            $this->session->set_flashdata('message', 'Logado com sucesso!');
            $this->session->set_flashdata('type', 'success');
        } else {
            /*  ******AULA 8 (https://www.alura.com.br/course/codeigniter/section/8)****** */
            $this->session->set_flashdata('message', 'Usuário ou senha inválido!');
            $this->session->set_flashdata('type', 'danger');
        }
        
        // Necessita carregar o helper de URL
        redirect('/'); // O '/' redireciona para o controller padrão
    }
    
    /*  ******AULA 8 (https://www.alura.com.br/course/codeigniter/section/8)****** */
    public function logout()
    {
        $this->session->unset_userdata('usuario_logado');
        $this->session->set_flashdata('message', 'Deslogado com sucesso!');
        $this->session->set_flashdata('type', 'success');
        
        // Necessita carregar o helper de URL
        redirect('/'); // O '/' redireciona para o controller padrão
    }
    
}