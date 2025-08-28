<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";

    
    $disponivel=  $_GET['disponivel'];
    $tipo =  $_GET['tipo'];
    $nome =  $_GET['nome'];
    $ingredientes = $_GET['ingredientes'];
    $valor_un = $_GET['valor_un'];
    $observacoes = $_GET['observacoes'];
    

    salvarProduto($conexao, $disponivel, $tipo, $nome, $ingredientes, $valor_un, $observacoes);
?>