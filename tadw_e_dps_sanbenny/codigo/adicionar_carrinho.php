<?php
session_start();

// Cria o carrinho se ainda não existir
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

// Verifica se o ID foi enviado pelo formulário
if (!empty($_POST['id'])) {
    $id = $_POST['id'];
    $quantidade = 1; // pode trocar por $_POST['quantidade']

    // Se o produto já estiver no carrinho, aumenta a quantidade
    if (isset($_SESSION['carrinho'][$id])) {
        $_SESSION['carrinho'][$id] += $quantidade;
    } else {
        $_SESSION['carrinho'][$id] = $quantidade;
    }

    // Mensagem temporária
    $_SESSION['mensagem'] = [
        'texto' => 'Item adicionado ao carrinho!',
        'tipo' => 'sucesso'
    ];
}

// Redireciona de volta à página de origem
if (!empty($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], $_SERVER['HTTP_HOST']) !== false) {
    header("Location: " . $_SERVER['HTTP_REFERER']);
} else {
    header("Location: carrinho.php");
}
exit;
