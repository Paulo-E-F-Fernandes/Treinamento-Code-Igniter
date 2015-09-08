
            <h1>Cadastro de novo produto</h1>
            
            <!--<? php echo validation_errors('<p class="alert alert-danger">', '</p>'); ?>-->
            
            <?php
                echo form_open('produtos/novo');

                /* Nome do Produto */
                echo form_label('Nome', 'nome');
                echo form_input(array(
                                    'id' => 'nome',
                                    'name' => 'nome',
                                    'class' => 'form-control',
                                    'maxlength' => '255',
                                    'value' => set_value('nome', '')
                                    ));
                echo form_error('nome');

                /* Preço do Produto */
                echo form_label('Preço', 'preco');
                echo form_input(array(
                                    'id' => 'preco',
                                    'name' => 'preco',
                                    'class' => 'form-control',
                                    'maxlength' => '255',
                                    'type' => 'number',
                                    'value' => set_value('preco')
                                    ));
                echo form_error('preco');

                /* Descrição do Produto */
                echo form_label('Descrição', 'descricao');
                echo form_textarea(array(
                                        'id' => 'descricao',
                                        'name' => 'descricao',
                                        'class' => 'form-control',
                                        'value' => set_value('descricao')
                                        ));
                echo form_error('descricao');

                /* Botões */
                echo form_button(array(
                                    'class' => 'btn btn-primary',
                                    'content' => 'Cadastrar',
                                    'type' => 'submit'
                                    ));

                echo form_close();
            ?>
