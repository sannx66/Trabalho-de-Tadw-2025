<?php
require_once "conexao.php";
require_once "funcoes.php";

$id = $_GET['id'];

if (deletarProduto($conexao, $id)) {
    header("Location: listarProduto.php");
} else {
    header("Location: erro.php");
}
?>