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
    <h1>C A R R I N H O</h1> <br>

    <a href="categorias.php">Voltar</a> <br> <br>

    PARTE DIFICIL

    
    </form>
</body>
</html>