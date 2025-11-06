<?php
session_start();
require_once "conexao.php";
require_once "funcoes.php";

$id = $_GET['id'];

if (isset($_SESSION['carrinho'][$id])) {
    unset($_SESSION['carrinho'][$id]);
}

$total = 0;
foreach ($_SESSION['carrinho'] as $id_prod => $qtd) {
    $p = pesquisarProdutoId($conexao, $id_prod);
    $total += $p['valor_un'] * $qtd;
}

$_SESSION['total_carrinho'] = $total;

echo json_encode([
    "status" => "ok",
    "total_geral" => number_format($total, 2, ',', '.')
]);
