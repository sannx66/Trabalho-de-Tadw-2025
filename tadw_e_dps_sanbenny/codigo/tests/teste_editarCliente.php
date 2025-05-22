<?php
require_once "../conexao.php";
require_once "../funcoes.php";

$email = "san@gmail.com";
$senha = "321";
$nome = "san";
$telefone = "987654321";
$endereco = "Rua 2";
$codigo = 1;

editarCliente($conexao, $email, $senha, $nome, $telefone, $endereco);
?>