<?php
require_once "conexao.php";
require_once "funcoes.php";
require_once "verificarlogado.php";

$chas = listarProdutostipo($conexao, 'cha');
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Menu de Chás</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body id="cardapio-bolos">

    <a href="categorias.php" class="voltar-seta">←</a>

    <h1>🍵 Chás Disponíveis</h1>

    <?php if (empty($chas)): ?>
        <p>Nenhum chá disponível encontrado.</p>
    <?php else: ?>

        <?php foreach ($chas as $cha): ?>

            <div class="bolo-card">

                <h2><?= htmlspecialchars($cha['nome']) ?></h2>

                <?php 
                    $caminho_foto = "fotos/" . $cha['foto'];
                    if (!empty($cha['foto']) && file_exists($caminho_foto)): 
                ?>

                    <img src="<?= htmlspecialchars($caminho_foto) ?>" 
                        alt="<?= htmlspecialchars($cha['nome']) ?>">

                <?php else: ?>
                    <p>[Foto não disponível]</p>
                <?php endif; ?>

                <div>
                    <p><?= nl2br(htmlspecialchars($cha['ingredientes'])) ?></p>

                    <p><strong><?= number_format($cha['valor_un'], 2, ',', '.') ?> golds</strong></p>

                    <form class="comprar"
                        action="adicionar_carrinho.php"
                        method="post">

                        <input type="hidden" name="id" value="<?= htmlspecialchars($cha['idproduto']) ?>">

                        <button type="submit" class="btn-comprar">Quero</button>
                    </form>
                </div>

            </div>

        <?php endforeach; ?>
    <?php endif; ?>

    <div id="alert-carrinho">
        <img src="fotos/carrinho.png" alt="Carrinho" class="alert-carrinho-img">
        <p>Produto adicionado ao carrinho!</p>

        <div class="alert-buttons">
            <a href="carrinho.php" class="alert-ver">Ver carrinho</a>
            <button id="alert-ok" class="alert-ok">OK</button>
        </div>
    </div>

    <div id="alert-overlay"></div>


    <script>
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
                    const alerta = document.getElementById('alert-carrinho');
                    const overlay = document.getElementById('alert-overlay');

                    overlay.style.display = 'block';
                    alerta.style.display = 'block';

                    setTimeout(() => {
                        overlay.style.opacity = '1';
                        alerta.style.opacity = '1';
                    }, 10);

                    setTimeout(() => fecharAlerta(), 5000);
                })
                .catch(error => {
                    console.error('Erro ao adicionar ao carrinho:', error);
                });
            });
        });

        document.getElementById('alert-ok').addEventListener('click', fecharAlerta);

        function fecharAlerta() {
            const alerta = document.getElementById('alert-carrinho');
            const overlay = document.getElementById('alert-overlay');

            alerta.style.opacity = '0';
            overlay.style.opacity = '0';

            setTimeout(() => {
                alerta.style.display = 'none';
                overlay.style.display = 'none';
            }, 300);
        }
    </script>

</body>
</html>
