<?php
require_once "../conexao.php";
require_once "../funcoes.php";

$idcliente = 1;
$valor_entrega = 0;
$valor_total = 47;
$valor_pago = 50;
$troco = 3;
$data_hora = "2025-06-15 18:37:32";

// lembrar do carrinho de compras
$produtos = [
    //  produto, quantidade
        [1, 3], 
        [3, 5], 
        [2, 1],
    ];

    $idcarrinho = salvarCarrinho ($conexao, $idcliente, $valor_entrega, $valor_total, $valor_pago, $troco, $data_hora);

  
    // for ($i = 0; $i < sizeof($produtos); $i++) {
//     salvarItemVenda($conexao, $id_venda, $produto[$i], $quantide[$i]);
// }

// quebra a variável $produto em $p (cada uma das 3 partes)
foreach ($produtos as $p) {
    salvarItemVenda($conexao, $idcarrinho, $p[0], $p[1]);
}