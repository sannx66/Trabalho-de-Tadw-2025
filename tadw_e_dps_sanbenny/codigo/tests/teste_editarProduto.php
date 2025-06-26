<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";

    $idproduto = 3;

    $disponivel= 6;
    $tipo = "Milkshake";
    $nome = "Chocolate";
    $ingredientes = "Sorvete de morango, leite, calda de morango, pedaços de morango e chantilly";
    $valor_un = 22;
    

    editarProduto($conexao, $disponivel, $tipo, $nome, $ingredientes, $valor_un, $idproduto);
?>
<!-- funcionando -->
