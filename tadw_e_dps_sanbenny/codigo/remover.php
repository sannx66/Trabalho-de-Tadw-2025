<?php
session_start();

$id = $_POST['id'] ?? null;

if ($id && isset($_SESSION['carrinho'][$id])) {
    unset($_SESSION['carrinho'][$id]);
}

// não redireciona pois está usando ajax e não precisa redirecionar a página porque ele não vai na página em si, só usa ela
echo "OK";
