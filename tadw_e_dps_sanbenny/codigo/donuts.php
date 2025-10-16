<?php
require_once "conexao.php";
require_once "funcoes.php";
// require_once "./verificarlogado.php";

$donuts = listarProdutostipo($conexao, 'donut');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Menu de Donuts</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h1>Donuts Disponíveis</h1>

    <?php if (empty($donuts)): ?>
        <p>Nenhum donuts disponível encontrado.</p>
    <?php else: ?>
        <?php foreach ($donuts as $donut): ?>
            <hr>
            <h2><?= htmlspecialchars($donut['nome']) ?></h2>

            <?php 
            $caminho_foto = "fotos/" . $donut['foto'];
            if (!empty($donut['foto']) && file_exists($caminho_foto)): ?>
                <img src="<?= htmlspecialchars($caminho_foto) ?>" alt="<?= htmlspecialchars($donut['nome']) ?>" width="200"><br>
            <?php else: ?>
                <p>[Foto não disponível]</p>
            <?php endif; ?>

            <p><?= nl2br(htmlspecialchars($donut['ingredientes'])) ?></p>
            <p><strong><?= number_format($donut['valor_un'], 2, ',', '.') ?> golds</strong></p>

            <form action="adicionar_carrinho.php" method="post" style="display:inline;">
                <input type="hidden" name="id" value="<?= htmlspecialchars($donut['idproduto']) ?>">
                <button type="submit" class="btn-comprar">Adicionar ao carrinho</button>
            </form>
        <?php endforeach; ?>
    <?php endif; ?>

    <p><a href="categorias.php">← Voltar para categorias</a></p>
</body>
</html>
