<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";

    
    $disponivel= 4;
    $tipo = "bebida";
    $nome = "uhum";
    $ingredientes = "ola";
    $valor_un = 3;
    

    salvarProduto($conexao, $disponivel, $tipo, $nome, $ingredientes, $valor_un);
?>
 