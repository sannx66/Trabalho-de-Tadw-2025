<?php
require_once "conexao.php";
require_once "funcoes.php";

$id = $_GET['id'];

if (deletarProduto($conexao, $id)) {
    header("Location: listarProdutos.php");
    exit; // <-garante que o PHP pare aqui
} else {
    echo "Erro ao excluir produto. <a href='listaProdutos.php'>Voltar</a>";

}
?>
