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

         <input type="submit" value="Entrar">
    </form>

 <button type="button" onclick="toggleSenha()">Mostrar</button>

<script>
  function toggleSenha() {
    const senhaInput = document.getElementById('senha_entrada');
    const btn = event.target;

    if (senhaInput.type === 'password') {
      senhaInput.type = 'text';
      btn.innerHTML = '<img src="../fotos/olho_aberto.png" alt="Ocultar senha" width="20">';
    } else {
      senhaInput.type = 'password';
      btn.innerHTML = '<img src="../fotos/olho_fechado.png" alt="Mostrar senha" width="20">';
    }
  }
</script>


</body>
</html>
