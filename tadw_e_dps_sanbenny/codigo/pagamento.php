<?php
require_once "verificarlogado.php";
require_once "conexao.php";
require_once "funcoes.php";

/* ✅ RE-CALCULA O TOTAL ATUAL DO CARRINHO TODA VEZ QUE ABRIR A PÁGINA */
$total = 0;

if (!empty($_SESSION['carrinho'])) {
    foreach ($_SESSION['carrinho'] as $id => $qtd) {
        $p = pesquisarProdutoId($conexao, $id);
        $total += $p['valor_un'] * $qtd;
    }
}

$delivery_add = 5;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamento</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body id="pagamento-page">

<h2>PAGAMENTO</h2>

<!-- ✅ TOTAL ATUALIZADO DE VERDADE -->
<p>Total da compra: <span id="total_compra"><?= number_format($total, 2, ',', '.') ?> golds</span></p>

<form id="pagamentoForm" method="post">

    <!-- FORMA DE PAGAMENTO -->
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

    <!-- RETIRADA OU DELIVERY -->
    <p>Escolha a forma de retirada:</p>

    <label>
        <input type="radio" name="retirada" value="local" checked> Retirar no local
    </label>

    <label>
        <input type="radio" name="retirada" value="delivery"> Delivery (+5 golds)
    </label>

    <!-- ✅ GUARDA O TOTAL REAL -->
    <input type="hidden" id="total_hidden" name="total" value="<?= $total ?>">

    <br><br>
    <input type="submit" value="Continuar">

</form>

<script>
/* ELEMENTOS */
const radiosPagamento = document.querySelectorAll('input[name="opcao"]');
const trocoContainer = document.getElementById('troco-container');
const trocoInput = document.getElementById('troco');

const radiosRetirada = document.querySelectorAll('input[name="retirada"]');
const totalSpan = document.getElementById('total_compra');
const totalHidden = document.getElementById('total_hidden');

let total = parseFloat(totalHidden.value);

/* ✅ TROCO */
radiosPagamento.forEach(radio => {
    radio.addEventListener('change', () => {
        if (radio.value === 'dinheiro') {
            trocoContainer.style.display = 'block';
        } else {
            trocoContainer.style.display = 'none';
            trocoInput.value = '';
        }
    });
});

/* ✅ MÁSCARA DO TROCO */
trocoInput.addEventListener('input', (e) => {
    let value = e.target.value.replace(/\D/g, '');
    value = (value / 100).toFixed(2);
    e.target.value = value.replace('.', ',') + ' golds';
});

/* ✅ DELIVERY ATUALIZA TOTAL */
radiosRetirada.forEach(radio => {
    radio.addEventListener('change', () => {
        let valor_total = total;

        if (radio.value === 'delivery') {
            valor_total += 5;
        }

        totalSpan.textContent = valor_total.toFixed(2).replace('.', ',') + ' golds';
        totalHidden.value = valor_total;
    });
});

/* ✅ REDIRECIONAMENTO AUTOMÁTICO */
document.getElementById('pagamentoForm').addEventListener('submit', function(e) {

    e.preventDefault();

    const retirada = document.querySelector('input[name="retirada"]:checked').value;

    if (retirada === 'delivery') {
        this.action = 'delivery.php';
    } else {
        this.action = 'retirada.php';
    }

    this.submit();
});
</script>

<br><br>
<a href="carrinho.php">Voltar para o carrinho</a>

</body>
</html>
