<?php
require_once "conexao.php";
require_once "funcoes.php";

$email = $_POST['email_entrada'];
$senha = $_POST['senha_entrada'];

$idcliente = verificarlogin($conexao, $email, $senha);
var_dump($idcliente);

// if ($idcliente == 0) {
//     header("Location: ./home.php");
// } else {
//     $cliente = pegarDadosCliente($conexao, $idcliente);

//     if ($cliente == 0) {
//         header("Location: ./home.php");
//     } else {
//         session_start();
//         $_SESSION['logado'] = 'sim';
//         $_SESSION['tipo'] = $cliente['tipo'];
//         $_SESSION['nome'] = $cliente['nome'];
//         header("Location: ./home.php");
//     }