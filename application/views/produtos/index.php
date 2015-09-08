
            
            <h1>Produtos</h1>
            <table class="table">
                <?php foreach ($produtos as $produto) : ?>
                    <tr>
                        <td>
                            <?php
                                /* echo anchor('produtos/mostra?id=' . $produto['id'], $produto['nome']); */
                                /* echo anchor('produtos/mostra/' . $produto['id'], $produto['nome']); */
                                echo anchor('produtos/' . $produto['id'], $produto['nome']);
                            ?>
                        </td>
                        <td><?php echo character_limiter(html_escape($produto['descricao']), 10); ?></td>
                        <td><?php echo numeros_em_reais($produto['preco']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            
            <?php if ( ! $this->session->userdata('usuario_logado')) : ?>
            
            <h1>Login</h1>
            <?php
            echo form_open('login/autenticar');
            
            /* E-mail do Usuário */
            echo form_label('E-mail', 'email_X87X_usuario');
            echo form_input(array(
                                'id' => 'email_X87X_usuario',
                                'name' => 'email',
                                'class' => 'form-control',
                                'maxlength' => '255'
                                ));
            
            /* Senha do Usuário */
            echo form_label('Senha', 'senha_usuario');
            echo form_password(array(
                                    'id' => 'senha_usuario',
                                    'name' => 'senha',
                                    'class' => 'form-control',
                                    'maxlength' => '255'
                                    ));
            
            /* Botões */
            echo form_button(array(
                                'class' => 'btn btn-primary',
                                'content' => 'Login',
                                'type' => 'submit'
                                ));
            
            echo form_close();
            ?>
            
            <h1>Cadastro</h1>
            <?php 
            echo form_open('usuarios/novo');
            
            /* Nome do Usuário */
            echo form_label('Nome', 'nome_usuario_22X');
            echo form_input(array(
                                'id' => 'nome_usuario_22X',
                                'name' => 'nome',
                                'class' => 'form-control',
                                'maxlength' => '255'
                                ));
            
            /* E-mail do Usuário */
            echo form_label('E-mail', 'email_X87X_usuario');
            echo form_input(array(
                                'id' => 'email_X87X_usuario',
                                'name' => 'email',
                                'class' => 'form-control',
                                'maxlength' => '255'
                                ));
            
            /* Senha do Usuário */
            echo form_label('Senha', 'senha_usuario');
            echo form_password(array(
                                    'id' => 'senha_usuario',
                                    'name' => 'senha',
                                    'class' => 'form-control',
                                    'maxlength' => '255'
                                    ));
            
            /* Botões */
            echo form_button(array(
                                'class' => 'btn btn-primary',
                                'content' => 'Cadastrar',
                                'type' => 'submit'
                                ));
            
            echo form_close();
            ?>
            
            <?php else : ?>
            
                <?php echo anchor('produtos/formulario', 'Novo produto', array('class' => 'btn btn-primary')); ?>
                <?php echo anchor('login/logout', 'Logout', array('class' => 'btn btn-primary')); ?>
            
            <?php endif; ?>

