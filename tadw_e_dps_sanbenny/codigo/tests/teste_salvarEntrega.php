<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";
    
    $entregador= "Jin woo";
    $idcarrinho = 1;

    salvarEntrega($conexao, $entregador, $idcarrinho);
?>
<!-- funcionando -->