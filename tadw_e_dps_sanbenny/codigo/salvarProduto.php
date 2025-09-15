
<?php
require_once "../conexao.php";
require_once "../funcoes.php";

    $foto =  $_GET['foto'];
    $disponivel=  $_GET['disponivel'];
    $tipo =  $_GET['tipo'];
    $nome =  $_GET['nome'];
    $ingredientes = $_GET['ingredientes'];
    $valor_un = $_GET['valor_un'];
    $observacoes = $_GET['observacoes'];

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
    salvarProduto($conexao, $disponivel, $tipo, $nome, $ingredientes, $valor_un, $observacoes);
} else {
    editarProduto($conexao, $disponivel, $tipo, $nome, $ingredientes, $valor_un, $observacoes);
}

header("Location: listarProduto.php");