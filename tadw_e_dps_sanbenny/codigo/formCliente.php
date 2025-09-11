<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="jquery-3.7.1.min.js"></script>
    <script src="jquery.validate.min.js"></script>
    <script>
    $(document).ready(function () {
        $("#formulario").validate({
            // regras para cada campo
            rules: {
                email: {
                    required: true,
                    email: true
                },
               
                senha: {
                    required: true,
                    minlength: 6
                }
            },
            // mensagens de erro para cada regra
            messages: {
                email: {
                    required: "Você deve informar um e-mail",
                    email: "Por favor, informe um e-mail válido"
                },
               
                senha: {
                    required: "Você deve informar uma senha",
                    minlength: "A senha deve ter pelo menos 6 caracteres"
                }
            }
        })
    });
</script>
<style>
  .error {
  color: blue;
 }
</style>
</head>
<body>
    <h1>Le Douce Amoux</h1>

    <form id="login" action="verificarlogin.php" method="post">
        E-mail: <br>
        <input type="text" name="email" id="email"> <br><br>
        Senha: <br>
        <input type="text" name="senha" id="senha"> <br><br>

        <input type="submit" value="Acessar">

            


    </form>
</body>
</html>

