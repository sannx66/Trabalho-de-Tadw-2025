<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";

    $nome = "joao";
    $email = "joao@gmail.com";
    $senha = "ias";

    echo "<pre>";
    print_r(verificarLogin($conexao, $email, $senha));
    echo "</pre>";
?>