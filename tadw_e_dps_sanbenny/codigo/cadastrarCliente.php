<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- login do cliente -->
    <h1>L O G I N</h1>

    <!-- formulário sem action -->
    <form action=cadastrarCliente.php method="post"> 
        E-mail: <br>
        <input type="text" name="email"> <br><br>
        Senha: <br>
        <input type="text" name="senha"> <br><br>
        Nome: <br>
        <input type="text" name="nome"> <br><br>
        Telefone: <br>
        <input type="text" name="telefone"> <br><br>
        Endereço: <br>
        <input type="text" name="endereco"> <br><br>




        <!-- <a href="formUsuario.php">Primeiro acesso</a> <br><br> n sei pra q isso mas deve ser útil-->

        <input type="submit" value="Entrar">

        //$nome =$_POST['nome']_
    </form>
</body>
</html>