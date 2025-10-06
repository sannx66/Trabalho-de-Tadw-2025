<?php
require_once "conexao.php";

if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

$sql = "SELECT nome, ingredientes, valor_un, foto FROM tb_produto WHERE tipo = 'bolo' AND disponivel = 10";
$resultado = $conexao->query($sql);

if (!$resultado) {
    die("Erro na consulta: " . $conexao->error);
}

if ($resultado->num_rows === 0) {
    echo "<p>Nenhum bolo disponível encontrado.</p>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Menu de Bolos</title>
</head>
<body>
    <h1>🍰 Bolos Disponíveis</h1>

    <?php 
    while ($bolo = $resultado->fetch_assoc()): 
        echo "<pre>";
        print_r($bolo);
        echo "</pre>";
    ?>
        <hr>
        <h2><?= htmlspecialchars($bolo['nome']) ?></h2>

        <?php 
        $caminho_foto = "fotos/" . $bolo['foto'];
        if (!empty($bolo['foto']) && file_exists($caminho_foto)): ?>
            <img src="<?= htmlspecialchars($caminho_foto) ?>" alt="<?= htmlspecialchars($bolo['nome']) ?>" width="200"><br>
        <?php else: ?>
            <p>[Foto não disponível]</p>
        <?php endif; ?>

        <p><?= nl2br(htmlspecialchars($bolo['ingredientes'])) ?></p>
        <p><strong><?= number_format($bolo['valor_un'], 2, ',', '.') ?> golds</strong></p>
    <?php endwhile; ?>

    <p><a href="categorias.php">← Voltar para categorias</a></p>
</body>
</html>