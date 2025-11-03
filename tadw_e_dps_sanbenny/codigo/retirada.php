<?php
require_once "verificarlogado.php";
require_once "conexao.php";
require_once "funcoes.php";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retirada</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <div id="retirada-page">
        <h1 id="retirada-title">Estamos te esperando</h1>

        <div class="card" id="retirada-card">
            <img src="fotos/castiel.webp" id="retirada-castiel" alt="Castiel">
            <form action="confirmar_retirada.php" method="post" id="retirada-form">
                <label for="nome">Nome:</label><br>
                <input type="text" name="nome" id="nome" placeholder="Seu nome" required><br><br>

                <label for="telefone">Telefone:</label><br>
                <input type="text" name="telefone" id="telefone" placeholder="(xx) xxxx-xxxx" required><br><br>

                <label for="mensagem">Mensagem (opcional):</label><br>
                <input type="text" name="mensagem" id="mensagem" placeholder="Observações"><br><br>

                <input type="submit" value="Confirmar Retirada" id="retirada-submit">
            </form>
        </div>
    </div>
</body>
</html>


