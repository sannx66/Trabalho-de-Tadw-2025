<?php
require_once "../conexao.php";
require_once "../funcoes.php";

$email = "ole@gmail.com";
$senha = "321";
$nome = "ole";
$telefone = "987654321";
$endereco = "Rua 2";
$idcliente = 1;

editarCliente($conexao, $email, $senha, $nome, $telefone, $endereco, $idcliente);
?>

<!-- funcionando -->