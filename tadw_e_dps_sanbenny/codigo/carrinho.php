<?php
session_start();

require_once "../conexao.php";
require_once "../funcoes.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <?php
    if (empty($_SESSION['carrinho'])) {
        echo "carrinho vazio";
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
            $produto = pesquisarProdutoId($conexao, $id);

            echo "<tr>";
            echo "<td>" . $produto['tipo'] . "</td>";
            echo "<td>" . $produto['nome'] . "</td>";
            echo "<td> R$ <span class='preco_venda'>" . $produto['preco_venda'] . "</span></td>";
            echo "<td><input type='number' class='quantidade' value='$quantidade' min='1' size='2'</td>";

            $total_unitario = $produto['preco_venda'] * $quantidade;
            $total += $total_unitario;

            echo "<td> R$ <span class='total_unitario'>$total_unitario</span></td>";
            echo "<td><a href='remover.php?id=$id'>[remover]</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<h3>Total da compra: R$ <span id='total'>$total</span></h3>";
    }
    ?>

    <p>
        <a href="categorias.php">Adicionar produtos</a>
    </p>
    <script>
        function atualizar_total() {
            let total = 0;

            $('span.total_unitario').each(function() {
                const valor = parseFloat($(this).text());
                total += valor;
            });

            $('#total').text(total);
        }

        function somar() {
            const linha = $(this).closest('tr');
            const preco_unitario = linha.find('span.preco_venda').text();
            const quantidade = $(this).val();

            const total = parseFloat(preco_unitario) * parseInt(quantidade);

            const total_unitario = linha.find('span.total_unitario');
            total_unitario.text(total);

            atualizar_total();
        }

        $("input[type='number']").change(somar);
    </script>
</body>

</html>