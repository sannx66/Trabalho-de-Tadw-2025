<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">
    <script src="./jquery-3.7.1.min.js"></script>
    <script src="./jquery.validate.min.js"></script>
    <script src="./jquery.mask.min.js"></script>
</head>
    <script>
        $(document).ready(function () {
            $("#formulario").validate({
                // regras para cada campo
                rules: {

                    email: {
                        required: true,
                        email: true
                    },
                    email2: {
                        required: true,
                        equalTo: "#email",
                    },

                    senha: {
                        required: true,
                    },

                    senha2: {
                        required: true,
                        equalTo: "#senha",
                    },
                    nome: {
                        required: true,
                        minlength: 2,
                    },
                    telefone: {
                         required: true,
                         phoneUS: true // se quiser validar telefone US, ou usar regex personalizada
                    },

                    endereco: {
                         required: true,
                    }
                },
                // mensagens de erro para cada regra
                messages: {

                    email: {
                        required: "Você deve informar um e-mail",
                        email: "Por favor, insira um e-mail válido",
                    },
                    email2: {
                        required: "Você deve confirmar seu e-mail",
                        equalTo: "Os e-mails informados devem ser iguais.",
                    },
                    senha: {
                        required: "Você deve informar um e-mail",
                    },
                     senha2: {
                        required: "Você deve confirmar seu e-mail",
                        equalTo: "Os e-mails informados devem ser iguais.",
                    },
                    nome: {
                        required: "Esse campo deve ser preenchido",
                        minlength: "O tamanho mínimo é 2.",
                    },

                    telefone: {
                         required: "Informe seu telefone",
                         phoneUS: "Informe um telefone válido",
                    },

                    endereco: {
                        required: "Informe seu endereço",
                     }

                }
            })
        });
    </script>
    <style>
        .error {
            color: white;
        }
    </style> 
</head>
<body>
    <form id="formulario" action="salvarUsuario.php" method="post">

        E-mail: <br>
        <input type="text" name="email" id="email"> <br><br>

        Confirme seu e-mail: <br>
        <input type="text" name="email2" id="email2">
        <br><br>

        Senha: <br>
        <input type="password" name="senha" id="senha"><br><br>

        Confirme sua senha: <br>
        <input type="password" name="senha2" id="senha2"> <br><br>

        Nome: <br>
        <input type="text" name="nome" id="nome"> <br><br>

        Telefone: <br>
        <input type="text" name="telefone" id="telefone"> <br><br>

        Endereço: <br>
        <input type="text" name="endereco" id="endereco"> <br><br>

        <input type="submit" value="Cadastrar">
    </form>

      <script>
        $(document).ready(function() {
            $('#telefone').mask('(00) 00000-0000');
        });
    </script>
</body>
</html>