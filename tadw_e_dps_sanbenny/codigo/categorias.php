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

<body id="categorias-page">

    <h1><i>Categorias</i></h1> <br>

   <div class="categorias-grid">
    <a href="bolo.php" class="categoria-btn">Bolos</a>
    <a href="trufas.php" class="categoria-btn">Trufas</a>
    <a href="donuts.php" class="categoria-btn">Donuts</a>
    <a href="cafe.php" class="categoria-btn">Cafés</a>
    <a href="churros.php" class="categoria-btn">Churros</a>
    <a href="cha.php" class="categoria-btn">Chás</a>
    <a href="macarons.php" class="categoria-btn">Macarons</a>
    <a href="milkshake.php" class="categoria-btn">Milkshake</a>
</div>


    <a href="carrinho.php" class="carrinho">
        <img src="../fotos/carrinho.png">
    </a>

    <?php
    if (isset($_SESSION['tipo']) && $_SESSION['tipo'] === 'g') {
        echo '<a href="home.php" class="gerencia"><img src="../fotos/bolo.png" alt="Bolo"></a><br><br>';
    }
    ?>

    <a href="deslogar.php">Deslogar</a>

</body>
