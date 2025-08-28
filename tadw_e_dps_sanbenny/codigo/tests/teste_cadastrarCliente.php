<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";

    $email = "izabella@gmail.com";
    $senha = "olaaaaaaa";
    $nome = "san";
    $telefone = "123456789";
    $endereco = "Rua 1";
    $status = "N";
    $tipo = "C";

    cadastrarCliente($conexao, $email, $senha, $nome, $telefone, $endereco, $status, $tipo);
?>

<!-- funcionando -->