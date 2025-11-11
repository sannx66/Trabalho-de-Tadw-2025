<?php
session_start();

require_once "conexao.php";
require_once "funcoes.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho</title>

    <script src="jquery-3.7.1.min.js"></script>

    <link rel="stylesheet" href="estilo.css">
</head>

<body>

<div id="carrinho_page">

    <h1 id="carrinho_titulo">CARRINHO</h1>

<?php
if (empty($_SESSION['carrinho'])) {
    echo "<p>Carrinho vazio</p>";
} else {

    $total = 0;

    echo "<table>";
    echo "<tr>";
    echo "<td>Foto</td>";
    echo "<td>Tipo</td>";
    echo "<td>Nome</td>";
    echo "<td>Preço</td>";
    echo "<td>Quantidade</td>";
    echo "<td>Total unitário</td>";
    echo "<td>Remover</td>";
    echo "</tr>";

    foreach ($_SESSION['carrinho'] as $id => $quantidade) {

        $produto = pesquisarProdutoId($conexao, $id);

        echo "<tr>";

        echo "<td><img src='fotos/" . $produto['foto'] . "' class='carrinho_foto'></td>";
        echo "<td>" . $produto['tipo'] . "</td>";
        echo "<td>" . $produto['nome'] . "</td>";

        echo "<td><span class='preco_venda'>" . $produto['valor_un'] . "</span> golds</td>";

        echo "<td>
                <div class='quantidade_box'>
                    <button class='btn_qtd diminuir' data-id='$id'>−</button>

                    <input type='number'
                           class='quantidade'
                           data-id='$id'
                           value='$quantidade'
                           min='1'>

                    <button class='btn_qtd aumentar' data-id='$id'>+</button>
                </div>
              </td>";

        $total_unitario = $produto['valor_un'] * $quantidade;

        echo "<td><span class='total_unitario'>$total_unitario</span> golds</td>";

        $total += $total_unitario;

        echo "<td><button class='remover' data-id='$id'></button></td>";

        echo "</tr>";
    }

    echo "</table>";

    echo "<h3 id='carrinho_total'>Total da compra: <span id='total'>$total</span> golds</h3>";
}
?>

<p class="carrinho_links">
    <a href="categorias.php" class="carrinho_btn">Adicionar produtos</a>
    <a href="pagamento.php" class="carrinho_btn">Pagamento</a>
</p>

</div>

<script>

// ✅ Atualiza total geral
function atualizar_total() {
    let total = 0;
    $("span.total_unitario").each(function() {
        total += parseFloat($(this).text());
    });
    $("#total").text(total);
}

// ✅ Atualiza quantidade
$(".quantidade").on("change", function() {
    const input = $(this);
    const id = input.data("id");
    let quantidade = parseInt(input.val());

    if (quantidade < 1) quantidade = 1;

    const linha = input.closest("tr");
    const preco = parseFloat(linha.find(".preco_venda").text());

    const total = preco * quantidade;
    linha.find(".total_unitario").text(total);

    atualizar_total();

    $.post("atualizar_carrinho.php", {
        id: id,
        quantidade: quantidade
    });
});

// ✅ Botão +
$(".aumentar").click(function() {
    const input = $(this).siblings(".quantidade");
    input.val(parseInt(input.val()) + 1).change();
});

// ✅ Botão -
$(".diminuir").click(function() {
    const input = $(this).siblings(".quantidade");
    if (parseInt(input.val()) > 1) {
        input.val(parseInt(input.val()) - 1).change();
    }
});

// ✅ Remover item
$(".remover").click(function() {
    const id = $(this).data("id");
    const linha = $(this).closest("tr");

    $.post("remover.php", { id: id }, function() {
        linha.remove();
        atualizar_total();
    });
});

</script>

</body>
</html>
