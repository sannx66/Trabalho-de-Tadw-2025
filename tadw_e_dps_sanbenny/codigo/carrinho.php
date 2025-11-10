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

    <!-- SEU CSS -->
    <link rel="stylesheet" href="estilo.css">

</head>

<body>

<!-- ✅ Wrapper geral da página -->
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

        // pega produto pelo ID
        $produto = pesquisarProdutoId($conexao, $id);

        echo "<tr>";

        // ✅ FOTO DO PRODUTO
        echo "<td><img src='fotos/" . $produto['foto'] . "' class='carrinho_foto'></td>";

        echo "<td>" . $produto['tipo'] . "</td>";
        echo "<td>" . $produto['nome'] . "</td>";

        echo "<td> <span class='preco_venda'>" . $produto['valor_un'] . "</span> golds</td>";

        // ✅ BOTÕES + e -
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

        // total unitário
        $total_unitario = $produto['valor_un'] * $quantidade;

        echo "<td> <span class='total_unitario'>$total_unitario</span> golds</td>";

        $total += $total_unitario;

        // ✅ Lixin sem texto
        echo "<td><button class='remover' data-id='$id'></button></td>";

        echo "</tr>";
    }

    echo "</table>";

    // ✅ total em dourado
    echo "<h3 id='carrinho_total'>Total da compra: <span id='total'>$total</span> golds</h3>";
}
?>

<!-- ✅ Botões finais -->
<p class="carrinho_links">
    <a href="categorias.php" class="carrinho_btn">Adicionar produtos</a>
    <a href="pagamento.php" class="carrinho_btn">Pagamento</a>
</p>

</div> <!-- ✅ fim do carrinho_page -->



<!-- =====================================================
     JAVASCRIPT - MESMO QUE VOCÊ JÁ TINHA
===================================================== -->
<script>

    function atualizar_total() {
        let total = 0;
        $('span.total_unitario').each(function() {
            total += parseFloat($(this).text());
        });
        $('#total').text(total);
    }

    // ✅ SOMAR E ATUALIZAR
    function somar() {
        const linha = $(this).closest('tr');
        const preco_unitario = parseFloat(linha.find('span.preco_venda').text());
        const quantidade = parseInt($(this).val());
        const id = $(this).data('id');

        const total = preco_unitario * quantidade;
        linha.find('span.total_unitario').text(total);

        atualizar_total();

        const dados = new URLSearchParams();
        dados.append('id', id);
        dados.append('quantidade', quantidade);

        fetch('atualiza_carrinho.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: dados.toString()
        })
        .catch(err => console.log("Erro:", err));
    }

    $("input.quantidade").change(somar);

    // ✅ CLIQUE NO LIXINHO (REMOVE ITEM)
    $(".remover").click(function() {
        const id = $(this).data('id');
        const linha = $(this).closest('tr');

        const dados = new URLSearchParams();
        dados.append('id', id);

        fetch('remover.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: dados.toString()
        })
        .then(() => {
            linha.remove();
            atualizar_total();
        })
        .catch(err => console.log("Erro ao remover:", err));
    });

    // ✅ BOTÃO AUMENTAR QUANTIDADE
    $(".aumentar").click(function() {
        const input = $(this).siblings(".quantidade");
        let val = parseInt(input.val());
        input.val(val + 1).change();
    });

    // ✅ BOTÃO DIMINUIR QUANTIDADE
    $(".diminuir").click(function() {
        const input = $(this).siblings(".quantidade");
        let val = parseInt(input.val());
        if (val > 1) {
            input.val(val - 1).change();
        }
    });

</script>

</body>
</html>
