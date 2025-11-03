<?php
session_start();
require_once "conexao.php";
require_once "funcoes.php";
require_once "verificarlogado.php";

// Se já houver endereço salvo, pré-preenche
$nome = $_SESSION['cliente_nome'] ?? '';
$telefone = $_SESSION['cliente_telefone'] ?? '';
$endereco = $_SESSION['cliente_endereco'] ?? '';
$observacoes = $_SESSION['cliente_observacoes'] ?? '';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h1>D E L I V E R Y</h1>
    <p>Obs: Taxa de entrega = 5 golds</p>

    <form id="deliveryForm" action="retirada.php" method="post">
        <label>Nome:</label><br>
        <input type="text" name="nome" id="nome" value="<?= htmlspecialchars($nome) ?>" required><br><br>

        <label>Telefone:</label><br>
        <input type="text" name="telefone" id="telefone" value="<?= htmlspecialchars($telefone) ?>" required><br><br>

        <label>Endereço:</label><br>
        <input type="text" name="endereco" id="endereco" value="<?= htmlspecialchars($endereco) ?>" required><br><br>

        <label>Observações:</label><br>
        <input type="text" name="observacoes" id="observacoes" value="<?= htmlspecialchars($observacoes) ?>"><br><br>

        <input type="hidden" name="retirada" value="delivery">
        <input type="submit" value="Confirmar Endereço">
    </form>

    <br>
    <a href="pagamento.php">Voltar para Pagamento</a>

    <script>
        const form = document.getElementById('deliveryForm');

        form.addEventListener('submit', function(event) {
            // Checa se todos os campos obrigatórios estão preenchidos
            const nome = document.getElementById('nome').value.trim();
            const telefone = document.getElementById('telefone').value.trim();
            const endereco = document.getElementById('endereco').value.trim();

            if (!nome || !telefone || !endereco) {
                alert("Por favor, preencha todos os campos obrigatórios!");
                event.preventDefault(); // evita o envio do formulário
            }
        });
    </script>
</body>
</html>
