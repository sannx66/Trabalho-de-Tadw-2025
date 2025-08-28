<?php
    require_once "./verificarlogado.php";

    if ($_SESSION['tipo'] == 'c') {
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
                <a href="categorias.php">Voltar</a> <br><br>

</body>
</html>