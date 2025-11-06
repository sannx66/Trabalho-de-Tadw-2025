<?php
require_once "conexao.php";
require_once "funcoes.php";

if (isset($_GET["id"])) {
    $identrega = $_GET["id"];
    deletarEntrega($conexao, $identrega);
}

header("Location: listarEntregas.php");
exit;
?>
