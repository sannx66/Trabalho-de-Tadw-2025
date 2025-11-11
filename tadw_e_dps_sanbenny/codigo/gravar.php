<?php
session_start();
require_once "conexao.php";
require_once "funcoes.php";
require_once "verificarlogado.php";


// 🔥 NÃO pode verificar carrinho vazio aqui, pois ele é apagado no final
// pegando dados que vieram do pagamento2.php
$forma_pagamento = $_POST['forma_pagamento'];
$forma_retirada  = $_POST['forma_retirada'];
$total_final     = floatval($_POST['total_final']);
$taxa            = floatval($_POST['taxa']);

$valor_pago_informado = isset($_POST['valor_pago']) ? $_POST['valor_pago'] : "";
$troco_informado      = isset($_POST['troco']) ? $_POST['troco'] : "";

$idcliente = $_SESSION['idcliente'] ?? 1;
$data_hora = date("Y-m-d H:i:s");

// ✅ transforma valor com virgula "50,00" → 50.00
function moneyToFloat($v) {
    return floatval(str_replace(['.', ','], ['', '.'], $v));
}

// ✅ Valor entregue pelo cliente
$valor_pago = ($valor_pago_informado !== "")
    ? moneyToFloat($valor_pago_informado)
    : $total_final;

// ✅ Se informou troco → calcula troco REAL
$troco = ($troco_informado !== "")
    ? moneyToFloat($troco_informado) - $total_final
    : 0;

// ✅ NÃO deixa troco negativo
if ($troco < 0) {
    $troco = 0;
}

// ✅ SALVAR CARRINHO usando sua função
$idcarrinho = salvarCarrinho(
    $conexao,
    $idcliente,
    $taxa,
    $total_final,
    $valor_pago,
    $troco,
    $data_hora
);

// ✅ SALVAR ITENS usando sua função
foreach ($_SESSION['carrinho'] as $idproduto => $qtd) {
    salvarItemVenda($conexao, $idcarrinho, $idproduto, $qtd);
}

// ✅ SALVAR ENTREGA usando sua função
if ($forma_retirada == "delivery") {
    salvarEntrega($conexao, "a definir", $idcarrinho);
}

// ✅ limpar carrinho
unset($_SESSION['carrinho']);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Pedido Finalizado</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body id="final_page">

    <img id="final_logo" src="fotos/logo_diego.png" alt="Logo">
    <img id="final_img" src="fotos/castiel.webp" alt="Castiel">

    <h1>Pedido Finalizado!</h1>

    <p>Seu pedido foi registrado com sucesso.</p>
    <p>ID do pedido: <b><?php echo $idcarrinho; ?></b></p>

    <a href="categorias.php">Voltar ao menu</a>

</body>
</html>
