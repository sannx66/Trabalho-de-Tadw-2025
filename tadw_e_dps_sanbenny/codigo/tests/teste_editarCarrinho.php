<?php
    require_once "../conexao.php";
    require_once "../funcoes.php";

    $idcarrinho = 2;

    $idcliente= 1;
    $valor_entrega = 50;
    $valor_total = 20;
    $valor_pago = 100;
    $troco = 30;
    $data_hora = "2025-05-29 09:31:32";

    
    editarCarrinho($conexao, $idcliente, $valor_entrega, $valor_total, $valor_pago, $troco, $data_hora, $idcarrinho);
   
?>

<!-- funcionando -->