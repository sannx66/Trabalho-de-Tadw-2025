<?php
require_once "conexao.php";
require_once "funcoes.php";
// require_once "./verificarlogado.php";

$cafes = listarProdutostipo($conexao, 'cafe');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Menu de Cafés</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h1> Cafés Disponíveis</h1>

    <?php if (empty($cafes)): ?>
        <p>Nenhum café disponível encontrado.</p>
    <?php else: ?>
        <?php foreach ($cafes as $cafe): ?>
            <hr>
            <h2><?= htmlspecialchars($cafe['nome']) ?></h2>

            <?php 
            $caminho_foto = "fotos/" . $cafe['foto'];
            if (!empty($cafe['foto']) && file_exists($caminho_foto)): ?>
                <img src="<?= htmlspecialchars($caminho_foto) ?>" alt="<?= htmlspecialchars($cafe['nome']) ?>" width="200"><br>
            <?php else: ?>
                <p>[Foto não disponível]</p>
            <?php endif; ?>

            <p><?= nl2br(htmlspecialchars($cafe['ingredientes'])) ?></p>
            <p><strong><?= number_format($cafe['valor_un'], 2, ',', '.') ?> golds</strong></p>

            <form action="adicionar_carrinho.php" method="post" style="display:inline;">
                <input type="hidden" name="id" value="<?= htmlspecialchars($cafe['idproduto']) ?>">
                <button type="submit" class="btn-comprar">Adicionar ao carrinho</button>
            </form>
        <?php endforeach; ?>
    <?php endif; ?>

    <p><a href="categorias.php">← Voltar para categorias</a></p>
</body>
</html>
