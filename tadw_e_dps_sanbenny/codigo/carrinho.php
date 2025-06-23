<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- login do cliente -->
    <h1>C A R R I N H O</h1> <br>

    <a href="cardapio.php">Voltar</a> <br> <br>

    <!-- formulário sem action -->
    <form action="pagamento.php"> 
        <!-- cliente oculto -->
        Cliente (id): <br>
        <input type="number" name="clienteId"> <br><br>
        Valor_total: <br>
        <input type="number" name="valor_total"> <br><br>
        Valor_pago: <br>
        <input type="number" name="valor_pago"> <br><br>
        Troco: <br>
        <input type="number" name="troco"> <br><br>
        Data e hora: <br>
        <input type="text" name="data_hora"> <br><br>

        <input type="submit" value="Salvar pedido"> <br><br><br>

        <!-- pagamento -->


    
    </form>
</body>
</html>