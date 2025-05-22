<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";

    $idproduto = 1;

    $disponivel= "3";
    $tipo = "Milkshake";
    $nome = "Oreo";
    $ingredientes = "Sorvete de chocolate, leite, calda de chocolate, pedaços de oreo e chantilly";
    $valor_un = 22;
    

    editarProduto($conexao, $disponivel, $tipo, $nome, $ingredientes, $valor_un, $idproduto);
?>

