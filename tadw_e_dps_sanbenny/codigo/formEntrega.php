<?php
    require_once "verificarlogado.php";

    if ($_SESSION['tipo'] == 'c') {
        header("Location: home.php");
    }
?>
<?php
    if (isset($_GET['id'])) {
        // echo "editar";
        

        require_once "conexao.php";
        require_once "funcoes.php";

        $id = $_GET['id'];
        
        $entrega = pesquisarEntregaId($conexao, $id);
        $identrega = $entrega['identrega'];
        $entregador = $entrega['entregador'];
        $idcarrinho = $entrega['idcarrinho'];

        $botao = "Atualizar";
    }
    else {
        // echo "novo";
        $id = 0;
        $identrega = "";
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
<body>
    <h1>Cadastro de entrega</h1>
    <form action="salvarEntrega.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $id; ?>">

        Id da entrega: <br>
        <input type="number" name="identrega" value="<?php echo $identrega; ?>"> <br><br>

        Entregador: <br>
        <input type="text" name="entregador" value="<?php echo $entregador; ?>"> <br><br>

        Id do carrinho: <br>
        <input type="number" name="idcarrinho" value="<?php echo $idcarrinho; ?>"> <br><br>

        <input type="submit" value="<?php echo $botao; ?>">
    </form>
    <br><a href="home.php">Voltar</a><br>
</body>
</html>