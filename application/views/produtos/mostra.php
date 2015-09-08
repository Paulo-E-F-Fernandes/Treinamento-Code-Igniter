
            <h1><?php echo $produto['nome']; ?></h1>
            <hr>
            Preço: <?php echo numeros_em_reais($produto['preco']); ?>
            <hr>
            <!-- Sempre utilizar o html_escape() para exibir dados que o usuário cadastrou. -->
            <?php echo auto_typography(html_escape($produto['descricao'])); ?>
            <hr>
            <h2>Compre agora mesmo!</h2>    
            <?php
                echo form_open('vendas/nova');
                
                echo form_hidden('produto_id', $produto['id']);
                
                echo form_label('Data de entrega:', 'data_de_entrega');
                echo form_input(
                            array(
                                'id' => 'data_de_entrega',
                                'name' => 'data_entrega',
                                'class' => 'form-control',
                                'value' => ''
                            )
                        );
                
                echo form_button(
                            array(
                                'content' => 'Comprar',
                                'type' => 'submit',
                                'class' => 'btn btn-primary'
                            )
                        );
                
                echo form_close();
            ?>
            
