<?php
    require_once "./verificarlogado.php";
?>


<?php

$milkshakes = [
    [
        "nome" => "Milkshake de Chocolate",
        "descricao" => "Milkshake cremoso com chocolate.",
        "imagem" => "https://via.placeholder.com/250x180.png?text=Chocolate",
        "preco" => "R$ 12,00"
    ],
    [
        "nome" => "Milkshake de Morango",
        "descricao" => "Feito com morangos frescos.",
        "imagem" => "https://via.placeholder.com/250x180.png?text=Morango",
        "preco" => "R$ 13,00"
    ],
    [
        "nome" => "Milkshake de Oreo",
        "descricao" => "Sorvete com biscoito Oreo triturado.",
        "imagem" => "https://via.placeholder.com/250x180.png?text=Oreo",
        "preco" => "R$ 15,00"
    ],
];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <title>Menu de Milkshakes</title>
</head>
<body>
    <a href="categorias.php">Voltar</a> <br><br>
    <h1>Menu de Milkshakes</h1>

    <?php foreach ($milkshakes as $milkshake): ?>
        <div>
            <img src="<?php echo $milkshake['imagem']; ?>" alt="<?php echo $milkshake['nome']; ?>" width="250" height="180" />
            <h3><?php echo $milkshake['nome']; ?></h3>
            <p><?php echo $milkshake['descricao']; ?></p>
            <p><strong>Preço:</strong> <?php echo $milkshake['preco']; ?></p>
            <hr>
        </div>
    <?php endforeach; ?>
</body>
</html> 
