<?php
require_once "conexao.php";
require_once "funcoes.php";

$id = $_GET['id'];

if (deletarCarrinho($conexao, $id)) {
    header("Location: listarCarrinho.php");
    exit; // <-garante que o PHP pare aqui
} else {
    echo "Erro ao excluir produto. <a href='listaCarrinho.php'>Voltar</a>";

}
?>
