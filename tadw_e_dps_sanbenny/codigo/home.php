<?php
require_once "./verificarlogado.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Home</title>
</head>
<body id="home_admin_page">

<body id="home_admin_page">

<div id="home_admin_container">

    <div id="home_left_col">

        <a id="home_admin_voltar" href="categorias.php">⟵</a>

        <ul id="home_admin_menu">
            <?php
                if ($_SESSION['tipo'] == 'g') {
                    echo "<li><a href='listarClientes.php'>Lista de Clientes</a></li>";
                    echo "<li><a href='pesquisarCliente.php'>Pesquisar Cliente</a></li>";
                    echo "<li><a href='listarProdutos.php'>Lista de Produtos</a></li>";
                    echo "<li><a href='formProduto.php'>Formulário de Produto</a></li>";
                    echo "<li><a href='pesquisarProduto.php'>Pesquisar Produto</a></li>";
                    echo "<li><a href='formEntrega.php'>Formulário de Entrega</a></li>";
                    echo "<li><a href='listarEntregas.php'>Lista de Entregas</a></li>";
                    echo "<li><a href='pesquisarEntrega.php'>Pesquisar Entrega</a></li>";
                    echo "<li><a href='listarCarrinho.php'>Lista de Carrinhos</a></li>";
                } else {
                    echo "<p id='home_admin_negado'>Apenas para autorizados :)</p>";
                }
            ?>
        </ul>

    </div>

    <div id="home_right_col">
        <img id="home_admin_logo" src="fotos/logo_diego.png" alt="Logo">
    </div>

</div>

</body>


</body>
</html>
