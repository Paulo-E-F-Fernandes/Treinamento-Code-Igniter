<?php

class Vendas_model extends CI_Model
{
    
    /*  ******AULA 15 (https://www.alura.com.br/course/codeigniter-avancado/section/6)****** */
    public function salva($venda)
    {
        $this->db->insert('vendas', $venda);
        $this->db->update('produtos',
                          array('vendido' => 1),
                          array('id' => $venda['produto_id'])
                        );
    }
    
}