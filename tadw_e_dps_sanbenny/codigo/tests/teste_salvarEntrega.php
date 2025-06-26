<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";
    
    $entregador= "Jin Woo";
    $idcarrinho = 3;

    salvarEntrega($conexao, $entregador, $idcarrinho);
?>
<!-- funcionando -->