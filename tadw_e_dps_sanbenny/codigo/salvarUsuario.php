<?php

require_once "./conexao.php";
require_once "./funcoes.php";

$email = $_POST['email'];
$senha = $_POST['senha'];
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$endereco = $_POST['endereco'];

$senha_hash = password_hash($senha, PASSWORD_DEFAULT);


cadastrarCliente($conexao, $email, $senha_hash, $nome, $telefone, $endereco);

 header("Location: index.php");

?>