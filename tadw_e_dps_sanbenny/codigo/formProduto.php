
<?php
    if (isset($_GET['id'])) {
        // echo "editar";

        require_once "conexao.php";
        require_once "funcoes.php";

        $id = $_GET['id'];
        
        $produto = pesquisarProdutoId($conexao, $id);
       
        $foto = $produto['foto'];
        $nome =  $produto['nome'];
        $disponivel= $produto['disponivel'];
        $tipo = $produto ['tipo'];
        $ingredientes = $produto['ingredientes'];
        $valor_un = $produto['valor_un'];
        $observacoes = $produto['observacoes'];

        $botao = "Atualizar";
    }
    else {
        // echo "novo";
        $id = 0;
        $nome = "";
        $disponivel = "";
        $tipo = "";
        $ingredientes = "";
        $valor_un = "";
        $observacoes = "";
        
        $botao="Cadastrar";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
</head>
<body>
    <h1>Cadastro de Produtos</h1>
    <form action="salvarProduto.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
        
        Foto: <br>
        <input type="file" name="foto"> <br><br>

        Nome: <br>
        <input type="text" name="nome" value="<?php echo $nome; ?>"> <br><br>
        
        Disponivel: <br>
        <input type="text" name="disponivel" value="<?php echo $disponivel; ?>"> <br><br>
        
        Tipo: <br>
        <input type="text" name="tipo" value="<?php echo $tipo; ?>"> <br><br>
        
        Ingredientes: <br>
        <input type="text" name="ingredientes" value="<?php echo $ingredientes; ?>"> <br><br>
        
        Valor_un: <br>
        <input type="number" name="valor_un" value="<?php echo $valor_un; ?>"> <br><br>
        
        Observacoes: <br>
        <input type="text" name="observacoes" value="<?php echo $observacoes; ?>"> <br><br>

        <input type="submit">
    </form>
</body>
</html>
