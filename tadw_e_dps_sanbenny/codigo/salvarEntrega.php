<?php
require_once "conexao.php";
require_once "funcoes.php";

$id = $_GET['id'];
$entregador = $_POST["entregador"];
$idcarrinho = $_POST["idcarrinho"];


if ($id == 0) {
    salvarEntrega($conexao, $entregador, $idcarrinho);
} else {
    editarEntrega($conexao, $entregador, $idcarrinho, $id);
}

header("Location: listarEntregas.php");