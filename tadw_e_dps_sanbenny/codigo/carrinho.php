<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require_once "conexao.php";
require_once "funcoes.php";
require_once "verificarlogado.php";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Carrinho</title>
    <script src="../jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="estilo.css">
</head>

<body id="carrinho-page">

<!-- SETA VOLTAR -->
<a href="javascript:history.back();" class="seta-voltar">←</a>

<h1 class="titulo-carrinho">Seu Carrinho</h1>

<?php if (empty($_SESSION['carrinho'])): ?>

    <p class="carrinho-vazio">Seu carrinho está vazio</p>

<?php else: ?>

<div class="lista-cards">

<?php
$total = 0;

foreach ($_SESSION['carrinho'] as $id => $quantidade):

    $produto = pesquisarProdutoId($conexao, $id);
    $total_unitario = $produto['valor_un'] * $quantidade;
    $total += $total_unitario;

    $foto = "fotos/" . $produto['foto'];
?>
    
<!-- CARD -->
<div class="card-item" id="card-<?= $id ?>">

    <!-- FOTO -->
    <div class="card-foto">
        <?php if (!empty($produto['foto']) && file_exists($foto)): ?>
            <img src="<?= $foto ?>" alt="<?= htmlspecialchars($produto['nome']) ?>">
        <?php else: ?>
            <img src="fotos/sem_foto.png" alt="Sem foto">
        <?php endif; ?>
    </div>

    <!-- INFOS -->
    <div class="card-info">
        <h2><?= htmlspecialchars($produto['nome']) ?></h2>
        <p class="tipo"><?= htmlspecialchars($produto['tipo']) ?></p>
        <p class="preco">R$ <?= number_format($produto['valor_un'], 2, ',', '.') ?></p>

        <!-- QUANTIDADE -->
        <div class="quantidade-box">
            <button type="button" class="qtd-btn menos" onclick="alterarQtd(<?= $id ?>, -1)">−</button>
            <input type="text" id="qtd-<?= $id ?>" class="qtd-display" value="<?= $quantidade ?>" readonly>
            <button type="button" class="qtd-btn mais" onclick="alterarQtd(<?= $id ?>, 1)">+</button>
        </div>

        <!-- TOTAL DO ITEM -->
        <p class="total-item" id="total-item-<?= $id ?>">
            Total: R$ <?= number_format($total_unitario, 2, ',', '.') ?>
        </p>

        <!-- REMOVER -->
        <button class="remover-card" onclick="removerItem(<?= $id ?>)">Remover</button>
    </div>

</div>

<?php endforeach; ?>

</div>

<!-- TOTAL GERAL -->
<h2 class="total-geral">
    Total da compra: R$ <span id="total-geral"><?= number_format($total, 2, ',', '.') ?></span>
</h2>

<!-- FINALIZAR -->
<form action="pagamento.php" method="post">
    <button type="submit" class="btn-comprar-carrinho">Finalizar compra</button>
</form>

<?php endif; ?>

<!-- ADICIONAR MAIS PRODUTOS -->
<p class="voltar-produtos">
    <a href="categorias.php" class="link-adicionar">Adicionar produtos</a>
</p>

<!-- ✅✅ SCRIPT CORRIGIDO E FUNCIONAL -->
<script>

function recalcularTotalVisual() {
    let total = 0;

    document.querySelectorAll(".total-item").forEach(el => {
        const valor = parseFloat(
            el.textContent.replace("Total: R$ ", "").replace(",", ".")
        );
        if (!isNaN(valor)) total += valor;
    });

    document.getElementById("total-geral").textContent =
        total.toFixed(2).replace(".", ",");
}

/* ✅ ALTERAR QUANTIDADE */
function alterarQtd(id, muda) {

    let campo = document.getElementById("qtd-" + id);
    let atual = parseInt(campo.value);
    let novo = atual + muda;

    if (novo < 1) return;

    campo.value = novo;

    const preco = parseFloat(
        document.querySelector("#card-" + id + " .preco")
        .textContent.replace("R$ ", "").replace(",", ".")
    );

    const total_item = preco * novo;

    document.getElementById("total-item-" + id).textContent =
        "Total: R$ " + total_item.toFixed(2).replace(".", ",");

    recalcularTotalVisual();

    const fd = new FormData();
    fd.append("id", id);
    fd.append("quantidade", novo);

    fetch("atualizar_item.php", {
        method: "POST",
        body: fd
    })
    .then(r => r.json())
    .then(data => {
        document.getElementById("total-geral").textContent =
            data.total_geral;
    });
}

/* ✅ REMOVER ITEM SEM PISCAR */
function removerItem(id) {

    fetch("remover_carrinho.php?id=" + id)
        .then(r => r.json())
        .then(data => {

            let card = document.getElementById("card-" + id);
            card.classList.add("removendo");

            setTimeout(() => card.remove(), 250);

            setTimeout(() => {

                document.getElementById("total-geral").textContent =
                    data.total_geral;

                if (document.querySelectorAll(".card-item").length === 0) {
                    document.body.innerHTML = `
                        <a href='javascript:history.back();' class='seta-voltar'>←</a>
                        <h1 class='titulo-carrinho'>Seu Carrinho</h1>
                        <p class='carrinho-vazio'>Seu carrinho está vazio</p>
                        <p class='voltar-produtos'>
                            <a href='categorias.php' class='link-adicionar'>Adicionar produtos</a>
                        </p>
                    `;
                }
            }, 300);
        });
}

</script>

</body>
</html>
