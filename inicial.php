<?php

include("conexao.php");

$sql_code = " SELECT * FROM usuario ";

$sql_query = $mysqli->query($sql_code) or die ($mysqli->erro);

$linha = $sql_query->fetch_assoc();

?>
<h1>Usuários</h1>
<a href="cadastrar.php">Cadastrar um usuario</a>
<p class="espaco"></p>
<table border=1 cellpadding=10>
    <tr class="titulo">
        <td>Nome</td>
        <td>Usuário</td>
        <td>Senha</td>
        <td>Data de Cadastro</td>
    </tr>
</table>
