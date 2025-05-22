<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";

    $email = "Fulano@gmail.com";
    $senha = "123";
    $nome = "Fulano";
    $telefone = "123456789";
    $endereco = "Rua 1";

    cadastrarCliente($conexao, $email, $senha, $nome, $telefone, $endereco);
?>