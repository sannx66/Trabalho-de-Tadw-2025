<?php
session_start();

$id = intval($_POST['id']);

if (isset($_SESSION['carrinho'][$id])) {
    unset($_SESSION['carrinho'][$id]);
}

echo "OK";
