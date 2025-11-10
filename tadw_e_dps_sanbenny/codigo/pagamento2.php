<?php
session_start();

require_once "conexao.php";
require_once "funcoes.php";

// Se não tiver carrinho, volta.
if (empty($_SESSION['carrinho'])) {
    header("Location: carrinho.php");
    exit;
}

// pegar dados enviados pelo pagamento.php
$forma_pagamento = $_GET['pg'] ?? '';
$forma_retirada = $_GET['ret'] ?? 'local';

// calcular total da compra
$total = 0;

foreach ($_SESSION['carrinho'] as $id => $qtd) {
    $p = pesquisarProdutoId($conexao, $id);
    $total += $p['valor_un'] * $qtd;
}

// taxa do delivery
$taxa = ($forma_retirada == "delivery") ? 5 : 0;

$total_final = $total + $taxa;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Confirmação</title>
</head>
<body>

    <h1>CONFIRMAR PAGAMENTO</h1>

    <p><b>Total dos produtos:</b> <?php echo number_format($total, 2, ',', '.'); ?> golds</p>
    <p><b>Taxa de entrega:</b> <?php echo number_format($taxa, 2, ',', '.'); ?> golds</p>

    <p><b>Total final:</b> <?php echo number_format($total_final, 2, ',', '.'); ?> golds</p>

    <p><b>Forma de pagamento:</b> <?php echo ucfirst($forma_pagamento); ?></p>
    <p><b>Retirada:</b> <?php echo ucfirst($forma_retirada); ?></p>

    <form action="gravar.php" method="POST">
        <input type="hidden" name="forma_pagamento" value="<?php echo $forma_pagamento; ?>">
        <input type="hidden" name="forma_retirada" value="<?php echo $forma_retirada; ?>">
        <input type="hidden" name="total_final" value="<?php echo $total_final; ?>">
        <input type="hidden" name="taxa" value="<?php echo $taxa; ?>">

        <button type="submit">Finalizar compra</button>
    </form>

    <br>
    <a href="pagamento.php">Voltar</a>

</body>
</html>
