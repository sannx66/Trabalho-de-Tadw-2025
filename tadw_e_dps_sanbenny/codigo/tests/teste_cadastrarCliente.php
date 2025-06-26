<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";

    $email = "joao@gmail.com";
    $senha = "ias";
    $nome = "joao";
    $telefone = "123456789";
    $endereco = "Rua 1";

    cadastrarCliente($conexao, $email, $senha, $nome, $telefone, $endereco);
?>

<!-- funcionando -->