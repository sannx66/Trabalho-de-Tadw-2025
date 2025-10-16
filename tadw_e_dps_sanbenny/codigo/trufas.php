<?php
require_once "conexao.php";
require_once "funcoes.php";
// require_once "./verificarlogado.php";

$trufas = listarProdutostipo($conexao, 'trufa');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Menu de Trufas</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h1> Trufas Disponíveis</h1>

    <?php if (empty($trufas)): ?>
        <p>Nenhuma trufa disponível encontrado.</p>
    <?php else: ?>
        <?php foreach ($trufas as $trufa): ?>
            <hr>
            <h2><?= htmlspecialchars($trufa['nome']) ?></h2>

            <?php
            $caminho_foto = "fotos/" . $trufa['foto'];
            if (!empty($trufa['foto']) && file_exists($caminho_foto)): ?>
                <img src="<?= htmlspecialchars($caminho_foto) ?>" alt="<?= htmlspecialchars($trufa['nome']) ?>" width="200"><br>
            <?php else: ?>
                <p>[Foto não disponível]</p>
            <?php endif; ?>

            <p><?= nl2br(htmlspecialchars($trufa['ingredientes'])) ?></p>
            <p><strong><?= number_format($trufa['valor_un'], 2, ',', '.') ?> golds</strong></p>

            <form action="adicionar_carrinho.php" method="post" style="display:inline;">
                <input type="hidden" name="id" value="<?= htmlspecialchars($trufa['idproduto']) ?>">
                <button type="submit" class="btn-comprar">Adicionar ao carrinho</button>
            </form>

            
            
        <?php endforeach; ?>
    <?php endif; ?>

    <p><a href="categorias.php">← Voltar para categorias</a></p>
</body>
</html>
