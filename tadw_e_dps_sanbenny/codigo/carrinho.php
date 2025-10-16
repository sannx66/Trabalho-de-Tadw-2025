<?php
session_start();
require_once "./conexao.php";
require_once "./funcoes.php";
require_once "./verificarlogado.php";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Carrinho</title>
    <script src="../jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
<?php if (empty($_SESSION['carrinho'])): ?>
    <p>Carrinho vazio</p>
<?php else: ?>
    <form action="atualizar_carrinho.php" method="post">
        <table border="1">
            <tr>
                <th>Tipo</th><th>Nome</th><th>Preço</th><th>Quantidade</th><th>Total unitário</th><th>Remover</th>
            </tr>
            <?php
            $total = 0;
            foreach ($_SESSION['carrinho'] as $id => $quantidade):
                $produto = pesquisarProdutoId($conexao, $id);
                $total_unitario = $produto['valor_un'] * $quantidade;
                $total += $total_unitario;
            ?>
            <tr>
                <td><?= htmlspecialchars($produto['tipo']) ?></td>
                <td><?= htmlspecialchars($produto['nome']) ?></td>
                <td>R$ <span class="valor_un"><?= number_format($produto['valor_un'], 2, ',', '.') ?></span></td>
                <td><input type="number" class="quantidade" name="quantidade[<?= $id ?>]" value="<?= $quantidade ?>" min="1"></td>
                <td>R$ <span class="total_unitario"><?= number_format($total_unitario, 2, ',', '.') ?></span></td>
                <td><a href="remover_carrinho.php?id=<?= $id ?>">[remover]</a></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <h3>Total da compra: R$ <span id="total"><?= number_format($total, 2, ',', '.') ?></span></h3>
        <button type="submit">Atualizar Carrinho</button>
    </form>

    <form action="finalizar_carrinho.php" method="post" style="margin-top: 20px;">
        <button type="submit">Finalizar Compra</button>
    </form>
<?php endif; ?>

<p><a href="categorias.php">Adicionar produtos</a></p>

<script>
function atualizar_total() {
    let total = 0;

    $('span.total_unitario').each(function () {
        const valor = parseFloat($(this).text().replace(',', '.'));
        total += valor;
    });

    $('#total').text(total.toFixed(2).replace('.', ','));
}

function somar() {
    const linha = $(this).closest('tr');
    const preco_unitario = linha.find('span.valor_un').text().replace(',', '.');
    const quantidade = parseInt($(this).val());

    const total = parseFloat(preco_unitario) * quantidade;

    const total_unitario = linha.find('span.total_unitario');
    total_unitario.text(total.toFixed(2).replace('.', ','));

    atualizar_total();
}

$("input.quantidade").on('change', somar);
</script>
</body>
</html>