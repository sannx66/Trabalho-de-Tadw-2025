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
    <title>Lista de Produtos</title>

    <!-- CSS global -->
    <link rel="stylesheet" href="estilo.css">

    <!-- ✅ CSS exclusivo desta página -->
    <link rel="stylesheet" href="lista_produtos.css">
</head>

<body id="lista_produtos_page">

<a href="home.php" class="voltar-seta-fixa">⟵</a>


    <h1 id="lista_produtos_titulo">Lista de Produtos</h1>

    <?php
    require_once "conexao.php";
    require_once "funcoes.php";

    $tipo = $_GET['tipo'] ?? '';
    $lista_produtos = listarProdutos($conexao, $tipo);

    if (count($lista_produtos) == 0) {
        echo "<p>Nenhum produto cadastrado.</p>";
    } else {
        echo "<table id='lista_produtos_tabela'>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Foto</th>";
        echo "<th>Nome</th>";
        echo "<th>Disponível</th>";
        echo "<th>Tipo</th>";
        echo "<th>Ingredientes</th>";
        echo "<th>Valor Unitário</th>";
        echo "<th>Observações</th>";
        echo "<th colspan='2'>Ações</th>";
        echo "</tr>";

        foreach ($lista_produtos as $produto) {
            $idproduto = $produto['idproduto'];
            $foto = $produto['foto'];
            $nome = $produto['nome'];
            $disponivel = $produto['disponivel'];
            $tipo = $produto['tipo'];
            $ingredientes = $produto['ingredientes'];
            $valor_un = $produto['valor_un'];
            $observacoes = $produto['observacoes'];

            echo "<tr>";
            echo "<td>$idproduto</td>";
            echo "<td><img class='lista_produtos_foto' src='fotos/$foto' alt='Foto'></td>";
            echo "<td>$nome</td>";
            echo "<td>$disponivel</td>";
            echo "<td>$tipo</td>";
            echo "<td>$ingredientes</td>";
            echo "<td>$valor_un</td>";
            echo "<td>$observacoes</td>";
            echo "<td><a href='deletarProduto.php?id=$idproduto'>Excluir</a></td>";
            echo "<td><a href='formProduto.php?id=$idproduto'>Editar</a></td>";
            echo "</tr>";
        }

        echo "</table>";
    }
    ?>

    <a id="lista_produtos_voltar" href="home.php">⟵ Voltar</a>

</body>
</html>
