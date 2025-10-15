<?php
require_once "conexao.php";
require_once "funcoes.php";
// require_once "./verificarlogado.php";

$milkshakes = listarProdutos($conexao, 'milkshake');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Menu de Milkshakes</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h1> Milkshakes Disponíveis</h1>

    <?php if (empty($milkshakes)): ?>
        <p>Nenhum milkshake disponível encontrado.</p>
    <?php else: ?>
        <?php foreach ($milkshakes as $milshake): ?>
            <hr>
            <h2><?= htmlspecialchars($milkshake['nome']) ?></h2>

            <?php 
            $caminho_foto = "fotos/" . $milkshake['foto'];
            if (!empty($milkshake['foto']) && file_exists($caminho_foto)): ?>
                <img src="<?= htmlspecialchars($caminho_foto) ?>" alt="<?= htmlspecialchars($milkshake['nome']) ?>" width="200"><br>
            <?php else: ?>
                <p>[Foto não disponível]</p>
            <?php endif; ?>

            <p><?= nl2br(htmlspecialchars($milkshake['ingredientes'])) ?></p>
            <p><strong><?= number_format($milkshake['valor_un'], 2, ',', '.') ?> golds</strong></p>

            <form action="adicionar_carrinho.php" method="post" style="display:inline;">
                <input type="hidden" name="id" value="<?= htmlspecialchars($milkshake['idproduto']) ?>">
                <button type="submit" class="btn-comprar">Adicionar ao carrinho</button>
            </form>
        <?php endforeach; ?>
    <?php endif; ?>

    <p><a href="categorias.php">← Voltar para categorias</a></p>
</body>
</html>
