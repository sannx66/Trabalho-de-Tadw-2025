<?php
    require_once "./verificarlogado.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <ul>
        <li>
        <a href="formCliente.php">Cadastrar novo cliente</a>
        </li>

        <?php
            if ($_SESSION['tipo'] == 'g') {
                echo "<li>";
                echo "<a href='listarClientes.php'>Lista de clientes cadastrados</a>";
                echo "</li>";

                echo "<a href='cadastrarProduto.php'>Cadastrar produto</a>";
            }
        ?>
        <li>
            <a href="formProduto.php">Cadastrar novo produto</a>
        </li>
        <li>
            <a href="listarProdutos.php">Lista de produtos cadastrados</a>
        </li>
        <li>
            <a href="deslogar.php">Sair</a>
        </li>
    </ul>
</body>
</html>