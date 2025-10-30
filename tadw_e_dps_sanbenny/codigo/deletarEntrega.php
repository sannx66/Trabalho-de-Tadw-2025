<?php
require_once "conexao.php";
require_once "funcoes.php";

if (isset($_GET["identrega"])) {
    $identrega = $_GET["identrega"];
    deletarEntrega($conexao, $identrega);
}

header("Location: listarEntregas.php");
exit;
?>
