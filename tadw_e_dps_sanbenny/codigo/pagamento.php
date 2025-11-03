<?php
require_once "verificarlogado.php";
require_once "conexao.php";
require_once "funcoes.php";

$total = $_SESSION['total_carrinho'] ?? 0; // pega o total do carrinho
$delivery_add = 5; // valor extra do delivery
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamento</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
<h2>PAGAMENTO</h2>

<p>Total da compra: <span id="total_compra"><?= number_format($total, 2, ',', '.') ?> golds</span></p>

<form id="pagamentoForm" method="post">
    <!-- Forma de pagamento -->
    <label>
        <input type="radio" name="opcao" value="cartao"> Cartão
    </label>

    <label>
        <input type="radio" name="opcao" value="dinheiro"> Golds / Dinheiro
    </label>

    <div class="troco-container" id="troco-container" style="display:none;">
        Troco?: <br>
        <input type="text" id="troco" name="troco" placeholder="golds">
    </div>

    <!-- Retirada ou Delivery -->
    <p>Escolha a forma de retirada:</p>
    <label>
        <input type="radio" name="retirada" value="local" checked> Retirar no local
    </label>
    <label>
        <input type="radio" name="retirada" value="delivery"> Delivery (+5 golds)
    </label>

    <input type="hidden" id="total_hidden" name="total" value="<?= $total ?>">
    <br><br>
    <input type="submit" value="Continuar">
</form>

<script>
const radiosPagamento = document.querySelectorAll('input[name="opcao"]');
const trocoContainer = document.getElementById('troco-container');
const trocoInput = document.getElementById('troco');

const radiosRetirada = document.querySelectorAll('input[name="retirada"]');
const totalSpan = document.getElementById('total_compra');
const totalHidden = document.getElementById('total_hidden');

let total = parseFloat(totalHidden.value);

// Mostrar ou esconder troco
radiosPagamento.forEach(radio => {
    radio.addEventListener('change', () => {
        if (radio.value === 'dinheiro' && radio.checked) {
            trocoContainer.style.display = 'block';
        } else {
            trocoContainer.style.display = 'none';
            trocoInput.value = '';
        }
    });
});

// Máscara de dinheiro em golds
trocoInput.addEventListener('input', (e) => {
    let value = e.target.value.replace(/\D/g, '');
    value = (value / 100).toFixed(2) + '';
    value = value.replace('.', ',');
    e.target.value = value + ' golds';
});

// Atualizar total com delivery
radiosRetirada.forEach(radio => {
    radio.addEventListener('change', () => {
        let valor_total = parseFloat(total);
        if (radio.value === 'delivery' && radio.checked) {
            valor_total += 5;
        }
        totalSpan.textContent = valor_total.toFixed(2).replace('.', ',') + ' golds';
        totalHidden.value = valor_total;
    });
});

// Submissão do formulário
document.getElementById('pagamentoForm').addEventListener('submit', function(e) {
    e.preventDefault();

    // Verifica se é delivery
    const retirada = document.querySelector('input[name="retirada"]:checked').value;
    if (retirada === 'delivery') {
        this.action = 'delivery.php'; // envia para delivery
    } else {
        this.action = 'retirada.php'; // envia para retirada no local
    }

    this.submit();
});
</script>

<br><br>
<a href="carrinho.php">Voltar para o carrinho</a>
</body>
</html>


