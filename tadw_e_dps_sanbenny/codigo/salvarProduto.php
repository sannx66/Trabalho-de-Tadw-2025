<?php
require_once "conexao.php";
require_once "funcoes.php";

$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
$disponivel = $_POST['disponivel'];
$tipo = $_POST['tipo'];
$nome = $_POST['nome'];
$ingredientes = $_POST['ingredientes'];
$valor_un = $_POST['valor_un'];
$observacoes = $_POST['observacoes'];

$nome_arquivo = $_FILES['foto']['name'];
$caminho_temporario = $_FILES['foto']['tmp_name'];
$extensao = pathinfo($nome_arquivo, PATHINFO_EXTENSION);
$novo_nome = uniqid() . "." . $extensao;
$caminho_destino = "fotos/" . $novo_nome;

move_uploaded_file($caminho_temporario, $caminho_destino);

$foto = $novo_nome;

if ($id == 0) {
    salvarProduto($conexao, $foto, $disponivel, $tipo, $nome, $ingredientes, $valor_un, $observacoes);
} else {
    editarProduto($conexao, $foto, $disponivel, $tipo, $nome, $ingredientes, $valor_un, $observacoes);
}

// Redireciona e encerra
header("Location: ./listarProdutos.php");
exit;
