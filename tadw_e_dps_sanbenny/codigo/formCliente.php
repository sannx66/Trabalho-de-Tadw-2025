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
                minlength: 3 // Você pode ajustar o comprimento mínimo de caracteres para a senha, se necessário
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
                minlength: "A senha deve ter no mínimo 3 caracteres"
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

        <input type="submit" value="Entrar">
    </form>

</body>
</html>