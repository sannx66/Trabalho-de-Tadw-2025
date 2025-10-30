<?php
include_once("conexao.php");
include_once("funcoes.php");

$identrega = $_POST["identrega"];
$entregador = $_POST["entregador"];
$idcarrinho = $_POST["idcarrinho"];

if ($identrega == "") {
    salvarEntrega($conexao, $entregador, $idcarrinho);
} else {
    editarEntrega($conexao, $entregador, $idcarrinho, $identrega);
}

header("Location: listarEntregas.php");
exit;
?>
