<?php
session_start();
require_once "conexao.php";
require_once "funcoes.php";

$id = intval($_POST['id']);
$qtd = intval($_POST['quantidade']);

if ($qtd < 1) { 
    $qtd = 1;
}

$_SESSION['carrinho'][$id] = $qtd;

echo "OK";
