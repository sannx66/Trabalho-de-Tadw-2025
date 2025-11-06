<?php
    if (isset($_GET['id'])) {
        require_once "conexao.php";
        require_once "funcoes.php";

        $id = $_GET['id'];
        $cliente = pesquisarClienteId($conexao, $id);
        $nome = $cliente['nome'];
        $telefone = $cliente['telefone'];
        $endereco = $cliente['endereco'];
        $botao = "Atualizar";
    } else {
        $id = 0;
        $nome = "";
        $telefone = "";
        $endereco = "";
        $botao = "Cadastrar";
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cadastro de Cliente</title>

<link rel="stylesheet" href="estilo.css">

<!-- scripts -->
<script src="jquery-3.7.1.min.js"></script>
<script src="jquery.validate.min.js"></script>

<!-- ✅ arquivo correto -->
<script src="jquery.mask.js"></script>

</head>
<body>

<!-- ✅ LOGO -->
<img src="fotos/logo_diego.png" class="logo-canto">

<form id="formulario" action="salvarUsuario.php" method="post">

    E-mail: <br>
    <input type="text" name="email" id="email" placeholder="Digite seu e-mail"> 
    <br><br>

    Confirme seu e-mail: <br>
    <input type="text" name="email2" id="email2" placeholder="Confirme seu e-mail"> 
    <br><br>

    Senha: <br>
    <div class="campo-senha">
        <input type="password" name="senha" id="senha" placeholder="Digite sua senha">
        <button type="button" class="mostrarSenha" data-target="senha">
            <img src="fotos/olho_fechado.png" alt="">
        </button>
    </div>
    <br>

    Confirme sua senha: <br>
    <div class="campo-senha">
        <input type="password" name="senha2" id="senha2" placeholder="Confirme sua senha">
        <button type="button" class="mostrarSenha" data-target="senha2">
            <img src="fotos/olho_fechado.png" alt="">
        </button>
    </div>
    <br>

    Nome: <br>
    <input type="text" name="nome" id="nome" placeholder="Digite seu nome"> 
    <br><br>

    Telefone: <br>
    <input type="text" name="telefone" id="telefone" placeholder="(00) 00000-0000"> 
    <br><br>

    Endereço: <br>
    <input type="text" name="endereco" id="endereco" placeholder="Digite seu endereço"> 
    <br><br>

    <input type="submit" value="<?php echo $botao; ?>">
</form>

<script>
$(document).ready(function () {

    // ✅ máscara funcionando agora
    $('#telefone').mask('(00) 00000-0000');

    // ✅ validação funcionando
    $("#formulario").validate({
        rules: {
            email: { required: true, email: true },
            email2: { required: true, equalTo: "#email" },
            senha: { required: true },
            senha2: { required: true, equalTo: "#senha" },
            nome: { required: true, minlength: 2 },
            telefone: { required: true },
            endereco: { required: true }
        },
        messages: {
            email: { required: "Você deve informar um e-mail", email: "E-mail inválido" },
            email2: { required: "Confirme seu e-mail", equalTo: "Os e-mails devem ser iguais" },
            senha: { required: "Informe sua senha" },
            senha2: { required: "Confirme sua senha", equalTo: "As senhas devem ser iguais" },
            nome: { required: "Esse campo deve ser preenchido", minlength: "Digite pelo menos 2 letras" },
            telefone: { required: "Informe seu telefone" },
            endereco: { required: "Informe seu endereço" }
        }
    });
});

// ✅ OLHINHO FUNCIONANDO
document.querySelectorAll(".mostrarSenha").forEach(btn => {
    btn.addEventListener("click", function () {
        const campo = document.getElementById(this.dataset.target);
        const img = this.querySelector("img");

        if (campo.type === "password") {
            campo.type = "text";
            img.src = "fotos/olho_aberto.png";
        } else {
            campo.type = "password";
            img.src = "fotos/olho_fechado.png";
        }
    });
});
</script>

</body>
</html>
