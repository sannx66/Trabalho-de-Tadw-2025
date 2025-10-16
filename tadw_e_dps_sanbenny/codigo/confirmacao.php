<?php
session_start();
require_once "./conexao.php";
require_once "./funcoes.php";

$idvenda = $_GET['idvenda'] ?? null;

if (!$idvenda) {
    echo "ID da venda não informado.";
    exit;
}

// Busca dados do carrinho/venda
$carrinho = pesquisarCarrinhoId($conexao, $idvenda);

if (!$carrinho) {
    echo "Compra não encontrada.";
    exit;
}

// Busca itens da venda
$sql = "SELECT iv.*, p.nome, p.valor_un 
        FROM tb_item_venda iv
        JOIN tb_produto p ON iv.idproduto = p.idproduto
        WHERE iv.idcarrinho = ?";
$stmt = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($stmt, 'i', $idvenda);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$itens = [];
while ($row = mysqli_fetch_assoc($result)) {
    $itens[] = $row;
}
mysqli_stmt_close($stmt);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Confirmação da Compra</title>
</head>
<body>
    <h1>Compra finalizada com sucesso!</h1>
    <p>ID da venda: <?= htmlspecialchars($idvenda) ?></p>
    <p>Data/Hora: <?= htmlspecialchars($carrinho['data_hora']) ?></p>
    <p>Valor da entrega: R$ <?= number_format($carrinho['valor_entrega'], 2, ',', '.') ?></p>
    <p>Valor total: R$ <?= number_format($carrinho['valor_total'], 2, ',', '.') ?></p>

    <h3>Itens:</h3>
    <table border="1">
        <tr>
            <th>Produto</th><th>Preço unitário</th><th>Quantidade</th><th>Total</th>
        </tr>
        <?php foreach ($itens as $item): ?>
            <tr>
                <td><?= htmlspecialchars($item['nome']) ?></td>
                <td>R$ <?= number_format($item['valor_un'], 2, ',', '.') ?></td>
                <td><?= (int)$item['quantidade'] ?></td>
                <td>R$ <?= number_format($item['valor_un'] * $item['quantidade'], 2, ',', '.') ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <p><a href="categorias.php">Continuar Comprando</a></p>
</body>
</html>