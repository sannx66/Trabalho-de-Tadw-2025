<?php
// require_once "./conexao.php";

// if (session_status() == PHP_SESSION_NONE) {
//     session_start();   //verifica se uma sessão já foi iniciada antes de tentar iniciá-la novamente, prevenindo erros no código
// }

// // Verifica se o cliente está logado
// if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
//     header("Location: index.php");
//     exit();
// }

// // Garante que o ID do cliente está definido
// if (!isset($_SESSION['idcliente'])) {
//     echo "Erro: cliente não identificado.";
//     exit();
// }

// // Cria a variável $idcliente para uso nos outros scripts
// $idcliente = $_SESSION['idcliente'];

session_start();
if (!isset($_SESSION['logado'])) {
    header("Location: index.php");
}
?>