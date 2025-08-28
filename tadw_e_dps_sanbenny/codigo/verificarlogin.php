<?php
    require_once "./conexao.php";
    require_once "./funcoes.php";


    $email = $_POST['email'];


    verificarLogin($conexao, $email); 

    if (mysqli_num_rows($resultado) == 0) {
        header("Location: nao_logado.php");
    }
    else {
        $linha = mysqli_fetch_assoc($resultado);
        $senha_banco = $linha['senha'];
        $tipo = $linha['tipo'];

        if (password_verify($senha, $senha_banco)) {
            session_start();
            $_SESSION['logado'] = 'sim';
            $_SESSION['tipo'] = $tipo;
            header("Location: home.php");
        }
        else {
            header("Location: index.php");
        }
    }
?>
