<?php
    session_start();
    if (!isset($_SESSION['logado'])) {
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- login do cliente -->
    <h1>D E L I V E R Y</h1> <br>
    Obs: Taxa de entrega = 5 golds <br><br>

    <!-- formulário sem action -->
    <form action=pagamento.php method="post"> 
        Nome: <br>
        <input type="text" name="nome"> <br><br>
        Telefone: <br>
        <input type="text" name="telefone"> <br><br>
        Endereço: <br>
        <input type="text" name="endereco"> <br><br>
        Observações...: <br>
        <input type="text" name="observacoes"> <br><br>
        
        




        <!-- <a href="formUsuario.php">Primeiro acesso</a> <br><br> n sei pra q isso mas deve ser útil-->
<!-- Colocar um link para cada botão -->
        <input type="submit" value="Pronto"> <br><br><br>

        <a href="pagamento.php">Voltar</a>
        
    </form>
</body>
</html>