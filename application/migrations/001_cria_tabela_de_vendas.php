<?php

class Migration_Cria_tabela_de_vendas extends CI_Migration
{
    /*  ******AULA 14 (https://www.alura.com.br/course/codeigniter-avancado/section/5)****** */
    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'auto_increment' => true
            ),
            'produto_id' => array (
                'type' => 'INT'
            ),
            'comprador_id' => array(
                'type' => 'INT'
            ),
            'data_de_entrega' => array(
                'type' => 'DATE'
            )
        ));
        $this->dbforge->add_key('id', true);
        $this->dbforge->create_table('vendas');
    }
    
    /*  ******AULA 14 (https://www.alura.com.br/course/codeigniter-avancado/section/5)****** */
    public function down()
    {
        $this->dbforge->drop_table('vendas');
    }
    
}