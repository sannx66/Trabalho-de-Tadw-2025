<?php
    require_once "conexao.php";
    require_once "funcoes.php";

    $id = $_GET['id'];

   if ($id > 0 && function_exists('deletarCliente') && deletarCliente($conexao, $id)) {

        header("Location: listarClientes.php");
        exit();
    }
    else {
        // Falha: Redireciona para a página de erro
        header("Location: erro.php");
        exit();
    }

    ?>
