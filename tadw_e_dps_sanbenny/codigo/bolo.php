<?php
require_once "conexao.php";
require_once "funcoes.php";
require_once "verificarlogado.php";

$bolos = listarProdutostipo($conexao, 'bolo');
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Menu de Bolos</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h1>🍰 Bolos Disponíveis</h1>

    <?php if (empty($bolos)): ?>
        <p>Nenhum bolo disponível encontrado.</p>
    <?php else: ?>
        <?php foreach ($bolos as $bolo): ?>
            <hr>
            <h2><?= htmlspecialchars($bolo['nome']) ?></h2>

            <?php 
                $caminho_foto = "fotos/" . $bolo['foto'];
                if (!empty($bolo['foto']) && file_exists($caminho_foto)): 
            ?>
                <img src="<?= htmlspecialchars($caminho_foto) ?>" 
                     alt="<?= htmlspecialchars($bolo['nome']) ?>" 
                     width="200"><br>
            <?php else: ?>
                <p>[Foto não disponível]</p>
            <?php endif; ?>

            <p><?= nl2br(htmlspecialchars($bolo['ingredientes'])) ?></p>
            <p><strong><?= number_format($bolo['valor_un'], 2, ',', '.') ?> golds</strong></p>

            <form class="comprar" 
                  action="adicionar_carrinho.php" 
                  method="post" 
                  style="display:inline;">
                <input type="hidden" name="id" value="<?= htmlspecialchars($bolo['idproduto']) ?>">
                <button type="submit" class="btn-comprar">Adicionar ao carrinho</button>
            </form>
        <?php endforeach; ?>
    <?php endif; ?>

    <p><a href="categorias.php">← Voltar para categorias</a></p>

    <!-- Alerta de confirmação -->
    <div id="alerta">
        Produto adicionado ao carrinho!
        <a href="carrinho.php">Ver carrinho</a>
    </div>

    <script>
        // Intercepta o envio dos formulários e mostra o alerta
        document.querySelectorAll('.comprar').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                const formData = new FormData(this);

                fetch(this.action, {
                    method: this.method,
                    body: formData
                })
                .then(response => response.text())
                .then(() => {
                    const alerta = document.getElementById('alerta');
                    alerta.style.display = 'block';
                    setTimeout(() => {
                        alerta.style.display = 'none';
                    }, 7000);
                })
                .catch(error => {
                    console.error('Erro ao adicionar ao carrinho:', error);
                });
            });
        });
    </script>
</body>
</html>

