<?php
    // require_once "verificarlogado.php";

    // if ($_SESSION['tipo'] != 'g') {
    //     header("Location: home.php");
    // }

    require_once "conexao.php";
    require_once "funcoes.php";

    if (isset($_GET['id'])) {   // ← Faltava abrir corretamente o if
        // echo "editar";

        $id = $_GET['id'];
        
        // Se você está buscando por ID, a função correta provavelmente é pesquisarProdutoId()
        // Se a sua função pesquisarProdutoNome realmente aceita ID, pode deixar como está.
        $produto = pesquisarProdutoNome($conexao, $id);
       
        $foto = $produto['foto'];
        $nome =  $produto['nome'];
        $disponivel = $produto['disponivel'];
        $tipo = $produto['tipo'];
        $ingredientes = $produto['ingredientes'];
        $valor_un = $produto['valor_un'];
        $observacoes = $produto['observacoes'];

        $botao = "Atualizar";
    } else {  // ← Corrigido: antes estava fora do if, gerando erro de sintaxe
        // echo "novo";
        $id = 0;
        $nome = "";
        $disponivel = "";
        $tipo = "";
        $ingredientes = "";
        $valor_un = "";
        $observacoes = "";
        
        $botao = "Cadastrar";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
    <!-- Corrigido o atributo rel -->
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h1>Cadastro de Produtos</h1>
    
    <form action="salvarProduto.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
  
        Foto: <br>
        <input type="file" name="foto"> <br><br>

        Nome: <br>
        <input type="text" name="nome" value="<?php echo $nome; ?>"> <br><br>
        
        Disponível: <br>
        <input type="text" name="disponivel" value="<?php echo $disponivel; ?>"> <br><br>
        
        Tipo: <br>
        <select name="tipo">
            <option value="bolo" selected>Bolo</option>
            <option value="churros">Churros</option>
            <option value="macarons">Macarons</option> <!-- Corrigido: antes estava "macorons" -->
            <option value="trufas">Trufas</option>
            <option value="donuts">Donuts</option>
            <option value="cafe">Café</option>
            <option value="milkshake">Milkshake</option>
            <option value="cha">Chá</option> <!-- Corrigido: "Cha" → "Chá" -->
        </select>
        <br><br>

        Ingredientes: <br>
        <input type="text" name="ingredientes" value="<?php echo $ingredientes; ?>"> <br><br>
        
        Valor_un: <br>
        <input type="number" name="valor_un" value="<?php echo $valor_un; ?>"> <br><br>
        
        Observações: <br>
        <input type="text" name="observacoes" value="<?php echo $observacoes; ?>"> <br><br>

        <input type="submit" value="<?php echo $botao; ?>"> <!-- Agora o botão mostra Cadastrar/Atualizar -->
    </form>
</body>
</html>
