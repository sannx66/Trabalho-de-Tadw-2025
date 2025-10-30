<?php
require_once "conexao.php";
require_once "funcoes.php";
// require_once "./verificarlogado.php";

$churros = listarProdutostipo($conexao, 'churros');
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

    <?php if (empty($churros)): ?>
        <p>Nenhum churro disponível encontrado.</p>
    <?php else: ?>
        <?php foreach ($churros as $churro): ?>
            <hr>
            <h2><?= htmlspecialchars($churro['nome']) ?></h2>

            <?php 
            $caminho_foto = "fotos/" . $churro['foto'];
            if (!empty($churro['foto']) && file_exists($caminho_foto)): ?>
                <img src="<?= htmlspecialchars($caminho_foto) ?>" alt="<?= htmlspecialchars($churro['nome']) ?>" width="200"><br>
            <?php else: ?>
                <p>[Foto não disponível]</p>
            <?php endif; ?>

            <p><?= nl2br(htmlspecialchars($churro['ingredientes'])) ?></p>
            <p><strong><?= number_format($churro['valor_un'], 2, ',', '.') ?> golds</strong></p>

            <form action="adicionar_carrinho.php" method="post" style="display:inline;">
                <input type="hidden" name="id" value="<?= htmlspecialchars($churro['idproduto']) ?>">
                <button type="submit" class="btn-comprar">Adicionar ao carrinho</button>
            </form>
        <?php endforeach; ?>
    <?php endif; ?>

    <p><a href="categorias.php">← Voltar para categorias</a></p>
</body>
<button class="add-carrinho" data-id="202">Adicionar Macaron</button>

<!-- Toast (mensagem flutuante) -->
<div id="toast"></div>

<style>
/* Estilo do toast */
#toast {
  visibility: hidden;
  min-width: 250px;
  background-color: #28a745; /* verde */
  color: white;
  text-align: center;
  border-radius: 6px;
  padding: 12px;
  position: fixed;
  bottom: 30px;
  right: 30px;
  z-index: 1000;
  font-weight: 500;
  box-shadow: 0 3px 10px rgba(0,0,0,0.2);
  opacity: 0;
  transition: opacity 0.5s, bottom 0.5s;
}

#toast.show {
  visibility: visible;
  opacity: 1;
  bottom: 50px;
}
</style>

<script>
document.querySelectorAll('.add-carrinho').forEach(botao => {
    botao.addEventListener('click', () => {
        const id = botao.getAttribute('data-id');

        fetch('adicionar_carrinho.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: 'id=' + encodeURIComponent(id)
        })
        .then(response => response.json())
        .then(data => {
            mostrarToast(data.message, data.status === 'ok' ? 'success' : 'error');
        })
        .catch(() => {
            mostrarToast('❌ Erro ao adicionar item.', 'error');
        });
    });
});

function mostrarToast(mensagem, tipo) {
    const toast = document.getElementById('toast');
    toast.textContent = mensagem;
    toast.style.backgroundColor = tipo === 'error' ? '#dc3545' : '#28a745'; // vermelho ou verde
    toast.className = 'show';

    setTimeout(() => {
        toast.className = toast.className.replace('show', '');
    }, 3000);
}
</script>
</html>
