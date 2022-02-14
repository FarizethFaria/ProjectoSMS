<?php
//session_start(); //para que o PHP entenda que vamos trabalhar com sessão 
include('verifica_login.php');//verica se o usuario está cadastrado para ter acesso ao painel.
?>
<h2>Olá, <?php echo $_SESSION['usuario'];//para mostrar no painel o usuario que está logado?></h2> 
<h2><a href="logout.php">Sair</a></h2> 
