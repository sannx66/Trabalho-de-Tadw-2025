<?php
require_once "conexao.php";

if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

$sql = "SELECT nome, ingredientes, valor_un, foto FROM tb_produto WHERE tipo = 'milkshake' AND disponivel > 0";
$resultado = $conexao->query($sql);

if (!$resultado) {
    die("Erro na consulta: " . $conexao->error);
}

if ($resultado->num_rows === 0) {
    echo "<p>Nenhum milkshake disponível encontrado.</p>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Menu de milkshake </title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h1> Milkshakes Disponíveis</h1>

    
    <?php while ($milkshake = $resultado->fetch_assoc()): ?>
        <hr>
        <h2><?= htmlspecialchars($milkshake['nome']) ?></h2>

    <?php 

        
        $caminho_foto = "fotos/" . $bolo['foto'];
        if (!empty($bolo['foto']) && file_exists($caminho_foto)): ?>
            <img src="<?= htmlspecialchars($caminho_foto) ?>" alt="<?= htmlspecialchars($bolo['nome']) ?>" width="200"><br>
        <?php else: ?>
            <p>[Foto não disponível]</p>
        <?php endif; ?>

        <p><?= nl2br(htmlspecialchars($milkshake['ingredientes'])) ?></p>
        <p><strong><?= number_format($bolo['valor_un'], 2, ',', '.') ?> golds</strong></p>

        <p>
        <form action="adicionar_carrinho.php" method="post" style="display:inline;">
        <input type="hidden" name="id" value="<?= htmlspecialchars($bolo['idproduto']) ?>">
        <button type="submit" class="btn-comprar">Adicionar ao carrinho</button>
        </form>
        </p>
        
    <?php endwhile; ?>

    <p><a href="categorias.php">← Voltar para categorias</a></p>
</body>
</html>