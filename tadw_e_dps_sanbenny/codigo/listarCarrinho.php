<?php
require_once "verificarlogado.php";

if ($_SESSION['tipo'] == 'c') {
    header("Location: home.php");
    exit();
}

require_once "conexao.php";
require_once "funcoes.php";

$lista_carrinho = listarCarrinho($conexao);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Carrinhos</title>

    <link rel="stylesheet" href="estilo.css">

</head>

<body id="lista_carrinhos_page">
<a href="home.php" class="voltar-seta-fixa">⟵</a>


    <a href="home.php" class="voltar-seta">⟵</a>

    <h1>Lista de Carrinhos</h1>

    <?php
    if (count($lista_carrinho) == 0) {
        echo "<p>Nenhum carrinho encontrado.</p>";
    } else {
        echo "<table border='1' class='tabela-listagem'>";
        echo "<tr>";
        echo "<th>ID Carrinho</th>";
        echo "<th>Cliente</th>";
        echo "<th>Valor Entrega</th>";
        echo "<th>Valor Total</th>";
        echo "<th>Valor Pago</th>";
        echo "<th>Troco</th>";
        echo "<th>Data / Hora</th>";
        echo "<th>Ação</th>";
        echo "</tr>";

        foreach ($lista_carrinho as $carrinho) {

            $idcarrinho = $carrinho['idcarrinho'];
            $idcliente = $carrinho['idcliente'];
            $valor_entrega = $carrinho['valor_entrega'];
            $valor_total = $carrinho['valor_total'];
            $valor_pago = $carrinho['valor_pago'];
            $troco = $carrinho['troco'];
            $data_hora = $carrinho['data_hora'];

            $clienteReal = pesquisarClienteId($conexao, $idcliente);
            $nomeReal = $clienteReal ? $clienteReal["nome"] : "";

            $lista = pesquisarClienteNome($conexao, $nomeReal);
            $cliente = $lista[0] ?? null;

            $nomeCliente = $cliente ? $cliente["nome"] : "Cliente não encontrado";

            echo "<tr>";
            echo "<td>$idcarrinho</td>";
            echo "<td>$nomeCliente</td>";
            echo "<td>$valor_entrega</td>";
            echo "<td>$valor_total</td>";
            echo "<td>$valor_pago</td>";
            echo "<td>$troco</td>";
            echo "<td>$data_hora</td>";
            echo "<td><a href='deletarCarrinho.php?id=$idcarrinho'>Excluir</a></td>";
            echo "</tr>";
        }

        echo "</table>";
    }
    ?>

    <br>
    <a href="home.php" class="voltar-link">Voltar</a>

</body>

</html>
