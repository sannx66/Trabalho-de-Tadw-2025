<?php
require_once "verificarlogado.php";

if ($_SESSION['tipo'] != 'g') {
    header("Location: home.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisar Produto</title>

    <link rel="stylesheet" href="estilo.css">

    <!-- ✅ CSS exclusivo desta página -->
    <link rel="stylesheet" href="pesquisar_produto.css">
</head>

<body id="pesquisar_produto_page">

    <!-- FORMULÁRIO -->
    <form id="pesquisar_produto_form" action="pesquisarProduto.php" method="get">
        <h2>Pesquisar Produto</h2>
        <br>

        Nome do produto:<br>
        <input type="text" name="valor" required>

        <input type="submit" value="Pesquisar">
    </form>


    <?php
    if (isset($_GET["valor"]) && !empty($_GET["valor"])) {

        $valor = trim($_GET["valor"]);

        require_once "conexao.php";
        require_once "funcoes.php";

        $produtos = pesquisarProdutoNome($conexao, $valor);

        if (count($produtos) == 0) {
            echo "<p>Nenhum produto encontrado.</p>";
        } else {
            echo "<table id='pesquisar_produto_tabela'>";
            echo "<tr>";
            echo "<th>Foto</th>";
            echo "<th>Nome</th>";
            echo "<th>Disponível</th>";
            echo "<th>Tipo</th>";
            echo "<th>Ingredientes</th>";
            echo "<th>Valor</th>";
            echo "</tr>";

            foreach ($produtos as $produto) {
                echo "<tr>";
                echo "<td><img class='pesquisar_produto_foto' src='fotos/" . htmlspecialchars($produto['foto']) . "'></td>";
                echo "<td>" . htmlspecialchars($produto['nome']) . "</td>";
                echo "<td>" . htmlspecialchars($produto['disponivel']) . "</td>";
                echo "<td>" . htmlspecialchars($produto['tipo']) . "</td>";
                echo "<td>" . htmlspecialchars($produto['ingredientes']) . "</td>";
                echo "<td>R$ " . number_format($produto['valor_un'], 2, ',', '.') . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        }
    }
    ?>

    <!-- BOTÃO VOLTAR -->
    <a id="pesquisar_produto_voltar" href="home.php">⟵ Voltar</a>

</body>
</html>
