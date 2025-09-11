
<?php
    require_once "conexao.php";
    require_once "funcoes.php";

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $idcliente = verificarlogin($conexao, $email, $senha);

    if ($idcliente == 0) {
        header("Location: index.php");
    }
    else {
        $usuario = pegarDadosUsuario($conexao, $idcliente);
        
        if ($usuario == 0) {
            header("Location: index.php");
        }
        else {
            session_start();
            $_SESSION['logado'] = 'sim';
            $_SESSION['tipo'] = $usuario['tipo'];
            $_SESSION['nome'] = $usuario['nome'];
            header("Location: home.php");
        }
    }
?>