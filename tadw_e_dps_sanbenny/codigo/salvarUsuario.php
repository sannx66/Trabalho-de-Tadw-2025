<?php

require_once "./conexao.php";
require_once "./funcoes.php";


$idcliente = $_GET['id'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$endereco = $_POST['endereco'];
$tipo = "c";

$senha_hash = password_hash($senha, PASSWORD_DEFAULT);

if ($idcliente == 0){
    salvarCliente($conexao, $email, $senha_hash, $nome, $telefone, $endereco);
}else{
    editarCliente($conexao, $email, $senha, $nome, $telefone, $endereco, $tipo, $idcliente);
}


 header("Location: index.php");

?>
