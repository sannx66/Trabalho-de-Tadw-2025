<?php
session_start();

// Cria o carrinho se ainda não existir
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

if (!empty($_POST['id'])) {
    $id = $_POST['id'];
    $quantidade = 1;

    if (isset($_SESSION['carrinho'][$id])) {
        $_SESSION['carrinho'][$id] += $quantidade;
    } else {
        $_SESSION['carrinho'][$id] = $quantidade;
    }

    $_SESSION['mensagem'] = [
        'texto' => 'Item adicionado ao carrinho!',
        'tipo' => 'sucesso'
    ];
}

if (!empty($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], $_SERVER['HTTP_HOST']) !== false) {
    header("Location: " . $_SERVER['HTTP_REFERER']);
} else {
    header("Location: carrinho.php");
}
exit;
