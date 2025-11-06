<?php
session_start();
require_once "conexao.php";
require_once "funcoes.php";

$id = $_POST['id'];
$qtd = $_POST['quantidade'];

$_SESSION['carrinho'][$id] = $qtd;

// calcular total individual
$produto = pesquisarProdutoId($conexao, $id);
$total_item = $produto['valor_un'] * $qtd;

// calcular total geral
$total = 0;
foreach ($_SESSION['carrinho'] as $id_prod => $qtdX) {
    $p = pesquisarProdutoId($conexao, $id_prod);
    $total += $p['valor_un'] * $qtdX;
}

$_SESSION['total_carrinho'] = $total;

echo json_encode([
    "status" => "ok",
    "total_item" => number_format($total_item, 2, ',', '.'),
    "total_geral" => number_format($total, 2, ',', '.')
]);
