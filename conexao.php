<?php
    //Declaração de 4 constantes 
        define('HOST','127.0.0.1'); //Chama-se host e vai ser o Ip do banco de dados do mysql
        define('USUARIO', 'root'); //Chama-se usuário do banco de daods que é root
        define('SENHA', ''); //Senha do usuário
        define('DB', 'login'); //Nome da base de dados que chama-se cadastro
    //A criação destas constantes é para facilitarem, se rodar a aplicação local estes são os dados e se for numa outra máquina é so alterar estes mesmos dados.
    
    //Criação de variável
        $conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar'); //Esta função recebe as constantes na ordem, e o *or die - se ele não conseguir conectar então vai dar um erro*
?>