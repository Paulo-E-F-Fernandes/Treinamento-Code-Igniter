<?php

class Produtos_model extends CI_Model
{
    
    /*  ******AULA 2 (https://www.alura.com.br/course/codeigniter/section/2)****** */
        public function busca_todos()
    {
        return $this->db->get_where('produtos', array('vendido' => 0))->result_array();
    }
    
    /*  ******AULA 9 (https://www.alura.com.br/course/codeigniter/section/9)****** */
    public function salva($produto)
    {
        $this->db->insert('produtos', $produto);
    }
    
    /* ******AULA 10 (https://www.alura.com.br/course/codeigniter-avancado/section/1)****** */
    public function busca($id) 
    {
        return $this->db->get_where('produtos', array('id' => $id))->row_array();
    }
    
    /*  ******AULA 17 (https://www.alura.com.br/course/codeigniter-avancado/section/8)****** */
    public function busca_vendidos($usuario)
    {
        $id = $usuario["id"];
        $this->db->select("produtos.*, vendas.data_de_entrega");
        $this->db->from("produtos");
        $this->db->join("vendas", "vendas.produto_id = produtos.id");
        $this->db->where("vendido", true);
        $this->db->where("usuario_id", $id);
        return $this->db->get()->result_array();
    }
    
}