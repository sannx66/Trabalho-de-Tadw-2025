<?php
    require_once "verificarlogado.php";

    if ($_SESSION['tipo'] != 'g') {
        header("Location: home.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de produtos</title>

    <link rel="stylesheet" href="estilo.css">

    <style>
         img {
            width: 70px;
            height: 70px;
        } 
    </style>
</head>

<body>
    <h1>Lista de produtos</h1>
                                                          
    <?php
    require_once "conexao.php";
    require_once "funcoes.php";
    $tipo = $_GET['tipo'] ?? '';
    $lista_produtos = listarProdutos($conexao,$tipo);

    if (count($lista_produtos) == 0) {
        echo "Não existem produtos cadastrados";
    } else {
    ?>
        <table border="1">
            <tr> 
                
                <td>Id</td>
                <td>Foto</td>
                <td>Nome</td>
                <td>Disponivel</td>
                <td>Tipo</td>
                <td>Ingredientes</td>
                <td>Valor_un</td>
                <td>Observacoes</td>

                <td colspan="2">Ação</td>
            </tr>
        <?php
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
            echo "<td><img src='fotos/$foto'></td>";
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
    }
        ?>
        </table>
        <a href="home.php">Voltar</a>
</body>

</html>
