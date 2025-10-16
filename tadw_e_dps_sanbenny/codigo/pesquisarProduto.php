
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pesquisar Produto</title>
</head>

<body>
  <form action="pesquisarProdutoNome.php">
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
      echo "<th>Nome</th>";
    //   depois colocar os trem de foto
      echo "</tr>";
      foreach ($produtos as $produto) {
        echo "<tr>";
        echo "<td>" . $produto["nome"] . "</td>";
        echo "</tr>";
      }
    }
  }
  ?>
</body>

</html>