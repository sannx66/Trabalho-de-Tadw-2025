<?php
require_once "conexao.php";
require_once "funcoes.php";

$id = $_GET['id'];
$identrega = $_POST["identrega"];
$entregador = $_POST["entregador"];
$idcarrinho = $_POST["idcarrinho"];


if ($id == 0) {
    salvarEntrega($conexao, $identrega, $entregador, $idcarrinho);
} else {
    editarEntrega($conexao, $id, $identrega, $entregador, $idcarrinho);
}

header("Location: listarEntregas.php");