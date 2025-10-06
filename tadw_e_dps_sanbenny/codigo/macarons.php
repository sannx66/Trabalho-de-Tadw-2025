<?php
    require_once "./verificarlogado.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="funcoes.js"></script>
    <a href="categorias.php">Voltar</a> <br><br>

    <h1><i>Bolos</i></h1>
</head>
<body>

foto   Bolo de morango

    <form action="salvarVenda.php">
        
    
       Produtos: <br>
        <?php
            $lista_produtos = listarProdutos($conexao);
            
            foreach ($lista_produtos as $produto) {
                $idproduto = $produto['idproduto'];
                $nome = $produto['nome'];
                $preco = $produto['preco_venda'];
                
                echo "<input type='checkbox' id='marcado[$idproduto]' value='$idproduto' name='idproduto[]'>R$ <span id='preco[$idproduto]'>$preco</span> - $nome ";
                echo "<input type='text' value='0' name='quantidade[$idproduto]' id='quantidade[$idproduto]' onchange='calcular()'><br>";
            }
            ?>
        <br>
        
        Valor Total: <br>
        <input type="text" name="valor_total" id="valor_total" disabled><br><br>
        <span id='total'></span>

        <input type="submit" value="Registrar Venda">
    </form>
    <button onclick="aviso()">Teste</button>
</body>
</html>

