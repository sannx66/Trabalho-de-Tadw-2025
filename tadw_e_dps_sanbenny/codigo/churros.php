<?php
require_once "conexao.php";
require_once "funcoes.php";
// require_once "./verificarlogado.php";

$trufas = listarProdutos($conexao, 'churro');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Menu de Churros</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h1> Churros Disponíveis</h1>

    <?php if (empty($trufas)): ?>
        <p>Nenhum churro disponível encontrado.</p>
    <?php else: ?>
        <?php foreach ($churros as $churro): ?>
            <hr>
            <h2><?= htmlspecialchars($churro['nome']) ?></h2>

            <?php 
            $caminho_foto = "fotos/" . $churro['foto'];
            if (!empty($churro['foto']) && file_exists($caminho_foto)): ?>
                <img src="<?= htmlspecialchars($caminho_foto) ?>" alt="<?= htmlspecialchars($trufa['nome']) ?>" width="200"><br>
            <?php else: ?>
                <p>[Foto não disponível]</p>
            <?php endif; ?>

            <p><?= nl2br(htmlspecialchars($churro['ingredientes'])) ?></p>
            <p><strong><?= number_format($churro['valor_un'], 2, ',', '.') ?> golds</strong></p>

            <form action="adicionar_carrinho.php" method="post" style="display:inline;">
                <input type="hidden" name="id" value="<?= htmlspecialchars($trufa['idproduto']) ?>">
                <button type="submit" class="btn-comprar">Adicionar ao carrinho</button>
            </form>
        <?php endforeach; ?>
    <?php endif; ?>

    <p><a href="categorias.php">← Voltar para categorias</a></p>
</body>
</html>
