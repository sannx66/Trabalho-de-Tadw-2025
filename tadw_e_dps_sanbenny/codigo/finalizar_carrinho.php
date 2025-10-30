<?php
session_start();
require_once "./conexao.php";
require_once "./funcoes.php";
require_once "./verificarlogado.php";

// Verifica se o carrinho está vazio
if (empty($_SESSION['carrinho'])) {
    echo "Carrinho vazio. Nada para salvar.";
    exit;
}

// Verifica se o ID do cliente está definido (vem da sessão, provavelmente)
if (!isset($_SESSION['idcliente'])) {
    echo "Erro: cliente não identificado.";
    exit;
}

$idcliente = $_SESSION['idcliente'];

// Calcula total do carrinho
$total = 0;
foreach ($_SESSION['carrinho'] as $idproduto => $quantidade) {
    $total += calculoTotal($conexao, $idproduto, $quantidade);
}

// Exemplo: valor fixo de entrega (pode melhorar depois)
$valor_entrega = 10.00;
$valor_pago = 0;
$troco = 0;
$data_hora = date('Y-m-d H:i:s');

// Salva o carrinho/venda
$idcarrinho = salvarCarrinho($conexao, $idcliente, $valor_entrega, $total, $valor_pago, $troco, $data_hora);

if (!$idcarrinho) {
    echo "Erro ao salvar a compra.";
    exit;
}

// Salva cada item do carrinho
foreach ($_SESSION['carrinho'] as $idproduto => $quantidade) {
    salvarItemVenda($conexao, $idcarrinho, $idproduto, $quantidade);
}

// Limpa o carrinho da sessão
unset($_SESSION['carrinho']);

// Redireciona para a página de confirmação
header("Location: confirmacao.php?idvenda=$idcarrinho");
exit;
?>