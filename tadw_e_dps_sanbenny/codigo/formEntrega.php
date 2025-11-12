<?php
    require_once "verificarlogado.php";

    if ($_SESSION['tipo'] == 'c') {
        header("Location: home.php");
    }
?>
<?php
    if (isset($_GET['id'])) {
        // echo "editar";

        $id = $_GET['id'];
        

        require_once "conexao.php";
        require_once "funcoes.php";

        
        
        $entrega = pesquisarEntregaId($conexao, $id);
        $entregador = $entrega['entregador'];
        $idcarrinho = $entrega['idcarrinho'];

        $botao = "Atualizar";
    }
    else {
        $id = 0;
        $entregador = "";
        $idcarrinho = "";

        $botao = "Cadastrar";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de entrega</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body id="form_entrega_page">
<a href="home.php" class="voltar-seta-fixa">⟵</a>

    <h1>Cadastro de entrega</h1>
    <form action="salvarEntrega.php?id=<?php echo $id; ?>" method="post">

    <label>Entregador:</label>
    <input type="text" name="entregador" value="<?php echo $entregador; ?>">

    <label>Id do carrinho:</label>
    <input type="number" name="idcarrinho" value="<?php echo $idcarrinho; ?>">

    <input type="submit" value="<?php echo $botao; ?>">
</form>

    <!-- <br><a href="home.php">Voltar</a><br> -->
</body>
</html>