<?php
require_once "conexao.php";
require_once "funcoes.php";
// require_once "./verificarlogado.php";

$macarons = listarProdutos($conexao, 'Macarons');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Menu de Macarons</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h1>Macarons Disponíveis</h1>

    <?php if (empty($macarons)): ?>
        <p>Nenhum macaron disponível encontrado.</p>
    <?php else: ?>
        <?php foreach ($macarons as $macaron): ?>
            <hr>
            <h2><?= htmlspecialchars($macaron['nome']) ?></h2>

            <?php 
            $caminho_foto = "fotos/" . $macaron['foto'];
            if (!empty($macaron['foto']) && file_exists($caminho_foto)): ?>
                <img src="<?= htmlspecialchars($caminho_foto) ?>" alt="<?= htmlspecialchars($macaron['nome']) ?>" width="200"><br>
            <?php else: ?>
                <p>[Foto não disponível]</p>
            <?php endif; ?>

            <p><?= nl2br(htmlspecialchars($macaron['ingredientes'])) ?></p>
            <p><strong><?= number_format($macaron['valor_un'], 2, ',', '.') ?> golds</strong></p>

            <form action="adicionar_carrinho.php" method="post" style="display:inline;">
                <input type="hidden" name="id" value="<?= htmlspecialchars($macaron['idproduto']) ?>">
                <button type="submit" class="btn-comprar">Adicionar ao carrinho</button>
            </form>
        <?php endforeach; ?>
    <?php endif; ?>

    <p><a href="categorias.php">← Voltar para categorias</a></p>
</body>
</html>
