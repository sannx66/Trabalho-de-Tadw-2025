<?php
session_start();

if (!empty($_POST['quantidade'])) {
    foreach ($_POST['quantidade'] as $idproduto => $quantidade) {
        $quantidade = (int)$quantidade;
        if ($quantidade > 0) {
            $_SESSION['carrinho'][$idproduto] = $quantidade;
        } else {
            unset($_SESSION['carrinho'][$idproduto]);
        }
    }
}

// Redireciona de volta para o carrinho
header("Location: carrinho.php");
exit;
?>