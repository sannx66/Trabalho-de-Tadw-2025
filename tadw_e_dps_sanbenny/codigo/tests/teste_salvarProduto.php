<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";

    
    $disponivel= 5;
    $foto = '../fotos/68d18cb824d1d.php';
    $tipo = "Bolo";
    $nome = "Sensação";
    $ingredientes = "Sorvete de morango, leite, calda de chocolate, brigadeiro, cereja, pedaços de morango, granulados e chantilly";
    $valor_un = 25;
    $observacoes = "sem morango";
    

    salvarProduto($conexao, $foto, $disponivel, $tipo, $nome, $ingredientes, $valor_un, $observacoes);
?>
 
<!-- funcionando -->