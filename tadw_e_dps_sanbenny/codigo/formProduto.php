
<?php
    if (isset($_GET['id'])) {
        // echo "editar";

        require_once "conexao.php";
        require_once "funcoes.php";

        $id = $_GET['id'];
        
        $produto = pesquisarProdutoId($conexao, $id);
       
        $foto = $produto['foto'];
        $disponivel= $produto['disponivel'];
        $tipo = $produto ['tipo'];
        $nome =  $produto['nome'];
        $ingredientes = $produto['ingredientes'];
        $valor_un = $produto['valor_un'];
        $observacoes = $produto['observacoes'];

        $botao = "Atualizar";
    }
    else {
        // echo "novo";
        $id = 0;
        $disponivel = "";
        $tipo = "";
        $nome = "";
        $ingredientes = "";
        $valor_un = "";
        $observacoes = "";
        

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Cadastro de Produto</h1>
    <form action="salvarProduto.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
        Foto: <br>
        <input type="file" name="foto"> <br><br>
<!-- precisa terminar isso,n ta pronto -->
        Nome: <br>
        <input type="text" name="nome" value="<?php echo $nome; ?>"> <br><br>
        Disponivel: <br>
        <input type="text" name="cpf" value="<?php echo $cpf; ?>"> <br><br>
        Endereço: <br>
        <input type="text" name="endereco" value="<?php echo $endereco; ?>"> <br><br>

        <input type="submit" value="<?php echo $botao; ?>">
    </form>
</body>
</html>
