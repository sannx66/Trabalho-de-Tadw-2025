<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";

    $nome = "Fulano";
    $cpf = "321.456.234-11";
    $endereco = "Rua 1";

    cadastrarCliente($conexao, $email, $senha, $nome, $telefone, $endereco);
?>