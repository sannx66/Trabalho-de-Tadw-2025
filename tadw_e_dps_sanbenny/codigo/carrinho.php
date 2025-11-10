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
    <script src="../jquery-3.7.1.min.js"></script>
</head>

<body>

<?php
if (empty($_SESSION['carrinho'])) {
    echo "Carrinho vazio";
} else {

    $total = 0;

    echo "<table border='1'>";
    echo "<tr>";
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
        echo "<td>" . $produto['tipo'] . "</td>";
        echo "<td>" . $produto['nome'] . "</td>";

        echo "<td> R$ <span class='preco_venda'>" . $produto['valor_un'] . "</span></td>";

        echo "<td>
                <input type='number' class='quantidade' 
                       data-id='$id' 
                       value='$quantidade' 
                       min='1'>
             </td>";

        $total_unitario = $produto['valor_un'] * $quantidade;
        echo "<td> R$ <span class='total_unitario'>$total_unitario</span></td>";
        $total += $total_unitario;

        // botão AJAX para remover sem recarregar
        echo "<td><button class='remover' data-id='$id'>Remover</button></td>";

        echo "</tr>";
    }

    echo "</table>";
    echo "<h3>Total da compra: R$ <span id='total'>$total</span></h3>";
}
?>

<p>
    <a href="categorias.php">Adicionar produtos</a> <br>
    <a href="pagamento.php">Pagamento</a>
</p>

<script>
    function atualizar_total() {
        let total = 0;
        $('span.total_unitario').each(function() {
            total += parseFloat($(this).text());
        });
        $('#total').text(total);
    }

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

    // Remover sem piscar a tela
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
            linha.remove();     // tira da tela sem recarregar
            atualizar_total();  // recalcula total
        })
        .catch(err => console.log("Erro ao remover:", err));
    });
</script>

</body>
</html>
