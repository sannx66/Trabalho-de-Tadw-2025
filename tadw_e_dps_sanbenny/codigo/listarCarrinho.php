<?php
    require_once "verificarlogado.php";

    if ($_SESSION['tipo'] == 'c') {
        header("Location: home.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar de Carrinhos</title>
    <link rel="stylesheet" href="estilo.css">
    <!-- SETA VOLTAR FIXA -->
    <a href="categorias.php" class="voltar-seta">←</a>
    <style>
        img {
            width: 50px;
            height: 50px;
        }
    </style>
</head>

<body>
    <h1>Lista de carrinhos</h1>

    <?php
    require_once "conexao.php";
    require_once "funcoes.php";

    $lista_carrinho= listarCarrinho($conexao);

    if (count($lista_carrinho) == 0) {
        echo "Não existem carrinhos cadastrados";
    } else {
    ?>
        <table border="1">
            <tr>
                <td>Id</td>
                <td>Idcliente</td>
                <td>Valor_entrega</td>
                <td>Valor_total</td>
                <td>Valor_pago</td>
                <td>Troco</td>
                <td>Data_hora</td>
                <td colspan="2">Ação</td>
            </tr>
        <?php
        foreach ($lista_carrinho as $carrinho) {
            $idcarrinho = $carrinho['idcarrinho'];
            $idcliente = $carrinho['idcliente'];
            $valor_entrega = $carrinho['valor_entrega'];
            $valor_total = $carrinho['valor_total'];
            $valor_pago = $carrinho['valor_pago'];
            $troco = $carrinho['troco'];
            $data_hora = $carrinho['data_hora'];

            echo "<tr>";
            echo "<td>$idcarrinho</td>";
            echo "<td>$idcliente</td>";
            echo "<td>$valor_entrega</td>";
            echo "<td>$valor_total</td>";
            echo "<td>$valor_pago</td>";
            echo "<td>$troco</td>";
            echo "<td>$data_hora</td>";
            echo "<td><a href='deletarCarrinho.php?id=$idcarrinho'>Excluir</a></td>";
            //echo "<td><a href='carrinho.php?id=$idcarrinho'>Editar</a></td>";
            echo "</tr>";
        }
    }
        ?>
        </table>
        <br><a href="home.php">Voltar</a>
</body>

</html>