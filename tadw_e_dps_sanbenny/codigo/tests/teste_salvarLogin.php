<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";

    $nome = "joao";
    $email = "joao@gmail.com";
    $senha = "1234";

    salvarLogin($conexao, $nome, $email, $senha);
?>