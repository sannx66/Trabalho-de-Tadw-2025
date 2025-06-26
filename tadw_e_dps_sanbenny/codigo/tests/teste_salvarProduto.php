<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";

    
    $disponivel= 5;
    $tipo = "Milkshake";
    $nome = "Sensação";
    $ingredientes = "Sorvete de morango, leite, calda de chocolate, brigadeiro, cereja, pedaços de morango, granulados e chantilly";
    $valor_un = 25;
    $observacoes = "sem morango";
    

    salvarProduto($conexao, $disponivel, $tipo, $nome, $ingredientes, $valor_un, $observacoes);
?>
 
<!-- funcionando -->