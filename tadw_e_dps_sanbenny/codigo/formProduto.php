<?php
require_once "verificarlogado.php";

if ($_SESSION['tipo'] != 'g') {
    header("Location: home.php");
    exit();
}

require_once "conexao.php";
require_once "funcoes.php";

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $produto = pesquisarProdutoId($conexao, $id);

    $foto = $produto['foto'];
    $nome = $produto['nome'];
    $disponivel = $produto['disponivel'];
    $tipo = $produto['tipo'];
    $ingredientes = $produto['ingredientes'];
    $valor_un = $produto['valor_un'];
    $observacoes = $produto['observacoes'];

    $botao = "Atualizar";
} else {
    $id = 0;
    $foto = "";
    $nome = "";
    $disponivel = "";
    $tipo = "";
    $ingredientes = "";
    $valor_un = "";
    $observacoes = "";

    $botao = "Cadastrar";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>

    <link rel="stylesheet" href="estilo.css">

    <!-- ✅ CSS exclusivo desta página -->
    <link rel="stylesheet" href="form_produto.css">
</head>

<body id="form_produto_page">
<a href="home.php" class="voltar-seta-fixa">⟵</a>


    <h1 id="form_produto_titulo">Cadastro de Produtos</h1>

    <form id="form_produto_container" action="salvarProduto.php" method="post" enctype="multipart/form-data">

        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <label>Foto:</label>
        <input type="file" name="foto">

        <label>Nome:</label>
        <input type="text" name="nome" value="<?php echo $nome; ?>">

        <label>Disponível:</label>
        <input type="text" name="disponivel" value="<?php echo $disponivel; ?>">

        <label>Tipo:</label>
        <select name="tipo">
            <option value="bolo" <?php if ($tipo == 'bolo') echo 'selected'; ?>>Bolo</option>
            <option value="churros" <?php if ($tipo == 'churros') echo 'selected'; ?>>Churros</option>
            <option value="macarons" <?php if ($tipo == 'macarons') echo 'selected'; ?>>Macarons</option>
            <option value="trufas" <?php if ($tipo == 'trufas') echo 'selected'; ?>>Trufas</option>
            <option value="donuts" <?php if ($tipo == 'donuts') echo 'selected'; ?>>Donuts</option>
            <option value="cafe" <?php if ($tipo == 'cafe') echo 'selected'; ?>>Café</option>
            <option value="milkshake" <?php if ($tipo == 'milkshake') echo 'selected'; ?>>Milkshake</option>
            <option value="cha" <?php if ($tipo == 'cha') echo 'selected'; ?>>Chá</option>
        </select>

        <label>Ingredientes:</label>
        <input type="text" name="ingredientes" value="<?php echo $ingredientes; ?>">

        <label>Valor Unitário:</label>
        <input type="number" min ="5" name="valor_un" value="<?php echo $valor_un; ?>">

        <label>Observações:</label>
        <input type="text" name="observacoes" value="<?php echo $observacoes; ?>">

        <input type="submit" value="<?php echo $botao; ?>">

    </form>

    <a id="form_produto_voltar" href="home.php">⟵ Voltar</a>

</body>
</html>
