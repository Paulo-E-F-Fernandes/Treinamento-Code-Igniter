Quando precisamos criar uma tabela novo para a aplicação podemos utilizar o processo para 
migrar as nossas tabelas com bibliotecas já existentes e o Code Igniter possui a biblioteca 
"migration".

Por default, o migration está desativado. 

Para ativar o migration é necessários:
1o. Acessar o arquivo "application/config/migration.php"
2o. Alterar o "$config['migration_enabled'] = FALSE;" para "TRUE"
3o. Alterar o "$config['migration_version'] = 0;" para "1"