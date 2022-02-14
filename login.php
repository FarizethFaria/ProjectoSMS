<?php
session_start(); //para que o PHP entenda que vamos trabalhar com sessão
    include('conexao.php'); //Inclusão do arquivo conexao.php

    //Para evitar que o usuário acesse a página pela url sem digitar nada para submeter o formulario e vir erro:

        if(empty($_POST['usuario']) || empty($_POST['senha'])) { //Se o campo que esta a vir do POST chamado usuário ou senha estiver vazio
            header('Location: index.php'); //Redirecione de volta para o inicio
            exit(); //Redirecionar e zerar este cabeçalho
        }
    
    //Criar uma variável
        $usuario = mysqli_real_escape_string($conexao, $_POST['usuario']); //$conexao é a variavel que passa em instância da nossa conexao sendo esta o primeiro parâmetro
        $senha = mysqli_real_escape_string($conexao, $_POST['senha']); //Esta função acaba protegendo ataque de sql injection contra o login, pois realiza algumas validações e consegue verificar se esta vindo um ataque de sql injection ou não prejudicando o sistema de login

    //Criar query que vai verificar se o login está correcto ou não
        $query = "SELECT 'usuario.id', 'usuario' FROM `usuario` WHERE usuario='{$usuario}' AND senha=md5('{$senha}')"; //Para fazer uma consulta na tabela usuario se os dados inseridos fazem parte da tabela ou não.

        $result = mysqli_query($conexao, $query); //Ideia desta query é verificar se retorna regitro ou não

        $row = mysqli_num_rows($result); //variavél row de linha passamos a variável result como parâmetro, ou seja é a quantidade de linha retomada da variável result
       
        if($row ==1) {
            $_SESSION['usuario'] = $usuario; //Cria uma sessão de usuários 
            header('Location: painel.php'); //Redirecionar os usuarios ao painel
            exit(); //para fechar os cabeçalhos
        } else {
            $_SESSION['nao_autenticado'] = true; //Quando o usuário não for válido cria-se esta sessão para ele.
            header('Location: index.php');
            exit();
           
        }

?>