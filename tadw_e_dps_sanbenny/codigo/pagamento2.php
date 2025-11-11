<?php
session_start();

require_once "conexao.php";
require_once "funcoes.php";
require_once "verificarlogado.php";


// Se não tiver carrinho, volta.
if (empty($_SESSION['carrinho'])) {
    header("Location: carrinho.php");
    exit;
}

// Pegando valores vindos da URL (enviados pelo pagamento.php)
$forma_pagamento = $_GET['pg'] ?? '';
$forma_retirada  = $_GET['ret'] ?? 'local';
$troco_informado = $_GET['troco'] ?? ''; // pode estar vazio

// Calcular total final
$total = 0;
foreach ($_SESSION['carrinho'] as $id => $qtd) {
    $p = pesquisarProdutoId($conexao, $id);
    $total += $p['valor_un'] * $qtd;
}

$taxa = ($forma_retirada == "delivery") ? 5 : 0;
$total_final = $total + $taxa;

// ✅ valor_pago NÃO é calculado aqui.
// Apenas repassamos o que veio do usuário.
// Se troco estiver vazio → valor_pago será igual ao total_final
$valor_pago = ($troco_informado !== "")
                ? floatval(str_replace(['.',','],['','.'],$troco_informado))
                : $total_final;

// Troco que vamos mandar para o gravar.php
$troco_para_gravar = ($troco_informado !== "" ? $troco_informado : 0);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Confirmação</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body id="confirmacao_page">

    <img id="confirm_logo" src="fotos/logo_diego.png" alt="Logo">

    <h1>CONFIRMAR PAGAMENTO</h1>

    <p><b>Total dos produtos:</b> <?= number_format($total, 2, ',', '.') ?> golds</p>
    <p><b>Taxa de entrega:</b> <?= number_format($taxa, 2, ',', '.') ?> golds</p>
    <p><b>Total final:</b> <?= number_format($total_final, 2, ',', '.') ?> golds</p>

    <p><b>Forma de pagamento:</b> <?= ucfirst($forma_pagamento) ?></p>
    <p><b>Retirada:</b> <?= ucfirst($forma_retirada) ?></p>

    <?php if ($forma_pagamento === "golds"): ?>
        <p><b>Valor pago pelo cliente:</b>
            <?= ($troco_informado !== "" ? $troco_informado : number_format($total_final,2,',','.')) ?> golds
        </p>
    <?php endif; ?>

    <form action="gravar.php" method="POST">

        <!-- Valores obrigatórios -->
        <input type="hidden" name="forma_pagamento" value="<?= $forma_pagamento ?>">
        <input type="hidden" name="forma_retirada" value="<?= $forma_retirada ?>">
        <input type="hidden" name="total_final" value="<?= $total_final ?>">
        <input type="hidden" name="taxa" value="<?= $taxa ?>">

        <!-- ✅ Agora ENVIANDO para o gravar.php -->
        <input type="hidden" name="valor_pago" value="<?= $valor_pago ?>">
        <input type="hidden" name="troco" value="<?= $troco_para_gravar ?>">

        <button type="submit">Finalizar compra</button>
    </form>

    <br>
    <a href="pagamento.php">Voltar</a>

</body>
</html>
