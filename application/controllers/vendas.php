<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vendas extends CI_Controller 
{
    public function nova()
    {
        $usuario = autorizar();
        
        $venda = array(
                    'produto_id' => $this->input->post('produto_id'),
                    'comprador_id' => $usuario['id'],
                    'data_de_entrega' => data_PtBr_para_mysql($this->input->post('data_entrega'))
                    );
        
        $this->load->model(array("vendas_model", "produtos_model", "usuarios_model"));
        $this->vendas_model->salva($venda);
        
        /* Envio de e-mail */
        /* ***
        $this->load->library("email");
        $config["protocol"] = "smtp";
        $config["smtp_host"] = "ssl://smtp.gamil.com";
        $config["smtp_user"] = "email_da_aplicacao@gmail.com";
        $config["smtp_pass"] = "senha_do_email_da_aplicacao";
        $config["charset"] = "utf-8";
        $config["mailtype"] = "html";
        $config["newline"] = "\r\n";
        $config["smtp_port"] = "465";
        $this->email->initialize($config);
        
        $produto = $this->produtos_model->busca($venda['produto_id']);
        $vendedor = $this->usuarios_model->busca($produto['usuario_id']);
        
        $dados = array("produto", $produto);
        $conteudo = $this->load->view("vendas/email", $dados, TRUE); // O TRUE é para não renderizar a página e deolver para a variável $conteudo.
        
        // O e-mail propriamente dito.
        $this->email->from("email_da_aplicacao@gmail.com", "Mercado");
        $this->email->to($vendedor['email']);
        $this->email->subject("Seu produto {$produto['nome']} foi vendido!");
        $this->email->message($conteudo);
        $this->email->send();
        *** */
        /* Fim do envio de e-mail */
                
        $this->session->set_flashdata('message', 'Pedido de compra efetuado com sucesso!');
        $this->session->set_flashdata('type', 'success');
            
        redirect('/');
    }
    
    public function index() 
    {
        autorizar();
        $usuario = $this->session->userdata("usuario_logado");
        $this->load->model("produtos_model");
        $produto_vendidos = $this->produtos_model->busca_vendidos($usuario);
        $dados = array("produtos_vendidos" => $produto_vendidos);
        $this->load->template("vendas/index", $dados);
    }
    
}