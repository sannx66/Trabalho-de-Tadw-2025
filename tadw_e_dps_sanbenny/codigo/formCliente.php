<?php
session_start();

require_once "conexao.php";
require_once "funcoes.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = trim($_POST['email_entrada']);
    $senha = trim($_POST['senha_entrada']);

    $clientes = listarClientes($conexao);

    $emailExiste = false;
    foreach ($clientes as $cli) {
        if ($cli['email'] === $email) {
            $emailExiste = true;
            break;
        }
    }
    // verifica se o email existe no banco, e se existir ele troca o 'false ' por 'true'

    if (!$emailExiste) {
        echo "<script>
                alert('Usuário não cadastrado');
                window.location.href='formCliente.php';
              </script>";
        exit;
    }

    $iduser = verificarlogin($conexao, $email, $senha);

    if ($iduser == 0) {
        echo "<script>
                alert('Senha incorreta');
                window.location.href='formCliente.php';
              </script>";
        exit;
    }

    $_SESSION['idcliente'] = $iduser;

    $dados = pegarDadosCliente($conexao, $iduser);

    $_SESSION['nome'] = $dados['nome'];
    $_SESSION['tipo'] = $dados['tipo']; // 'c' ou 'g'

    $_SESSION['logado'] = true;

    header("Location: categorias.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="estilo.css">
     <script src="jquery-3.7.1.min.js"></script>
    <script src="jquery.validate.min.js"></script>
</head>
<body>

<img src="fotos/logo_diego.png" class="logo-canto">

<form id="form_login"  method="post">

    <label for="email_entrada">E-mail</label>
    <input type="text" name="email_entrada" id="email_entrada" placeholder="Digite seu e-mail">

    <label for="senha_entrada">Senha</label>

    <div id="login-senha">
        <input 
            type="password" 
            name="senha_entrada" 
            id="senha_entrada" 
            placeholder="Digite sua senha">

        <button type="button" class="mostrarSenhaLogin">
            <img src="fotos/olho_fechado.png" alt="">
        </button>
    </div>

    <input type="submit" value="Entrar">

    <p id="erroLogin" style="color:red; font-size:13px; font-weight:600; margin-top:10px;"></p>

</form>

<script>
$(document).ready(function(){

    $("#form_login").validate({
        rules: {
            email_entrada: {
                required: true,
                email: true
            },
            senha_entrada: {
                required: true
            }
        },
        messages: {
            email_entrada: {
                required: "Informe seu e-mail",
                email: "Digite um e-mail válido"
            },
            senha_entrada: {
                required: "Informe sua senha"
            }
        }
    });

    $(".mostrarSenhaLogin").click(function(){
        let campo = $("#senha_entrada");
        let img = $(this).find("img");

        if(campo.attr("type") === "password"){
            campo.attr("type", "text");
            img.attr("src", "fotos/olho_aberto.png");
        } else {
            campo.attr("type", "password");
            img.attr("src", "fotos/olho_fechado.png");
        }
    });

});
</script>
</body>
</html>
