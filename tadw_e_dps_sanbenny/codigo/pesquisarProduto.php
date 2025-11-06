<?php
    require_once "verificarlogado.php";

    if ($_SESSION['tipo'] != 'g') {
        header("Location: home.php");
    }
?> 

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pesquisar Produto</title>
  <link rel="stylesheet" href="estilo.css">

</head>

<body>
  <form action="pesquisarProduto.php">
    Nome do produto: <br>
    <input type="text" name="valor"> <br><br>

    <input type="submit" value="Pesquisar">
    </form>
  <?php
  if (isset($_GET["valor"]) && !empty($_GET["valor"])) {
    $valor = $_GET["valor"];

    require_once "conexao.php";
    require_once "funcoes.php";

    $produtos = pesquisarProdutoNome($conexao, $valor);

    if (count($produtos) == 0) {
      echo "<p>Nenhum produto encontrado</p>";
    } else {
      echo "<br><table border='1'>";
      echo "<tr>";
      echo "<th>Foto</th>";
      echo "<th>Nome</th>";
      echo "<th>Disponível</th>";
      echo "<th>Tipo</th>";
      echo "<th>Ingredientes</th>";
      echo "<th>Valor_un</th>";


    //   depois colocar os trem de foto
      echo "</tr>";
      foreach ($produtos as $produto) {
        echo "<tr>";
        echo "<td><img src='fotos/" . htmlspecialchars($produto["foto"]) . "' width='80'></td>";
        echo "<td>" . $produto["nome"] . "</td>";
        echo "<td>" . intval($produto["disponivel"]) . "</td>";
        echo "<td>" . htmlspecialchars($produto["tipo"]) . "</td>";
        echo "<td>" . htmlspecialchars($produto["ingredientes"]) . "</td>";
        echo "<td>R$ " . number_format($produto["valor_un"], 2, ',', '.') . "</td>";
        echo "</tr>";
      }
    }
  }
  
  ?>
</body>
<a href="home.php">Voltar</a>
</html>