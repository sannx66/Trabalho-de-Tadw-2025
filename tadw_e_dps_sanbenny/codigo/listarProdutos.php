
<?php
    session_start();

    require_once "./verificarlogado.php";

    if ($_SESSION['tipo'] == 'c') {
        header("Location: home.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* img {
            width: 50px;
            height: 50px;
        } */
    </style>
</head>

<body>
    <h1>Lista de produtos</h1>

    <?php
    require_once "conexao.php";
    require_once "funcoes.php";

    $lista_produtos = listarProdutos($conexao);

    if (count($lista_produtos) == 0) {
        echo "Não existem produtos cadastrados";
    } else {
    ?>
        <table border="1">
            <tr> 
                
                <td>Id</td>
                <td>Disponivel</td>
                <td>Nome</td>
                <td>Tipo</td>
                <td>Ingredientes</td>
                <td>Valor_un</td>
                <td>Foto</td>
                <td>Observacoes</td>

                <td colspan="2">Ação</td>
            </tr>
        <?php
        foreach ($lista_produtos as $produto) {
            $idproduto = $produto['idproduto'];
            $tipo = $produto['tipo'];
            $nome = $produto['nome'];
            $ingredientes = $produto['ingredientes'];
            $valor_un = $produto['valor_un'];
            $foto = $produto['foto'];
            $observacoes = $produto['observacoes'];

            echo "<tr>";
            echo "<td>$idproduto</td>";
            echo "<td><img src='fotos/$foto'></td>";
            echo "<td>$disponivel</td>";
            echo "<td>$nome</td>";
            echo "<td>$tipo</td>";
            echo "<td>$ingredientes</td>";
            echo "<td>$valor_un</td>";
            echo "<td>$observacoes</td>";
            echo "<td><a href='deletarProduto.php?id=$idproduto'>Excluir</a></td>";
            echo "<td><a href='formProduto.php?id=$idproduto'>Editar</a></td>";
            echo "</tr>";
        }
    }
        ?>
        </table>
</body>

</html>
