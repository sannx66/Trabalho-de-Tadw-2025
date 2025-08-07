<?php
require_once "./conexao.php";
require_once "./funcoes.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    PAGAMENTO <br><br>

    <a href="delivery.php">Delivery?</a> <br>
    + 5 golds <br><br>


     <form action="retirada.php">
    <label><input type="radio" name="opcao" value="opcao1">Cartão</label><br>

  <label><input type="radio" name="opcao" value="opcao2">Golds</label> <br>
   Troco?: <br>
        <input type="number" name="troco"> <br><br>

          <input type="submit" value="Salvar"> <br><br><br>

<!-- n esquecer do troco -->
</form>
  


    <!-- <a href="delivery.php">Delivery</a> <br><br> -->
    <a href="retirada.php">Retirar no local</a>

</body>
</html>