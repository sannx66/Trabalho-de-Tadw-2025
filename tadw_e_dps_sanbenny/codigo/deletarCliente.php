<?php
require_once "conexao.php";
require_once "funcoes.php";

$id = $_GET['id'];

if (deletarEntrega($conexao, $id)) {
    header("Location: listarEntregas.php");
} else {
    header("Location: erro.php");
}
?>
