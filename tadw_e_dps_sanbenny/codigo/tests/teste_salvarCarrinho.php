<?php
require_once "../conexao.php";
require_once "../funcoes.php";

$idcliente = 1;
$valor_entrega = 5;
$valor_total = 52;
$valor_pago = 52;
$troco = 0;
$data_hora = "2025-03-27- 16h37";

$idcarrinho = salvarCarrinho($conexao, $idcliente, $valor_entrega, $valor_total, $valor_pago, $troco, $data_hora);

echo $idcarrinho;
?>