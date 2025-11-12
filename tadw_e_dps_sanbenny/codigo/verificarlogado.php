<?php


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// pq senão dá erro no carrinho, já q ele é sessão e já tem uma sessão aqui


if (!isset($_SESSION['logado'])) { 
    header("Location: index.php");
}
?>
