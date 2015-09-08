<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produtos extends CI_Controller 
{
    
    public function index()
    {
        // Usado para exibir na tela diversas informações, não sendo necessário visualizar no console do browser.
        //$this->output->enable_profiler(TRUE);
        
        /*
        $produtos = array();
        
        $bola = array('nome' => 'Bola de Futebol', 'descricao' => 'bola', 'preco' => 300);
        $camisa = array('nome' => 'Camisa de Futebol', 'descricao' => 'camisa', 'preco' => 100);
        $meia = array('nome' => 'Meia de Futebol', 'descricao' => 'bola', 'preco' => 20);
        
        array_push($produtos, $bola, $camisa, $meia);// Colocar os produtos no array
        */
        
        /*
        $this->load->database(); // Para usar o banco de dados. *** Colocado no autoload.php ***
        */
        $this->load->model('produtos_model');
        $produtos = $this->produtos_model->busca_todos();
        
        /*
        $this->load->helper('url'); // Para usar o base_url()
        $this->load->helper('form'); // Para usar o form_open(), form_close(), form_input(), ...
        */
        $this->load->helper(array('currency')); // Para usar o numeros_em_reais(). *** Os outros helper foram colocado no autoload.php ***
                
        $dados = array('produtos' => $produtos);
        
        $this->load->template('produtos/index', $dados);
    }
    
    public function formulario ()
    {
        autorizar();
        
        $this->load->template("produtos/formulario");
    }
    
    public function novo ()
    {
        $usuario_logado = autorizar();
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nome', 'nome', 'required|min_length[5]|callback_nao_tem_palavra_melhor');
        $this->form_validation->set_rules('preco', 'preço', 'required');
        $this->form_validation->set_rules('descricao', 'descrição', 'trim|required|min_length[10]');
        $this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');
        
        $sucesso = $this->form_validation->run();
        
        if ($sucesso) {
            $produto = array(
                        'nome' => $this->input->post('nome'),
                        'descricao' => $this->input->post('descricao'),
                        'preco' => $this->input->post('preco'),
                        'usuario_id' => $usuario_logado['id']
                        );

            $this->load->model('produtos_model');
            $this->produtos_model->salva($produto);

            $this->session->set_flashdata('message', 'Produto salvo com sucesso!');
            $this->session->set_flashdata('type', 'success');

            redirect('/');
        } else {
            $this->load->template('produtos/formulario');
        }
    }
    
    public function mostra($id) // Exemplo de URL: .../mostra/2
    {
        // GET - como a informação foi concatenada a URL, para obter o id é por get().
        // Exemplo de URL: .../mostra?id=2
        //$id = $this->input->get('id');
        $this->load->model('produtos_model');
        $produto = $this->produtos_model->busca($id);
        $this->load->helper(array('typography', 'currency'));
        
        $dados = array('produto' => $produto);
        
        $this->load->template('produtos/mostra', $dados);
    }
    
    public function nao_tem_palavra_melhor($nome) {
        /* Para usar no set_rules() => callback_nao_tem_palavra_melhor */
        $posicao = strpos($nome, 'melhor');
        
        if ($posicao != FALSE) {
            return TRUE;
        } else {
            $this->form_validation->set_message('nao_tem_palavra_melhor', 'O campo %s não pode conter a palavra "melhor".');
            return FALSE;
        }
    }
    
}