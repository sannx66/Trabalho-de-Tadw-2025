<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="estilo.css">
    <script src="./jquery-3.7.1.min.js"></script>
    <script src="./jquery.validate.min.js"></script>
<script>
    $(document).ready(function () {
    $("#formulario_entrada").validate({
        // regras para cada campo
        rules: {
            email_entrada: {
                required: true,
                email: true // Adiciona uma validação para garantir que o campo seja um e-mail válido
            },
            senha_entrada: {
                required: true,
            }
        },
        // mensagens de erro para cada regra
        messages: {
            email_entrada: {
                required: "Você deve informar um e-mail",
                email: "Por favor, insira um e-mail válido"
            },
            senha_entrada: {
                required: "Você deve informar uma senha",
            }
        }
    });
});
</script>
<style>
        .error {
            color: red;
        }
</style>
</head>
<body>
    <form id="formulario_entrada" action="./verificarlogin.php" method="post">
        E-mail: <br>
        <input type="text" name="email_entrada" id="email_entrada"> <br><br>

        Senha: <br>
        <input type="password" name="senha_entrada" id="senha_entrada"><br><br>

           <button id="mostrarSenha">Mostrar senha</button>

    <script>
        $(document).ready(function() {
            $('#mostrarSenha').click(function() {
                let tipo = $('#senha_entrada').attr('type');
                if (tipo == 'password') {
                    $('#senha_entrada').attr('type', 'text');
                } else {
                    $('#senha_entrada').attr('type', 'password');
                }
            });
        });
    </script>

         <input type="submit" value="Entrar">
    </form>




</body>
</html>
