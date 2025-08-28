<?php

require_once "conexao.php";

$email = $_POST['nome'];
$senha = $_POST['email'];
$nome = $_POST['senha'];
$telefone = $_POST['senha'];
$endereco = $_POST['senha'];


$senha_hash = password_hash($senha, PASSWORD_DEFAULT);

$sql = "INSERT INTO tb_cliente (email, senha, nome, telefone, endereco, status, tipo) VALUES ('$email', '$senha', '$senha_hash', '$nome', '$telefone', 'd', 'c')";

mysqli_query($conexao, $sql);

header("Location: categorias.php");
?>