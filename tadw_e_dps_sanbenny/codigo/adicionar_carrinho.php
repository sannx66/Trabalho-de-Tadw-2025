<?php
session_start();

// Cria o carrinho se ainda não existir
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

// Verifica se o ID foi enviado pelo formulário
if (!empty($_POST['id'])) {
    $id = $_POST['id'];
    $quantidade = 1; // você pode trocar por $_POST['quantidade'] se quiser permitir isso depois

    // Se o produto já estiver no carrinho, aumenta a quantidade
    if (isset($_SESSION['carrinho'][$id])) {
        $_SESSION['carrinho'][$id] += $quantidade;
    } else {
        $_SESSION['carrinho'][$id] = $quantidade;
    }
}

// Redireciona para o carrinho
header("Location: carrinho.php");
exit;
