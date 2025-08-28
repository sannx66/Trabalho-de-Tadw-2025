<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";

    $email = "siego@gmail.com";
    $senha = "123";
    $nome = "san";
    $telefone = "123";
    $endereco = "Rua 1";
    $status = "N";
    $tipo = "C";

    cadastrarCliente($conexao, $email, $senha, $nome, $telefone, $endereco, $status, $tipo);
?>

<!-- funcionando -->