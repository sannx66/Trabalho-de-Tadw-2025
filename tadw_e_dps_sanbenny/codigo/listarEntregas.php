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
    <title>Lista de entregas</title>
    
    <link rel="stylesheet" href="estilo.css">
    

    <style>
        img {
            width: 50px;
            height: 50px;
        }
    </style>
</head>

<body>
    <h1>Lista de entregas</h1>

    <?php
    require_once "conexao.php";
    require_once "funcoes.php";

    $lista_entregas = listarEntregas($conexao);

    if (count($lista_entregas) == 0) {
        echo "Não existem entregas cadastrados";
    } else {
    ?>
        <table border="1">
            <tr>
                <th>identrega</th>
                <th>entregador</th>
                <th>idcarrinho</th>
                <td colspan="2">Ação</td>
            </tr>
        <?php
        foreach ($lista_entregas as $entrega) {
            $identrega = $entrega['identrega'];
            $entregador = $entrega['entregador'];
            $idcarrinho = $entrega['idcarrinho'];

            echo "<tr>";
            echo "<td>$identrega</td>";
            echo "<td>$entregador</td>";
            echo "<td>$idcarrinho</td>";
            echo "<td><a href='deletarEntrega.php?id=$identrega'>Excluir</a></td>";
            echo "<td><a href='formEntrega.php?id=$identrega'>Editar</a></td>";
            echo "</tr>";
        }
    }
        ?>
        </table>
</body>

</html>
