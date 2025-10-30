<?php
    require_once "./verificarlogado.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">
    
</head>

<body>
      
   
    <h1><i>Categorias</i></h1> <br>

    <a href="bolo.php">Bolos</a> <br> 
    <a href="donuts.php">Donuts</a> <br> 
    <a href="churros.php">Churros</a> <br> 
    <a href="macarons.php">Macarons</a> <br> 
    <a href="trufas.php">Trufas</a> <br> 
    <a href="cafe.php">Cafés</a> <br> 
    <a href="cha.php">Chás</a> <br> 
    <a href="milkshake.php">Milshake</a> <br> <br><br>

    <a href="carrinho.php"><img src="../fotos/carrinho.png"></a> <br><br>
 
<?php
if (isset($_SESSION['tipo']) && $_SESSION['tipo'] === 'g') {
    echo '<a href="home.php"><img src="../fotos/bolo.png" alt="Bolo"></a><br><br>';
}
?>


<a href="deslogar.php">Deslogar</a>

    

</body>
</html>