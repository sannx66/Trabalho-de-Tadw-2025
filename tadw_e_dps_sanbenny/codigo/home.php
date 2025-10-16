<?php
    require_once "./verificarlogado.php";
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Home</title>
</head>
<body>

        <?php
            if ($_SESSION['tipo'] == 'g') {
                echo "<li>";
                echo "<a href='listarClientes.php'>Lista de Clientes</a>";
                echo "</li>";

                echo "<li>";
                echo "<a href='listarProdutos.php'>Lista de Produtos</a>";
                echo "</li>";

                echo "<a href='cadastrarProduto.php'>Cadastrar Produto</a>";
            }
            else {
                echo "Apenas para autorizados :)"; 
            }
        ?>
      
        <li>
            <a href="categorias.php">Voltar</a>
        </li>
    
</body>
</html>