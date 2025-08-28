<?php

require_once "./conexao.php";
require_once "./funcoes.php";

$email = $_POST['email'];
$senha = $_POST['senha'];
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$endereco = $_POST['endereco'];


cadastrarCliente($conexao, $email, $senha, $nome, $telefone, $endereco);


?>