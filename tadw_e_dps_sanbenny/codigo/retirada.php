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
    Prontinhooo!!! Só aguardar o seu pedido!! <br>
    Obrigado pela preferência! <br>
    Assim que tiver pronto te avisaremos!! 
</body>
</html>