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

    <input type="checkbox" name="checkbox_delivery">
    <label for="meuCheckbox">Delivery</label> <br>
    + 5 golds <br><br>
     
<?php


        $Total = calculoTotal($conexao, $idproduto, $quantidade);
?>


     <form>
    <label><input type="radio" name="opcao" value="opcao1">Cartão</label><br>
  <label><input type="radio" name="opcao" value="opcao2">Dinheiro</label><br>
</form>
  


    <!-- <a href="delivery.php">Delivery</a> <br><br> -->
    <a href="retirada.php">Retirar no local</a>

</body>
</html>