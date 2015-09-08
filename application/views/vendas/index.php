
            <h1>Produtos vendidos</h1>
            <table class="table">
                <?php foreach ($produtos_vendidos as $produto) : ?>
                    <tr>
                        <td><?php echo $produto["nome"]; ?></td>
                        <td><?php echo data_mysql_para_PtBr($produto["data_de_entrega"]); ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            
            
