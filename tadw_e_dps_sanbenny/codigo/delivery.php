<?php
require_once "verificarlogado.php"; 
require_once "conexao.php";
require_once "funcoes.php";

// Captura dados vindos do pagamento.php 
$forma_pagamento = $_GET['pg'] ?? '';
$troco = $_GET['troco'] ?? '';

// Se o formulário foi enviado, processa ANTES de gerar HTML
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Salva dados na sessão
    $_SESSION['cliente_nome']        = $_POST['nome'];
    $_SESSION['cliente_telefone']    = $_POST['telefone'];
    $_SESSION['cliente_endereco']    = $_POST['endereco'];
    $_SESSION['cliente_observacoes'] = $_POST['observacoes'];

    // Redireciona para pagamento2.php
    $url = "pagamento2.php?pg={$forma_pagamento}&ret=delivery";

    if (!empty($troco)) {
        $url .= "&troco={$troco}";
    }

    header("Location: $url");
    exit;
}

$nome         = $_SESSION['cliente_nome']        ?? '';
$telefone     = $_SESSION['cliente_telefone']    ?? '';
$endereco     = $_SESSION['cliente_endereco']    ?? '';
$observacoes  = $_SESSION['cliente_observacoes'] ?? '';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Delivery</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body id="delivery_page">

    <h1>D E L I V E R Y</h1>
    <p>Obs: Taxa de entrega = 5 golds</p>

    <form id="deliveryForm" method="post">
        <label>Nome:</label><br>
        <input type="text" name="nome" id="nome" value="<?= htmlspecialchars($nome) ?>" required><br><br>

        <label>Telefone:</label><br>
        <input type="text" name="telefone" id="telefone" value="<?= htmlspecialchars($telefone) ?>" required><br><br>

        <label>Endereço:</label><br>
        <input type="text" name="endereco" id="endereco" value="<?= htmlspecialchars($endereco) ?>" required><br><br>

        <label>Observações:</label><br>
        <input type="text" name="observacoes" id="observacoes" value="<?= htmlspecialchars($observacoes) ?>"><br><br>

        <input type="submit" value="Confirmar Endereço">
    </form>

    <br>
    <a href="pagamento.php">Voltar para Pagamento</a>

    <script>
        const form = document.getElementById('deliveryForm');

        form.addEventListener('submit', function(event) {
            if (
                !document.getElementById('nome').value.trim() ||
                !document.getElementById('telefone').value.trim() ||
                !document.getElementById('endereco').value.trim()
            ) {
                alert("Por favor, preencha todos os campos obrigatórios!");
                event.preventDefault();
            }
        });

       
    const tel = document.getElementById("telefone");

    tel.addEventListener("input", function () {
        let v = tel.value.replace(/\D/g, ""); // remove tudo que não é número

        if (v.length > 11) v = v.slice(0, 11);

        if (v.length > 6) {
            tel.value = `(${v.slice(0,2)}) ${v.slice(2,7)}-${v.slice(7)}`;
        } 
        else if (v.length > 2) {
            tel.value = `(${v.slice(0,2)}) ${v.slice(2)}`;
        }
        else if (v.length > 0) {
            tel.value = `(${v}`;
        }
    });

    </script>



</body>
</html>
