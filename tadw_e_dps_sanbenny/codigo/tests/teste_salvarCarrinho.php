<?php
require_once "../conexao.php";
require_once "../funcoes.php";

$idcliente = 1;
$valor_entrega = 60;
$valor_total = 47;
$valor_pago = 50;
$troco = 10;
$data_hora = "2025-06-15 18:37:32";

$idcarrinho = salvarCarrinho($conexao, $idcliente, $valor_entrega, $valor_total, $valor_pago, $troco, $data_hora);

echo $idcarrinho;
?>

<!-- funcionando -->