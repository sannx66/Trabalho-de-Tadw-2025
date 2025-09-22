
<?php
require_once "conexao.php";
require_once "funcoes.php";

    $id=$_GET['id'];
    $disponivel=  $_POST['disponivel'];
    $tipo =  $_POST['tipo'];
    $nome =  $_POST['nome'];
    $ingredientes = $_POST['ingredientes'];
    $valor_un = $_POST['valor_un'];
    $observacoes = $_POST['observacoes'];


$nome_arquivo = $_FILES['foto']['name'];
$caminho_temporario = $_FILES['foto']['tmp_name'];


//pega a extensão do arquivo
$extensao = pathinfo($nome_arquivo, PATHINFO_EXTENSION);

//gerar um novo nome para o arquivo
$novo_nome = uniqid() . "." . $extensao;

//criar um novo caminho para o arquivo
// lembre-se de criar a pasta e ajustar as permissões
$caminho_destino = "fotos/" . $novo_nome;

// move a foto para o servidor
move_uploaded_file($caminho_temporario, $caminho_destino);

if ($id == 0) {
    salvarProduto($conexao, $nome_arquivo,$disponivel, $tipo, $nome, $ingredientes, $valor_un, $observacoes);
} else {
    editarProduto($conexao,$nome_arquivo, $disponivel, $tipo, $nome, $ingredientes, $valor_un, $observacoes);
}

header("Location: listarProdutos.php");