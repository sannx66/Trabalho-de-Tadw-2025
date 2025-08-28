
<?php
    require_once "verificaLogado.php";

    if ($_SESSION['tipo'] != 'g') {
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
    <h1>Lista de clientes</h1>

    <?php
    require_once "conexao.php";
    require_once "funcoes.php";

    $lista_clientes = listarClientes($conexao);
    
    //verificar se encontrou clientes antes de imprimir.
    if (count($lista_clientes) == 0) {
        echo "Não existem clientes cadastrados.";
    } else {
    ?>
        <table border="1">
            <tr>
                <td>Id</td>
                <td>Email</td>
                <td>Nome</td>
                <td>CPF</td>
                <td>Endereço</td>
                <td>Telefone</td>
                <td colspan="2">Ação</td>
            </tr>

        <?php
        foreach ($lista_clientes as $cliente) {
            $idcliente = $cliente['idcliente'];
            $nome = $cliente['nome'];
            $cpf = $cliente['cpf'];
            $endereco = $cliente['endereco'];
            $email = $cliente['email'];  
            $telefone = $cliente['telefone'];  

            echo "<tr>";
            echo "<td>$idcliente</td>";
            // echo "<td><img src='fotos/$foto'></td>";
            echo "<td>$nome</td>";
            echo "<td>$cpf</td>";
            echo "<td>$endereco</td>";
            echo "<td>$email</td>";
            echo "<td>$telefone</td>";
            echo "<td><a href='formCliente.php?id=$idcliente'>Editar</a></td>";
            echo "<td><a href='deletarCliente.php?id=$idcliente'>Excluir</a></td>";
            echo "</tr>";
        }
    }
        ?>
        </table>
</body>

</html>
